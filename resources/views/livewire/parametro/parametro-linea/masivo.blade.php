<div class="p-4 max-h-[80vh] overflow-y-auto bg-white dark:bg-gray-900 transition-colors">
    @if ($mensaje)
        <div class="mb-2 px-3 py-2 rounded bg-green-100 text-green-800 text-xs">
            {{ $mensaje }}
        </div>
    @endif
    @if (!$etapa_id)
        <div class="mb-2 px-3 py-2 rounded bg-yellow-100 text-yellow-800 text-xs">
            Selecciona una etapa para poder editar los parámetros.
        </div>
    @endif
    <!-- Selección de Categoría y Destino -->
    <div class="flex gap-4 mb-6">
        <div>
            <label class="block text-xs font-semibold mb-1">Categoría</label>
            <select wire:model="categoria_id" class="border rounded px-2 py-1 text-xs">
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs font-semibold mb-1">Destino</label>
            <select wire:model="destino_id" class="border rounded px-2 py-1 text-xs">
                @foreach ($destinos as $dest)
                    <option value="{{ $dest->id }}">{{ $dest->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Tabs de Etapas -->
    <div class="mb-6">
        <div class="flex flex-wrap gap-2">
            @foreach ($etapas as $etapa)
                <button @class([
                    'px-3 py-1 rounded-full text-xs font-medium transition',
                    'bg-blue-600 text-white shadow' => $activeTab == $etapa->id,
                    'bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700' =>
                        $activeTab != $etapa->id,
                ]) wire:click="selectEtapa({{ $etapa->id }})">
                    {{ $etapa->nombre }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Formulario de Parámetros -->
    <form wire:submit.prevent="saveParametro" class="space-y-4">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-semibold mb-1">Temperatura (°C)</label>
                <div class="flex gap-2">
                    <input type="number" wire:model="temperatura_min" placeholder="Min"
                        class="w-full border rounded px-2 py-1 text-xs">
                    <input type="number" wire:model="temperatura_max" placeholder="Max"
                        class="w-full border rounded px-2 py-1 text-xs">
                </div>
                @error('temperatura_min')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
                @error('temperatura_max')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold mb-1">pH</label>
                <div class="flex gap-2">
                    <input type="number" step="0.01" wire:model="ph_min" placeholder="Min"
                        class="w-full border rounded px-2 py-1 text-xs">
                    <input type="number" step="0.01" wire:model="ph_max" placeholder="Max"
                        class="w-full border rounded px-2 py-1 text-xs">
                </div>
                @error('ph_min')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
                @error('ph_max')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold mb-1">Acidez</label>
                <div class="flex gap-2">
                    <input type="number" step="0.01" wire:model="acidez_min" placeholder="Min"
                        class="w-full border rounded px-2 py-1 text-xs">
                    <input type="number" step="0.01" wire:model="acidez_max" placeholder="Max"
                        class="w-full border rounded px-2 py-1 text-xs">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold mb-1">Brix</label>
                <div class="flex gap-2">
                    <input type="number" step="0.01" wire:model="brix_min" placeholder="Min"
                        class="w-full border rounded px-2 py-1 text-xs">
                    <input type="number" step="0.01" wire:model="brix_max" placeholder="Max"
                        class="w-full border rounded px-2 py-1 text-xs">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold mb-1">Viscosidad</label>
                <div class="flex gap-2">
                    <input type="number" step="0.01" wire:model="viscosidad_min" placeholder="Min"
                        class="w-full border rounded px-2 py-1 text-xs">
                    <input type="number" step="0.01" wire:model="viscosidad_max" placeholder="Max"
                        class="w-full border rounded px-2 py-1 text-xs">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold mb-1">Densidad</label>
                <div class="flex gap-2">
                    <input type="number" step="0.01" wire:model="densidad_min" placeholder="Min"
                        class="w-full border rounded px-2 py-1 text-xs">
                    <input type="number" step="0.01" wire:model="densidad_max" placeholder="Max"
                        class="w-full border rounded px-2 py-1 text-xs">
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">
                Guardar en todos los productos
            </button>
            <button type="button" class="bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700 @if (auth()->user()->rol_id != 1) hidden

            @endif"
                wire:click="deleteParametro"
                onclick="return confirm('¿Seguro de eliminar los parámetros de esta etapa en todos los productos?')">
                Eliminar
            </button>

        </div>
    </form>
</div>
