<div>
    <h2 class="text-xl mb-4 text-gray-800 dark:text-gray-200 font-bold text-center ">Nuevo Pase de Turno</h2>
    <div>
        <form wire:submit="save" novalidate>
            @csrf

            <div class="relative z-0 w-full mb-3 group">
                <label for="urgente" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">
                    Urgente</label>
                <textarea id="urgente" rows="4" wire:model="urgente"
                    class="block p-2.5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba aqui ..."></textarea>

                @error('urgente')
                    <p class="text-red-500 text-xs">* {{ $message }}</p>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-3 group">
                <label for="observaciones" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">
                    Observaciones</label>
                <textarea id="observaciones" rows="4" wire:model="observaciones"
                    class="block p-2.5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba aqui ...">
                

                </textarea>

                @error('observaciones')
                    <p class="text-red-500 text-xs">* {{ $message }}</p>
                @enderror
            </div>


            <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">
                Volumenes en Litros </label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                @foreach ($volumen as $key => $value)
                    <div class="flex gap-1 items-center">
                        <label for="{{ $key }}" class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $key }}</label>
                        <input type="number" id="{{ $key }}" wire:model="volumen.{{ $key }}"
                            class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" />
                    </div>
                @endforeach

            </div>

            <div class="w-full px-3 m-5">
                <button type="submit"
                    class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Registrar</button>
            </div>
        </form>
    </div>
</div>
