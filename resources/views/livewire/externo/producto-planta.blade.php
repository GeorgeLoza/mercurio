<div class="flex gap-2">
    <div class="w-1/4 "><!-- Formulario de creación/actualización -->
        <form wire:submit.prevent="{{ $productoId ? 'update' : 'create' }}" novalidate>
            <div class="relative z-0 w-full mb-5 group">

                <input type="text" wire:model="nombre" id="nombre"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="nombre"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre:</label>
                @error('nombre')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <!--contiene envase, peso, y unidad habilitar cuando se NECESARIO-->
            <div class="hidden">
                <div class=" w-full mb-5 group">
                    <label for="envase"
                        class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400  peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Envase:</label>

                    <select id="envase" name="envase" wire:model="envase"
                        class="block py-2 px-0 w-full  text-sm text-gray-500 dark:text-gray-400 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option class="dark:bg-gray-800" selected>Seleccione el envase en caso de
                            ser un producto
                        </option>
                        <option class="dark:bg-gray-800" value="BOOP">BOOP</option>
                        <option class="dark:bg-gray-800" value="BOPP">BOPP</option>
                        <option class="dark:bg-gray-800" value="BOPMET">BOPMET</option>
                        <option class="dark:bg-gray-800" value="PEBD">PEBD</option>
                        <option class="dark:bg-gray-800" value="PET">PET</option>
                        <option class="dark:bg-gray-800" value="PP">PP</option>
                        <option class="dark:bg-gray-800" value="PP-BOPP">PP-BOPP</option>
                        <option class="dark:bg-gray-800" value="PP - PEBD">PP - PEBD</option>
                    </select>
                    @error('envase')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <label for="neto"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Neto:</label>
                    <input type="text" wire:model="neto" id="neto"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" ">
                    @error('neto')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <label for="unidad"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Unidad:</label>
                    <input type="text" wire:model="unidad" id="unidad"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" ">
                    @error('unidad')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit"
                class="py-1 px-3 text-white bg-green-600 rounded-md">{{ $productoId ? 'Actualizar' : 'Crear' }}</button>
            <button type="button" wire:click="resetFields"
                class="py-1 px-3 text-white bg-blue-600 rounded-md">Reset</button>
        </form>
    </div>

    <div class="w-3/4 "><!-- Lista de productos -->
        <table class="w-full text-xs text-center rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center ">
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">#</th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Nombre</th>
                    <!--quitar hidden cuando se use estos campos-->
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700 hidden">Envase</th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700 hidden">Neto</th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700 hidden">Unidad</th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Planta</th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productosPlanta as $producto)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <!--quitar hidden cuando se use estos campos-->
                        <td class="hidden">{{ $producto->envase }}</td>
                        <td class="hidden">{{ $producto->neto }}</td>
                        <td class="hidden">{{ $producto->unidad }}</td>
                        <td>{{ $producto->planta->nombre }}</td>
                        <td class="flex gap-2">
                            <button wire:click="edit({{ $producto->id }})" class=""><svg
                                    xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg></button>
                            <button wire:click="delete({{ $producto->id }})" class=""><svg
                                    xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-red-600 dark:fill-red-500"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                </svg></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
