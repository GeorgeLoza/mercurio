<?php

namespace App\Livewire\Externo;

use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use Livewire\Component;
use Livewire\WithPagination;

class CertificadosMicrobiologia extends Component
{
    use WithPagination;
    public $page = 1;

    // Propiedades para filtros
    public $f_codigo;
    public $f_producto;
    public $f_lote;
    public $f_estado;
    public $f_planta;
    public $solicitudes;
    public $aplicandoFiltros = false;
    public $filtro = false;

    // Propiedades para edición
    public $editandoId = null;
    public $campoEditando = null;
    public $indiceEditando = 1; // 1 o 2 para valores primarios/secundarios
    public $valorTemporal = '';

    public function show_filtro()
    {
        $this->filtro = !$this->filtro;
    }

    public function aplicarFiltros()
    {
        $this->aplicandoFiltros = true;
        $this->resetPage();
    }

    public function limpiarFiltros()
    {
        $this->reset(['f_codigo', 'f_producto', 'f_lote', 'f_estado']);
        $this->aplicandoFiltros = false;
        $this->resetPage();
    }

    public function render()
    {
        $query = MicrobiologiaExterno::query()
            ->when($this->f_codigo, function ($query) {
                $query->whereHas('detalleSolicitudPlanta', function ($query) {
                    $query->where('subcodigo', 'like', '%' . $this->f_codigo . '%');
                });
            })
            ->when($this->f_producto, function ($query) {
                $query->whereHas('detalleSolicitudPlanta.productosPlanta', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_producto . '%');
                });
            })
            ->when($this->f_lote, function ($query) {
                $query->whereHas('detalleSolicitudPlanta', function ($query) {
                    $query->where('lote', 'like', '%' . $this->f_lote . '%');
                });
            })
            ->when($this->f_planta, function ($query) {
                $query->whereHas('detalleSolicitudPlanta.user.planta', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_planta . '%');
                });
            })
            ->when($this->f_estado, function ($query) {
                $query->whereHas('detalleSolicitudPlanta', function ($query) {
                    $query->where('estado', 'like', '%' . $this->f_estado . '%');
                });
            })
            ->when(auth()->check() && auth()->user()->role->id == 23, function ($query) {
                $query->whereHas('detalleSolicitudPlanta.solicitudPlanta.user', function ($query) {
                    $query->where('planta_id', auth()->user()->planta_id);
                });
            })
            ->orderBy('id', 'desc');

        $micros = $query->paginate(100)->withQueryString();

        return view('livewire.externo.certificados-microbiologia', [
            'micros' => $micros,
        ]);
    }

    public function cambiar_estado($id)
    {
        $registro = DetalleSolicitudPlanta::find($id);
        $registro->estado = 'Terminado';
        $registro->save();
    }

    public function cancelar($id)
    {
        $registro = DetalleSolicitudPlanta::find($id);
        $registro->estado = 'Cancelado';
        $registro->save();
    }

    public function generarTabla()
    {
        $this->solicitudes = DetalleSolicitudPlanta::select(
            'detalle_solicitud_plantas.subcodigo',
            'detalle_solicitud_plantas.tipo_analisis',
            'detalle_solicitud_plantas.otro',
            'users.nombre as usuario',
            'tipo_muestras.nombre as tipo_muestra',
            'productos_plantas.nombre as nombre_producto',
            'detalle_solicitud_plantas.lote',
            'detalle_solicitud_plantas.fecha_elaboracion',
            'detalle_solicitud_plantas.fecha_vencimiento',
            'detalle_solicitud_plantas.fecha_muestreo',
            'microbiologia_externos.fecha_sembrado',
            'solicitud_plantas.tiempo'
        )
        ->leftJoin('solicitud_plantas', 'detalle_solicitud_plantas.solicitud_planta_id', '=', 'solicitud_plantas.id')
        ->leftJoin('users', 'solicitud_plantas.user_id', '=', 'users.id')
        ->leftJoin('tipo_muestras', 'detalle_solicitud_plantas.tipo_muestra_id', '=', 'tipo_muestras.id')
        ->leftJoin('productos_plantas', 'detalle_solicitud_plantas.productos_planta_id', '=', 'productos_plantas.id')
        ->leftJoin('microbiologia_externos', 'detalle_solicitud_plantas.id', '=', 'microbiologia_externos.detalle_solicitud_planta_id')
        ->where('users.nombre', 'Rosa')
        ->get()
        ->toArray();
    }

    // Métodos para edición
    public function iniciarEdicion($id, $campo, $indice = 1, $valorActual = null)
    {
        $this->editandoId = $id;
        $this->campoEditando = $campo;
        $this->indiceEditando = $indice;
        $this->valorTemporal = ($valorActual === null || $valorActual === 'null') ? '' : $valorActual;
    }

    public function guardarEdicion()
    {
        if ($this->editandoId && $this->campoEditando) {
            $micro = MicrobiologiaExterno::find($this->editandoId);
            
            // Determinar el campo real (ej: aer_mes o aer_mes2)
            $campoReal = $this->indiceEditando == 2 
                ? $this->campoEditando . '2' 
                : $this->campoEditando;
            
            // Convertir y guardar el valor
            $value = trim($this->valorTemporal);
            
            if ($value === 'MNPC') {
                $micro->$campoReal = 1000000;
            } elseif ($value === '' || $value === '--') {
                $micro->$campoReal = null;
            } else {
                // Convertir valores numéricos
                $micro->$campoReal = (int)$value;
            }
            
            $micro->save();
            
            // Preparar para siguiente campo
            $this->dispatch('focusNextField', [
                'campo' => $this->campoEditando,
                'indice' => $this->indiceEditando,
                'currentId' => $this->editandoId
            ]);
            
            // Resetear estado de edición
            $this->reset(['editandoId', 'campoEditando', 'indiceEditando', 'valorTemporal']);
        }
    }

    public function cancelarEdicion()
    {
        $this->reset(['editandoId', 'campoEditando', 'indiceEditando', 'valorTemporal']);
    }
}