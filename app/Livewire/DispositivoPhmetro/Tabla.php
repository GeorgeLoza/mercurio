<?php

namespace App\Livewire\DispositivoPhmetro;

use App\Models\DispositivoPhmetro;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    public $f_fecha_hora = null;
    public $dispositivo = null;

    #[On('actualizar_dispositivo_phmetro')]
    public function render()
    {
        $phmetros = DispositivoPhmetro::query()
            ->when($this->f_fecha_hora, function ($query) {
                return $query->where('fecha_hora', 'like', '%' . $this->f_fecha_hora . '%');
            })
            ->when($this->dispositivo, function ($query) {
                return $query->where('dispositivos_medicion_id', $this->dispositivo);
            })
            ->orderBy('fecha_hora', 'desc')
            ->paginate(15);

        return view('livewire.dispositivo-phmetro.tabla', [
            'phmetros' => $phmetros,
        ]);
    }
    
    public function pdf()
    {
        $phmetros = DispositivoPhmetro::all();

        return response()->streamDownload(
            function () use ($phmetros) {
                $pdf = Pdf::loadView('pdf.reportes.phmetro', compact('phmetros'));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
            'phmetroReporte.pdf'
        );
    }
    
}
