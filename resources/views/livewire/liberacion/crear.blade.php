<div>

    <div class="mb-2">
        <label for="buscar_orp" class="block text-sm font-medium">Buscar ORP por código</label>
        <input type="text" wire:model.live.debounce.500ms="buscar_orp" id="buscar_orp" placeholder="Escribe el código..."
            class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
    </div>

    <div class="mb-2">
        <label for="orp_id" class="block text-sm font-medium">ORP</label>
        <select wire:model.live="orp_id" id="orp_id" class="w-full border border-gray-500 rounded p-2">
            <option class="dark:bg-slate-800" value="">Seleccione una ORP</option>
            @foreach ($orps as $orp)
                <option class="dark:bg-slate-800" value="{{ $orp->id }}">{{ $orp->codigo }} -
                    {{ $orp->producto->nombre }} -
                    {{ $orp->fecha_vencimiento1 ? \Carbon\Carbon::parse($orp->fecha_vencimiento1)->isoFormat('DD/MM/YY', 0, 'es') : '' }}
                </option>
            @endforeach
        </select>
        @error('orp_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>


    <div class="flex justify-end space-x-2 mt-4">
        <button wire:click="guardar" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
        <button wire:click="$dispatch('closeModal')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Cancelar
        </button>

    </div>

</div>
