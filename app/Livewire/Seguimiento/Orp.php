<?php

namespace App\Livewire\Seguimiento;

use Carbon\Carbon;
use App\Models\Origen;
use App\Models\Seguimiento;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Orp as ModelsOrp;
use Livewire\Component;

use Illuminate\Support\Facades\App;

class Orp extends Component
{
    public $buscar_orp = '';
    public $orp_id  ;



    public function generar()
    {
        return response()->streamDownload(
            function () {
                $orps = ModelsOrp::findOrFail($this->orp_id);

                $seguimientos = Seguimiento::with(['origen'])
                ->whereJsonContains('orp_ids', (int) $this->orp_id)
                ->get()
                ->groupBy('numero');

            $origenes = Origen::whereBetween('id', [27, 33])->pluck('alias', 'id'); // Para construir el header de la tabla

                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.seguimientoUHT', compact(['seguimientos', 'orps','origenes']));
                $pdf->setPaper('letter', 'portrait');
                echo $pdf->stream();
            },
           "seguimiento.pdf"
        );
    }


    public function render()
    {

        $orps = ModelsOrp::whereHas('producto.categoriaProducto', function ($query) {
                $query->where('grupo', 'UHT');
            })
            ->where('estado', 'Completado')
            ->whereDate('created_at', '>=', Carbon::parse('2024-03-23'))
            ->when($this->buscar_orp, function ($query) {
                $query->where('codigo', 'like', '%' . $this->buscar_orp . '%');
            })
            ->orderBy('id', 'desc')
            ->get();


            $seguimientos = Seguimiento::with('origen')
            ->whereJsonContains('orp_ids', (int) $this->orp_id)
            ->get();

            $conteoPorOrigen = $seguimientos
            ->groupBy('origen_id')
            ->map(function ($items, $origen_id) {
                $alias = optional($items->first()->origen)->alias;
                $total = $items->count();
                $conEspacioRT = $items->where('rt', '>', 0)->count();

                $conMoho = $items->where('moho', '>', 0)->count(); // 👈 Nuevo campo

                $conMoho2 = $items->filter(fn($item) => !is_null($item->moho))->count();
                return [
                    'alias' => $alias,
                    'con_espacio_rt' => $conEspacioRT,

                    'con_moho' => $conMoho, // 👈 Lo agregamos al array
                    'con_moho2' => $conMoho2, // 👈 Lo agregamos al array
                    'total' => $total,
                ];
            })->values();

        return view('livewire.seguimiento.orp', [
            'orps' => $orps, // Cargar todas las ORP
            'seguimientos' => $seguimientos, // Cargar todas las ORP
            'conteoPorOrigen' => $conteoPorOrigen, // Cargar todas las ORP
        ]);


    }
}
