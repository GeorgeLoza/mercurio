<div wire:poll.5s>
    <div>
        <h3 class="text-xl font-bold mb-4">Cantidad Actual por Ítems:</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($totalesPorItem as $datos)
                <div class="border rounded-lg shadow p-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                    <h4 class="text-lg font-semibold">
                        {{ $datos['codigo'] }} <br>{{ $datos['nombre'] }}
                        {{ $datos['concentracion'] }}%
                    </h4>
                    <p class="text-gray-600 dark:text-gray-400">
                        Cantidad Actual:
                        <span class="font-bold px-1">
                            {{ $datos['cantidad_actual'] }} [{{ $datos['unidad'] }}]
                        </span>
                        @if ($datos['cantidad_actual'] <= 0)
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 h-4 w-4 inline"
                                viewBox="0 0 512 512">
                                <path
                                    d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                            </svg>
                        @endif
                    </p>

                    @if ($datos['ultimo_egreso'])
                        <p class="text-gray-600 dark:text-gray-400 text-xs">
                            Último Egreso:
                            <span class="font-bold">{{ $datos['ultimo_egreso']['cantidad'] }}
                                [{{ $datos['unidad'] }}]</span>
                            ({{ \Carbon\Carbon::parse($datos['ultimo_egreso']['fecha'])->format('d-m-Y') }})
                        </p>
                    @else
                        <p class="text-gray-600 dark:text-gray-400 text-xs">
                            Último Egreso: <span class="italic">No disponible</span>
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>


    <div class="p-4">
        <h2 class="text-lg font-semibold mb-4">Movimientos</h2>

        <!-- Tabla de movimientos -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-2">Código</th>
                    <th scope="col" class="px-4 py-2">Item</th>
                    <th scope="col" class="px-4 py-2">Vol. Sol. [L]</th>
                    <th scope="col" class="px-4 py-2">Des. Entregado</th>
                    <th scope="col" class="px-4 py-2">Solicitante</th>
                    <th scope="col" class="px-4 py-2">Autorizante</th>
                    <th scope="col" class="px-4 py-2">Tipo</th>
                    <th scope="col" class="px-4 py-2">Estado</th>
                    <th scope="col" class="px-4 py-2">Fecha</th>
                    <th scope="col" class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $mov)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-2">DES-{{ $mov->id }}</td>
                        <td class="px-4 py-2">
                            {{ $mov->itemSolucion->codigo }} - {{ $mov->itemSolucion->nombre }}
                        </td>
                        <td class="px-4 py-2">{{ $mov->cantidad_mezcla / 1 }}


                        </td>

                        <td class="px-4 py-2">
                            @if ($mov->itemSolucion->codigo == ('L-4' || 'L-6'))
                                {{ $mov->cantidad * 1000 }}
                            @else
                                {{ $mov->cantidad / 1 }}
                            @endif
                            @php
                                $unidad = match ($mov->itemSolucion->codigo) {
                                    'L-4' => '[ml]',
                                    'L-6' => '[gr]',
                                    default => '[' . $mov->itemSolucion->unidad . ']',
                                };

                            @endphp

                            {{ $unidad }}

                            {{-- [{{ $mov->itemSolucion->unidad }}] --}}
                        </td>

                        <td class="px-4 py-2">
                            {{ substr($mov->user->nombre, 0, 1) .
                                substr(explode(' ', $mov->user->nombre)[1] ?? '', 0, 1) .
                                substr($mov->user->apellido, 0, 1) .
                                substr(explode(' ', $mov->user->apellido)[1] ?? '', 0, 1) }}

                        </td>
                        <td class="px-4 py-2">
                            @if ($mov->usuarioAutorizante)
                                {{ substr($mov->usuarioAutorizante->nombre, 0, 1) .
                                    substr(explode(' ', $mov->usuarioAutorizante->nombre)[1] ?? '', 0, 1) .
                                    substr($mov->usuarioAutorizante->apellido, 0, 1) .
                                    substr(explode(' ', $mov->usuarioAutorizante->apellido)[1] ?? '', 0, 1) }}
                            @endif


                        </td>

                        <td class="px-4 py-2">
                            @if ($mov->tipo == 1)
                                <div class="flex ">

                                    <svg class="h-4 w-4 fill-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512">
                                        <path
                                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2 160 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-306.7L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                                    </svg>

                                    {{-- Entrada --}}
                                </div>
                            @else
                                <div class="flex ">
                                    <svg class="h-4 w-4 fill-red-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512">
                                        <path
                                            d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                    </svg>

                                    {{-- Salida --}}
                                </div>
                            @endif
                        </td>
                        <td
                            class="px-4 py-2 font-bold uppercase
                                {{ $mov->estado == 'Entregado' ? 'text-green-500' : '' }}
                                {{ $mov->estado == 'Denegado' ? 'text-red-500' : '' }}
                                {{ $mov->estado == 'Autorizado' ? 'text-yellow-500' : '' }}
                                {{ $mov->estado == 'Solicitado' ? 'text-blue-500' : '' }}
                            ">

                            {{ $mov->estado }}</td>
                        <td class="px-4 py-2">
                            {{ \Carbon\Carbon::parse($mov->tiempo)->format('d-m-Y H:m') }}


                        </td>
                        <td class="px-4 py-2 flex space-x-2">
                            <!-- Botón para ver/ocultar movs -->




                            @if ($mov->tipo == 0)


                                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 33)->where('permiso_id', 3)->isNotEmpty())
                                    @if ($mov->estado != 'Entregado')
                                        @if ($mov->estado != 'Autorizado' && now()->diffInMinutes($mov->created_at) < 1440)
                                            <!-- Botón para autorizado -->
                                            <button wire:click="cambiarEstado1({{ $mov->id }})"
                                                class="bg-green-500 text-white px-2 py-1 rounded-md">
                                                Autorizar
                                            </button>
                                        @endif

                                        @if ($mov->estado != 'Denegado' && now()->diffInMinutes($mov->created_at) < 1440)
                                            <!-- Botón para denegado -->
                                            <button wire:click="cambiarEstado2({{ $mov->id }})"
                                                class="bg-red-500 text-white px-2 py-1 rounded-md">
                                                Denegar
                                            </button>
                                        @endif
                                    @endif
                                @endif


                                @if ($mov->estado == 'Autorizado')
                                    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 33)->where('permiso_id', 3)->isNotEmpty())
                                        <!-- Botón para entregado -->
                                        <button
                                            onclick="Livewire.dispatch('openModal', { component: 'desinfeccion.movimiento', arguments: { id: {{ $mov->id }} } })"
                                            class="bg-yellow-500 text-white px-2 py-1 rounded-md">
                                            Finalizar
                                        </button>
                                    @endif
                                @endif

                            @endif



                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $movimientos->links() }}
        </div>
    </div>

</div>
