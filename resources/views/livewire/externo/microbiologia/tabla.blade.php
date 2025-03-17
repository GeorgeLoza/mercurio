<div>


    <div class="overflow-x-auto overflow-y-auto ">
    {{-- <div class="overflow-x-auto overflow-y-auto h-[calc(100vh-140px)]"> --}}
        <table class="w-full  text-sm text-center text-gray-500 dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400  sticky top-0 z-20">
                <tr>
                    <th scope="col" class="px-0 py-0 sticky left-0 z-30 bg-gray-50 dark:bg-gray-700 " rowspan="2">
                        Fecha de Solicitud
                    </th>
                    <th scope="col" class="px-0 py-0 sticky left-10  z-30 bg-gray-50 dark:bg-gray-700 " rowspan="2">
                        Fecha de Siembra
                    </th>
                    <th scope="col" class="px-0 py-0 sticky left-20 z-30 bg-gray-50 dark:bg-gray-700" rowspan="2">
                        Codigo Muestra
                    </th>
                    <th scope="col" class="px-0 py-0 sticky left-32 z-30 bg-gray-50 dark:bg-gray-700 " rowspan="2" style="max-width: 15rem;">
                        Producto / Servicio <button wire:click="show_filtro">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-700 dark:fill-gray-300"
                                viewBox="0 0 512 512">
                                <path
                                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                            </svg>
                        </button>
                    </th>
                    <th scope="col" class="px-1 py-0" rowspan="2">
                        Planta
                    </th>
                    <th scope="col" class="px-1 py-0" rowspan="2">
                        Tipo
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
                    <th scope="col" class="px-1 py-0 border-x" colspan="5">
                        Lectura dia 2
                    </th>
                    <th scope="col" class="px-1 py-0 border-l" colspan="4">
                        Lectura dia 5
                    </th>
                    <th scope="col" class="px-1 py-0" rowspan="2">
                        Observaciones
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
                    <th scope="col" class="px-1 py-0 ">
                        Coliformes totales
                    </th>
                    <th class="border-r">

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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if ($filtro == true)
                <!-- fila de filtros -->
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700  z-20 top-6">


                    {{-- fin filtro categoria --}}
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class="p-1 w-16   ">
                        <select wire:model.live='f_planta'
                            class="block  w-16   p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected class="font-normal" value="">Planta</option>

                            <option value="Carsa"> Carsa</option>
                            <option value="Álamo"> Alamo</option>
                            <option value="Panaderia"> Panaderia</option>
                            <option value="Tecalim"> Tecalim</option>
                            <option value="Galleteria R"> Galleteria Prod.</option>
                            <option value="Galleteria M"> Galleteria Serv.</option>

                            <option value="Soya"> Soya</option>

                            <option value="Tecalim-Panetones"> Teca. Paneton</option>
                        </select>
                    </th>

                    <th class="p-1 ">
                        <select wire:model.live='f_tipo'
                            class="block w-16  p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" class="font-normal">Tipo</option>

                            <option value="grupo_1"> Servicios</option>
                            <option value="grupo_2"> Productos</option>

                        </select>
                    </th>



                </tr>
            @endif
                @foreach ($microbiologia as $index => $micro)
                    <tr
                        class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row"
                            class="sticky left-0 z-10 bg-white dark:bg-gray-800 px-1 py-0  text-gray-900 whitespace-nowrap dark:text-white">


                            {{ \Carbon\Carbon::parse($micro->detalleSolicitudPlanta->solicitudPlanta->tiempo)->format('d-m-y') }}

                        </td>
                        <td scope="row"
                            class="sticky left-10    z-10 bg-white dark:bg-gray-800 px-1 py-0  text-gray-900 whitespace-nowrap dark:text-white">


                            @if ($micro->fecha_sembrado)
                            {{ \Carbon\Carbon::parse($micro->fecha_sembrado)->format('d-m-y') }}
                        @endif
                        </td>
                        <td class="px-1 py-0 sticky left-20 z-10 bg-white dark:bg-gray-800" nowrap>
                            {{ ltrim($micro->detalleSolicitudPlanta->subcodigo, '0') }}
                        </td>
                        <td class="px-1 py-0 sticky left-32 z-10 bg-white dark:bg-gray-800 text-2xs overflow-hidden text-ellipsis whitespace-nowrap" data-popover-target="popover-{{ $micro->id }}" style="max-width: 15rem;">
                            @if ($micro->detalleSolicitudPlanta->productosPlanta)
                                {{ $micro->detalleSolicitudPlanta->productosPlanta->nombre }}
                            @else
                                {{ $micro->detalleSolicitudPlanta->otro }}
                            @endif
                        </td>

                        {{-- Popover --}}
                        <div data-popover id="popover-{{ $micro->id }}" role="tooltip"
                            class="absolute z-50 invisible font-normal p-2 text-center inline-block w-80 text-xs text-gray-500 transition-opacity duration-300 bg-gray-200 border border-gray-300 rounded-lg shadow-sm opacity-0 dark:text-gray-200 dark:border-gray-600 dark:bg-gray-700 top-0 left-1/2 transform ">
                            @if ($micro->detalleSolicitudPlanta->productosPlanta)
                                {{ $micro->detalleSolicitudPlanta->productosPlanta->nombre }}
                            @else
                                {{ $micro->detalleSolicitudPlanta->otro }}
                            @endif
                            <div data-popper-arrow></div>
                        </div>




                        <td class="px-1 py-0 text-2xs" nowrap>

                            {{ $micro->detalleSolicitudPlanta->user->planta->nombre }}
                        </td>
                        <td class="px-1 py-0 text-2xs" nowrap>

                            {{ $micro->detalleSolicitudPlanta->tipoMuestra->nombre }}
                        </td>
                        <td class="px-1 py-0">
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
                        <td class="px-1 py-0" nowrap>
                            @if ($micro->detalleSolicitudPlanta->fecha_vencimiento)
                                {{ \Carbon\Carbon::parse($micro->detalleSolicitudPlanta->fecha_vencimiento)->format('d-m-y') }}
                            @endif
                        </td>
                        <td class="px-1 py-0">
                            {{ $micro->detalleSolicitudPlanta->lote }}
                        </td>
                        <td class="px-1 py-0 border-l" nowrap>
                            <form  wire:submit="sembrarNow({{ $micro->id }})" class="flex">


                                <div class="p-1">

                                    <button class="bg-green-600 fill-white p-1 rounded-md" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="h-3 w-3">
                                            <path
                                                d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td class="px-1 py-0 border-r" nowrap>
                            @if ($micro->ana_sem_id)
                                {{ substr($micro->user1->nombre, 0, 1) .
                                    substr(explode(' ', $micro->user1->nombre)[1] ?? '', 0, 1) .
                                    substr($micro->user1->apellido, 0, 1) .
                                    substr(explode(' ', $micro->user1->apellido)[1] ?? '', 0, 1) }}
                            @endif
                        </td>
                        <td class="px-1 py-0 border-l" nowrap>
                            @if ($micro->fecha_dia2)
                                {{ \Carbon\Carbon::parse($micro->fecha_dia2)->format('d-m-y') }}
                            @endif
                        </td>
                        <td class="px-1 py-0" nowrap>
                            @if ($micro->ana_dia2_id)
                                {{ substr($micro->user2->nombre, 0, 1) .
                                    substr(explode(' ', $micro->user2->nombre)[1] ?? '', 0, 1) .
                                    substr($micro->user2->apellido, 0, 1) .
                                    substr(explode(' ', $micro->user2->apellido)[1] ?? '', 0, 1) }}
                            @endif
                        </td>
                        <td class="px-1 py-0" nowrap>
                            <p class="p-0">
                                @if ($micro->aer_mes >= 1000000)
                                    MNPC
                                @elseif ($micro->aer_mes < 1000000 && $micro->aer_mes >= 10)
                                    {{ $micro->aer_mes < 1
                                        ? $micro->aer_mes * 10 ** (strlen(floor($micro->aer_mes)) - 1)
                                        : $micro->aer_mes / 10 ** (strlen(floor($micro->aer_mes)) - 1) }}
                                    x 10<sup>{{ strlen(floor($micro->aer_mes)) - 1 }}</sup>
                                    @elseif ($micro->aer_mes > 0)
                                            {{ $micro->aer_mes }}
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
                                    @elseif ($micro->aer_mes2 < 1000000 && $micro->aer_mes2 >= 10)
                                        {{ $micro->aer_mes2 < 1
                                            ? $micro->aer_mes2 * 10 ** (strlen(floor($micro->aer_mes2)) - 1)
                                            : $micro->aer_mes2 / 10 ** (strlen(floor($micro->aer_mes2)) - 1) }}
                                        x 10<sup>{{ strlen(floor($micro->aer_mes2)) - 1 }}</sup>
                                        @elseif ($micro->aer_mes2 > 0)
                                            {{ $micro->aer_mes2 }}
                                    @elseif ($micro->aer_mes2 === 0)
                                        < 1 x 10<sup>1</sup>
                                        @elseif (is_null($micro->aer_mes2))
                                            --
                                    @endif
                                </p>
                            @endif


                        </td>


                        <td class="px-1 py-0  flex items-center " nowrap>
                            <div>

                                <p class="p-0">
                                    @if ($micro->col_tot >= 1000000)
                                        MNPC
                                    @elseif ($micro->col_tot < 1000000 && $micro->col_tot >= 10)
                                        {{ $micro->col_tot < 1
                                            ? $micro->col_tot * 10 ** (strlen(floor($micro->col_tot)) - 1)
                                            : $micro->col_tot / 10 ** (strlen(floor($micro->col_tot)) - 1) }}
                                        x 10<sup>{{ strlen(floor($micro->col_tot)) - 1 }}</sup>
                                        @elseif ($micro->col_tot > 0)
                                            {{ $micro->col_tot }}
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
                                        @elseif ($micro->col_tot2 < 1000000 && $micro->col_tot2 >= 10)
                                            {{ $micro->col_tot2 < 1
                                                ? $micro->col_tot2 * 10 ** (strlen(floor($micro->col_tot2)) - 1)
                                                : $micro->col_tot2 / 10 ** (strlen(floor($micro->col_tot2)) - 1) }}
                                            x 10<sup>{{ strlen(floor($micro->col_tot2)) - 1 }}</sup>
                                            @elseif ($micro->col_tot2 > 0)
                                            {{ $micro->col_tot2 }}
                                        @elseif ($micro->col_tot2 === 0)
                                            < 1 x 10<sup>1</sup>
                                            @elseif (is_null($micro->col_tot2))
                                                --
                                        @endif

                                    </p>
                                @endif

                            </div>

                        </td>
                        <td class="border-r">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 28)->where('permiso_id', 1)->isNotEmpty() ||
                            auth()->user()->role->id == 1)
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

                        <td class="px-1 py-0 " nowrap>
                            @if ($micro->fecha_dia5)
                                {{ \Carbon\Carbon::parse($micro->fecha_dia5)->format('d-m-y') }}
                            @endif
                        </td>
                        <td class="px-1 py-0 " nowrap>
                            @if ($micro->ana_dia5_id)
                                {{ substr($micro->user3->nombre, 0, 1) .
                                    substr(explode(' ', $micro->user3->nombre)[1] ?? '', 0, 1) .
                                    substr($micro->user3->apellido, 0, 1) .
                                    substr(explode(' ', $micro->user3->apellido)[1] ?? '', 0, 1) }}
                            @endif
                        </td>

                        <td class="px-1 py-0" nowrap>

                            <div class="flex items-center">
                                <div>
                                    <p class="p-0">

                                        @if ($micro->moh_lev >= 1000000)
                                            MNPC
                                        @elseif ($micro->moh_lev < 1000000 && $micro->moh_lev >= 10)
                                            {{ $micro->moh_lev < 1
                                                ? $micro->moh_lev * 10 ** (strlen(floor($micro->moh_lev)) - 1)
                                                : $micro->moh_lev / 10 ** (strlen(floor($micro->moh_lev)) - 1) }}
                                            x 10<sup>{{ strlen(floor($micro->moh_lev)) - 1 }}</sup>
                                        @elseif ($micro->moh_lev > 0)
                                            {{ $micro->moh_lev }}
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
                                            @elseif ($micro->moh_lev2 < 1000000 && $micro->moh_lev2 >= 10)
                                                {{ $micro->moh_lev2 < 1
                                                    ? $micro->moh_lev2 * 10 ** (strlen(floor($micro->moh_lev2)) - 1)
                                                    : $micro->moh_lev2 / 10 ** (strlen(floor($micro->moh_lev2)) - 1) }}
                                                x 10<sup>{{ strlen(floor($micro->moh_lev2)) - 1 }}</sup>

                                                @elseif ($micro->moh_lev2 > 0)
                                            {{ $micro->moh_lev2 }}
                                            @elseif ($micro->moh_lev2 === 0)
                                                < 1 x 10<sup>1</sup>
                                                @elseif (is_null($micro->moh_lev2))
                                                    --
                                            @endif
                                        </p>
                                    @endif
                                </div>



                            </div>


                        </td>

                        <td>
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 28)->where('permiso_id', 1)->isNotEmpty() ||
                                        auth()->user()->role->id == 1)

                                       @if ($micro->detalleSolicitudPlanta->tipoMuestra->id !=9)


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
                                @endif
                        </td>


                        <td>

                            {{$micro->observaciones}}
                        </td>
                        <td class="px-1 py-0 flex justify-center ">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 28)->where('permiso_id', 1)->isNotEmpty())
                                <form novalidate wire:submit="sembrar({{ $micro->id }})" class="flex">

                                    <div>
                                        <input type="date" wire:model="fecha_sembrado"
                                            class="border rounded p-1 " />
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
    @if (!$aplicandoFiltros)
    <div>
        {{ $microbiologia->links('pagination::tailwind') }}
    </div>
@endif


</div>
