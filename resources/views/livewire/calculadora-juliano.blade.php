<div x-data="{ open: false }" class="relative inline-block text-left">
    <!-- Botón para abrir/cerrar el popover -->
    <button @click="open = !open"
            class="px-4 py-2 text-black dark:text-white font-semibold rounded ">
        Convertidor Juliano
    </button>

    <!-- Contenido del popover -->
    <div x-show="open"
         x-transition
         @click.away="open = false"
         class="absolute z-10 mt-2 w-96 bg-white rounded shadow-lg p-4 border border-gray-200">
        <h2 class="text-lg font-bold mb-4">Convertidor Juliano</h2>

        <!-- Campo para Día Juliano -->
        <div class="mb-4">
            <label for="julianDate" class="block text-sm font-medium text-gray-700">Día Juliano</label>
            <input type="number" wire:model.live="julianDate" id="julianDate"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

        </div>

        <!-- Campo para Fecha Estándar -->
        <div class="mb-4">
            <label for="standardDate" class="block text-sm font-medium text-gray-700">Fecha Estándar</label>
            <input type="date" wire:model.live="standardDate" id="standardDate"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

        </div>




    </div>
</div>
