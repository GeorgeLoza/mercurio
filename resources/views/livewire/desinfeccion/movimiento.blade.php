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
            <h3 class="text-lg font-semibold mt-4">Detalles del Movimiento {{ $est }}</h3>
            <div class="flex items-center mt-2 space-x-2">
                <select wire:model.live="item" class="block w-full p-2 text-sm ...">
                    <option value="">Seleccione un ítem</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->codigo }} {{ $item->nombre }} {{$item->concentracion}}</option>
                    @endforeach
                </select>
                @if ($est != 1)

                    <select wire:model.live="destino" {{ $item ? '' : 'disabled' }}
                        class="block w-full p-2 text-sm ...">
                        <option value="">Seleccione un destino</option>
                        @foreach ($destinos as $destino)
                            <option value="{{ $destino->id }}">{{ $destino->descripcion }}</option>
                        @endforeach
                    </select>
                @endif

                <input type="number" wire:model="cantidad"
                    class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cantidad" min="0" />
            </div>
             @error('item')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
          @error('cantidad')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror

        </div>

        <div class="mt-4">
            <button type="submit"
                class="w-full bg-green-600 text-white rounded-md px-4 py-2">{{ $id ? 'Actualizar' : 'Crear' }}</button>
        </div>

        {{-- <div wire:loading>
            <div
                class="fixed inset-0 flex items-center justify-center bg-gray-50 bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75 z-50">
                <div role="status">
                    <svg aria-hidden="true"
                        class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5911 10.4979 44.0141 9.86098C47.3181 8.92935 50.7582 8.57672 54.1871 8.81388C57.3955 9.02528 60.4938 9.6473 63.3031 10.6639C67.2062 12.5892 70.7028 15.5008 73.4978 19.0167C75.8667 21.8369 77.2293 24.9395 77.4122 28.1599C77.5847 31.0427 79.5707 33.4592 82.0562 34.2679C84.4418 35.0908 87.4592 34.7542 89.3955 33.5622C91.2444 32.3731 92.6364 30.0847 93.9676 29.3468V39.0409Z"
                            fill="currentFill" />
                    </svg>
                </div>
            </div>
        </div> --}}
    </form>
</div>
