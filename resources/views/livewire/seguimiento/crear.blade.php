<div class="p-4 space-y-4">
    <h2 class="text-lg font-semibold">Crear Seguimientos</h2>

    <div>
        <label for="orp_id" class="block text-sm font-medium">ORP</label>
        <select wire:model.live="orp_id" id="orp_id" class="w-full border border-gray-500 rounded p-2">
            <option class="dark:bg-slate-800" value="">Seleccione una ORP</option>
            @foreach ($orps as $orp)
                <option class="dark:bg-slate-800"  value="{{ $orp->id }}">{{ $orp->codigo }}-{{$orp->producto->nombre}}</option>
            @endforeach
        </select>
        @error('orp_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="origen_id" class="block text-sm font-medium">Origen</label>
        <select wire:model="origen_id" id="origen_id" class="w-full border border-gray-500 rounded p-2 ">
            <option class="dark:bg-slate-800"  value="">Seleccione un origen</option>
            @foreach ($origens as $origen)
                <option class="dark:bg-slate-800"  value="{{ $origen->id }}">{{ $origen->alias }}</option>
            @endforeach
        </select>
        @error('origen_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="modo" class="block text-sm font-medium">Modo de creación</label>
        <select wire:model.live="modo" id="modo" class="w-full border border-gray-500 rounded p-2">
            <option class="dark:bg-slate-800"  value="1-n">Del 1 hasta N</option>
            <option class="dark:bg-slate-800"  value="m-n">Desde M hasta N</option>
        </select>
    </div>

    @if ($modo === '1-n')
        <div>
            <label for="numero" class="block text-sm font-medium">Número de registros a crear (del 1 al N)</label>
            <input wire:model="numero" type="number" min="1" class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" id="numero">
            @error('numero') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    @else
        <div>
            <label class="block text-sm font-medium">Desde</label>
            <input wire:model="desde" type="number" min="1" class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800">
            @error('desde') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium">Hasta</label>
            <input wire:model="hasta" type="number" min="1" class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800">
            @error('hasta') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    @endif

    <div class="flex justify-end space-x-2 mt-4">
        <button wire:click="guardar" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
        <button wire:click="$emit('closeModal')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Cancelar
        </button>
    </div>
</div>
