<?php

namespace App\Livewire\PaseTurno;

use App\Models\PaseTurno;
use Livewire\Attributes\On;
use Livewire\Component;

class Reporte extends Component
{
    public $pasePreparado,$paseEnvasadoHTST,$paseEnvasadoUHT;

    public function mount()
    {
        
    }
    #[On('actualizar_reporte_pase')]
    public function render()
    {
        $this->pasePreparado = PaseTurno::where('area','preparado')->latest('created_at')->first();
        $this->paseEnvasadoHTST = PaseTurno::where('area','Envasado HTST')->latest('created_at')->first();
        $this->paseEnvasadoUHT = PaseTurno::where('area','Envasado UHT')->latest('created_at')->first();
        
        return view('livewire.pase-turno.reporte', [
            'preparado' => $this->pasePreparado,
            'HTST' => $this->paseEnvasadoHTST,
            'UHT' => $this->paseEnvasadoUHT,
        ]);
        
    }
}
