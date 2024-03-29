<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')">
                        ORP
                    </th>
                    <th scope="col" nowrap class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        Código Producto
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        Nombre Producto
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('lote')">
                        lote
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('estado')">
                        estado
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tiempo_elaboracion')">
                        Programación
                    </th>
                    <th scope="col" nowrap class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('fecha_vencimiento1')">
                        Fecha Vencimiento 1
                    </th>
                    <th scope="col" nowrap class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('fecha_vencimiento2')">
                        Fecha Vencimiento 2
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

                </tr>
            </thead>
            <tbody class="">
                @if($filtro == true)
                <!-- fila de filtros -->
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th class="p-1">
                        <input type="text" wire:model.live='f_codigo' placeholder="Filtrar por Orp"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_producto' placeholder="Filtrar por código"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="number" wire:model.live='f_productoCodigo' placeholder="Filtrar por Nombre"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_lote' placeholder="Filtrar por Lote"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_estado' placeholder="Filtrar por Estado"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_tiempoElaboracion' placeholder="Filtrar por Elaboración"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_fechaVencimiento1' placeholder="Filtrar por Vencimiento"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_fechaVencimiento2' placeholder="Filtrar por Vencimiento"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                </tr>
                @endif
                @foreach ($orps as $orp)
                <tr
                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$orp->codigo}}
                    </th>
                    <td class="px-6 py-2" nowrap>
                        {{$orp->producto->codigo}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        {{$orp->producto->nombre}}
                    </td>
                    <td class="px-6 py-2">
                        {{$orp->lote/1}}
                    </td>
                    <td class="px-6 py-2" nowrap>

                        @if($orp->estado == 'Pendiente')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0"></span>{{$orp->estado}}</span>
                        @endif

                        @if($orp->estado == 'En proceso')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0"></span>{{$orp->estado}}</span>
                        @endif

                        @if($orp->estado == 'Completado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{$orp->estado}}</span>
                        @endif

                        @if($orp->estado == 'Rechazado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-red-500 rounded-full me-1.5 flex-shrink-0"></span>{{$orp->estado}}</span>
                        @endif

                        @if($orp->estado == 'Cancelado')
                        <span class="flex items-center text-sm font-medium me-3"><span
                                class="flex w-2.5 h-2.5 bg-red-600 rounded-full me-1.5 flex-shrink-0"></span>{{$orp->estado}}</span>
                        @endif
                    </td>
                    <td class="px-6 py-2">
                        {{$orp->tiempo_elaboracion}}
                    </td>
                    <td class="px-6 py-2">
                        {{$orp->fecha_vencimiento1}}
                    </td>
                    <td class="px-6 py-2">
                        {{$orp->fecha_vencimiento2}}
                    </td>
                    <td class="flex items-center px-6 py-2 gap-2">
                        <!--boton para cancelar-->
                        <button class="p-2 rounded-md " wire:click="cancelar({{$orp->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 h-5 w-5" viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                            </svg>
                        </button>
                        <!--boton para cambiar estado en proceso-->
                        <button class="p-2 rounded-md " wire:click="iniciar({{$orp->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                viewBox="0 0 512 512">

                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                            </svg>
                        </button>

                        <svg onclick="Livewire.dispatch('openModal', { component: 'orp.editar', arguments: { id: {{ $orp->id}} } })"
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                            viewBox="0 0 512 512">
                            <path
                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                        </svg>
                        @if(in_array(auth()->user()->rol, ['Admi']))
                        <svg onclick="Livewire.dispatch('openModal', { component: 'orp.eliminar', arguments: { id: {{ $orp->id}} } })"
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-red-600 dark:fill-red-500"
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