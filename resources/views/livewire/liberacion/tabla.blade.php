<div class="p-4">


    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 1)->isNotEmpty())
        <button class="bg-green-500 rounded-md text-white  py-1.5 px-2 text-lg mb-2"
            onclick="Livewire.dispatch('openModal', { component: 'liberacion.crear' })">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                <path
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
            </svg>
        </button>
    @endif
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="p-2 text-left">Producto</th>
                <th class="p-2 text-left">ORP</th>
                <th class="p-2 text-left">Fecha de Vencimiento</th>
                <th class="p-2 text-left">Lote</th>
                <th class="p-2 text-left">Fecha analisis</th>
                <th class="p-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($liberaciones as $liberacion)
                <tr
                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-2">{{ $liberacion->orp->producto->nombre }}</td>
                    <td class="p-2">{{ $liberacion->orp->codigo ?? '—' }}</td>
                    <td class="p-2">{{ $liberacion->orp->fecha_vencimiento1 ?? '—' }}</td>
                    <td class="p-2">{{ $liberacion->orp->tiempo_elaboracion }}</td>
                    <td class="p-2">{{ $liberacion->created_at ?? '-' }}</td>
                    <td class="p-2 flex ">
                        <button class="text-white  bg-blue-500 rounded-md p-[2px] px-2 mr-2"
                            @click="
    document.getElementById('detalles-{{ $liberacion->id }}').classList.toggle('hidden');
    document.getElementById('detalles2-{{ $liberacion->id }}').classList.toggle('hidden');">



                            <span id="detalles2-{{ $liberacion->id }}" class="hidden">
                                ˄
                            </span>
                            Info

                        </button>

                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 1)->isNotEmpty())
                            <button class="p-1 px-2 mr-2 ml-2 bg-green-500 rounded-md"
                                onclick="Livewire.dispatch('openModal', { component: 'liberacion.agregar', arguments: { id: {{ $liberacion->id }} } })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                </svg>
                            </button>
                        @endif

                    </td>
                </tr>

                <tr id="detalles-{{ $liberacion->id }}"
                    class="hidden text-xs text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                    <td colspan="6" class="py-1">
                        @if ($liberacion->detalles->count())
                            <table class="w-full text-sm ">
                                <thead
                                    class="text-xs text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                    <tr>
                                        <th class="p-1">Cabezal</th>
                                        <th class="p-1">Hora </th>
                                        <th class="p-1">Peso</th>
                                        <th class="p-1">Temp</th>
                                        <th class="p-1">pH</th>
                                        <th class="p-1">Brix</th>
                                        <th class="p-1">Acidez</th>
                                        <th class="p-1">Viscosidad</th>
                                        <th class="p-1">Color</th>
                                        <th class="p-1">Olor</th>
                                        <th class="p-1">Sabor</th>
                                        <th class="p-1">Usuario</th>
                                        <th class="p-1">Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($liberacion->detalles as $detalle)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="p-1">{{ $detalle->origen->alias }}</td>
                                            <td class="p-1">{{ $detalle->hora_sachet }}</td>
                                            <td class="p-1">{{ $detalle->peso }}</td>
                                            <td class="p-1">{{ $detalle->temperatura }}</td>
                                            <td class="p-1">{{ $detalle->ph }}</td>
                                            <td class="p-1">{{ $detalle->brix }}</td>
                                            <td class="p-1">{{ $detalle->acidez }}</td>
                                            <td class="p-1">{{ $detalle->viscosidad }}</td>
                                            <td class="p-1">{{ $detalle->color }}</td>
                                            <td class="p-1">{{ $detalle->olor }}</td>
                                            <td class="p-1">{{ $detalle->sabor }}</td>
                                            <td class="p-1">{{ $detalle->user->nombre }}</td>
                                            <td class="p-1">{{ $detalle->observaciones }}</td>
                                            <td class="p-1">


                                                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 3)->isNotEmpty() ||
                                                        (now()->diffInMinutes($detalle->created_at) < 20 && auth()->user()->id == $detalle->user->id))
                                                    <button>

                                                        <svg onclick="Livewire.dispatch('openModal', { component: 'liberacion.agregar', arguments: { id: {{ $liberacion->id }}, id2:{{ $detalle->id }} } })"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-4 w-4 fill-blue-600 dark:fill-blue-500 cursor-pointer"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                        </svg>

                                                    </button>
                                                @endif

                                                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 4)->isNotEmpty() ||
                                                        (now()->diffInMinutes($detalle->created_at) < 20 && auth()->user()->id == $detalle->user->id))
                                                    <button wire:click="eliminar({{ $detalle->id }})"
                                                        wire:confirm="Esta seguro de eliminar el elemento?">
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
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-gray-500">No hay detalles registrados.</p>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Tabla aquí arriba... -->

    <div class="mt-4">
        {{ $liberaciones->links() }}
    </div>

</div>
