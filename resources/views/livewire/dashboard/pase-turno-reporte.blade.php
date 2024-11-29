<div class="">
   
      
      
    <div
        class="h-[calc(100vh-110px)] overflow-auto grid grid-cols-[repeat(14,minmax(0,1fr))] grid-rows-[repeat(4,minmax(0,1fr))] gap-2 text-2xs">
        {{-- Columna 1 --}}
        <div class="row-span-4 col-span-2 grid grid-cols-1 grid-rows-4 ">
            {{-- Recepcion --}}
            <div class="col-span-1 col-start-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-3  ">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-3 ">
                    {{-- R1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1 ">
                            {{-- cabecera --}}
                        <div class=" flex  justify-between  items-center">
                            {{-- nombre --}}
                            <div>
                                <p class="text-base flex">{{ $R1->origen->alias }}



                                </p>
                            </div>
                            {{-- hora --}}
                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($R1->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            {{-- svg --}}
                            @if ($R1->proceso == 'Produccion' || $R1->proceso == 'Almacen')
                                @if ($R1->proceso == 'Produccion')
                                    <div data-popover-trigger="click" data-popover-target="r1-analizar-popover">
                                        <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </div>
                                @endif
                                @if ($R1->proceso == 'Almacen')
                                    <div data-popover-trigger="click" data-popover-target="r1-analizar-popover">
                                        <svg class="w-full max-h-3 fill-orange-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                        </svg>
                                    </div>
                                @endif

                            @endif




                        </div>
                            {{-- cuerpo --}}
                        <div class="grid gap-2  h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group items-center ">

                                    @if ($R1->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($R1->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($R1->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif

                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity  group-hover:hidden flex-col ">
                                        @if ($R1->proceso == 'Produccion' || $R1->proceso == 'Almacen')
                                            @foreach ($R1->estadoDetalle as $item)
                                                <div class=" flex  justify-between  ">
                                                    <div>
                                                        <p class="text-xs 
                                                            
                                                            {{ $item->orp->color != null ? $item->orp->color->color : '' }}
                                                            ">{{ substr($item->orp->codigo, -5) }}</p>
                                                    </div>
                                                    <div class="text-red-500
                                                            text-blue-500
                                                            text-green-500
                                                            text-yellow-500
                                                            text-cyan-500
                                                            text-purple-500
                                                            text-pink-500
                                                            text-orange-500 
                                                            text-teal-500
                                                            text-indigo-500
                                                            text-lime-500
                                                            text-amber-500
                                                            text-fuchsia-500
                                                            text-rose-500
                                                            text-violet-500
                                                            text-red-400
                                                            text-blue-400 
                                                            text-green-400
                                                            text-yellow-400
                                                            text-cyan-400
                                                            text-purple-400
                                                            text-pink-400
                                                            text-orange-400
                                                            text-teal-400
                                                            text-indigo-400">


                                                    </div>
                                                    <div>
                                                        <p class="text-2xs {{ $item->orp->color != null ? $item->orp->color->color : '' }}">
                                                            {{ $item->preparacion }}
                                                        </p>
                                                    </div>

                                                    
                                                </div>
                                                    
                                                <p class="text-sm whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }} "> {{ Str::limit($item->orp->producto->nombre, 20) }}
                                                </p>
                                            @endforeach
                                        @endif




                                    </div>
                                    <div
                                        class="absolute inset-0  items-center justify-between hidden  flex-col  transition-all duration-3000 delay-3000   group-hover:flex">
                                        <div class="mb-2">
                                            @if ($R1->proceso == 'Produccion' || $R1->proceso == 'Almacen')
                                                @foreach ($R1->estadoDetalle as $item)
                                                    <div class=" flex  justify-between  ">
                                                        <div>
                                                            <p class="text-2xs {{ $item->orp->color != null ? $item->orp->color->color : '' }}">{{ substr($item->orp->codigo, -5) }}</p>
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
                                        <div class=" mt-2 flex gap-1 px-0 py-0 w-full justify-center ">

                                            <!--boton de solicitar-->
                                            @if ($R1->proceso == 'Produccion' || $R1->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $R1->id }})"
                                                    wire:confirm="Esta seguro que quiere un analisis :  "
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($R1->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $R1->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($R1->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $R1->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($R1->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $R1->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($R1->proceso == 'Produccion' || $R1->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $R1->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton almacen-->
                                            @if ($R1->proceso == 'Vacio' || $R1->proceso == 'Almacen')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $R1->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                                    </svg>
                                                </button>
                                            @endif




                                        </div> 
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>
                    {{-- R2 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between  items-center">
                            <div>
                                <p class="text-base">{{ $R2->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($R2->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>

                            @if ($R2->proceso == 'Produccion' || $R2->proceso == 'Almacen')
                                @if ($R2->proceso == 'Produccion')
                                    <div data-popover-trigger="click" data-popover-target="r2-analizar-popover">
                                        <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </div>
                                @endif
                                @if ($R2->proceso == 'Almacen')
                                    <div data-popover-trigger="click" data-popover-target="r2-analizar-popover">
                                        <svg class="w-full max-h-3 fill-orange-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                        </svg>
                                    </div>
                                @endif

                            @endif



                        </div>
                        <div class="grid gap-2  h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($R2->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($R2->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($R2->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($R2->proceso == 'Produccion' || $R2->proceso == 'Almacen')
                                            @foreach ($R2->estadoDetalle as $item)
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

                                                <p class="text-sm whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }} "> {{ Str::limit($item->orp->producto->nombre, 20) }}
                                                </p>
                                            @endforeach
                                        @endif




                                    </div>
                                    <div
                                        class="absolute inset-0  items-center justify-between  flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
                                        <div class="mb-2">
                                            @if ($R2->proceso == 'Produccion' || $R2->proceso == 'Almacen')
                                                @foreach ($R2->estadoDetalle as $item)
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
                                                    <p class="text-2xs whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }} ">
                                                        {{ Str::limit($item->orp->producto->nombre, 25) }}</p>
                                                @endforeach
                                            @endif
                                        </div>

                                        {{-- botones --}}
                                        <div class=" mt-2 flex gap-1 px-0 py-0 w-full justify-center ">
                                            <!--boton de solicitar-->
                                            @if ($R2->proceso == 'Produccion' || $R2->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $R2->id }})"
                                                    class=" px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($R2->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $R2->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($R2->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $R2->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($R2->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $R2->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($R2->proceso == 'Produccion' || $R2->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $R2->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton almacen-->
                                            @if ($R2->proceso == 'Vacio' || $R2->proceso == 'Almacen')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $R2->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                                    </svg>
                                                </button>
                                            @endif


                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>
                    {{-- R3 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-start dark:bg-gray-800 row-start-3 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $R3->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($R3->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($R3->proceso == 'Produccion' || $R3->proceso == 'Almacen')
                                @if ($R3->proceso == 'Produccion')
                                    <div data-popover-trigger="click" data-popover-target="r3-analizar-popover">
                                        <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </div>
                                @endif
                                @if ($R3->proceso == 'Almacen')
                                    <div data-popover-trigger="click" data-popover-target="r3-analizar-popover">
                                        <svg class="w-full max-h-3 fill-orange-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                        </svg>
                                    </div>
                                @endif

                            @endif


                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($R3->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($R3->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($R3->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($R3->proceso == 'Produccion' || $R3->proceso == 'Almacen')
                                            @foreach ($R3->estadoDetalle as $item)
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

                                                <p class="text-sm whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }}"> {{ Str::limit($item->orp->producto->nombre, 20) }}
                                                </p>
                                            @endforeach
                                        @endif




                                    </div>
                                    <div
                                        class="absolute inset-0  items-center justify-between  flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
                                        <div class="mb-2">
                                            @if ($R3->proceso == 'Produccion' || $R3->proceso == 'Almacen')
                                                @foreach ($R3->estadoDetalle as $item)
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
                                            @if ($R3->proceso == 'Produccion' || $R3->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $R3->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($R3->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $R3->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($R3->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $R3->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($R3->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $R3->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($R3->proceso == 'Produccion' || $R3->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $R3->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton almacen-->
                                            @if ($R3->proceso == 'Vacio' || $R3->proceso == 'Almacen')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $R3->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                                    </svg>
                                                </button>
                                            @endif

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>


                </div>
            </div>
            {{-- TK NEW --}}
            <div class="col-span-1 col-start-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-1  row-start-4 mt-1">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- TK New --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base"></p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base">
                                </p>
                            </div>


                        </div>
                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">





                                    </div>
                                    <div
                                        class="absolute inset-0  items-center justify-between  flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
                                        <div class="mb-2">

                                        </div>

                                        {{-- botones --}}
                                        <div class=" mt-2 flex gap-1 px-0 py-0 w-full justify-between ">





                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>




                </div>
            </div>

        </div>


        {{-- Columna 2 --}}
        <div class="row-span-4 col-span-10 grid grid-cols-5 grid-rows-4 ">
            {{-- mixes --}}
            <div class="col-span-4 col-start-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-1 mb-1 mr-1">


                <div class="grid grid-cols-4 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- Mx1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-start dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  items-center">
                            <div>
                                <p class="text-base">{{ $TKMIX1->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKMIX1->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKMIX1->proceso == 'Produccion' || $TKMIX1->proceso == 'Almacen')
                                @if ($TKMIX1->proceso == 'Produccion')
                                    <div data-popover-trigger="click" data-popover-target="mix1-analizar-popover">
                                        <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </div>
                                @endif
                                @if ($TKMIX1->proceso == 'Almacen')
                                    <div data-popover-trigger="click" data-popover-target="mix1-analizar-popover">
                                        <svg class="w-full max-h-3 fill-orange-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                        </svg>
                                    </div>
                                @endif

                            @endif


                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKMIX1->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKMIX1->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKMIX1->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        <div
                                            class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                            @if ($TKMIX1->proceso == 'Produccion' || $TKMIX1->proceso == 'Almacen')
                                                @foreach ($TKMIX1->estadoDetalle as $item)
                                                    <div class=" flex  justify-between  ">
                                                        <div>
                                                            <p class="text-xs {{ $item->orp->color != null ? $item->orp->color->color : '' }}">{{ substr($item->orp->codigo, -5) }}
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

                                                    <p class="text-sm whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }}">
                                                        {{ Str::limit($item->orp->producto->nombre, 20) }}
                                                    </p>
                                                @endforeach
                                            @endif



                                        </div>




                                    </div>
                                    <div
                                        class="absolute inset-0  items-center justify-between  flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
                                        <div class="mb-2">


                                            @if ($TKMIX1->proceso == 'Produccion' || $TKMIX1->proceso == 'Almacen')
                                                @foreach ($TKMIX1->estadoDetalle as $item)
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
                                            @if ($TKMIX1->proceso == 'Produccion' || $TKMIX1->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKMIX1->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKMIX1->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKMIX1->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKMIX1->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKMIX1->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKMIX1->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKMIX1->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKMIX1->proceso == 'Produccion' || $TKMIX1->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMIX1->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton almacen-->
                                            @if ($TKMIX1->proceso == 'Vacio' || $TKMIX1->proceso == 'Almacen')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $TKMIX1->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                                    </svg>
                                                </button>
                                            @endif

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


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
                                <p><Span class="inline-block w-32">Estado Análisis</Span>:
                                    {{ $ultimo_TKMIX1->estado }}
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



                    </div>
                    {{-- Mx2 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $TKMIX2->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKMIX2->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKMIX2->proceso == 'Produccion' || $TKMIX2->proceso == 'Almacen')
                                @if ($TKMIX2->proceso == 'Produccion')
                                    <div data-popover-trigger="click" data-popover-target="mix2-analizar-popover">
                                        <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </div>
                                @endif
                                @if ($TKMIX2->proceso == 'Almacen')
                                    <div data-popover-trigger="click" data-popover-target="mix2-analizar-popover">
                                        <svg class="w-full max-h-3 fill-orange-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                        </svg>
                                    </div>
                                @endif

                            @endif


                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKMIX2->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKMIX2->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKMIX2->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKMIX2->proceso == 'Produccion' || $TKMIX2->proceso == 'Almacen')
                                            @foreach ($TKMIX2->estadoDetalle as $item)
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

                                                <p class="text-sm whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }}"> {{ Str::limit($item->orp->producto->nombre, 20) }}
                                                </p>
                                            @endforeach
                                        @endif



                                    </div>
                                    <div
                                        class="absolute inset-0  items-center justify-between  flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
                                        <div class="mb-2">
                                            @if ($TKMIX2->proceso == 'Produccion' || $TKMIX2->proceso == 'Almacen')
                                                @foreach ($TKMIX2->estadoDetalle as $item)
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
                                            @if ($TKMIX2->proceso == 'Produccion' || $TKMIX2->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKMIX2->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKMIX2->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKMIX2->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKMIX2->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKMIX2->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKMIX2->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKMIX2->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKMIX2->proceso == 'Produccion' || $TKMIX2->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMIX2->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton almacen-->
                                            @if ($TKMIX2->proceso == 'Vacio' || $TKMIX2->proceso == 'Almacen')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $TKMIX2->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>
                    {{-- Mx3 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-3 row-span-1 col-span-1">
                        <div class=" flex  justify-between  items-center">
                            <div>
                                <p class="text-base">{{ $TKMIX3->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKMIX3->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKMIX3->proceso == 'Produccion' || $TKMIX3->proceso == 'Almacen')
                                @if ($TKMIX3->proceso == 'Produccion')
                                    <div data-popover-trigger="click" data-popover-target="mix3-analizar-popover">
                                        <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </div>
                                @endif
                                @if ($TKMIX3->proceso == 'Almacen')
                                    <div data-popover-trigger="click" data-popover-target="mix3-analizar-popover">
                                        <svg class="w-full max-h-3 fill-orange-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                        </svg>
                                    </div>
                                @endif

                            @endif


                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKMIX3->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKMIX3->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKMIX3->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif

                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKMIX3->proceso == 'Produccion' || $TKMIX3->proceso == 'Almacen')
                                            @foreach ($TKMIX3->estadoDetalle as $item)
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

                                                <p class="text-sm whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }}"> {{ Str::limit($item->orp->producto->nombre, 20) }}
                                                </p>
                                            @endforeach
                                        @endif




                                    </div>
                                    <div
                                        class="absolute inset-0  items-center justify-between  flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
                                        <div class="mb-2">
                                            @if ($TKMIX3->proceso == 'Produccion' || $TKMIX3->proceso == 'Almacen')
                                                @foreach ($TKMIX3->estadoDetalle as $item)
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
                                            @if ($TKMIX3->proceso == 'Produccion' || $TKMIX3->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKMIX3->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKMIX3->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKMIX3->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKMIX3->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKMIX3->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKMIX3->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKMIX3->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKMIX3->proceso == 'Produccion' || $TKMIX3->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMIX3->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton almacen-->
                                            @if ($TKMIX3->proceso == 'Vacio' || $TKMIX3->proceso == 'Almacen')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $TKMIX3->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                    {{-- Mx4 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-4 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center  ">
                            <div>
                                <p class="text-base">{{ $TKMIX4->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKMIX4->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKMIX4->proceso == 'Produccion' || $TKMIX4->proceso == 'Almacen')
                                @if ($TKMIX4->proceso == 'Produccion')
                                    <div data-popover-trigger="click" data-popover-target="mix4-analizar-popover">
                                        <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                        </svg>
                                    </div>
                                @endif
                                @if ($TKMIX4->proceso == 'Almacen')
                                    <div data-popover-trigger="click" data-popover-target="mix4-analizar-popover">
                                        <svg class="w-full max-h-3 fill-orange-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                        </svg>
                                    </div>
                                @endif

                            @endif


                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKMIX4->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKMIX4->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKMIX4->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKMIX4->proceso == 'Produccion' || $TKMIX4->proceso == 'Almacen')
                                            @foreach ($TKMIX4->estadoDetalle as $item)
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

                                                <p class="text-sm whitespace-nowrap overflow-hidden {{ $item->orp->color != null ? $item->orp->color->color : '' }}"> {{ Str::limit($item->orp->producto->nombre, 20) }}
                                                </p>
                                            @endforeach
                                        @endif




                                    </div>
                                    <div
                                        class="absolute inset-0  items-center justify-between  flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
                                        <div class="mb-2">
                                            @if ($TKMIX4->proceso == 'Produccion' || $TKMIX4->proceso == 'Almacen')
                                                @foreach ($TKMIX4->estadoDetalle as $item)
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
                                            @if ($TKMIX4->proceso == 'Produccion' || $TKMIX4->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKMIX4->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKMIX4->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKMIX4->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKMIX4->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKMIX4->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKMIX4->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKMIX4->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKMIX4->proceso == 'Produccion' || $TKMIX4->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMIX4->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton almacen-->
                                            @if ($TKMIX4->proceso == 'Vacio' || $TKMIX4->proceso == 'Almacen')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.almacen', arguments: { id: {{ $TKMIX4->id }} } })"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-orange-700 rounded-lg hover:bg-oange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M464 160c8.8 0 16 7.2 16 16l0 160c0 8.8-7.2 16-16 16L80 352c-8.8 0-16-7.2-16-16l0-160c0-8.8 7.2-16 16-16l384 0zM80 96C35.8 96 0 131.8 0 176L0 336c0 44.2 35.8 80 80 80l384 0c44.2 0 80-35.8 80-80l0-16c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l0-16c0-44.2-35.8-80-80-80L80 96zm368 96L96 192l0 128 352 0 0-128z" />
                                                    </svg>
                                                </button>
                                            @endif

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>


                </div>
            </div>
            {{-- tq --}}

            <div class="col-span-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-1 col-start-5 mb-1 ">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- tkq --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base"></p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base">

                                </p>
                            </div>


                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">





                                    </div>
                                    <div
                                        class="absolute inset-0  items-center justify-between  flex flex-col opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
                                        <div class="mb-2">

                                        </div>

                                        {{-- botones --}}
                                        <div class=" mt-2 flex gap-1 px-0 py-0 w-full justify-between ">





                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>



                </div>
            </div>
            {{-- saborizado --}}
            <div class="col-span-4 col-start-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-1  mb-1 mr-1">


                <div class="grid grid-cols-4 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- MP --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $TKMP->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKMP->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>

                            @if ($TKMP->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="tkmp-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @else
                                <div></div>
                            @endif




                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKMP->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKMP->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKMP->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKMP->proceso == 'Produccion' || $TKMP->proceso == 'Almacen')
                                            @foreach ($TKMP->estadoDetalle as $item)
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
                                            @if ($TKMP->proceso == 'Produccion' || $TKMP->proceso == 'Almacen')
                                                @foreach ($TKMP->estadoDetalle as $item)
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
                                            @if ($TKMP->proceso == 'Produccion' || $TKMP->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKMP->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKMP->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKMP->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKMP->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKMP->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKMP->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKMP->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKMP->proceso == 'Produccion' || $TKMP->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMP->id }} } })"
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


                    </div>
                    {{-- MG --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $TKMG->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKMG->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKMG->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="tkmg-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif



                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKMG->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKMG->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKMG->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKMG->proceso == 'Produccion' || $TKMG->proceso == 'Almacen')
                                            @foreach ($TKMG->estadoDetalle as $item)
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
                                            @if ($TKMG->proceso == 'Produccion' || $TKMG->proceso == 'Almacen')
                                                @foreach ($TKMG->estadoDetalle as $item)
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
                                            @if ($TKMG->proceso == 'Produccion' || $TKMG->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKMG->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKMG->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKMG->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKMG->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKMG->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKMG->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKMG->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKMG->proceso == 'Produccion' || $TKMG->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKMG->id }} } })"
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


                    </div>
                    {{-- FP --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-3 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $TKFP->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKFP->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKFP->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="tkfp-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif


                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKFP->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKFP->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKFP->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKFP->proceso == 'Produccion' || $TKFP->proceso == 'Almacen')
                                            @foreach ($TKFP->estadoDetalle as $item)
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
                                            @if ($TKFP->proceso == 'Produccion' || $TKFP->proceso == 'Almacen')
                                                @foreach ($TKFP->estadoDetalle as $item)
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
                                            @if ($TKFP->proceso == 'Produccion' || $TKFP->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKFP->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKFP->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKFP->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKFP->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKFP->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKFP->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKFP->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKFP->proceso == 'Produccion' || $TKFP->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKFP->id }} } })"
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


                    </div>
                    {{-- FG --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-4 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $TKFG->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKFG->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKFG->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="tkfg-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
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


                    </div>


                </div>
            </div>

            {{-- columna doble  --}}
            <div class="col-span-4 col-start-1 grid grid-cols-2 ">
                {{-- saborizado 2  --}}
                <div
                    class="grid grid-cols-2 gap-2 h-full justify-center grid-rows-1 col-span-1  bg-white dark:bg-gray-900 p-2 rounded">
                    {{-- TK10 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  items-center">
                            <div>
                                <p class="text-base">{{ $TK10->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TK10->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TK10->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="tk10-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif



                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TK10->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TK10->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TK10->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TK10->proceso == 'Produccion' || $TK10->proceso == 'Almacen')
                                            @foreach ($TK10->estadoDetalle as $item)
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
                                            @if ($TK10->proceso == 'Produccion' || $TK10->proceso == 'Almacen')
                                                @foreach ($TK10->estadoDetalle as $item)
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
                                            @if ($TK10->proceso == 'Produccion' || $TK10->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TK10->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TK10->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TK10->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TK10->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TK10->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TK10->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TK10->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TK10->proceso == 'Produccion' || $TK10->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TK10->id }} } })"
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


                    </div>
                    {{-- TK5 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $TK5->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TK5->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TK5->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="tk5-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif



                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TK5->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TK5->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TK5->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TK5->proceso == 'Produccion' || $TK5->proceso == 'Almacen')
                                            @foreach ($TK5->estadoDetalle as $item)
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
                                            @if ($TK5->proceso == 'Produccion' || $TK5->proceso == 'Almacen')
                                                @foreach ($TK5->estadoDetalle as $item)
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
                                            @if ($TK5->proceso == 'Produccion' || $TK5->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TK5->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TK5->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TK5->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TK5->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TK5->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TK5->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TK5->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TK5->proceso == 'Produccion' || $TK5->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TK5->id }} } })"
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


                    </div>



                </div>
                {{-- sc cc  --}}
                <div
                    class="grid grid-cols-2 gap-2 h-full justify-center grid-rows-1 col-span-1 col-start-2 rounded bg-white dark:bg-gray-900 p-2 mr-1  ml-1 mb-1">
                    {{-- SC --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  items-center">
                            <div>
                                <p class="text-base">{{ $TKSC->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKCC->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKSC->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="TKSC-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif



                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKSC->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKSC->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKSC->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKSC->proceso == 'Produccion' || $TKSC->proceso == 'Almacen')
                                            @foreach ($TKSC->estadoDetalle as $item)
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
                                            @if ($TKSC->proceso == 'Produccion' || $TKSC->proceso == 'Almacen')
                                                @foreach ($TKSC->estadoDetalle as $item)
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
                                            @if ($TKSC->proceso == 'Produccion' || $TKSC->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKSC->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKSC->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKSC->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKSC->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKSC->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKSC->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKSC->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKSC->proceso == 'Produccion' || $TKSC->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKSC->id }} } })"
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


                    </div>
                    {{-- CC --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $TKCC->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base">
                                    {{ \Carbon\Carbon::parse($TKCC->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKCC->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="TKCC-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif



                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKCC->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKCC->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKCC->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKCC->proceso == 'Produccion' || $TKCC->proceso == 'Almacen')
                                            @foreach ($TKCC->estadoDetalle as $item)
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
                                            @if ($TKCC->proceso == 'Produccion' || $TKCC->proceso == 'Almacen')
                                                @foreach ($TKCC->estadoDetalle as $item)
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
                                            @if ($TKCC->proceso == 'Produccion' || $TKCC->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKCC->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKCC->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKCC->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKCC->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKCC->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKCC->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKCC->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKCC->proceso == 'Produccion' || $TKCC->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKCC->id }} } })"
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


                    </div>



                </div>


            </div>
            {{-- columna triple  --}}
            <div class="col-span-5 col-start-1 grid grid-cols-10  mb-1 ">
                {{-- htst  --}}
                <div
                    class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 col-span-5  bg-white dark:bg-gray-900 p-2 rounded mt-1 mr-1 ">
                    {{-- HTST --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-5">
                        {{-- encavezado --}}
                        <div class=" flex  justify-between  pb-0">
                            <div>
                                <p class="text-base">Envasadora HTST</p>
                            </div>

                            

                        @foreach ($groupedResultshtst as $orpIdAndPreparacion => $group)

                                        
                                    

                                    

                                        
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
                                            
                                        </div>
                                        <div class="flex justify-end m-1"><button class="bg-red-500 text-white p-1 rounded-lg"
                                                type="button" wire:click="completar({{ $orp->id }})"
                                                wire:confirm="Esta seguro que desea completar la ORP : {{ $orp->codigo }} y quitar de las envasadoras? \n\n Esta ORP ya no se podra utlizar ">Terminar?</button>
                                        </div>

                                        </div>
                                        
                            
                                    
                        @endforeach
                            


                        </div >
                        <div class=" flex  justify-between bg">
                            
                            <div class="flex items-center gap-2  "> 
                                <p class="text-xl ">
                                    1 
                                </p>
                            
                                 
                                <div class=" text-lg {{ $HTST_1A->proceso == 'Detenido' ? 'text-gray-500' : $HTST_1A->estadoDetalle[0]->orp->color->color}} " data-popover-trigger="click" data-popover-target="48-popover">A</div>
                                <div class="text-lg {{ $HTST_1B->proceso == 'Detenido' ? 'text-gray-500' : $HTST_1B->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="47-popover">B</div>
                                <div class="text-lg {{ $HTST_1C->proceso == 'Detenido' ? 'text-gray-500' : $HTST_1C->estadoDetalle[0]->orp->color->color}} " data-popover-trigger="click" data-popover-target="46-popover">C</div>
                            </div>
                          
                            <div class="flex items-center gap-2  "> 
                                <p class="text-xl ">
                                    2 
                                </p>
                                <div class="text-lg {{ $HTST_2A->proceso == 'Detenido' ? 'text-gray-500' : $HTST_2A->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="45-popover">A</div>
                                <div class="text-lg {{ $HTST_2B->proceso == 'Detenido' ? 'text-gray-500' : $HTST_2B->estadoDetalle[0]->orp->color->color}} " data-popover-trigger="click" data-popover-target="44-popover">B</div>
                                <div class="text-lg {{ $HTST_2C->proceso == 'Detenido' ? 'text-gray-500' : $HTST_2C->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="43-popover">C</div>
                            </div>
                            <div class="flex items-center gap-2  "> 
                                <p class="text-xl ">
                                    3 
                                </p>
                                <div class="text-lg {{ $HTST_3A->proceso == 'Detenido' ? 'text-gray-500' : $HTST_3A->estadoDetalle[0]->orp->color->color}} " data-popover-trigger="click" data-popover-target="42-popover">A</div>
                                <div class="text-lg {{ $HTST_3B->proceso == 'Detenido' ? 'text-gray-500' : $HTST_3B->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="41-popover">B</div>
                                <div class="text-lg {{ $HTST_3C->proceso == 'Detenido' ? 'text-gray-500' : $HTST_3C->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="40-popover">C</div>
                            </div>
                            <div class="flex items-center gap-2  "> 
                                <p class="text-xl ">
                                    4 
                                </p>
                                <div class="text-lg {{ $HTST_4A->proceso == 'Detenido' ? 'text-gray-500' : $HTST_4A->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="39-popover">A</div>
                                <div class="text-lg {{ $HTST_4B->proceso == 'Detenido' ? 'text-gray-500' : $HTST_4B->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="38-popover">B</div>
                                <div class="text-lg {{ $HTST_4C->proceso == 'Detenido' ? 'text-gray-500' : $HTST_4C->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="37-popover">C</div>
                            </div>
                            <div class="flex items-center gap-2  "> 
                                <p class="text-xl ">
                                    5 
                                </p>
                                <div class="text-lg {{ $HTST_5A->proceso == 'Detenido' ? 'text-gray-500' : $HTST_5A->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="36-popover">A</div>
                                <div class="text-lg {{ $HTST_5B->proceso == 'Detenido' ? 'text-gray-500' : $HTST_5B->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="35-popover">B</div>
                                <div class="text-lg {{ $HTST_5C->proceso == 'Detenido' ? 'text-gray-500' : $HTST_5C->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="34-popover">C</div>
                            </div>

                        </div>
                        
                        

                        
                        {{-- botones --}}
                            <div class="flex gap-1 px-0 py-0 w-full justify-between">
                                <!--boton matenimiento-->

                                {{-- <button type="button" 
                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-full max-h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                    </svg>
                                </button>


                                <!--boton vacio-->
                                
                                <button type="button" 
                                onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.vaciar', arguments: { id: 1   }})"
                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                    <svg class="w-full max-h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                    </svg>
                                </button> --}}

                            </div>

                    </div>

                </div>
                {{-- arana vasos  --}}
                <div
                    class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 col-span-2 col-start-6  bg-white dark:bg-gray-900 p-2  mt-1 mr-1  rounded ">
                    {{--  --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1 ">
                       {{-- Vasos --}}
                        <div class=" flex flex-col  justify-center ">
                            <div class=" flex justify-center">

                                <p class="text-base mb-3">Vasos - Araña</p>
                                @foreach ($groupedResultsvasos as $orpIdAndPreparacion => $group)

                                        
                                    

                                    

                                        
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
                                            
                                        </div>
                                        <div class="flex justify-end m-1"><button class="bg-red-500 text-white p-1 rounded-lg"
                                                type="button" wire:click="completar({{ $orp->id }})"
                                                wire:confirm="Esta seguro que desea completar la ORP : {{ $orp->codigo }} y quitar de las envasadoras? \n\n Esta ORP ya no se podra utlizar ">Terminar?</button>
                                        </div>

                                        </div>
                                        
                            
                                    
                        @endforeach
                            </div>
                            
                                <div class=" flex  justify-between">
                                    <div></div>
                                    <div class="text-xl {{ $V1->proceso == 'Detenido' ? 'text-gray-500' : $V1->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="50-popover">V1</div>
                                    <div class="text-xl {{ $V2->proceso == 'Detenido' ? 'text-gray-500' : $V2->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="51-popover">V2</div>
                                    <div class="text-xl {{ $V3->proceso == 'Detenido' ? 'text-gray-500' : $V3->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="52-popover">V3</div>
                                    <div></div>
                                
                                
    
    
                            </div>
                            


                        </div>
                        {{-- Araña --}}
                        <div class=" flex flex-col  justify-center ">
                            
                            
                                <div class=" flex  justify-between">
                                    <div></div>
                                    <div class="text-xl text-{{ $araña->proceso == 'Detenido' ? 'gray' : 'green' }}-500" data-popover-trigger="click" data-popover-target="53-popover">ARAÑA</div>
                                    
                                    <div></div>
                                
                                
    
    
                            </div>
                            


                        </div>

                        <div class="flex gap-1 px-0 py-0 w-full justify-between">
                                {{-- <!--boton matenimiento-->

                                <button type="button" 
                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-full max-h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                    </svg>
                                </button>


                                <!--boton vacio-->

                                <button type="button" onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.vaciar', arguments: { id:3 }})" 
                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                    <svg class="w-full max-h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                    </svg>
                                </button> --}}

                            </div>

                    </div>




                </div>
                {{-- uht  --}}
                <div
                    class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 col-span-3 col-start-8  bg-white dark:bg-gray-900 p-2  mt-1   rounded">
                    {{-- UHT --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-base">Envasadora UHT</p>
                            </div>
                            @foreach ($groupedResultsuht as $orpIdAndPreparacion => $group)

                                        
                                    

                                    

                                        
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
                                            
                                        </div>
                                        <div class="flex justify-end m-1"><button class="bg-red-500 text-white p-1 rounded-lg"
                                                type="button" wire:click="completar({{ $orp->id }})"
                                                wire:confirm="Esta seguro que desea completar la ORP : {{ $orp->codigo }} y quitar de las envasadoras? \n\n Esta ORP ya no se podra utlizar ">Terminar?</button>
                                        </div>

                                        </div>
                                        
                            
                                    
                        @endforeach


                        </div>

                        <div class=" flex  justify-between bg">
                            
                            <div class="flex items-center gap-3  "> 
                                <p class="text-xl ">
                                    1 
                                </p>
                                <div class="text-lg {{ $UHT_1A->proceso == 'Detenido' ? 'text-gray-500' : $UHT_1A->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="27-popover">A</div>
                                <div class="text-lg {{ $UHT_1B->proceso == 'Detenido' ? 'text-gray-500' : $UHT_1B->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="28-popover">B</div>
                                <div class="text-lg {{ $UHT_1C->proceso == 'Detenido' ? 'text-gray-500' : $UHT_1C->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="29-popover">C</div>
                            </div>
                          
                            <div class="flex items-center gap-3  "> 
                                <p class="text-xl ">
                                    2 
                                </p>
                                <div class="text-lg {{ $UHT_2A->proceso == 'Detenido' ? 'text-gray-500' : $UHT_2A->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="30-popover">A</div>
                                <div class="text-lg {{ $UHT_2B->proceso == 'Detenido' ? 'text-gray-500' : $UHT_2B->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="31-popover">B</div>
                                
                            </div>
                            <div class="flex items-center gap-3  "> 
                                <p class="text-xl ">
                                    3 
                                </p>
                                <div class="text-lg {{ $UHT_3A->proceso == 'Detenido' ? 'text-gray-500' : $UHT_3A->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="32-popover">A</div>
                                <div class="text-lg {{ $UHT_3B->proceso == 'Detenido' ? 'text-gray-500' : $UHT_3B->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="33-popover">B</div>
                                
                            </div>
                            
                            

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">
                            {{-- <!--boton matenimiento-->

                            <button type="button" 
                                class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-full max-h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>


                            <!--boton vacio-->

                            <button type="button" onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.vaciar', arguments: { id: 2       }})"
                                class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-full max-h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button> --}}

                        </div>

                    </div>




                </div>

            </div>
            {{-- 41 42 --}}
            <div
                class="col-span-1 col-start-5 bg-white dark:bg-gray-900 rounded-md p-2 row-span-2 mb-1  row-start-2 mt-1">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-2 ">
                    {{-- YK41 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $TK41->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TK41->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TK41->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="tk41-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif



                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TK41->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TK41->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TK41->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TK41->proceso == 'Produccion' || $TK41->proceso == 'Almacen')
                                            @foreach ($TK41->estadoDetalle as $item)
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
                                            @if ($TK41->proceso == 'Produccion' || $TK41->proceso == 'Almacen')
                                                @foreach ($TK41->estadoDetalle as $item)
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
                                            @if ($TK41->proceso == 'Produccion' || $TK41->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TK41->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TK41->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TK41->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TK41->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TK41->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TK41->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TK41->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TK41->proceso == 'Produccion' || $TK41->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TK41->id }} } })"
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


                    </div>
                    {{-- 42 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between items-center ">
                            <div>
                                <p class="text-base">{{ $TK42->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TK42->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TK42->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="tk42-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif



                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TK42->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TK42->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TK42->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TK42->proceso == 'Produccion' || $TK42->proceso == 'Almacen')
                                            @foreach ($TK42->estadoDetalle as $item)
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
                                            @if ($TK42->proceso == 'Produccion' || $TK42->proceso == 'Almacen')
                                                @foreach ($TK42->estadoDetalle as $item)
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
                                            @if ($TK42->proceso == 'Produccion' || $TK42->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TK42->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TK42->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TK42->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TK42->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TK42->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TK42->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TK42->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TK42->proceso == 'Produccion' || $TK42->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TK42->id }} } })"
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


                    </div>



                </div>
            </div>




        </div>

        {{-- Columna 3 --}}
        <div class="row-span-4 col-span-2 grid grid-cols-1 grid-rows-4  col-start-13 ">
            {{-- ENV UX --}}
            <div class="col-span-1  bg-white dark:bg-gray-900 rounded-md p-2 row-span-2 mb-1  ">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-2 ">
                    {{-- aux1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  items-center">
                            <div>
                                <p class="text-base">{{ $TKAUX1->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base">
                                    {{ \Carbon\Carbon::parse($TKAUX1->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKAUX1->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="TKAUX1-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif



                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKAUX1->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKAUX1->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKAUX1->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKAUX1->proceso == 'Produccion' || $TKAUX1->proceso == 'Almacen')
                                            @foreach ($TKAUX1->estadoDetalle as $item)
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
                                            @if ($TKAUX1->proceso == 'Produccion' || $TKAUX1->proceso == 'Almacen')
                                                @foreach ($TKAUX1->estadoDetalle as $item)
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
                                            @if ($TKAUX1->proceso == 'Produccion' || $TKAUX1->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKAUX1->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKAUX1->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKAUX1->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKAUX1->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKAUX1->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKAUX1->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKAUX1->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKAUX1->proceso == 'Produccion' || $TKAUX1->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKAUX1->id }} } })"
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


                    </div>
                    {{-- AUX2 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between  items-center">
                            <div>
                                <p class="text-base">{{ $TKAUX2->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base">
                                    {{ \Carbon\Carbon::parse($TKAUX2->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>
                            @if ($TKAUX2->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="TKAUX2-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif



                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKAUX2->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKAUX2->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKAUX2->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKAUX2->proceso == 'Produccion' || $TKAUX2->proceso == 'Almacen')
                                            @foreach ($TKAUX2->estadoDetalle as $item)
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
                                            @if ($TKAUX2->proceso == 'Produccion' || $TKAUX2->proceso == 'Almacen')
                                                @foreach ($TKAUX2->estadoDetalle as $item)
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
                                            @if ($TKAUX2->proceso == 'Produccion' || $TKAUX2->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKAUX2->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKAUX2->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKAUX2->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKAUX2->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKAUX2->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKAUX2->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKAUX2->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKAUX2->proceso == 'Produccion' || $TKAUX2->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKAUX2->id }} } })"
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


                    </div>



                </div>
            </div>
            {{-- TKSY --}}
            <div class="col-span-1  bg-white dark:bg-gray-900 rounded-md p-2 row-span-1  row-start-3">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- tksy --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  items-center">
                            <div>
                                <p class="text-base">{{ $TKSY->origen->alias }}</p>
                            </div>

                            <div>
                                <p class="text-base"> {{ \Carbon\Carbon::parse($TKSY->tiempo)->isoFormat('HH:mm') }}
                                </p>
                            </div>

                            @if ($TKSY->proceso == 'Produccion')
                                <div data-popover-trigger="click" data-popover-target="tksy-analizar-popover">
                                    <svg class="w-full max-h-3 fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </div>
                            @endif


                        </div>

                        <div class="grid gap-2 h-full w-full  ">
                            <div class=" p-2 flex items-center justify-center ">


                                <div class="relative w-full h-full group ">
                                    @if ($TKSY->proceso == 'Mantenimiento')
                                        <svg class="w-full md:h-12   fill-blue-600 relative"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                                            </path>


                                        </svg>
                                    @endif

                                    @if ($TKSY->proceso == 'Limpieza')
                                        <svg class="w-full md:h-12  fill-black relative dark:fill-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!-- Contenido principal del SVG -->
                                            <path
                                                d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z">
                                            </path>



                                        </svg>
                                    @endif

                                    @if ($TKSY->proceso == 'Vacio')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-full md:h-12  fill-gray-500 relative">
                                            <!-- Cuerpo principal del primer SVG -->
                                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>


                                        </svg>
                                    @endif
                                    <div
                                        class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                        @if ($TKSY->proceso == 'Produccion' || $TKSY->proceso == 'Almacen')
                                            @foreach ($TKSY->estadoDetalle as $item)
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
                                            @if ($TKSY->proceso == 'Produccion' || $TKSY->proceso == 'Almacen')
                                                @foreach ($TKSY->estadoDetalle as $item)
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
                                            @if ($TKSY->proceso == 'Produccion' || $TKSY->proceso == 'Almacen')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="solicitar({{ $TKSY->id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton matenimiento-->
                                            @if ($TKSY->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="mantenimiento({{ $TKSY->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton limpieza-->
                                            @if ($TKSY->proceso == 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="limpieza({{ $TKSY->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-full max-h-3 fill-black"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <!--boton vacio-->
                                            @if ($TKSY->proceso != 'Vacio')
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="vacio({{ $TKSY->origen_id }})"
                                                    class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-full max-h-3 fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>
                                            @endif

                                            <!--boton produccion-->
                                            @if ($TKSY->proceso == 'Produccion' || $TKSY->proceso == 'Vacio')
                                                <button type="button"
                                                    onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.movimiento', arguments: { id: {{ $TKSY->id }} } })"
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


                    </div>




                </div>
            </div>
            {{-- env soy --}}
            <div class="col-span-1  bg-white dark:bg-gray-900 rounded-md p-2 row-span-1  row-start-4 mt-1">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- aux1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-base">Envasadoras Soya</p>
                            </div>
                            @foreach ($groupedResultssoya as $orpIdAndPreparacion => $group)

                                        
                                    

                                    

                                        
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
                                            
                                        </div>
                                        <div class="flex justify-end m-1"><button class="bg-red-500 text-white p-1 rounded-lg"
                                                type="button" wire:click="completar({{ $orp->id }})"
                                                wire:confirm="Esta seguro que desea completar la ORP : {{ $orp->codigo }} y quitar de las envasadoras? \n\n Esta ORP ya no se podra utlizar ">Terminar?</button>
                                        </div>

                                        </div>
                                        
                            
                                    
                        @endforeach
                          
                        </div>

                        <div class=" flex  justify-center ">
                            
                            <div class="flex items-center gap-8  p-3 justify-between "> 
                                
                                <div class="text-lg {{ $l1->proceso == 'Detenido' ? 'text-gray-500' : $l1->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="57-popover">L1</div>
                                <div class="text-lg {{ $l2->proceso == 'Detenido' ? 'text-gray-500' : $l2->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="58-popover">L2</div>
                                <div class="text-lg {{ $l3->proceso == 'Detenido' ? 'text-gray-500' : $l3->estadoDetalle[0]->orp->color->color}}" data-popover-trigger="click" data-popover-target="59-popover">L3</div>
                            </div>
                          
                            
                            
                            

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">
                            {{-- <!--boton matenimiento-->

                            <button type="button" 
                                class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-full max-h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>


                            <!--boton vacio-->

                            <button type="button" onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.vaciar', arguments: { id: 5   }})"
                                class="w-full px-1 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-full max-h-3 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button> --}}

                        </div>

                    </div>




                </div>
            </div>

        </div>





    </div>


    {{-- popovers --}}
    {{-- mx2 --}}
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
                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKMIX2->estado }}
                    - {{ \Carbon\Carbon::parse($ultimo_TKMIX2->tiempo)->isoFormat('HH:mm') }}
                </p>
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKMIX2->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKMIX2->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKMIX2->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKMIX2->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- mx3 --}}
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
                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKMIX3->estado }}
                    - {{ \Carbon\Carbon::parse($ultimo_TKMIX3->tiempo)->isoFormat('HH:mm') }}
                </p>
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKMIX3->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKMIX3->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKMIX3->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKMIX3->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- mx4 --}}
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
                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKMIX4->estado }}
                    - {{ \Carbon\Carbon::parse($ultimo_TKMIX4->tiempo)->isoFormat('HH:mm') }}
                </p>
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKMIX4->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKMIX4->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKMIX4->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKMIX4->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- 41 --}}
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TK41->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TK41->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TK41->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TK41->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- 42 --}}
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TK42->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TK42->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TK42->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TK42->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tk10 --}}
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TK10->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TK10->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TK10->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TK10->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tk5 --}}
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TK5->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TK5->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TK5->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TK5->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tkfp --}}
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKFP->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKFP->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKFP->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKFP->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tkfg --}}
    <div data-popover id="tkfg-analizar-popover" role="tooltip"
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKFG->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKFG->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKFG->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKFG->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tkmp --}}
    <div data-popover id="tkmp-analizar-popover" role="tooltip"
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKMP->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKMP->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKMP->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKMP->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tkmg --}}
    <div data-popover id="tkmg-analizar-popover" role="tooltip"
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKMG->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKMG->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKMG->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKMG->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- r1 --}}
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
                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_R1->estado }}
                    - {{ \Carbon\Carbon::parse($ultimo_R1->tiempo)->isoFormat('HH:mm') }}
                </p>
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_R1->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_R1->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_R1->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_R1->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- r2 --}}
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
                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_R2->estado }}
                    - {{ \Carbon\Carbon::parse($ultimo_R2->tiempo)->isoFormat('HH:mm') }}
                </p>
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_R2->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_R2->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_R2->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_R2->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- r3 --}}
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
                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_R3->estado }}
                    - {{ \Carbon\Carbon::parse($ultimo_R3->tiempo)->isoFormat('HH:mm') }}
                </p>
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_R3->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_R3->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_R3->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_R3->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tksy --}}
    <div data-popover id="tksy-analizar-popover" role="tooltip"
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKSY->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKSY->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKSY->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKSY->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tkcc --}}
    <div data-popover id="TKCC-analizar-popover" role="tooltip"
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
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKCC->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKCC->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKCC->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKCC->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tksc --}}
    <div data-popover id="TKSC-analizar-popover" role="tooltip"
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
                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKSC->estado }}
                    - {{ \Carbon\Carbon::parse($ultimo_TKSC->tiempo)->isoFormat('HH:mm') }}
                </p>
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKSC->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKSC->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKSC->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKSC->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tkaux1 --}}
    <div data-popover id="TKAUX1-analizar-popover" role="tooltip"
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
                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKAUX1->estado }}
                    - {{ \Carbon\Carbon::parse($ultimo_TKAUX1->tiempo)->isoFormat('HH:mm') }}
                </p>
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKAUX1->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKAUX1->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKAUX1->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKAUX1->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>
    {{-- tkaux2 --}}
    <div data-popover id="TKAUX2-analizar-popover" role="tooltip"
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
                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKAUX2->estado }}
                    - {{ \Carbon\Carbon::parse($ultimo_TKAUX2->tiempo)->isoFormat('HH:mm') }}
                </p>
                <p><Span class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKAUX2->analisisLinea->temperatura / 1 }}
                    [°C]</p>
                <p><Span class="inline-block w-32">pH</Span>:{{ $ultimo_TKAUX2->analisisLinea->ph / 1 }}
                </p>
                <p><Span class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKAUX2->analisisLinea->acidez / 1 }}[%]
                </p>
                <p><Span class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKAUX2->analisisLinea->brix / 1 }}[°Bx]
                </p>
            @endif
        </div>



    </div>

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
                </div>
                <div data-popper-arrow>
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
