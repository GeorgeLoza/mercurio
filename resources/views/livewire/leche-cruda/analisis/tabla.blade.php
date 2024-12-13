<div wire:poll.10s>
    <div class="flex mb-2 gap-2">
        <a href="{{ route('analisisLinea.index') }}" class="px-2 bg-green-600 text-white rounded-md">
            Analisis en Linea
        </a>
        @if ($pendiente)
        <p class="bg-red-500 text-white p-1 rounded-md"> Tienes análisis de recepción de leche pendiente</p>
        @endif
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">   
        
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tiempo')" nowrap>
                        Hora - Fecha
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('subruta')" nowrap>
                        Subruta
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('estado')" nowrap>
                        Estado
                    </th>
                    <th scope="col" class=" flex gap-2 px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        opciones
                        <button wire:click="show_filtro">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-700 dark:fill-gray-300"
                                viewBox="0 0 512 512">
                                <path
                                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                            </svg>
                        </button>

                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('temperatura')"  nowrap>
                        Temperatura
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('ph')" nowrap>
                        ph
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('acidez')" nowrap>
                        Acidez
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('brix')" nowrap>
                        Brix
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('densidad')" nowrap>
                        Densidad
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('prueba_alcohol')" nowrap>
                        Prueba Alcohol
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('contenido_graso')" nowrap>
                        Contenigo Graso
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tram_inicio')" nowrap>
                        TRAM início
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tram_fin')" nowrap>
                        TRAM fin
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tram_lapso')" nowrap>
                        TRAM lapso  
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('temperatura_congelacion')" nowrap>
                        temperatura de congelación
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('porcentaje_agua')" nowrap>
                        Porcentaje de Agua
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        Observaciones
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('user')">
                        Encargado
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @if($filtro == true)
                <!-- fila de filtros -->
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th class="p-1">
                        <input type="text" wire:model.live='f_tiempo' placeholder="Filtrar por Tiempo"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_subruta' placeholder="Filtrar por Subruta"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_estado' placeholder="Filtrar por Estado"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        
                    </th>
                    <th class="p-1">
                        <!--temperatura-->
                    </th>
                    <th class="p-1">
                        <!--ph-->
                    </th>
                    <th class="p-1">
                        <!--acidez-->
                    </th>
                    <th class="p-1">
                        <!--brix-->
                    </th>
                    <th class="p-1">
                        <!--densidad-->
                    </th>
                    <th class="p-1">
                        <!--prueba alcohol-->
                    </th>
                    <th class="p-1">
                        <!--contenido grado-->
                    </th>
                    <th class="p-1">
                        <!--tram inicio-->
                    </th>
                    <th class="p-1">
                        <!--tram fin-->
                    </th>
                    <th class="p-1">
                        <!--tram lapso-->
                    </th>
                    <th class="p-1">
                        <!--temperatura congelacion-->
                    </th>
                    <th class="p-1">
                        <!--porcentaj de agua-->
                    </th>
                    <th class="p-1">
                        <!--Observaciones-->
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_user' placeholder="Filtrar por Cantidad"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                </tr>
                @endif
                @foreach ($registros as $registro)
                <tr
                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$registro->tiempo}}
                    </th>
                    <td class="px-6 py-2" nowrap>
                        {{$registro->recepcion_leche->subruta_acopio->nombre}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        @if($registro->recepcion_leche->estado == 'Pendiente')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0"></span>{{$registro->recepcion_leche->estado}}</span>
                        @endif
                        @if($registro->recepcion_leche->estado == 'En proceso')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0"></span>{{$registro->recepcion_leche->estado}}</span>
                        @endif
                        @if($registro->recepcion_leche->estado == 'Completado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{$registro->recepcion_leche->estado}}</span>
                        @endif
                        @if($registro->recepcion_leche->estado == 'Rechazado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-red-500 rounded-full me-1.5 flex-shrink-0"></span>{{$registro->recepcion_leche->estado}}</span>
                        @endif
                        @if($registro->recepcion_leche->estado == 'Cancelado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-red-600 rounded-full me-1.5 flex-shrink-0"></span>{{$registro->recepcion_leche->estado}}</span>
                        @endif
                    </td>
                    <td class="flex items-center px-6 py-2 gap-2">
                        @if(now()->diffInMinutes($registro->created_at)<2400)
                        <svg onclick="Livewire.dispatch('openModal', { component: 'leche-cruda.analisis.editar', arguments: { id: {{ $registro->id}} } })"
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                            viewBox="0 0 512 512">
                            <path
                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                        </svg>
                        @endif  
                        @if(in_array(auth()->user()->rol, ['Admi']))
                        @if(now()->diffInMinutes($registro->created_at)<2400)
                        <svg onclick="Livewire.dispatch('openModal', { component: 'leche-cruda.analisis.eliminar', arguments: { id: {{ $registro->id}} } })"
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-red-600 dark:fill-red-500"
                            viewBox="0 0 448 512">
                            <path
                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                        </svg>
                        @endif
                        @endif
                        
                    </td>
                    <td class="px-6 py-2 @if($parametro && $registro->temperatura !== null) {{ ($registro->temperatura <= $parametro->temperatura_max) ? 'text-green-500' : 'text-red-500' }} @endif" nowrap>
                        {{$registro->temperatura}}
                    </td>
                    <td class="px-6 py-2 @if($parametro && $registro->ph !== null) {{ ($registro->ph >= $parametro->ph_min && $registro->temperatura <= $parametro->ph_max) ? 'text-green-500' : 'text-red-500' }} @endif" nowrap>
                        {{$registro->ph}}
                    </td>
                    <td class="px-6 py-2 @if($parametro && $registro->acidez !== null) {{ ($registro->acidez >= $parametro->acidez_min && $registro->acidez <= $parametro->acidez_max) ? 'text-green-500' : 'text-red-500' }} @endif" nowrap>
                        {{$registro->acidez}}
                    </td>
                    <td class="px-6 py-2 @if($parametro && $registro->brix !== null) {{ ($registro->brix >= $parametro->brix_min) ? 'text-green-500' : 'text-red-500' }} @endif" nowrap>
                        {{$registro->brix}}
                    </td>
                    <td class="px-6 py-2  @if($parametro && $registro->densidad !== null) {{ ($registro->densidad >= $parametro->densidad_min && $registro->densidad <= $parametro->densidad_max) ? 'text-green-500' : 'text-red-500' }} @endif" nowrap>
                        {{$registro->densidad}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        {{$registro->prueba_alcohol}}
                    </td>
                    <td class="px-6 py-2 @if($parametro && $registro->contenido_graso !== null) {{ ($registro->contenido_graso >= $parametro->contenido_graso_min) ? 'text-green-500' : 'text-red-500' }} @endif" nowrap>
                        {{$registro->contenido_graso}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        {{$registro->tram_inicio}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        {{$registro->tram_fin}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        {{$registro->tram_lapso}}
                    </td>
                    <td class="px-6 py-2 @if($parametro && $registro->temperatura_congelacion !== null) {{ ($registro->temperatura_congelacion >= $parametro->temperatura_congelada && $registro->temperatura_congelacion_min <= $parametro->temperatura_congelada_max) ? 'text-green-500' : 'text-red-500' }} @endif" nowrap>
                        {{$registro->temperatura_congelacion}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        {{$registro->porcentaje_agua}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        {{$registro->observaciones}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        @if($registro->user)
                        {{$registro->user->nombre}} {{$registro->user->apellido}}
                        @endif
                    </td>
                    
                </tr>
                @endforeach


            </tbody>

        </table>
    </div>
    @if (!$aplicandoFiltros)
    <div>
        {{ $registros->links('pagination::tailwind') }}
    </div>
@endif

</div>
