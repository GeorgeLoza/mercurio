<?php

namespace App\Livewire\Externo;

use App\Models\Producto;
use App\Models\TipoMuestra as ModelsTipoMuestra;
use Livewire\Component;


class TipoMuestra extends Component
{
    public $tipoMuestraId;
    public $nombre;
    public $norma_referencial;
    public $unidad;
    public $aclaUni;
    public $min_mes;
    public $min_mes_e;
    public $max_mes;
    public $max_mes_e;
    public $min_colTot;
    public $min_colTot_e;
    public $max_colTot;
    public $max_colTot_e;
    public $min_mohLev;
    public $min_mohLev_e;
    public $max_mohLev;
    public $max_mohLev_e;

    protected $rules = [
        'nombre' => 'nullable|string|max:255',
        'norma_referencial' => 'nullable|string|max:255',
        'unidad' => 'nullable|string|max:255',
        'aclaUni' => 'nullable|string|max:255',
        'min_mes' => 'nullable|string|max:255',
        'min_mes_e' => 'nullable|integer',
        'max_mes' => 'nullable|string|max:255',
        'max_mes_e' => 'nullable|integer',
        'min_colTot' => 'nullable|string|max:255',
        'min_colTot_e' => 'nullable|integer',
        'max_colTot' => 'nullable|string|max:255',
        'max_colTot_e' => 'nullable|integer',
        'min_mohLev' => 'nullable|string|max:255',
        'min_mohLev_e' => 'nullable|integer',
        'max_mohLev' => 'nullable|string|max:255',
        'max_mohLev_e' => 'nullable|integer',
    ];

    public function render()
    {
        $tipoMuestras = ModelsTipoMuestra::all();
        
        return view('livewire.externo.tipo-muestra', [
            'tipoMuestras' => $tipoMuestras
        ]);
    }

    public function create()
    {
        $this->validate();
        ModelsTipoMuestra::create($this->getFields());
        $this->resetFields();
    }

    public function update()
    {
        $this->validate();
        $tipoMuestra = ModelsTipoMuestra::find($this->tipoMuestraId);
        $tipoMuestra->update($this->getFields());
        $this->resetFields();
    }

    public function edit($id)
    { 
        
        $this->tipoMuestraId = $id;
        $tipoMuestra = ModelsTipoMuestra::find($id);
        $this->setFields($tipoMuestra);
    }

    public function delete($id)
    {
        $tipoMuestra = ModelsTipoMuestra::find($id);
        $tipoMuestra->delete();
    }

    public function resetFields()
    {
        $this->tipoMuestraId = null;
        $this->nombre = '';
        $this->norma_referencial = '';
        $this->unidad = '';
        $this->aclaUni = '';
        $this->min_mes = '';
        $this->min_mes_e = null;
        $this->max_mes = '';
        $this->max_mes_e = null;
        $this->min_colTot = '';
        $this->min_colTot_e = null;
        $this->max_colTot = '';
        $this->max_colTot_e = null;
        $this->min_mohLev = '';
        $this->min_mohLev_e = null;
        $this->max_mohLev = '';
        $this->max_mohLev_e = null;
    }

    private function getFields()
{
    return [
        'nombre' => $this->nombre,
        'norma_referencial' => $this->norma_referencial,
        'unidad' => $this->unidad,
        'aclaUni' => $this->aclaUni,
        'min_mes' => $this->min_mes ?: null,
        'min_mes_e' => $this->min_mes_e ?: null,
        'max_mes' => $this->max_mes ?: null,
        'max_mes_e' => $this->max_mes_e ?: null,
        'min_colTot' => $this->min_colTot ?: null,
        'min_colTot_e' => $this->min_colTot_e ?: null,
        'max_colTot' => $this->max_colTot ?: null,
        'max_colTot_e' => $this->max_colTot_e ?: null,
        'min_mohLev' => $this->min_mohLev ?: null,
        'min_mohLev_e' => $this->min_mohLev_e ?: null,
        'max_mohLev' => $this->max_mohLev ?: null,
        'max_mohLev_e' => $this->max_mohLev_e ?: null,
    ];
}


    private function setFields(ModelsTipoMuestra $tipoMuestra)
    {
        $this->nombre = $tipoMuestra->nombre;
        $this->norma_referencial = $tipoMuestra->norma_referencial;
        $this->unidad = $tipoMuestra->unidad;
        $this->aclaUni = $tipoMuestra->aclaUni;
        $this->min_mes = $tipoMuestra->min_mes;
        $this->min_mes_e = $tipoMuestra->min_mes_e;
        $this->max_mes = $tipoMuestra->max_mes;
        $this->max_mes_e = $tipoMuestra->max_mes_e;
        $this->min_colTot = $tipoMuestra->min_colTot;
        $this->min_colTot_e = $tipoMuestra->min_colTot_e;
        $this->max_colTot = $tipoMuestra->max_colTot;
        $this->max_colTot_e = $tipoMuestra->max_colTot_e;
        $this->min_mohLev = $tipoMuestra->min_mohLev;
        $this->min_mohLev_e = $tipoMuestra->min_mohLev_e;
        $this->max_mohLev = $tipoMuestra->max_mohLev;
        $this->max_mohLev_e = $tipoMuestra->max_mohLev_e;
    }
}
