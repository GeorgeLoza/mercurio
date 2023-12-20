<?php

namespace App\Livewire\AnalisisLinea\Solicitud;

use App\Models\AnalisisLinea;
use App\Models\Etapa;
use App\Models\Origen;
use App\Models\User;
use App\Models\Orp;
use App\Models\ParametroLinea;
use App\Models\SolicitudAnalisisLinea;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Crear extends ModalComponent
{

    public $orp_id; 
    public $tiempo;
    public $usuario_id;
    public $preparacion;
    public $origen_id;
    public $etapa_id;
    
   //valores para cargar selects
   public $orps;
   public $origenes = [];
   public $etapas  = [];
   public $usuarios;
   
   public function mount()
   {
       $this->orps = Orp::where('estado','En proceso')->get();
       $this->origenes = Origen::all();
       $this->usuarios = User::all();
       
   }

    public function render()
    {
        if ($this->orp_id) {
            
            $orp_extra = Orp::where('id', $this->orp_id)->first();
            $this->etapas = ParametroLinea::where('producto_id', $orp_extra->producto_id)->get();
          
        }
        
        return view('livewire.analisis-linea.solicitud.crear', [
            'etapas' => $this->etapas
        ]);
    }
    public function save()
    {
       
        $this->validate([
            'orp_id' => 'required',
            'usuario_id' => 'required',
            'preparacion' => 'required',
            'origen_id' => 'required',
            'etapa_id' => 'required',
        ]);
       
        try {
            $solicitud = SolicitudAnalisisLinea::create([
                'orp_id' => $this->orp_id,
                'tiempo' => now(),
                'user_id' => $this->usuario_id,
                'preparacion' =>$this->preparacion,
                'origen_id' => $this->origen_id,
                'estado' => 'Pendiente',
                'etapa_id' => $this->etapa_id,
            ]);
            $id = $solicitud->id;

            AnalisisLinea::create([
                'solicitud_analisis_linea_id' => $id,
            ]);
           
            $this->dispatch('actualizar_tabla_solicitudAnalisisLineas');
            $this->dispatch('actualizar_tabla_analisisLineas');
            $this->closeModal();
            $this->dispatch('success', mensaje: 'Solicitud registrado exitosamente');
        } catch (\Throwable $th) {
            $this->closeModal();
            dd($th);
            $this->dispatch('error', mensaje: 'Error: '.$th);
        }
    }


}
