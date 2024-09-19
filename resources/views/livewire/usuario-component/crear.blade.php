<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold text-center  ">Crear Nuevo Usuario</h2>
    <div>
        <form wire:submit="save" novalidate>
            @csrf

            <div class="w-1/2 px-3 mb-5">
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

            <div class="md:flex ">
                <div class="md:w-1/2 px-3 mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" wire:model="nombre" id="nombre"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="nombre"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre
                            (s)</label>
                        @error('nombre')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" wire:model="apellido" id="apellido"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="apellido"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellidos</label>
                        @error('apellido')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="md:flex ">
                <div class="md:w-1/2 px-3 mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="phone" wire:model="telefono" id="telefono"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="telefono"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefono
                        </label>
                        @error('telefono')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" wire:model="correo" id="correo"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="correo"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo</label>
                        @error('correo')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="md:flex ">
                <div class="md:w-1/2 px-3 mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="rol"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rol</label>
                        <select id="rol" wire:model="rol"
                            class="block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                            <option value="Admi" class="bg-gray-100 dark:bg-gray-800">Administrador</option>
                            <option value="Jef" class="bg-gray-100 dark:bg-gray-800">Jefe de Area</option>
                            <option value="Sup" class="bg-gray-100 dark:bg-gray-800">Supervisor</option>
                            <option value="HTST" class="bg-gray-100 dark:bg-gray-800">HTST</option>
                            <option value="UHT" class="bg-gray-100 dark:bg-gray-800">UHT</option>
                            <option value="FQ" class="bg-gray-100 dark:bg-gray-800">Analista Fisicoquimico</option>
                            <option value="MB" class="bg-gray-100 dark:bg-gray-800">Analista Microbiologico</option>
                            <option value="Con" class="bg-gray-100 dark:bg-gray-800">Contador</option>
                            <option value="Ext" class="bg-gray-100 dark:bg-gray-800">Externo</option>
                        </select>
                        @error('rol')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="planta_id"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Planta</label>
                        <select id="planta_id" wire:model="planta_id"
                            class="block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                            @foreach ($plantas as $planta)
                            <option value="{{$planta->id}}" class="bg-gray-100 dark:bg-gray-800">{{$planta->nombre}}
                            </option>
                            @endforeach

                        </select>
                        @error('planta_id')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="division_id"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">División</label>
                        <select id="division_id" wire:model="division_id"
                            class="block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                            @foreach ($divisiones as $division)
                            <option value="{{$division->id}}" class="bg-gray-100 dark:bg-gray-800">{{$division->nombre}}
                            </option>
                            @endforeach

                        </select>
                        @error('division_id')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="md:flex">
                <div class="md:w-1/2 px-3 mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="password" wire:model="password" type="password" placeholder=" "
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <label for="password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        @error('password')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
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