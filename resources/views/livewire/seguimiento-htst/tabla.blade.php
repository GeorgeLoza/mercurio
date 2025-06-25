<div wire:poll.10s>
    <div class="flex gap-2 mt-2">
        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 34)->where('permiso_id', 1)->isNotEmpty())
            <button class="bg-green-500 rounded-md text-white  py-1.5 px-2 text-lg mb-2"
                onclick="Livewire.dispatch('openModal', { component: 'seguimientoHtst.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg>
            </button>
        @endif
    </div>
    <div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        Cod.
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        F. Siem.
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        F. Venc.
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        ORP
                        <button wire:click="show_filtro">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-700 dark:fill-gray-300"
                                viewBox="0 0 512 512">
                                <path
                                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                            </svg>
                        </button>
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        Cab.
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        hora <br> sachet
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        Lote
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        Prep.
                    </th>
                    <th scope="col" class="px-1 py-3  sticky top-0 bg-white dark:bg-gray-700">
                        Producto
                    </th>

                    <th scope="col" class="  gap-1 px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 ">
                        Aerobios <br> mesófilos
                    </th>
                    <th scope="col" class="  gap-1 px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 ">
                        Coliformes <br> Totales
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 " nowrap>
                        Mohos y <br> levaduras
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 " nowrap>
                        Usuario <br> Solicitante
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 " nowrap>
                        Usuario <br> Siembra
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 " nowrap>
                        Usuario <br> 2 Dias
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 " nowrap>
                        Usuario <br> 5 Dias
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 " nowrap>
                        Observaciones
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 " nowrap>
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody class="text-2xs">
                @if ($filtro == true)
                    <!-- fila de filtros -->
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700  z-20 top-6">
                        <th>
                            <input type="number" wire:model.live='f_codigo' placeholder="F. Codigo"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                        </th>
                        <th>
                            <input type="text" wire:model.live='f_siembra' placeholder="F. Siembra"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                        </th>
                        <th></th>
                        {{-- fin filtro categoria --}}
                        <th>
                            <input type="text" wire:model.live='f_orp' placeholder="Filtrar por Orp"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        </th>
                        <th> <input type="text" wire:model.live='f_cabezal' placeholder="F. cabezal"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        </th>

                        <th>

                            <select wire:model.live="f_destino" id="f_destino"
                                class="w-full border border-gray-300 rounded p-2">
                                <option class="dark:bg-slate-800" value="">Destino</option>
                                @foreach ($destinoProductos as $destino)
                                    <option class="dark:bg-slate-800" value="{{ $destino->id }}">{{ $destino->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <input wire:model.live='f_lote' placeholder="F. lote"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                        </th>
                        <th>
                            <input type="text" wire:model.live='f_preparacion' placeholder="F. prep"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        </th>






                    </tr>
                @endif
                @foreach ($seguimientos as $seguimiento)
                    <tr class="text-center py-2">
                        <td>
                            {{ $seguimiento->codigo }}
                        </td>
                        <td class=" px-1 py-1">
                            @if ($seguimiento->fechaSiembra)
                                {{ \Carbon\Carbon::parse($seguimiento->fechaSiembra)->isoFormat('DD-MM', 0, 'es') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class=" px-1 py-1">
                            @if ($seguimiento->orp->fecha_vencimiento1)
                                {{ \Carbon\Carbon::parse($seguimiento->orp->fecha_vencimiento1)->isoFormat('DD-MM-YY', 0, 'es') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-1 py-1">
                            {{ $seguimiento->orp->codigo }}
                        </td>
                        <td class=" px-1 py-1">{{ $seguimiento->origen->alias ?? '-' }}</td>
                        <td class=" px-1 py-1">
                            @if ($seguimiento->hora_sachet)
                                {{ \Carbon\Carbon::parse($seguimiento->hora_sachet)->isoFormat('HH:mm', 0, 'es') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class=" px-1 py-1">{{ $seguimiento->lote ?? '-' }}</td>
                        <td class=" px-1 py-1">{{ $seguimiento->preparacion ?? '-' }}</td>
                        <td class="px-1 py-1 max-w-[200px] truncate text-ellipsis whitespace-nowrap text-2xs">
                            {{ $seguimiento->orp->producto->nombre ?? '-' }}
                        </td>


                        <td class="px-1 py-1" nowrap>
                            <div class="flex justify-between items-center w-full">
                                <div>
                                    @if ($seguimiento->rt >= 1000000)
                                        MNPC
                                    @elseif ($seguimiento->rt < 1000000 && $seguimiento->rt >= 10)
                                        {{ $seguimiento->rt < 1
                                            ? $seguimiento->rt * 10 ** (strlen(floor($seguimiento->rt)) - 1)
                                            : $seguimiento->rt / 10 ** (strlen(floor($seguimiento->rt)) - 1) }}
                                        x 10<sup>{{ strlen(floor($seguimiento->rt)) - 1 }}</sup>
                                    @elseif ($seguimiento->rt > 0)
                                        {{ $seguimiento->rt }}
                                    @elseif (is_null($seguimiento->rt))
                                        --
                                    @elseif ($seguimiento->rt == 0)
                                        < 1 x 10<sup>1</sup>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-1 py-1" nowrap>
                            <div class="flex justify-between items-center w-full">
                                <div>
                                    @if ($seguimiento->col >= 1000000)
                                        MNPC
                                    @elseif ($seguimiento->col < 1000000 && $seguimiento->col >= 10)
                                        {{ $seguimiento->col < 1
                                            ? $seguimiento->col * 10 ** (strlen(floor($seguimiento->col)) - 1)
                                            : $seguimiento->col / 10 ** (strlen(floor($seguimiento->col)) - 1) }}
                                        x 10<sup>{{ strlen(floor($seguimiento->col)) - 1 }}</sup>
                                    @elseif ($seguimiento->col > 0)
                                        {{ $seguimiento->col }}
                                    @elseif (is_null($seguimiento->col))
                                        --
                                    @elseif ($seguimiento->col == 0)
                                        < 1 x 10<sup>1</sup>
                                    @endif
                                </div>
                                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 34)->where('permiso_id', 3)->isNotEmpty())
                                    @if (!is_null($seguimiento->fechaSiembra))
                                        <div class="flex gap-1 mr-2 ml-1">
                                            <svg wire:click="dia2({{ $seguimiento->id }})"
                                                class="h-5 mr-2  ml-1 fill-green-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                            </svg>
                                            <svg onclick="Livewire.dispatch('openModal', { component: 'seguimiento-htst.editar', arguments: { id: {{ $seguimiento->id }}, id2:1 } })"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 fill-blue-600 dark:fill-blue-500 cursor-pointer"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                            </svg>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </td>
                        <td class="px-1 py-1" nowrap>
                            <div class="flex justify-between items-center w-full">
                                <div class="mr-1">
                                    @if ($seguimiento->moho >= 1000000)
                                        MNPC
                                    @elseif ($seguimiento->moho < 1000000 && $seguimiento->moho >= 10)
                                        {{ $seguimiento->moho < 1
                                            ? $seguimiento->moho * 10 ** (strlen(floor($seguimiento->moho)) - 1)
                                            : $seguimiento->moho / 10 ** (strlen(floor($seguimiento->moho)) - 1) }}
                                        x 10<sup>{{ strlen(floor($seguimiento->moho)) - 1 }}</sup>
                                    @elseif ($seguimiento->moho > 0)
                                        {{ $seguimiento->moho }}
                                    @elseif (is_null($seguimiento->moho))
                                        --
                                    @elseif ($seguimiento->moho == 0)
                                        < 1 x 10<sup>1</sup>
                                    @endif
                                </div>
                                <div class="flex gap-1 items-center mt-1">
                                    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 34)->where('permiso_id', 3)->isNotEmpty())
                                        @if (is_null($seguimiento->fechaSiembra))
                                            <svg wire:click="sembrarnow({{ $seguimiento->id }})"
                                                class="h-4 fill-green-500 cursor-pointer "
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path
                                                    d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z" />
                                            </svg>
                                        @endif
                                        @if (!is_null($seguimiento->fechaSiembra))
                                            <svg wire:click="dia5({{ $seguimiento->id }})"
                                                class="h-5 mr-2 ml-1 fill-green-500"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path
                                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                            </svg>
                                            <svg onclick="Livewire.dispatch('openModal', { component: 'seguimiento-htst.editar', arguments: { id: {{ $seguimiento->id }}, id2:2 } })"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 fill-blue-600 dark:fill-blue-500 cursor-pointer"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class=" px-1 py-1">
                            @if ($seguimiento->usuarioSolicitud)
                                {{ substr($seguimiento->usuarioSolicitud->nombre, 0, 1) .
                                    substr(explode(' ', $seguimiento->usuarioSolicitud->nombre)[1] ?? '', 0, 1) .
                                    substr($seguimiento->usuarioSolicitud->apellido, 0, 1) .
                                    substr(explode(' ', $seguimiento->usuarioSolicitud->apellido)[1] ?? '', 0, 1) }}
                            @endif
                        </td>
                        <td class=" px-1 py-1">
                            @if ($seguimiento->usuarioSiembra)
                                {{ substr($seguimiento->usuarioSiembra->nombre, 0, 1) .
                                    substr(explode(' ', $seguimiento->usuarioSiembra->nombre)[1] ?? '', 0, 1) .
                                    substr($seguimiento->usuarioSiembra->apellido, 0, 1) .
                                    substr(explode(' ', $seguimiento->usuarioSiembra->apellido)[1] ?? '', 0, 1) }}
                            @else
                                -
                            @endif
                        </td>
                        <td class=" px-1 py-1">
                            @if ($seguimiento->usuarioDia2)
                                {{ substr($seguimiento->usuarioDia2->nombre, 0, 1) .
                                    substr(explode(' ', $seguimiento->usuarioDia2->nombre)[1] ?? '', 0, 1) .
                                    substr($seguimiento->usuarioDia2->apellido, 0, 1) .
                                    substr(explode(' ', $seguimiento->usuarioDia2->apellido)[1] ?? '', 0, 1) }}
                            @else
                                -
                            @endif
                        </td>
                        <td class=" px-1 py-1">
                            @if ($seguimiento->usuarioDia5)
                                {{ substr($seguimiento->usuarioDia5->nombre, 0, 1) .
                                    substr(explode(' ', $seguimiento->usuarioDia5->nombre)[1] ?? '', 0, 1) .
                                    substr($seguimiento->usuarioDia5->apellido, 0, 1) .
                                    substr(explode(' ', $seguimiento->usuarioDia5->apellido)[1] ?? '', 0, 1) }}
                            @else
                                -
                            @endif
                        </td>
                        <td class=" px-1 py-1">{{ $seguimiento->observaciones ?? '-' }}</td>

                        <td class="flex">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 34)->where('permiso_id', 4)->isNotEmpty() ||
                                    (now()->diffInMinutes($seguimiento->created_at) < 60 &&
                                        auth()->user()->id == $seguimiento->usuarioSolicitud->id))
                                <button wire:click="eliminar({{ $seguimiento->id }})"
                                    wire:confirm="Esta seguro de eliminar el elemento?">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-10 fill-red-600 dark:fill-red-500" viewBox="0 0 448 512">
                                        <path
                                            d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                    </svg>
                                </button>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 34)->where('permiso_id', 3)->isNotEmpty())
                                <form novalidate wire:submit="sembrar({{ $seguimiento->id }})" class="flex">
                                    <div>
                                        <input type="date" wire:model="fechaSiembra"
                                            class="border rounded p-1 " />
                                        @error('fechaSiembra')
                                            <p class="text-red-500">Debe colocar una fecha</p>
                                        @enderror
                                    </div>
                                    <div class="p-1">
                                        <button class="bg-green-600 fill-white p-1 rounded-md" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                class="h-4 w-4">
                                                <path
                                                    d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $seguimientos->links() }}
    </div>



    <div class="p-2">
        <p class="mb-1">Descargar Reporte</p>



        <button class="bg-green-500 p-2 text-center rounded-md" wire:click="exportarExcel">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-5 w-5 fill-white">
                <path
                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z" />
            </svg>
        </button>
        <button class="bg-red-600 p-2 text-center rounded-md  gap-2" wire:click="generatePDF"
            wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
                <path
                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
            </svg>



        </button>

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

        {{-- <!-- Campo de filtro por ruta -->
        <label for="ruta">Ruta:</label>
        <select id="ruta" class="rounded p-1 mx-2 bg-white text-black" wire:model.defer="ruta">
            <option value="">Seleccionar Ruta</option>
            @foreach ($rutas as $ruta)
                <option value="{{ $ruta }}">{{ $ruta }}</option>
            @endforeach
        </select> --}}
    </div>
</div>
