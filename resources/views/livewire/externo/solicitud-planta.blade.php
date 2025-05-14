<div class="overflow-x-auto">


    <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">#</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Fecha</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Planta</th>

                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Código</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Estado</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($solicitudes as $solicitud)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 ">
                    <td class="flex gap-3 items-center py-1 w-6 mr-4">


                        <button wire:click="toggleCollapse({{ $solicitud->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="fill-green-600 h-5 w-5">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg>
                        </button>
                        {{ $loop->iteration }}
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 22)->where('permiso_id', 3)->isNotEmpty())
                            @foreach ($solicitud->detalles as $detalle)
                                @if ($detalle->estado == 'Pendiente')
                                    <span
                                        class="flex w-2 h-2 bg-orange-600 rounded-full  flex-shrink-0 mr-2 text-sm"></span>
                                    @break
                                @endif
                            @endforeach
                        @endif

                        @foreach ($solicitud->detalles as $detalle)
                            @if ($detalle->estado == 'Observado')
                                <div>

                                    <svg xmlns="http://www.w3.org/2000/svg" class=" fill-yellow-500 h-4 w-4"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                                    </svg>
                                </div>
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>{{ \Carbon\Carbon::parse($solicitud->tiempo)->isoFormat('DD-MM-YY HH:mm') }}</td>
                    <td>{{ $solicitud->user->planta->nombre }}</td>
                    <td>{{ $solicitud->codigo }}</td>
                    <td>
                        @if ($solicitud->estado == 'Pendiente')
                            <span
                                class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $solicitud->estado }}</span>
                        @endif

                        @if ($solicitud->estado == 'Recibido')
                            <span
                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $solicitud->estado }}</span>
                        @endif

                        @if ($solicitud->estado == 'Cancelado')
                            <span
                                class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $solicitud->estado }}</span>
                        @endif
                    </td>
                    <td class="flex gap-4 justify-center">
                        <!--boton para generar pdf-->
                        <button wire:click="pdf_solicitud({{ $solicitud->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-red-500 w-4 h-4">
                                <path
                                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                            </svg>
                        </button>
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 22)->where('permiso_id', 3)->isNotEmpty())
                            <!--boton para confirmar la llegada-->
                            <button wire:click="recibido({{ $solicitud->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="fill-green-500 w-4 h-4">
                                    <path
                                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                                </svg>
                            </button>
                        @endif

                        <!--boton para cancelar-->
                        <button wire:click="cancelar({{ $solicitud->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-red-500 w-4 h-4">
                                <path
                                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                            </svg>
                        </button>

                        <!--boton para eliminar-->

                        <button wire:click="eliminar({{ $solicitud->id }})"
                            wire:confirm="Esta seguro de eliminar el elemento?">

                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 w-4 h-4" viewBox="0 0 448 512">
                                <path
                                    d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                            </svg>
                        </button>

                    </td>
                </tr>
                @if (isset($openCollapse[$solicitud->id]))
                    <tr>


                        <td colspan="5" class="px-4 py-2">
                            <table class="min-w-full bg-gray-50 border border-gray-200 dark:bg-gray-900">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Subcódigo</th>
                                        <th class="px-4 py-2">Ítem</th>
                                        <th class="px-4 py-2">Lote</th>
                                        <th class="px-4 py-2">Fecha de Elaboración</th>
                                        <th class="px-4 py-2">Fecha de Muestreo</th>
                                        <th class="px-4 py-2">Fecha de Vencimiento</th>

                                        <th class="px-4 py-2">Tipo</th>
                                        <th class="px-4 py-2">Análisis</th>
                                        <th class="px-4 py-2">Estado</th>
                                        @if (auth()->user()->rol != 'Ext')
                                            <th class="px-4 py-2">Acciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitud->detalles as $detalle)
                                        <tr class="border-b">
                                            @if ($editMode && $editId === $detalle->id)
                                                <!-- Modo de edición -->
                                                <td class="px-1 py-1 ">
                                                    <input type="text" wire:model.defer="editData.subcodigo"
                                                        class="form-input w-full" />
                                                </td>
                                                <td class="px-1 py-1">
                                                    <!-- Mostrar el producto pero sin permitir edición -->
                                                    {{ $detalle->productosPlanta ? $detalle->productosPlanta->nombre : $detalle->otro }}
                                                </td>
                                                <td class="px-1 py-1">
                                                    <input type="text" wire:model.defer="editData.lote"
                                                        class="form-input w-full" />
                                                </td>
                                                <td class="px-1 py-1">
                                                    <input type="date" wire:model.defer="editData.fecha_elaboracion"
                                                        class="form-input w-full" />
                                                </td>
                                                <td class="px-1 py-1">
                                                    <input type="date" wire:model.defer="editData.fecha_muestreo"
                                                        class="form-input w-full" />
                                                </td>
                                                <td class="px-1 py-1">
                                                    <input type="date" wire:model.defer="editData.fecha_vencimiento"
                                                        class="form-input w-full" />
                                                </td>
                                                <td class="px-1 py-1">
                                                    <input type="text" wire:model.defer="editData.tipo_analisis"
                                                        class="form-input w-full" />
                                                </td>
                                                <td class="px-1 py-1">
                                                    <select wire:model.defer="editData.estado"
                                                        class="form-select w-full">
                                                        <option value="Pendiente">Pendiente</option>
                                                        <option value="Por Analizar">Por Analizar</option>
                                                        <option value="Analizando">Analizando</option>
                                                        <option value="Analizado">Analizado</option>
                                                        <option value="Terminado">Terminado</option>
                                                        <option value="Observado">Observado</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button wire:click="save"
                                                        class="bg-green-500 text-white px-2 py-1 rounded">Guardar</button>
                                                    <button wire:click="resetEdit"
                                                        class="bg-red-500 text-white px-2 py-1 rounded">Cancelar</button>
                                                </td>
                                            @else
                                                <!-- Vista normal -->
                                                <td class="px-1 py-1">{{ $detalle->subcodigo }}</td>
                                                <td class="px-1 py-1">
                                                    {{ $detalle->productosPlanta ? $detalle->productosPlanta->nombre : $detalle->otro }}
                                                </td>
                                                <td class="px-1 py-1">{{ $detalle->lote }}</td>
                                                <td class="px-1 py-1">
                                                    @if ($detalle->fecha_elaboracion)
                                                        {{ \Carbon\Carbon::parse($detalle->fecha_elaboracion)->isoFormat('DD/MM/YYYY') }}
                                                    @endif
                                                </td>
                                                <td class="px-1 py-1">
                                                    {{ \Carbon\Carbon::parse($detalle->fecha_muestreo)->isoFormat('DD/MM/YYYY') }}
                                                </td>
                                                <td class="px-1 py-1">
                                                    @if ($detalle->fecha_vencimiento)
                                                        {{ \Carbon\Carbon::parse($detalle->fecha_vencimiento)->isoFormat('DD/MM/YYYY') }}
                                                    @endif
                                                </td>
                                                <td class="px-1 py-1">{{ $detalle->tipoMuestra->nombre }}</td>
                                                <td class="px-1 py-1">{{ $detalle->tipo_analisis }}</td>
                                                <td class="px-1 py-1 text-center ">
                                                    @if ($detalle->estado == 'Pendiente')
                                                        <span
                                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $detalle->estado }}</span>
                                                    @endif
                                                    @if ($detalle->estado == 'Por Analizar')
                                                        <span
                                                            class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $detalle->estado }}</span>
                                                    @endif
                                                    @if ($detalle->estado == 'Analizando')
                                                        <span
                                                            class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $detalle->estado }}</span>
                                                    @endif
                                                    @if ($detalle->estado == 'Analizado')
                                                        <span
                                                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $detalle->estado }}</span>
                                                    @endif
                                                    @if ($detalle->estado == 'Terminado')
                                                        <span
                                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $detalle->estado }}</span>
                                                    @endif
                                                    @if ($detalle->estado == 'Observado')
                                                        <span
                                                            class="bg-green-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 ">{{ $detalle->estado }}</span>
                                                        <br> {{ $detalle->observaciones }}
                                                    @endif

                                                </td>


                                                <td class="gap-2">



                                                    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 22)->where('permiso_id', 4)->isNotEmpty())
                                                        <button wire:click="edit({{ $detalle->id }})"
                                                            class="bg-blue-500 text-white px-2 py-1 m-2 rounded">Editar</button>
                                                        <button wire:click="eliminar_detalle({{ $detalle->id }})"
                                                            wire:confirm="Esta seguro de eliminar el elemento?"
                                                            class="bg-red-500 text-white px-2 py-1 m-2 rounded">Eliminar</button>
                                                    @endif

                                                    <!-- Botones adicionales para cambiar los estados -->
                                                    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 22)->where('permiso_id', 3)->isNotEmpty())
                                                        @if (($detalle->tipo_analisis == 'Microbiologico' && auth()->user()->role->id != 9) || ($detalle->tipo_analisis == 'Fisicoquimico' && auth()->user()->role->id != 8))
                                                            <button wire:click="confirmar({{ $detalle->id }})"
                                                                class="bg-yellow-500 text-white px-2 py-1 m-2 rounded">Confirmar</button>


                                                            <button
                                                                onclick="Livewire.dispatch('openModal', { component: 'externo.observaciones', arguments: { id: {{ $detalle->id }} } })"
                                                                {{-- wire:click="observado({{ $detalle->id }})" --}}
                                                                class="bg-green-500 text-white px-2 py-1 m-2 rounded">Observar</button>
                                                        @endif
                                                    @endif



                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $solicitudes->links('pagination::tailwind') }}
    </div>
</div>
