<div>
    <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Analisis de
            Actividad
            de Agua</h3>

        <form wire:submit="update" novalidate>

            <div>
                <label for="temperatura" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Temperatura</label>
                <input type="number" step="0.01" wire:model="temperatura" name="temperatura" id="temperatura"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder=" " required>
                @error('temperatura')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="por_hum_rel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">%
                    Humedad Relativa</label>
                <input type="number" step="0.01" wire:model="por_hum_rel" name="por_hum_rel" id="por_hum_rel"
                    placeholder=" "
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
                @error('por_hum_rel')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="act_agua" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actividad
                    Agua</label>
                <input type="number" step="0.01" wire:model="act_agua" name="act_agua" id="act_agua"
                    placeholder=" "
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
                @error('act_agua')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
                <textarea wire:model="observaciones"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
            </div>
            <button type="submit"
                class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                analisis</button>

        </form>
    </div>
</div>
