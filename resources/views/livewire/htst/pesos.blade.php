<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg h-[calc(40vh)] bg-white dark:bg-gray-900">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-1">Producto</th>
                    <th scope="col" class="px-1 py-1">ORP</th>
                    <th scope="col" class="px-1 py-1">Prep.</th>
                    <th scope="col" class="px-1 py-1">Cabezal</th>
                    <th scope="col" class="px-1 py-1">Peso</th>
                    <th scope="col" class="px-1 py-1"><span class="sr-only">Edit</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados as $index => $resultado)
                    <tr
                        class="bg-white text-center border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-1 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @foreach ($resultado->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $dato)
                                {{ $dato->orp->codigo }}
                            @endforeach
                        </th>
                        <td class="px-1 py-2 text-2xs">
                            @foreach ($resultado->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $dato)
                                {{ $dato->orp->producto->nombre }}
                            @endforeach
                        </td>
                        <td class="px-1 py-2">
                            @foreach ($resultado->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $dato)
                                {{ $dato->preparacion }}
                            @endforeach
                        </td>
                        <td class="px-1 py-2">{{ $resultado->solicitudAnalisisLinea->estadoPlanta->origen->alias }}</td>
                        <td class="px-1 py-2">
                            @if ($editing === $index)
                                <input type="text" wire:model.defer="resultados.{{ $index }}.peso"
                                    class="w-20 px-1 py-1 border rounded">
                            @else
                                <span>{{ $resultado->peso ?? '-' }}</span>
                            @endif
                        </td>

                        <td class="px-1 py-2 text-right flex gap-2 align-middle">
                            @if ($editing === $index)
                                <button wire:click="save({{ $index }})"
                                    class="font-medium text-green-600 dark:text-green-500 hover:underline"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>
                                <button wire:click="cancelEdit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>
                            @else
                                <button wire:click="edit({{ $index }})"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
