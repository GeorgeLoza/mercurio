<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold ">Análisis Línea</h2>
    <div>
        <form wire:submit="update" novalidate>
            @csrf
            <!--temperatura-->

            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="temperatura" id="temperatura"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="temperatura"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Temperatura
                    </label>
                    @error('temperatura')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            @if($extra->solicitudAnalisisLinea->etapa->id != '2')
            <!--ph-->
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="ph" id="ph"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="ph"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">pH
                    </label>
                    @error('ph')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            @endif

            @if($extra->solicitudAnalisisLinea->etapa->id != '2')
            <!--acidez-->
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="acidez" id="acidez"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="acidez"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Acidez
                    </label>
                    @error('acidez')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            @endif


            <!--brix-->
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="brix" id="brix"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="brix"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Solidos
                        [brix]
                    </label>
                    @error('brix')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>

            @if($extra->solicitudAnalisisLinea->etapa->id == '4' || $extra->solicitudAnalisisLinea->etapa->id == '5')
            <!--viscosidad-->
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="viscosidad" id="viscosidad"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="viscosidad"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Viscosidad
                    </label>
                    @error('viscosidad')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            @endif
            @if($extra->solicitudAnalisisLinea->etapa->id == '8')
            <!--densidad-->
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="densidad" id="densidad"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="densidad"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Densidad
                    </label>
                    @error('densidad')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            @endif

            @if($extra->solicitudAnalisisLinea->etapa->id == '6' || $extra->solicitudAnalisisLinea->etapa->id == '8')
            <!--checkboxes color -olor -sabor-->
            <div class="flex gap-1 justify-around mb-3">

                <div class="flex items-center">
                    <input checked id="checked-checkbox" wire:model="color" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Color</label>
                </div>

                <div class="flex items-center">
                    <input checked id="checked-checkbox" wire:model="olor" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Olor</label>
                </div>

                <div class="flex items-center">
                    <input checked id="checked-checkbox" wire:model="sabor" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sabor</label>
                </div>
            </div>
            <!--fin checkboxes color -olor -sabor-->
            @endif
            @if($extra->solicitudAnalisisLinea->etapa->id == '8')
            <!--aspecto-->
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" wire:model="aspecto" id="aspecto"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="aspecto"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Aspecto
                    </label>
                    @error('aspecto')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            <!--peso-->
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="peso" id="peso"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="peso"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Peso
                    </label>
                    @error('peso')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            <!--volumen-->
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="volumen" id="volumen"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="volumen"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Volumen
                    </label>
                    @error('volumen')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            @endif
            <!--observaciones-->
            <div class=" px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" wire:model="observaciones" id="observaciones"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="observaciones"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Observaciones
                    </label>
                    @error('observaciones')
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