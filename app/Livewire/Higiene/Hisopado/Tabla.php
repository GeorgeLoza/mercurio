<?php

namespace App\Livewire\Higiene\Hisopado;

use App\Models\Hisopado;
use App\Models\HisopadoCorreccion;
use App\Models\Personal;
use Livewire\Attributes\On;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;

class Tabla extends Component
{

    use WithPagination;
    public $f_codigo = null;
    public $f_nombre = null;
    public $f_turno = null;

    public $filtro = false;
    #[On('actualizar_tabla_hisopado')]
    public function render()
    {
        $corregidos = Personal::orderBy('updated_at', 'desc')
            ->where('estado', 'Habilitado')

            ->where(function ($query) {
                $query->where('hisopado', 'Correcion')
                    ->orWhere('hisopado', 'Capacitado')
                    ->orWhere('hisopado', 'Memorandum')
                ;
            })
            ->get();

        $personales = Personal::orderBy('codigo', 'desc') // Ordenar por fecha de creación descendente
            ->when($this->f_codigo, function ($query) {
                return $query->where('codigo', 'like', '%' . $this->f_codigo . '%');
            })
            ->when($this->f_nombre, function ($query) {
                return $query->where('nombre', 'like', '%' . $this->f_nombre . '%');
            })
            ->when($this->f_turno, function ($query) {
                return $query->where('turno', 'like', '%' . $this->f_turno . '%');
            })
            ->where('hisopado', 'No')
            ->where('estado', 'Habilitado')

            ->get();

        $hisopados = Hisopado::orderBy('id', 'desc')
            ->paginate(18);

        return view('livewire.higiene.hisopado.tabla', [
            'personales' => $personales,
            'corregidos' => $corregidos,
            'hisopados' => $hisopados,
        ]);
    }

    public function hisopar($id)
    {
        Hisopado::create([
            'personal_id' => $id,
            'fechaMuestra' => now(),
            'muestrero' => auth()->user()->id,
        ]);
        $personal = Personal::find($id);
        $personal->hisopado = 'En proceso';
        $personal->save();
    }

    public function sembrarnow($id)
    {


        try {
            $seguimientos = Hisopado::findOrFail($id);
            // Verificación para todas las variables antes de asignarlas al modelo
            if ($seguimientos->fechaSiembra == null) {
                $seguimientos->fechaSiembra = now()->hour >= 22 ? now()->addDay()->startOfDay() : now();

                $seguimientos->usuarioSiembra = auth()->user()->id;
                $seguimientos->save();


                $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
            } else {

                $this->dispatch('warning', mensaje: 'Ya tiene fecha de Sembrado');
            }
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }


    public function dia5($id)
    {
        try {
            $hisopado = Hisopado::find($id);


            $hisopado->col = 0;
            $hisopado->fechaLectura =  now();



            $hisopado->usuarioLectura = auth()->user()->id;
            $hisopado->save();

            $personal = Personal::find($hisopado->personal_id);
            $personal->hisopado = 'Si';
            $personal->save();
            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
    public function capacitar($id)
    {
        try {
            $hisopado = Hisopado::where('personal_id', $id)
                ->firstOrFail();

            $correcion = HisopadoCorreccion::where('hisopado_id', $hisopado->id)
                ->first();

            $correcion->fechaCapacitacion = now();
            $correcion->user_id = auth()->user()->id;
            $correcion->save();

            $personal = Personal::find($id);
            $personal->hisopado = 'Capacitado';
            $personal->save();

            $this->dispatch('success', mensaje: 'Capacitación registrada exitosamente.');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }
}
