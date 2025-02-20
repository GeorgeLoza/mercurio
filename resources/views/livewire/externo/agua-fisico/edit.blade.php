<div>
    <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Analisis de
            Agua Fisco</h3>

        <form wire:submit="update" novalidate>

            <div>
                <label for="ph"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    ph</label>
                <input type="number" step="0.01" wire:model="ph" name="ph" id="ph"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder=" " required>
                    @error('ph')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="dureza"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Dureza Total</label>
                <input type="number" step="0.01" wire:model="dureza" name="dureza" id="dureza"
                    placeholder=" "
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
                    @error('dureza')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="cloruros"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cloruros</label>
                <input type="number" step="0.01" wire:model="cloruros" name="cloruros" id="cloruros"
                    placeholder=" "
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
                    @error('cloruros')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="conductividad"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Conductividad</label>
                <input type="number" step="0.01" wire:model="conductividad" name="conductividad" id="conductividad"
                    placeholder=" "
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
                    @error('conductividad')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit"
                class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                analisis</button>

        </form>
    </div>
</div>
