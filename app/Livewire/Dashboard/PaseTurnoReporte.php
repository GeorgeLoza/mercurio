<?php

namespace App\Livewire\Dashboard;

use App\Models\Orp;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\EstadoPlanta;
use App\Models\AnalisisLinea;
use App\Models\EstadoDetalle;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\DB;
use App\Models\SolicitudAnalisisLinea;


class PaseTurnoReporte extends Component
{
    public $R1;
    public $R2;
    public $R3;
    public $TK41;
    public $TKMIX3;
    public $TK42;
    public $TKMIX1;
    public $TKMIX2;
    public $TKMIX4;
    public $TtkQuesos;
    public $marmita;
    public $TK10;
    public $TKFP;
    public $TKMP;
    public $TK5;
    public $TKFG;
    public $TKMG;
    public $TKCC;
    public $TKSC;
    public $TKAUX1;
    public $TKAUX2;

    //seccion soya
    public $TKSY;
    public $l1;
    public $l2;
    public $l3;

    //PASTEURIZADORES
    public $maguer;
    public $tetra;
    public $ultra;
    //ENVASADORAS
    //grupo1
    public $HTST_1A, $HTST_1B, $HTST_1C;
    public $HTST_2A, $HTST_2B, $HTST_2C;
    //grupo2
    public $HTST_3A, $HTST_3B, $HTST_3C;
    public $HTST_4A, $HTST_4B, $HTST_4C;
    public $HTST_5A, $HTST_5B, $HTST_5C;
    //grupo3
    public $UHT_1A, $UHT_1B, $UHT_1C;
    public $UHT_2A, $UHT_2B;
    public $UHT_3A, $UHT_3B;
    //grupo4
    public $V1, $V2, $V3;
    //grupo5
    public $araña;
    public $groupedResults;
    public $orps;

    public $groupedResultshtst;
    public $groupedResultsuht;
    public $groupedResultsvasos;
    public $groupedResultssoya;
    public $groupedResultsaranas;

    //grupos reales

    public int $htst_env=0;
    public $uht_env=0;
    public $soya_env=0;
    public $vasos_env=0;

    #[On('actualizar_dashboardPlanta')]
    public function render()
    {
        ini_set('max_execution_time', 300);
        ini_set('memory_limit', '512M');
        
        // Subconsulta para obtener el último registro por origen_id
        $latestEstadoPlantas = DB::table('estado_plantas')
            ->select('origen_id', DB::raw('MAX(created_at) as max_created_at'))
            ->where('etapa_id', 8)
            ->groupBy('origen_id');

        // Obtener los registros más recientes de estado_plantas
        $latestEstadoPlantasDetails = DB::table('estado_plantas as ep')
            ->joinSub($latestEstadoPlantas, 'latest_estado_plantas', function ($join) {
                $join->on('ep.origen_id', '=', 'latest_estado_plantas.origen_id')
                    ->on('ep.created_at', '=', 'latest_estado_plantas.max_created_at');
            })
            ->select('ep.origen_id', 'ep.id as estado_planta_id'); // Asegúrate de incluir origen_id, estado_planta_id y estado

        // Obtener los detalles de estado_detalles relacionados con los registros más recientes
        $results = DB::table('estado_detalles as ed')
            ->joinSub($latestEstadoPlantasDetails, 'latest_estado_plantas_details', function ($join) {
                $join->on('ed.estado_planta_id', '=', 'latest_estado_plantas_details.estado_planta_id');
            })
            ->join('origens as o', 'latest_estado_plantas_details.origen_id', '=', 'o.id') // Unimos con la tabla origenes para obtener el alias
            ->where(function ($query) {
                $query->whereIn('o.id', range(27, 48))  // Incluye los IDs del 27 al 48
                    ->orWhereBetween('o.id', [50, 53])
                    ->orWhereBetween('o.id', [57, 59]); // Incluye los IDs del 50 al 53
            })
            ->select('ed.orp_id', 'ed.preparacion', 'o.id as origen_id', 'o.alias')
            ->orderBy('o.alias', 'asc') // Ordenar alias ascendentemente
            ->get();



            $resultsuht = DB::table('estado_detalles as ed')
            ->joinSub($latestEstadoPlantasDetails, 'latest_estado_plantas_details', function ($join) {
                $join->on('ed.estado_planta_id', '=', 'latest_estado_plantas_details.estado_planta_id');
            })
            ->join('origens as o', 'latest_estado_plantas_details.origen_id', '=', 'o.id') // Unimos con la tabla origenes para obtener el alias
            ->where(function ($query) {
                $query->whereIn('o.id', range(27, 33)); // Incluye los IDs del 50 al 53
            })
            ->select('ed.orp_id', 'ed.preparacion', 'o.id as origen_id', 'o.alias')
            ->orderBy('o.alias', 'asc') // Ordenar alias ascendentemente
            ->get();


            $resultshtst = DB::table('estado_detalles as ed')
            ->joinSub($latestEstadoPlantasDetails, 'latest_estado_plantas_details', function ($join) {
                $join->on('ed.estado_planta_id', '=', 'latest_estado_plantas_details.estado_planta_id');
            })
            ->join('origens as o', 'latest_estado_plantas_details.origen_id', '=', 'o.id') // Unimos con la tabla origenes para obtener el alias
            ->where(function ($query) {
                $query->whereIn('o.id', range(34, 48)); // Incluye los IDs del 50 al 53
            })
            ->select('ed.orp_id', 'ed.preparacion', 'o.id as origen_id', 'o.alias')
            ->orderBy('o.alias', 'asc') // Ordenar alias ascendentemente
            ->get();



            $resultsvasos = DB::table('estado_detalles as ed')
            ->joinSub($latestEstadoPlantasDetails, 'latest_estado_plantas_details', function ($join) {
                $join->on('ed.estado_planta_id', '=', 'latest_estado_plantas_details.estado_planta_id');
            })
            ->join('origens as o', 'latest_estado_plantas_details.origen_id', '=', 'o.id') // Unimos con la tabla origenes para obtener el alias
            ->where(function ($query) {
                $query->whereIn('o.id', range(50, 52)); // Incluye los IDs del 50 al 53
            })
            ->select('ed.orp_id', 'ed.preparacion', 'o.id as origen_id', 'o.alias')
            ->orderBy('o.alias', 'asc') // Ordenar alias ascendentemente
            ->get();



            $resultsaranas = DB::table('estado_detalles as ed')
            ->joinSub($latestEstadoPlantasDetails, 'latest_estado_plantas_details', function ($join) {
                $join->on('ed.estado_planta_id', '=', 'latest_estado_plantas_details.estado_planta_id');
            })
            ->join('origens as o', 'latest_estado_plantas_details.origen_id', '=', 'o.id') // Unimos con la tabla origenes para obtener el alias
            ->where(function ($query) {
                $query->whereIn('o.id', range(53, 53)); // Incluye los IDs del 50 al 53
            })
            ->select('ed.orp_id', 'ed.preparacion', 'o.id as origen_id', 'o.alias')
            ->orderBy('o.alias', 'asc') // Ordenar alias ascendentemente
            ->get();
            
            $resultssoya = DB::table('estado_detalles as ed')
            ->joinSub($latestEstadoPlantasDetails, 'latest_estado_plantas_details', function ($join) {
                $join->on('ed.estado_planta_id', '=', 'latest_estado_plantas_details.estado_planta_id');
            })
            ->join('origens as o', 'latest_estado_plantas_details.origen_id', '=', 'o.id') // Unimos con la tabla origenes para obtener el alias
            ->where(function ($query) {
                $query->whereIn('o.id', range(57, 59)); // Incluye los IDs del 50 al 53
            })
            ->select('ed.orp_id', 'ed.preparacion', 'o.id as origen_id', 'o.alias')
            ->orderBy('o.alias', 'asc') // Ordenar alias ascendentemente
            ->get();

        // Agrupar resultados por orp_id y preparacion
        $this->groupedResults = $results->groupBy(function ($item) {

            return $item->orp_id . '|' . $item->preparacion;
        });
        $this->groupedResultshtst = $resultshtst->groupBy(function ($item) {

            return $item->orp_id . '|' . $item->preparacion;
        });
        $this->groupedResultsuht = $resultsuht->groupBy(function ($item) {

            return $item->orp_id . '|' . $item->preparacion;
        });
        $this->groupedResultsvasos = $resultsvasos->groupBy(function ($item) {

            return $item->orp_id . '|' . $item->preparacion;
        });
        $this->groupedResultssoya = $resultssoya->groupBy(function ($item) {

            return $item->orp_id . '|' . $item->preparacion;
        });

        $this->groupedResultsaranas = $resultsaranas->groupBy(function ($item) {

            return $item->orp_id . '|' . $item->preparacion;
        });

        // Cargar todos los objetos Orp para evitar múltiples consultas en la vista
        $this->orps = \App\Models\Orp::whereIn('id', $results->pluck('orp_id')->unique())->get()->keyBy('id');



        //R1
        $this->R1 = EstadoPlanta::where('origen_id', '6')->latest('created_at')->first();
        //R2
        $this->R2 = EstadoPlanta::where('origen_id', '7')->latest('created_at')->first();
        //R3
        $this->R3 = EstadoPlanta::where('origen_id', '8')->latest('created_at')->first();
        //TK41
        $this->TK41 = EstadoPlanta::where('origen_id', '9')->latest('created_at')->first();
        //TKMIX3
        $this->TKMIX3 = EstadoPlanta::where('origen_id', '10')->latest('created_at')->first();
        //TKMIX2
        $this->TKMIX2 = EstadoPlanta::where('origen_id', '11')->latest('created_at')->first();
        //TK42
        $this->TK42 = EstadoPlanta::where('origen_id', '12')->latest('created_at')->first();
        //TKMIX4
        $this->TKMIX1 = EstadoPlanta::where('origen_id', '13')->latest('created_at')->first();
        //TKMIX1
        $this->TKMIX4 = EstadoPlanta::where('origen_id', '14')->latest('created_at')->first();
        //TtkQuesos
        $this->TtkQuesos = EstadoPlanta::where('origen_id', '15')->latest('created_at')->first();
        //marmita
        $this->marmita = EstadoPlanta::where('origen_id', '16')->latest('created_at')->first();
        //TK10
        $this->TK10 = EstadoPlanta::where('origen_id', '17')->latest('created_at')->first();
        //TKFP
        $this->TKFP = EstadoPlanta::where('origen_id', '18')->latest('created_at')->first();
        //TKFP
        $this->TKMP = EstadoPlanta::where('origen_id', '49')->latest('created_at')->first();
        //TK5
        $this->TK5 = EstadoPlanta::where('origen_id', '19')->latest('created_at')->first();
        //TKFG
        $this->TKFG = EstadoPlanta::where('origen_id', '20')->latest('created_at')->first();
        //TKMG
        $this->TKMG = EstadoPlanta::where('origen_id', '21')->latest('created_at')->first();
        //TKCC
        $this->TKCC = EstadoPlanta::where('origen_id', '22')->latest('created_at')->first();
        //TKSC
        $this->TKSC = EstadoPlanta::where('origen_id', '23')->latest('created_at')->first();
        //TKAUX1
        $this->TKAUX1 = EstadoPlanta::where('origen_id', '54')->latest('created_at')->first();
        //TKAUX2
        $this->TKAUX2 = EstadoPlanta::where('origen_id', '55')->latest('created_at')->first();
        //maguer
        $this->maguer = EstadoPlanta::where('origen_id', '24')->latest('created_at')->first();

        //tetra
        $this->tetra = EstadoPlanta::where('origen_id', '25')->latest('created_at')->first();
        //ultra
        $this->ultra = EstadoPlanta::where('origen_id', '26')->latest('created_at')->first();

        //SECCION SOYA
        //TKSY
        $this->TKSY = EstadoPlanta::where('origen_id', '56')->latest('created_at')->first();
        //L1
        $this->l1 = EstadoPlanta::where('origen_id', '57')->latest('created_at')->first();
        //L2
        $this->l2 = EstadoPlanta::where('origen_id', '58')->latest('created_at')->first();
        //L3
        $this->l3 = EstadoPlanta::where('origen_id', '59')->latest('created_at')->first();

        //CONULTA DE ENVASADORAS
        //HTST
        $this->HTST_1A = EstadoPlanta::where('origen_id', '48')->latest('created_at')->first();
        $this->HTST_1B = EstadoPlanta::where('origen_id', '47')->latest('created_at')->first();
        $this->HTST_1C = EstadoPlanta::where('origen_id', '46')->latest('created_at')->first();

        $this->HTST_2A = EstadoPlanta::where('origen_id', '45')->latest('created_at')->first();
        $this->HTST_2B = EstadoPlanta::where('origen_id', '44')->latest('created_at')->first();
        $this->HTST_2C = EstadoPlanta::where('origen_id', '43')->latest('created_at')->first();

        $this->HTST_3A = EstadoPlanta::where('origen_id', '42')->latest('created_at')->first();
        $this->HTST_3B = EstadoPlanta::where('origen_id', '41')->latest('created_at')->first();
        $this->HTST_3C = EstadoPlanta::where('origen_id', '40')->latest('created_at')->first();

        $this->HTST_4A = EstadoPlanta::where('origen_id', '39')->latest('created_at')->first();
        $this->HTST_4B = EstadoPlanta::where('origen_id', '38')->latest('created_at')->first();
        $this->HTST_4C = EstadoPlanta::where('origen_id', '37')->latest('created_at')->first();

        $this->HTST_5A = EstadoPlanta::where('origen_id', '36')->latest('created_at')->first();
        $this->HTST_5B = EstadoPlanta::where('origen_id', '35')->latest('created_at')->first();
        $this->HTST_5C = EstadoPlanta::where('origen_id', '34')->latest('created_at')->first();


        //UHT
        $this->UHT_1A = EstadoPlanta::where('origen_id', '27')->latest('created_at')->first();
        $this->UHT_1B = EstadoPlanta::where('origen_id', '28')->latest('created_at')->first();
        $this->UHT_1C = EstadoPlanta::where('origen_id', '29')->latest('created_at')->first();

        $this->UHT_2A = EstadoPlanta::where('origen_id', '30')->latest('created_at')->first();
        $this->UHT_2B = EstadoPlanta::where('origen_id', '31')->latest('created_at')->first();

        $this->UHT_3A = EstadoPlanta::where('origen_id', '32')->latest('created_at')->first();
        $this->UHT_3B = EstadoPlanta::where('origen_id', '33')->latest('created_at')->first();

        //VASOS
        $this->V1 = EstadoPlanta::where('origen_id', '50')->latest('created_at')->first();
        $this->V2 = EstadoPlanta::where('origen_id', '51')->latest('created_at')->first();
        $this->V3 = EstadoPlanta::where('origen_id', '52')->latest('created_at')->first();


        //ARAñA
        $this->araña = EstadoPlanta::where('origen_id', '53')->latest('created_at')->first();



        //consultas para ver las orp en las envasadoras
        $this->orps = \App\Models\Orp::whereIn('id', $results->pluck('orp_id')->unique())->get()->keyBy('id');









        return view('livewire.dashboard.pase-turno-reporte');






    }


    public function solicitar($id)
{
    // Verificar si existen registros en EstadoPlanta con el estado_planta_id dado
    $estadoPlantaExiste = EstadoDetalle::where('estado_planta_id', $id)->exists();

    if (!$estadoPlantaExiste) {
        // Si no existen registros, retorna un mensaje de error
        $this->dispatch('error_mensaje', mensaje: 'No se encontró ningún registro de EstadoPlanta con el ID proporcionado.');
        return;
    }

    // Si hay registros, procede con el resto del código
    try {
        $solicitud = SolicitudAnalisisLinea::create([
            'tiempo' => now(),
            'user_id' => auth()->user()->id,
            'estado_planta_id' => $id,
            'estado' => 'Pendiente',
        ]);
        $id_sol = $solicitud->id;

        AnalisisLinea::create([
            'solicitud_analisis_linea_id' => $id_sol,
            'olor' => 1,
            'color' => 1,
            'sabor' => 1,
        ]);

        $this->dispatch('success', mensaje: 'Solicitud registrada exitosamente');
    } catch (\Throwable $th) {
        $this->dispatch('error_mensaje', mensaje: 'Hubo un problema: ' . $th->getMessage());
    }
}

 public function mantenimiento($id)
    {
        try {
            EstadoPlanta::create([
                'tiempo' => now(),
                'user_id' => auth()->user()->id,
                'origen_id' => $id,
                'proceso' => 'Mantenimiento',
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function limpieza($id)
    {
        try {
            EstadoPlanta::create([
                'tiempo' => now(),
                'user_id' => auth()->user()->id,
                'origen_id' => $id,
                'proceso' => 'Limpieza',
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    public function vacio($id)
    {

        // Toaster::success('User created!');
        try {
            EstadoPlanta::create([
                'tiempo' => now(),
                'user_id' => auth()->user()->id,
                'origen_id' => $id,
                'proceso' => 'Vacio',
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function mantenimientoEnv($id)
    {
        try {
            EstadoPlanta::create([
                'tiempo' => now(),
                'user_id' => auth()->user()->id,
                'origen_id' => $id,
                'proceso' => 'Mantenimiento',
                'etapa_id' => 8,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function limpiezaEnv($id)
    {
        try {
            EstadoPlanta::create([
                'tiempo' => now(),
                'user_id' => auth()->user()->id,
                'origen_id' => $id,
                'proceso' => 'Limpieza',
                'etapa_id' => 8,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function vacioEnv($id)
    {
        try {
            EstadoPlanta::create([
                'tiempo' => now(),
                'user_id' => auth()->user()->id,
                'origen_id' => $id,
                'proceso' => 'Detenido',
                'etapa_id' => 8,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function completar($id)
{


    try {
        $userId = auth()->id();


        $registro = Orp::find($id);
        $registro->estado = 'Completado';
        $registro->save();


        try {
            DB::table('colors')
                ->where('orp_id', $id)
                ->update(['orp_id' => null]);
        } catch (\Throwable $th) {
            // Manejo de error: puedes registrar el error si es necesario
            // Log::error('Error al actualizar colors: ' . $th->getMessage());
        }
        // Obtener los registros que cumplen con las condiciones
        // $registros = EstadoPlanta::where('proceso', 'Produccion')
        //     ->where('etapa_id', 8)
        //     ->whereHas('estadoDetalle.orp', function ($query) use ($id) {
        //         $query->where('id',  $id );
        //     })
        // ->get();


        //version 2
        // $registros = EstadoPlanta::where('proceso', 'Produccion')
        // ->where('etapa_id', 8)
        // ->whereHas('estadoDetalle.orp', function ($query) use ($id) {
        //     $query->where('id', $id);
        // })
        // ->orderBy('id', 'desc') // Ordenar por id en orden descendente para obtener el último registro
        // ->get()
        // ->unique('origen');


        //version 3
    //     $registros = EstadoPlanta::where('proceso', 'Produccion')
    // ->where('etapa_id', 8)
    // ->whereHas('estadoDetalle.orp', function ($query) use ($id) {
    //     $query->where('id', $id);
    // })
    // ->orderBy('id', 'desc') // Ordenar por id en orden descendente para obtener el último registro
    // ->get()
    // ->unique('origen')
    // ;
    $registros = EstadoPlanta::select('*')
    ->where('proceso', 'Produccion')
    ->where('etapa_id', 8)
    ->whereHas('estadoDetalle.orp', function ($query) use ($id) {
        $query->where('id', $id);
    })
    ->whereIn('id', function ($query) {
        $query->select(DB::raw('MAX(id)'))
            ->from('estado_plantas')
            ->groupBy('origen_id');
    })
    ->get();


        foreach ($registros as $registro) {
            // Crear un nuevo registro con las modificaciones necesarias
            EstadoPlanta::create([
                'tiempo' => now(), // Asignar el tiempo actual
                'user_id' => $userId, // Asignar el ID del usuario actual
                'origen_id' => $registro->origen_id, // Copiar el origen_id
                'proceso' => 'Detenido', // Cambiar el proceso a 'Detenido'
                'etapa_id' => 8, // Establecer etapa_id a null
                // Otros campos que sean necesarios
            ]);
        }

    } catch (\Throwable $th) {
        dd($th);
    }
}
}
