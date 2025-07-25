<div @if (auth()->user()->rol == 'FQ') wire:poll.10s @endif>
    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 20)->where('permiso_id', 2)->isNotEmpty())
        <div class="flex mb-2 gap-2">
            <a href="{{ route('leche_analisis.index') }}" class="px-2 bg-green-600 text-white rounded-md">
                Analisis de Leche
            </a>
            @if ($pendiente)
                <p class="bg-red-500 text-white p-1 rounded-md"> Tienes análisis de recepción de leche pendiente</p>
            @endif
        </div>
    @endif


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class=" w-full text-2xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">

            <thead class="text-2xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')">
                        ORP
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Hora
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
                        Estado
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        opciones
                        <button wire:click="show_filtro">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-700 dark:fill-gray-300"
                                viewBox="0 0 512 512">
                                <path
                                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                            </svg>
                        </button>

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
                        aspecto
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        peso
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        volumen
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        observaciones
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
                            <input type="text" wire:model.live='f_orp' placeholder="Filtrar por Orp"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th></th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_producto' placeholder="Filtrar por Nombre"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_preparacion' placeholder="Filtrar por Preparacion"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_origen' placeholder="Filtrar por Origen"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_etapa' placeholder="Filtrar por Etapa"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_estado' placeholder="Filtrar por Estado"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <th scope="row"
                            class="px-1 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @foreach ($analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $item)
                                <p>{{ $item->orp->codigo }}</p>
                            @endforeach

                        </th>
                        <td class="px-3 py-1" nowrap>
                            @if ($analisis->solicitudAnalisisLinea->tiempo)
                                {{ \Carbon\Carbon::parse($analisis->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            @endif
                            -
                            @if ($analisis->tiempo)
                                {{ \Carbon\Carbon::parse($analisis->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            @endif

                        </td>
                        <td class="px-1 py-1" nowrap>
                            @foreach ($analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $item)
                                <div class="whitespace-nowrap" data-popover-target="popover-{{ $item->orp->codigo }}">
                                    {{ Str::limit($item->orp->producto->nombre, 50) }}</div>
                                <div data-popover id="popover-{{ $item->orp->codigo }}" role="tooltip"
                                    class="absolute z-10 invisible  text-center inline-block w-80 text-2xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                    {{ $item->orp->producto->nombre }}</div>
                            @endforeach

                        </td>
                        <td class="px-1 py-1 text-center" nowrap>
                            @foreach ($analisis->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $item)
                                <p>{{ $item->preparacion }}</p>
                            @endforeach

                        </td>
                        <td class="px-1 py-1 text-center" nowrap>
                            {{ $analisis->solicitudAnalisisLinea->estadoPlanta->origen->alias }}
                        </td>
                        <td class="px-1 py-1 text-center" nowrap>
                            @if ($analisis->solicitudAnalisisLinea->estadoPlanta->etapa)
                                {{ $analisis->solicitudAnalisisLinea->estadoPlanta->etapa->nombre }}
                            @endif
                        </td>
                        <td class="px-6 py-1" nowrap>
                            @if ($analisis->solicitudAnalisisLinea->estado == 'Pendiente')
                                <span class="flex items-center text-2xs font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $analisis->solicitudAnalisisLinea->estado }}</span>
                            @endif

                            @if ($analisis->solicitudAnalisisLinea->estado == 'En proceso')
                                <span class="flex items-center text-2xs font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0"></span>{{ $analisis->solicitudAnalisisLinea->estado }}</span>
                            @endif

                            @if ($analisis->solicitudAnalisisLinea->estado == 'Completado')
                                <span class="flex items-center text-2xs font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $analisis->solicitudAnalisisLinea->estado }}</span>
                            @endif

                            @if ($analisis->solicitudAnalisisLinea->estado == 'Rechazado')
                                <span class="flex items-center text-2xs font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-red-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $analisis->solicitudAnalisisLinea->estado }}</span>
                            @endif

                            @if ($analisis->solicitudAnalisisLinea->estado == 'Cancelado')
                                <span class="flex items-center text-2xs font-medium me-3"><span
                                        class="flex w-2.5 h-2.5 bg-red-600 rounded-full me-1.5 flex-shrink-0"></span>{{ $analisis->solicitudAnalisisLinea->estado }}</span>
                            @endif
                        </td>

                        <td class="flex items-center justify-center px-1 py-1 gap-4 " nowrap>
                            {{-- @if ($analisis->solicitudAnalisisLinea->estadoPlanta->etapa == 'Envasado' || $analisis->solicitudAnalisisLinea->estadoPlanta->etapa == 'Pasteurizado' || $analisis->solicitudAnalisisLinea->estadoPlanta->etapa == 'Inoculación' || auth()->user()->division->nombre == 'Calidad' || auth()->user()->division->nombre == 'Calidad') --}}

                            @if (now()->diffInMinutes($analisis->created_at) < 240 &&
                                    auth()->user()->role->rolModuloPermisos->where('modulo_id', 15)->where('permiso_id', 3)->isNotEmpty())
                                <svg onclick="Livewire.dispatch('openModal', { component: 'analisis-linea.analisis.editar', arguments: { id: {{ $analisis->id }} } })"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-3 w-3 fill-blue-600 dark:fill-blue-500" viewBox="0 0 512 512">
                                    <path
                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg>

                               {{-- <svg class="h-4 w-4 mr-1"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M64 32C28.7 32 0 60.7 0 96L0 256 0 416c0 35.3 28.7 64 64 64l224 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L64 416l0-128 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L64 224 64 96l224 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L64 32z"/></svg> --}}

                                @endif
                            {{-- @endif --}}


                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 15)->where('permiso_id', 4)->isNotEmpty())
                                <svg onclick="Livewire.dispatch('openModal', { component: 'analisis-linea.analisis.eliminar', arguments: { id: {{ $analisis->id }} } })"
                                    xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 fill-red-600 dark:fill-red-500"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                </svg>
                            @endif

                        </td>

                        <td class="px-1 py-1 @if ($parametroLinea && $analisis->temperatura !== null) {{ $analisis->temperatura >= $parametroLinea->temperatura_min && $analisis->temperatura <= $parametroLinea->temperatura_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->temperatura / 1 }} [°C]
                        </td>

                        <td class="px-1 py-1 @if ($parametroLinea && $analisis->ph !== null) {{ $analisis->ph >= $parametroLinea->ph_min && $analisis->ph <= $parametroLinea->ph_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->ph / 1 }}
                        </td>

                        <td class="px-1 py-1 @if ($parametroLinea && $analisis->acidez !== null) {{ $analisis->acidez >= $parametroLinea->acidez_min && $analisis->acidez <= $parametroLinea->acidez_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->acidez / 1 }} [%]
                        </td>

                        <td class="px-1 py-1 @if ($parametroLinea && $analisis->brix !== null) {{ $analisis->brix >= $parametroLinea->brix_min && $analisis->brix <= $parametroLinea->brix_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->brix / 1 }} [°Bx]
                        </td>

                        <td class="px-1 py-1 @if ($parametroLinea && $analisis->viscosidad !== null) {{ $analisis->viscosidad >= $parametroLinea->viscosidad_min && $analisis->viscosidad <= $parametroLinea->viscosidad_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->viscosidad / 1 }}
                        </td>

                        <td class="px-1 py-1 @if ($parametroLinea && $analisis->densidad !== null) {{ $analisis->densidad >= $parametroLinea->densidad_min && $analisis->densidad <= $parametroLinea->densidad_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $analisis->densidad / 1 }}
                        </td>
                        <td class="px-1 py-1" nowrap>
                            @if ($analisis->color == 1)
                                <p class="text-green-500">Si</p>
                            @else
                                <p class="text-red-500">No</p>
                            @endif
                        </td>
                        <td class="px-1 py-1" nowrap>
                            @if ($analisis->olor == 1)
                                <p class="text-green-500">Si</p>
                            @else
                                <p class="text-red-500">No</p>
                            @endif
                        </td>
                        <td class="px-1 py-1" nowrap>
                            @if ($analisis->sabor == 1)
                                <p class="text-green-500">Si</p>
                            @else
                                <p class="text-red-500">No</p>
                            @endif
                        </td>
                        <td class="px-1 py-1" nowrap>
                            {{ $analisis->aspecto }}
                        </td>
                        <td class="px-1 py-1" nowrap>
                            {{ $analisis->peso }}
                        </td>
                        <td class="px-1 py-1" nowrap>
                            {{ $analisis->volumen }}
                        </td>
                        <td class="px-1 py-1" nowrap>
                            {{ $analisis->observaciones }}
                        </td>
                        <td class="px-1 py-1 text-center" nowrap>
                            {{ $analisis->solicitudAnalisisLinea->user->nombre }}
                            {{ $analisis->solicitudAnalisisLinea->user->apellido }}
                        </td>
                        <td class="px-1 py-1" nowrap>
                            @if ($analisis->user)
                                {{ $analisis->user->nombre }}
                                {{ $analisis->user->apellido }}
                            @endif
                        </td>


                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>


    <div>
        {{ $calidades->links() }}
    </div>



</div>
