<div class="p-4 max-h-[80vh] overflow-y-auto bg-white dark:bg-gray-900 transition-colors">
    <!-- Encabezado -->
    <div class="border-b pb-3 mb-4 border-gray-200 dark:border-gray-700">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
            Parámetros para: {{ $producto->nombre }}
        </h2>
    </div>

    <!-- Pestañas de Etapas -->
    <div class="mb-6">
        <div class="flex flex-wrap gap-2">
            @foreach($etapas as $etapa)
                <button 
                    @class([
                        'px-2 py-1 rounded-full text-xs font-medium transition',
                        'bg-blue-600 text-white shadow' => $activeTab == $etapa->id,
                        'bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700' => $activeTab != $etapa->id
                    ])
                    wire:click="selectEtapa({{ $etapa->id }})"
                >
                    {{ $etapa->nombre }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Formulario Compacto -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-2 mb-4 shadow-sm">
        @if($etapa_id)
            <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-100">
                Parámetros para: {{ $etapas->find($etapa_id)->nombre }}
            </h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Temperatura -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Temperatura (°C)</label>
                    <div class="flex space-x-2">
                        <div class="flex-1">
                            <input type="number" step="0.01" wire:model="temperatura_min" 
                                placeholder="Mín" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                        <div class="flex-1">
                            <input type="number" step="0.01" wire:model="temperatura_max" 
                                placeholder="Máx" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                    </div>
                </div>

                <!-- pH -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">pH</label>
                    <div class="flex space-x-2">
                        <div class="flex-1">
                            <input type="number" step="0.01" wire:model="ph_min" 
                                placeholder="Mín" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                        <div class="flex-1">
                            <input type="number" step="0.01" wire:model="ph_max" 
                                placeholder="Máx" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                    </div>
                </div>

                <!-- Acidez -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Acidez (%)</label>
                    <div class="flex space-x-2">
                        <div class="flex-1">
                            <input type="number" step="0.001" wire:model="acidez_min" 
                                placeholder="Mín" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                        <div class="flex-1">
                            <input type="number" step="0.001" wire:model="acidez_max" 
                                placeholder="Máx" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                    </div>
                </div>

                <!-- Brix -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Brix (°Bx)</label>
                    <div class="flex space-x-2">
                        <div class="flex-1">
                            <input type="number" step="0.01" wire:model="brix_min" 
                                placeholder="Mín" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                        <div class="flex-1">
                            <input type="number" step="0.01" wire:model="brix_max" 
                                placeholder="Máx" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                    </div>
                </div>

                <!-- Viscosidad -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Viscosidad (cP)</label>
                    <div class="flex space-x-2">
                        <div class="flex-1">
                            <input type="number" step="0.01" wire:model="viscosidad_min" 
                                placeholder="Mín" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                        <div class="flex-1">
                            <input type="number" step="0.01" wire:model="viscosidad_max" 
                                placeholder="Máx" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                    </div>
                </div>

                <!-- Densidad -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Densidad (g/ml)</label>
                    <div class="flex space-x-2">
                        <div class="flex-1">
                            <input type="number" step="0.001" wire:model="densidad_min" 
                                placeholder="Mín" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                        <div class="flex-1">
                            <input type="number" step="0.001" wire:model="densidad_max" 
                                placeholder="Máx" 
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="flex justify-between mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                <div>
                    @if($parametro_id)
                        <button type="button" wire:click="deleteParametro" 
                            class="px-2 py-1 text-sm bg-red-100 text-red-700 rounded-lg hover:bg-red-200 dark:bg-red-900 dark:text-red-200 dark:hover:bg-red-800 transition"
                            onclick="return confirm('¿Eliminar parámetros de esta etapa?')">
                            Eliminar
                        </button>
                    @endif
                </div>
                <div class="flex space-x-3">
                    <button type="button" wire:click="resetForm" 
                        class="px-2 py-1 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 transition">
                        Limpiar
                    </button>
                    <button type="button" wire:click="saveParametro" 
                        class="px-2 py-1 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Guardar Parámetros
                    </button>
                </div>
            </div>
        @else
            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-2">Seleccione una etapa para configurar sus parámetros</p>
            </div>
        @endif
    </div>

    <!-- Resumen de Parámetros -->
    <div class="mt-4">
        <h3 class="font-semibold text-gray-700 dark:text-gray-200 mb-2">Resumen de Parámetros</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr class="text-center">
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase" nowrap>Etapa</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase" nowrap>Temp (°C)</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase" nowrap>pH</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase" nowrap>Acidez</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase" nowrap>Brix</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase" nowrap>Viscosidad</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase" nowrap>Densidad</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase" nowrap>Estado</th>
                        
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($parametros as $param)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer" 
                            wire:click="selectEtapa({{ $param->etapa_id }})">
                            <td class="py-2 px-3 text-xs font-medium text-gray-900 dark:text-gray-100">
                                {{ $param->etapa->nombre }}
                            </td>
                            <td class="py-2 px-3 text-xs text-gray-500 dark:text-gray-200" nowrap>
                                @if($param->temperatura_min && $param->temperatura_max)
                                    {{ $param->temperatura_min/1 }} - {{ $param->temperatura_max/1 }}
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">N/D</span>
                                @endif
                            </td>
                            <td class="py-2 px-3 text-xs text-gray-500 dark:text-gray-200" nowrap>
                                @if($param->ph_min && $param->ph_max)
                                    {{ $param->ph_min/1 }} - {{ $param->ph_max/1 }}
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">N/D</span>
                                @endif
                            </td>
                            <td class="py-2 px-3 text-xs text-gray-500 dark:text-gray-200" nowrap>
                                @if($param->acidez_min && $param->acidez_max)
                                    {{ $param->acidez_min/1 }} - {{ $param->acidez_max/1 }}
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">N/D</span>
                                @endif
                            </td>
                            <td class="py-2 px-3 text-xs text-gray-500 dark:text-gray-200" nowrap>
                                @if($param->brix_min && $param->brix_max)
                                    {{ $param->brix_min/1 }} - {{ $param->brix_max/1 }}
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">N/D</span>
                                @endif
                            </td>
                            <td class="py-2 px-3 text-xs text-gray-500 dark:text-gray-200" nowrap>
                                @if($param->viscosidad_min && $param->viscosidad_max)
                                    {{ $param->viscosidad_min/1 }} - {{ $param->viscosidad_max/1 }}
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">N/D</span>
                                @endif
                            </td>
                            <td class="py-2 px-3 text-xs text-gray-500 dark:text-gray-200" nowrap>
                                @if($param->densidad_min && $param->densidad_max)
                                    {{ $param->densidad_min/1 }} - {{ $param->densidad_max/1 }}
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">N/D</span>
                                @endif
                            </td>
                            
                            <td class="py-2 px-3 text-right" wire:click.stop>
                                <button type="button"
                                    class="text-xs px-2 py-1 rounded bg-red-100 text-red-700 hover:bg-red-200 dark:bg-red-900 dark:text-red-200 dark:hover:bg-red-800 transition"
                                    onclick="event.stopPropagation(); if(confirm('¿Eliminar parámetros de esta etapa?')) { @this.selectEtapa({{ $param->etapa_id }}); @this.deleteParametro(); }">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-4 px-3 text-center text-xs text-gray-500 dark:text-gray-400">
                                No hay parámetros configurados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>