<div class="flex gap-4">
    <div class="w-1/4">
        <form wire:submit.prevent="{{ $tipoMuestraId ? 'update' : 'create' }}" novalidate>
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" wire:model="nombre" id="nombre"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="nombre"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                @error('nombre')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" wire:model="norma_referencial" id="norma_referencial"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="norma_referencial"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Norma
                    Referencial</label>
                @error('norma_referencial')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" wire:model="unidad" id="unidad"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="unidad"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Unidad</label>
                @error('unidad')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" wire:model="aclaUni" id="aclaUni"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="aclaUni"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Aclaración
                    Unidad</label>
                @error('aclaUni')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex gap-1">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" wire:model="min_mes" id="min_mes"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" ">
                    <label for="min_mes"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min
                        Mes</label>
                    @error('min_mes')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="min_mes_e" id="min_mes_e"
                        class="block py-2.5 px-0 w-8 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" ">
                    
                    @error('min_mes_e')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" wire:model="max_mes" id="max_mes"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" ">
                    <label for="max_mes"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max
                        Mes</label>
                    @error('max_mes')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" wire:model="max_mes_e" id="max_mes_e"
                        class="block py-2.5 px-0 w-8 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" ">
                    
                    @error('max_mes_e')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex gap-1">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" wire:model="min_colTot" id="min_colTot"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="min_colTot"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min
                    Col Tot</label>
                @error('min_colTot')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="number" wire:model="min_colTot_e" id="min_colTot_e"
                    class="block py-2.5 px-0 w-8 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                @error('min_colTot_e')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" wire:model="max_colTot" id="max_colTot"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="max_colTot"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max
                    Col Tot</label>
                @error('max_colTot')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="number" wire:model="max_colTot_e" id="max_colTot_e"
                    class="block py-2.5 px-0 w-8 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                @error('max_colTot_e')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            </div>

            <div class="flex gap-1">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" wire:model="min_mohLev" id="min_mohLev"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="min_mohLev"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Min
                    Moh Lev</label>
                @error('min_mohLev')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="number" wire:model="min_mohLev_e" id="min_mohLev_e"
                    class="block py-2.5 px-0 w-8 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                @error('min_mohLev_e')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" wire:model="max_mohLev" id="max_mohLev"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="max_mohLev"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Max
                    Moh Lev</label>
                @error('max_mohLev')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="number" wire:model="max_mohLev_e" id="max_mohLev_e"
                    class="block py-2.5 px-0 w-8 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                @error('max_mohLev_e')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                    {{ $tipoMuestraId ? 'Actualizar' : 'Crear' }}
                </button>
                <button type="button" wire:click="resetFields"
                    class="ml-2 px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white text-sm font-medium rounded-md">
                    Cancelar
                </button>
            </div>
        </form>
    </div>

    <div class="w-3/4">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center ">
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Nombre</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Norma Referencial</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Unidad</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Aclaración Unidad</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Min Mes</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Max Mes</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Min Col Tot</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Max Col Tot</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Min Moh Lev</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Max Moh Lev</th>
                        <th class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipoMuestras as $tipoMuestra)
                        <tr>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $tipoMuestra->nombre }}</td>
                            <td class="px-2 py-1 max-w-xs truncate" title="{{ $tipoMuestra->norma_referencial }}">
                                {{ $tipoMuestra->norma_referencial }}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $tipoMuestra->unidad }}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $tipoMuestra->aclaUni }}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $tipoMuestra->min_mes }} @if ($tipoMuestra->min_mes != '--' && $tipoMuestra->min_mes != 'S/R')
                                    <sup>{{ $tipoMuestra->min_mes_e }}</sup>
                                @endif
                            </td>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $tipoMuestra->max_mes }} @if ($tipoMuestra->max_mes != '--' && $tipoMuestra->max_mes != 'S/R')
                                    <sup>{{ $tipoMuestra->max_mes_e }}</sup>
                                @endif
                            </td>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $tipoMuestra->min_colTot }} @if ($tipoMuestra->min_colTot != '--' && $tipoMuestra->min_colTot != 'S/R')
                                    <sup>{{ $tipoMuestra->min_colTot_e }}</sup>
                                @endif
                            </td>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $tipoMuestra->max_colTot }} @if ($tipoMuestra->max_colTot != '--' && $tipoMuestra->max_colTot != 'S/R')
                                    <sup>{{ $tipoMuestra->max_colTot_e }}</sup>
                                @endif
                            </td>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $tipoMuestra->min_mohLev }} @if ($tipoMuestra->min_mohLev != '--' && $tipoMuestra->min_mohLev != 'S/R')
                                    <sup>{{ $tipoMuestra->min_mohLev_e }}</sup>
                                @endif
                            </td>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $tipoMuestra->max_mohLev }} @if ($tipoMuestra->max_mohLev != '--' && $tipoMuestra->max_mohLev != 'S/R')
                                    <sup>{{ $tipoMuestra->max_mohLev_e }}</sup>
                                @endif
                            </td>
                            <td class="px-2 py-1 whitespace-nowrap">
                                <button wire:click="edit({{ $tipoMuestra->id }})"
                                    class="text-indigo-600 hover:text-indigo-900">Editar</button>
                                <button wire:click="delete({{ $tipoMuestra->id }})"
                                    class="text-red-600 hover:text-red-900">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
