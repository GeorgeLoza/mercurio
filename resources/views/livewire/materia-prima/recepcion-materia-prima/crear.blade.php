<div class="p-4 md:p-6 bg-white dark:bg-gray-900 rounded-lg shadow-lg space-y-4">

    <!-- Título -->
    <h2 class="text-xl md:text-2xl text-gray-800 dark:text-gray-200 font-bold text-center">
        Nueva Recepción de Materia Prima
    </h2>

    <!-- CATEGORÍA & MATERIA PRIMA -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label for="categoria" class="block text-xs md:text-sm font-semibold mb-1 text-gray-700 dark:text-gray-300">
                Categoría
            </label>
            <select wire:model.live="categoria" id="categoria"
                class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm dark:bg-slate-800 focus:ring focus:ring-blue-300">
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            @error('categoria')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="f_item" class="block text-xs md:text-sm font-semibold mb-1 text-gray-700 dark:text-gray-300">
                Filtro Materia Prima
            </label>
            <input type="text" wire:model.live="f_item" id="f_item"
                class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm dark:bg-slate-800 focus:ring focus:ring-blue-300"
                placeholder="Filtrar materia prima...">

            @error('f_item')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="item" class="block text-xs md:text-sm font-semibold mb-1 text-gray-700 dark:text-gray-300">
                Materia Prima
            </label>
            <div class="flex items- space-x-2">


                <select wire:model.live="item" id="item"
                    class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm dark:bg-slate-800 focus:ring focus:ring-blue-300">
                    <option value="">Seleccione una Materia Prima</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                    @endforeach
                </select>
                @error('item')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

                <button class="bg-green-500 rounded-md text-white  py-1.5 px-2 text-lg mb-2"
                    onclick="Livewire.dispatch('openModal', { component: 'materiaPrima.items.crear' })">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 fill-white" viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                </button>
            </div>
        </div>


    </div>

    <!-- DATOS BÁSICOS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label class="block text-xs md:text-sm font-semibold mb-1">Unidades</label>
            <input wire:model="unidad" type="text"
                class="w-full border rounded px-2 py-1.5 text-sm dark:bg-slate-800 border-gray-300 focus:ring focus:ring-blue-300">
            @error('unidad')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <div>
                <label class="block text-xs md:text-sm font-semibold mb-1">Cantidad</label>
            </div>
            <div class="flex items-center gap-1">
                <div>

                    <input wire:model="cantidad" type="number"
                        class="w-full border rounded px-2 py-1.5 text-sm dark:bg-slate-800 border-gray-300 focus:ring focus:ring-blue-300">
                    @error('cantidad')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">

                    {{ $unidadMedida ?? '' }}

                </div>

            </div>

        </div>

        <div>
            <label class="block text-xs md:text-sm font-semibold mb-1">Marca</label>
            <input wire:model="marca" type="text"
                class="w-full border rounded px-2 py-1.5 text-sm dark:bg-slate-800 border-gray-300 focus:ring focus:ring-blue-300">
            @error('marca')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- PROVEEDOR / UBICACIÓN / ALMACENERO -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">

        {{-- filtro proveedor --}}
        <div>
            <label for="f_proveedor"
                class="block text-xs md:text-sm font-semibold mb-1 text-gray-700 dark:text-gray-300">
                Filtro Proveedor
            </label>
            <input type="text" wire:model.live="f_proveedor" id="f_proveedor"
                class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm dark:bg-slate-800 focus:ring focus:ring-blue-300"
                placeholder="Filtrar proveedor...">

            @error('f_proveedor')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <!-- Proveedor -->
        <div class="flex items-end">
            <div>

                <label for="proveedor" class="block text-xs md:text-sm font-semibold mb-1">Proveedor</label>
                <select wire:model.live="proveedor" id="proveedor"
                    class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm dark:bg-slate-800 focus:ring focus:ring-blue-300">
                    <option value="">Seleccione Proveedor</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
                @error('proveedor')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>
            <div>
                <button class="bg-green-500 rounded-md text-white  py-1.5 px-2 text-lg ml-1"
                    onclick="Livewire.dispatch('openModal', { component: 'materiaPrima.proveedor.crear' })">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 fill-white" viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Ubicación -->
        <div>
            <label for="ubicacion" class="block text-xs md:text-sm font-semibold mb-1">Ubicación</label>
            <select wire:model.live="ubicacion" id="ubicacion"
                class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm dark:bg-slate-800 focus:ring focus:ring-blue-300">
                <option value="">Seleccione Ubicación</option>
                <option value="SOALPRO">SOALPRO</option>
                <option value="CARSA">CARSA</option>
                <option value="CASCADA">CASCADA</option>
            </select>
            @error('ubicacion')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Almacenero -->
        <div class="flex items-end">
            <div>
                <label for="almacenero" class="block text-xs md:text-sm font-semibold mb-1">Almacenero</label>
                <select wire:model.live="almacenero" id="almacenero"
                    class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm dark:bg-slate-800 focus:ring focus:ring-blue-300">
                    <option value="">Seleccione Almacenero</option>
                    @foreach ($almaceneros as $almacenero)
                        <option value="{{ $almacenero->id }}">{{ $almacenero->nombre }}</option>
                    @endforeach
                </select>
                @error('almacenero')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button class="bg-green-500 rounded-md text-white  py-1.5 px-2 text-lg ml-1"
                    onclick="Livewire.dispatch('openModal', { component: 'materiaPrima.almacenero.crear' })">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 fill-white" viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                </button>
            </div>
        </div>



    </div>





    <!-- LOTES DINÁMICOS -->
    <div class="space-y-3">
        <label class="block text-xs md:text-sm font-semibold">Lotes</label>

        @foreach ($lotes as $index => $lote)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 items-end border p-2 rounded-md">
                <div>
                    <label class="text-xs">F. Elaboración</label>
                    <input type="date" wire:model="lotes.{{ $index }}.fecha_elaboracion"
                        class="w-full border rounded px-2 py-1 text-sm dark:bg-slate-800">
                </div>

                <div>
                    <label class="text-xs">F. Vencimiento</label>
                    <input type="date" wire:model="lotes.{{ $index }}.fecha_vencimiento"
                        class="w-full border rounded px-2 py-1 text-sm dark:bg-slate-800">
                </div>

                <div>
                    <label class="text-xs">Lote</label>
                    <input type="text" wire:model="lotes.{{ $index }}.lote"
                        class="w-full border rounded px-2 py-1 text-sm dark:bg-slate-800">
                </div>

                <div class="flex justify-end">
                    @if ($index > 0)
                        <button type="button" wire:click="removeLote({{ $index }})"
                            class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                            Eliminar
                        </button>
                    @endif
                </div>
            </div>
        @endforeach

        <button type="button" wire:click="addLote"
            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
            + Agregar Lote
        </button>
    </div>


    <!-- CHECKBOXES -->
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
        @foreach (['limpiezaTransporte' => 'Limp. Trans.', 'sinElementos' => 'Sin Elem. Ext.', 'cerrado' => 'Cerrado', 'nit' => 'NIT', 'rs' => 'RS', 'certificado' => 'Certificado'] as $key => $label)
            <label class="flex items-center text-xs md:text-sm space-x-2">
                <input id="{{ $key }}" wire:model.live="{{ $key }}" type="checkbox"
                    class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                <span>{{ $label }}</span>
            </label>
        @endforeach
    </div>

    <!-- OBSERVACIONES & CORRECCIONES -->
    @foreach (['observacion' => 'Observaciones', 'correccion' => 'Correcciones'] as $field => $label)
        <div>
            <label class="block text-xs md:text-sm font-semibold mb-1">{{ $label }}</label>
            <input wire:model="{{ $field }}" type="text"
                class="w-full border rounded px-2 py-1.5 text-sm dark:bg-slate-800 border-gray-300 focus:ring focus:ring-blue-300">
            @error($field)
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
    @endforeach

    @if ($certificado != false)
        <div>
            <label class="block text-xs md:text-sm font-semibold mb-1">Código de Certificado</label>
            <input wire:model="codigo_certificado" type="text"
                class="w-full border rounded px-2 py-1.5 text-sm dark:bg-slate-800 border-gray-300 focus:ring focus:ring-blue-300">
            @error('codigo_certificado')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
    @endif

    <!-- BOTONES -->
    <div class="flex justify-end space-x-2 pt-4 border-t border-gray-300">
        <button wire:click="guardar"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm md:text-base shadow transition">
            Guardar
        </button>
        <button wire:click="$dispatch('closeModal')"
            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm md:text-base shadow transition">
            Cancelar
        </button>
    </div>

</div>
