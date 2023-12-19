<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold ">CREAR NUEVO PARAMETRO</h2>
    <div>
        <form wire:submit="save" novalidate>
            @csrf

            <div class="">
                <!--div de produto-->
                <div class="px-3 mb-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="producto_id"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Producto</label>
                        <select id="producto_id" wire:model="producto_id"
                            class=" block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opcion</option>
                            @foreach ($productos as $producto)
                            <option value="{{$producto->id}}" class="bg-gray-100 dark:bg-gray-800">
                                {{$producto->codigo}} - {{$producto->nombre}}
                            </option>
                            @endforeach
                        </select>
                        @error('producto_id')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
                    <!--div de etapa -->
                    <div class="px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <label for="etapa_id"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Etapa</label>
                            <select id="etapa_id" wire:model="etapa_id"
                                class=" block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opcion</option>
                                @foreach ($etapas as $etapa)
                                <option value="{{$etapa->id}}" class="bg-gray-100 dark:bg-gray-800">
                                    {{ $etapa->nombre }}
                                </option>
                                @endforeach
                            </select>
                            @error('etapa_id')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                  
                <!--div de temperatura -->
                <label class=" text-gray-500 dark:text-gray-400 ">Temperatura</label>
                <div class="md:flex">
                    <!--div de temperatura min-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="temperatura_min" id="temperatura_min"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="temperatura_min"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Min</label>
                            @error('temperatura_min')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <!--div de temperatura max-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="temperatura_max" id="temperatura_max"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="temperatura_max"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Max</label>
                            @error('temperatura_max')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!--div de ph -->
                <label class=" text-gray-500 dark:text-gray-400 ">Ph</label>
                <div class="md:flex">
                    <!--div de ph min-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="ph_min" id="ph_min"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="ph_min"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min</label>
                            @error('ph_min')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <!--div de ph max-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="ph_max" id="ph_max"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="ph_max"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max</label>
                            @error('ph_max')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!--div de Acidez -->
                <label class=" text-gray-500 dark:text-gray-400 ">Acidez</label>
                <div class="md:flex">
                    <!--div de acidez min-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="acidez_min" id="acidez_min"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="acidez_min"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min</label>
                            @error('acidez_min')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!--div de acidez max-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="acidez_max" id="acidez_max"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="acidez_max"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max</label>
                            @error('acidez_max')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!--div de Brix -->
                <label class=" text-gray-500 dark:text-gray-400 ">Brix</label>
                <div class="md:flex">
                    <!--div de Brix min-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="brix_min" id="brix_min"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="brix_min"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min</label>
                            @error('brix_min')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!--div de Brix max-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="brix_max" id="brix_max"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="brix_max"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max</label>
                            @error('brix_max')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!--div de Viscosidad -->
                <label class=" text-gray-500 dark:text-gray-400 ">Viscosidad</label>
                <div class="md:flex">
                    <!--div de Viscosidad min-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="viscosidad_min" id="viscosidad_min"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="viscosidad_min"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min</label>
                            @error('viscosidad_min')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!--div de Viscosidad max-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="viscosidad_max" id="viscosidad_max"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="viscosidad_max"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max</label>
                            @error('viscosidad_max')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                <!--div de Densidad -->
                <label class=" text-gray-500 dark:text-gray-400 ">Densidad</label>
                <div class="md:flex">
                    <!--div de densidad min-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="densidad_min" id="densidad_min"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="densidad_min"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min</label>
                            @error('densidad_min')
                            <p class="text-red-500 text-xs">* {{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!--div de densidad max-->
                    <div class="md:w-1/2 px-3 mb-5">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" wire:model="densidad_max" id="densidad_max"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="densidad_max"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max</label>
                            @error('densidad_max')
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