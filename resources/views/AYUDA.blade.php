  <!--10.2 INICIO-->
  <div class="relative p-2 mb-2 rounded-lg  border-red-500 hover:bg-gray-100 hover:dark:bg-gray-700 border">
    @if ($TK102)
        <div class="flex justify-between text-xs" data-popover-trigger="click"
            data-popover-target="TK102-analizar-popover">
            <p class="flex gap-2  items-center">
                @if ($TK102->proceso == 'Produccion')
                    <span class="flex items-center text-xs font-medium "><span
                            class="flex w-2.5 h-2.5 bg-green-500 rounded-full  flex-shrink-0"></span></span>
                @endif

                @if ($TK102->proceso == 'Limpieza')
                    <span class="flex items-center text-xs font-medium "><span
                            class="flex w-2.5 h-2.5 bg-white rounded-full  flex-shrink-0"></span></span>
                @endif

                @if ($TK102->proceso == 'Mantenimiento')
                    <span class="flex items-center text-xs font-medium "><span
                            class="flex w-2.5 h-2.5 bg-blue-500 rounded-full  flex-shrink-0"></span></span>
                @endif

                @if ($TK102->proceso == 'Vacio')
                    <span class="flex items-center text-xs font-medium "><span
                            class="flex w-2.5 h-2.5 bg-gray-500 rounded-full  flex-shrink-0"></span></span>
                @endif

                @if ($TK102->proceso == 'Almacen')
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
                {{ $TK102->origen->alias }}
            </p>
            <p class="flex gap-2  items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                    <path
                        d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                </svg>
                {{ \Carbon\Carbon::parse($TK102->tiempo)->isoFormat('HH:mm') }}
            </p>

            <div class="w-3/6 items-center">
                @if ($TK102->proceso == 'Produccion' || $TK102->proceso == 'Almacen')
                    @foreach ($TK102->estadoDetalle as $item)
                        <p>{{ substr($item->orp->codigo, -5) }} -
                            {{ Str::limit($item->orp->producto->nombre, 20) }}</p>
                    @endforeach
                @endif
            </div>

            <p class="flex gap-2  items-center">
                @if ($TK102->proceso == 'Produccion' || $TK102->proceso == 'Almacen')
                    @if ($TK102->etapa)
                        {{ $TK102->etapa->nombre }}
                    @endif
                @endif
            </p>
        </div>
        <div data-popover id="TK102-analizar-popover" role="tooltip"
            class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">
                    @if ($TK102->proceso == 'Produccion' || $TK102->proceso == 'Almacen')
                        @foreach ($TK102->estadoDetalle as $item)
                            <p class=" text-xs flex mb-2">
                                @if ($item->orp->codigo != 0 && $item->orp->codigo != 1 && $item->orp->codigo != 2)
                                    <a target=""
                                        href="{{ route('orp.report', ['id' => $item->orp->id]) }}"
                                        class="rounded-md  mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="fill-green-600 h-4 w-4" viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                        </svg>
                                    </a>
                                @endif
                                {{ substr($item->orp->codigo, -5) }} -
                                {{ $item->orp->producto->nombre }} {{ $item->preparacion }}
                            </p>
                        @endforeach
                    @endif
                </h3>
            </div>
            <div class="px-3 py-2">
                @if (count($TK102->solicitudAnalisisLinea) > 0)
                    <p class="hidden">
                        {{ $ultimo_TK102 = $TK102->solicitudAnalisisLinea[count($TK102->solicitudAnalisisLinea) - 1] }}
                    </p>
                    <p><Span class="inline-block w-32">Estado Análisis</Span>:
                        {{ $ultimo_TK102->estado }}
                        - {{ \Carbon\Carbon::parse($ultimo_TK102->tiempo)->isoFormat('HH:mm') }}
                    </p>
                    <p><Span class="inline-block w-32">Temp.</Span>:
                        {{ $ultimo_TK102->analisisLinea->temperatura / 1 }} [°C]</p>
                    <p><Span class="inline-block w-32">pH</Span>:
                        {{ $ultimo_TK102->analisisLinea->ph / 1 }}
                    </p>
                    <p><Span class="inline-block w-32">Ac.</Span>:
                        {{ $ultimo_TK102->analisisLinea->acidez / 1 }}[%]</p>
                    <p><Span class="inline-block w-32">Sólidos</Span>:
                        {{ $ultimo_TK102->analisisLinea->brix / 1 }} [°Bx]
                    </p>
                @endif
            </div>
            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 1)->where('permiso_id', 1)->isNotEmpty())
                <div class="flex gap-2 px-3 py-2">
                    <!--boton de solicitar-->
                    @if ($TK102->proceso == 'Produccion' || $TK102->proceso == 'Almacen')
                        <button type="button" wire:loading.attr="disabled"
                            wire:click="solicitar({{ $TK102->id }})"
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
                        wire:click="mantenimiento({{ $TK102->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                    <!--boton limpieza-->
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpieza({{ $TK102->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                    <!--boton vacio-->
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacio({{ $TK102->origen_id }})"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>

                    <!--boton produccion-->
                    <button type="button"
                        onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TK102->id }} } })"
                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                        <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                        </svg>
                    </button>
                </div>
            @endif
        </div>
    @endif
    <div
        class="absolute inline-flex items-center justify-center w-auto px-1 h-6 text-2xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-3 -end-2 dark:border-gray-900">
        NUEVO</div>
</div>


<!--10.2 FIN-->
