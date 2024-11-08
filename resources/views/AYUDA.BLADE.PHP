 <!--l1-->
 <div data-popover id="57-popover" role="tooltip"
 class="absolute z-10 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
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