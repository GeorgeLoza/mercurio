<div class="p-6 bg-white dark:bg-zinc-800 rounded-xl shadow-lg space-y-6">
    <div>
        <label class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200 mb-2">Selecciona un rol:</label>
        <select wire:model.live="rolSeleccionado"
                class="w-full px-4 py-2 border border-zinc-300 dark:border-zinc-700 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none dark:bg-zinc-900 dark:text-white">
            <option value="">-- Selecciona --</option>
            @foreach($roles as $rol)
                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
            @endforeach
        </select>
    </div>

    @if($rolSeleccionado)
        <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            @foreach($modulos as $modulo)
                <div class="border border-zinc-200 dark:border-zinc-700 rounded-lg p-4 bg-zinc-50 dark:bg-zinc-900 shadow-sm">
                    <h3 class="text-base font-bold text-indigo-600 dark:text-indigo-400 mb-2">
                        {{ $modulo->name }}
                    </h3>

                    <div class="flex flex-wrap gap-4">
                        @foreach($permisosPorModulo[$modulo->id] as $permiso)
                            <label class="inline-flex items-center space-x-2 text-sm text-zinc-700 dark:text-zinc-200">
                                <input type="checkbox"
                                       class="accent-indigo-500 focus:ring-0"
                                       wire:click="togglePermiso({{ $modulo->id }}, {{ $permiso->id }})"
                                       @if(isset($permisosAsignados[$modulo->id][$permiso->id])) checked @endif
                                >
                                <span>{{ $permiso->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
