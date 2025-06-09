<div>
    {{-- Success is as dangerous as failure. --}}

    @if ($id2 == 1)
        <div>
            <label class="block text-sm font-medium  mb-2">RT</label>
            <input wire:model="rt" type="number" min="0"
                class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
            @error('rt')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            @php
                $excluidos = [4,5,6,7,16,17];
            @endphp
            @if (!in_array($datos->orp->producto->categoriaProducto->id, $excluidos))



                    <label class="block text-sm font-medium  mb-2">Coliformes</label>
                    <input wire:model="col" type="number" min="0"
                        class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
                    @error('col')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                @endif
        </div>

    @endif

    @if ($id2 == 2)
        <div>
            <label class="block text-sm font-medium  mb-2">Mohos</label>
            <input wire:model="moho" type="number" min="0"
                class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
            @error('moho')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    @endif

    <div>
        <label class="block text-sm font-medium  mb-2">Observaciones</label>
        <input wire:model="observaciones" type="text" min="0"
            class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
        @error('observaciones')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    @if ($id2 == 1)
        <button wire:click="rts" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
    @endif

    @if ($id2 == 2)
        <button wire:click="mohos" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
    @endif

</div>
