<div>
@livewire('calendario.form')
@livewire('calendario.index')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')">
                        código
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('nombre')">
                        nombre
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('telefono')">
                        telefono
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('correo')">
                        correo
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('rol')">
                        rol
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        planta
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        división
                    </th>

                    <th scope="col" class=" gap-2 px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">
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
                            <input type="number" wire:model.live='f_telefono' placeholder="Filtrar por Telefono"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="email" wire:model.live='f_correo' placeholder="Filtrar por Correo"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_rol' placeholder="Filtrar por Rol"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_planta' placeholder="Filtrar por Planta"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_division' placeholder="Filtrar por División"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>

                    </tr>
                @endif
                @foreach ($usuarios as $usuario)
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $usuario->codigo }}
                        </th>
                        <td class="px-2 py-2" nowrap>
                            {{ $usuario->nombre }} {{ $usuario->apellido }}
                        </td>
                        <td class="px-2 py-2">
                            {{ $usuario->telefono }}
                        </td>
                        <td class="px-2 py-2">
                            {{ $usuario->correo }}
                        </td>
                        <td class="px-2 py-2">
                            {{ $usuario->role->name }}
                        </td>
                        <td class="px-2 py-2">
                            {{ $usuario->planta->nombre }}
                        </td>
                        <td class="px-2 py-2">
                            {{ $usuario->division->nombre }}
                        </td>
                        <td class="flex items-center px-2 py-2 gap-2">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 4)->where('permiso_id', 3)->isNotEmpty())

                            <svg onclick="Livewire.dispatch('openModal', { component: 'usuario-component.editar', arguments: { id: {{ $usuario->id }} } })"
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                                viewBox="0 0 512 512">
                                <path
                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 4)->where('permiso_id', 4)->isNotEmpty())
                                <svg onclick="Livewire.dispatch('openModal', { component: 'usuario-component.eliminar', arguments: { id: {{ $usuario->id }} } })"
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
