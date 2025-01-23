<div>
    <div class="overflow-x-auto overflow-y-auto h-[calc(100vh-140px)]">
        <table class="w-full  text-sm text-center text-gray-500 dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400  sticky top-0 z-20">
                <tr>
                    <th scope="col" class="px-0 py-0 sticky left-0 z-30 bg-gray-50 dark:bg-gray-700 " rowspan="2">
                        #
                    </th>
                    <th scope="col" class="px-0 py-0 sticky left-8 z-30 bg-gray-50 dark:bg-gray-700" rowspan="2">
                        Codigo Muestra
                    </th>
                    <th scope="col" class="px-0 py-0 sticky left-28 z-30 bg-gray-50 dark:bg-gray-700" rowspan="2">
                        Producto / Servicio
                    </th>
                    <th scope="col" class="px-1 py-0" rowspan="2">
                        Planta
                    </th>
                    <th scope="col" class="px-1 py-0" rowspan="2">
                        Estado
                    </th>
                    <th scope="col" class="px-1 py-0" rowspan="2">
                        Fecha de Vencimiento
                    </th>
                    <th scope="col" class="px-1 py-0" rowspan="2">
                        Lote
                    </th>
                    <th scope="col" class="px-1 py-0 border-x" colspan="2">
                        Siembra
                    </th>
                    <th scope="col" class="px-1 py-0 border-x" colspan="4">
                        Lectura dia 2
                    </th>
                    <th scope="col" class="px-1 py-0 border-l" colspan="3">
                        Lectura dia 5
                    </th>
                    <th scope="col" class="px-1 py-0" rowspan="2">
                        Opciones
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="px-1 py-0 border-l">
                        Fecha
                    </th>
                    <th scope="col" class="px-1 py-0 border-r">
                        Analista
                    </th>
                    <th scope="col" class="px-1 py-0 border-l">
                        Fecha
                    </th>
                    <th scope="col" class="px-1 py-0">
                        Analista
                    </th>
                    <th scope="col" class="px-1 py-0">
                        Aerobios mesófilos
                    </th>
                    <th scope="col" class="px-1 py-0 border-r">
                        Coliformes totales
                    </th>
                    <th scope="col" class="px-1 py-0 border-l">
                        Fecha
                    </th>
                    <th scope="col" class="px-1 py-0 ">
                        Analista
                    </th>

                    <th scope="col" class="px-1 py-0">
                        Mohos y levaduras
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($microbiologia as $index => $micro)
                    <tr
                        class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row"
                            class="sticky left-0 z-10 bg-white dark:bg-gray-800 px-3 py-0 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-3 py-0 sticky left-8 z-10 bg-white dark:bg-gray-800" nowrap>
                            {{ $micro->detalleSolicitudPlanta->subcodigo }}
                        </td>
                        <td class="px-3 py-0 sticky left-28 z-10 bg-white dark:bg-gray-800 text-xs" nowrap>
                            @if ($micro->detalleSolicitudPlanta->productosPlanta)
                                {{ $micro->detalleSolicitudPlanta->productosPlanta->nombre }}
                            @else
                                {{ $micro->detalleSolicitudPlanta->otro }}
                            @endif
                        </td>
                        <td class="px-3 py-0" nowrap>

                            {{ $micro->detalleSolicitudPlanta->user->planta->nombre }}
                        </td>
                        <td class="px-3 py-0">
                            <div class="flex items-center">
                                @if ($micro->estado == 'Pendiente')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-1.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $micro->estado }}</span>
                                @endif
                                @if ($micro->estado == 'Analizado')
                                    <span
                                        class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-1.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $micro->estado }}</span>
                                @endif
                                @if ($micro->estado == 'Sembrado')
                                    <span
                                        class="bg-purple-100 text-purple-800 text-sm font-medium me-2 px-1.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">{{ $micro->estado }}</span>
                                @endif
                                @if ($micro->estado == '2 Dias')
                                    <span
                                        class="bg-purple-100 text-purple-800 text-sm font-medium me-2 px-1.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">{{ $micro->estado }}</span>
                                @endif
                                @if ($micro->estado == 'certificado')
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-1.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $micro->estado }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-3 py-0" nowrap>
                            @if ($micro->detalleSolicitudPlanta->fecha_vencimiento)
                                {{ \Carbon\Carbon::parse($micro->detalleSolicitudPlanta->fecha_vencimiento)->format('d-m-y') }}
                            @endif
                        </td>
                        <td class="px-3 py-0">
                            {{ $micro->detalleSolicitudPlanta->lote }}
                        </td>
                        <td class="px-3 py-0 border-l" nowrap>
                            @if ($micro->fecha_sembrado)
                                {{ \Carbon\Carbon::parse($micro->fecha_sembrado)->format('d-m-y') }}
                            @endif
                        </td>
                        <td class="px-3 py-0 border-r" nowrap>
                            @if ($micro->ana_sem_id)
                                {{ substr($micro->user1->nombre, 0, 1) .
                                    substr(explode(' ', $micro->user1->nombre)[1] ?? '', 0, 1) .
                                    substr($micro->user1->apellido, 0, 1) .
                                    substr(explode(' ', $micro->user1->apellido)[1] ?? '', 0, 1) }}
                            @endif
                        </td>
                        <td class="px-3 py-0 border-l" nowrap>
                            @if ($micro->fecha_dia2)
                                {{ \Carbon\Carbon::parse($micro->fecha_dia2)->format('d-m-y') }}
                            @endif
                        </td>
                        <td class="px-3 py-0" nowrap>
                            @if ($micro->ana_dia2_id)
                                {{ substr($micro->user2->nombre, 0, 1) .
                                    substr(explode(' ', $micro->user2->nombre)[1] ?? '', 0, 1) .
                                    substr($micro->user2->apellido, 0, 1) .
                                    substr(explode(' ', $micro->user2->apellido)[1] ?? '', 0, 1) }}
                            @endif
                        </td>
                        <td class="px-3 py-0" nowrap>
                            <p class="p-0">
                                @if ($micro->aer_mes >= 1000000)
                                    MNPC
                                @elseif ($micro->aer_mes < 1000000 && $micro->aer_mes >= 1)
                                    {{ $micro->aer_mes < 1
                                        ? $micro->aer_mes * 10 ** (strlen(floor($micro->aer_mes)) - 1)
                                        : $micro->aer_mes / 10 ** (strlen(floor($micro->aer_mes)) - 1) }}
                                    x 10<sup>{{ strlen(floor($micro->aer_mes)) - 1 }}</sup>
                                @elseif ($micro->aer_mes === 0)
                                    < 1 x 10<sup>1</sup>
                                    @elseif (is_null($micro->aer_mes))
                                        --
                                @endif

                            </p>
                            @if ($micro->aer_mes2 === null)
                            @else
                                <p class="p-0">

                                    @if ($micro->aer_mes2 >= 1000000)
                                        MNPC
                                    @elseif ($micro->aer_mes2 < 1000000 && $micro->aer_mes2 >= 1)
                                        {{ $micro->aer_mes2 < 1
                                            ? $micro->aer_mes2 * 10 ** (strlen(floor($micro->aer_mes2)) - 1)
                                            : $micro->aer_mes2 / 10 ** (strlen(floor($micro->aer_mes2)) - 1) }}
                                        x 10<sup>{{ strlen(floor($micro->aer_mes2)) - 1 }}</sup>
                                    @elseif ($micro->aer_mes2 === 0)
                                        < 1 x 10<sup>1</sup>
                                        @elseif (is_null($micro->aer_mes2))
                                            --
                                    @endif
                                </p>
                            @endif


                        </td>


                        <td class="px-3 py-0 border-r flex items-center " nowrap>
                            <div>

                                <p class="p-0">
                                    @if ($micro->col_tot >= 1000000)
                                        MNPC
                                    @elseif ($micro->col_tot < 1000000 && $micro->col_tot >= 1)
                                        {{ $micro->col_tot < 1
                                            ? $micro->col_tot * 10 ** (strlen(floor($micro->col_tot)) - 1)
                                            : $micro->col_tot / 10 ** (strlen(floor($micro->col_tot)) - 1) }}
                                        x 10<sup>{{ strlen(floor($micro->col_tot)) - 1 }}</sup>
                                    @elseif ($micro->col_tot === 0)
                                        < 1 x 10<sup>1</sup>
                                        @elseif (is_null($micro->col_tot))
                                            --
                                    @endif

                                </p>
                                @if ($micro->col_tot2 === null)
                                @else
                                    <p class="p-0">
                                        @if ($micro->col_tot2 >= 1000000)
                                            MNPC
                                        @elseif ($micro->col_tot2 < 1000000 && $micro->col_tot2 >= 1)
                                            {{ $micro->col_tot2 < 1
                                                ? $micro->col_tot2 * 10 ** (strlen(floor($micro->col_tot2)) - 1)
                                                : $micro->col_tot2 / 10 ** (strlen(floor($micro->col_tot2)) - 1) }}
                                            x 10<sup>{{ strlen(floor($micro->col_tot2)) - 1 }}</sup>
                                        @elseif ($micro->col_tot2 === 0)
                                            < 1 x 10<sup>1</sup>
                                            @elseif (is_null($micro->col_tot2))
                                                --
                                        @endif

                                    </p>
                                @endif

                            </div>
                            @if ((now()->diffInDays($micro->fecha_sembrado) < 8 && auth()->user()->role->rolModuloPermisos->where('modulo_id', 28)->where('permiso_id', 1)->isNotEmpty()) || auth()->user()->role->id == 1 )
                                <div class="flex h-full items-center justify-center ml-3">
                                    <svg wire:click="dia2({{ $micro->id }})" class="h-5 mr-1 fill-green-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                    </svg>


                                    <button>
                                        <svg onclick="Livewire.dispatch('openModal', { component: 'externo.microbiologia.edit', arguments: { id: {{ $micro->id }}, id2:1 } })"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-10 fill-blue-600 dark:fill-blue-500" viewBox="0 0 512 512">
                                            <path
                                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                        </svg>
                                    </button>
                                </div>
                            @endif

                        </td>

                        <td class="px-3 py-0 " nowrap>
                            @if ($micro->fecha_dia5)
                                {{ \Carbon\Carbon::parse($micro->fecha_dia5)->format('d-m-y') }}
                            @endif
                        </td>
                        <td class="px-3 py-0 " nowrap>
                            @if ($micro->ana_dia5_id)
                                {{ substr($micro->user3->nombre, 0, 1) .
                                    substr(explode(' ', $micro->user3->nombre)[1] ?? '', 0, 1) .
                                    substr($micro->user3->apellido, 0, 1) .
                                    substr(explode(' ', $micro->user3->apellido)[1] ?? '', 0, 1) }}
                            @endif
                        </td>

                        <td class="px-3 py-0" nowrap>

                            <div class="flex items-center">
                                <div>
                                    <p class="p-0">

                                        @if ($micro->moh_lev >= 1000000)
                                            MNPC
                                        @elseif ($micro->moh_lev < 1000000 && $micro->moh_lev >= 1)
                                            {{ $micro->moh_lev < 1
                                                ? $micro->moh_lev * 10 ** (strlen(floor($micro->moh_lev)) - 1)
                                                : $micro->moh_lev / 10 ** (strlen(floor($micro->moh_lev)) - 1) }}
                                            x 10<sup>{{ strlen(floor($micro->moh_lev)) - 1 }}</sup>
                                        @elseif ($micro->moh_lev === 0)
                                            < 1 x 10<sup>1</sup>
                                            @elseif (is_null($micro->moh_lev))
                                                --
                                        @endif
                                    </p>
                                    @if ($micro->moh_lev2 === null)
                                    @else
                                        <p class="p-0">

                                            @if ($micro->moh_lev2 >= 1000000)
                                                MNPC
                                            @elseif ($micro->moh_lev2 < 1000000 && $micro->moh_lev2 >= 1)
                                                {{ $micro->moh_lev2 < 1
                                                    ? $micro->moh_lev2 * 10 ** (strlen(floor($micro->moh_lev2)) - 1)
                                                    : $micro->moh_lev2 / 10 ** (strlen(floor($micro->moh_lev2)) - 1) }}
                                                x 10<sup>{{ strlen(floor($micro->moh_lev2)) - 1 }}</sup>
                                            @elseif ($micro->moh_lev2 === 0)
                                                < 1 x 10<sup>1</sup>
                                                @elseif (is_null($micro->moh_lev2))
                                                    --
                                            @endif
                                        </p>
                                    @endif
                                </div>
                                @if ((now()->diffInDays($micro->fecha_sembrado) < 8 && auth()->user()->role->rolModuloPermisos->where('modulo_id', 28)->where('permiso_id', 1)->isNotEmpty()) || auth()->user()->role->id == 1 )
                                    <div class="flex h-full items-center justify-center ml-3 ">
                                        <svg wire:click="dia5({{ $micro->id }})" class="h-5 mr-1 fill-green-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path
                                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                        </svg>


                                        <button>
                                            <svg onclick="Livewire.dispatch('openModal', { component: 'externo.microbiologia.edit', arguments: { id: {{ $micro->id }} , id2:2} })"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-10 fill-blue-600 dark:fill-blue-500"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                            </svg>
                                        </button>
                                    </div>
                                @endif


                            </div>


                        </td>

                        <td class="px-3 py-0 flex justify-center ">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 28)->where('permiso_id', 1)->isNotEmpty())
                            <form novalidate wire:submit="sembrar({{ $micro->id }})" class="flex">

                                <div>
                                    <input type="date" wire:model="fecha_sembrado" class="border rounded p-1 " />
                                    @error('fecha_sembrado')
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


                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 28)->where('permiso_id', 3)->isNotEmpty())

                                <button>
                                    <svg onclick="Livewire.dispatch('openModal', { component: 'externo.microbiologia.edit', arguments: { id: {{ $micro->id }}, id2:3 } })"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-10 fill-blue-600 dark:fill-blue-500" viewBox="0 0 512 512">
                                        <path
                                            d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                    </svg>
                                </button>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 28)->where('permiso_id', 4)->isNotEmpty())
                                <button wire:click="eliminar({{ $micro->id }})"
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

    <div>
        {{ $microbiologia->links('pagination::tailwind') }}
    </div>

</div>
