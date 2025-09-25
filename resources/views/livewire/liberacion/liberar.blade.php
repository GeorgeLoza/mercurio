<div>
    <div class="p-4">
        <h2 class="text-lg font-semibold mb-4">Liberar Producto</h2>

        <div class="mb-4">
            <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Liberación:</label>
            <select id="tipo" wire:model="tipo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                <option value="">Seleccione un tipo</option>
                <option value="Regular">Regular</option>
                <option value="Extraordinaria">Extraordinaria</option>

            </select>
            @error('tipo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button wire:click="$dispatch('closeModal')" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancelar</button>
            <button wire:click="guardar" class="bg-blue-600 text-white px-4 py-2 rounded">Liberar</button>
        </div>
    </div>
</div>
