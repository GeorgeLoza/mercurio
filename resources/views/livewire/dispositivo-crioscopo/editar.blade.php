<div>
    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
        <!-- Modal header -->
        <div
            class="flex items-center justify-between p-1 md:p-2 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Nuevo registro de crioscopo
            </h3>

        </div>
        <!-- Modal body -->
        <div class="p-1 md:p-2">
            <form wire:submit.prevent="actualizar" class="space-y-2">

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Dispositivo</label>
                    <select wire:model="dispositivos_medicion_id"
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
                <div class="flex items-center mb-4">
                    <input wire:model="punto_ajuste_a" id="punto_ajuste_a" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="punto_ajuste_a" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Punto
                        de ajuste A</label>
                    @error('punto_ajuste_a')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input wire:model="punto_ajuste_b" id="punto_ajuste_b" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="punto_ajuste_b" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Punto
                        de ajuste B</label>
                    @error('punto_ajuste_b')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                    <select wire:model="estado"
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
                    <textarea wire:model="observaciones"
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
