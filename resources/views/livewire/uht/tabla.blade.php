<div wire:poll.10s>
    <div class="flex justify-end mb-2 gap-2">



    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-2xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-2xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-1 py-0 sticky top-0 left-0 z-30 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')">
                        ORP
                    </th>
                    {{-- fecha --}}
                    <th scope="col"
                        class="px-3 py-1 sticky top-0 left-0 z-30 bg-white dark:bg-gray-700 overflow-x-auto"
                        wire:click="sortBy('tiempo_elaboracion')">
                        fecha
                    </th>
                    {{--  --}}
                    <th scope="col" nowrap class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Código
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Nombre Producto
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Destino
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('lote')">
                        lote
                    </th>
                    {{-- categoria --}}

                    {{-- fin categoria --}}

                    <th scope="col" nowrap class="  px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('fecha_vencimiento1')">
                        Fecha Vencimiento
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700 "
                        wire:click="sortBy('estado')">
                        estado
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700 "
                        wire:click="sortBy('updated_at')">
                        Actualizado
                        <button wire:click="show_filtro">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-700 dark:fill-gray-300"
                                viewBox="0 0 512 512">
                                <path
                                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                            </svg>
                        </button>
                    </th>

                    <th scope="col" class=" hidden px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tiempo_elaboracion')">
                        Programación
                    </th>

                    <th scope="col" nowrap class=" hidden px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('fecha_vencimiento2')">
                        Fecha Vencimiento 2
                    </th>

                </tr>
            </thead>
            <tbody class="">
                @if ($filtro == true)
                    <!-- fila de filtros -->
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 sticky z-20 top-6">


                        <th class="sticky bg-gray-200 dark:bg-gray-800 p-1 left-0 z-30">
                            <input type="" wire:model.live='f_codigo' placeholder="Filtrar por Orp"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        {{-- filtro fecha --}}

                        <th class="sticky bg-gray-200 dark:bg-gray-800 p-1 left-0 z-30">
                            <input type="text" wire:model.live='f_tiempoElaboracion' placeholder="Filtrar por fecha"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        {{-- fin filtro fecha --}}
                        <th class="p-1">
                            <input type="text" wire:model.live='f_codigoProducto' placeholder="Filtrar por código"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_nombreProducto' placeholder="Filtrar por Nombre"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_destino' placeholder="Filtrar por Destino"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_lote' placeholder="Filtrar por Lote"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>



                        {{-- filtro categoria --}}


                        <th class="p-1">
                            <input type="text" wire:model.live='f_fechaVencimiento1'
                                placeholder="Filtrar por Vencimiento"
                                class="  block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        {{-- fin filtro categoria --}}
                        <th class="p-1 ">
                            <select wire:model.live='f_estado'
                                class="block  p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="" class="font-normal">Estado</option>
                                <option value="Pendiente"> Pendiente</option>
                                <option value="Programado"> Programado</option>
                                <option value="Cancelado"> Cancelado</option>
                                <option value="En proceso"> En proceso</option>
                                <option value="Completado"> Completado</option>
                            </select>
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_updated_at' placeholder="Filtrar por Actualizacion"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_tiempoElaboracion'
                                placeholder="Filtrar por Elaboración"
                                class=" hidden block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>

                        <th class="p-1">
                            <input type="text" wire:model.live='f_fechaVencimiento2'
                                placeholder="Filtrar por Vencimiento"
                                class=" hidden block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>




                    </tr>
                @endif
                @foreach ($orps as $orp)
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="sticky flex py-1  bg-white  p-1 left-0 z-10 px-1  font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50  dark:hover:bg-gray-600 rounded-lg">
                            <!--boton reporte ORP-->
                            <a target="_blank" href="{{ route('orp.report', ['id' => $orp->id]) }}"
                                class="rounded-md mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                            </a>
                            {{ $orp->codigo }}
                        </th>

                        <td class="px-0 overflow-x-auto" nowrap>
                            @if ($orp->tiempo_elaboracion)
                                {{ \Carbon\Carbon::parse($orp->tiempo_elaboracion)->isoFormat('DD-MM-YY HH:mm  ') }}
                            @endif
                        </td>

                        <td class="px-2 " nowrap>
                            {{ $orp->producto->codigo }}
                        </td>
                        <td class="px-1 overflow-x-auto  md:w-8 " nowrap>
                            <div class="whitespace-nowrap " data-popover-target="popover-{{ $orp->id }}">
                                {{ Str::limit($orp->producto->nombre, 35) }}</div>
                            <div data-popover id="popover-{{ $orp->id }}" role="tooltip"
                                class="absolute z-10 invisible  text-center inline-block w-auto text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800 px-1">
                            </div>

                        </td>
                        <td class="px-2 " nowrap>
                            @if ($orp->producto->destinoProducto)
                                {{ $orp->producto->destinoProducto->nombre }}
                            @endif
                        </td>
                        <td class="px-2 ">
                            {{ $orp->lote / 1 }}
                        </td>

                        <td class="px-2   ">


                            @if ($orp->fecha_vencimiento1)
                                {{ \Carbon\Carbon::parse($orp->fecha_vencimiento1)->isoFormat('DD-MM-YY') }}
                            @endif
                        </td>
                        <td class="px-2  " nowrap>

                            @if ($orp->estado == 'Pendiente')
                                <span
                                    class="flex items-center text-sm font-medium me-3 text-yellow-500 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-yellow-500  rounded-full me-1.5 flex-shrink-0 text-2xs"></span>{{ $orp->estado }}</span>
                            @endif

                            @if ($orp->estado == 'En proceso')
                                <span class="flex items-center text-sm font-medium me-3 text-blue-500 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-blue-600  rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif

                            @if ($orp->estado == 'Completado')
                                <span
                                    class="flex items-center text-sm font-medium me-3 text-green-500 uppercase "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif

                            @if ($orp->estado == 'Rechazado')
                                <span class="flex items-center text-sm font-medium me-3 text-red-500 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-red-500  rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif

                            @if ($orp->estado == 'Cancelado')
                                <span class="flex items-center text-sm font-medium me-3 text-red-600 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-red-600 rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif
                            @if ($orp->estado == 'Programado')
                                <span
                                    class="flex items-center text-sm font-medium me-3 text-purple-500 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-purple-600  rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif
                        </td>
                        <td class="px-2  border-r  ">
                            @if ($orp->updated_at)
                                {{ $orp->updated_at->isoFormat('DD-MM-YY') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="{{ $orp->revisado ? 'text-green-500' : 'text-red-500' }}">

                            {{ $orp->revisado ? 'Revisado' : 'No Revisado' }}
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 11)->where('permiso_id', 5)->isNotEmpty())
                                @if ($orp->estado == 'Completado' && !$orp->revisado)
                                    <button wire:click="revisar({{ $orp->id }})"
                                        wire:confirm="Se reviso el ORP {{ $orp->codigo }}?">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-10 fill-green-600 dark:fill-green-500" viewBox="0 0 448 512">
                                            <path
                                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                        </svg>
                                    </button>
                                @endif
                            @endif

                        </td>
                        <td class="px-2  hidden ">
                            {{ $orp->tiempo_elaboracion }}
                        </td>

                        <td class="px-2  hidden ">
                            {{ $orp->fecha_vencimiento2 }}
                        </td>


                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>

    <div>
        {{ $orps->links() }}
    </div>






</div>
