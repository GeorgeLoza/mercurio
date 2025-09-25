<div class="p-4">

    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 1)->isNotEmpty())
        <button class="bg-green-500 rounded-md text-white py-1.5 px-2 text-lg mb-2"
            onclick="Livewire.dispatch('openModal', { component: 'liberacion.crear' })">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                <path
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
            </svg>
        </button>
    @endif

    <table class="w-full text-xs text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="p-2 text-left">Producto</th>
                <th class="p-2 text-left">ORP</th>
                <th class="p-2 text-left">Fecha de Ven.</th>
                <th class="p-2 text-left">Estado - Tipo</th>
                <th class="p-2 text-left">Liberador</th>
                <th class="p-2 text-left">Autorizador</th>
                <th class="p-2 text-left">Fecha liberacion</th>
                <th class="p-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($liberaciones as $liberacion)
                {{-- Fila principal --}}
                <tr wire:click="toggleExpand({{ $liberacion->id }})"
                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer text-xs">
                    <td class="p-2 max-w-[250px]">{{ $liberacion->orp->producto->nombre }}</td>
                    <td class="p-2">{{ $liberacion->orp->codigo ?? '—' }}</td>

                    <td class="p-2">
                        @if ($liberacion->orp->fecha_vencimiento1)
                            {{ \Carbon\Carbon::parse($liberacion->orp->fecha_vencimiento1)->format('d-m-y') }}
                        @else
                            —
                        @endif
                    </td>
                    <td class="p-2">{{ $liberacion->estado ?? '-' }} - {{ $liberacion->tipo ?? '' }} </td>
                    <td class="p-2">

                        @if ($liberacion->estado == 'No liberado')
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 3)->isNotEmpty())
                                <button
                                    onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.liberar', arguments: { id: {{ $liberacion->id }} } })"
                                    class="bg-green-500 text-white px-2 py-1 rounded">
                                    Liberar

                                </button>
                            @endif
                        @else
                            {{ $liberacion->liberador->codigo ?? '-' }}
                        @endif

                    </td>

                    <td class="p-2">
                        @if ($liberacion->estado == 'Por Liberar')
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 5)->isNotEmpty())
                                <button wire:click.stop="autorizar({{ $liberacion->id }})"
                                    wire:confirm="¿Confirmar liberación de la Orp {{ $liberacion->orp->codigo }}?"
                                    class="bg-blue-500 text-white px-2 py-1 rounded">
                                    Autorizar
                                </button>
                            @endif
                        @else
                            {{ $liberacion->autorizador->codigo ?? '-' }}
                        @endif

                    </td>
                    <td class="p-2">
                        @if ($liberacion->fecha_liberacion)
                            {{ \Carbon\Carbon::parse($liberacion->orp->fecha_liberacion)->format('d-m-y') }}
                        @else
                            -
                        @endif
                    </td>


                    <td class="p-2 flex flex-wrap gap-1">
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 1)->isNotEmpty() ||
                                now() - diffInDays($liberacion->created_at) < 7)
                            <!-- Ejemplo: cada botón debe detener la propagación para evitar toggle -->
                            <button class="bg-blue-500 text-white px-2 py-1 rounded"
                                onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.detalle', arguments: { id: {{ $liberacion->id }}, mode: ['hora_sachet','origen_id','peso','lote'] } })">
                                <!-- icono -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="h-4 fill-white">
                                    <path
                                        d="M320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z" />
                                </svg>
                            </button>

                            <button class="bg-purple-500 text-white px-2 py-1 rounded"
                                onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.detalle', arguments: { id: {{ $liberacion->id }}, mode: ['temperatura','ph'] } })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 fill-white" viewBox="0 0 640 640">
                                    <path
                                        d="M160 160C160 107 203 64 256 64C309 64 352 107 352 160L352 324.7C381.5 351.1 400 389.4 400 432C400 511.5 335.5 576 256 576C176.5 576 112 511.5 112 432C112 389.4 130.5 351 160 324.7L160 160zM256 496C291.3 496 320 467.3 320 432C320 405.1 303.5 382.1 280 372.7L280 344C280 330.7 269.3 320 256 320C242.7 320 232 330.7 232 344L232 372.7C208.5 382.2 192 405.2 192 432C192 467.3 220.7 496 256 496zM528 144C528 126.3 513.7 112 496 112C478.3 112 464 126.3 464 144C464 161.7 478.3 176 496 176C513.7 176 528 161.7 528 144zM416 144C416 99.8 451.8 64 496 64C540.2 64 576 99.8 576 144C576 188.2 540.2 224 496 224C451.8 224 416 188.2 416 144z" />
                                </svg>
                            </button>

                            <button class="bg-yellow-500 text-white px-2 py-1 rounded"
                                onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.detalle', arguments: { id: {{ $liberacion->id }}, mode: ['brix'] } })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 fill-white" viewBox="0 0 640 640">
                                    <path
                                        d="M256 96C256 78.3 270.3 64 288 64L352 64C369.7 64 384 78.3 384 96L384 160C384 177.7 369.7 192 352 192L288 192C270.3 192 256 177.7 256 160L256 96zM288 448L352 448C369.7 448 384 462.3 384 480L384 544C384 561.7 369.7 576 352 576L288 576C270.3 576 256 561.7 256 544L256 480C256 462.3 270.3 448 288 448zM480 448L544 448C561.7 448 576 462.3 576 480L576 544C576 561.7 561.7 576 544 576L480 576C462.3 576 448 561.7 448 544L448 480C448 462.3 462.3 448 480 448zM384 256L448 256C465.7 256 480 270.3 480 288L480 352C480 369.7 465.7 384 448 384L384 384C366.3 384 352 369.7 352 352L352 288C352 270.3 366.3 256 384 256zM201.4 252.1C213.9 239.6 234.2 239.6 246.7 252.1L292 297.4C304.5 309.9 304.5 330.2 292 342.7L246.7 388C234.2 400.5 213.9 400.5 201.4 388L156.1 342.6C143.6 330.1 143.6 309.8 156.1 297.3L201.4 252zM96 448L160 448C177.7 448 192 462.3 192 480L192 544C192 561.7 177.7 576 160 576L96 576C78.3 576 64 561.7 64 544L64 480C64 462.3 78.3 448 96 448z" />
                                </svg>
                            </button>

                            <button class="bg-red-500 text-white px-2 py-1 rounded"
                                onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.detalle', arguments: { id: {{ $liberacion->id }}, mode: ['acidez'] } })">
                                <!-- icono acidez -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="h-4 fill-white">
                                    <path
                                        d="M384 64L224 64C206.3 64 192 78.3 192 96C192 113.7 206.3 128 224 128L224 279.5L103.5 490.3C98.6 499 96 508.7 96 518.7C96 550.4 121.6 576 153.3 576L486.7 576C518.3 576 544 550.4 544 518.7C544 508.7 541.4 498.9 536.5 490.3L416 279.5L416 128C433.7 128 448 113.7 448 96C448 78.3 433.7 64 416 64L384 64zM288 279.5L288 128L352 128L352 279.5C352 290.6 354.9 301.6 360.4 311.3L402 384L238 384L279.6 311.3C285.1 301.6 288 290.7 288 279.5z" />
                                </svg>
                            </button>

                            <button class="bg-pink-500 text-white px-3 py-1 rounded font-bold"
                                onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.detalle', arguments: { id: {{ $liberacion->id }}, mode: ['viscosidad'] } })">
                                μ
                            </button>

                            <button class="bg-green-500 text-white px-2 py-1 rounded"
                                onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.detalle', arguments: { id: {{ $liberacion->id }}, mode: ['color','olor','sabor'] } })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 fill-white" viewBox="0 0 640 640">
                                    <path
                                        d="M320 64C331.2 64 341.7 69.9 347.4 79.5L443.4 239.5C449.3 249.4 449.5 261.7 443.8 271.7C438.1 281.7 427.5 288 416 288L224 288C212.5 288 201.8 281.8 196.2 271.8C190.6 261.8 190.7 249.5 196.6 239.6L292.6 79.6C298.3 69.9 308.8 64 320 64zM192 336C253.9 336 304 386.1 304 448C304 509.9 253.9 560 192 560C130.1 560 80 509.9 80 448C80 386.1 130.1 336 192 336zM392 352L504 352C526.1 352 544 369.9 544 392L544 504C544 526.1 526.1 544 504 544L392 544C369.9 544 352 526.1 352 504L352 392C352 369.9 369.9 352 392 352z" />
                                </svg>
                            </button>

                            <button class="bg-gray-500 text-white px-2 py-1 rounded"
                                onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.detalle', arguments: { id: {{ $liberacion->id }}, mode: ['observaciones'] } })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 fill-white" viewBox="0 0 640 640">
                                    <path
                                        d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z" />
                                </svg>
                            </button>

                            <button class="bg-indigo-500 text-white px-2 py-1 rounded"
                                onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.detalle', arguments: { id: {{ $liberacion->id }}, mode: 'all' } })">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="h-4 fill-white">
                                    <path
                                        d="M415.9 344L225 344C227.9 408.5 242.2 467.9 262.5 511.4C273.9 535.9 286.2 553.2 297.6 563.8C308.8 574.3 316.5 576 320.5 576C324.5 576 332.2 574.3 343.4 563.8C354.8 553.2 367.1 535.8 378.5 511.4C398.8 467.9 413.1 408.5 416 344zM224.9 296L415.8 296C413 231.5 398.7 172.1 378.4 128.6C367 104.2 354.7 86.8 343.3 76.2C332.1 65.7 324.4 64 320.4 64C316.4 64 308.7 65.7 297.5 76.2C286.1 86.8 273.8 104.2 262.4 128.6C242.1 172.1 227.8 231.5 224.9 296zM176.9 296C180.4 210.4 202.5 130.9 234.8 78.7C142.7 111.3 74.9 195.2 65.5 296L176.9 296zM65.5 344C74.9 444.8 142.7 528.7 234.8 561.3C202.5 509.1 180.4 429.6 176.9 344L65.5 344zM463.9 344C460.4 429.6 438.3 509.1 406 561.3C498.1 528.6 565.9 444.8 575.3 344L463.9 344zM575.3 296C565.9 195.2 498.1 111.3 406 78.7C438.3 130.9 460.4 210.4 463.9 296L575.3 296z" />
                                </svg>
                            </button>


                            <button class="p-1 px-2 mr-2  bg-green-500 rounded-md"
                                onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'liberacion.agregar', arguments: { id: {{ $liberacion->id }} } })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                </svg>
                            </button>
                        @endif
                    </td>
                </tr>

                {{-- Fila expandida --}}
                @if (!empty($expanded[$liberacion->id]))
                    <tr class="bg-gray-50 dark:bg-gray-800 text-2xs">
                        <td colspan="8" class="p-4">
                            <div class="text-sm text-gray-700 dark:text-gray-200">
                                {{-- <h3 class="font-semibold">Detalles de seguimiento
                                    ({{ $liberacion->detalles->count() }})
                                </h3> --}}
                                <div class="mt-2 overflow-x-auto">
                                    <table class="w-full text-2xs border-collapse">
                                        <thead class="text-left text-gray-600 dark:text-gray-300">
                                            <tr>
                                                <th class="px-2 py-1 border">Cabezal </th>
                                                <th class="px-2 py-1 border">Hora</th>
                                                <th class="px-2 py-1 border">Peso</th>
                                                <th class="px-2 py-1 border">lote</th>
                                                <th class="px-2 py-1 border">Temp</th>
                                                <th class="px-2 py-1 border">pH</th>
                                                <th class="px-2 py-1 border">Brix</th>
                                                <th class="px-2 py-1 border">Acidez</th>
                                                <th class="px-2 py-1 border">Visc.</th>
                                                <th class="px-2 py-1 border">C / O / S</th>
                                                <th class="px-2 py-1 border">Obs.</th>
                                                <th class="px-2 py-1 border">Usuario</th>
                                                <th class="px-2 py-1 border">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($liberacion->detalles as $d)
                                                <tr
                                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-gray-800 dark:even:bg-gray-900">
                                                    <td class="px-2 py-1 border text-2xs">
                                                        {{ $d->origen->alias ?? '-' }}
                                                    </td>
                                                    <td class="px-2 py-1 border text-2xs">
                                                        @if ($d->hora_sachet)
                                                            {{ \Carbon\Carbon::parse($d->hora_sachet)->format('H:i') }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>

                                                    <td class="px-2 py-1 border text-2xs">{{ $d->peso ?? '-' }}</td>
                                                    <td class="px-2 py-1 border text-2xs">{{ $d->lote ?? '-' }}</td>
                                                    <td class="px-2 py-1 border text-2xs">{{ $d->temperatura ?? '-' }}
                                                    </td>
                                                    <td class="px-2 py-1 border text-2xs">{{ $d->ph ?? '-' }}</td>
                                                    <td class="px-2 py-1 border text-2xs">{{ $d->brix ?? '-' }}</td>
                                                    <td class="px-2 py-1 border text-2xs">{{ $d->acidez ?? '-' }}</td>
                                                    <td class="px-2 py-1 border text-2xs">{{ $d->viscosidad ?? '-' }}
                                                    </td>
                                                    <td class="px-2 py-1 border text-2xs">
                                                        {{ $d->color ? 'C' : '-' }} /
                                                        {{ $d->olor ? 'O' : '-' }} /
                                                        {{ $d->sabor ? 'S' : '-' }}
                                                    </td>
                                                    <td class="px-2 py-1 border text-2xs">
                                                        {{ Str::limit($d->observaciones ?? '-', 80) }}</td>
                                                    <td class="px-2 py-1 border text-2xs">
                                                        {{ $d->user->codigo ?? '-' }}
                                                    </td>
                                                    <td class="p-1 border text-center">
                                                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 4)->isNotEmpty() ||
                                                                now()->diffInMinutes($d->created_at) < 60)
                                                            <button wire:click="deleteDetalle({{ $d->id }})"
                                                                wire:confirm="¿Seguro que deseas eliminar este detalle?">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-4 w-10 fill-red-600 dark:fill-red-500"
                                                                    viewBox="0 0 448 512">
                                                                    <path
                                                                        d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                                </svg>
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="p-2" colspan="12">No hay detalles registrados.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $liberaciones->links() }}
    </div>

</div>
