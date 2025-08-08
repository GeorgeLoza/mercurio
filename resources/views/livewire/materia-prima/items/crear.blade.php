<div>
 <h2 class="text-xl md:text-2xl text-gray-800 dark:text-gray-200 font-bold text-center">
        Nuevo Item de Materia Prima
    </h2>

    <div>
        <label for="categoria" class="block text-xs md:text-sm font-semibold mb-1 text-gray-700 dark:text-gray-300">
            Categoría
        </label>
        <select wire:model.live="categoria" id="categoria"
            class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm dark:bg-slate-800 focus:ring focus:ring-blue-300">
            <option value="">Seleccione una categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        @error('categoria')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="nombre" class="block text-sm font-medium">nombre:</label>
        <input type="text" wire:model="nombre" id="nombre" placeholder="nombre"
            class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
        @error('nombre')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

    </div>

    <div>
        <label for="codigo" class="block text-sm font-medium">codigo:</label>
        <input type="text" wire:model="codigo" id="codigo" placeholder="nombre"
            class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
        @error('codigo')
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
