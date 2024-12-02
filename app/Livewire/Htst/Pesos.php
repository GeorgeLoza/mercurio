<?php

namespace App\Livewire\Htst;

use App\Models\AnalisisLinea;
use Livewire\Component;

class Pesos extends Component
{
    public $resultados = [];
    public $editing = null; // Para rastrear qué fila se está editando

    protected $rules = [
        'resultados.*.peso' => 'nullable|numeric',
        'resultados.*.volumen' => 'nullable|numeric',
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->resultados = AnalisisLinea::where(function ($query) {
            $query->whereNull('peso');
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.origen', function ($query) {
                $query->where('descripcion', 'like', '%ENVASADORA%');
            })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle.orp.producto.categoriaProducto', function ($query) {
                $query->where('grupo', 'HTST');
            })
            ->where('created_at', '>=', now()->subHours(3))
            ->get(); // Mantener como colección de Eloquent
    }

    public function edit($index)
    {
        $this->editing = $index;
    }

    public function cancelEdit()
    {
        $this->editing = null;
        $this->loadData(); // Recargar datos originales si se cancela la edición
    }

    public function save($index)
    {
        $this->validate();
    
        // Obtén la instancia del modelo para el índice actual
        $resultado = AnalisisLinea::find($this->resultados[$index]['id']);
    
        if ($resultado) {
            // Actualiza los valores de peso y volumen
            $resultado->peso = $this->resultados[$index]['peso'];
            $resultado->save(); // Guarda los cambios en la base de datos
        }
    
        $this->editing = null; // Finaliza la edición
        $this->loadData(); // Recarga los datos para reflejar los cambios
    }

    public function render()
    {
        return view('livewire.htst.pesos');
    }
}
