<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        codigo
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        dispositivo
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        marca
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        modelo
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        area de uso
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        capacidad
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        rango de uso
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        baja
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        responsable
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
                        <input type="text" wire:model.live='f_dispositivo' placeholder="Filtrar por dispositivo"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_codigo' placeholder="Filtrar por código"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_marca' placeholder="Filtrar por marca"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_modelo' placeholder="Filtrar por modelo"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_areaUso' placeholder="Filtrar por área de uso"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_responsable' placeholder="Filtrar por responsable"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th></th>

                </tr>
                @foreach ($dispositivos as $dispositivo)
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $dispositivo->codigo }}
                        </th>
                        <td class="px-6 py-2">
                            {{ $dispositivo->dispositivo }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $dispositivo->marca }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $dispositivo->modelo }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $dispositivo->areaUso }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $dispositivo->capacidadMedicion }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $dispositivo->rangoUso }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $dispositivo->baja }}
                        </td>
                        <td class="px-6 py-2">
                            {{ $dispositivo->responsable }}
                        </td>

                        <td class="flex items-center px-6 py-2 gap-2">

                            <svg onclick="Livewire.dispatch('openModal', { component: 'dispositivo.editar', arguments: { id: {{ $dispositivo->id }} } })"
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                                viewBox="0 0 512 512">
                                <path
                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg>


                            <svg onclick="Livewire.dispatch('openModal', { component: 'dispositivo.eliminar', arguments: { id: {{ $dispositivo->id }} } })"
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-red-600 dark:fill-red-500"
                                viewBox="0 0 448 512">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                            </svg>

                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>

</div>
