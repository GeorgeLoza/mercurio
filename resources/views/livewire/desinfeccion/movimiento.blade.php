<div>
    <form wire:submit.prevent="save({{ $est ? 1 : 0 }})" novalidate>
        @csrf
        <div class="flex items-center justify-between p-4 md:p-3 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white capitalize">
                {{ $id ? 'Editar Movimiento' : 'Crear Movimiento' }}
            </h3>
            <button type="button" wire:click="cerrar"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

        <div>
            <h3 class="text-lg font-semibold mt-4">Detalles del Movimiento </h3>
            <div class="flex items-center mt-2 space-x-2">
                <select wire:model.live="item" {{ !$editar ? '' : 'disabled' }} class="block w-full p-2 text-sm ...">
                    <option class="dark:bg-slate-800" value="">Seleccione un ítem</option>
                    @foreach ($items as $itemOption)
                        <option class="dark:bg-slate-800" value="{{ $itemOption->id }}">{{ $itemOption->codigo }}
                            {{ $itemOption->nombre }} {{ $itemOption->concentracion }}</option>
                    @endforeach
                </select>
                @if ($est != 1)

                    <select wire:model.live="destino" {{ $item ? '' : 'disabled' }} {{ !$editar ? '' : 'disabled' }}
                        class="block w-full p-2 text-sm ...">
                        <option class="dark:bg-slate-800" @if ($editar == true) disabled @endif
                            value="">Seleccione un destino</option>
                        @foreach ($destinos as $destino)
                            <option class="dark:bg-slate-800" value="{{ $destino->id }}">{{ $destino->descripcion }} -
                                {{ $destino->concentracion }} %
                            </option>
                        @endforeach
                    </select>
                @endif
                <div class="w-full mr-2">
                    @if ($est != 1 && $editar == true)
                        <p>
                            Cantidad de reactivo

                        </p>
                    @endif


                    <input type="number" wire:model="cantidad"
                        class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Volumen " min="0" />


                </div>

                <div>

                    {{ $unidad }}


                </div>
            </div>
            @error('item')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            @error('cantidad')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            @if ($est != 1 && $editar == true)
                <div class="flex items-center mt-2 space-x-2">
                    @if ($item == 2)
                        @php
                            $concentracion = null;
                        @endphp
                    @endif

                    Confirmacion: <input type="number" wire:model="concentracion"
                        class="block w-full p-2 m-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Concentracion" min="0" />
                    @if ($item == 3)
                        g/ml
                    @else
                        %
                    @endif
                </div>







            @endif
            <p>
                Observaciones

            </p>
            <input type="text" wire:model="observaciones"
                class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Observaciones " min="0" />
        </div>

        <div class="mt-4">
            <button type="submit"
                class="w-full bg-green-600 text-white rounded-md px-4 py-2">{{ $id ? 'Actualizar' : 'Crear' }}</button>
        </div>


    </form>
</div>
