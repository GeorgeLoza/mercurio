<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200  font-bold text-center">Crear Envasadora de Producto</h2>

    <div>
        <form wire:submit="save" novalidate>
            @csrf
            <div class="md:flex mt-6">
                <div class="px-3 mb-2 md:w-1/2">
                    <div class="relative z-0 w-full mb-2 group">
                        <label for="proceso"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Proceso</label>
                        <select id="proceso" wire:model.live="proceso"
                            class=" block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                            <option value="Produccion" class="bg-gray-100 dark:bg-gray-800">Producción</option>
                            <option value="Limpieza" class="bg-gray-100 dark:bg-gray-800">Limpieza</option>
                            <option value="Mantenimiento" class="bg-gray-100 dark:bg-gray-800">Mantenimiento</option>
                            <option value="Detenido" class="bg-gray-100 dark:bg-gray-800">Detenido</option>
                        </select>
                        @error('proceso')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="px-3 mb-2 md:w-1/2">
                    <div class="relative z-0 w-full mb-2 group">
                        <label for="grupo"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Envasadoras</label>
                        <select id="grupo" wire:model.live="grupo"
                            class=" block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                            <option value="1" class="bg-gray-100 dark:bg-gray-800">HTST</option>
                            <option value="3" class="bg-gray-100 dark:bg-gray-800">UHT</option>
                            <option value="4" class="bg-gray-100 dark:bg-gray-800">Vasos</option>
                            <option value="5" class="bg-gray-100 dark:bg-gray-800">Embotelladora (Araña)</option>
                        </select>
                        @error('grupo')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            @if ($proceso == "Produccion")
            <div class="md:flex ">
                <div class="px-3 mb-1 md:w-1/2">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="orp_id"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ORP</label>
                        <select id="orp_id" wire:model.live="orp_id"
                            class=" block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                            @foreach ($orps as $orp)
                            <option value="{{$orp->id}}" class="bg-gray-100 dark:bg-gray-800"> {{$orp->codigo}} -
                                {{$orp->producto->nombre}}
                            </option>
                            @endforeach
                        </select>
                        @error('orp_id')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>


                <div class=" px-3 mb-1 md:w-1/2">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" wire:model="preparacion" id="preparacion"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="preparacion"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Preparación
                        </label>
                        @error('preparacion')
                        <p class="text-red-500 text-xs">* {{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            @endif



            <div class="mb-4">
                @if($grupo == 1)

                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora HTST </h3>

                <div class="md:flex gap-3 mb-2">
                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal 1a -->
                        <div wire:click="estado_HTST_A1"
                            class="bg-{{ $HTST_A1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">1A</p>
                            </div>
                        </div>
                        <!--cabezal 1b -->
                        <div wire:click="estado_HTST_B1"
                            class="bg-{{ $HTST_B1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">1B</p>
                            </div>
                        </div>
                        <!--cabezal 1c -->
                        <div wire:click="estado_HTST_C1"
                            class="bg-{{ $HTST_C1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">1C</p>
                            </div>

                        </div>
                    </div>

                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal 2a -->
                        <div wire:click="estado_HTST_A2"
                            class="bg-{{ $HTST_A2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">2A</p>
                            </div>

                        </div>
                        <!--cabezal 2b -->
                        <div wire:click="estado_HTST_B2"
                            class="bg-{{ $HTST_B2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">2B</p>
                            </div>

                        </div>
                        <!--cabezal 2c -->
                        <div wire:click="estado_HTST_C2"
                            class="bg-{{ $HTST_C2 ? 'green' : 'red' }}-500   w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">2C</p>
                            </div>

                        </div>
                    </div>
                </div>

                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora HTST </h3>

                <div class="md:flex gap-3 mb-2">
                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal 1a -->
                        <div wire:click="estado_HTST_A3"
                            class="bg-{{ $HTST_A3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">3A</p>
                            </div>
                        </div>
                        <!--cabezal 1b -->
                        <div wire:click="estado_HTST_B3"
                            class="bg-{{ $HTST_B3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">3B</p>
                            </div>
                        </div>
                        <!--cabezal 1c -->
                        <div wire:click="estado_HTST_C3"
                            class="bg-{{ $HTST_C3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">3C</p>
                            </div>

                        </div>
                    </div>

                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal 4a -->
                        <div wire:click="estado_HTST_A4"
                            class="bg-{{ $HTST_A4 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">4A</p>
                            </div>

                        </div>
                        <!--cabezal 4b -->
                        <div wire:click="estado_HTST_B4"
                            class="bg-{{ $HTST_B4 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">4B</p>
                            </div>

                        </div>
                        <!--cabezal 4c -->
                        <div wire:click="estado_HTST_C4"
                            class="bg-{{ $HTST_C4 ? 'green' : 'red' }}-500   w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">4C</p>
                            </div>

                        </div>
                    </div>
                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal 5a -->
                        <div wire:click="estado_HTST_A5"
                            class="bg-{{ $HTST_A5 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">5A</p>
                            </div>

                        </div>
                        <!--cabezal 5b -->
                        <div wire:click="estado_HTST_B5"
                            class="bg-{{ $HTST_B5 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">5B</p>
                            </div>

                        </div>
                        <!--cabezal 4c -->
                        <div wire:click="estado_HTST_C5"
                            class="bg-{{ $HTST_C5 ? 'green' : 'red' }}-500   w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">5C</p>
                            </div>

                        </div>
                    </div>

                </div>

                @endif
                @if($grupo == 3)
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora UHT </h3>

                <div class="md:flex gap-3 mb-2">
                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal 1a -->
                        <div wire:click="estado_UHT_A1"
                            class="bg-{{ $UHT_A1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">1A</p>
                            </div>
                        </div>
                        <!--cabezal 1b -->
                        <div wire:click="estado_UHT_B1"
                            class="bg-{{ $UHT_B1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">1B</p>
                            </div>
                        </div>
                        <!--cabezal 1c -->
                        <div wire:click="estado_UHT_C1"
                            class="bg-{{ $UHT_C1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">1C</p>
                            </div>

                        </div>
                    </div>

                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal 2A -->
                        <div wire:click="estado_UHT_A2"
                            class="bg-{{ $UHT_A2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">2A</p>
                            </div>

                        </div>
                        <!--cabezal 2B -->
                        <div wire:click="estado_UHT_B2"
                            class="bg-{{ $UHT_B2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">2B</p>
                            </div>

                        </div>

                    </div>
                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal 3A -->
                        <div wire:click="estado_UHT_A3"
                            class="bg-{{ $UHT_A3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">3A</p>
                            </div>

                        </div>
                        <!--cabezal 3b -->
                        <div wire:click="estado_UHT_B3"
                            class="bg-{{ $UHT_B3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">3B</p>
                            </div>

                        </div>
                    </div>

                </div>

                @endif
                @if($grupo == 4)
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora VASOS </h3>

                <div class="md:flex gap-3 mb-2">
                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal V1 -->
                        <div wire:click="estado_V1"
                            class="bg-{{ $V1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">V1</p>
                            </div>
                        </div>
                        <!--cabezal V2 -->
                        <div wire:click="estado_V2"
                            class="bg-{{ $V2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">V2</p>
                            </div>
                        </div>
                        <!--cabezal V3 -->
                        <div wire:click="estado_V3"
                            class="bg-{{ $V3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">V3</p>
                            </div>

                        </div>
                    </div>


                </div>

                @endif
                @if($grupo == 5)
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora VASOS </h3>

                <div class="md:flex gap-3 mb-2">
                    <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                        <!--cabezal V1 -->
                        <div wire:click="estado_araña"
                            class="bg-{{ $araña ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                            <div class="flex items-center">
                                <p class="w-full py-3 text-sm font-medium text-white text-center">araña</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif




                <div class="flex mt-6">
                    <div class="w-full px-3 mb-5">
                        <button type="submit"
                            class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Registrar</button>
                    </div>
                </div>
                
        </form>
    </div>

</div>