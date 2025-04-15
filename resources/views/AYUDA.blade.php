 public function dia2($id)
    {


        try {
            $microbiologia = MicrobiologiaExterno::find($id);
            // Verificación para todas las variables antes de asignarlas al modelo

            $microbiologia->aer_mes = 0;
            $microbiologia->col_tot = 0;

            if ($microbiologia->detalleSolicitudPlanta->tipoMuestra->id == 2) {
                $microbiologia->col_tot = null;
            }

            $excluidos = [9, 5, 1, 17];

            if (in_array($microbiologia->detalleSolicitudPlanta->tipoMuestra->id, $excluidos)) {
                $microbiologia->aer_mes = null;
                $microbiologia->estado = "Analizado";
                if ($microbiologia->detalleSolicitudPlanta->tipoMuestra->id == 5) {
                    $microbiologia->estado = "2 Dias";
                }

                $detalle = DetalleSolicitudPlanta::where("id", $microbiologia->detalle_solicitud_planta_id)->first();
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

            // $this->dispatch('actualizar_tabla_microexterno');

            $this->dispatch('success', mensaje: 'Analisis realizado exitosamente.');
        } catch (\Throwable $th) {

            $this->dispatch('error_mensaje', mensaje: 'problema' . $th->getMessage());
        }
    }
