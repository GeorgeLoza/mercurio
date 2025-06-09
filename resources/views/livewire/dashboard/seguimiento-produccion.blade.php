<div>{{-- segunda copcion --}}



    <div>
        <div id="accordion-open" data-accordion="open">

            @if (request()->is('htst'))
            <h2 id="accordion-open-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-open-body-1" aria-expanded="false"
                    aria-controls="accordion-open-body-1">
                    <span class="flex items-center"> HTST</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                <div class="p-2 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    @foreach ($orps as $orp)
                        @if ($orp->producto->categoriaProducto->grupo == 'HTST')
                            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden">
                                <!-- Fila principal ORP -->
                                <div class="flex flex-col md:flex-row p-2 gap-2">
                                    <!-- Columna ORP (ancho fijo) -->
                                    <div class="flex-none w-full md:w-64 lg:w-80 border-r-0 md:border-r ">
                                        <div class="">
                                            <h2 class="text-sm font-bold text-gray-800 dark:text-gray-200">ORP:
                                                {{ $orp->codigo }}
                                            </h2>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">Producto:
                                                {{ $orp->producto->nombre }}
                                            </p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">Lote:
                                                {{ $orp->lote / 1 }}
                                            </p>
                                            <p
                                                class="text-xs  {{ $orp->fecha_vencimiento1 != null ? ' text-green-500   dark:text-green-300' : 'text-red-500 dark:text-red-300' }}">
                                                Vencimiento:
                                                {{ $orp->fecha_vencimiento1 }}</p>
                                        </div>
                                    </div>

                                    <!-- Contenedor Preparaciones (scroll horizontal) -->
                                    <div class="flex-1 items-center overflow-x-auto ">
                                        <div class="flex flex-col min-w-max overflow-visible">
                                            <!-- <== AÑADE overflow-visible -->
                                            @php
                                                $detallesAgrupados = $orp->estadoDetalle->groupBy([
                                                    'preparacion',
                                                    fn($detalle) => optional(optional($detalle->estadoPlanta)->etapa)
                                                        ->nombre ?? 'Sin etapa',
                                                ]);
                                            @endphp

                                            @foreach ($detallesAgrupados as $preparacion => $etapas)
                                                <div
                                                    class="flex  min-w-[280px] bg-gray-50 dark:bg-gray-900 rounded-lg p-2 border">
                                                    <!-- Header Preparación -->
                                                    <div class="flex items-center justify-between p-2 rounded mr-2">
                                                        <h3
                                                            class="font-semibold text-gray-700 dark:text-gray-300 text-sm whitespace-nowrap">
                                                            Prep:
                                                            {{ $preparacion }}</h3>
                                                    </div>

                                                    <!-- Lista de Etapas -->
                                                    <ol class="flex items-center  w-full overflow-visible">
                                                        <!-- <== AÑADE overflow-visible -->
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
                                                                        fn($s) => optional($s->analisisLinea)
                                                                            ->user_id !== null,
                                                                    ),
                                                                );
                                                                $estado = $tieneAnalisis
                                                                    ? 'completado'
                                                                    : ($tieneSolicitud
                                                                        ? 'en-proceso'
                                                                        : 'pendiente');
                                                            @endphp
                                                            @if ($etapaNombre != 'Pasteurizado')
                                                                <li class="sm:mb-0 mt-2 w-full">
                                                                    <div class="flex items-center cursor-pointer">
                                                                        <div
                                                                            class="z-10 flex items-center justify-center font-semibold w-6 h-6 {{ $estado == 'completado' ? 'bg-green-500  ring-green-200 dark:bg-green-900 sm:ring-8 dark:ring-green-700  text-white dark:text-green-100' : ($estado == 'en-proceso' ? 'bg-yellow-500  ring-yellow-200 dark:bg-yellow-900 sm:ring-8 dark:ring-yellow-700  text-white dark:text-yellow-100' : 'bg-red-500  ring-red-200 dark:bg-red-900 sm:ring-8 dark:ring-red-700  text-white dark:text-red-100') }}  rounded-full ring-0 shrink-0">
                                                                            {{ strtoupper(substr($etapaNombre, 0, 1)) }}
                                                                        </div>
                                                                        <div
                                                                            class="hidden sm:flex w-full  {{ $estado == 'completado' ? 'bg-green-500  dark:bg-green-900  text-white dark:text-green-100' : ($estado == 'en-proceso' ? 'bg-yellow-500   dark:bg-yellow-900  text-white dark:text-yellow-100' : 'bg-red-500   dark:bg-red-900    text-white dark:text-red-100') }} bg-gray-200 h-0.5 dark:bg-gray-700 text-2xs">
                                                                            <p
                                                                                class="ml-4 text-2xs text-gray-700 dark:text-gray-300">
                                                                                {{ $detalles->last()->estadoPlanta->origen->alias }}
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mt-3 sm:pe-8 w-10 md:w-20"></div>
                                                                </li>
                                                            @endif
                                                        @endforeach

                                                        <li class="sm:mb-0 mt-2 mr-2 flex-none ml-auto">
                                                            <div class="flex items-center cursor-pointer">
                                                                <div
                                                                    class="z-10 flex items-center justify-center font-semibold w-6 h-6 fill-white {{ $orp->fecha_vencimiento1 != null ? 'bg-green-500  ring-green-200 dark:bg-green-900 sm:ring-8 dark:ring-green-700  text-white dark:text-green-100' : 'bg-yellow-500  ring-yellow-200 dark:bg-yellow-900 sm:ring-8 dark:ring-yellow-700  text-white dark:text-yellow-100' }}  rounded-full ring-0 shrink-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" class="w-4 h-4">
                                                                        <path
                                                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif


            @if (request()->is('uht'))
            <h2 id="accordion-open-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-open-body-3" aria-expanded="false"
                    aria-controls="accordion-open-body-3">
                    <span class="flex items-center">UHT</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                <div class="p-2 border border-t-0 border-gray-200 dark:border-gray-700">
                    @foreach ($orps as $orp)
                        @if ($orp->producto->categoriaProducto->grupo == 'UHT')
                            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden">
                                <!-- Fila principal ORP -->
                                <div class="flex flex-col md:flex-row p-2 gap-2">
                                    <!-- Columna ORP (ancho fijo) -->
                                    <div class="flex-none w-full md:w-64 lg:w-80 border-r-0 md:border-r ">
                                        <div class="">
                                            <h2 class="text-sm font-bold text-gray-800 dark:text-gray-200">ORP:
                                                {{ $orp->codigo }}
                                            </h2>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">Producto:
                                                {{ $orp->producto->nombre }}
                                            </p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">Lote:
                                                {{ $orp->lote / 1 }}
                                            </p>
                                            <p
                                                class="text-xs  {{ $orp->fecha_vencimiento1 != null ? ' text-green-500   dark:text-green-300' : 'text-red-500 dark:text-red-300' }}">
                                                Vencimiento:
                                                {{ $orp->fecha_vencimiento1 }}</p>
                                        </div>
                                    </div>

                                    <!-- Contenedor Preparaciones (scroll horizontal) -->
                                    <div class="flex-1 items-center overflow-x-auto ">
                                        <div class="flex flex-col min-w-max overflow-visible">
                                            <!-- <== AÑADE overflow-visible -->
                                            @php
                                                $detallesAgrupados = $orp->estadoDetalle->groupBy([
                                                    'preparacion',
                                                    fn($detalle) => optional(optional($detalle->estadoPlanta)->etapa)
                                                        ->nombre ?? 'Sin etapa',
                                                ]);
                                            @endphp

                                            @foreach ($detallesAgrupados as $preparacion => $etapas)
                                                <div
                                                    class="flex  min-w-[280px] bg-gray-50 dark:bg-gray-900 rounded-lg p-2 border">
                                                    <!-- Header Preparación -->
                                                    <div class="flex items-center justify-between p-2 rounded mr-2">
                                                        <h3
                                                            class="font-semibold text-gray-700 dark:text-gray-300 text-sm whitespace-nowrap">
                                                            Prep:
                                                            {{ $preparacion }}</h3>
                                                    </div>

                                                    <!-- Lista de Etapas -->
                                                    <ol class="flex items-center  w-full overflow-visible">
                                                        <!-- <== AÑADE overflow-visible -->
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
                                                                        fn($s) => optional($s->analisisLinea)
                                                                            ->user_id !== null,
                                                                    ),
                                                                );
                                                                $estado = $tieneAnalisis
                                                                    ? 'completado'
                                                                    : ($tieneSolicitud
                                                                        ? 'en-proceso'
                                                                        : 'pendiente');
                                                            @endphp
                                                            @if ($etapaNombre != 'Pasteurizado')
                                                                <li class="sm:mb-0 mt-2 w-full">
                                                                    <div class="flex items-center cursor-pointer">
                                                                        <div
                                                                            class="z-10 flex items-center justify-center font-semibold w-6 h-6 {{ $estado == 'completado' ? 'bg-green-500  ring-green-200 dark:bg-green-900 sm:ring-8 dark:ring-green-700  text-white dark:text-green-100' : ($estado == 'en-proceso' ? 'bg-yellow-500  ring-yellow-200 dark:bg-yellow-900 sm:ring-8 dark:ring-yellow-700  text-white dark:text-yellow-100' : 'bg-red-500  ring-red-200 dark:bg-red-900 sm:ring-8 dark:ring-red-700  text-white dark:text-red-100') }}  rounded-full ring-0 shrink-0">
                                                                            {{ strtoupper(substr($etapaNombre, 0, 1)) }}
                                                                        </div>
                                                                        <div
                                                                            class="hidden sm:flex w-full  {{ $estado == 'completado' ? 'bg-green-500  dark:bg-green-900  text-white dark:text-green-100' : ($estado == 'en-proceso' ? 'bg-yellow-500   dark:bg-yellow-900  text-white dark:text-yellow-100' : 'bg-red-500   dark:bg-red-900    text-white dark:text-red-100') }} bg-gray-200 h-0.5 dark:bg-gray-700 text-2xs">
                                                                            <p
                                                                                class="ml-4 text-2xs text-gray-700 dark:text-gray-300">
                                                                                {{ $detalles->last()->estadoPlanta->origen->alias }}
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mt-3 sm:pe-8 w-10 md:w-20"></div>
                                                                </li>
                                                            @endif
                                                        @endforeach

                                                        <li class="sm:mb-0 mt-2 mr-2 flex-none ml-auto">
                                                            <div class="flex items-center cursor-pointer">
                                                                <div
                                                                    class="z-10 flex items-center justify-center font-semibold w-6 h-6 fill-white {{ $orp->fecha_vencimiento1 != null ? 'bg-green-500  ring-green-200 dark:bg-green-900 sm:ring-8 dark:ring-green-700  text-white dark:text-green-100' : 'bg-yellow-500  ring-yellow-200 dark:bg-yellow-900 sm:ring-8 dark:ring-yellow-700  text-white dark:text-yellow-100' }}  rounded-full ring-0 shrink-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" class="w-4 h-4">
                                                                        <path
                                                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>




</div>
