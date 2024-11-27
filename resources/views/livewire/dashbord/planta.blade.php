<div wire:poll.25s>
    <div class="md:flex gap-2 mb-2">
        <div class="flex">
            <span class="flex items-center text-xs font-medium "><span
                    class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0 mr-2 text-sm"></span>Produccion</span>
            <span class="flex items-center text-xs font-medium "><span
                    class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0 mr-2 text-sm"></span>Limpieza</span>
        </div>
        <div class="flex">
            <span class="flex items-center text-xs font-medium "><span
                    class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0 mr-2 text-sm"></span>Mantenimiento</span>
            <span class="flex items-center text-xs font-medium "><span
                    class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0 mr-2 text-sm"></span>Vacio</span>
        </div>
         <span class="flex items-center text-xs font-medium    "><span
                class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0 mr-2 text-sm"></span>Almacen </span>
    </div>
    <div
        class="grid border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2 bg-white dark:bg-gray-800">
        <!--Pasteurizado-->
        <figure
            class="  p-3  bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white ">Sala de Pasteurizado</h5>

            <!--TKMIX1 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKMIX1)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="mix1-analizar-popover">

                        <p class="flex gap-2  items-center">
                            @if ($TKMIX1->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX1->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX1->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX1->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX1->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKMIX1->origen->alias }}
                        </p>

                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKMIX1->tiempo)->isoFormat('HH:mm') }}
                        </p>


                        <div class="w-3/6 items-center">
                            @if ($TKMIX1->proceso == 'Produccion' || $TKMIX1->proceso == 'Almacen')
                                @foreach ($TKMIX1->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKMIX1->proceso == 'Produccion' || $TKMIX1->proceso == 'Almacen')
                                @if ($TKMIX1->etapa)
                                    {{ $TKMIX1->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>


                    <div data-popover id="mix1-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKMIX1->proceso == 'Produccion' || $TKMIX1->proceso == 'Almacen')
                                    @foreach ($TKMIX1->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>

                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKMIX1->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKMIX1 = $TKMIX1->solicitudAnalisisLinea[count($TKMIX1->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKMIX1->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKMIX1->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span
                                        class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKMIX1->analisisLinea->temperatura / 1 }}
                                    [°C]</p>
                                <p><Span
                                        class="inline-block w-32">pH</Span>:{{ $ultimo_TKMIX1->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span
                                        class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKMIX1->analisisLinea->acidez / 1 }}[%]
                                </p>
                                <p><Span
                                        class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKMIX1->analisisLinea->brix / 1 }}[°Bx]
                                </p>
                            @endif
                        </div>

                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKMIX1->proceso == 'Produccion' || $TKMIX1->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKMIX1->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKMIX1->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKMIX1->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKMIX1->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMIX1->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>

                    </div>
                @endif
            </div>
            <!--TKMIX1 FIN-->

            <!--TKMIX2 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKMIX2)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="mix2-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($TKMIX2->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX2->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX2->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX2->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX2->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKMIX2->origen->alias }}
                        </p>

                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKMIX2->tiempo)->isoFormat('HH:mm') }}
                        </p>



                        <div class="w-3/6 items-center">
                            @if ($TKMIX2->proceso == 'Produccion' || $TKMIX2->proceso == 'Almacen')
                                @foreach ($TKMIX2->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKMIX2->proceso == 'Produccion' || $TKMIX2->proceso == 'Almacen')
                                @if ($TKMIX2->etapa)
                                    {{ $TKMIX2->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>

                    <div data-popover id="mix2-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKMIX2->proceso == 'Produccion' || $TKMIX2->proceso == 'Almacen')
                                    @foreach ($TKMIX2->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif

                            </h3>
                        </div>

                        <div class="px-3 py-2">
                            @if (count($TKMIX2->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKMIX2 = $TKMIX2->solicitudAnalisisLinea[count($TKMIX2->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>:
                                    {{ $ultimo_TKMIX2->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKMIX2->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKMIX2->analisisLinea->temperatura / 1 }}[°C] </p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKMIX2->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKMIX2->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKMIX2->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>



                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKMIX2->proceso == 'Produccion' || $TKMIX2->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKMIX2->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKMIX2->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKMIX2->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKMIX2->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMIX2->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TKMIX2 FIN-->

            <!--TKMIX3 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKMIX3)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="mix3-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($TKMIX3->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX3->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX3->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX3->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX3->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKMIX3->origen->alias }}
                        </p>

                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKMIX3->tiempo)->isoFormat('HH:mm') }}
                        </p>


                        <div class="w-3/6 items-center">
                            @if ($TKMIX3->proceso == 'Produccion' || $TKMIX3->proceso == 'Almacen')
                                @foreach ($TKMIX3->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>
                        <p class="flex gap-2  items-center">
                            @if ($TKMIX3->proceso == 'Produccion' || $TKMIX3->proceso == 'Almacen')
                                @if ($TKMIX3->etapa)
                                    {{ $TKMIX3->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>

                    <div data-popover id="mix3-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKMIX3->proceso == 'Produccion' || $TKMIX3->proceso == 'Almacen')
                                    @foreach ($TKMIX3->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif

                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKMIX3->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKMIX3 = $TKMIX3->solicitudAnalisisLinea[count($TKMIX3->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>:
                                    {{ $ultimo_TKMIX3->estado }} </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKMIX3->analisisLinea->temperatura / 1 }} </p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKMIX3->analisisLinea->ph / 1 }} </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKMIX3->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKMIX3->analisisLinea->brix / 1 }}[°Bx]
                                </p>
                            @endif
                        </div>

                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKMIX3->proceso == 'Produccion' || $TKMIX3->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKMIX3->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKMIX3->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKMIX3->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKMIX3->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMIX3->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TKMIX3 FIN-->

            <!--TKMIX4 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKMIX4)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="mix4-analizar-popover">
                        <p class="flex gap-2  items-center">

                            @if ($TKMIX4->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX4->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX4->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX4->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMIX4->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif


                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKMIX4->origen->alias }}
                        </p>

                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKMIX4->tiempo)->isoFormat('HH:mm') }}
                        </p>


                        <div class="w-3/6 items-center">
                            @if ($TKMIX4->proceso == 'Produccion' || $TKMIX4->proceso == 'Almacen')
                                @foreach ($TKMIX4->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>
                        <p class="flex gap-2  items-center">
                            @if ($TKMIX4->proceso == 'Produccion' || $TKMIX4->proceso == 'Almacen')
                                @if ($TKMIX4->etapa)
                                    {{ $TKMIX4->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>

                    <div data-popover id="mix4-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKMIX4->proceso == 'Produccion' || $TKMIX4->proceso == 'Almacen')
                                    @foreach ($TKMIX4->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif

                            </h3>
                        </div>

                        <div class="px-3 py-2">
                            @if (count($TKMIX4->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKMIX4 = $TKMIX4->solicitudAnalisisLinea[count($TKMIX4->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>:
                                    {{ $ultimo_TKMIX4->estado }} </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKMIX4->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKMIX4->analisisLinea->ph / 1 }} </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKMIX4->analisisLinea->acidez / 1 }} [%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKMIX4->analisisLinea->brix / 1 }}[°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKMIX4->proceso == 'Produccion' || $TKMIX4->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKMIX4->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKMIX4->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKMIX4->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKMIX4->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMIX4->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TKMIX4 FIN-->

            <!--TK41 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TK41)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="tk41-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($TK41->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK41->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK41->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK41->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK41->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TK41->origen->alias }}
                        </p>

                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TK41->tiempo)->isoFormat('HH:mm') }}
                        </p>



                        <div class="w-3/6 items-center">
                            @if ($TK41->proceso == 'Produccion' || $TK41->proceso == 'Almacen')
                                @foreach ($TK41->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TK41->proceso == 'Produccion' || $TK41->proceso == 'Almacen')
                                @if ($TK41->etapa)
                                    {{ $TK41->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>

                    <div data-popover id="tk41-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TK41->proceso == 'Produccion' || $TK41->proceso == 'Almacen')
                                    @foreach ($TK41->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif

                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TK41->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TK41 = $TK41->solicitudAnalisisLinea[count($TK41->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TK41->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TK41->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TK41->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TK41->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TK41->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TK41->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TK41->proceso == 'Produccion' || $TK41->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TK41->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TK41->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TK41->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TK41->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TK41->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TK41 FIN-->

            <!--TK42 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">

                @if ($TK42)


                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="tk42-analizar-popover">
                        <p class="flex gap-2  items-center">

                            @if ($TK42->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK42->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK42->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK42->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK42->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TK42->origen->alias }}
                        </p>

                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TK42->tiempo)->isoFormat('HH:mm') }}
                        </p>



                        <div class="w-3/6 items-center">
                            @if ($TK42->proceso == 'Produccion' || $TK42->proceso == 'Almacen')
                                @foreach ($TK42->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TK42->proceso == 'Produccion' || $TK42->proceso == 'Almacen')
                                @if ($TK42->etapa)
                                    {{ $TK42->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>

                    <div data-popover id="tk42-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TK42->proceso == 'Produccion' || $TK42->proceso == 'Almacen')
                                    @foreach ($TK42->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif

                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TK42->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TK42 = $TK42->solicitudAnalisisLinea[count($TK42->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TK42->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TK42->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TK42->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TK42->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TK42->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TK42->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TK42->proceso == 'Produccion' || $TK42->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TK42->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TK42->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TK42->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TK42->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TK42->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TK42 FIN-->
        </figure>
        <!--saborizado-->
        <figure
            class="  p-3  bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white ">Sala de Saborizado</h5>

            <!--TK10 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TK10)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="tk10-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($TK10->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK10->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK10->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK10->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK10->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif



                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TK10->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TK10->tiempo)->isoFormat('HH:mm') }}
                        </p>

                        <div class="w-3/6 items-center">
                            @if ($TK10->proceso == 'Produccion' || $TK10->proceso == 'Almacen')
                                @foreach ($TK10->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>
                        <p class="flex gap-2  items-center">
                            @if ($TK10->proceso == 'Produccion' || $TK10->proceso == 'Almacen')
                                @if ($TK10->etapa)
                                    {{ $TK10->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>
                    <div data-popover id="tk10-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TK10->proceso == 'Produccion' || $TK10->proceso == 'Almacen')
                                    @foreach ($TK10->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TK10->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TK10 = $TK10->solicitudAnalisisLinea[count($TK10->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TK10->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TK10->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp,</Span>:
                                    {{ $ultimo_TK10->analisisLinea->temperatura / 1 }}[°C] </p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TK10->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TK10->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TK10->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TK10->proceso == 'Produccion' || $TK10->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TK10->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TK10->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TK10->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TK10->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TK10->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TK10 FIN-->

            <!--TK5 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TK5)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="tk5-analizar-popover">
                        <p class="flex gap-2  items-center">

                            @if ($TK5->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK5->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK5->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK5->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TK5->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif



                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TK5->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TK5->tiempo)->isoFormat('HH:mm') }}
                        </p>

                        <div class="w-3/6 items-center">
                            @if ($TK5->proceso == 'Produccion' || $TK5->proceso == 'Almacen')
                                @foreach ($TK5->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TK5->proceso == 'Produccion' || $TK5->proceso == 'Almacen')
                                @if ($TK5->etapa)
                                    {{ $TK5->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>
                    <div data-popover id="tk5-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TK5->proceso == 'Produccion' || $TK5->proceso == 'Almacen')
                                    @foreach ($TK5->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TK5->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TK5 = $TK5->solicitudAnalisisLinea[count($TK5->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TK5->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TK5->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TK5->analisisLinea->temperatura / 1 }}[°C] </p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TK5->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TK5->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TK5->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TK5->proceso == 'Produccion' || $TK5->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TK5->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TK5->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TK5->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TK5->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TK5->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TK5 FIN-->

            <!--TKFP INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKFP)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="tkfp-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($TKFP->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKFP->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKFP->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKFP->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKFP->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif


                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKFP->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKFP->tiempo)->isoFormat('HH:mm') }}
                        </p>


                        <div class="w-3/6 items-center">
                            @if ($TKFP->proceso == 'Produccion' || $TKFP->proceso == 'Almacen')
                                @foreach ($TKFP->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKFP->proceso == 'Produccion' || $TKFP->proceso == 'Almacen')
                                @if ($TKFP->etapa)
                                    {{ $TKFP->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>

                    <div data-popover id="tkfp-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKFP->proceso == 'Produccion' || $TKFP->proceso == 'Almacen')
                                    @foreach ($TKFP->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKFP->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKFP = $TKFP->solicitudAnalisisLinea[count($TKFP->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKFP->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKFP->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKFP->analisisLinea->temperatura / 1 }} </p>[°C]
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKFP->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKFP->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKFP->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKFP->proceso == 'Produccion' || $TKFP->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKFP->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKFP->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKFP->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKFP->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKFP->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TKFP FIN-->


            <!--MP INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKMP)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="mp-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($TKMP->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMP->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMP->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMP->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMP->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKMP->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKMP->tiempo)->isoFormat('HH:mm') }}
                        </p>

                        <div class="w-3/6 items-center">
                            @if ($TKMP->proceso == 'Produccion' || $TKMP->proceso == 'Almacen')
                                @foreach ($TKMP->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKMP->proceso == 'Produccion' || $TKMP->proceso == 'Almacen')
                                @if ($TKMP->etapa)
                                    {{ $TKMP->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>
                    <div data-popover id="mp-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKMP->proceso == 'Produccion' || $TKMP->proceso == 'Almacen')
                                    @foreach ($TKMP->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKMP->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKMP = $TKMP->solicitudAnalisisLinea[count($TKMP->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKMP->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKMP->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKMP->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKMP->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKMP->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKMP->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKMP->proceso == 'Produccion' || $TKMP->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKMP->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKMP->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKMP->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKMP->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMP->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--MP FIN-->
            <!--FG INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKFG)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="fg-analizar-popover">
                        <p class="flex gap-2  items-center">

                            @if ($TKFG->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKFG->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKFG->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKFG->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKFG->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif


                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKFG->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKFG->tiempo)->isoFormat('HH:mm') }}
                        </p>

                        <div class="w-3/6 items-center">
                            @if ($TKFG->proceso == 'Produccion' || $TKFG->proceso == 'Almacen')
                                @foreach ($TKFG->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKFG->proceso == 'Produccion' || $TKFG->proceso == 'Almacen')
                                @if ($TKFG->etapa)
                                    {{ $TKFG->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>

                    <div data-popover id="fg-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKFG->proceso == 'Produccion' || $TKFG->proceso == 'Almacen')
                                    @foreach ($TKFG->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKFG->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKFG = $TKFG->solicitudAnalisisLinea[count($TKFG->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKFG->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKFG->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKFG->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKFG->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKFG->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKFG->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKFG->proceso == 'Produccion' || $TKFG->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKFG->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKFG->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKFG->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKFG->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKFG->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--FG FIN-->

            <!--MG INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKMG)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="mg-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($TKMG->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMG->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMG->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMG->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKMG->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKMG->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKMG->tiempo)->isoFormat('HH:mm') }}
                        </p>

                        <div class="w-3/6 items-center">
                            @if ($TKMG->proceso == 'Produccion' || $TKMG->proceso == 'Almacen')
                                @foreach ($TKMG->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKMG->proceso == 'Produccion' || $TKMG->proceso == 'Almacen')
                                @if ($TKMG->etapa)
                                    {{ $TKMG->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>
                    <div data-popover id="mg-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKMG->proceso == 'Produccion' || $TKMG->proceso == 'Almacen')
                                    @foreach ($TKMG->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKMG->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKMG = $TKMG->solicitudAnalisisLinea[count($TKMG->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKMG->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKMG->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKMG->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKMG->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKMG->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKMG->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKMG->proceso == 'Produccion' || $TKMG->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKMG->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKMG->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKMG->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKMG->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMG->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--MG FIN-->




        </figure>
        <!--Vasos-->
        <figure
            class="  p-3  bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white ">Sala de Vasos</h5>

            <!--TKCC INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKCC)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="tkcc-analizar-popover">
                        <p class="flex gap-2  items-center">

                            @if ($TKCC->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKCC->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKCC->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKCC->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKCC->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif


                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKCC->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKCC->tiempo)->isoFormat('HH:mm') }}
                        </p>


                        <div class="w-3/6 items-center">
                            @if ($TKCC->proceso == 'Produccion' || $TKCC->proceso == 'Almacen')
                                @foreach ($TKCC->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKCC->proceso == 'Produccion' || $TKCC->proceso == 'Almacen')
                                @if ($TKCC->etapa)
                                    {{ $TKCC->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>
                    <div data-popover id="tkcc-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKCC->proceso == 'Produccion' || $TKCC->proceso == 'Almacen')
                                    @foreach ($TKCC->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKCC->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKCC = $TKCC->solicitudAnalisisLinea[count($TKCC->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKCC->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKCC->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKCC->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKCC->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKCC->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKCC->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKCC->proceso == 'Produccion' || $TKCC->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKCC->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKCC->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKCC->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKCC->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKCC->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TKCC FIN-->

            <!--TKSC INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKSC)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="tksc-analizar-popover">
                        <p class="flex gap-2  items-center">

                            @if ($TKSC->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKSC->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKSC->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKSC->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKSC->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKSC->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKSC->tiempo)->isoFormat('HH:mm') }}
                        </p>

                        <div class="w-3/6 items-center">
                            @if ($TKSC->proceso == 'Produccion' || $TKSC->proceso == 'Almacen')
                                @foreach ($TKSC->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKSC->proceso == 'Produccion' || $TKSC->proceso == 'Almacen')
                                @if ($TKSC->etapa)
                                    {{ $TKSC->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>

                    <div data-popover id="tksc-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKSC->proceso == 'Produccion' || $TKSC->proceso == 'Almacen')
                                    @foreach ($TKSC->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKSC->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKSC = $TKSC->solicitudAnalisisLinea[count($TKSC->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>:
                                    {{ $ultimo_TKSC->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKSC->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKSC->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKSC->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKSC->analisisLinea->acidez / 1 }} [%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKSC->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKSC->proceso == 'Produccion' || $TKSC->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKSC->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKSC->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKSC->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKSC->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKSC->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TKSC FIN-->

            <!--TKAUX1 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKAUX1)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="tkAUX1-analizar-popover">
                        <p class="flex gap-2  items-center">

                            @if ($TKAUX1->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKAUX1->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKAUX1->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKAUX1->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKAUX1->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif


                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKAUX1->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKAUX1->tiempo)->isoFormat('HH:mm') }}
                        </p>


                        <div class="w-3/6 items-center">
                            @if ($TKAUX1->proceso == 'Produccion' || $TKAUX1->proceso == 'Almacen')
                                @foreach ($TKAUX1->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKAUX1->proceso == 'Produccion' || $TKAUX1->proceso == 'Almacen')
                                @if ($TKAUX1->etapa)
                                    {{ $TKAUX1->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>
                    <div data-popover id="tkAUX1-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKAUX1->proceso == 'Produccion' || $TKAUX1->proceso == 'Almacen')
                                    @foreach ($TKAUX1->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKAUX1->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKAUX1 = $TKAUX1->solicitudAnalisisLinea[count($TKAUX1->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>:
                                    {{ $ultimo_TKAUX1->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKAUX1->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKAUX1->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKAUX1->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKAUX1->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKAUX1->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKAUX1->proceso == 'Produccion' || $TKAUX1->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKAUX1->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKAUX1->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKAUX1->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKAUX1->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKAUX1->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TKAUX1 FIN-->


            <!--TKAUX2 INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($TKAUX2)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="tkAUX2-analizar-popover">
                        <p class="flex gap-2  items-center">

                            @if ($TKAUX2->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKAUX2->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKAUX2->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKAUX2->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($TKAUX2->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $TKAUX2->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($TKAUX2->tiempo)->isoFormat('HH:mm') }}
                        </p>

                        <div class="w-3/6 items-center">
                            @if ($TKAUX2->proceso == 'Produccion' || $TKAUX2->proceso == 'Almacen')
                                @foreach ($TKAUX2->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p class="flex gap-2  items-center">
                            @if ($TKAUX2->proceso == 'Produccion' || $TKAUX2->proceso == 'Almacen')
                                @if ($TKAUX2->etapa)
                                    {{ $TKAUX2->etapa->nombre }}
                                @endif
                            @endif
                        </p>
                    </div>

                    <div data-popover id="tkAUX2-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKAUX2->proceso == 'Produccion' || $TKAUX2->proceso == 'Almacen')
                                    @foreach ($TKAUX2->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKAUX2->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKAUX2 = $TKAUX2->solicitudAnalisisLinea[count($TKAUX2->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>:
                                    {{ $ultimo_TKAUX2->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKAUX2->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span class="inline-block w-32">Temp.</Span>:
                                    {{ $ultimo_TKAUX2->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span class="inline-block w-32">pH</Span>:
                                    {{ $ultimo_TKAUX2->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span class="inline-block w-32">Ac.</Span>:
                                    {{ $ultimo_TKAUX2->analisisLinea->acidez / 1 }} [%]</p>
                                <p><Span class="inline-block w-32">Sólidos</Span>:
                                    {{ $ultimo_TKAUX2->analisisLinea->brix / 1 }} [°Bx]
                                </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($TKAUX2->proceso == 'Produccion' || $TKAUX2->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $TKAUX2->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $TKAUX2->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $TKAUX2->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $TKAUX2->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKAUX2->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!--TKAUX2 FIN-->
        </figure>
        <!--Recepcion-->
        <figure
            class="  p-3  bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Recepción</h5>

            <!-- R1 INICIO -->
            <div class="p-2 mb-2 rounded-lg border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($R1)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="r1-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($R1->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R1->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R1->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R1->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R1->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif


                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $R1->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($R1->tiempo)->isoFormat('HH:mm') }}
                        </p>


                        <div class="w-3/6 items-center">
                            @if ($R1->proceso == 'Produccion' || $R1->proceso == 'Almacen')
                                @foreach ($R1->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>
                        <p>
                            @foreach ($R1->estadoDetalle as $item)
                            <p>{{$item->cantidad/1}} Litros</p>
                            @endforeach
                        </p>
                    </div>

                    <div data-popover id="r1-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($R1->proceso == 'Produccion' || $R1->proceso == 'Almacen')
                                    @foreach ($R1->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($R1->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_R1 = $R1->solicitudAnalisisLinea[count($R1->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span>Estado Análisis</Span>: {{ $ultimo_R1->estado }} </p>
                                <p><Span>Temp.</Span>: {{ $ultimo_R1->analisisLinea->temperatura / 1 }}[°C] </p>
                                <p><Span>pH</Span>: {{ $ultimo_R1->analisisLinea->ph / 1 }} </p>
                                <p><Span>Ac.</Span>: {{ $ultimo_R1->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span>Sólidos</Span>: {{ $ultimo_R1->analisisLinea->brix / 1 }} [°Bx]</p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($R1->proceso == 'Produccion' || $R1->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $R1->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $R1->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $R1->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $R1->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $R1->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>

                            <!--boton almacen-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $R1->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!-- R1 FIN -->

            <!-- R2 INICIO -->
            <div class="p-2 mb-2 rounded-lg border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($R2)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="r2-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($R2->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R2->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R2->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R2->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R2->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif


                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $R2->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($R2->tiempo)->isoFormat('HH:mm') }}
                        </p>


                        <div class="w-3/6 items-center">
                            @if ($R2->proceso == 'Produccion' || $R2->proceso == 'Almacen')
                                @foreach ($R2->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>

                        <p>
                            @foreach ($R2->estadoDetalle as $item)
                            <p>{{$item->cantidad/1}} Litros</p>
                            @endforeach
                        </p>
                    </div>
                    <div data-popover id="r2-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($R2->proceso == 'Produccion' || $R2->proceso == 'Almacen')
                                    @foreach ($R2->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($R2->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_R2 = $R2->solicitudAnalisisLinea[count($R2->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span>Estado Análisis</Span>: {{ $ultimo_R2->estado }} </p>
                                <p><Span>Temp.</Span>: {{ $ultimo_R2->analisisLinea->temperatura / 1 }} [°C]</p>
                                <p><Span>pH</Span>: {{ $ultimo_R2->analisisLinea->ph / 1 }} </p>
                                <p><Span>Ac.</Span>: {{ $ultimo_R2->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span>Sólidos</Span>: {{ $ultimo_R2->analisisLinea->brix / 1 }}[°Bx] </p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($R2->proceso == 'Produccion' || $R2->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $R2->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $R2->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $R2->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $R2->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $R2->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>

                            <!--boton almacen-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $R2->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!-- R2 FIN -->

            <!-- R3 INICIO -->
            <div class="p-2 mb-2 rounded-lg border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($R3)
                    <div class="flex justify-between text-xs" data-popover-trigger="click"
                        data-popover-target="r3-analizar-popover">
                        <p class="flex gap-2  items-center">

                            @if ($R3->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R3->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R3->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R3->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($R3->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            {{ $R3->origen->alias }}
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($R3->tiempo)->isoFormat('HH:mm') }}
                        </p>


                        <div class="w-3/6 items-center">
                            @if ($R3->proceso == 'Produccion' || $R3->proceso == 'Almacen')
                                @foreach ($R3->estadoDetalle as $item)
                                    <p>{{ substr($item->orp->codigo, -5) }} -
                                        {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                                @endforeach
                            @endif
                        </div>
                        <p>
                            @foreach ($R3->estadoDetalle as $item)
                            <p>{{$item->cantidad/1}} Litros</p>
                            @endforeach
                        </p>
                    </div>
                    <div data-popover id="r3-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($R3->proceso == 'Produccion' || $R3->proceso == 'Almacen')
                                    @foreach ($R3->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>
                        </div>
                        <div class="px-3 py-2">
                            @if (count($R3->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_R3 = $R3->solicitudAnalisisLinea[count($R3->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span>Estado Análisis</Span>: {{ $ultimo_R3->estado }} </p>
                                <p><Span>Temp.</Span>: {{ $ultimo_R3->analisisLinea->temperatura / 1 }}[°C] </p>
                                <p><Span>pH</Span>: {{ $ultimo_R3->analisisLinea->ph / 1 }} </p>
                                <p><Span>Ac.</Span>: {{ $ultimo_R3->analisisLinea->acidez / 1 }}[%]</p>
                                <p><Span>Sólidos</Span>: {{ $ultimo_R3->analisisLinea->brix / 1 }}[°Bx]</p>
                            @endif
                        </div>
                        <div class="flex gap-2 px-3 py-2">
                            <!--boton de solicitar-->
                            @if ($R3->proceso == 'Produccion' || $R3->proceso == 'Almacen')
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="solicitar({{ $R3->id }})"
                                    class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                    </svg>
                                </button>
                            @endif
                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $R3->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $R3->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $R3->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $R3->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>

                            <!--boton almacen-->
                            <button type="button"
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $R3->id }} } })"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <!-- R3 FIN -->

            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white ">Sala Soya</h5>

        <!--TKSY INICIO-->
        <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
            @if ($TKSY)
                <div class="flex justify-between text-xs" data-popover-trigger="click"
                    data-popover-target="TKSY-analizar-popover">

                    <p class="flex gap-2  items-center">
                        @if ($TKSY->proceso == 'Produccion')
                            <span class="flex items-center text-xs font-medium "><span
                                    class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                        @endif

                        @if ($TKSY->proceso == 'Limpieza')
                            <span class="flex items-center text-xs font-medium "><span
                                    class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                        @endif

                        @if ($TKSY->proceso == 'Mantenimiento')
                            <span class="flex items-center text-xs font-medium "><span
                                    class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                        @endif

                        @if ($TKSY->proceso == 'Vacio')
                            <span class="flex items-center text-xs font-medium "><span
                                    class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                        @endif

                        @if ($TKSY->proceso == 'Almacen')
                            <span class="flex items-center text-xs font-medium "><span
                                    class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                        @endif

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                            <path transform="scale(0.8 0.8)"
                                d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                            <path transform="scale(0.8 0.8)"
                                d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                        </svg>
                        {{ $TKSY->origen->alias }}
                    </p>

                    <p class="flex gap-2  items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                            <path
                                d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($TKSY->tiempo)->isoFormat('HH:mm') }}
                    </p>


                    <div class="w-3/6 items-center">
                        @if ($TKSY->proceso == 'Produccion' || $TKSY->proceso == 'Almacen')
                            @foreach ($TKSY->estadoDetalle as $item)
                                <p>{{ substr($item->orp->codigo, -5) }} -
                                    {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                            @endforeach
                        @endif
                    </div>

                    <p class="flex gap-2  items-center">
                        @if ($TKMIX1->proceso == 'Produccion' || $TKSY->proceso == 'Almacen')
                            @if ($TKSY->etapa)
                                {{ $TKSY->etapa->nombre }}
                            @endif
                        @endif
                    </p>
                </div>


                <div data-popover id="TKSY-analizar-popover" role="tooltip"
                    class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                    <div
                        class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            @if ($TKSY->proceso == 'Produccion' || $TKSY->proceso == 'Almacen')
                                @foreach ($TKSY->estadoDetalle as $item)
                                    <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                        {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                @endforeach
                            @endif
                        </h3>

                    </div>
                    <div class="px-3 py-2">
                        @if (count($TKSY->solicitudAnalisisLinea) > 0)
                            <p class="hidden">
                                {{ $ultimo_TKSY = $TKSY->solicitudAnalisisLinea[count($TKSY->solicitudAnalisisLinea) - 1] }}
                            </p>
                            <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKSY->estado }}
                                - {{ \Carbon\Carbon::parse($ultimo_TKSY->tiempo)->isoFormat('HH:mm') }}
                            </p>
                            <p><Span
                                    class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKSY->analisisLinea->temperatura / 1 }}
                                [°C]</p>
                            <p><Span
                                    class="inline-block w-32">pH</Span>:{{ $ultimo_TKSY->analisisLinea->ph / 1 }}
                            </p>
                            <p><Span
                                    class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKSY->analisisLinea->acidez / 1 }}[%]
                            </p>
                            <p><Span
                                    class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKSY->analisisLinea->brix / 1 }}[°Bx]
                            </p>
                        @endif
                    </div>

                    <div class="flex gap-2 px-3 py-2">
                        <!--boton de solicitar-->
                        @if ($TKSY->proceso == 'Produccion' || $TKSY->proceso == 'Almacen')
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="solicitar({{ $TKSY->id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                </svg>
                            </button>
                        @endif
                        <!--boton matenimiento-->
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="mantenimiento({{ $TKSY->origen_id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path
                                    d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                            </svg>
                        </button>
                        <!--boton limpieza-->
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="limpieza({{ $TKSY->origen_id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                            <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512">
                                <path
                                    d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                            </svg>
                        </button>
                        <!--boton vacio-->
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="vacio({{ $TKSY->origen_id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                            <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512">
                                <path
                                    d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                            </svg>
                        </button>

                        <!--boton produccion-->
                        <button type="button"
                            onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKSY->id }} } })"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                            <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path
                                    d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                            </svg>
                        </button>
                    </div>

                </div>
            @endif
        </div>



        </figure>
        <!--Pasteurizador-->
        <figure
            class="  p-3  bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white ">Pasteurizadores</h5>

            <!--maguer INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($maguer)
                    <div class="flex gap-1 item-center text-xs justify-between" data-popover-trigger="click"
                        data-popover-target="maguer-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($maguer->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($maguer->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($maguer->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($maguer->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($maguer->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($maguer->tiempo)->isoFormat('HH:mm') }}
                        </p>
                        <!--origen-->
                        <div class="flex rounded-md border border-gray-500 dark:border-gray-300 py-1 px-4">
                            <p class="whitespace-nowrap"> -- </p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                        </div>
                        <div class="p-1 flex gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400 " viewBox="0 0 448 512">
                                <path
                                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                            </svg>

                            <p>MAGGER</p>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400 " viewBox="0 0 448 512">
                                <path
                                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                            </svg>

                        </div>
                        <!--destino-->
                        <div class="flex rounded-md border border-gray-500 dark:border-gray-300 py-1 px-4">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            <p class="whitespace-nowrap"> -- </p>
                        </div>

                        <div class="flex gap-2 py-1 px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="w-5 h-6 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M160 64c-26.5 0-48 21.5-48 48l0 164.5c0 17.3-7.1 31.9-15.3 42.5C86.2 332.6 80 349.5 80 368c0 44.2 35.8 80 80 80s80-35.8 80-80c0-18.5-6.2-35.4-16.7-48.9c-8.2-10.6-15.3-25.2-15.3-42.5L208 112c0-26.5-21.5-48-48-48zM48 112C48 50.2 98.1 0 160 0s112 50.1 112 112l0 164.4c0 .1 .1 .3 .2 .6c.2 .6 .8 1.6 1.7 2.8c18.9 24.4 30.1 55 30.1 88.1c0 79.5-64.5 144-144 144S16 447.5 16 368c0-33.2 11.2-63.8 30.1-88.1c.9-1.2 1.5-2.2 1.7-2.8c.1-.3 .2-.5 .2-.6L48 112zM208 368c0 26.5-21.5 48-48 48s-48-21.5-48-48c0-20.9 13.4-38.7 32-45.3L144 144c0-8.8 7.2-16 16-16s16 7.2 16 16l0 178.7c18.6 6.6 32 24.4 32 45.3z" />
                            </svg>

                            <p>90°</p>
                        </div>

                    </div>

                    <div data-popover id="maguer-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($maguer->proceso == 'Produccion' || $maguer->proceso == 'Almacen')
                                    @foreach ($maguer->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif

                            </h3>
                        </div>
                        <div class="flex gap-2 px-3 py-2">

                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $maguer->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $maguer->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $maguer->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>


                        </div>
                    </div>
                @endif
            </div>
            <!--maguer FIN-->

            <!--ultra INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($ultra)
                    <div class="flex gap-1 item-center text-xs justify-between" data-popover-trigger="click"
                        data-popover-target="ultra-analizar-popover">
                        <p class="flex gap-2 items-center">
                            @if ($ultra->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($ultra->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($ultra->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($ultra->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($ultra->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif
                        </p>

                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($ultra->tiempo)->isoFormat('HH:mm') }}
                        </p>
                        <!--origen-->
                        <div class="flex rounded-md border border-gray-500 dark:border-gray-300 py-1 px-4">
                            <p class="whitespace-nowrap"> -- </p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                        </div>

                        <div class="p-1 flex gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400 " viewBox="0 0 448 512">
                                <path
                                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                            </svg>

                            <p>ULTRA</p>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400 " viewBox="0 0 448 512">
                                <path
                                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                            </svg>

                        </div>



                        <!--destino-->
                        <div class="flex rounded-md border border-gray-500 dark:border-gray-300 py-1 px-4">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            <p class="whitespace-nowrap"> -- </p>
                        </div>

                        <div class="flex gap-2 py-1 px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="w-5 h-6 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M160 64c-26.5 0-48 21.5-48 48l0 164.5c0 17.3-7.1 31.9-15.3 42.5C86.2 332.6 80 349.5 80 368c0 44.2 35.8 80 80 80s80-35.8 80-80c0-18.5-6.2-35.4-16.7-48.9c-8.2-10.6-15.3-25.2-15.3-42.5L208 112c0-26.5-21.5-48-48-48zM48 112C48 50.2 98.1 0 160 0s112 50.1 112 112l0 164.4c0 .1 .1 .3 .2 .6c.2 .6 .8 1.6 1.7 2.8c18.9 24.4 30.1 55 30.1 88.1c0 79.5-64.5 144-144 144S16 447.5 16 368c0-33.2 11.2-63.8 30.1-88.1c.9-1.2 1.5-2.2 1.7-2.8c.1-.3 .2-.5 .2-.6L48 112zM208 368c0 26.5-21.5 48-48 48s-48-21.5-48-48c0-20.9 13.4-38.7 32-45.3L144 144c0-8.8 7.2-16 16-16s16 7.2 16 16l0 178.7c18.6 6.6 32 24.4 32 45.3z" />
                            </svg>

                            <p>90°</p>
                        </div>

                    </div>

                    <div data-popover id="ultra-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($ultra->proceso == 'Produccion' || $ultra->proceso == 'Almacen')
                                    @foreach ($ultra->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif

                            </h3>
                        </div>
                        <div class="flex gap-2 px-3 py-2">

                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $ultra->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $ultra->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $ultra->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>


                        </div>
                    </div>
                @endif
            </div>
            <!--ultra FIN-->

            <!--tetra INICIO-->
            <div class="p-2 mb-2 rounded-lg  border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                @if ($tetra)
                    <div class="flex gap-1 item-center text-xs justify-between" data-popover-trigger="click"
                        data-popover-target="tetra-analizar-popover">
                        <p class="flex gap-2  items-center">
                            @if ($tetra->proceso == 'Produccion')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($tetra->proceso == 'Limpieza')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($tetra->proceso == 'Mantenimiento')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($tetra->proceso == 'Vacio')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                            @endif

                            @if ($tetra->proceso == 'Almacen')
                                <span class="flex items-center text-xs font-medium "><span
                                        class="flex w-2.5 h-2.5 bg-orange-600 rounded-full  flex-shrink-0"></span></span>
                            @endif
                        </p>
                        <p class="flex gap-2  items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($tetra->tiempo)->isoFormat('HH:mm') }}
                        </p>
                        <!--origen-->
                        <div class="flex rounded-md border border-gray-500 dark:border-gray-300 py-1 px-4">
                            <p class="whitespace-nowrap"> -- </p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                        </div>
                        <div class="p-1 flex gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400 " viewBox="0 0 448 512">
                                <path
                                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                            </svg>

                            <p>TETRA</p>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400 " viewBox="0 0 448 512">
                                <path
                                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                            </svg>

                        </div>



                        <!--destino-->
                        <div class="flex rounded-md border border-gray-500 dark:border-gray-300 py-1 px-4">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                            <p class="whitespace-nowrap"> -- </p>
                        </div>

                        <div class="flex gap-2 py-1 px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="w-5 h-6 fill-gray-800 dark:fill-gray-400">
                                <path
                                    d="M160 64c-26.5 0-48 21.5-48 48l0 164.5c0 17.3-7.1 31.9-15.3 42.5C86.2 332.6 80 349.5 80 368c0 44.2 35.8 80 80 80s80-35.8 80-80c0-18.5-6.2-35.4-16.7-48.9c-8.2-10.6-15.3-25.2-15.3-42.5L208 112c0-26.5-21.5-48-48-48zM48 112C48 50.2 98.1 0 160 0s112 50.1 112 112l0 164.4c0 .1 .1 .3 .2 .6c.2 .6 .8 1.6 1.7 2.8c18.9 24.4 30.1 55 30.1 88.1c0 79.5-64.5 144-144 144S16 447.5 16 368c0-33.2 11.2-63.8 30.1-88.1c.9-1.2 1.5-2.2 1.7-2.8c.1-.3 .2-.5 .2-.6L48 112zM208 368c0 26.5-21.5 48-48 48s-48-21.5-48-48c0-20.9 13.4-38.7 32-45.3L144 144c0-8.8 7.2-16 16-16s16 7.2 16 16l0 178.7c18.6 6.6 32 24.4 32 45.3z" />
                            </svg>

                            <p>90°</p>
                        </div>

                    </div>

                    <div data-popover id="tetra-analizar-popover" role="tooltip"
                        class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($tetra->proceso == 'Produccion' || $tetra->proceso == 'Almacen')
                                    @foreach ($tetra->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif

                            </h3>
                        </div>
                        <div class="flex gap-2 px-3 py-2">

                            <!--boton matenimiento-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="mantenimiento({{ $tetra->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="limpieza({{ $tetra->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button" wire:loading.attr="disabled"
                                wire:click="vacio({{ $tetra->origen_id }})"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>


                        </div>
                    </div>
                @endif
            </div>
            <!--tetra FIN-->



        </figure>
        <!--Enavasadora-->
        <figure
            class="  p-3  bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white ">Envasadoras</h5>


            @foreach ($groupedResults as $orpIdAndPreparacion => $group)
                @php
                    // Descompón la clave compuesta en orp_id y preparacion
                    $parts = explode('|', $orpIdAndPreparacion);

                    $orpId = $parts[0] ?? null;
                    $preparacion = $parts[1] ?? null;

                    // Recupera el objeto Orp para obtener el código y nombre del producto
                    $orp = $orps->get($orpId);
                @endphp

                <div class="p-2 mb-2 rounded-lg border-gray-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
                    @if ($orp && $preparacion)
                        <h2 class="text-sm">{{ $orp->codigo }} - {{ $orp->producto->nombre }} :
                            {{ $preparacion }} </h2>
                    @else
                        <h2 class="text-sm">Código: No encontrado, error con orp o preparacion</h2>
                    @endif

                    <div class="flex gap-4 flex-wrap font-medium text-green-600">
                        @foreach ($group as $row)
                            <div data-popover-trigger="click" data-popover-target="{{ $row->origen_id }}-popover">
                                {{ $row->alias }}
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-end m-1"><button class="bg-red-500 text-white p-1 rounded-lg"
                            type="button" wire:click="completar({{ $orp->id }})"
                            wire:confirm="Esta seguro que desea completar la ORP : {{ $orp->codigo }} y quitar de las envasadoras? \n\n Esta ORP ya no se podra utlizar ">Terminar?</button>
                    </div>

                </div>
            @endforeach
        </figure>
       

    <!--pophovers de envasadoras-->

   <!--l1-->
 <div data-popover id="57-popover" role="tooltip" class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
    @if ($l1)
     <div
         class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
         <h3 class="font-semibold text-gray-900 dark:text-white">
             @if ($l1->proceso == 'Produccion')
                 @foreach ($l1->estadoDetalle as $item)
                     <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                         {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                 @endforeach
             @endif
         </h3>
     </div>
     <div class="px-3 py-2">
         @if (count($l1->solicitudAnalisisLinea) > 0)
             <p class="hidden">
               {{ $ultimo_l1 = $l1->solicitudAnalisisLinea->last();}}
             </p>
             <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_l1->estado }} </p> -
             {{ \Carbon\Carbon::parse($ultimo_l1->tiempo)->isoFormat('HH:mm') }}
             <p><Span class="inline-block w-32">Temp.</Span>:
                 {{ $ultimo_l1->analisisLinea->temperatura / 1 }} [°C]</p>
             <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_l1->analisisLinea->ph / 1 }} </p>
             <p><Span class="inline-block w-32">Ac.</Span>:
                 {{ $ultimo_l1->analisisLinea->acidez / 1 }}[%]
             </p>
             <p><Span class="inline-block w-32">Sólidos</Span>:
                 {{ $ultimo_l1->analisisLinea->brix / 1 }}
                 [°Bx]
             </p>
         @endif
     </div>
     <div class="flex px-3 py-2">
         <!--boton de solicitar-->
         @if ($l1->proceso == 'Produccion')
             <div class="px-3 py-2">
                 <button type="button" wire:loading.attr="disabled"
                     wire:click="solicitar({{ $l1->id }})"
                     class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                     <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 448 512">
                         <path
                             d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5l10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171l173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                     </svg>
                 </button>
             </div>
         @endif
         <!--boton matenimiento-->
         <div class="px-1 py-2">
             <button type="button" wire:loading.attr="disabled"
                 wire:click="mantenimientoEnv({{ $l1->origen_id }})"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                 <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                     <path
                         d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7l19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                 </svg>
             </button>
         </div>
         <!--boton limpieza-->
         <div class="px-1 py-2">
             <button type="button" wire:loading.attr="disabled"
                 wire:click="limpiezaEnv({{ $l1->origen_id }})"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                 <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                     <path
                         d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                 </svg>
             </button>
         </div>
         <!--boton vacio-->
         <div class="px-1 py-2">
             <button type="button" wire:loading.attr="disabled"
                 wire:click="vacioEnv({{ $l1->origen_id }})"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                 <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                     <path
                         d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                 </svg>
             </button>
         </div>
     </div>
     <div data-popper-arrow></div>

    @endif

</div>

 <!--l2-->
 <div data-popover id="58-popover" role="tooltip" class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
    @if ($l2)
     <div
         class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
         <h3 class="font-semibold text-gray-900 dark:text-white">
             @if ($l2->proceso == 'Produccion')
                 @foreach ($l2->estadoDetalle as $item)
                     <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                         {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                 @endforeach
             @endif
         </h3>
     </div>
     <div class="px-3 py-2">
         @if (count($l2->solicitudAnalisisLinea) > 0)
             <p class="hidden">
               {{ $ultimo_l2 = $l2->solicitudAnalisisLinea->last();}}
             </p>
             <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_l2->estado }} </p> -
             {{ \Carbon\Carbon::parse($ultimo_l2->tiempo)->isoFormat('HH:mm') }}
             <p><Span class="inline-block w-32">Temp.</Span>:
                 {{ $ultimo_l2->analisisLinea->temperatura / 1 }} [°C]</p>
             <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_l2->analisisLinea->ph / 1 }} </p>
             <p><Span class="inline-block w-32">Ac.</Span>:
                 {{ $ultimo_l2->analisisLinea->acidez / 1 }}[%]
             </p>
             <p><Span class="inline-block w-32">Sólidos</Span>:
                 {{ $ultimo_l2->analisisLinea->brix / 1 }}
                 [°Bx]
             </p>
         @endif
     </div>
     <div class="flex px-3 py-2">
         <!--boton de solicitar-->
         @if ($l2->proceso == 'Produccion')
             <div class="px-3 py-2">
                 <button type="button" wire:loading.attr="disabled"
                     wire:click="solicitar({{ $l2->id }})"
                     class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                     <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 448 512">
                         <path
                             d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5l20.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171l273 263.9c12.4-20.2 19-43.4 19-67.1z" />
                     </svg>
                 </button>
             </div>
         @endif
         <!--boton matenimiento-->
         <div class="px-1 py-2">
             <button type="button" wire:loading.attr="disabled"
                 wire:click="mantenimientoEnv({{ $l2->origen_id }})"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                 <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                     <path
                         d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l209 109c-14.7 29-10 65.4 14.3 89.6l212 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7l29.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                 </svg>
             </button>
         </div>
         <!--boton limpieza-->
         <div class="px-1 py-2">
             <button type="button" wire:loading.attr="disabled"
                 wire:click="limpiezaEnv({{ $l2->origen_id }})"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                 <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                     <path
                         d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l273.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                 </svg>
             </button>
         </div>
         <!--boton vacio-->
         <div class="px-1 py-2">
             <button type="button" wire:loading.attr="disabled"
                 wire:click="vacioEnv({{ $l2->origen_id }})"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                 <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                     <path
                         d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                 </svg>
             </button>
         </div>
     </div>
     <div data-popper-arrow></div>

    @endif

</div>

 <!--l3-->
 <div data-popover id="59-popover" role="tooltip" class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
    @if ($l3)
     <div
         class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
         <h3 class="font-semibold text-gray-900 dark:text-white">
             @if ($l3->proceso == 'Produccion')
                 @foreach ($l3->estadoDetalle as $item)
                     <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                         {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                 @endforeach
             @endif
         </h3>
     </div>
     <div class="px-3 py-2">
         @if (count($l3->solicitudAnalisisLinea) > 0)
             <p class="hidden">
               {{ $ultimo_l3 = $l3->solicitudAnalisisLinea->last();}}
             </p>
             <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_l3->estado }} </p> -
             {{ \Carbon\Carbon::parse($ultimo_l3->tiempo)->isoFormat('HH:mm') }}
             <p><Span class="inline-block w-32">Temp.</Span>:
                 {{ $ultimo_l3->analisisLinea->temperatura / 1 }} [°C]</p>
             <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_l3->analisisLinea->ph / 1 }} </p>
             <p><Span class="inline-block w-32">Ac.</Span>:
                 {{ $ultimo_l3->analisisLinea->acidez / 1 }}[%]
             </p>
             <p><Span class="inline-block w-32">Sólidos</Span>:
                 {{ $ultimo_l3->analisisLinea->brix / 1 }}
                 [°Bx]
             </p>
         @endif
     </div>
     <div class="flex px-3 py-2">
         <!--boton de solicitar-->
         @if ($l3->proceso == 'Produccion')
             <div class="px-3 py-2">
                 <button type="button" wire:loading.attr="disabled"
                     wire:click="solicitar({{ $l3->id }})"
                     class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                     <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 448 512">
                         <path
                             d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5l30.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171l373 263.9c12.4-20.2 19-43.4 19-67.1z" />
                     </svg>
                 </button>
             </div>
         @endif
         <!--boton matenimiento-->
         <div class="px-1 py-2">
             <button type="button" wire:loading.attr="disabled"
                 wire:click="mantenimientoEnv({{ $l3->origen_id }})"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                 <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                     <path
                         d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l309 109c-14.7 29-10 65.4 14.3 89.6l312 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9l333.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7l39.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                 </svg>
             </button>
         </div>
         <!--boton limpieza-->
         <div class="px-1 py-2">
             <button type="button" wire:loading.attr="disabled"
                 wire:click="limpiezaEnv({{ $l3->origen_id }})"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                 <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                     <path
                         d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4l322.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l373.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                 </svg>
             </button>
         </div>
         <!--boton vacio-->
         <div class="px-1 py-2">
             <button type="button" wire:loading.attr="disabled"
                 wire:click="vacioEnv({{ $l3->origen_id }})"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                 <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                     <path
                         d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                 </svg>
             </button>
         </div>
     </div>
     <div data-popper-arrow></div>

    @endif

</div>

    <!--HTST1_A-->
    <div data-popover id="48-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_1A)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">
                    @if ($HTST_1A->proceso == 'Produccion')
                        @foreach ($HTST_1A->estadoDetalle as $item)
                            <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                        @endforeach
                    @endif
                </h3>
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_1A->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_1A = $HTST_1A->solicitudAnalisisLinea[count($HTST_1A->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_1A->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_1A->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_1A->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_1A->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_1A->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_1A->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_1A->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_1A->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_1A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_1A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_1A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>

        @endif

    </div>

    <!--HTST_1B-->
    <div data-popover id="47-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_1B)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_1B->proceso == 'Produccion')
                    @foreach ($HTST_1B->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_1B->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_1B = $HTST_1B->solicitudAnalisisLinea[count($HTST_1B->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_1B->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_1B->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_1B->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_1B->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_1B->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_1B->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_1B->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_1B->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_1B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_1B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_1B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_1c-->
    <div data-popover id="46-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_1C)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_1C->proceso == 'Produccion')
                    @foreach ($HTST_1C->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_1C->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_1C = $HTST_1C->solicitudAnalisisLinea[count($HTST_1C->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_1C->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_1C->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_1C->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_1C->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_1C->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_1C->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_1C->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_1C->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_1C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_1C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_1C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_2A-->
    <div data-popover id="45-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_2A)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_2A->proceso == 'Produccion')
                    @foreach ($HTST_2A->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_2A->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_2A = $HTST_2A->solicitudAnalisisLinea[count($HTST_2A->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_2A->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_2A->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_2A->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_2A->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_2A->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_2A->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_2A->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_2A->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_2A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_2A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_2A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_2B-->
    <div data-popover id="44-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_2B)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_2B->proceso == 'Produccion')
                    @foreach ($HTST_2B->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_2B->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_2B = $HTST_2B->solicitudAnalisisLinea[count($HTST_2B->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_2B->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_2B->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_2B->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_2B->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_2B->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_2B->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_2B->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_2B->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_2B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_2B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_2B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

{{-- SOYA --}}
 


    <!--HTST_2C-->
    <div data-popover id="43-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_2C)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_2C->proceso == 'Produccion')
                    @foreach ($HTST_2C->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_2C->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_2C = $HTST_2C->solicitudAnalisisLinea[count($HTST_2C->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_2C->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_2C->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_2C->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_2C->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_2C->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_2C->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_2C->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_2C->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_2C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_2C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_2C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_3A-->
    <div data-popover id="42-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_3A)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_3A->proceso == 'Produccion')
                    @foreach ($HTST_3A->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_3A->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_3A = $HTST_3A->solicitudAnalisisLinea[count($HTST_3A->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_3A->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_3A->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_3A->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_3A->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_3A->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_3A->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_3A->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_3A->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_3A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_3A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_3A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_3B-->
    <div data-popover id="41-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_3B)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_3B->proceso == 'Produccion')
                    @foreach ($HTST_3B->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_3B->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_3B = $HTST_3B->solicitudAnalisisLinea[count($HTST_3B->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_3B->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_3B->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_3B->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_3B->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_3B->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_3B->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_3B->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_3B->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_3B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_3B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_3B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_3c-->
    <div data-popover id="40-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_3C)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_3C->proceso == 'Produccion')
                    @foreach ($HTST_3C->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_3C->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_3C = $HTST_3C->solicitudAnalisisLinea[count($HTST_3C->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_3C->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_3C->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_3C->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_3C->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_3C->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_3C->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_3C->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_3C->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_3C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_3C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_3C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_4A-->
    <div data-popover id="39-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_4A)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_4A->proceso == 'Produccion')
                    @foreach ($HTST_4A->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_4A->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_4A = $HTST_4A->solicitudAnalisisLinea[count($HTST_4A->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_4A->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_4A->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_4A->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_4A->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_4A->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_4A->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_4A->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_4A->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_4A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_4A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_4A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_4b-->
    <div data-popover id="38-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_4B)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_4B->proceso == 'Produccion')
                    @foreach ($HTST_4B->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_4B->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_4B = $HTST_4B->solicitudAnalisisLinea[count($HTST_4B->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_4B->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_4B->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_4B->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_4B->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_4B->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_4B->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_4B->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_4B->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_4B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_4B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_4B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_4c-->
    <div data-popover id="37-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_4C)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_4C->proceso == 'Produccion')
                    @foreach ($HTST_4C->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_4C->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_4C = $HTST_4C->solicitudAnalisisLinea[count($HTST_4C->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_4C->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_4C->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_4C->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_4C->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_4C->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_4C->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_4C->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_4C->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_4C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_4C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_4C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_5A-->
    <div data-popover id="36-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_5A)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_5A->proceso == 'Produccion')
                    @foreach ($HTST_5A->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_5A->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_5A = $HTST_5A->solicitudAnalisisLinea[count($HTST_5A->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_5A->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_5A->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_5A->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_5A->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_5A->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_5A->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_5A->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_5A->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_5A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_5A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_5A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
                </divA <div data-popper-arrow>
            </div>
        @endif
    </div>

    <!--HTST_5B-->
    <div data-popover id="35-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_5B)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_5B->proceso == 'Produccion')
                    @foreach ($HTST_5B->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_5B->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_5B = $HTST_5B->solicitudAnalisisLinea[count($HTST_5B->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_5B->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_5B->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_5B->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_5B->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_5B->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_5B->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_5B->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_5B->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_5B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_5B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_5B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--HTST_5c-->
    <div data-popover id="34-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($HTST_5C)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($HTST_5C->proceso == 'Produccion')
                    @foreach ($HTST_5C->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($HTST_5C->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_HTST_5C = $HTST_5C->solicitudAnalisisLinea[count($HTST_5C->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_HTST_5C->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_HTST_5C->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_HTST_5C->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_HTST_5C->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_HTST_5C->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_HTST_5C->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($HTST_5C->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $HTST_5C->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $HTST_5C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $HTST_5C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $HTST_5C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--ENVASADORAS DE UHT-->
    <!--UHT_1A-->
    <div data-popover id="27-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($UHT_1A)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($UHT_1A->proceso == 'Produccion')
                    @foreach ($UHT_1A->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($UHT_1A->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_UHT_1A = $UHT_1A->solicitudAnalisisLinea[count($UHT_1A->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_UHT_1A->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_UHT_1A->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_UHT_1A->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_UHT_1A->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_UHT_1A->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_UHT_1A->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($UHT_1A->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $UHT_1A->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $UHT_1A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $UHT_1A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $UHT_1A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--UHT_1B-->
    <div data-popover id="28-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($UHT_1B)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($UHT_1B->proceso == 'Produccion')
                    @foreach ($UHT_1B->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($UHT_1B->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_UHT_1B = $UHT_1B->solicitudAnalisisLinea[count($UHT_1B->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_UHT_1B->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_UHT_1B->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_UHT_1B->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_UHT_1B->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_UHT_1B->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_UHT_1B->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($UHT_1B->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $UHT_1B->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $UHT_1B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $UHT_1B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $UHT_1B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--UHT_1c-->
    <div data-popover id="29-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($UHT_1C)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($UHT_1C->proceso == 'Produccion')
                    @foreach ($UHT_1C->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($UHT_1C->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_UHT_1C = $UHT_1C->solicitudAnalisisLinea[count($UHT_1C->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_UHT_1C->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_UHT_1C->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_UHT_1C->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_UHT_1C->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_UHT_1C->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_UHT_1C->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($UHT_1C->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $UHT_1C->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $UHT_1C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $UHT_1C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $UHT_1C->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--UHT_2A-->
    <div data-popover id="30-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($UHT_2A)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($UHT_2A->proceso == 'Produccion')
                    @foreach ($UHT_2A->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($UHT_2A->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_UHT_2A = $UHT_2A->solicitudAnalisisLinea[count($UHT_2A->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_UHT_2A->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_UHT_2A->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_UHT_2A->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_UHT_2A->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_UHT_2A->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_UHT_2A->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($UHT_2A->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $UHT_2A->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $UHT_2A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $UHT_2A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $UHT_2A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--UHT_2B-->
    <div data-popover id="31-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($UHT_2B)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($UHT_2B->proceso == 'Produccion')
                    @foreach ($UHT_2B->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($UHT_2B->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_UHT_2B = $UHT_2B->solicitudAnalisisLinea[count($UHT_2B->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_UHT_2B->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_UHT_2B->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_UHT_2B->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_UHT_2B->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_UHT_2B->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_UHT_2B->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($UHT_2B->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $UHT_2B->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $UHT_2B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $UHT_2B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $UHT_2B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--UHT_3A-->
    <div data-popover id="32-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($UHT_3A)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($UHT_3A->proceso == 'Produccion')
                    @foreach ($UHT_3A->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($UHT_3A->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_UHT_3A = $UHT_3A->solicitudAnalisisLinea[count($UHT_3A->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_UHT_3A->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_UHT_3A->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_UHT_3A->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_UHT_3A->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_UHT_3A->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_UHT_3A->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($UHT_3A->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $UHT_3A->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $UHT_3A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $UHT_3A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $UHT_3A->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--UHT_3B-->
    <div data-popover id="33-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($UHT_3B)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($UHT_3B->proceso == 'Produccion')
                    @foreach ($UHT_3B->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($UHT_3B->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_UHT_3B = $UHT_3B->solicitudAnalisisLinea[count($UHT_3B->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_UHT_3B->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_UHT_3B->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_UHT_3B->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_UHT_3B->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_UHT_3B->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_UHT_3B->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($UHT_3B->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $UHT_3B->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $UHT_3B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $UHT_3B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $UHT_3B->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--Vasos -->
    <!--V1-->
    <div data-popover id="50-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($V1)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($V1->proceso == 'Produccion')
                    @foreach ($V1->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($V1->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_V1 = $V1->solicitudAnalisisLinea[count($V1->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_V1->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_V1->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_V1->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_V1->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>: {{ $ultimo_V1->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_V1->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($V1->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $V1->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $V1->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $V1->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $V1->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--V2-->
    <div data-popover id="51-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($V2)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($V2->proceso == 'Produccion')
                    @foreach ($V2->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($V2->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_V2 = $V2->solicitudAnalisisLinea[count($V2->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_V2->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_V2->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_V2->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_V2->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>: {{ $ultimo_V2->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_V2->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($V2->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $V2->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $V2->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $V2->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $V2->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--V3-->
    <div data-popover id="52-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($V3)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($V3->proceso == 'Produccion')
                    @foreach ($V3->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            <div class="px-3 py-2">
                @if (count($V3->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_V3 = $V3->solicitudAnalisisLinea[count($V3->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_V3->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_V3->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_V3->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_V3->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>: {{ $ultimo_V3->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_V3->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                @endif
            </div>
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($V3->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $V3->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $V3->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $V3->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $V3->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>

    <!--botella-->
    <div data-popover id="53-popover" role="tooltip"
        class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        @if ($araña)
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                @if ($araña->proceso == 'Produccion')
                    @foreach ($araña->estadoDetalle as $item)
                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                    @endforeach
                @endif
            </div>
            @if (count($araña->solicitudAnalisisLinea) > 0)
                <div class="px-3 py-2">
                    <p class="hidden">
                        {{ $ultimo_araña = $araña->solicitudAnalisisLinea[count($araña->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_araña->estado }} </p> -
                    {{ \Carbon\Carbon::parse($ultimo_araña->tiempo)->isoFormat('HH:mm') }}
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_araña->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>: {{ $ultimo_araña->analisisLinea->ph / 1 }} </p>
                    <p><Span class="inline-block w-32">Ac.</Span>: {{ $ultimo_araña->analisisLinea->acidez / 1 }}[%]
                    </p>
                    <p><Span class="inline-block w-32">Sólidos</Span>: {{ $ultimo_araña->analisisLinea->brix / 1 }}
                        [°Bx]
                    </p>
                </div>
            @endif
            <div class="flex px-3 py-2">
                <!--boton de solicitar-->
                @if ($araña->proceso == 'Produccion')
                    <div class="px-3 py-2">
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $araña->id }})"
                            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                            <svg class="w-4 h-4 fill-white me-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <!--boton matenimiento-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimientoEnv({{ $araña->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                </div>
                <!--boton limpieza-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpiezaEnv({{ $araña->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                </div>
                <!--boton vacio-->
                <div class="px-1 py-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacioEnv({{ $araña->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div data-popper-arrow></div>
        @endif
    </div>




</div>
