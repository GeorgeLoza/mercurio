<div @if (auth()->user()->rol == 'FQ') wire:poll.10s @endif>
    <div class="flex mb-2 gap-2">
      
       
    </div>
    {{-- filtrado de datos al descargar --}}
    <div  class="flex justify-between m-2 ">
        <div class="">
             <button class="bg-green-500 p-2 text-center rounded-md " wire:click="exportarExcel"
             >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-5 w-5 fill-white">
            <path
                d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z" />
        </svg>
    </button>

    <label >Mes:</label>
    <select class="rounded p-1 mx-2 bg-white" wire:model.defer="mes">
        <option value="">Selecciona</option>
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
    </select>
     @error('mes') <span class="text-red-500 text-base">{{ $message }}</span> @enderror
    

    <label >Año:</label>
    
    <input id=¨yr¨  type="number" 
    min="2024" 
    max="2100"  class="rounded p-1" placeholder=" 2024" wire:model.defer="anio">
    @error('anio') <span class="text-red-500 text-base">{{ $message }}</span> @enderror


        </div>

        <div>
            <button wire:click="show_filtro">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-700 dark:fill-gray-300" viewBox="0 0 512 512">
            <path
                d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
        </svg> 
        </div>
      
    </button>
   
    </div>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class=" w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">

            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')">

                        Fecha
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')" style="white-space: nowrap;">
                        Hora S. Hora R.
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')">
                        ORP
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        PT
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')">
                        producto
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Prep.
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        origen
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        etapa
                    </th>


                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Temperatura
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        ph
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        acidez
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        brix
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        viscosidad
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        densidad
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        color
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        olor
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Sabor
                    </th>




                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        solicitante
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        analista
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @if ($filtro == true)
                    <!-- fila de filtros -->
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th class="p-1">
                            <input type="text" wire:model.live='f_fecha' placeholder="Filtrar Fecha"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th></th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_orp' placeholder="Filtrar Orp"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th><input type="text" wire:model.live='f_pt' placeholder="Filtrar PT"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_producto' placeholder="Filtrar por Nombre"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_preparacion' placeholder="Filtrar por Preparacion"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_origen' placeholder="Filtrar por Origen"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_etapa' placeholder="Filtrar por Etapa"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>

                        <th class="p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" wire:click="limpiarFiltros" viewBox="0 0 576 512"
                                class="h-5 w-5 fill-green-600 dark:fill-green-500">
                                <path
                                    d="M290.7 57.4L57.4 290.7c-25 25-25 65.5 0 90.5l80 80c12 12 28.3 18.7 45.3 18.7H288h9.4H512c17.7 0 32-14.3 32-32s-14.3-32-32-32H387.9L518.6 285.3c25-25 25-65.5 0-90.5L381.3 57.4c-25-25-65.5-25-90.5 0zM297.4 416H288l-105.4 0-80-80L227.3 211.3 364.7 348.7 297.4 416z" />
                            </svg>
                        </th>


                    </tr>
                @endif
                @foreach ($calidades as $analisis)
                    @php
                        // Obtenemos la etapa de EstadoPlanta
                        $etapaId = $analisis->solicitudAnalisisLinea->estadoPlanta->etapa_id;

                        // Filtramos los parametroLinea por la etapa
                        $parametroLinea = $analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle[0]->orp->producto->parametroLinea
                            ->filter(function ($parametro) use ($etapaId) {
                                return $parametro->etapa_id == $etapaId;
                            })
                            ->first(); // Suponiendo que solo quieres uno que coincida
                    @endphp
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-3 py-2" nowrap>

                            @foreach ($analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $item)
                                @if ($item->orp->tiempo_elaboracion)
                                    <p>{{ \Carbon\Carbon::parse($item->orp->tiempo_elaboracion)->format('d-m-Y') }}</p>
                                @endif
                            @endforeach

                        </th>
                        <td class="px-3 py-2" nowrap>
                            @if ($analisis->solicitudAnalisisLinea->tiempo)
                                {{ \Carbon\Carbon::parse($analisis->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            @endif
                            -
                            @if ($analisis->tiempo)
                                {{ \Carbon\Carbon::parse($analisis->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            @endif

                        </td>
                        <th scope="row"
                            class="px-1 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @foreach ($analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $item)
                                <p>{{ $item->orp->codigo }}</p>
                            @endforeach

                        </th>

                        <th scope="row"
                            class="px-1 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @foreach ($analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $item)
                                <p>{{ $item->orp->producto->codigo }}</p>
                            @endforeach

                        </th>


                        <td class="px-1 py-2" nowrap>
                            @foreach ($analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $item)
                                <div class="whitespace-nowrap" data-popover-target="popover-{{ $item->orp->codigo }}">
                                    {{ Str::limit($item->orp->producto->nombre, 50) }}</div>
                                <div data-popover id="popover-{{ $item->orp->codigo }}" role="tooltip"
                                    class="absolute z-10 invisible  text-center inline-block w-80 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                    {{ $item->orp->producto->nombre }}</div>
                            @endforeach

                        </td>
                        <td class="px-1 py-2 text-center" nowrap>
                            @foreach ($analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $item)
                                <p>{{ $item->preparacion }}</p>
                            @endforeach

                        </td>
                        <td class="px-1 py-2 text-center" nowrap>
                            {{ $analisis->solicitudAnalisisLinea->estadoPlanta->origen->alias }}
                        </td>
                        <td class="px-1 py-2 text-center" nowrap>
                            @if ($analisis->solicitudAnalisisLinea->estadoPlanta->etapa)
                                {{ $analisis->solicitudAnalisisLinea->estadoPlanta->etapa->nombre }}
                            @endif
                        </td>






                        <td class="text-center px-1 py-2 @if ($parametroLinea && $analisis->temperatura !== null) {{ $analisis->temperatura >= $parametroLinea->temperatura_min && $analisis->temperatura <= $parametroLinea->temperatura_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->temperatura / 1 }} [°C]
                        </td>

                        <td class="px-1 text-center py-2 @if ($parametroLinea && $analisis->ph !== null) {{ $analisis->ph >= $parametroLinea->ph_min && $analisis->ph <= $parametroLinea->ph_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->ph / 1 }}
                        </td>

                        <td class="px-1 py-2 @if ($parametroLinea && $analisis->acidez !== null) {{ $analisis->acidez >= $parametroLinea->acidez_min && $analisis->acidez <= $parametroLinea->acidez_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->acidez / 1 }} [%]
                        </td>

                        <td class="px-1 py-2 @if ($parametroLinea && $analisis->brix !== null) {{ $analisis->brix >= $parametroLinea->brix_min && $analisis->brix <= $parametroLinea->brix_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->brix / 1 }} [°Bx]
                        </td>

                        <td class="px-1 text-center py-2 @if ($parametroLinea && $analisis->viscosidad !== null) {{ $analisis->viscosidad >= $parametroLinea->viscosidad_min && $analisis->viscosidad <= $parametroLinea->viscosidad_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->viscosidad / 1 }}
                        </td>

                        <td class="px-1 text-center py-2 @if ($parametroLinea && $analisis->densidad !== null) {{ $analisis->densidad >= $parametroLinea->densidad_min && $analisis->densidad <= $parametroLinea->densidad_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->densidad / 1 }}
                        </td>
                        <td class="px-1 text-center py-2" nowrap>
                            @if ($analisis->color == 1)
                                <p class="text-green-500">Si</p>
                            @else
                                <p class="text-red-500">No</p>
                            @endif
                        </td>
                        <td class="px-1 text-center py-2" nowrap>
                            @if ($analisis->olor == 1)
                                <p class="text-green-500">Si</p>
                            @else
                                <p class="text-red-500">No</p>
                            @endif
                        </td>
                        <td class="px-1 text-center py-2" nowrap>
                            @if ($analisis->sabor == 1)
                                <p class="text-green-500">Si</p>
                            @else
                                <p class="text-red-500">No</p>
                            @endif
                        </td>




                        <td class="px-1 py-2 text-center" nowrap>
                            {{ $analisis->solicitudAnalisisLinea->user->codigo }}
                        </td>
                        <td class="px-1 py-2" nowrap>
                            @if ($analisis->user)
                                {{ $analisis->user->codigo }}
                            @endif
                        </td>


                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>
    @if (!$aplicandoFiltros)
        @if (auth()->user()->rol == 'FQ')
        @else
            <div>
                {{ $calidades->links('pagination::tailwind') }}
            </div>
        @endif
    @endif
    {{-- <div wire:loading>
        <div
            class="fixed inset-0 flex items-center justify-center bg-gray-50 bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75 z-50">
            <div role="status">
                <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div> --}}

</div>
