<div>


    <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Analisis de
            Agua Fisco</h3>

        <div >
            <div class="form-group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="observaciones">Observaciones</label>
                <textarea wire:model.defer="observaciones" id="observaciones" rows="5"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                @error('observaciones') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button wire:click.prevent="guardarObservaciones"  class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
        </div>
    </div>
</div>


