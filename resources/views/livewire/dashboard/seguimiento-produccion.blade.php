<div>{{-- segunda copcion --}}
    <div class="container mx-auto space-y-1">


        <ol class="flex items-center w-full">
            <li
                class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                <span
                    class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                    MZ
                </span>
            </li>
            <li
                class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                <span
                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                    </svg>
                </span>
            </li>
            <li class="flex items-center w-full">
                <span
                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                    </svg>
                </span>
            </li>

        </ol>

        @foreach ($orps as $orp)
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <!-- Fila principal ORP -->
                <div class="flex flex-col md:flex-row p-2 gap-2">
                    <!-- Columna ORP (ancho fijo) -->
                    <div class="flex-none w-full md:w-64 lg:w-80 border-r-0 md:border-r ">
                        <div class="">
                            <h2 class="text-sm font-bold text-gray-800">ORP: {{ $orp->codigo }}</h2>
                            <p class="text-xs text-gray-600">Producto: {{ $orp->producto->nombre }}</p>
                            <p class="text-xs text-gray-600">Lote: {{ $orp->lote / 1 }}</p>
                            <p class="text-xs text-gray-600">Vencimiento: {{ $orp->fecha_vencimiento1 }}</p>
                        </div>
                    </div>

                    <!-- Contenedor Preparaciones (scroll horizontal) -->
                    <div class="flex-1 items-center overflow-x-auto ">
                        <div class="flex flex-col   min-w-max">
                            @php
                                $detallesAgrupados = $orp->estadoDetalle->groupBy([
                                    'preparacion',
                                    fn($detalle) => optional(optional($detalle->estadoPlanta)->etapa)->nombre ??
                                        'Sin etapa',
                                ]);
                            @endphp

                            @foreach ($detallesAgrupados as $preparacion => $etapas)
                                <div class="flex   min-w-[280px] bg-gray-50 rounded-lg p-2 border">
                                    <!-- Header Preparación -->
                                    <div class="  flex items-center justify-between p-2 rounded">
                                        <h3 class="font-semibold text-gray-700 text-sm">Prep: {{ $preparacion }}</h3>
                                    </div>

                                    <!-- Lista de Etapas -->
                                    <ol class="flex items-center w-full">
                                        @foreach ($etapas as $etapaNombre => $detalles)
                                            @php
                                                $tieneSolicitud = $detalles->contains(
                                                    fn($d) => optional(
                                                        $d->estadoPlanta,
                                                    )->solicitudAnalisisLinea->isNotEmpty(),
                                                );
                                                $tieneAnalisis = $detalles->contains(
                                                    fn($d) => optional(
                                                        $d->estadoPlanta,
                                                    )->solicitudAnalisisLinea->contains(
                                                        fn($s) => optional($s->analisisLinea)->user_id !== null,
                                                    ),
                                                );

                                                $estado = $tieneAnalisis
                                                    ? 'completado'
                                                    : ($tieneSolicitud
                                                        ? 'en-proceso'
                                                        : 'pendiente');
                                            @endphp

                                            <li
                                                class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                                                <span
                                                    class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0 text-white">
                                                    {{ strtoupper(substr($etapaNombre, 0, 1)) }}
                                                </span>
                                                4
                                            </li>
                                        @endforeach
                                    </ol>



                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- primera copcion --}}
    <div class="container mx-auto space-y-1">


        <ol class="flex items-center w-full">
            <li
                class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                <span
                    class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                    MZ
                </span>
            </li>
            <li
                class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                <span
                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                    </svg>
                </span>
            </li>
            <li class="flex items-center w-full">
                <span
                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                    </svg>
                </span>
            </li>

        </ol>

        @foreach ($orps as $orp)
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <!-- Fila principal ORP -->
                <div class="flex flex-col md:flex-row p-2 gap-2">
                    <!-- Columna ORP (ancho fijo) -->
                    <div class="flex-none w-full md:w-64 lg:w-80 border-r-0 md:border-r ">
                        <div class="">
                            <h2 class="text-sm font-bold text-gray-800">ORP: {{ $orp->codigo }}</h2>
                            <p class="text-xs text-gray-600">Producto: {{ $orp->producto->nombre }}</p>
                            <p class="text-xs text-gray-600">Lote: {{ $orp->lote / 1 }}</p>
                            <p class="text-xs text-gray-600">Vencimiento: {{ $orp->fecha_vencimiento1 }}</p>
                        </div>
                    </div>

                    <!-- Contenedor Preparaciones (scroll horizontal) -->
                    <div class="flex-1 items-center overflow-x-auto ">
                        <div class="flex flex-col   min-w-max">
                            @php
                                $detallesAgrupados = $orp->estadoDetalle->groupBy([
                                    'preparacion',
                                    fn($detalle) => optional(optional($detalle->estadoPlanta)->etapa)->nombre ??
                                        'Sin etapa',
                                ]);
                            @endphp

                            @foreach ($detallesAgrupados as $preparacion => $etapas)
                                <div class="flex   min-w-[280px] bg-gray-50 rounded-lg p-2 border">
                                    <!-- Header Preparación -->
                                    <div class="  flex items-center justify-between p-2 rounded">
                                        <h3 class="font-semibold text-gray-700 text-sm">Prep: {{ $preparacion }}</h3>
                                    </div>

                                    <!-- Lista de Etapas -->
                                    <div class=" flex ">
                                        @foreach ($etapas as $etapaNombre => $detalles)
                                            @php
                                                $tieneSolicitud = $detalles->contains(
                                                    fn($d) => optional(
                                                        $d->estadoPlanta,
                                                    )->solicitudAnalisisLinea->isNotEmpty(),
                                                );
                                                $tieneAnalisis = $detalles->contains(
                                                    fn($d) => optional(
                                                        $d->estadoPlanta,
                                                    )->solicitudAnalisisLinea->contains(
                                                        fn($s) => optional($s->analisisLinea)->user_id !== null,
                                                    ),
                                                );

                                                $estado = $tieneAnalisis
                                                    ? 'completado'
                                                    : ($tieneSolicitud
                                                        ? 'en-proceso'
                                                        : 'pendiente');
                                            @endphp


                                            <div class="flex items-center space-x-2 p-2 bg-white rounded border">

                                                <div class="flex-1">
                                                    <p class="text-xs font-medium text-gray-700">{{ $etapaNombre }}
                                                    </p>
                                                    <p class="text-xs font-light text-gray-700">
                                                        {{ $detalles->last()->estadoPlanta->Origen->alias }}</p>
                                                    <p class="text-xs text-gray-500">
                                                        @if ($estado == 'completado')
                                                            <p class="text-green-500 text-xs">Análisis completo</p>
                                                        @elseif($estado == 'en-proceso')
                                                            <p class="text-yellow-500 text-xs">Solicitud enviada</p>
                                                        @else
                                                            <p class="text-red-500 text-xs">Pendiente</p>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>



                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
