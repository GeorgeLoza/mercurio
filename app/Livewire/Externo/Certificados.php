<?php
namespace App\Livewire\Externo;

use App\Models\ActividadAgua;
use App\Models\AguaFisico;
use App\Models\DetalleSolicitudPlanta;
use App\Models\MicrobiologiaExterno;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class Certificados extends Component
{
    use WithPagination;

    public $selectedOption = 'micro';

    public $f_codigo;
    public $f_producto;
    public $f_lote;
    public $f_estado;
    public $f_planta;

    public $aplicandoFiltros = false;
    public $filtro = false;

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
        $query1 = DetalleSolicitudPlanta::query()
        ->where('tipo_analisis', 'Fisicoquimico')
        ->when($this->f_codigo, function ($query) {
            $query->where('subcodigo', 'like', '%' . $this->f_codigo . '%');
        })
        ->when($this->f_producto, function ($query) {
            $query->whereHas('productosPlanta', function ($query) {
                $query->where('nombre', 'like', '%' . $this->f_producto . '%');
            });
        })
        ->when($this->f_lote, function ($query) {
            $query->where('lote', 'like', '%' . $this->f_lote . '%');
        })
        ->when($this->f_planta, function ($query) {
            $query->whereHas('user.planta', function ($query) {
                $query->where('nombre', 'like', '%' . $this->f_planta . '%');
            });
        })
        ->when($this->f_estado, function ($query) {
            $query->where('estado', 'like', '%' . $this->f_estado . '%');
        })
        ->when(auth()->check() && auth()->user()->role->id == 23, function ($query) {
            $query->whereHas('solicitudPlanta.user', function ($query) {
                $query->where('planta_id', auth()->user()->planta_id);
            });
        })
        ->orderBy('id', 'desc'); // Ordenar de manera descendente por ID

        $fisicos =  $query1->paginate(50)->withQueryString();





        return view('livewire.externo.certificados', [

            'fisicos' => $fisicos,
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
     // Nuevas propiedades para edición
    public $editandoId = null;
    public $campoEditando = null;
    public $valorTemporal = '';

    // ... (métodos existentes)

    // Métodos para edición
    public function iniciarEdicion($id, $campo, $valorActual = '')
    {
        $this->editandoId = $id;
        $this->campoEditando = $campo;
        $this->valorTemporal = $valorActual;
    }

    public function guardarEdicion()
    {
        if ($this->editandoId && $this->campoEditando) {
            $detalle = DetalleSolicitudPlanta::find($this->editandoId);
            
            // Crear relación si no existe
            if (!$detalle->actividadAgua) {
                $actividadAgua = new ActividadAgua();
                $actividadAgua->detalle_solicitud_planta_id = $detalle->id;
                $actividadAgua->save();
                $detalle->refresh();
            }
            
            // Actualizar el valor
            $detalle->actividadAgua->{$this->campoEditando} = $this->valorTemporal;
            $detalle->actividadAgua->save();
            
            // Resetear estado de edición
            $this->cancelarEdicion();
        }
    }

    public function cancelarEdicion()
    {
        $this->reset(['editandoId', 'campoEditando', 'valorTemporal']);
    }
}
