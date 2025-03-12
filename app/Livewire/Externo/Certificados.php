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

        $fisicos = $this->aplicandoFiltros ? $query1->get() : $query1->paginate(100)->withQueryString();






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
}
