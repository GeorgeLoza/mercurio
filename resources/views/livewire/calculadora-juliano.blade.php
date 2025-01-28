<div x-data="{ open: false }" class="relative inline-block text-left ">
    <!-- Botón para abrir/cerrar el popover -->
    <button @click="open = !open"
            class="px-4 py-2 text-black dark:text-white font-semibold rounded ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"  class="fill-black w-4 dark:fill-white">
                <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l352 0 0 256c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256z"/></svg>
    </button>

    <!-- Contenido del popover -->
    <div x-show="open"
         x-transition
         @click.away="open = false"
         class="absolute z-10 mt-2 w-60 bg-white rounded shadow-lg p-4 border border-gray-200 dark:bg-gray-800">
        <h2 class="text-lg font-bold mb-4">Convertidor Juliano</h2>

        <!-- Campo para Día Juliano -->
        <div class="mb-4">
            <label for="julianDate" class="block text-sm font-medium text-gray-700 dark:text-white">Día Juliano</label>
            <input type="number" wire:model.live="julianDate" id="julianDate"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">

        </div>

        <!-- Campo para Fecha Estándar -->
        <div class="mb-4">
            <label for="standardDate" class="block text-sm font-medium text-gray-700 dark:text-white">Fecha Estándar</label>
            <input type="date" wire:model.live="standardDate" id="standardDate"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">

        </div>




    </div>
</div>
