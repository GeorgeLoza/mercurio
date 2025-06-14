<div>

    <div>

        <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold  text-center ">
            Nueva Recepción de Materia Prima
        </h2>


    </div>

    <div class="flex gap-2">

        <div class="mb-2">
            <label for="categoria" class="block text-sm font-medium">Categoria</label>
            <select wire:model.live="categoria" id="categoria" class="w-full border border-gray-500 rounded p-2">
                <option class="dark:bg-slate-800" value="">Seleccione una categoria</option>

                <option class="dark:bg-slate-800" value="1"> categoria
                </option>

            </select>
            @error('categoria')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2 w-full">
            <label for="item" class="block text-sm font-medium">Materia Prima</label>
            <select wire:model.live="item" id="item" class="w-full border border-gray-500 rounded p-2">
                <option class="dark:bg-slate-800" value="">Seleccione una MP</option>

                <option class="dark:bg-slate-800" value="1"> Materia Prima
                </option>

            </select>
            @error('item')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="flex gap-2">
        <div>
            <label class="block text-sm font-medium  ">Unidades</label>
            <input wire:model="undiades" type="number" min="0"
                class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
            @error('unidades')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium  ">Cantidad</label>
            <input wire:model="cantidad" type="number" min="0"
                class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
            @error('cantidad')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="flex gap-2">

        <div class="mb-2">
            <label for="proveedor" class="block text-sm font-medium ">Proveedores</label>
            <select wire:model.live="proveedor" id="proveedor" class="w-full border border-gray-500 rounded p-2">
                <option class="dark:bg-slate-800" value="">Seleccione Proveedor</option>

                <option class="dark:bg-slate-800" value="1"> Ubicacion 1
                </option>

            </select>
            @error('proveedor')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium  ">Marca</label>
            <input wire:model="marca" type="text" min="0"
                class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
            @error('marca')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
        <label class="block text-sm font-medium  ">Lote</label>
        <input wire:model="lote" type="number" min="0"
            class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
        @error('lote')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    </div>


    <div class="flex gap-2">
        <div class="mb-2">
            <label for="ubicacion" class="block text-sm font-medium">Ubicacion</label>
            <select wire:model.live="ubicacion" id="ubicacion" class="w-full border border-gray-500 rounded p-2">
                <option class="dark:bg-slate-800" value="">Seleccione una Ubicacion</option>

                <option class="dark:bg-slate-800" value="1"> Ubicacion 1
                </option>

            </select>
            @error('ubicacion')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="almacenero" class="block text-sm font-medium">Alacenero</label>
            <select wire:model.live="almacenero" id="almacenero" class="w-full border border-gray-500 rounded p-2">
                <option class="dark:bg-slate-800" value="">Seleccione una Almacenero</option>

                <option class="dark:bg-slate-800" value="1"> almacenero
                </option>

            </select>
            @error('item')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>



    </div>

    <div class="w-full flex  gap-2 justify-around ">
        <div>
            <p>Fecha De Elaboracion</p>
            <input type="date" wire:model="fechaElaboracion" class="border rounded p-1  dark:bg-slate-800" />
            @error('fechaElaboracion')
                <p class="text-red-500">Debe colocar una fecha</p>
            @enderror
        </div>
        <div>
            <p>Fecha De Vencimiento</p>
            <input type="date" wire:model="fechaVencimiento" class="border rounded p-1 dark:bg-slate-800" />
            @error('fechaVencimiento')
                <p class="text-red-500">Debe colocar una fecha</p>
            @enderror
        </div>

    </div>
<div class="grid grid-cols-2 gap-2  m-2  ">

    <div class="flex items-center">
        <input id="limpiezaTransporte" wire:model="limpiezaTransporte" type="checkbox"
            class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="limpiezaTransporte" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Limpieza de
            Transporte </label>
    </div>
    <div class="flex items-center">
        <input id="sinElementos" wire:model="sinElementos" type="checkbox"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="sinElementos" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sin Elementos
            Extraños </label>
    </div>
    <div class="flex items-center">
        <input id="cerrado" wire:model="cerrado" type="checkbox"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="cerrado" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cerrado</label>
    </div>
    <div class="flex items-center">
        <input id="nit" wire:model="nit" type="checkbox"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="nit" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIT</label>
    </div>
    <div class="flex items-center">
        <input id="rs" wire:model="rs" type="checkbox"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="rs" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">RS</label>

    </div>
    <div class="flex items-center">
        <input id="certificado" wire:model="certificado" type="checkbox"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="certificado" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Certificado</label>

    </div>

</div>


    <div>
        <label class="block text-sm font-medium  ">Observaciones</label>
        <input wire:model="observacion" type="text"
            class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
        @error('observacion')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium  ">Correcciones</label>
        <input wire:model="correccion" type="text"
            class="w-full border rounded p-2 mb-2 dark:bg-slate-800 border-gray-500">
        @error('correccion')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex justify-end space-x-2 mt-4">
        <button wire:click="guardar" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
        <button wire:click="$dispatch('closeModal')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Cancelar
        </button>

    </div>


</div>
