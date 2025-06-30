<?php

namespace App\Livewire\Seguimiento;

use Carbon\Carbon;
use App\Models\Origen;
use App\Models\Seguimiento;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Orp as ModelsOrp;
use App\Models\User;
use Livewire\Component;

use Illuminate\Support\Facades\App;

class Orp extends Component
{
    public $buscar_orp = '';
    public $orp_id;



    public function generar()
    {
        return response()->streamDownload(
            function () {
                $orps = ModelsOrp::findOrFail($this->orp_id);

                $seguimientos = Seguimiento::with(['origen'])
                    ->whereJsonContains('orp_ids', (int) $this->orp_id)
                    ->get()
                    ->groupBy('numero');


                $seguimientos2 = Seguimiento::with('origen')
                    ->whereJsonContains('orp_ids', (int) $this->orp_id)
                    ->get();

                $conteoPorOrigen = $seguimientos2
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


                $origenes = Origen::whereBetween('id', [27, 33])->pluck('alias', 'id'); // Para construir el header de la tabla

                // $ids = Seguimiento::select('usuario_siembra', 'usuario_rt', 'usuario_moho')
                //     ->get()
                //     ->flatMap(function ($item) {
                //         return [$item->usuario_siembra, $item->usuario_rt, $item->usuario_moho];
                //     })
                //     ->filter() // elimina nulls
                //     ->unique()
                //     ->values(); // reindexa

                $ids_siembra = Seguimiento::whereJsonContains('orp_ids', (int) $this->orp_id)
                    ->whereNotNull('usuario_siembra')
                    ->pluck('usuario_siembra')
                    ->unique()
                    ->values();

                $ids_rt = Seguimiento::whereJsonContains('orp_ids', (int) $this->orp_id)
                    ->whereNotNull('usuario_siembra')
                    ->pluck('usuario_rt')
                    ->unique()
                    ->values();

                $ids_moho = Seguimiento::whereJsonContains('orp_ids', (int) $this->orp_id)
                    ->whereNotNull('usuario_siembra')
                    ->pluck('usuario_moho')
                    ->unique()
                    ->values();


                // Resultado: colección de IDs únicos

                $usuariosSiembra = User::whereIn('id', $ids_siembra)->get();
                $usuariosRt = User::whereIn('id', $ids_rt)->get();
                $usuariosMoho = User::whereIn('id', $ids_moho)->get();


                $pdf = App::make('dompdf.wrapper');
                $pdf = Pdf::loadView('pdf.reportes.seguimientoUHT', compact(['seguimientos', 'orps', 'origenes', 'conteoPorOrigen', 'usuariosSiembra', 'usuariosRt', 'usuariosMoho']));
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
            ->whereDate('created_at', '>=', Carbon::parse('2025-03-23'))
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
