<div class="p-6 bg-white rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Gestión de Roles</h1>
        <button wire:click.prevent="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded">Nuevo
            Rol</button>
    </div>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-2 py-1 text-left font-medium">Nombre</th>
                    <th class="px-2 py-1 text-left font-medium">Descripción</th>
                    <th class="px-2 py-1 text-center font-medium">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $r)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-2 py-1">{{ $r->name }}</td>
                        <td class="px-2 py-1">{{ $r->description }}</td>
                        <td class="px-2 py-1 text-center space-x-2">
                            <button wire:click.prevent="openModal({{ $r->id }})"
                                class="text-blue-600 hover:underline">Editar</button>
                            <button wire:click.prevent="delete({{ $r->id }})"
                                class="text-red-600 hover:underline">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $roles->links() }}</div>

    <!-- Modal -->
    @if ($modalOpen)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <button wire:click="$set('modalOpen', false)"
                    class="absolute top-2 right-2 text-gray-400 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h2 class="text-xl font-semibold mb-4">{{ $role_id ? 'Editar Rol' : 'Nuevo Rol' }}</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Nombre</label>
                        <input wire:model.defer="name" class="mt-1 w-full border-gray-300 rounded-md shadow-sm" />
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Descripción</label>
                        <input wire:model.defer="description"
                            class="mt-1 w-full border-gray-300 rounded-md shadow-sm" />
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button wire:click="save"
                        class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded">Guardar</button>
                </div>
            </div>
        </div>
    @endif
</div>
