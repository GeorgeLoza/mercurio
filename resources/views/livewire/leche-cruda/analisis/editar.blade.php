<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold  text-center ">Análisis Línea </h2>
    <div>
        <form wire:submit="update" novalidate>
            @csrf
            <div class="flex gap-1">
                <!--temperatura-->
                <div class=" px-3 mb-5 w-1/3 @if ($id2 != 1 )
                    hidden
                @endif">
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
                <!--ph-->
                <div class=" px-3 mb-5 w-1/3 @if ($id2 != 1 )
                    hidden
                @endif">
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

                <!--acidez-->
                <div class=" px-3 mb-5 w-1/3 @if ($id2 != 1 )
                    hidden
                @endif">
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

            </div>


            <div class="flex gap-1">

                <!--brix-->
                <div class=" px-3 mb-5 w-1/3 @if ($id2 != 1 )
                    hidden
                @endif">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" wire:model="brix" id="brix"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="brix"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sólidos
                            [brix]
                        </label>
                        @error('brix')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>

                <!--densidad-->
                <div class=" px-3 mb-5 w-1/3 @if ($id2 != 1 )
                    hidden
                @endif">
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


                <!--checkboxes prueba de alcohol-->
                <div class="flex gap-1 justify-around mb-3 w-1/3">

                    <div class="flex items-center @if ($id2 != 1 )
                    hidden
                @endif">
                        <input checked id="checked-checkbox" wire:model="prueba_alcohol" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checked-checkbox"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Prueba Alcohol</label>
                    </div>

                </div>
                <!--fin checkboxes prueba de alcohol-->

            </div>


            <div class="flex gap-1">
                <!--contenido graso-->
                <div class=" px-3 mb-5 w-1/3 @if ($id2 != 1 )
                    hidden
                @endif">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" wire:model="contenido_graso" id="contenido_graso"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="contenido_graso"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contenigo
                            Graso
                        </label>
                        @error('contenido_graso')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
                <!--temperatura_congelacion-->
                <div class=" px-3 mb-5 w-1/3 @if ($id2 != 1 )
                    hidden
                @endif">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" wire:model="temperatura_congelacion" id="temperatura_congelacion"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="temperatura_congelacion"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Temperatura
                            Congelacion
                        </label>
                        @error('temperatura_congelacion')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>

                <!--porcentaje_agua-->
                <div class=" px-3 mb-5 w-1/3 @if ($id2 != 1 )
                    hidden
                @endif">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" wire:model="porcentaje_agua" id="porcentaje_agua"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="porcentaje_agua"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Porcentaje
                            de Agua
                        </label>
                        @error('porcentaje_agua')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>

            </div>


            <div class="flex gap-1">
                <!--tram_inicio-->
                <div class=" px-3 mb-5 w-1/3 @if ( $id2 != 2 )
                    hidden
                @endif">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="time" wire:model="tram_inicio" id="tram_inicio"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="tram_inicio"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">tram
                            inicio
                        </label>
                        @error('tram_inicio')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>

                <!--tram_fin-->
                <div class=" px-3 mb-5 w-1/3 @if ( $id2 != 2 )
                    hidden
                @endif">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="time" wire:model="tram_fin" id="tram_fin"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="tram_fin"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">tram
                            fin
                        </label>
                        @error('tram_fin')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
                <!--tram_lapso-->
                <div class=" px-3 mb-5 w-1/3 hidden">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="time" wire:model="tram_lapso" id="tram_lapso"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="tram_lapso"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">tram
                            lapso
                        </label>
                        @error('tram_lapso')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>


            </div>


            <!--Observaciones-->
            <div class=" px-3 mb-5 @if ( $id2 != 1 )
                    hidden
                @endif">
                <div class="relative z-0 w-full mb-5 group ">
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

{{-- recuento --}}
<div class="px-3 mb-5 w-full @if ($id2 != 3) hidden @endif">
    <div class="relative z-0 w-full mb-5 group flex items-center gap-2">
        <input type="number" wire:model.live="recuento" id="recuento" name="recuento"
            class="block py-2.5 px-0 w-auto text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />

        <span class="text-sm text-gray-700 dark:text-white flex items-center">
            @if ($recuento >= 5000000)
                MNPC
            @elseif ($recuento < 5000000 && $recuento >= 1)
                {{ $recuento < 1
                    ? $recuento * 10 ** (strlen(floor($recuento)) - 1)
                    : $recuento / 10 ** (strlen(floor($recuento)) - 1) }}
                x 10
                <sup>{{ strlen(floor($recuento)) - 1 }}</sup>
            @elseif ($recuento === 0)
                < 1 x 10<sup>1</sup>
                @elseif (is_null($recuento))
                    -
            @endif
        </span>

        <label for="recuento"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
            recuento
        </label>
        @error('recuento')
        <p class="text-red-500 text-xs">* {{$message}}</p>
        @enderror
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
