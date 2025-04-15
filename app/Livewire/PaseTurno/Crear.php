<?php

namespace App\Livewire\PaseTurno;

use App\Models\PaseTurno;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{
    public $observaciones = "- HTST: \n- UHT: \n- OTROS:";
    public $urgente = "- HTST: \n- UHT: \n- OTROS:";
    public $R1, $R2, $R3, $MIX1, $MIX2, $MIX3, $MIX4, $TK41, $TK42, $TK10, $TK5, $TKMG, $TKFG, $TKMP, $TKFP, $TKCC, $TKSC,$TK102;
    public $volumenes;
    public $area;


    public function render()
    {
        return view('livewire.pase-turno.crear');
    }

    public function save()
    {

        try {
            $this->volumenes = '';

            if ($this->R1) {
                $this->volumenes .= "R1: {$this->R1} [Litros]\n";
            }
            if ($this->R2) {
                $this->volumenes .= "R2: {$this->R2} [Litros]\n";
            }
            if ($this->R3) {
                $this->volumenes .= "R3: {$this->R3} [Litros]\n";
            }
            if ($this->MIX1) {
                $this->volumenes .= "MIX1: {$this->MIX1} [Litros]\n";
            }
            if ($this->MIX2) {
                $this->volumenes .= "MIX2: {$this->MIX2} [Litros]\n";
            }
            if ($this->MIX3) {
                $this->volumenes .= "MIX3: {$this->MIX3} [Litros]\n";
            }
            if ($this->MIX4) {
                $this->volumenes .= "MIX4: {$this->MIX4} [Litros]\n";
            }
            if ($this->TK41) {
                $this->volumenes .= "TK41: {$this->TK41} [Litros]\n";
            }
            if ($this->TK42) {
                $this->volumenes .= "TK42: {$this->TK42} [Litros]\n";
            }
            if ($this->TKSC) {
                $this->volumenes .= "TKSC: {$this->TKSC} [Litros]\n";
            }
            if ($this->TKCC) {
                $this->volumenes .= "TKCC: {$this->TKCC} [Litros]\n";
            }
            if ($this->TK10) {
                $this->volumenes .= "TK10: {$this->TK10} [Litros]\n";
            }
            if ($this->TK5) {
                $this->volumenes .= "TK5: {$this->TK5} [Litros]\n";
            }
            if ($this->TKFG) {
                $this->volumenes .= "TKFG: {$this->TKFG} [Litros]\n";
            }
            if ($this->TKMG) {
                $this->volumenes .= "TKMG: {$this->TKMG} [Litros]\n";
            }
            if ($this->TKFP) {
                $this->volumenes .= "TKFP: {$this->TKFP} [Litros]\n";
            }
            if ($this->TKMP) {
                $this->volumenes .= "TKMP: {$this->TKMP} [Litros]";
            }
            if ($this->TK102) {
                $this->volumenes .= "TK102: {$this->TK102} [Litros]";
            }

            PaseTurno::create([
                'tiempo' => now(),
                'user_id' => auth()->user()->id,
                'division_id' => auth()->user()->division->id,
                'observaciones' => $this->observaciones,
                'urgente' => $this->urgente,
                'volumenes' => $this->volumenes,
                'area' => $this->area,
            ]);
            $this->dispatch('actualizar_reporte_pase');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Parte registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }

}
