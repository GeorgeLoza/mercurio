<div>
 <h2 class="text-xl md:text-2xl text-gray-800 dark:text-gray-200 font-bold text-center">
        Nuevo Proveedor de Materia Prima
    </h2>


    <div>
        <label for="nombre" class="block text-sm font-medium">nombre:</label>
        <input type="text" wire:model="nombre" id="nombre" placeholder="nombre"
            class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
        @error('nombre')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

    </div>




    <div class="flex justify-end space-x-2 pt-4 border-t border-gray-300">
        <button wire:click="save"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm md:text-base shadow transition">
            Guardar
        </button>
        <button wire:click="$dispatch('closeModal')"
            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm md:text-base shadow transition">
            Cancelar
        </button>
    </div>
</div>
