<div>


    <div>
        <div class="overflow-x-auto overflow-y-auto">
            <!--Tabla de fisico-->

            <table class="w-full  text-xs text-center text-gray-500 dark:text-gray-400 items-center justify-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-0 py-0">
                            #
                        </th>
                        <th scope="col" class="px-0 py-0">
                            Codigo
                        </th>

                        <th scope="col" class="px-0 py-0">
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
                                Temp.
                            </th>
                            <th scope="col" class="px-1 py-0">
                                %Hr
                            </th>
                            <th scope="col" class="px-1 py-0">
                                Aw
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

                        </th>
                        <th scope="col" class="px-1 py-0    flex justify-center">
                            <input type="text" id="" wire:model.live='f_codigo'
                                class="w-20 bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th></th>
                        <th scope="col" class="px-1 py-0 flex justify-center">
                            <input type="text" id="" wire:model.live='f_producto'
                                class="bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th scope="col" class="px-1 py-0 ">
                            <input type="text" id="" wire:model.live='f_lote'
                                class="w-16 bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                            <th scope="col" class="px-1 py-0">

                            </th>
                            <th scope="col" class="px-1 py-0">

                            </th>
                            <th scope="col" class="px-1 py-0">

                            </th>
                            <th scope="col" class="px-1 py-0">

                            </th>
                        @endif
                        <th scope="col" class="px-1 py-0">

                        </th>
                        <th scope="col" class="px-1 py-0 flex justify-center">
                            <input type="text" id="" wire:model.live='f_estado'
                                class="w-24 bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th scope="col" class="px-1 py-0">

                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($fisicos as $index => $fis)
                        <tr
                            class="b-500 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="  px-1 py-0 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $index + 1 }}
                            </td>
                            <td scope="row"
                                class="px-1 py-0 font-medium text-gray-900 whitespace-nowrap dark:text-white" nowrap>
                                {{ $fis->detalleSolicitudPlanta->subcodigo }}</td>
                            <td scope="row"
                                class="px-1 py-0 font-medium text-gray-900 whitespace-nowrap dark:text-white" nowrap>
                                {{ \Carbon\Carbon::parse($fis->detalleSolicitudPlanta->solicitudPlanta->tiempo)->isoFormat('DD-MM-YY', 0, 'es') }}

                            </td>

                            <td class="px-1 py-0" nowrap>
                                @if ($fis->detalleSolicitudPlanta->productosPlanta)
                                    {{ $fis->detalleSolicitudPlanta->productosPlanta->nombre }}
                                @endif

                            </td>
                            <td class="px-1 py-0">{{ $fis->detalleSolicitudPlanta->lote }}</td>
                            <td class="px-1 py-0" nowrap>{{ $fis->detalleSolicitudPlanta->tipoMuestra->nombre }}
                            </td>
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                                <td class="px-1 py-0" nowrap>
                                    {{ $fis->detalleSolicitudPlanta->user->planta->nombre }}</td>
                                @if ($fis->detalleSolicitudPlanta->tipo_muestra_id == 1)
                                    <td class="px-1 py-0 text-2xs" colspan="3" nowrap>
                                        pH:{{ $fis->ph }},Dure:{{ $fis->dureza }},Clor:{{ $fis->cloruros }},Cond:{{ $fis->conductividad }}
                                    </td>
                                @else
                                    <td class="px-1 py-0" nowrap>{{ $fis->temperatura }}</td>
                                    <td class="px-1 py-0" nowrap>{{ $fis->por_hum_rel }}</td>
                                    <td class="px-1 py-0" nowrap>{{ $fis->act_agua }}</td>
                                @endif
                            @endif
                            <td class="px-1 py-0" nowrap>
                                <div class="flex items-center  justify-center">
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
                            <td class="px-1 py-0 flex" nowrap>
                                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                                    <!--boton para cancelar-->
                                    <button class="p-1 rounded-md "
                                        wire:click="cancelar({{ $fis->detalleSolicitudPlanta->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 h-5 w-5"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                        </svg>
                                    </button>
                                    <!--boton para emitir certificado-->
                                    <button class="p-1 rounded-md "
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
                                    <button class="p-1 rounded-md bg-red-600">
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



        </div>
    </div>

</div>
