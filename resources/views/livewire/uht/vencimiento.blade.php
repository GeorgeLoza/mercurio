<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-2">orp</th>
                    <th scope="col" class="px-1 py-2">producto</th>
                    <th scope="col" class="px-1 py-2">f. Elaboracion</th>
                    <th scope="col" class="px-1 py-2">f. Vencimiento</th>
                    <th scope="col" class="px-1 py-2"><span class="sr-only">Edit</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orps as $orp)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-1 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$orp->codigo}}
                    </th>
                    <td class="px-1 py-2">{{$orp->producto->nombre}}</td>
                    <td class="px-1 py-2">
                        @if ($editingOrpId === $orp->id)
                            <input type="date" wire:model.defer="tiempo_elaboracion" class="border border-gray-300 rounded" />
                        @else
                            {{$orp->producto->tiempo_elaboracion}}
                        @endif
                    </td>
                    <td class="px-1 py-2">
                        @if ($editingOrpId === $orp->id)
                            <input type="date" wire:model.defer="fecha_vencimiento1" class="border border-gray-300 rounded" />
                        @else
                            {{$orp->producto->fecha_vencimiento1}}
                        @endif
                    </td>
                    <td class="px-1 py-2 text-right">
                        @if ($editingOrpId === $orp->id)
                            <button wire:click="update" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Guardar</button>
                            <button wire:click="$set('editingOrpId', null)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Cancelar</button>
                        @else
                            <button wire:click="edit({{ $orp->id }}, '{{ $orp->producto->tiempo_elaboracion }}', '{{ $orp->producto->fecha_vencimiento1 }}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</button>
                        @endif
                    </td>
                </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
