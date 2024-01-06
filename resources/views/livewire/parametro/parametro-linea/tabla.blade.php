<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('producto_codigo')">
                        Codigo
                    </th>
  
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('producto_nombre')">
                        Nombre
                    </th>                  
  
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('etapa_nombre')">
                        etapa_nombre
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('temperatura_min')">
                        temperatura_min
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('temperatura_max')">
                        temperatura_max
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('ph_min')">
                        ph_min
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('ph_max')">
                        ph_max
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('acidez_min')">
                        acidez_min
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('acidez_max')">
                        acidez_max
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('brix_min')">
                        brix_min
                    </th>
            
                <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('brix_max')">
                    brix_max
                </th>
                <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('viscosidad_min')">
                    viscosidad_min
                </th>
                <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('viscosidad_max')">
                    viscosidad_max
                </th>
                <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('densidad_min')">
                    densidad_min
                </th>
                <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700" wire:click="sortBy('densidad_max')">
                    densidad_max
                </th>



                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        opciones
                    </th>

                </tr>
            </thead>
            <tbody class="">
                <!-- fila de filtros -->
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    
                    <th class="p-1">
                        <input type="text"  wire:model.live='f_producto_codigo' placeholder="Filtrar por codigo"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th> 
                    <th class="p-1">
                        <input type="text"  wire:model.live='f_producto_nombre' placeholder="Filtrar por nombre"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th> 
                    <th class="p-1">
                        <input type="text"  wire:model.live='f_etapa_nombre' placeholder="Filtrar por etapa"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                   
                    <th class="p-1">
                        <input type="text"  wire:model.live='f_temperatura_min' placeholder="Filtrar por temperatura minima"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                    <th class="p-1">
                        <input type="text"  wire:model.live='f_temperatura_max' placeholder="Filtrar por temperatura maxima"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                    <th class="p-1">
                        <input type="text"  wire:model.live='f_ph_min' placeholder="Filtrar por temperatura ph_min"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text"  wire:model.live='f_ph_max' placeholder="Filtrar por temperatura ph_max"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text"  wire:model.live='f_acidez_min' placeholder="Filtrar por temperatura acidez_min"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                    <th class="p-1">
                        <input type="text"  wire:model.live='f_acidez_max' placeholder="Filtrar por temperatura acidez_max"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                    <th class="p-1">
                        <input type="text"  wire:model.live='f_brix_min' placeholder="Filtrar por temperatura brix_min"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text"  wire:model.live='f_brix_max' placeholder="Filtrar por temperatura brix_max"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                    <th class="p-1">
                        <input type="text"  wire:model.live='f_densidad_min' placeholder="Filtrar por temperatura densidad_min"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                    <th class="p-1">
                        <input type="text"  wire:model.live='f_densidad_max' placeholder="Filtrar por temperatura densidad_max"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>



                </tr>
                @foreach ($parametro_lineas as $parametro_linea)
                <tr
                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white" >
                        {{$parametro_linea->producto->codigo}}
                    </th>
                    <td class="px-6 py-2" nowrap>
                        {{$parametro_linea->producto->nombre}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        {{$parametro_linea->etapa->nombre}}
                    </td>
                  
                    <td class="px-6 py-2">
                        {{$parametro_linea->temperatura_min}} °C
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->temperatura_max}} °C
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->ph_min}}
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->ph_max}}
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->acidez_min}}
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->acidez_max}}
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->brix_min}}
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->brix_max}}
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->viscosidad_min}}
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->viscosidad_max}}
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->densidad_min}}
                    </td>
                    <td class="px-6 py-2">
                        {{$parametro_linea->densidad_max}}
                    </td>

                    <td class="flex items-center px-6 py-2 gap-2">
                        
                        <svg onclick="Livewire.dispatch('openModal', { component: 'parametro.parametro-linea.editar', arguments: { id: {{ $parametro_linea->id}} } })" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                            viewBox="0 0 512 512">
                            <path
                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                        </svg>
                        @if(in_array(auth()->user()->rol, ['Admi']))
                        <svg onclick="Livewire.dispatch('openModal', { component: 'parametro.parametro-linea.eliminar', arguments: { id: {{ $parametro_linea->id}} } })" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-red-600 dark:fill-red-500"
                            viewBox="0 0 448 512">
                            <path
                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                        </svg>
                        @endif
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
    </div>
</div>
