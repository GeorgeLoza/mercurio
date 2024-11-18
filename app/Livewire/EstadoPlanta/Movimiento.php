<?php

namespace App\Livewire\EstadoPlanta;

use App\Models\EstadoDetalle;
use App\Models\EstadoPlanta;
use App\Models\Origen;
use App\Models\Orp;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Movimiento extends ModalComponent
{
    public $id;
    public $estado_pasteurizar = false;
    public $estado_envasar = false;
    public $grupo;
    public $pasteurizador;
    public $destino;

    //cabezales
    public $HTST_A1 = 1;
    public $HTST_B1 = 1;
    public $HTST_C1 = 1;

    public $HTST_A2 = 1;
    public $HTST_B2 = 1;
    public $HTST_C2 = 1;

    public $HTST_A3 = 1;
    public $HTST_B3 = 1;
    public $HTST_C3 = 1;

    public $HTST_A4 = 1;
    public $HTST_B4 = 1;
    public $HTST_C4 = 1;

    public $HTST_A5 = 1;
    public $HTST_B5 = 1;
    public $HTST_C5 = 1;

    public $UHT_A1 = 1;
    public $UHT_B1 = 1;
    public $UHT_C1 = 1;

    public $UHT_A2 = 1;
    public $UHT_B2 = 1;

    public $UHT_A3 = 1;
    public $UHT_B3 = 1;

    public $V1 = 1;
    public $V2 = 1;
    public $V3 = 1;

    public $L1 = 1;
    public $L2 = 1;
    public $L3 = 1;

    public $araña = 1;

    public $orps;

    public $etapa_id;

    public $detalles = [];
    public $newDetalle = '';
    public $orpInput;
    public $preparacionInput;
    public $tanqueActual;
    public $tanqueLibre;

    public function mount()
    {
        $this->tanqueActual = EstadoPlanta::find($this->id);
        if ($this->tanqueActual->proceso != 'Produccion') {
            $this->tanqueLibre = true;
        } else {
            $this->tanqueLibre = false;
        }

        $this->orps = Orp::where('estado', 'En proceso')->get();
        $estadoDetalles  =  EstadoDetalle::where('estado_planta_id', $this->id)->get();
        foreach ($estadoDetalles as $index => $det) {
            $this->detalles[] = [
                'orp_id' => $det->orp->id,
                'orp' => $det->orp->codigo,
                'producto' => $det->orp->producto->nombre,
                'preparacion' => $det->preparacion
            ];
        }
    }

    public function render()
    {
        return view('livewire.estado-planta.movimiento');
    }
    public function save()
    {
        //Agregado o traspaso a un nuevo tanque
        if (!$this->estado_pasteurizar && !$this->estado_envasar) {

            if ($this->tanqueLibre) {
                $this->destino = $this->tanqueActual->origen_id;
                $this->etapa_id = 1;
            }

            $this->validate([
                'etapa_id' => 'required',
                'destino' => 'required'
            ]);

            try {
                $estadoPlanta = EstadoPlanta::create([
                    'tiempo' => now(),
                    'user_id' => auth()->user()->id,
                    'origen_id' => $this->destino,
                    'proceso' => "Produccion",
                    'etapa_id' => $this->etapa_id,
                ]);


                foreach ($this->detalles as $detalle) {
                    EstadoDetalle::create([
                        'orp_id' => $detalle['orp_id'],
                        'preparacion' => $detalle['preparacion'],
                        'estado_planta_id' => $estadoPlanta->id,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                $this->closeModal();
                $this->dispatch('actualizar_dashboardPlanta');
                $this->dispatch('success', mensaje: 'Estado registrado exitosamente');
            } catch (\Throwable $th) {
                dd($th);
            }
        }

        //Agregado para el pasteruizador
        if ($this->estado_pasteurizar) {
            $this->validate([
                'pasteurizador' => 'required',
                'etapa_id' => 'required',
                'destino' => 'required'
            ]);
            try {
                $estadoPlantaPasteruizador = EstadoPlanta::create([
                    'tiempo' => now(),
                    'user_id' => auth()->user()->id,
                    'origen_id' => $this->pasteurizador,
                    'proceso' => "Produccion",
                    'etapa_id' => 2,
                ]);

                foreach ($this->detalles as $detalle) {
                    EstadoDetalle::create([
                        'orp_id' => $detalle['orp_id'],
                        'preparacion' => $detalle['preparacion'],
                        'estado_planta_id' => $estadoPlantaPasteruizador->id,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                $estadoPlantatanque = EstadoPlanta::create([
                    'tiempo' => now(),
                    'user_id' => auth()->user()->id,
                    'origen_id' => $this->destino,
                    'proceso' => "Produccion",
                    'etapa_id' => $this->etapa_id,
                ]);

                foreach ($this->detalles as $detalle) {
                    EstadoDetalle::create([
                        'orp_id' => $detalle['orp_id'],
                        'preparacion' => $detalle['preparacion'],
                        'estado_planta_id' => $estadoPlantatanque->id,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                $this->closeModal();
                $this->dispatch('actualizar_dashboardPlanta');
                $this->dispatch('success', mensaje: 'Estado registrado exitosamente');
            } catch (\Throwable $th) {
                dd($th);
            }
        }

        //movida a envasadoras
        if ($this->estado_envasar) {

            try {
                if ($this->grupo == 1) {

                    // agragaion de estado planta y su detalle trilliza 1a
                    if ($this->HTST_A1 == 1) {

                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 48, //id de trilliza 1A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 1B
                    if ($this->HTST_B1 == 1) {

                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 47, //id de trilliza 1B
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 1c
                    if ($this->HTST_C1 == 1) {

                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 46, //id de trilliza 1B
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 2A
                    if ($this->HTST_A2 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 45, //id de trilliza 12A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 2B
                    if ($this->HTST_B2 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 44, //id de trilliza 2B
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 2c
                    if ($this->HTST_C2 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 43, //id de trilliza 2C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }


                    // agragaion de estado planta y su detalle trilliza 3A
                    if ($this->HTST_A3 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 42, //id de trilliza 3A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 3C
                    if ($this->HTST_B3 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 41, //id de trilliza 3C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 4A
                    if ($this->HTST_C3 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 40, //id de trilliza 3C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }

                    // agragaion de estado planta y su detalle trilliza 4B
                    if ($this->HTST_A4 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 39, //id de trilliza 4A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 4B
                    if ($this->HTST_B4 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 38, //id de trilliza 4C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 5A
                    if ($this->HTST_C4 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 37, //id de trilliza 4A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 4C
                    if ($this->HTST_A5 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 36, //id de trilliza 5A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }

                    // agragaion de estado planta y su detalle trilliza 5A
                    if ($this->HTST_B5 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 35, //id de trilliza 5B
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 5A
                    if ($this->HTST_C5 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 34, //id de trilliza 5C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                }
                if ($this->grupo == 2) {
                    // agragaion de estado planta y su detalle trilliza 1A
                    if ($this->UHT_A1 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 27, //id de trilliza 1A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }

                    if ($this->UHT_B1 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 28, //id de trilliza 1B
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    if ($this->UHT_C1 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 29, //id de trilliza 5C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    if ($this->UHT_A3 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 32, //id de trilliza 5C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    if ($this->UHT_B3 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 33, //id de trilliza 5C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    if ($this->UHT_A2 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 30, //id de trilliza 5C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    if ($this->UHT_B2 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 31, //id de trilliza 5C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                }

                if ($this->grupo == 3) {

                    // agragaion de estado planta y su detalle trilliza 3A
                    if ($this->V1 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 50, //id de trilliza  V1
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 3C
                    if ($this->V2 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 51, //id de trilliza 3C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    // agragaion de estado planta y su detalle trilliza 4A
                    if ($this->V3 == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 52, //id de trilliza 3C
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                }

                if ($this->grupo == 4) {

                    // agragaion de estado planta y su detalle trilliza 3A
                    if ($this->araña == 1) {
                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 53, //id de trilliza  ARANA
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                }
                if ($this->grupo == 5) {


                    //prueba soyas
                    // agragaion de estado planta y su detalle trilliza 1a
                    if ($this->L1 == 1) {

                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 57, //id de trilliza 1A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }

                    if ($this->L2 == 1) {

                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 58, //id de trilliza 1A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                    if ($this->L3 == 1) {

                        $estadoPlanta = EstadoPlanta::create([
                            'tiempo' => now(),
                            'user_id' => auth()->user()->id,
                            'origen_id' => 59, //id de trilliza 1A
                            'proceso' => "Produccion",
                            'etapa_id' => 8,
                        ]);
                        $id_estadoPlanta = $estadoPlanta->id;

                        foreach ($this->detalles as $detalle) {
                            EstadoDetalle::create([
                                'orp_id' => $detalle['orp_id'],
                                'preparacion' => $detalle['preparacion'],
                                'estado_planta_id' => $id_estadoPlanta,
                                'user_id' => auth()->user()->id,
                            ]);
                        }
                    }
                }

                $this->js('window.location.reload()');
                $this->dispatch('actualizar_tabla_estado');
                $this->closeModal();
                $this->dispatch('actualizar_dashboardPlanta');
                $this->dispatch('success', mensaje: 'Estado registrado exitosamente');
            } catch (\Throwable $th) {
                $this->closeModal();
                $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
            }
        }
    }

    public function cambiar_estado_pasteruizador()
    {
        $this->estado_pasteurizar && $this->estado_envasar = false;
    }
    public function cambiar_estado_envasadora()
    {
        $this->estado_envasar && $this->estado_pasteurizar = false;
    }

    public function addDetalle()
    {
        if ($this->orpInput && $this->preparacionInput) {
            $orp = Orp::find($this->orpInput);
            $this->detalles[] = [
                'orp_id' => $orp->id,
                'orp' => $orp->codigo,
                'producto' => $orp->producto->nombre,
                'preparacion' => $this->preparacionInput
            ];
            $this->orpInput = '';
            $this->preparacionInput = '';
        }
    }

    public function removeDetalle($index)
    {
        unset($this->detalles[$index]);
        $this->detalles = array_values($this->detalles); // Reindex array
    }

    public function updatedDestino($value)
    {
        if ($value) {
            // Buscar el tanque seleccionado
            $id_estado = EstadoPlanta::where('origen_id', $value)->latest()->first();

            // Verificar si existe el tanque
            if ($id_estado) {
                $estadoDetalles = EstadoDetalle::where('estado_planta_id', $id_estado->id)->get();
                foreach ($estadoDetalles as $index => $det) {
                    // Verificar si ya existe un registro similar en $this->detalles
                    $existe = collect($this->detalles)->contains(function ($detalle) use ($det) {
                        return $detalle['orp_id'] === $det->orp->id
                            && $detalle['preparacion'] === $det->preparacion;
                    });

                    // Si no existe, agregarlo a la lista
                    if (!$existe) {
                        $this->detalles[] = [
                            'orp_id' => $det->orp->id,
                            'orp' => $det->orp->codigo,
                            'producto' => $det->orp->producto->nombre,
                            'preparacion' => $det->preparacion
                        ];
                    }
                }
            }
        }
    }




    public function estado_HTST_A1()
    {
        $this->HTST_A1 = !$this->HTST_A1;
    }
    public function estado_HTST_B1()
    {
        $this->HTST_B1 = !$this->HTST_B1;
    }
    public function estado_HTST_C1()
    {
        $this->HTST_C1 = !$this->HTST_C1;
    }
    public function estado_HTST_A2()
    {
        $this->HTST_A2 = !$this->HTST_A2;
    }

    public function estado_HTST_B2()
    {
        $this->HTST_B2 = !$this->HTST_B2;
    }
    public function estado_HTST_C2()
    {
        $this->HTST_C2 = !$this->HTST_C2;
    }
    public function estado_HTST_A3()
    {
        $this->HTST_A3 = !$this->HTST_A3;
    }
    public function estado_HTST_B3()
    {
        $this->HTST_B3 = !$this->HTST_B3;
    }
    public function estado_HTST_C3()
    {
        $this->HTST_C3 = !$this->HTST_C3;
    }
    public function estado_HTST_A4()
    {
        $this->HTST_A4 = !$this->HTST_A4;
    }
    public function estado_HTST_B4()
    {
        $this->HTST_B4 = !$this->HTST_B4;
    }
    public function estado_HTST_C4()
    {
        $this->HTST_C4 = !$this->HTST_C4;
    }
    public function estado_HTST_A5()
    {
        $this->HTST_A5 = !$this->HTST_A5;
    }

    public function estado_HTST_B5()
    {
        $this->HTST_B5 = !$this->HTST_B5;
    }
    public function estado_HTST_C5()
    {
        $this->HTST_C5 = !$this->HTST_C5;
    }


    public function estado_UHT_A1()
    {
        $this->UHT_A1 = !$this->UHT_A1;
    }
    public function estado_UHT_B1()
    {
        $this->UHT_B1 = !$this->UHT_B1;
    }
    public function estado_UHT_C1()
    {
        $this->UHT_C1 = !$this->UHT_C1;
    }
    public function estado_UHT_A2()
    {
        $this->UHT_A2 = !$this->UHT_A2;
    }

    public function estado_UHT_B2()
    {
        $this->UHT_B2 = !$this->UHT_B2;
    }
    public function estado_UHT_A3()
    {
        $this->UHT_A3 = !$this->UHT_A3;
    }

    public function estado_UHT_B3()
    {
        $this->UHT_B3 = !$this->UHT_B3;
    }
    public function estado_araña()
    {
        $this->araña = !$this->araña;
    }

    public function estado_V1()
    {
        $this->V1 = !$this->V1;
    }
    public function estado_V2()
    {
        $this->V2 = !$this->V2;
    }
    public function estado_V3()
    {
        $this->V3 = !$this->V3;
    }
    public function estado_L1()
    {
        $this->L1 = !$this->L1;
    }
    public function estado_L2()
    {
        $this->L2 = !$this->L2;
    }
    public function estado_L3()
    {
        $this->L3 = !$this->L3;
    }
}
