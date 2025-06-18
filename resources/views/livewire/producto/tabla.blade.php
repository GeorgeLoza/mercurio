<div>
    <button class="bg-green-500 p-2 text-center rounded-md " wire:click="exportarExcel">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-5 w-5 fill-white">
            <path
                d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z" />
        </svg>
    </button>

    <button class="bg-red-500 p-2 text-center rounded-md " wire:click="generatePDF">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
            <path
                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
        </svg>
    </button>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')">
                        código
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('nombre')">
                        nombre
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('cantidad')">
                        cantidad
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('unidad')">
                        unidad
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('empaque')">
                        empaque
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        categoría
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        destino
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        Parámetro
                    </th>

                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        Norma
                    </th>


                    <th scope="col" class=" gap-2 px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
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
                @if ($filtro == true)
                    <!-- fila de filtros -->
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th class="p-1">
                            <input type="text" wire:model.live='f_codigo' placeholder="Filtrar por Código"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_nombre' placeholder="Filtrar por Nombre"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="number" wire:model.live='f_cantidad' placeholder="Filtrar por Cantidad"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_unidad' placeholder="Filtrar por Unidad"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_empaque' placeholder="Filtrar por Empaque"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_categoriaProducto'
                                placeholder="Filtrar por Categoría"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_destinoProducto' placeholder="Filtrar por Destino"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th></th>
                        <th></th>
                        <th class="p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" wire:click="limpiarFiltros" viewBox="0 0 576 512"
                                class="h-5 w-5 fill-green-600 dark:fill-green-500">
                                <path
                                    d="M290.7 57.4L57.4 290.7c-25 25-25 65.5 0 90.5l80 80c12 12 28.3 18.7 45.3 18.7H288h9.4H512c17.7 0 32-14.3 32-32s-14.3-32-32-32H387.9L518.6 285.3c25-25 25-65.5 0-90.5L381.3 57.4c-25-25-65.5-25-90.5 0zM297.4 416H288l-105.4 0-80-80L227.3 211.3 364.7 348.7 297.4 416z" />
                            </svg>
                        </th>
                    </tr>
                @endif
                @foreach ($productos as $producto)
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $producto->codigo }}
                        </th>
                        <td class="px-2 py-1 max-w-xs overflow-x-auto" nowrap>
                            <div class="whitespace-nowrap" data-popover-target="popover-{{ $producto->id }}">
                                {{ Str::limit($producto->nombre, 40) }}</div>
                            <div data-popover id="popover-{{ $producto->id }}" role="tooltip"
                                class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                {{ $producto->nombre }}</div>

                        </td>
                        <td class="px-2 py-1">
                            {{ $producto->cantidad }}
                        </td>
                        <td class="px-2 py-1">
                            @if ($producto->unidad != null)
                                {{ $producto->unidad->nombre }}
                            @endif
                        </td>
                        <td class="px-2 py-1">
                            {{ $producto->empaque }}
                        </td>
                        <td class="px-2 py-1" nowrap>
                            @if ($producto->categoriaProducto != null)
                                {{ $producto->categoriaProducto->nombre }}
                            @endif
                        </td>
                        <td class="px-2 py-1" nowrap>
                            @if ($producto->destinoProducto != null)
                                {{ $producto->destinoProducto->nombre }}
                            @endif
                        </td>
                        <td class="px-2 py-1 flex gap-2" nowrap>
                            @if (count($producto->parametroLinea) >= 1)
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                    viewBox="0 0 512 512">

                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-600 h-5 w-5"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                                </svg>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" onclick="Livewire.dispatch('openModal', { component: 'parametro.parametroProducto', arguments: { producto_id: {{ $producto->id }} } })"
                                    viewBox="0 0 512 512" class="h-4 w-4 fill-blue-600 dark:fill-blue-500">
                                    <path
                                        d="M177.9 494.1c-18.7 18.7-49.1 18.7-67.9 0L17.9 401.9c-18.7-18.7-18.7-49.1 0-67.9l50.7-50.7 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 41.4-41.4 48 48c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-48-48 50.7-50.7c18.7-18.7 49.1-18.7 67.9 0l92.1 92.1c18.7 18.7 18.7 49.1 0 67.9L177.9 494.1z" />
                                </svg>
                        </td>
                        <td class="px-2 py-1" nowrap>
                            {{ $producto->norma }}
                        </td>
                        <td class="flex items-center px-2 py-1 gap-2">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 7)->where('permiso_id', 3)->isNotEmpty())
                                <svg onclick="Livewire.dispatch('openModal', { component: 'producto.editar', arguments: { id: {{ $producto->id }} } })"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-20 fill-blue-600 dark:fill-blue-500" viewBox="0 0 512 512">
                                    <path
                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg>
                            @endif

                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 7)->where('permiso_id', 4)->isNotEmpty())
                                <svg onclick="Livewire.dispatch('openModal', { component: 'producto.eliminar', arguments: { id: {{ $producto->id }} } })"
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


    <div>
        {{ $productos->links() }}
    </div>

</div>
