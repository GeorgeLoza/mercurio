<div>
    <div>
        <div class="container">
            <form wire:submit.prevent="{{ $detalleId ? 'update' : 'create' }}" novalidate>
                @csrf
                <div class="flex">
                    <p class="mr-2">Su muestra es: </p>
                    <div class="flex items-center me-4">
                        <input id="inline-radio" wire:model.live="muestra" type="radio" value="1"
                            name="inline-radio-group"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="inline-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Producto</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-2-radio" wire:model.live="muestra" type="radio" value="0"
                            name="inline-radio-group"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="inline-2-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Persona, Ambiente o
                            Superficies</label>
                    </div>

                </div>
                <div class="flex gap-2">
                    @if ($muestra == 1)
                        <div class="form-group w-1/3">
                            <label for="productos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Producto</label>
                            <select wire:model="productos_planta_id" id="productos"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Seleccionar Producto (Opcional)</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                            @error('productos_planta_id')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @else
                        <div class="form-group w-1/3">
                            <label for="otro"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Personal - Ambiente
                                - Superficie </label>
                            <input wire:model="otro"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                rows="3" placeholder="Información adicional">
                            @error('otro')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif




                    <div class="form-group w-1/3">
                        <label for="tipo_muestra_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Muestra</label>
                        <select wire:model="tipo_muestra_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Seleccionar Tipo de Muestra (Opcional)</option>
                            @foreach ($tiposMuestra as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                        @error('tipo_muestra_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group w-1/3">
                        <label for="fecha_muestreo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                            Muestreo</label>
                        <input wire:model="fecha_muestreo" type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        @error('fecha_muestreo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group w-1/3">
                        <label for="tipo_analisis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                            Análisis</label>
                        <div class="flex items-center mb-2">
                            <input id="default-checkbox" wire:model="tipo_analisis_1" type="checkbox"
                                value="Fisicoquimico"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">FisicoQuimico</label>
                        </div>
                        <div class="flex items-center">
                            <input id="checked-checkbox" wire:model="tipo_analisis_2" type="checkbox"
                                value="Microbiologico"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Microbiologico</label>
                        </div>

                        @error('tipo_analisis')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                @if ($muestra == 1)
                    <div class="flex gap-2">
                        <div class="form-group w-1/3">
                            <label for="lote"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lote</label>

                            <input wire:model="lote" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Lote">
                            @error('lote')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group w-1/3">
                            <label for="fecha_elaboracion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                                Elaboración</label>
                            <input wire:model="fecha_elaboracion" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('fecha_elaboracion')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group w-1/3">
                            <label for="fecha_vencimiento"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                                Vencimiento</label>
                            <input wire:model="fecha_vencimiento" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('fecha_vencimiento')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                @endif

                <div class="flex justify-end my-2">
                    <button type="submit"
                        class="py-1 px-3 text-white bg-green-600 rounded-md">{{ $detalleId ? 'Actualizar' : 'Crear' }}</button>
                    <button type="button" wire:click="resetFields"
                        class="py-1 px-3 text-white bg-blue-600 rounded-md">Reset</button>

                </div>

            </form>
        </div>
    </div>
    <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center ">
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">#</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Producto Ambiente Personal
                </th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">lote</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">elaboracion</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">vencimiento</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">muestreo</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">tipo</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">analisis</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Acciones</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($detalles as $detalle)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>

                        @if ($detalle->productosPlanta)
                            {{ $detalle->productosPlanta->nombre }} - {{ $detalle->productosPlanta->neto }}
                            {{ $detalle->productosPlanta->unidad }}
                            {{ $detalle->productoPlanta }}
                        @else
                            {{ $detalle->otro }}
                        @endif
                    </td>
                    <td>{{ $detalle->lote }}</td>
                    <td>
                        @if ($detalle->fecha_elaboracion)
                            {{ \Carbon\Carbon::parse($detalle->fecha_elaboracion)->isoFormat('d / M / YYYY', 0, 'es') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($detalle->fecha_vencimiento)
                            {{ \Carbon\Carbon::parse($detalle->fecha_vencimiento)->isoFormat('d / M / YYYY', 0, 'es') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($detalle->fecha_muestreo)->isoFormat('d / M / YYYY', 0, 'es') }}</td>
                    <td>{{ $detalle->tipoMuestra->nombre }}</td>
                    <td>{{ $detalle->tipo_analisis }}</td>
                    <td class="flex gap-2">
                        <button wire:click="edit({{ $detalle->id }})" class=""><svg
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                                viewBox="0 0 512 512">
                                <path
                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg></button>
                        <button wire:click="delete({{ $detalle->id }})" class=""><svg
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

    <div class="flex justify-end">
        <button class="bg-green-600 text-white px-6 py-1 mt-4 rounded-md" wire:click="generar"> Generar solicitud</button>
    </div>
</div>
