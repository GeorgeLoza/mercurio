<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}





    {{--
    <div class="mb-2">
        <label for="origen_id" class="block text-sm font-medium">origen</label>
        <select wire:model.live="origen_id" id="origen_id" class="w-full border border-gray-500 rounded p-2">
            <option class="dark:bg-slate-800" value="">Seleccione una origen</option>
            @foreach ($origens as $origen)
                <option class="dark:bg-slate-800" value="{{ $origen->id }}">{{ $origen->alias }}

                </option>
            @endforeach
        </select>
        @error('origen_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="grid grid-cols-3 gap-4 mb-4">
        <div>
            <label for="hora_sachet" class="block text-sm font-medium">Hora </label>
            <input type="time" wire:model.live.debounce.500ms="hora_sachet" id="hora_sachet"
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
            @error('hora_sachet')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror


        </div>
        <div>
            <label for="peso" class="block text-sm font-medium">peso:</label>
            <input type="number" wire:model="peso" id="peso" placeholder="peso"
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
            @error('peso')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

        </div>
        <div>
            <label for="temperatura" class="block text-sm font-medium">temperatura:</label>
            <input type="text" wire:model="temperatura" id="temperatura" placeholder="temperatura"
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
            @error('temperatura')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

        </div>
        <div>
            <label for="ph" class="block text-sm font-medium">ph:</label>
            <input type="text" wire:model="ph" id="ph" placeholder="ph"
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
            @error('ph')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

        </div>
        <div>
            <label for="brix" class="block text-sm font-medium">brix:</label>
            <input type="text" wire:model="brix" id="brix" placeholder="brix"
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
            @error('brix')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

        </div>
        <div>
            <label for="acidez" class="block text-sm font-medium">acidez:</label>
            <input type="text" wire:model="acidez" id="acidez" placeholder="acidez"
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
            @error('acidez')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

        </div>
        <div>
            <label for="viscosidad" class="block text-sm font-medium">viscosidad:</label>
            <input type="text" wire:model="viscosidad" id="viscosidad" placeholder="viscosidad"
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
            @error('viscosidad')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror



        </div>



        <div class="flex gap-1 justify-around mb-3 col-span-2">

            <div class="flex items-end">
                <input  id="color" wire:model.live="color" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Color</label>
            </div>

            <div class="flex items-end">
                <input  id="olor" wire:model.live="olor" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Olor</label>
            </div>

            <div class="flex items-end">
                <input  id="sabor" wire:model.live="sabor" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checked-checkbox"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sabor</label>
            </div>
        </div>
    </div>





    <div>
        <label class="block text-sm font-medium  mb-2">Observaciones</label>
        <input wire:model="observaciones" type="text" min="0"
            class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
        @error('observaciones')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div> --}}
    <div>
            <label for="numero" class="block text-sm font-medium">numero:</label>
            <input type="number" wire:model="numero" id="numero" placeholder="numero"
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
            @error('numero')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

        </div>

    <div class="flex justify-end space-x-2 mt-4">
        <button wire:click="save" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
        <button wire:click="$dispatch('closeModal')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Cancelar
        </button>
    </div>
</div>
