<div>
    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 35)->where('permiso_id', 1)->isNotEmpty())
        <div class="flex justify-between mb-2">

            <button class="bg-green-500 rounded-md text-white  py-1.5 px-2 text-lg mb-2"
                onclick="Livewire.dispatch('openModal', { component: 'materiaPrima.recepcionMateriaPrima.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg>
            </button>

            <button class="bg-green-500 rounded-md text-white  py-1 px-2 text-sm mb-2"
                onclick="Livewire.dispatch('openModal', { component: 'materiaPrima.items.parametros' })">
                Items
            </button>
        </div>
    @endif

    <div class="max-h-[70vh] max-w-full overflow-x-auto overflow-y-auto">
        <table class="bg-white dark:bg-slate-900 rounded-lg">
            <thead>
                <tr class="bg-gray-100 dark:bg-slate-700 text-2xs ">
                    <th class="px-2 py-2 rounded-tl-lg">Tiempo</th>
                    <th class="px-2 py-2">Almacen</th>
                    <th class="px-2 py-2">Calidad</th>
                    <th class="px-2 py-2">Item
                        <button wire:click="show_filtro">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-700 dark:fill-gray-300"
                                viewBox="0 0 512 512">
                                <path
                                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                            </svg>
                        </button>
                    </th>
                    <th class="px-2 py-2">Cantidad</th>
                    <th class="px-2 py-2">Unidad</th>
                    <th class="px-2 py-2">Proveedor</th>
                    <th class="px-2 py-2">Limpieza</th>
                    <th class="px-2 py-2">Elem. Ext.</th>
                    <th class="px-2 py-2">Cerrado</th>

                    <th class="px-2 py-2">NIT</th>
                    <th class="px-2 py-2">R.S.</th>
                    <th class="px-2 py-2">Cert.</th>
                    <th class="px-2 py-2">Estado</th>
                    <th class="px-2 py-2">Observación</th>
                    <th class="px-2 py-2">Corrección</th>
                    <th class="px-2 py-2">Cod. Cert.</th>
                    <th class="px-2 py-2 rounded-tr-lg">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($filtro == true)
                    <!-- fila de filtros -->
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 sticky z-20 top-6">



                        {{-- fin filtro fecha --}}
                        <th class="p-1">
                        </th>
                        <th></th>
                        <th></th>


                        {{-- filtro categoria --}}
                        <th class="p-1">
                            <input type="text" wire:model.live='f_item' placeholder="Filtrar por Item"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        </th>
                        <th></th>
                        <th></th>
                        {{-- filtro proveedor --}}
                        <th class="p-1">
                            <input type="text" wire:model.live='f_recepcion' placeholder="Filtrar por Proveedor"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>


                    </tr>
                @endif
                @foreach ($recepciones as $recepcion)
                    <tr class="border-t dark:border-gray-600 text-2xs text-center cursor-pointer"
                        wire:click="toggle({{ $recepcion->id }})">
                        <td class="px-2 py-2" nowrap>

                            @if ($recepcion->tiempo)
                                {{ \Carbon\Carbon::parse($recepcion->tiempo)->isoFormat('DD-MM-YY HH:mm') }}
                            @endif
                        </td>
                        <td class="px-2 py-2">{{ $recepcion->ubicacion }}</td>
                        <td class="px-2 py-2" nowrap>{{ $recepcion->user->nombre }}</td>
                        <td class="px-2 py-2" nowrap>{{ $recepcion->itemMateriaPrima->nombre }}</td>
                        <td class="px-2 py-2">{{ $recepcion->cantidad / 1 }} [{{$recepcion->itemMateriaPrima->unidad->abreviatura}}]</td>
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

                        <td class="px-2 py-2">

                            @if ($recepcion->nit == '0')
                                ❌
                            @else
                                ✔️
                            @endif
                        </td>
                        <td class="px-2 py-2">


                            @if (
                                $recepcion->itemMateriaPrima->categoria_materia_prima_id == 8 ||
                                    $recepcion->itemMateriaPrima->categoria_materia_prima_id == 17)
                                @if ($recepcion->proveedorMateriaPrima->nombre == 'PREFORSA')
                                    @if ($recepcion->rs == '0')
                                        ❌
                                    @else
                                        ✔️
                                    @endif
                                @else
                                    N/A
                                @endif
                            @else
                                @if ($recepcion->rs == '0')
                                    ❌
                                @else
                                    ✔️
                                @endif
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

                                {{ $recepcion->almacenero ?? '' }}
                            </span>
                            <br>
                            @if ($recepcion->almacenero == 'Pendiente')
                                <div class="flex gap-2">

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
                                </div>
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

                                    <svg onclick="Livewire.dispatch('openModal', { component: 'materiaPrima.recepcionMateriaPrima.crear', arguments: { recepcionId: {{ $recepcion->id }} } })"
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

                    @if (in_array($recepcion->id, $expanded))
                        <tr class="bg-white dark:bg-gray-900 text-2xs">
                            <td colspan="18">
                                <div class="p-2 pt-0">

                                    <table class="w-full text-left text-2xs mt-1 ">
                                        <thead>
                                            <tr class="text-2xs">
                                                <th class="px-1 ">Lote</th>
                                                <th class="px-1 ">F. Elaboración</th>
                                                <th class="px-1 ">F. Vencimiento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($recepcion->lotes as $lote)
                                                <tr class="text-2xs">
                                                    <td class="px-1 py-1">{{ $lote->lote }}</td>
                                                    <td class="px-1 py-1">
                                                        {{ \Carbon\Carbon::parse($lote->fecha_elaboracion)->isoFormat('DD-MM-YY') }}
                                                    </td>
                                                    <td class="px-1 py-1">
                                                        {{ \Carbon\Carbon::parse($lote->fecha_vencimiento)->isoFormat('DD-MM-YY') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{ $recepciones->links() }}
    </div>





    <div class="p-2">


        <p class="mb-1">Descargar Reporte de Recepcion de materia prima</p>

        <button class="bg-red-600 p-2 text-center rounded-md  gap-2" wire:click="PDFRecepcionMP"
            wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
                <path
                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
            </svg>



        </button>

        {{-- <button class="bg-green-500 p-2 text-center rounded-md" wire:click="exportarExcel">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-5 w-5 fill-white">
                <path
                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z" />
            </svg>
        </button> --}}

        <!-- Campo de fecha inicio -->
        <label for="fechaInicio">Fecha Inicio:</label>
        <input type="date" id="fechaInicio" class="rounded p-1 text-black" wire:model.defer="fechaInicio">
        @error('fechaInicio')
            <span class="text-red-500 text-base">{{ $message }}</span>
        @enderror

        <!-- Campo de fecha fin -->
        <label for="fechaFin">Fecha Fin:</label>
        <input type="date" id="fechaFin" class="rounded p-1 text-black" wire:model.defer="fechaFin">
        @error('fechaFin')
            <span class="text-red-500 text-base">{{ $message }}</span>
        @enderror

        <!-- Campo de filtro por ruta -->
        <label for="ruta">Sustancia:</label>
        {{-- <select id="ruta" class="rounded p-1 mx-2 bg-white text-black" wire:model.defer="ruta">
            <option value="">Seleccionar Sustancia</option>
            @foreach ($rutas as $ruta)
                <option value="{{ $ruta }}">{{ $ruta }}</option>
            @endforeach
        </select> --}}
    </div>



</div>
