<div>
    <div>
        <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            <input type="radio" wire:model.live="selectedOption" value="fisico"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            Fisoquímico
        </label>

        <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            <input type="radio" wire:model.live="selectedOption" value="micro"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            Microbiológico
        </label>
    </div>

    <div>
        <div class="overflow-x-auto overflow-y-auto">
            <!--Tabla de fisico-->
            @if ($selectedOption === 'fisico')
                <table class="w-full  text-xs text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-1">
                                #
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Codigo
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Producto
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Lote
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Tipo
                            </th>
                            @if (auth()->user()->rol == 'Admi' || auth()->user()->rol == 'Jef')
                                <th scope="col" class="px-2 py-1">
                                    Planta
                                </th>
                                <th scope="col" class="px-2 py-1">
                                    Temperatura
                                </th>
                                <th scope="col" class="px-2 py-1">
                                    %Hr
                                </th>
                                <th scope="col" class="px-2 py-1">
                                    Aw
                                </th>
                            @endif
                            <th scope="col" class="px-2 py-1">
                                Estado
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Opciones
                            </th>

                        </tr>
                        <tr>
                            <th scope="col" class="px-2 py-1">

                            </th>
                            <th scope="col" class="px-2 py-1">
                                <input type="text" id="" wire:model.live='f_codigo'
                                    class="bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="">
                            </th>
                            <th scope="col" class="px-2 py-1">
                                <input type="text" id="" wire:model.live='f_producto'
                                    class="bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="">
                            </th>
                            <th scope="col" class="">
                                <input type="text" id="" wire:model.live='f_lote'
                                    class="bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="">
                            </th>
                            @if (auth()->user()->rol == 'Admi')
                                <th scope="col" class="px-2 py-1">

                                </th>
                                <th scope="col" class="px-2 py-1">

                                </th>
                                <th scope="col" class="px-2 py-1">

                                </th>
                                <th scope="col" class="px-2 py-1">

                                </th>
                            @endif
                            <th scope="col" class="px-2 py-1">

                            </th>
                            <th scope="col" class="px-2 py-1">
                                <input type="text" id="" wire:model.live='f_estado'
                                    class="bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="">
                            </th>
                            <th scope="col" class="px-2 py-1">

                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fisicos as $index => $fis)
                            <tr
                                class="b-500 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="  px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index + 1 }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                    nowrap>{{ $fis->detalleSolicitudPlanta->subcodigo }}</td>
                                <td class="px-3 py-2">{{ $fis->detalleSolicitudPlanta->productosPlanta->nombre }}</td>
                                <td class="px-3 py-2">{{ $fis->detalleSolicitudPlanta->lote }}</td>
                                <td class="px-3 py-2" nowrap>{{ $fis->detalleSolicitudPlanta->tipoMuestra->nombre }}
                                </td>
                                @if (auth()->user()->rol == 'Admi' || auth()->user()->rol == 'Jef')
                                    <td class="px-3 py-2" nowrap>
                                        {{ $fis->detalleSolicitudPlanta->user->planta->nombre }}</td>
                                    <td class="px-3 py-2" nowrap>{{ $fis->temperatura }}</td>
                                    <td class="px-3 py-2" nowrap>{{ $fis->por_hum_rel }}</td>
                                    <td class="px-3 py-2" nowrap>{{ $fis->act_agua }}</td>
                                @endif
                                <td class="px-3 py-2" nowrap>
                                    <div class="flex items-center">
                                        @if ($fis->detalleSolicitudPlanta->estado == 'Cancelado')
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-1"></div>
                                        @endif
                                        @if ($fis->detalleSolicitudPlanta->estado == 'Solicitado' || $fis->detalleSolicitudPlanta->estado == '')
                                            <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-1"></div>Solicitado
                                        @endif
                                        @if ($fis->detalleSolicitudPlanta->estado == 'Analizando')
                                            <div class="h-2.5 w-2.5 rounded-full bg-blue-500 mr-1"></div>
                                        @endif
                                        @if ($fis->detalleSolicitudPlanta->estado == 'Revision')
                                            <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-1"></div>
                                        @endif
                                        @if ($fis->detalleSolicitudPlanta->estado == 'Terminado')
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-1"></div>
                                        @endif
                                        {{ $fis->detalleSolicitudPlanta->estado }}
                                    </div>
                                </td>
                                <td class="px-3 py-2" nowrap>
                                    @if (auth()->user()->rol == 'Admi' || auth()->user()->rol == 'Jef')
                                        <!--boton para cancelar-->
                                        <button class="p-2 rounded-md "
                                            wire:click="cancelar({{ $fis->detalleSolicitudPlanta->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 h-5 w-5"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                            </svg>
                                        </button>
                                        <!--boton para emitir certificado-->
                                        <button class="p-2 rounded-md "
                                            wire:click="cambiar_estado({{ $fis->detalleSolicitudPlanta->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                                viewBox="0 0 512 512">

                                                <path
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                            </svg>
                                        </button>
                                    @endif
                                    <!--boton de obtener pdf de certificado-->
                                    @if ($fis->detalleSolicitudPlanta->estado == 'Terminado')
                                        <button class="p-2 rounded-md bg-red-600">
                                            <a
                                                href="{{ route('certificado_fis.pdf_cer', $fis->detalleSolicitudPlanta->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white h-4 w-4"
                                                    viewBox="0 0 384 512">
                                                    <path
                                                        d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                                </svg>
                                            </a>
                                        </button>
                                    @endif
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

                @if (!$aplicandoFiltros)
                    <div>
                        {{ $fisicos->links('pagination::tailwind') }}
                    </div>
                @endif


                <!--Tabla de microbiologia-->
            @elseif($selectedOption === 'micro')
                <table class="w-full  text-xs text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-1">
                                #
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Código
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Producto
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Lote
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Tipo
                            </th>
                            @if (auth()->user()->rol == 'Admi' || auth()->user()->rol == 'Jef')
                                <th scope="col" class="px-2 py-1">
                                    Planta
                                </th>
                                <th scope="col" class="px-2 py-1">
                                    Mesófilos, Aeróbicos Totales
                                </th>
                                <th scope="col" class="px-2 py-1">
                                    Coliformes Totales
                                </th>
                                <th scope="col" class="px-2 py-1">
                                    Mohos y Levaduras
                                </th>
                            @endif
                            <th scope="col" class="px-2 py-1">
                                Estado
                            </th>
                            <th scope="col" class="px-2 py-1">
                                Opciones
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-2 py-1">

                            </th>
                            <th scope="col" class="px-2 py-1">
                                <input type="text" id="" wire:model.live='f_codigo'
                                    class="bg-gray-50 w-32 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="">
                            </th>
                            <th scope="col" class="px-2 py-1">
                                <input type="text" id="" wire:model.live='f_producto'
                                    class="bg-gray-50 w-32 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="">
                            </th>
                            <th scope="col" class="">
                                <input type="text" id="" wire:model.live='f_lote'
                                    class="bg-gray-50 w-32 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="">
                            </th>
                            <th scope="col" class="px-2 py-1">

                            </th>
                            @if (auth()->user()->rol == 'Admi' || auth()->user()->rol == 'Jef')
                                <th scope="col" class="px-2 py-1">

                                </th>
                                <th scope="col" class="px-2 py-1">

                                </th>
                                <th scope="col" class="px-2 py-1">

                                </th>
                                <th scope="col" class="px-2 py-1">

                                </th>
                            @endif
                            <th scope="col" class="px-2 py-1">
                                <input type="text" id="" wire:model.live='f_estado'
                                    class="bg-gray-50 border w-32 border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="">
                            </th>
                            <th scope="col" class="px-2 py-1">

                            </th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($micros as $index => $micro)
                            <tr
                                class=" border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="  px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index + 1 }}
                                </td>
                                <td scope="row"
                                    class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                    nowrap>{{ $micro->detalleSolicitudPlanta->subcodigo }}</td>

                                <td class="px-2 py-2">
                                    @if ($micro->detalleSolicitudPlanta->productosPlanta)
                                        {{ $micro->detalleSolicitudPlanta->productosPlanta->nombre }}
                                    @else
                                        {{ $micro->detalleSolicitudPlanta->otro }}
                                    @endif

                                </td>
                                <td class="px-2 py-2">{{ $micro->detalleSolicitudPlanta->lote }}</td>
                                <td class="px-2 py-2" nowrap>{{ $micro->detalleSolicitudPlanta->tipoMuestra->nombre }}
                                </td>
                                @if (auth()->user()->rol == 'Admi' || auth()->user()->rol == 'Jef')
                                    <td class="px-3 py-2" nowrap>
                                        {{ $micro->detalleSolicitudPlanta->user->planta->nombre }}
                                    </td>
                                    <td class="px-2 py-2">
                                        @if ($micro->aer_mes >= 1000000)
                                            MNPC
                                        @endif
                                        @if ($micro->aer_mes < 1000000 && $micro->aer_mes >= 1)
                                            {{ $micro->aer_mes < 1
                                                ? $micro->aer_mes * 10 ** (strlen(floor($micro->aer_mes)) - 1)
                                                : $micro->aer_mes / 10 ** (strlen(floor($micro->aer_mes)) - 1) }}
                                            x 10<sup>{{ strlen(floor($micro->aer_mes)) - 1 }}</sup>
                                        @endif

                                        @if ($micro->aer_mes == null && $micro->aer_mes != 0)
                                            --
                                        @endif
                                        @if ($micro->aer_mes == 0)
                                            < 1 x 10<sup>1</sup>
                                        @endif

                                        @if ($micro->aer_mes2 !== null)
                                            @if ($micro->aer_mes2 >= 1000000)
                                                MNPC
                                            @endif
                                            @if ($micro->aer_mes2 < 1000000 && $micro->aer_mes2 >= 1)
                                                {{ $micro->aer_mes2 < 1
                                                    ? $micro->aer_mes2 * 10 ** (strlen(floor($micro->aer_mes2)) - 1)
                                                    : $micro->aer_mes2 / 10 ** (strlen(floor($micro->aer_mes2)) - 1) }}
                                                x 10<sup>{{ strlen(floor($micro->aer_mes)) - 1 }}</sup>
                                            @endif

                                            @if ($micro->aer_mes2 == null && $micro->aer_mes2 != 0)
                                                --
                                            @endif
                                            @if ($micro->aer_mes2 == 0)
                                                < 1 x 10<sup>1</sup>
                                            @endif
                                        @endif

                                    </td>
                                    <td class="px-2 py-2 ">
                                        @if ($micro->col_tot >= 1000000)
                                            MNPC
                                        @endif
                                        @if ($micro->col_tot < 1000000 && $micro->col_tot >= 1)
                                            {{ $micro->col_tot < 1
                                                ? $micro->col_tot * 10 ** (strlen(floor($micro->col_tot)) - 1)
                                                : $micro->col_tot / 10 ** (strlen(floor($micro->col_tot)) - 1) }}
                                            x 10<sup>{{ strlen(floor($micro->col_tot)) - 1 }}</sup>
                                        @endif

                                        @if ($micro->col_tot === null)
                                            --
                                        @endif
                                        @if ($micro->col_tot === 0)
                                            < 1 x 10<sup>1</sup>
                                        @endif

                                        @if ($micro->col_tot2 !== null)
                                            @if ($micro->col_tot2 >= 1000000)
                                                MNPC
                                            @endif
                                            @if ($micro->col_tot2 < 1000000 && $micro->col_tot2 >= 1)
                                                {{ $micro->col_tot2 < 1
                                                    ? $micro->col_tot2 * 10 ** (strlen(floor($micro->col_tot2)) - 1)
                                                    : $micro->col_tot2 / 10 ** (strlen(floor($micro->col_tot2)) - 1) }}
                                                x 10<sup>{{ strlen(floor($micro->col_tot2)) - 1 }}</sup>
                                            @endif

                                            @if ($micro->col_tot2 === null)
                                                --
                                            @endif
                                            @if ($micro->col_tot === 0)
                                                < 1 x 10<sup>1</sup>
                                            @endif
                                        @endif

                                    </td>
                                    <td class="px-2 py-2 ">
                                        @if ($micro->moh_lev >= 1000000)
                                            MNPC
                                        @endif
                                        @if ($micro->moh_lev < 1000000 && $micro->moh_lev >= 1)
                                            {{ $micro->moh_lev < 1
                                                ? $micro->moh_lev * 10 ** (strlen(floor($micro->moh_lev)) - 1)
                                                : $micro->moh_lev / 10 ** (strlen(floor($micro->moh_lev)) - 1) }}
                                            x 10<sup>{{ strlen(floor($micro->moh_lev)) - 1 }}</sup>
                                        @endif

                                        @if ($micro->moh_lev == null && $micro->moh_lev != 0)
                                            --
                                        @endif
                                        @if ($micro->moh_lev == 0)
                                            < 1 x 10<sup>1</sup>
                                        @endif

                                        @if ($micro->moh_lev2 !== null)
                                            @if ($micro->moh_lev2 >= 1000000)
                                                MNPC
                                            @endif
                                            @if ($micro->moh_lev2 < 1000000 && $micro->moh_lev2 >= 1)
                                                {{ $micro->moh_lev2 < 1
                                                    ? $micro->moh_lev2 * 10 ** (strlen(floor($micro->moh_lev2)) - 1)
                                                    : $micro->moh_lev2 / 10 ** (strlen(floor($micro->moh_lev2)) - 1) }}
                                                x 10<sup>{{ strlen(floor($micro->moh_lev)) - 1 }}</sup>
                                            @endif

                                            @if ($micro->moh_lev2 == null && $micro->moh_lev2 != 0)
                                                --
                                            @endif
                                            @if ($micro->moh_lev2 == 0)
                                                < 1 x 10<sup>1</sup>
                                            @endif
                                        @endif
                                    </td>
                                @endif
                                <td class="px-2 py-2" nowrap>
                                    <div class="flex items-center">
                                        @if ($micro->detalleSolicitudPlanta->estado == 'Cancelado')
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-1"></div>
                                        @endif
                                        @if ($micro->detalleSolicitudPlanta->estado == 'Solicitado' || $micro->detalleSolicitudPlanta->estado == '')
                                            <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-1"></div>Solicitado
                                        @endif
                                        @if ($micro->detalleSolicitudPlanta->estado == 'Por Analizar' || $micro->detalleSolicitudPlanta->estado == '')
                                            <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-1"></div>
                                        @endif
                                        @if ($micro->detalleSolicitudPlanta->estado == 'Analizando')
                                            <div class="h-2.5 w-2.5 rounded-full bg-blue-500 mr-1"></div>
                                        @endif
                                        @if ($micro->detalleSolicitudPlanta->estado == 'Revision')
                                            <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-1"></div>
                                        @endif
                                        @if ($micro->detalleSolicitudPlanta->estado == 'Terminado')
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-1"></div>
                                        @endif
                                        {{ $micro->detalleSolicitudPlanta->estado }}
                                    </div>
                                </td>
                                <td class="px-2 py-2" nowrap>
                                    @if (auth()->user()->rol == 'Admi' || auth()->user()->rol == 'Jef')
                                        <!--boton para cancelar-->
                                        <button class="p-2 rounded-md "
                                            wire:click="cancelar({{ $micro->detalleSolicitudPlanta->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 h-5 w-5"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                            </svg>
                                        </button>
                                        <!--boton para emitir certificado-->
                                        <button class="p-2 rounded-md "
                                            wire:click="cambiar_estado({{ $micro->detalleSolicitudPlanta->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                                viewBox="0 0 512 512">

                                                <path
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                            </svg>
                                        </button>
                                    @endif
                                    <!--boton para el PDF-->
                                    @if ($micro->detalleSolicitudPlanta->estado == 'Terminado')
                                        <button class="p-2 rounded-md bg-red-600">
                                            <a
                                            @if ($micro->detalleSolicitudPlanta->solicitudPlanta->user->planta->id == 49)
                                            href="{{ route('certificado.pdf_cer2', $micro->detalleSolicitudPlanta->id) }}"    
                                            @else
                                            href="{{ route('certificado.pdf_cer2', $micro->detalleSolicitudPlanta->id) }}"
                                            @endif
                                                >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white h-4 w-4"
                                                    viewBox="0 0 384 512">
                                                    <path
                                                        d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                                </svg>
                                            </a>
                                        </button>
                                    @endif
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
                @if (!$aplicandoFiltros)
                    <div>
                        {{ $micros->links('pagination::tailwind') }}
                    </div>
                @endif
            @endif

        </div>
    </div>

</div>
