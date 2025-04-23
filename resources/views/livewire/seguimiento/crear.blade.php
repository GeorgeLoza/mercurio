<div class="p-4 space-y-4">
    <h2 class="text-lg font-semibold">Crear Seguimientos</h2>


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
                    {{ $orp->producto->nombre }} - {{ $orp->fecha_vencimiento1 }} </option>
            @endforeach
        </select>
        @error('orp_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-2">
        <label for="orp_id2" class="block text-sm font-medium">ORP 2</label>
        <select wire:model.live="orp_id2" id="orp_id2" class="w-full border border-gray-500 rounded p-2">
            <option class="dark:bg-slate-800" value="">Seleccione una ORP</option>
            @foreach ($orps as $orp)
                <option class="dark:bg-slate-800" value="{{ $orp->id }}">{{ $orp->codigo }} -
                    {{ $orp->producto->nombre }} - {{ $orp->fecha_vencimiento1 }} </option>
            @endforeach
        </select>
        @error('orp_id2')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-2">
        <label for="orp_id3" class="block text-sm font-medium">ORP 2</label>
        <select wire:model.live="orp_id3" id="orp_id3" class="w-full border border-gray-500 rounded p-2">
            <option class="dark:bg-slate-800" value="">Seleccione una ORP</option>
            @foreach ($orps as $orp)
                <option class="dark:bg-slate-800" value="{{ $orp->id }}">{{ $orp->codigo }} -
                    {{ $orp->producto->nombre }} - {{ $orp->fecha_vencimiento1 }} </option>
            @endforeach
        </select>
        @error('orp_id3')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    @if ($orp_id || $orp_id2 || $orp_id3)
        <div>
            <h3 class="text-lg font-medium">Seleccione los rangos de número para cada origen</h3>
            <div class="grid grid-cols-3 gap-4 mt-1">
                @foreach ($origens as $origen)
                    @php
                        $bgColor = match (true) {
                            in_array($origen->alias, ['1A', '1B', '1C']) => 'bg-green-300',
                            in_array($origen->alias, ['2A', '2B']) => 'bg-blue-300',
                            in_array($origen->alias, ['3A', '3B']) => 'bg-purple-300',
                            default => 'bg-gray-500',
                        };
                    @endphp

                    <div class="mb-2 flex gap-2 items-center pl-1 rounded {{ $bgColor }}">
                        <label class="block text-sm font-medium text-black pl-1 ">{{ $origen->alias }}:</label>
                        <div class="flex">
                            <input wire:model="rango_origen.{{ $origen->id }}.desde" type="number" min="1"
                                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" placeholder="Desde">
                            <input wire:model="rango_origen.{{ $origen->id }}.hasta" type="number" min="1"
                                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" placeholder="Hasta">
                        </div>
                        @error("rango_origen.{$origen->id}.desde")
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        @error("rango_origen.{$origen->id}.hasta")
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                @endforeach

            </div>
            <div>
                <label class="block text-sm font-medium  mb-2">Lote</label>
                <input wire:model="lote" type="number" min="0"
                    class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
                @error('lote')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
    @endif

    <div class="flex justify-end space-x-2 mt-4">
        <button wire:click="guardar" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
        <button wire:click="$dispatch('closeModal')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Cancelar
        </button>

    </div>
</div>
