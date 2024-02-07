<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold ">Crear almacen</h2>
    <div>
        <form wire:submit="save" novalidate>
            @csrf
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" wire:model="codigo" id="codigo"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="codigo"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Código
                    </label>
                    @error('codigo')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>

            </div>
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" wire:model="nombre" id="nombre"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="nombre"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre
                    </label>
                    @error('nombre')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" wire:model="alias" id="alias"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="alias"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">alias
                    </label>
                    @error('alias')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex">
                <div class="w-full px-3 mb-5">
                    <button type="submit"
                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>