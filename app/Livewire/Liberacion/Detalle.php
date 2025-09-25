<?php

namespace App\Livewire\Liberacion;

use App\Models\Liberacion;
use App\Models\LiberacionDetalle;
use App\Models\Origen;
use LivewireUI\Modal\ModalComponent;

class Detalle extends ModalComponent
{
    public $id;
    public $liberacion;
    public $origenes;
    public $mode = [];      // 'all' o array de campos
    public $values = [];    // valores temporales por detalle_id

    public function mount($id, $mode = 'all')
    {
        $this->id = $id;
        $this->mode = $mode;
        $this->loadData();
    }

    public function loadData()
    {
        $this->liberacion = Liberacion::with('detalles.origen')->findOrFail($this->id);

        $this->origenes = Origen::whereHas('estadoPlanta.estadoDetalle', function ($q) {
            $q->where('orp_id', $this->liberacion->orp_id);
        })
            ->where('descripcion', 'like', '%ENVASADORA%')
            ->get();

        $this->values = [];
        foreach ($this->liberacion->detalles as $detalle) {
            $this->values[$detalle->id] = [
                'origen_id'    => $detalle->origen_id,
                'hora_sachet'  => $detalle->hora_sachet,
                'peso'         => $detalle->peso,
                'lote'         => $detalle->lote,
                'temperatura'  => $detalle->temperatura,
                'ph'           => $detalle->ph,
                'brix'         => $detalle->brix,
                'acidez'       => $detalle->acidez,
                'viscosidad'   => $detalle->viscosidad,
                'color'        => (bool)$detalle->color,
                'olor'         => (bool)$detalle->olor,
                'sabor'        => (bool)$detalle->sabor,
                'observaciones' => $detalle->observaciones ?? '',
            ];
        }
    }

    /**
     * Guarda todos los valores (botón Guardar)
     */
    public function saveAll()
    {
        foreach ($this->values as $detalleId => $data) {
            $detalle = LiberacionDetalle::find($detalleId);
            if (!$detalle) continue;

            // Normalizar booleanos (checkboxes pueden venir como "on" o true/false)
            foreach (['color', 'olor', 'sabor'] as $b) {
                if (array_key_exists($b, $data)) {
                    $data[$b] = filter_var($data[$b], FILTER_VALIDATE_BOOLEAN);
                }
            }

            // Campos nullable que deben convertirse a null si vienen vacíos o como "null"
            $nullableFields = ['origen_id', 'peso','lote', 'temperatura', 'ph', 'brix', 'acidez', 'viscosidad'];
            foreach ($nullableFields as $field) {
                if (array_key_exists($field, $data)) {
                    if ($data[$field] === '' || $data[$field] === 'null') {
                        $data[$field] = null;
                    }
                }
            }

              // Asignar siempre el user_id autenticado
        $data['user_id'] = auth()->id();
            // Para otros campos que no son nullable, dejar los valores tal como vienen
            $detalle->update($data);
        }

        $this->loadData();
        $this->dispatch('saved');
        $this->dispatch('actualizar_tabla_liberacion');
        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.liberacion.detalle');
    }
}
