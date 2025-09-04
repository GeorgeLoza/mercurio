<div class="p-6 space-y-6">
    <h2 class="text-2xl font-bold text-gray-800">Gestión de Cambios</h2>

    {{-- Mensaje flash --}}
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2500)" x-show="show"
             class="mb-4 px-4 py-3 rounded bg-green-100 text-green-700 text-sm shadow"
             x-transition>
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario de creación --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">Nuevo cambio</h3>

        <form wire:submit.prevent="store" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                    <input type="text" wire:model.defer="titulo"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <input type="text" wire:model.defer="descripcion"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha Inicio</label>
                    <input type="date" wire:model.defer="fecha_inicio"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha Fin</label>
                    <input type="date" wire:model.defer="fecha_fin"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
                    <input type="file" wire:model="imagen1"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('imagen1') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    <div wire:loading wire:target="imagen1" class="text-xs text-blue-600 mt-1">Subiendo...</div>
                    @if ($imagen1)
                        <img src="{{ $imagen1->temporaryUrl() }}" class="h-20 mt-2 rounded-lg shadow">
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Roles</label>
                    <select wire:model.defer="roles_selected" multiple
                        class="w-full border-gray-300 rounded-lg shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nota</label>
                    <input type="text" wire:model.defer="nota"
                        class="w-full border-gray-300 rounded-lg shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
            <div class="pt-2">
                <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm hover:bg-blue-700 shadow">
                    Crear Cambio
                </button>
            </div>
        </form>
    </div>

    {{-- Tabla de cambios --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Título</th>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Descripción</th>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Inicio</th>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Fin</th>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Imagen</th>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Roles</th>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nota</th>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                @foreach ($cambios as $cambio)
                    <tr class="hover:bg-gray-50">
                        {{-- Edición inline --}}
                        <td class="px-3 py-2" ondblclick="Livewire.dispatch('startEdit', {{ $cambio->id }}, 'titulo')">
                            @if ($editId === $cambio->id && $editField === 'titulo')
                                <input type="text" wire:model.defer="editValue" wire:keydown.enter="saveEdit({{ $cambio->id }})"
                                       class="border rounded px-2 py-1 text-xs w-full">
                            @else
                                {{ $cambio->titulo }}
                            @endif
                        </td>
                        <td class="px-3 py-2" ondblclick="Livewire.dispatch('startEdit', {{ $cambio->id }}, 'descripcion')">
                            @if ($editId === $cambio->id && $editField === 'descripcion')
                                <input type="text" wire:model.defer="editValue" wire:keydown.enter="saveEdit({{ $cambio->id }})"
                                       class="border rounded px-2 py-1 text-xs w-full">
                            @else
                                {{ $cambio->descripcion }}
                            @endif
                        </td>
                        <td class="px-3 py-2">
                            {{ $cambio->fecha_inicio }}
                        </td>
                        <td class="px-3 py-2">
                            {{ $cambio->fecha_fin }}
                        </td>
                        <td class="px-3 py-2">
                            @if ($cambio->imagen1)
                                <img src="{{ asset('storage/' . $cambio->imagen1) }}" class="h-12 w-12 object-cover rounded">
                            @else
                                <span class="text-gray-400">Sin imagen</span>
                            @endif
                        </td>
                        <td class="px-3 py-2 space-x-1">
                            @foreach ($roles as $role)
                                @if (is_array($cambio->roles) && in_array($role->id, $cambio->roles))
                                    <span class="px-2 py-1 bg-gray-100 rounded text-xs">{{ $role->name }}</span>
                                @endif
                            @endforeach
                            <select multiple
                                wire:change="updateRoles({{ $cambio->id }}, Array.from($event.target.selectedOptions).map(o => o.value))"
                                class="mt-1 text-xs border-gray-300 rounded">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @if (is_array($cambio->roles) && in_array($role->id, $cambio->roles)) selected @endif>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-3 py-2">
                            {{ $cambio->nota }}
                        </td>
                        <td class="px-3 py-2">
                            <button wire:click="delete({{ $cambio->id }})"
                                class="text-xs px-3 py-1 rounded bg-red-100 text-red-700 hover:bg-red-200">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
