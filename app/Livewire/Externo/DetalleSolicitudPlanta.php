<?php

namespace App\Livewire\Externo;

use App\Models\DetalleSolicitudPlanta as ModelsDetalleSolicitudPlanta;
use App\Models\ProductosPlantas;
use App\Models\SolicitudPlanta;
use App\Models\TipoMuestra;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetalleSolicitudPlanta extends Component
{
    public $muestra = 1;
    public $detalleId;
    public  $productos_planta_id, $subcodigo, $lote, $fecha_elaboracion, $fecha_vencimiento, $fecha_muestreo, $tipo_muestra_id, $tipo_analisis, $tipo_analisis_1 = true, $tipo_analisis_2 = true, $otro, $user_id;

    protected $rules = [

        'lote' => 'nullable|string',
        'fecha_elaboracion' => 'nullable|date',
        'fecha_vencimiento' => 'nullable|date',
        'fecha_muestreo' => 'required|date',
        'tipo_muestra_id' => 'required|exists:tipo_muestras,id',
        'otro' => 'nullable|string',
    ];

    public function render()
    {
        if ($this->muestra == 1) {
            $this->tipo_analisis_1 = true;
            $this->tipo_analisis_2 = true;
        } else {
            $this->tipo_analisis_1 = false;
            $this->tipo_analisis_2 = true;
        }
        $productos = ProductosPlantas::where('planta_id', auth()->user()->planta->id)->get(); // Asthis->egúrate de cargar los productos disponibles
        $tiposMuestra = TipoMuestra::all();

        $detalles = ModelsDetalleSolicitudPlanta::where('user_id', auth()->user()->id)->whereNull('subcodigo')->get();

        return view('livewire.externo.detalle-solicitud-planta', [
            'detalles' => $detalles,
            'productos' => $productos,
            'tiposMuestra' => $tiposMuestra
        ]);
    }

    public function  create()
    {

        $this->validate();
        $this->fecha_elaboracion = $this->fecha_elaboracion ?: null;
        $this->fecha_vencimiento = $this->fecha_vencimiento ?: null;
        $fields = $this->getFields(); // Obtiene los campos una vez

        if ($this->tipo_analisis_1) {
            $fields['tipo_analisis'] = 'Fisicoquimico';
            ModelsDetalleSolicitudPlanta::create($fields);
        }

        if ($this->tipo_analisis_2) {
            $fields['tipo_analisis'] = 'Microbiologico';
            ModelsDetalleSolicitudPlanta::create($fields);
        }

        $this->resetFields(); // Resetea los campos después de crear los registros
    }

    public function update()
    {
        $this->validate();
        $detalle = ModelsDetalleSolicitudPlanta::find($this->detalleId);
        if ($this->tipo_analisis_1) {
            $this->tipo_analisis = 'Fisicoquimico';
        }

        if ($this->tipo_analisis_2) {
            $this->tipo_analisis = 'Microbiologico';
        }
        $detalle->update($this->getFields());
        $this->resetFields();
    }

    public function edit($id)
    {
        $this->detalleId = $id;
        $detalle = ModelsDetalleSolicitudPlanta::find($id);

        $this->setFields($detalle);
        if ($detalle->tipo_analisis == "Fisicoquimico") {

            $this->tipo_analisis_1 = true;
            $this->tipo_analisis_2 = false;
        } else {
            $this->tipo_analisis_1 = false;
            $this->tipo_analisis_2 = true;
        }

        if ($detalle->otro) {
            $this->muestra = 0;
        } else {
            $this->muestra = 1;
        }
    }

    public function delete($id)
    {
        $tipoMuestra = ModelsDetalleSolicitudPlanta::find($id);
        $tipoMuestra->delete();
    }


    public function resetFields()
    {
        $this->reset([
            'productos_planta_id',
            'subcodigo',
            'lote',
            'fecha_elaboracion',
            'fecha_vencimiento',
            'fecha_muestreo',
            'tipo_muestra_id',
            'otro'
        ]);
    }

    private function getFields()
    {
        return [
            'productos_planta_id' => $this->productos_planta_id,
            'subcodigo' => $this->subcodigo,
            'lote' => $this->lote,
            'fecha_elaboracion' => $this->fecha_elaboracion,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'fecha_muestreo' => $this->fecha_muestreo,
            'tipo_muestra_id' => $this->tipo_muestra_id,
            'tipo_analisis' => $this->tipo_analisis,
            'otro' => $this->otro,
            'user_id' => auth()->user()->id,
        ];
    }

    private function setFields(ModelsDetalleSolicitudPlanta $tipoMuestra)
    {
        $this->productos_planta_id = $tipoMuestra->productos_planta_id;
        $this->subcodigo = $tipoMuestra->subcodigo;
        $this->lote = $tipoMuestra->lote;
        $this->fecha_elaboracion = $tipoMuestra->fecha_elaboracion;
        $this->fecha_vencimiento = $tipoMuestra->fecha_vencimiento;
        $this->fecha_muestreo = $tipoMuestra->fecha_muestreo;
        $this->tipo_muestra_id = $tipoMuestra->tipo_muestra_id;
        $this->otro = $tipoMuestra->otro;
        $this->user_id = auth()->user()->id;
    }

    public function generar()
    {
        try {
            // Obtener el último código generado
            $ultimoCodigo = SolicitudPlanta::latest('codigo')->first();

            if ($ultimoCodigo) {
                // Incrementar el último código
                $numero = intval($ultimoCodigo->codigo) + 1;
                $codigo = str_pad($numero, 5, '0', STR_PAD_LEFT);
            } else {
                // Empezar con 00001 si no hay registros previos
                $codigo = '00001';
            }

            // Crear la nueva solicitud
            $solicitud = SolicitudPlanta::create([
                'tiempo' => now(),
                'codigo' => $codigo,
                'estado' => 'Pendiente',
                'user_id' => auth()->user()->id,
            ]);

            // Obtener los detalles pendientes del usuario actual que no tienen subcodigo
            $detallesPendientes = ModelsDetalleSolicitudPlanta::where('user_id', auth()->user()->id)
                ->whereNull('subcodigo')
                ->get();

            $iteracion = 0;
            foreach ($detallesPendientes as $detalle) {
                $iteracion++;
                $detalle->update([
                    'solicitud_planta_id' => $solicitud->id,
                    'subcodigo' => $solicitud->codigo . "-" . $iteracion,
                    'estado' => "Pendiente"
                ]);
            }
            
            
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect()->route('solicitudPlanta.index');
    }
}
