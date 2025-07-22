<?php

namespace App\Livewire\Liberacion;

use App\Models\Liberacion;
use App\Models\LiberacionDetalle;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

 public $editing = null; // [detalle_id, campo]
    public $editedValue = '';


    #[On('actualizar_tabla_liberacion')]
    public function render()
    {
        $liberaciones = Liberacion::with([
            'orp:id,id,codigo,producto_id,fecha_vencimiento1,tiempo_elaboracion',
            'orp.producto:id,id,nombre',
            'detalles',
            'detalles.origen:id,id,alias',
            'detalles.user:id,id,nombre',
        ])
            ->orderByDesc('id')
            ->paginate(9);

        return view('livewire.liberacion.tabla', compact('liberaciones'));
    }



    public function eliminar($id)
    {
        $microbiologia = LiberacionDetalle::findOrFail($id);
        $microbiologia->delete();
    }

     // Activa el modo edición
    public function editCell($detalleId, $field, $value)
    {
        $this->editing = [$detalleId, $field];
        $this->editedValue = $value;
    }

    // Guarda los cambios y avanza a la siguiente celda
    public function saveCell()
    {
        if ($this->editing) {
            [$detalleId, $field] = $this->editing;
            
            $detalle = LiberacionDetalle::find($detalleId);
            if ($detalle) {
                // Conversión de tipos para campos específicos
                $value = match($field) {
                    'color', 'olor', 'sabor' => (bool)$this->editedValue,
                    'peso', 'temperatura', 'ph', 'brix', 'acidez', 'viscosidad' => (float)$this->editedValue,
                    default => $this->editedValue
                };
                
                $detalle->update([$field => $value]);
            }
        }
        
        $this->moveToNextCell();
    }

    // Mueve el foco a la siguiente celda
    private function moveToNextCell()
    {
        if (!$this->editing) return;
        
        [$currentDetalleId, $currentField] = $this->editing;
        $fieldsOrder = [
            'origen_id', 'hora_sachet', 'peso', 
            'temperatura', 'ph', 'brix', 'acidez', 
            'viscosidad', 'color', 'olor', 'sabor'
        ];
        
        // Busca la posición actual
        $currentIndex = array_search($currentField, $fieldsOrder);
        $nextField = $fieldsOrder[$currentIndex + 1] ?? $fieldsOrder[0];
        
        // Busca el siguiente detalle si es necesario
        $nextDetalleId = $currentDetalleId;
        if ($currentIndex === count($fieldsOrder)) {
            $currentDetalle = LiberacionDetalle::find($currentDetalleId);
            $nextDetalle = LiberacionDetalle::where('liberacion_id', $currentDetalle->liberacion_id)
                ->where('id', '>', $currentDetalleId)
                ->orderBy('id')
                ->first();
            
            if ($nextDetalle) {
                $nextDetalleId = $nextDetalle->id;
            }
        }
        
        $this->editing = [$nextDetalleId, $nextField];
        $this->editedValue = LiberacionDetalle::find($nextDetalleId)->{$nextField} ?? '';
    }
}
