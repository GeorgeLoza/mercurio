<div>
    {{-- Buscar ORP --}}
    <div class="mb-2">
        <label for="buscar_orp" class="block text-sm font-medium">Buscar ORP por código</label>
        <input type="text" wire:model.live.debounce.500ms="buscar_orp" id="buscar_orp"
               placeholder="Escribe el código..."
               class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
    </div>

    {{-- Lista de ORPs disponibles --}}
    <div class="mb-2">
        <label class="block text-sm font-medium">ORPs disponibles</label>
        <ul class="border border-gray-300 rounded p-2 max-h-40 overflow-y-auto dark:bg-slate-800">
            @foreach ($orps as $orp)
                <li class="flex justify-between items-center py-1">
                    <span>{{ $orp->codigo }} - {{ $orp->producto->nombre }}</span>
                    <button type="button" wire:click="agregarOrp({{ $orp->id }})"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-xs">
                        +
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- ORPs seleccionadas --}}
    <div class="mb-2">
        <label class="block text-sm font-medium">ORPs seleccionadas</label>
        <ul class="border border-gray-300 rounded p-2 max-h-40 overflow-y-auto dark:bg-slate-800">
            @foreach ($orp_seleccionadas as $id)
                @php $o = \App\Models\Orp::find($id) @endphp
                <li class="flex justify-between items-center py-1">
                    <span>{{ $o->codigo }} - {{ $o->producto->nombre }}</span>
                    <button type="button" wire:click="quitarOrp({{ $id }})"
                            class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">
                        ×
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
    {{-- elegir camara --}}
    <div class="mb-2">
        <label for="camara" class="block text-sm font-medium">Cámara</label>
        <select wire:model.live="camara" id="camara"
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800">
           <option value="">Seleccione una cámara</option>
        <option value="Ambiente">Ambiente</option>
        <option value="Frio">Frio</option>
        <option value="Linea">Linea</option>
        </select>
        @error('camara')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

    {{-- Botones --}}
    <div class="flex justify-end space-x-2 mt-4">
        <button wire:click="guardar" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
        <button wire:click="$dispatch('closeModal')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Cancelar
        </button>
    </div>
</div>
