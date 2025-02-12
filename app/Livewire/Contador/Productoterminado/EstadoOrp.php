<?php

namespace App\Livewire\Contador\Productoterminado;

use App\Models\Orp;
use App\Models\User;
use Livewire\Component;
use App\Models\Contador;
use App\Models\EstadoPlanta;
use App\Notifications\CierreOrp;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use App\Notifications\orpNotification;

class EstadoOrp extends ModalComponent
{
    //input
    public $estado;

    public function render()
    {
        $orps = Contador::select('contadors.orp_id', DB::raw('SUM(cantidad) as cantidad_total'))
            ->whereIn('tipo', ['Total por Turno', 'Total para Muestras'])
            ->groupBy('contadors.orp_id')
            ->join('orps', 'contadors.orp_id', '=', 'orps.id')
            ->where('orps.estado', 'En proceso') // Condición agregada para el estado de la ORP
            ->get();
        return view('livewire.contador.productoterminado.estado-orp', [
            'orps' => $orps
        ]);
    }
    public function concluir($id)
    {
        try {
            $orps = Contador::select('contadors.orp_id', DB::raw('SUM(cantidad) as cantidad_total'))
                ->whereIn('tipo', ['Total por Turno', 'Total para Muestras'])
                ->where('orp_id', $id)
                ->groupBy('contadors.orp_id')
                ->join('orps', 'contadors.orp_id', '=', 'orps.id')
                ->where('orps.estado', 'En proceso') // Condición agregada para el estado de la ORP
                ->first();


            DB::beginTransaction();

            $registro = Orp::findOrFail($id);
            $registro->estado = 'Completado';
            $registro->save();
            try {
                DB::table('colors')
                    ->where('orp_id', $id)
                    ->update(['orp_id' => null]);


                    $registros = EstadoPlanta::select('*')
                    ->where('proceso', 'Produccion')
                    ->where('etapa_id', 8)
                    ->whereHas('estadoDetalle.orp', function ($query) use ($id) {
                        $query->where('id', $id);
                    })
                    ->whereIn('id', function ($query) {
                        $query->select(DB::raw('MAX(id)'))
                            ->from('estado_plantas')
                            ->groupBy('origen_id');
                    })
                    ->get();


                        foreach ($registros as $registro) {
                            // Crear un nuevo registro con las modificaciones necesarias
                            EstadoPlanta::create([
                                'tiempo' => now(), // Asignar el tiempo actual
                                'user_id' => auth()->user()->id, // Asignar el ID del usuario actual
                                'origen_id' => $registro->origen_id, // Copiar el origen_id
                                'proceso' => 'Detenido', // Cambiar el proceso a 'Detenido'
                                'etapa_id' => 8, // Establecer etapa_id a null
                                // Otros campos que sean necesarios
                            ]);
                        }
            } catch (\Throwable $th) {




            }





            $this->closeModal();
            $this->dispatch('success', mensaje: 'Se completó la producción del producto exitosamente');

            // $admins = User::where('rol', 'Admi')->get();
            // foreach ($admins as $admin) {
            //     $admin->notify(new CierreOrp($registro));
            // }


            Contador::create([
                'tiempo' => now(),
                'cantidad' => $orps->cantidad_total,
                'tipo' => 'Total',

                'almacen_producto_terminado_id' => 1,
                'orp_id' => $id,
                'user_id' => auth()->user()->id

            ]);

            DB::commit();







            $this->dispatch('actualizar_tabla_contador_productoTerminado');

        } catch (\Throwable $th) {
            DB::rollBack();
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }




    public function completar($id)
{


    try {
        $userId = auth()->id();

        $registro = Orp::find($id);
        $registro->estado = 'Completado';
        $registro->save();

        try {
            DB::table('colors')
                ->where('orp_id', $id)
                ->update(['orp_id' => null]);
        } catch (\Throwable $th) {
            // Manejo de error: puedes registrar el error si es necesario
            // Log::error('Error al actualizar colors: ' . $th->getMessage());
        }

    $registros = EstadoPlanta::select('*')
    ->where('proceso', 'Produccion')
    ->where('etapa_id', 8)
    ->whereHas('estadoDetalle.orp', function ($query) use ($id) {
        $query->where('id', $id);
    })
    ->whereIn('id', function ($query) {
        $query->select(DB::raw('MAX(id)'))
            ->from('estado_plantas')
            ->groupBy('origen_id');
    })
    ->get();


        foreach ($registros as $registro) {
            // Crear un nuevo registro con las modificaciones necesarias
            EstadoPlanta::create([
                'tiempo' => now(), // Asignar el tiempo actual
                'user_id' => $userId, // Asignar el ID del usuario actual
                'origen_id' => $registro->origen_id, // Copiar el origen_id
                'proceso' => 'Detenido', // Cambiar el proceso a 'Detenido'
                'etapa_id' => 8, // Establecer etapa_id a null
                // Otros campos que sean necesarios
            ]);
        }

    } catch (\Throwable $th) {
        dd($th);
    }
}

}
