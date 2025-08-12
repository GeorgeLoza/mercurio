<?php

namespace App\Livewire\Liberacion;

use App\Models\Liberacion;
use App\Models\LiberacionDetalle;
use App\Models\Origen;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Detalle extends ModalComponent
{
    public $editing = null;           // [detalle_id, campo]
    public $editedValue = '';
    public $id;
    public $liberacion;
    public $origenes;
    public $lastEditedCell = null;

    protected function getListeners()
    {
        return [
            'editCell',
            'saveCell',
        ];
    }

    public function mount($id)
    {
        $this->id = $id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->liberacion = Liberacion::with('detalles.origen')->findOrFail($this->id);
        $this->origenes = Origen::whereHas('estadoPlanta.estadoDetalle', function ($query) {
            $query->where('orp_id', $this->liberacion->orp_id);
        })
        ->where('descripcion', 'like', '%ENVASADORA%')
        ->get();
    }

    // Pone el cell en modo edición y carga editedValue
    public function editCell($detalleId, $field, $value)
    {
        $this->editing        = [$detalleId, $field];
        $this->editedValue    = in_array($field, ['color','olor','sabor'])
                                 ? (int)$value
                                 : $value;
        $this->lastEditedCell = [$detalleId, $field];
    }

    // Guarda y avanza internamente por Livewire
    public function saveCell()
    {
        $this->performSave();
        $this->moveNext();
    }

    private function performSave()
    {
        if (! $this->editing) return;

        [$detalleId, $field] = $this->editing;
        $detalle = LiberacionDetalle::find($detalleId);

        if ($detalle) {
            $value = match ($field) {
                'color','olor','sabor' => (bool)$this->editedValue,
                'peso','temperatura','ph','brix','acidez','viscosidad' => (float)$this->editedValue,
                default => $this->editedValue,
            };
            $detalle->update([$field => $value]);
            $this->loadData();
        }

        $this->editing = null;
    }

    private function moveNext()
    {
        if (! $this->lastEditedCell) return;

        [$currentId, $currentField] = $this->lastEditedCell;
        $fields = [
            'origen_id','hora_sachet','peso','temperatura','ph',
            'brix','acidez','viscosidad','color','olor','sabor'
        ];
        $i = array_search($currentField, $fields);
        $nextField = $fields[($i + 1) % count($fields)];

        // misma fila, mismo id si no es wrap-around de campo
        $nextId = $currentId;

        // si era última columna, avanzar fila
        if ($i === count($fields) - 1) {
            $detalle = LiberacionDetalle::find($currentId);
            $siguiente = LiberacionDetalle::where('liberacion_id', $detalle->liberacion_id)
                ->where('id', '>', $currentId)
                ->orderBy('id')
                ->first();

            if ($siguiente) {
                $nextId = $siguiente->id;
            } else {
                // crear nuevo detalle
                $new = LiberacionDetalle::create([
                    'liberacion_id' => $detalle->liberacion_id,
                    'origen_id'     => $detalle->origen_id,
                    'hora_sachet'   => now()->format('H:i'),
                    'peso'          => 0,
                    'temperatura'   => 0,
                    'ph'            => 0,
                    'brix'          => 0,
                    'acidez'        => 0,
                    'viscosidad'    => 0,
                    'color'         => true,
                    'olor'          => true,
                    'sabor'         => true,
                    'user_id'       => auth()->id(),
                ]);
                $nextId = $new->id;
                $this->loadData();
            }
        }

        // Disparar JS para reestablecer foco en el siguiente
        $this->dispatch('focus-cell');
        $this->editCell($nextId, $nextField, $this->getValue($nextId, $nextField));
    }

    private function getValue($detalleId, $field)
    {
        $det = LiberacionDetalle::find($detalleId);
        return $det ? $det->$field : '';
    }

    public function render()
    {
        return view('livewire.liberacion.detalle');
    }
}
