<?php

namespace App\Livewire\Uht;

use App\Models\AnalisisLinea;
use Livewire\Component;

class Temperatura extends Component
{


    public $resultados = [];
    public $editing = null; // Para rastrear qué fila se está editando

    protected $rules = [
        'resultados.*.tempUHT' => 'nullable|numeric',

    ];

    public function mount()
    {
        $this->loadData();
        // dd($this->resultados);
    }

    public function loadData()
    {
        $this->resultados = AnalisisLinea::where(function ($query) {
            $query->whereNull('tempUHT');
        })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.origen', function ($query) {
                $query->where('descripcion', 'like', '%ENVASADORA%');
            })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle.orp.producto.categoriaProducto', function ($query) {
                $query->where('grupo', 'UHT');
            })
            ->whereHas('solicitudAnalisisLinea.estadoPlanta.estadoDetalle.orp.producto.destinoProducto', function ($query) {
                $query->where('nombre', ['DE - La Paz', 'DE - El Alto']);
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
            // Actualiza los valores de tempUHT y volumen

            $resultado->tempUHT = $this->resultados[$index]['tempUHT'];
            $resultado->save(); // Guarda los cambios en la base de datos
        }

        $this->editing = null; // Finaliza la edición
        $this->loadData(); // Recarga los datos para reflejar los cambios
    }


    public function render()
    {
        return view('livewire.uht.temperatura');
    }
}
