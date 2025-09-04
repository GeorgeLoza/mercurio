{{-- filepath: c:\Users\rod_j\OneDrive\Escritorio\mercurio2\mercurio\resources\views\livewire\cambios\index.blade.php --}}
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Cambios</h2>

    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2500)" x-show="show"
            class="mb-2 px-3 py-2 rounded bg-green-100 text-green-800 text-xs" x-transition>
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario de creación --}}
    <form wire:submit.prevent="store" class="mb-6 bg-gray-50 p-4 rounded shadow">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold mb-1">Título</label>
                <input type="text" wire:model.defer="titulo" class="w-full border rounded px-2 py-1 text-xs">
                @error('titulo')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-xs font-semibold mb-1">Descripción</label>
                <input type="text" wire:model.defer="descripcion" class="w-full border rounded px-2 py-1 text-xs">
            </div>
            <div>
                <label class="block text-xs font-semibold mb-1">Fecha Inicio</label>
                <input type="date" wire:model.defer="fecha_inicio" class="w-full border rounded px-2 py-1 text-xs">
            </div>
            <div>
                <label class="block text-xs font-semibold mb-1">Fecha Fin</label>
                <input type="date" wire:model.defer="fecha_fin" class="w-full border rounded px-2 py-1 text-xs">
            </div>
            <div>
                <label class="block text-xs font-semibold mb-1">Imagen</label>
                <input type="file" wire:model="imagen1" class="w-full border rounded px-2 py-1 text-xs">
                @error('imagen1')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
                <div wire:loading wire:target="imagen1" class="text-xs text-blue-600">Subiendo...</div>
                @if ($imagen1)
                    <img src="{{ $imagen1->temporaryUrl() }}" class="h-16 mt-2 rounded shadow">
                @endif
            </div>
            <div>
                <label class="block text-xs font-semibold mb-1">Roles</label>
                <select wire:model.defer="roles_selected" multiple class="w-full border rounded px-2 py-1 text-xs">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <label class="block text-xs font-semibold mb-1">Nota</label>
                <input type="text" wire:model.defer="nota" class="w-full border rounded px-2 py-1 text-xs">
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">
                Crear Cambio
            </button>
        </div>
    </form>

    {{-- Tabla de cambios --}}
    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-100 text-xs text-gray-700">
                <th class="px-2 py-2">Título</th>
                <th class="px-2 py-2">Descripción</th>
                <th class="px-2 py-2">Fecha Inicio</th>
                <th class="px-2 py-2">Fecha Fin</th>
                <th class="px-2 py-2">Imagen</th>
                <th class="px-2 py-2">Roles</th>
                <th class="px-2 py-2">Nota</th>
                <th class="px-2 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cambios as $cambio)
                <tr class="border-b hover:bg-gray-50">
                    {{-- Edición inline por campo --}}
                    <td class="px-2 py-1" ondblclick="Livewire.dispatch('startEdit', {{ $cambio->id }}, 'titulo')">
                        @if ($editId === $cambio->id && $editField === 'titulo')
                            <input type="text" wire:model.defer="editValue"
                                wire:keydown.enter="saveEdit({{ $cambio->id }})"
                                class="border rounded px-2 py-1 text-xs w-full">
                        @else
                            {{ $cambio->titulo }}
                        @endif
                    </td>
                    <td class="px-2 py-1"
                        ondblclick="Livewire.dispatch('startEdit', {{ $cambio->id }}, 'descripcion')">
                        @if ($editId === $cambio->id && $editField === 'descripcion')
                            <input type="text" wire:model.defer="editValue"
                                wire:keydown.enter="saveEdit({{ $cambio->id }})"
                                class="border rounded px-2 py-1 text-xs w-full">
                        @else
                            {{ $cambio->descripcion }}
                        @endif
                    </td>
                    <td class="px-2 py-1"
                        ondblclick="Livewire.dispatch('startEdit', {{ $cambio->id }}, 'fecha_inicio')">
                        @if ($editId === $cambio->id && $editField === 'fecha_inicio')
                            <input type="date" wire:model.defer="editValue"
                                wire:keydown.enter="saveEdit({{ $cambio->id }})"
                                class="border rounded px-2 py-1 text-xs w-full">
                        @else
                            {{ $cambio->fecha_inicio }}
                        @endif
                    </td>
                    <td class="px-2 py-1"
                        ondblclick="Livewire.dispatch('startEdit', {{ $cambio->id }}, 'fecha_fin')">
                        @if ($editId === $cambio->id && $editField === 'fecha_fin')
                            <input type="date" wire:model.defer="editValue"
                                wire:keydown.enter="saveEdit({{ $cambio->id }})"
                                class="border rounded px-2 py-1 text-xs w-full">
                        @else
                            {{ $cambio->fecha_fin }}
                        @endif
                    </td>
                    <td class="px-2 py-1">
                        @if ($cambio->imagen1)
                            <img src="{{ asset('storage/' . $cambio->imagen1) }}" alt="Imagen"
                                class="h-12 w-12 object-cover rounded">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    <td class="px-2 py-1">
                    <td class="px-2 py-1">
                        @foreach ($roles as $role)
                            @if (is_array($cambio->roles) && in_array($role->id, $cambio->roles))
                                <span class="px-2 py-1 bg-gray-200 rounded text-xs">{{ $role->name }}</span>
                            @endif
                        @endforeach
                        <select multiple
                            wire:change="updateRoles({{ $cambio->id }}, Array.from($event.target.selectedOptions).map(o => o.value))">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if (is_array($cambio->roles) && in_array($role->id, $cambio->roles)) selected @endif>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </td>

                    </td>
                    <td class="px-2 py-1" ondblclick="Livewire.dispatch('startEdit', {{ $cambio->id }}, 'nota')">
                        @if ($editId === $cambio->id && $editField === 'nota')
                            <input type="text" wire:model.defer="editValue"
                                wire:keydown.enter="saveEdit({{ $cambio->id }})"
                                class="border rounded px-2 py-1 text-xs w-full">
                        @else
                            {{ $cambio->nota }}
                        @endif
                    </td>
                    <td class="px-2 py-1">
                        <button wire:click="delete({{ $cambio->id }})"
                            class="text-xs px-2 py-1 rounded bg-red-100 text-red-700 hover:bg-red-200">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
