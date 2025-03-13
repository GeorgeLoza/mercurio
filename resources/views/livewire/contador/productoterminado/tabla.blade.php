<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-hidden">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-2 sticky top-0 bg-white dark:bg-gray-700">Código ORP</th>
                    <th class="px-6 py-2 sticky top-0 bg-white dark:bg-gray-700">Producto</th>
                    <th class="px-6 py-2 sticky top-0 bg-white dark:bg-gray-700">Cantidad Total</th>
                    <th class="px-6 py-2 sticky top-0 bg-white dark:bg-gray-700">Acciones

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
            <tbody>
                @if ($filtro == true)
                    <!-- fila de filtros -->
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th class="p-1">
                            <input type="text" wire:model.live='f_codigo' placeholder="Filtrar por Código"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_producto' placeholder="Filtrar por Producto"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>

                @endif
                @foreach ($orpAgrupadas as $orpId => $contadores)
                    @php
                        $orp = $contadores->first()->orp;
                        $completado = '';
                        // Filtrar los contadores cuyo tipo sea 'Total'
                        $contadoresTotales = $contadores->filter(function ($contador) {
                            return $contador->tipo === 'Total'; // Asegúrate de que 'tipo' sea el campo correcto
                        });
                        if ($contadoresTotales->isNotEmpty()) {
                            $completado = 'Completado'; // Si se encuentra un "Total", poner "Completado"

                        }
                        // Si no hay 'Total', filtrar por 'Total por turno' y 'Total para muestras'
                        if ($contadoresTotales->isEmpty()) {
                            $contadoresTotales = $contadores->filter(function ($contador) {
                                return $contador->tipo === 'Total Por Turno';
                            });
                        }

                        // Si no hay ninguno de los anteriores, tomar el último de tipo 'Parcial', asegurando que la colección esté ordenada
                        if ($contadoresTotales->isEmpty()) {
                            $ultimoParcial = $contadores
                                ->filter(function ($contador) {
                                    return $contador->tipo === 'Parcial';
                                })
                                ->sortByDesc('created_at')
                                ->first(); // Ordenamos por fecha (o el campo que corresponda)

                            $cantidadTotal = $ultimoParcial ? $ultimoParcial->cantidad : 0; // Si hay un 'Parcial', tomar su cantidad, si no, poner 0
                            $completado = ''; // No hay "Completado"
                        } else {
                            // Sumar la cantidad de los contadores filtrados
                            $cantidadTotal = $contadoresTotales->sum('cantidad');

                        }
                    @endphp

                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-1 font-light text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $orp->codigo }}
                        </td>
                        <td class="px-6 py-1 font-light text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $orp->producto->nombre }}
                        </td>
                        <td class="px-6 py-1 font-light text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $cantidadTotal }}
                            @if ($completado)
                                <span class="text-green-500 ml-2 font-bold " >{{ $completado }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-1 font-light text-gray-900 whitespace-nowrap dark:text-white flex gap-1">
                            <button wire:click="toggleOrp({{ $orpId }})"
                                class="px-4 py-1 bg-blue-500 text-white rounded">
                                {{ isset($orpExpandida[$orpId]) ? 'Ocultar' : 'Detalles' }}
                            </button>

                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 16)->where('permiso_id', 1)->isNotEmpty())
                                <button class="p-1 px-2 mr-2 ml-2 bg-green-500 rounded-md"
                                    onclick="Livewire.dispatch('openModal', { component: 'contador.productoterminado.agregar', arguments: { id: {{ $orp->id }} } })">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                    </svg>
                                </button>

                                <button type="button" data-dial-toggle="speed-dial-menu-bottom-right"
                                    aria-controls="speed-dial-menu-bottom-right" aria-expanded="false"
                                    class="flex items-center justify-center text-white bg-red-500 rounded-md p-1 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800"
                                    onclick="Livewire.dispatch('openModal', { component: 'contador.productoterminado.estado-orp', arguments: { id: {{ $orp->id }} } })">
                                    Finalizar
                                </button>
                            @endif
                        </td>
                    </tr>

                    @if (isset($orpExpandida[$orpId]))
                        <tr>
                            <td colspan="4" class="p-3 ">
                                <table
                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">Tiempo</th>
                                            <th class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">Tipo</th>
                                            <th class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">Cantidad</th>
                                            <th class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">Observaciones
                                            </th>
                                            <th class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contadores as $contador)
                                            <tr
                                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600  ">
                                                <td class="px-6 py-2">{{ $contador->tiempo }}</td>
                                                <td class="px-6 py-2">{{ $contador->tipo }}</td>
                                                <td class="px-6 py-2">{{ $contador->cantidad }}</td>
                                                <td class="px-6 py-2">{{ $contador->observaciones }}</td>
                                                <td class="flex gap-1 py-2  ">
                                                    @if (auth()->user()->id == $contador->user->id ||
                                                            auth()->user()->role->rolModuloPermisos->where('modulo_id', 16)->where('permiso_id', 3)->isNotEmpty())
                                                        <svg onclick="Livewire.dispatch('openModal', { component: 'contador.productoterminado.editar', arguments: { id: {{ $contador->id }} } })"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                        </svg>
                                                    @endif
                                                    @if (auth()->user()->id == $contador->user->id ||
                                                            auth()->user()->role->rolModuloPermisos->where('modulo_id', 16)->where('permiso_id', 4)->isNotEmpty())
                                                        <svg onclick="Livewire.dispatch('openModal', { component: 'contador.productoterminado.eliminar', arguments: { id: {{ $contador->id }} } })"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-4 w-4 fill-red-600 dark:fill-red-500"
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
                            </td>
                        </tr>
                    @endif
                @endforeach

            </tbody>
        </table>

    </div>

    <div class="mt-4">
        {{ $orpPaginator->links() }}
    </div>
</div>
