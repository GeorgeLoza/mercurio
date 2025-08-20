<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold text-center ">Actualizar Nuevo Estado Planta </h2>
    <div>
        <form wire:submit="save" novalidate>
            @csrf
            <div class="px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <label for="origen_id"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Origen</label>
                    <select id="origen_id" wire:model="origen_id"
                        class=" block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                        @foreach ($origenes as $origen)
                        <option value="{{$origen->id}}" class="bg-gray-100 dark:bg-gray-800">{{$origen->alias}}
                        </option>
                        @endforeach
                    </select>
                    @error('origen_id')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <label for="proceso"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Proceso</label>
                    <select id="proceso" wire:model.live="proceso"
                        class=" block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                        <option value="Produccion" class="bg-gray-100 dark:bg-gray-800">Producción</option>
                        <option value="Limpieza" class="bg-gray-100 dark:bg-gray-800">Limpieza</option>
                        <option value="Mantenimiento" class="bg-gray-100 dark:bg-gray-800">Mantenimiento</option>
                        <option value="Vacio" class="bg-gray-100 dark:bg-gray-800">Vacio</option>
                        <option value="Almacen" class="bg-gray-100 dark:bg-gray-800">Almacen</option>
                    </select>
                    @error('proceso')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="px-3 mb-5">
                <div class="relative z-0 w-full mb-5 group">
                    <label for="etapa_id"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Etapa</label>
                        <select id="etapa_id" wire:model="etapa_id"
                        class=" block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                        @foreach ($etapas as $etapa)
                        <option value="{{$etapa->id}}" class="bg-gray-100 dark:bg-gray-800">
                            {{$etapa->nombre}}
                        </option>
                        @endforeach
                    </select>
                    @error('etapa_id')
                    <p class="text-red-500 text-xs">* {{$message}}</p>
                    @enderror
                </div>
            </div>


            @if($proceso == "Produccion" || $proceso == "Almacen")

            <div class="md:flex">
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


                <div class="px-3 mb-1 ">
                    <button wire:click.prevent="agregar_orp" class="p-2  bg-green-500 rounded-lg">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg></button>
                </div>
            </div>



            <div class="overflow-x-auto">
                <table class="w-full mb-2 text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                                orp
                            </th>
                            <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                                preparación
                            </th>
                            <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                                opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $detalle)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 dark:text-white whitespace-normal">
                                {{ $detalle->orp->codigo }} - {{ $detalle->orp->producto->nombre }}
                            </th>
                            <td class="px-6 py-2 whitespace-normal">
                                {{ $detalle->preparacion }}
                            </td>
                            <td class="px-6 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" wire:click.prevent="borrar_orp({{ $detalle->id }})"
                                    class="h-4 w-4 fill-red-600 dark:fill-red-500" viewBox="0 0 448 512">
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                </svg>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            @endif


            <div class="flex">
                <div class="w-full px-3 mb-5">
                    <button type="submit"
                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">ACTUALIZAR</button>
                </div>
            </div>
        </form>
    </div>
</div>
