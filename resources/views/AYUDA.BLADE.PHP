class MicrobiologiaExterno extends Component
{
    public $microbiologia;
    public $currentPage = 1; // ✅ Agregar propiedad para la página actual

    #[On('actualizar_tabla_microexterno')]
    public function render()
    {
        $this->aplicandoFiltros = $this->hayFiltrosActivos();

        $this->microbiologia = MicrobiologiaExterno::query()
            ->when($this->f_planta, function ($query) {
                return $query->whereHas('detalleSolicitudPlanta.solicitudPlanta.user.planta', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->f_planta);
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(50, ['*'], 'page', $this->currentPage); // ✅ Mantiene la página actual

        return view('livewire.externo.microbiologia.tabla', [
            'microbiologia' => $this->microbiologia
        ]);
    }

    public function dia2($id)
    {
        try {
            $microbiologia = MicrobiologiaExterno::find($id);
            $microbiologia->aer_mes = 0;
            $microbiologia->col_tot = 0;

            if ($microbiologia->detalleSolicitudPlanta->tipoMuestra->id == 2) {
                $microbiologia->col_tot = null;
            }

            if (in_array($microbiologia->detalleSolicitudPlanta->tipoMuestra->id, [9, 5])) {
                $microbiologia->aer_mes = null;
                $microbiologia->estado = "Analizado";

                $detalle = DetalleSolicitudPlanta::find($microbiologia->detalle_solicitud_planta_id);
                $detalle->estado = "Revision";
                $detalle->save();
            } else {
                $microbiologia->estado = "2 Dias";
            }

            if (is_null($microbiologia->fecha_dia2)) {
                $microbiologia->fecha_dia2 = now();
            }

            if (is_null($microbiologia->ana_dia2_id)) {
                $microbiologia->ana_dia2_id = auth()->user()->id;
            }

            $microbiologia->save();

            // ✅ Guardar la página actual antes de actualizar
            $this->currentPage = $this->microbiologia->currentPage();

            $this->dispatch('actualizar_tabla_microexterno');

            $this->dispatch('success', mensaje: 'Análisis realizado exitosamente.');
        } catch (\Throwable $th) {
            $this->dispatch('error_mensaje', mensaje: 'Problema: ' . $th->getMessage());
        }
    }

    public function updatingCurrentPage($page)
    {
        $this->currentPage = $page; // ✅ Captura la página cuando cambia
    }
}
