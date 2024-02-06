<?php

namespace App\Livewire\EstadoPlanta;

use App\Models\EstadoPlanta;
use App\Models\Orp;
use App\Models\Origen;
use Livewire\Component;
use App\Models\ParametroLinea;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{

    public $origen_id;
    public $proceso;
    public $orp_id; 
    public $etapa_id;
    public $preparacion;
    
   //valores para cargar selects
   public $orps;
   public $origenes = [];
   public $etapas  = [];
   
   public function mount()
   {
       $this->orps = Orp::where('estado','En proceso')->get();
       $this->origenes = Origen::all();
       
   }

    public function render()
    {
        if ($this->orp_id) {
            
            $orp_extra = Orp::where('id', $this->orp_id)->first();
            $this->etapas = ParametroLinea::where('producto_id', $orp_extra->producto_id)->get();
          
        }
        
        return view('livewire.estado-planta.crear', [
            'etapas' => $this->etapas
        ]);
    }
    public function save()
    {
       
        $this->validate([
            'origen_id' => 'required',
            'proceso' => 'required',
        ]);
       
        try {
            EstadoPlanta::create([
                'tiempo' => now(),
                'user_id'=> auth()->user()->id,
                'origen_id' => $this->origen_id,
                'proceso' => $this->proceso,
                'orp_id' => $this->orp_id,
                'etapa_id' => $this->etapa_id,
                'preparacion' =>$this->preparacion,
            ]);
           
            $this->dispatch('actualizar_tabla_estado');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Estado registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            dd($th);
            $this->dispatch('error', mensaje: 'Error: '.$th);
        }
    }


}
