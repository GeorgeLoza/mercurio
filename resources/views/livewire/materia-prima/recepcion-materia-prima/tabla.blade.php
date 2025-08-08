<div>
    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 35)->where('permiso_id', 1)->isNotEmpty())
        <button class="bg-green-500 rounded-md text-white  py-1.5 px-2 text-lg mb-2"
            onclick="Livewire.dispatch('openModal', { component: 'materiaPrima.recepcionMateriaPrima.crear' })">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                <path
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
            </svg>
        </button>
    @endif

    <div>
        <table>
            <thead>
                <tr class="bg-gray-200 dark:bg-slate-700 text-2xs">
                    <th class="px-2 py-2">Tiempo</th>
                    <th class="px-2 py-2">Almacen</th>
                    <th class="px-2 py-2">Calidad</th>
                    <th class="px-2 py-2">Item</th>
                    <th class="px-2 py-2">Cantidad</th>
                    <th class="px-2 py-2">Unidad</th>
                    <th class="px-2 py-2">Proveedor</th>
                    <th class="px-2 py-2">Limpieza</th>
                    <th class="px-2 py-2">Elem. Ext.</th>
                    <th class="px-2 py-2">Cerrado</th>
                    <th class="px-2 py-2">Lote</th>
                    <th class="px-2 py-2">F. Elab.</th>
                    <th class="px-2 py-2">F. Venc.</th>
                    <th class="px-2 py-2">NIT</th>
                    <th class="px-2 py-2">R.S.</th>
                    <th class="px-2 py-2">Cert.</th>
                    <th class="px-2 py-2">Estado</th>
                    <th class="px-2 py-2">Observacion</th>
                    <th class="px-2 py-2">Correccion</th>
                    <th class="px-2 py-2">Cod. Cert.</th>
                    <th class="px-2 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recepciones as $recepcion)
                    <tr class="border-b dark:border-gray-600 text-2xs text-center">
                        <td class="px-2 py-2" nowrap>

                            @if ($recepcion->tiempo)
                                {{ \Carbon\Carbon::parse($recepcion->tiempo)->isoFormat('DD-MM-YY HH:mm') }}
                            @endif
                        </td>
                        <td class="px-2 py-2">{{ $recepcion->ubicacion }}</td>
                        <td class="px-2 py-2" nowrap>{{ $recepcion->user->nombre }}</td>
                        <td class="px-2 py-2" nowrap>{{ $recepcion->itemMateriaPrima->nombre }}</td>
                        <td class="px-2 py-2">{{ $recepcion->cantidad / 1 }}</td>
                        <td class="px-2 py-2">{{ $recepcion->unidades / 1 }}</td>
                        <td class="px-2 py-2">{{ $recepcion->proveedorMateriaPrima->nombre }}</td>

                        <td class="px-2 py-2">
                            @if ($recepcion->limpieza_transporte == '0')
                                ❌
                            @else
                                ✔️
                            @endif
                        </td>
                        <td class="px-2 py-2">
                            @if ($recepcion->sin_elementos == '0')
                                ❌
                            @else
                                ✔️
                            @endif
                        </td>
                        <td class="px-2 py-2">
                            @if ($recepcion->cerrado == '0')
                                ❌
                            @else
                                ✔️
                            @endif
                        </td>
                        <td class="px-2 py-2">{{ $recepcion->lote }}</td>
                        <td class="px-2 py-2" nowrap>
                            @if ($recepcion->fecha_elaboracion)
                                {{ \Carbon\Carbon::parse($recepcion->fecha_elaboracion)->isoFormat('DD-MM-YY') }}
                            @endif
                        </td>
                        <td class="px-2 py-2" nowrap>
                            @if ($recepcion->fecha_vencimiento)
                                {{ \Carbon\Carbon::parse($recepcion->fecha_vencimiento)->isoFormat('DD-MM-YY') }}
                            @endif
                        </td>
                        <td class="px-2 py-2">

                            @if ($recepcion->nit == '0')
                                ❌
                            @else
                                ✔️
                            @endif
                        </td>
                        <td class="px-2 py-2">
                            @if ($recepcion->rs == '0')
                                ❌
                            @else
                                ✔️
                            @endif
                        </td>
                        <td class="px-2 py-2">
                            @if ($recepcion->certificado == '0')
                                ❌
                            @else
                                ✔️
                            @endif
                        </td>
                        <td
                            class="px-2 py-2  @if ($recepcion->almacenero == 'Pendiente') text-yellow-500
                        @elseif ($recepcion->almacenero == 'Aceptado')
                            text-green-500
                        @elseif ($recepcion->almacenero == 'Rechazado')
                            text-red-500 @endif">
                            <span class="uppercase font-bold">

                                {{ $recepcion->almacenero }}
                            </span>
                            @if ($recepcion->almacenero == 'Pendiente')
                                <button wire:click="aceptado({{ $recepcion->id }})"
                                    class="bg-green-500 hover:bg-green-700 text-white p-1 rounded"
                                    wire:confirm="Este elemento ingresara al almacen?">
                                    Ingreso
                                </button>

                                <button wire:click="rechazado({{ $recepcion->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white p-1 rounded"
                                    wire:confirm="Este elemento sera rechazad de almacen?">
                                    Rechazo
                                </button>
                            @endif

                        </td>
                        <td class="px-2 py-2">{{ $recepcion->observacion }}</td>
                        <td class="px-2 py-2">{{ $recepcion->correccion }}</td>

                        <td class="px-2 py-2">{{ $recepcion->codigo_certificado }}</td>
                        <td class="px-2 py-2" nowrap>
                            @if (
                                (now()->diffInMinutes($recepcion->created_at) < 480 && auth()->user()->id == $recepcion->user->id) ||
                                    auth()->user()->role->rolModuloPermisos->where('modulo_id', 35)->where('permiso_id', 3)->isNotEmpty())
                                <button>

                                    <svg onclick="Livewire.dispatch('openModal', { component: 'materiaPrima.recepcionMateriaPrima.crear', arguments: { id: {{ $recepcion->id }} } })"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 fill-blue-600 dark:fill-blue-500 cursor-pointer"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                    </svg>

                                </button>
                            @endif
                            @if (
                                (now()->diffInMinutes($recepcion->created_at) < 1440 && auth()->user()->id == $recepcion->user->id) ||
                                    auth()->user()->role->rolModuloPermisos->where('modulo_id', 35)->where('permiso_id', 4)->isNotEmpty())
                                <button wire:click="eliminar({{ $recepcion->id }})"
                                    wire:confirm="Esta seguro de eliminar el elemento?">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-10 fill-red-600 dark:fill-red-500" viewBox="0 0 448 512">
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
    </div>
</div>
