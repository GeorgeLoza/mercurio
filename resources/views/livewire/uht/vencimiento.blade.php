<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg h-[calc(40vh)] bg-white dark:bg-gray-900">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-1">orp</th>
                    <th scope="col" class="px-1 py-1">producto</th>
                    <th scope="col" class="px-1 py-1">Preparaciones</th>
                    <th scope="col" class="px-1 py-1">f. Vencimiento</th>
                    <th scope="col" class="px-1 py-1"><span class="sr-only">Edit</span></th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($orps as $orp)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-1 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$orp->codigo}}
                    </th>
                    <td class="px-1 py-2">{{$orp->producto->nombre}}</td>
                    <td class="px-1 py-2">{{$orp->lote/1}}</td>

                    <td class="px-1 py-2">

                        @if ($editingOrpId === $orp->id)
                            <input type="date" wire:model.defer="fecha_vencimiento1" class="border border-gray-300 rounded" />
                        @else
                            {{$orp->fecha_vencimiento1}}
                        @endif

                    </td>
                    <td class="px-1 py-2 text-right flex gap-2">
                        @if ($editingOrpId === $orp->id)
                            <button wire:click="update" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Guardar</button>
                            <button wire:click="$set('editingOrpId', null)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Cancelar</button>
                        @else
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 12)->where('permiso_id', 3)->isNotEmpty())
                            <button wire:click="edit({{ $orp->id }}, '{{ $orp->producto->tiempo_elaboracion }}', '{{ $orp->producto->fecha_vencimiento1 }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</button>
                            @endif
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
