<div >
    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
        <!-- Modal header -->
        <div
            class="flex items-center justify-between p-1 md:p-2 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Nuevo registro de temperatura
            </h3>
            
        </div>
        <!-- Modal body -->
        <div class="p-1 md:p-2">
            <form wire:submit.prevent="guardar" class="space-y-2">
                
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Dispositivo</label>
                    <select wire:model.live="dispositivos_medicion_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Seleccione...</option>
                        @foreach ($dispositivos as $dispositivo)
                            <option value="{{ $dispositivo->id }}">{{ $dispositivo->codigo }} -
                                {{ $dispositivo->dispositivo }}</option>
                        @endforeach
                    </select>
                    @error('dispositivos_medicion_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Patrón 1</label>
                        <input type="number" step="0.01" wire:model.live="patron_1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Inst. 1</label>
                        <input type="number" step="0.01" wire:model.live="inst_1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Error 1</label>
                        <input type="number" step="0.01" wire:model.live="error_1" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Patrón 2</label>
                        <input type="number" step="0.01" wire:model.live="patron_2"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Inst. 2</label>
                        <input type="number" step="0.01" wire:model.live="inst_2"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Error 2</label>
                        <input type="number" step="0.01" wire:model.live="error_2" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Patrón 3</label>
                        <input type="number" step="0.01" wire:model.live="patron_3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Inst. 3</label>
                        <input type="number" step="0.01" wire:model.live="inst_3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Error 3</label>
                        <input type="number" step="0.01" wire:model.live="error_3" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                    <select wire:model.live="estado"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Seleccione...</option>
                        <option value="Bien">Bien</option>
                        <option value="Mal">Mal</option>
                        <option value="Observado">Observado</option>
                    </select>
                    @error('estado')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
                    <textarea wire:model.live="observaciones"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="submit"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
