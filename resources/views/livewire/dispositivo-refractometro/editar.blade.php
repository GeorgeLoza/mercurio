<div>
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
        <!-- Modal header -->
        <div
            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Actualizar registro de Refractómetro
            </h3>
        </div>
        <!-- Modal body -->
        <div class="p-1 md:p-2">
            <form wire:submit.prevent="actualizar" class="space-y-2">

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dispositivo</label>
                    <select wire:model.defer="dispositivos_medicion_id"
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
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Verificación
                            Temperatura</label>
                        <input type="number" step="0.01" wire:model.defer="verificacion_temperatura"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Verificación
                            Conc. 0%</label>
                        <input type="number" step="0.01" wire:model.defer="verificacion_concentracion_0"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Verificación
                            Conc. 25%</label>
                        <input type="number" step="0.01" wire:model.defer="verificacion_concentracion_25"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">¿Requiere
                        ajuste?</label>
                    <select wire:model.defer="requiere_ajuste"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Seleccione...</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                    @error('requiere_ajuste')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Ajuste
                            Temperatura</label>
                        <input type="number" step="0.01" wire:model.defer="verificacion_ajuste_temperatura"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Ajuste Conc.
                            0%</label>
                        <input type="number" step="0.01" wire:model.defer="verificacion_ajuste_concentracion_0"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div>
                        <label class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Ajuste Conc.
                            25%</label>
                        <input type="number" step="0.01" wire:model.defer="verificacion_ajuste_concentracion_25"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                    <select wire:model.defer="estado"
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
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
                    <textarea wire:model.defer="observaciones"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="submit"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
