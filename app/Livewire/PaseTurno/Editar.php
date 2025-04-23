<?php

namespace App\Livewire\PaseTurno;

use App\Models\PaseTurno;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    public $observaciones;
    public $urgente;
    public $volumenes;
    public $area;
    public $id;

    // Campos para los volúmenes de cada tanque
    public $volumen = [
        'R1' => null,
        'R2' => null,
        'R3' => null,
        'MIX1' => null,
        'MIX2' => null,
        'MIX3' => null,
        'MIX4' => null,
        'TK41' => null,
        'TK42' => null,
        'TK10' => null,
        'TK5' => null,
        'TKMG' => null,
        'TKFG' => null,
        'TKMP' => null,
        'TKFP' => null,
        'TKCC' => null,
        'TKSC' => null,
        'TK11' => null,
    ];

    // Método mount para inicializar los valores cuando el componente se monta
    public function mount($id)
    {
        $paseTurno = PaseTurno::findOrFail($id);
        $this->id = $paseTurno->id;
        $this->observaciones = $paseTurno->observaciones;
        $this->urgente = $paseTurno->urgente;
        $this->area = $paseTurno->area;

        // Extraer los volúmenes del campo 'volumenes' en la base de datos
        $this->parseVolumenes($paseTurno->volumenes);
    }

    // Método para convertir el string de volúmenes en un array
    private function parseVolumenes($volumenes)
    {
        $lines = explode("\n", $volumenes); // Dividir las líneas del string
        foreach ($lines as $line) {
            if (preg_match('/(\w+):\s*(\d+)\s*\[Litros\]/', $line, $matches)) {
                $this->volumen[$matches[1]] = $matches[2]; // Extraer el tanque y el volumen
            }
        }
    }

    // Método para renderizar la vista de edición
    public function render()
    {
        return view('livewire.pase-turno.editar');
    }

    // Método para guardar los cambios
    public function save()
    {
        try {
            // Reconstruir el campo 'volumenes' a partir de los datos individuales
            $this->volumenes = '';
            foreach ($this->volumen as $key => $value) {
                if ($value) {
                    $this->volumenes .= "$key: $value [Litros]\n";
                }
            }

            // Actualizar el registro en la base de datos
            $paseTurno = PaseTurno::findOrFail($this->id);
            $paseTurno->update([
                'observaciones' => $this->observaciones,
                'urgente' => $this->urgente,
                'volumenes' => $this->volumenes,
                'area' => $this->area,
            ]);

            $this->dispatch('actualizar_reporte_pase');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Parte actualizado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }
}
