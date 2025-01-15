<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class CalculadoraJuliano extends Component
{
    public $julianDate; // Día juliano calculado
    public $standardDate; // Fecha estándar ingresada por el usuario

    public function mount()
    {
        // Establecer el valor predeterminado para la fecha estándar: 1 de enero del año actual
        $this->standardDate = Carbon::now()->startOfYear()->format('Y-m-d');

        // Calcular el día juliano basado en la fecha predeterminada
        $this->julianDate = Carbon::createFromFormat('Y-m-d', $this->standardDate)->dayOfYear;
    }

    public function updatedStandardDate($value)
    {
        if ($value) {
            $date = Carbon::createFromFormat('Y-m-d', $value);
            $this->julianDate = $date->dayOfYear;
        } else {
            $this->julianDate = null;
        }
    }

    public function updatedJulianDate($value)
    {
        if (is_numeric($value) && $this->standardDate) {
            $year = Carbon::createFromFormat('Y-m-d', $this->standardDate)->year;
            $this->standardDate = Carbon::createFromFormat('Y-m-d', "$year-01-01")
                ->addDays($value - 1)
                ->format('Y-m-d');
        }
    }

    public function render()
    {
        return view('livewire.calculadora-juliano');
    }
}
