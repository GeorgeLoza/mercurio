<div>
    <div>

        <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold ">Actualizar usuario</h2>
        <div>
            <form wire:submit="update" novalidate>
                @csrf

                <div class="md:flex ">
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="nombre" id="nombre" disabled
                                class=" block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="nombre"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre
                                (s)</label>
                            @error('nombre')
                                <p class="text-red-500 text-xs">* {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="apellido" id="apellido" disabled
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="apellido"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellidos</label>
                            @error('apellido')
                                <p class="text-red-500 text-xs">* {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="md:flex items-center">
                    <div class="md:w-1/2 px-3 mb-5 hidden">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="phone" wire:model="telefono" id="telefono"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="telefono"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefono
                            </label>
                            @error('telefono')
                                <p class="text-red-500 text-xs">* {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3 mb-5 hidden">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" wire:model="correo" id="correo"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="correo"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo</label>
                            @error('correo')
                                <p class="text-red-500 text-xs">* {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="ml-3 mr-3 text-gray-500 dark:text-gray-400 text-xs">
                        Selcciona un color para tu avatar:
                    </div>
                    <div class="flex items-center space-x-3">
                        <input type="color" wire:model="color" class="h-12 w-20 border rounded">
                        {{-- <span class="px-3 py-1 rounded text-white" style="background-color: {{ $color }}">
                            {{ $color }}
                        </span> --}}




                    </div>

                    <div class="ml-3 mr-3 text-gray-500 dark:text-gray-400 text-xs">
                        Pintar toda la bara:
                    </div>
                    <input type="checkbox" wire:model="barra" class="h-5 w-5 border rounded">

                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model='password' id="password" name="password" type="password" placeholder=" "
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <label for="password"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nueva
                                contraseña</label>
                            @error('password')
                                <p class="text-red-500 text-xs">* {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input wire:model='password_confirmation' id="password_confirmation"
                                name="password_confirmation" type="password" placeholder=" "
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <label for="password_confirmation"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Repetir
                                nueva contraseña</label>
                        </div>
                    </div>
                </div>




                <div class="flex">
                    <div class="w-full px-3 mb-5">
                        <button type="submit"
                            class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">ACTUALIZAR</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
