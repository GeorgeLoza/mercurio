<div class="flex gap-2">
    <div class="w-2/5 p-2 rounded-lg border bg-white dark:bg-gray-800">
        <h2 class="text-center font-semibold uppercase">agregar nueva informacion</h2>
        <div>
            <form wire:submit.prevent="save" class="max-w-md mx-auto">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" id="procedencia" wire:model="procedencia"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="">
                    <label for="procedencia"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Procedencia</label>
                    @error('procedencia')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" id="direccion" wire:model="direccion"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="">
                    <label for="direccion"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dirección</label>
                    @error('direccion')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" id="abreviatura" wire:model="abreviatura"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="">
                    <label for="abreviatura"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Abreviatura</label>
                    @error('abreviatura')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    
                    <label for="user_id" class="sr-only">Underline select</label>
                    <select id="user_id" wire:model="user_id"
                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>Escoje un usuario</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                        @endforeach
                    </select>
                        <op @error('user_id') <span class="error">{{ $message }}</span> @enderror </div>

                            <button class="bg-green-500 text-white px-2 py-1 rounded-lg"
                                type="submit">{{ $selectedId ? 'Actualizar' : 'Crear' }}</button>
            </form>

        </div>
    </div>
    <div class="w-3/5 relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        Procedencia
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        direccion
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        abreviatura
                    </th>

                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        encargado
                    </th>
                    <th scope="col" class=" gap-2 px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
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
                @foreach ($informaciones as $informacion)
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-2" nowrap>
                            {{ $informacion->procedencia }}
                        </td>
                        <td class="px-6 py-2" nowrap>
                            {{ $informacion->direccion }}
                        </td>
                        <td class="px-6 py-2" nowrap>
                            {{ $informacion->abreviatura }}
                        </td>
                        <td class="px-6 py-2" nowrap>
                            {{ $informacion->user->nombre }} {{ $informacion->user->apellido }}
                        </td>

                        <td class="flex items-center px-6 py-2 gap-2">

                            <svg wire:click="edit({{ $informacion->id }})" xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-20 fill-blue-600 dark:fill-blue-500" viewBox="0 0 512 512">
                                <path
                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg>

                            <svg onclick="Livewire.dispatch('openModal', { component: 'informacion.eliminar', arguments: { id: {{ $informacion->id }} } })"
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
