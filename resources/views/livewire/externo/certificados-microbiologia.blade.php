<div>


    <div>
        <div class="overflow-x-auto overflow-y-auto">
            <!--Tabla de fisico-->



            <!--Tabla de microbiologia-->

            <table class="w-full  text-xs text-center text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-1 py-0">
                            Código
                        </th>
                        <th scope="col" class="px-1 py-0">
                            Fecha
                        </th>
                        <th scope="col" class="px-1 py-0">
                            Producto
                        </th>
                        <th scope="col" class="px-1 py-0">
                            Lote
                        </th>
                        <th scope="col" class="px-1 py-0">
                            Tipo
                        </th>
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                            <th scope="col" class="px-1 py-0">
                                Planta
                            </th>
                            <th scope="col" class="px-1 py-0">
                                Mesófilos, Aeróbicos Totales
                            </th>
                            <th scope="col" class="px-1 py-0">
                                Coliformes Totales
                            </th>
                            <th scope="col" class="px-1 py-0">
                                Mohos y Levaduras
                            </th>
                        @endif
                        <th scope="col" class="px-1 py-0">
                            Estado
                        </th>
                        <th scope="col" class="px-1 py-0">
                            Opciones
                        </th>
                    </tr>
                    <tr>

                        <th scope="col" class="px-1 py-0">
                            <input type="text" id="" wire:model.live='f_codigo'
                                class="bg-gray-50 w-20 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th></th>
                        <th scope="col" class="px-1 py-0">
                            <input type="text" id="" wire:model.live='f_producto'
                                class="bg-gray-50  border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th scope="col" class="">
                            <input type="text" id="" wire:model.live='f_lote'
                                class="w-16 bg-gray-50  border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th scope="col" class="px-1 py-0">

                        </th>
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                            <th scope="col" class="px-1 py-0">
                                <input type="text" id="" wire:model.live='f_planta'
                                class="w-24 bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                            </th>
                            <th scope="col" class="px-1 py-0">

                            </th>
                            <th scope="col" class="px-1 py-0">

                            </th>
                            <th scope="col" class="px-1 py-0">

                            </th>
                        @endif
                        <th scope="col" class="px-1 py-0">
                            <input type="text" id="" wire:model.live='f_estado'
                                class="bg-gray-50 border w-24 border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th scope="col" class="px-1 py-0">

                        </th>

                    </tr>

                </thead>
                <tbody>
                    @foreach ($micros as $index => $micro)
                        <tr
                            class=" border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td scope="row"
                                class="px-1 py-0 font-medium text-gray-900 whitespace-nowrap dark:text-white" nowrap>
                                {{ $micro->detalleSolicitudPlanta->subcodigo }}</td>
                            <td scope="row"
                                class="px-1 py-0 font-medium text-gray-900 whitespace-nowrap dark:text-white" nowrap>
                                {{ \Carbon\Carbon::parse($micro->detalleSolicitudPlanta->solicitudPlanta->tiempo)->isoFormat('DD-MM-YY', 0, 'es') }}

                            </td>

                            <td class="px-1 py-0 ">
                                @if ($micro->detalleSolicitudPlanta->productosPlanta)
                                    {{ $micro->detalleSolicitudPlanta->productosPlanta->nombre }}
                                @else
                                    {{ $micro->detalleSolicitudPlanta->otro }}
                                @endif

                            </td>
                            <td class="px-1 py-0">{{ $micro->detalleSolicitudPlanta->lote }}</td>
                            <td class="px-1 py-0" nowrap>{{ $micro->detalleSolicitudPlanta->tipoMuestra->nombre }}
                            </td>

                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                                <td class="px-1 py-0" nowrap>
                                    {{ $micro->detalleSolicitudPlanta->user->planta->nombre }}
                                </td>
                                <td class="px-1 py-0">
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
                                <td class="px-1 py-0 ">
                                    @if ($micro->col_tot >= 1000000)
                                        MNPC

                                    @elseif ($micro->col_tot < 1000000 && $micro->col_tot >= 10)
                                        <p>
                                            {{ $micro->col_tot < 1
                                                ? $micro->col_tot * 10 ** (strlen(floor($micro->col_tot)) - 1)
                                                : $micro->col_tot / 10 ** (strlen(floor($micro->col_tot)) - 1) }}
                                            x 10<sup>{{ strlen(floor($micro->col_tot)) - 1 }}</sup>
                                        @elseif ($micro->col_tot > 0)
                                            {{ $micro->col_tot }}
                                        </p>
                                    @endif


                                    @if ($micro->col_tot === null)
                                        <p>
                                            --
                                        </p>
                                    @endif
                                    @if ($micro->col_tot === 0)
                                        <p>

                                            < 1 x 10<sup>1</sup>
                                        </p>
                                    @endif

                                    @if ($micro->col_tot2 !== null)
                                        @if ($micro->col_tot2 >= 1000000)
                                            MNPC
                                        @endif
                                        @if ($micro->col_tot2 < 1000000 && $micro->col_tot2 >= 10)
                                            {{ $micro->col_tot2 < 1
                                                ? $micro->col_tot2 * 10 ** (strlen(floor($micro->col_tot2)) - 1)
                                                : $micro->col_tot2 / 10 ** (strlen(floor($micro->col_tot2)) - 1) }}
                                            x 10<sup>{{ strlen(floor($micro->col_tot2)) - 1 }}</sup>
                                        @elseif ($micro->col_tot2 > 0)
                                            {{ $micro->col_tot2 }}
                                        @endif

                                        @if ($micro->col_tot2 === null)
                                            --
                                        @endif
                                        @if ($micro->col_tot === 0)
                                            < 1 x 10<sup>1</sup>
                                        @endif
                                    @endif

                                </td>
                                <td class="px-1 py-0 ">

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
                                </td>
                            @endif
                            <td class="px-1 py-0" nowrap>
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
                            <td class="px-1 py-0 flex" nowrap>
                                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                                    <!--boton para cancelar-->
                                    <button class="p-1 rounded-md "
                                        wire:click="cancelar({{ $micro->detalleSolicitudPlanta->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 h-5 w-5"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                        </svg>
                                    </button>
                                    <!--boton para emitir certificado-->
                                    <button class="p-1 rounded-md "
                                        wire:click="cambiar_estado({{ $micro->detalleSolicitudPlanta->id }})"
                                        {{-- borra la siguiente linea si no funciona en externos --}}
                                        {{-- onclick="window.location.reload();" --}}
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                            viewBox="0 0 512 512">

                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                        </svg>
                                    </button>
                                @endif
                                <!--boton para el PDF-->
                                @if ($micro->detalleSolicitudPlanta->estado == 'Terminado')

                                    @if ($micro->detalleSolicitudPlanta->user->planta->nombre != 'Carsa')


                                    <a class="p-1"
                                        @if (
                                            $micro->detalleSolicitudPlanta->solicitudPlanta->user->id == 49 &&
                                                $micro->detalleSolicitudPlanta->tipoMuestra->id == 8) href="{{ route('certificado.pdf_cer2', $micro->detalleSolicitudPlanta->id) }}"
                                @else
                                href="{{ route('certificado.pdf_cer', $micro->detalleSolicitudPlanta->id) }}" @endif>
                                    <button class="p-1 rounded-md bg-red-600">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-white h-4 w-4"
                                                viewBox="0 0 384 512">
                                                <path
                                                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                            </svg>
                                        </button>
                                    </a>
                                    @endif
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


        </div>
    </div>
    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())

    <div class="p-4">

        <button wire:click="generarTabla" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Generar Tabla
        </button>

        @if (!empty($solicitudes))
        <table class="w-full border-collapse border border-gray-300 mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Subcódigo</th>
                    <th class="border border-gray-300 px-4 py-2">Tipo Análisis</th>
                    <th class="border border-gray-300 px-4 py-2">Usuario</th>
                    <th class="border border-gray-300 px-4 py-2">Tipo Muestra</th>
                    <th class="border border-gray-300 px-4 py-2">Producto / Otro</th> {{-- Nueva columna combinada --}}
                    <th class="border border-gray-300 px-4 py-2">Lote</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha Elaboración</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha Vencimiento</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha Muestreo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud['subcodigo'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud['tipo_analisis'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud['usuario'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud['tipo_muestra'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $solicitud['nombre_producto'] }}
                            @if (!empty($solicitud['otro']))
                                ({{ $solicitud['otro'] }})
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud['lote'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud['fecha_elaboracion'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud['fecha_vencimiento'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $solicitud['fecha_muestreo'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @endif
    </div>
    @endif

</div>
