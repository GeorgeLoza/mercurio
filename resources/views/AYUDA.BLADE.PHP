{{-- cabecera --}}
<div class=" flex  justify-between  items-center">
    {{-- nombre --}}
    <div class="flex flex-col">
    <p class="text-base flex">{{ $TKFG->origen->alias }} 
    </p>
    <p class="text-xs">
        @if ($TKFG->etapa)
        {{ $TKFG->etapa->nombre }}
    @endif  
    </p>  
        


    
</div>

{{-- svg --}}

    
    @if ($TKFG->proceso == 'Produccion')
        <div data-popover-trigger="click" data-popover-target="tkfg-analizar-popover" class="flex items-start gap-1">
            <p class="text-xs"> {{ \Carbon\Carbon::parse($TKFG->tiempo)->isoFormat('HH:mm') }} 
            </p>
            <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512">
                <path
                    d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
            </svg>
        </div>
        @else
        <p class="text-xs"> {{ \Carbon\Carbon::parse($TKFG->tiempo)->isoFormat('HH:mm') }}
        </p>
    @endif
    
    


</div>

<div class="grid gap-2 h-full w-full  ">
<div class=" p-2 flex items-center justify-center ">


    <div class="relative w-full h-full group ">
        @if ($TKFG->proceso == 'Mantenimiento')
            <svg class="w-full md:h-12   fill-blue-600 relative"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!-- Contenido principal del SVG -->
                <path
                    d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                </path>


            </svg>
        @endif

        @if ($TKFG->proceso == 'Limpieza')
            <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <!-- Contenido principal del SVG -->
                <path
                    d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                </path>



            </svg>
        @endif

        @if ($TKFG->proceso == 'Vacio')
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                class="w-full md:h-12  fill-gray-500 relative">
                <!-- Cuerpo principal del primer SVG -->
                <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


            </svg>
        @endif
        <div
            class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
            @if ($TKFG->proceso == 'Produccion' || $TKFG->proceso == 'Almacen')
                @foreach ($TKFG->estadoDetalle as $item)
                    <div class=" flex  justify-between  ">
                        <div>
                            <p class="text-xs {{ $item->orp->color != null ? $item->orp->color->color : '' }}">{{ substr($item->orp->codigo, -5) }}</p>
                        </div>
                        <div>


                        </div>
                        <div>
                            <p class="text-2xs {{ $item->orp->color != null ? $item->orp->color->color : '' }}">
                                {{ $item->preparacion }}
                            </p>
                        </div>


                    </div>

                    <p class="text-sm whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }}">
                        {{ Str::limit($item->orp->producto->nombre, 20) }}
                    </p>
                @endforeach
            @endif




        </div>
        <div
            class="absolute inset-0  items-center justify-between  flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
            <div class="mb-2">
                @if ($TKFG->proceso == 'Produccion' || $TKFG->proceso == 'Almacen')
                    @foreach ($TKFG->estadoDetalle as $item)
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-2xs {{ $item->orp->color != null ? $item->orp->color->color : '' }}">{{ substr($item->orp->codigo, -5) }}
                                </p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-2xs {{ $item->orp->color != null ? $item->orp->color->color : '' }}">
                                    {{ $item->preparacion }}
                                </p>
                            </div>


                        </div>
                        <p class="text-2xs whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }}">
                            {{ Str::limit($item->orp->producto->nombre, 25) }}</p>
                    @endforeach
                @endif
            </div>

            {{-- botones --}}
            <div class=" mt-2 flex gap-1 px-0 py-0 w-full justify-between ">
                <!--boton de solicitar-->
                @if ($TKFG->proceso == 'Produccion' || $TKFG->proceso == 'Almacen')
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="solicitar({{ $TKFG->id }})"
                        wire:confirm="Esta seguro que quiere un analisis"
                        class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                        <svg class="w-full max-h-3 fill-white"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                        </svg>
                    </button>
                @endif
                <!--boton matenimiento-->
                @if ($TKFG->proceso == 'Vacio')
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="mantenimiento({{ $TKFG->origen_id }})"
                        class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-full max-h-3 fill-white"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                        </svg>
                    </button>
                @endif
                <!--boton limpieza-->
                @if ($TKFG->proceso == 'Vacio')
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="limpieza({{ $TKFG->origen_id }})"
                        class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                        <svg class="w-full max-h-3 fill-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                        </svg>
                    </button>
                @endif
                <!--boton vacio-->
                @if ($TKFG->proceso != 'Vacio')
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="vacio({{ $TKFG->origen_id }})"
                        wire:confirm="Esta seguro que quiere vaciar el tanque"
                        class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                        <svg class="w-full max-h-3 fill-white"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                        </svg>
                    </button>
                @endif

                <!--boton produccion-->
                @if ($TKFG->proceso == 'Produccion' || $TKFG->proceso == 'Vacio')
                    <button type="button"
                        onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKFG->id }} } })"
                        class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                        <svg class="w-full max-h-3 fill-white"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                        </svg>
                    </button>
                @endif

            </div>
        </div>
    </div>


</div>

</div>