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