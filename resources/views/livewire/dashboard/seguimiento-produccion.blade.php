<div>{{-- segunda copcion --}}



    <div>
        <div id="accordion-open" data-accordion="open">
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
        </div>
    </div>


    <div class="container mx-auto space-y-1">




        @foreach ($orps as $orp)
            <div class=" dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                <!-- Fila principal ORP -->
                <div class="flex flex-col md:flex-row p-1 gap-2">
                    <!-- Columna ORP (ancho fijo) -->
                    <div class="flex-none w-full md:w-64 lg:w-80 border-r-0 md:border-r ">
                        <div class=" text-gray-800  dark:text-gray-300">
                            <h2 class="text-sm font-bold ">ORP: {{ $orp->codigo }}</h2>
                            <p class="text-xs ">Producto: {{ $orp->producto->nombre }}</p>
                            <p class="text-xs ">Lote: {{ $orp->lote / 1 }}</p>
                            <p class="text-xs ">Vencimiento: {{ $orp->fecha_vencimiento1 }}</p>
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
                                <div class="flex   min-w-[280px] rounded-lg p-2 ">
                                    <!-- Header Preparación -->
                                    <div class="  flex items-center justify-between p-2 rounded">
                                        <h3 class="font-semibold text-gray-800  dark:text-gray-300 text-sm">Prep:
                                            <br> {{ $preparacion }}
                                        </h3>
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

                                            <li @if ($etapaNombre == 'Envasado') class="   flex items-center  "
                                            @elseif ($etapaNombre == 'Pasteurizado')
                                                   class="flex w-full items-center  after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-200 after:border-4 after:inline-block dark:after:border-blue-800"

                                            @else
                                                @if ($estado == 'completado')
                                                    class="flex w-full items-center  after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-200 after:border-4 after:inline-block dark:after:border-blue-800"
                                                @else
                                                    class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700" @endif
                                                @endif

                                                >
                                                <span
                                                    @if ($estado == 'completado' || $etapaNombre == 'Pasteurizado') class="flex items-center justify-center w-10 h-10 bg-blue-200 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0 flex-col"
                                                    @else
                                                        class=" items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0 flex flex-col" @endif>

                                                    <div>

                                                        {{ strtoupper(substr($etapaNombre, 0, 1)) }}
                                                        <br>
                                                        {{-- <span class="text-2xm">

                                                            {{ $detalles->last()->estadoPlanta->Origen->alias }}
                                                        </span> --}}
                                                    </div>
                                                    @php
                                                        $color1 =
                                                            $estado === 'completado' || $estado === 'en-proceso'
                                                                ? 'fill-green-500 dark:fill-green-400'
                                                                : 'fill-gray-500';
                                                        $color2 =
                                                            $estado === 'completado'
                                                                ? 'fill-green-500 dark:fill-green-400'
                                                                : 'fill-gray-500';
                                                    @endphp

                                                    <div class="flex">

                                                        @if ($etapaNombre != 'Pasteurizado')

                                                            <svg class="h-4 {{ $color1 }}"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512">
                                                                <path
                                                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                            </svg>

                                                            <svg class="h-4 {{ $color2 }}"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512">
                                                                <path
                                                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                            </svg>
                                                        @endif
                                                    </div>



                                                </span>

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
    {{-- <div class="container mx-auto space-y-1">


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
    </div> --}}









    <div class="container mx-auto space-y-1">




        @foreach ($orps as $orp)
            <div class=" dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                <!-- Fila principal ORP -->
                <div class="flex flex-col md:flex-row p-1 gap-2">
                    <!-- Columna ORP (ancho fijo) -->
                    <div class="flex-none w-full md:w-64 lg:w-80 border-r-0 md:border-r ">
                        <div class=" text-gray-800  dark:text-gray-300">
                            <h2 class="text-sm font-bold ">ORP: {{ $orp->codigo }}</h2>
                            <p class="text-xs ">Producto: {{ $orp->producto->nombre }}</p>
                            <p class="text-xs ">Lote: {{ $orp->lote / 1 }}</p>
                            <p class="text-xs ">Vencimiento: {{ $orp->fecha_vencimiento1 }}</p>
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
                                <div class="flex   min-w-[280px] rounded-lg p-2 ">
                                    <!-- Header Preparación -->
                                    <div class="  flex items-center justify-between p-2 rounded">
                                        <h3 class="font-semibold text-gray-800  dark:text-gray-300 text-sm">Prep:
                                            <br> {{ $preparacion }}
                                        </h3>
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






                                            <li @if ($etapaNombre == 'Envasado') class="   flex items-center  "
                                            @elseif ($etapaNombre == 'Pasteurizado')
                                                   class="flex w-full items-center  after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-400 after:border-4 after:inline-block dark:after:border-blue-400"

                                            @else
                                                @if ($estado == 'completado')
                                                    class="flex w-full items-center  after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-400 after:border-4 after:inline-block dark:after:border-blue-400"
                                                @elseif ($estado == 'en-proceso')
                                                   class="flex w-full items-center relative overflow-hidden
                                                     before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:w-1/2 before:h-1 before:bg-yellow-400
                                                    after:content-[''] after:absolute after:top-1/2 after:-translate-y-1/2 after:right-0 after:w-1/2 after:h-1 after:bg-white dark:after:bg-slate-700"
                                                    @else
                                                    class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700" @endif
                                                @endif

                                                >

                                                <style>
                                                    .esferaAzul {


                                                        width: 40px;
                                                        height: 40px;
                                                        border-radius: 50%;
                                                        background: #3b82f6;
                                                        /* Azul base */
                                                        box-shadow:
                                                            8px 8px 15px rgba(0, 0, 0, 0.2),
                                                            inset -2px -2px 4px rgba(255, 255, 255, 0.2),
                                                            inset 2px 2px 4px rgba(0, 0, 0, 0.1);
                                                    }

                                                    .esferaAmarilla {
                                                        width: 40px;
                                                        height: 40px;
                                                        border-radius: 50%;
                                                        background: #facc15;
                                                        /* Amarillo base */
                                                        box-shadow:
                                                            8px 8px 15px rgba(0, 0, 0, 0.2),
                                                            inset -2px -2px 4px rgba(255, 255, 255, 0.2),
                                                            inset 2px 2px 4px rgba(0, 0, 0, 0.1);
                                                    }
                                                </style>

                                                <span
                                                    @if ($estado == 'completado' || $etapaNombre == 'Pasteurizado') class="flex items-center justify-center w-10 h-10 bg-blue-400 rounded-full lg:h-12 lg:w-12 dark:bg-blue-400 shrink-0 flex-col text-black esferaAzul"
                                                    @elseif ($estado == 'en-proceso')
                                                        class=" z-10 flex items-center justify-center w-10 h-10 bg-yellow-300 rounded-full lg:h-12 lg:w-12 dark:bg-yellow-300 shrink-0 flex-col text-black esferaAmarilla"
                                                    @else
                                                        class="z-10 items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0 flex flex-col text-black" @endif>

                                                    <div>

                                                        {{ strtoupper(substr($etapaNombre, 0, 1)) }}
                                                        <br>
                                                        {{-- <span class="text-2xm">

                                                            {{ $detalles->last()->estadoPlanta->Origen->alias }}
                                                        </span> --}}
                                                    </div>


                                                    <div class="flex">

                                                        @if ($etapaNombre != 'Pasteurizado')

                                                            {{-- <svg class="h-4 {{ $color1 }}"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                            <path
                                                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                        </svg>

                                                        <svg class="h-4 {{ $color2 }}"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                            <path
                                                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                        </svg> --}}
                                                        @endif
                                                    </div>



                                                </span>


                                            </li>
                                            {{-- <br>
                                            <div class="text-xs">

                                                {{ $detalles->last()->estadoPlanta->Origen->alias }}
                                            </div> --}}

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


</div>
