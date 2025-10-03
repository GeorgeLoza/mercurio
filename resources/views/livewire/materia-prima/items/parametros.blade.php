<div>
    <div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg flex justify-between">
            <div class="w-1/3 p-4 border-r">
                <h2 class="text-lg font-bold mb-4">Editar Item</h2>

                <!-- Select Categoría -->
                <div class="mb-4">
                    <label class="block mb-1">Categoría</label>
                    <select wire:model.live="selectedCategoria" class="border px-2 py-1 w-full  dark:bg-slate-800">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categorias as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtro de búsqueda -->
                <div class="mb-4">
                    <label class="block mb-1">Buscar</label>
                    <input type="text" wire:model.live="filter" class="border px-2 py-1 w-full  dark:bg-slate-800"
                        placeholder="Filtrar items...">
                </div>

                <!-- Select Item -->
                <div class="mb-4">
                    <label class="block mb-1">Item</label>
                    <select wire:model.live="selectedItem" class="border px-2 py-1 w-full  dark:bg-slate-800">
                        <option value="">Selecciona un item</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }} - {{ $item->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="w-2/3 text-2xs pl-4">

                @if ($selectedItem)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <!-- Nombre -->
                        <div>
                            <label class="block mb-1">Nombre</label>
                            <input type="text" wire:model="itemData.nombre" class="border px-2 py-1 w-full dark:bg-slate-800">
                        </div>

                        <!-- Código -->
                        <div>
                            <label class="block mb-1">Código</label>
                            <input type="text" wire:model="itemData.codigo" class="border px-2 py-1 w-full dark:bg-slate-800">
                        </div>

                        <!-- Unidad -->
                        <div>
                            <label class="block mb-1">Unidad</label>
                            <select wire:model="itemData.unidad_id" class="border px-2 py-1 w-full dark:bg-slate-800">
                                @foreach ($unidades as $u)
                                    <option value="{{ $u->id }}">{{ $u->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3  gap-4 mb-1">

                        <!-- Descripción -->
                        <div>
                            <label class="block mb-1">Descripción</label>
                            <input type="text" wire:model="itemData.descripcion" class="border px-2 py-1 w-full dark:bg-slate-800">
                        </div>

                        <!-- Nivel de inspección -->
                        <div>
                            <label class="block mb-1">Nivel de inspección</label>
                            <input type="text" wire:model="itemData.nivel_inspeccion"
                                class="border px-2 py-1 w-full dark:bg-slate-800">
                        </div>

                        <!-- Nivel dilución -->
                        <div>
                            <label class="block mb-1">Nivel de dilución</label>
                            <input type="text" wire:model="itemData.Nivel_dilucion" class="border px-2 py-1 w-full dark:bg-slate-800">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">

                        <!-- NCA -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1">NCA Mín</label>
                                <input type="number" wire:model="itemData.nca_min" class="border px-2 py-1 w-full dark:bg-slate-800">
                            </div>
                            <div>
                                <label class="block mb-1">NCA Máx</label>
                                <input type="number" wire:model="itemData.nca_max" class="border px-2 py-1 w-full dark:bg-slate-800">
                            </div>
                        </div>



                        <!-- Temperatura -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1">Temp Mín</label>
                                <input type="number" wire:model="itemData.temp_min" class="border px-2 py-1 w-full dark:bg-slate-800">
                            </div>
                            <div>
                                <label class="block mb-1">Temp Máx</label>
                                <input type="number" wire:model="itemData.temp_max" class="border px-2 py-1 w-full dark:bg-slate-800">
                            </div>
                        </div>

                        <!-- pH -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1">pH Mín</label>
                                <input type="number" wire:model="itemData.ph_min" class="border px-2 py-1 w-full dark:bg-slate-800"
                                    step="0.01">
                            </div>
                            <div>
                                <label class="block mb-1">pH Máx</label>
                                <input type="number" wire:model="itemData.ph_max" class="border px-2 py-1 w-full dark:bg-slate-800"
                                    step="0.01">
                            </div>
                        </div>

                        <!-- Sólidos -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1">Sólidos Mín</label>
                                <input type="number" wire:model="itemData.solidos_min" class="border px-2 py-1 w-full dark:bg-slate-800"
                                    step="0.01">
                            </div>
                            <div>
                                <label class="block mb-1">Sólidos Máx</label>
                                <input type="number" wire:model="itemData.solidos_max" class="border px-2 py-1 w-full dark:bg-slate-800"
                                    step="0.01">
                            </div>
                        </div>

                        <!-- Acidez -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1">Acidez Mín</label>
                                <input type="number" wire:model="itemData.acidez_min" class="border px-2 py-1 w-full dark:bg-slate-800"
                                    step="0.01">
                            </div>
                            <div>
                                <label class="block mb-1">Acidez Máx</label>
                                <input type="number" wire:model="itemData.acidez_max" class="border px-2 py-1 w-full dark:bg-slate-800"
                                    step="0.01">
                            </div>
                        </div>

                        <!-- Densidad -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1">Densidad Mín</label>
                                <input type="number" wire:model="itemData.densidad_min"
                                    class="border px-2 py-1 w-full dark:bg-slate-800" step="0.01">
                            </div>
                            <div>
                                <label class="block mb-1">Densidad Máx</label>
                                <input type="number" wire:model="itemData.densidad_max"
                                    class="border px-2 py-1 w-full dark:bg-slate-800" step="0.01">
                            </div>
                        </div>

                        <!-- Viscosidad -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1">Viscosidad Mín</label>
                                <input type="number" wire:model="itemData.viscosidad_min"
                                    class="border px-2 py-1 w-full dark:bg-slate-800" step="0.01">
                            </div>
                            <div>
                                <label class="block mb-1">Viscosidad Máx</label>
                                <input type="number" wire:model="itemData.viscosidad_max"
                                    class="border px-2 py-1 w-full dark:bg-slate-800" step="0.01">
                            </div>
                        </div>

                        <!-- Organoléptica -->
                        <div>
                            <label class="block mb-1">Organoléptica</label>
                                <input type="text" wire:model="itemData.organoleptica" class="border px-2 py-1 w-full dark:bg-slate-800">

                       </div>
                    </div>



                @endif
            </div>


        </div>
        <div class="mt-4 flex justify-end gap-2">
            <button wire:click="cerrar" class="px-4 py-2 bg-gray-500 text-white rounded">Cerrar</button>
            <button wire:click="save" class="px-4 py-2 bg-green-600 text-white rounded">Guardar</button>
        </div>
    </div>
</div>
