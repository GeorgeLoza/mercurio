<div wire:poll.10s>
    @if ( auth()->user()->role->rolModuloPermisos->where('modulo_id', 15)->where('permiso_id', 2)->isNotEmpty())


    <div class="flex mb-2 gap-2">
        <a href="{{ route('analisisLinea.index') }}" class="px-2 bg-green-600 text-white rounded-md">
            Analisis en Linea
        </a>
        @if ($pendiente)
            <p class="bg-red-500 text-white p-1 rounded-md"> Tienes análisis de recepción de leche pendiente</p>
        @endif
    </div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">

        <table class="w-full text-2xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-2xs text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tiempo')" nowrap>
                        Fecha
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tiempo')" nowrap>
                        Hora
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('subruta')" nowrap>
                        Subruta
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('estado')" nowrap>
                        Estado
                    </th>
                    <th scope="col" class=" flex gap-1 px-1 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        opciones
                        <button wire:click="show_filtro">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-700 dark:fill-gray-300"
                                viewBox="0 0 512 512">
                                <path
                                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                            </svg>
                        </button>

                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('temperatura')" nowrap>
                        Temp. [°C]
                    </th>
                <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700 "
                        wire:click="sortBy('ph')" nowrap>
                        pH
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('acidez')" nowrap>
                        Acidez [%]
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('brix')" nowrap>
                        Brix [°Brix]
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('densidad')" nowrap>
                        Dens. [g/ml]
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('prueba_alcohol')" nowrap>
                        P. Alcohol
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('contenido_graso')" nowrap>
                        Cont. Graso [%]
                    </th>

                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('temperatura_congelacion')" nowrap>
                        Tk [°C]
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('porcentaje_agua')" nowrap>
                        % Agua [%]
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Observaciones
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        RAM [UFC/ml]
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700">
                        Antibioticos [+/-]
                    </th>
                    {{-- <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tram_inicio')" nowrap>
                        TRAM início
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tram_fin')" nowrap>
                        TRAM fin
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tram_lapso')" nowrap>
                        TRAM lapso
                    </th> --}}
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('user')">
                        Solicitante
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('user')">
                        Analista FQ
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('user')">
                        Siembra MB
                    </th>
                    <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('user')">
                        Lectura MB
                    </th>
                    {{-- <th scope="col" class="px-1 py-2 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('user')">
                        usuario TRAM
                    </th> --}}
                </tr>
            </thead>
            <tbody class="text-center">
                @if ($filtro == true)
                    <!-- fila de filtros -->
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th class="p-1 ">
                            <input type="text" wire:model.live='f_tiempo' placeholder="Filtrar por Tiempo"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th></th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_subruta' placeholder="Filtrar por Subruta"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_estado' placeholder="Filtrar por Estado"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">

                        </th>
                        <th class="p-1">
                            <!--temperatura-->
                        </th>
                        <th class="p-1">
                            <!--ph-->
                        </th>
                        <th class="p-1">
                            <!--acidez-->
                        </th>
                        <th class="p-1">
                            <!--brix-->
                        </th>
                        <th class="p-1">
                            <!--densidad-->
                        </th>
                        <th class="p-1">
                            <!--prueba alcohol-->
                        </th>
                        <th class="p-1">
                            <!--contenido grado-->
                        </th>
                        {{-- <th class="p-1">
                            <!--tram inicio-->
                        </th>
                        <th class="p-1">
                            <!--tram fin-->
                        </th>
                        <th class="p-1">
                            <!--tram lapso-->
                        </th> --}}
                        <th class="p-1">
                            <!--temperatura congelacion-->
                        </th>
                        <th class="p-1">
                            <!--porcentaj de agua-->
                        </th>
                        <th class="p-1">
                            <!--Observaciones-->
                        </th>
                        <th class="p-1">
                            {{-- <input type="text" wire:model.live='f_user' placeholder="Filtrar por Cantidad"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-2xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
                        </th>
                    </tr>
                @endif
                @foreach ($registros as $registro)
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-1 py-1 text-gray-900 whitespace-nowrap dark:text-white">

                            {{ \Carbon\Carbon::parse($registro->recepcion_leche->tiempo)->isoFormat('DD-MM-YY', 0, 'es') }}




                        </th>
                        <th scope="row"
                            class="px-1 py-1 text-gray-900 whitespace-nowrap dark:text-white">

                            {{ \Carbon\Carbon::parse($registro->recepcion_leche->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            -

                            @if ($registro->tiempo)
                                {{ \Carbon\Carbon::parse($registro->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            @endif

                        </th>
                        <td class="px-1 py-1" nowrap>
                            {{ $registro->recepcion_leche->subruta_acopio->nombre }}
                        </td>
                        <td class="px-1 py-1" nowrap>
                            @if ($registro->recepcion_leche->estado == 'Pendiente')
                                <span class="flex items-center text-2xs me-3"><span
                                        class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $registro->recepcion_leche->estado }}</span>
                            @endif
                            @if ($registro->recepcion_leche->estado == 'En proceso')
                                <span class="flex items-center text-2xs me-3"><span
                                        class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0"></span>{{ $registro->recepcion_leche->estado }}</span>
                            @endif
                            @if ($registro->recepcion_leche->estado == 'Completado')
                                <span class="flex items-center text-2xs me-3"><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $registro->recepcion_leche->estado }}</span>
                            @endif
                            @if ($registro->recepcion_leche->estado == 'Rechazado')
                                <span class="flex items-center text-2xs me-3"><span
                                        class="flex w-2.5 h-2.5 bg-red-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $registro->recepcion_leche->estado }}</span>
                            @endif
                            @if ($registro->recepcion_leche->estado == 'Cancelado')
                                <span class="flex items-center text-2xs me-3"><span
                                        class="flex w-2.5 h-2.5 bg-red-600 rounded-full me-1.5 flex-shrink-0"></span>{{ $registro->recepcion_leche->estado }}</span>
                            @endif
                        </td>
                        <td class="flex items-center px-1 py-1 gap-2">
                            @if ((now()->diffInMinutes($registro->created_at) < 4200 && auth()->user()->role->rolModuloPermisos->where('modulo_id', 20)->where('permiso_id', 3)->isNotEmpty()) || auth()->user()->role->id == 1)
                                <svg onclick="Livewire.dispatch('openModal', { component: 'leche-cruda.analisis.editar', arguments: { id: {{ $registro->id }} , id2: 1 } })"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-3 w-3 fill-blue-600 dark:fill-blue-500" viewBox="0 0 512 512">
                                    <path
                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 20)->where('permiso_id', 4)->isNotEmpty())

                                    <svg onclick="Livewire.dispatch('openModal', { component: 'leche-cruda.analisis.eliminar', arguments: { id: {{ $registro->id }}} })"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3 w-3 fill-red-600 dark:fill-red-500" viewBox="0 0 448 512">
                                        <path
                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                    </svg>

                            @endif
                            @if (($registro->tiempo_sembrado == null && now()->diffInMinutes($registro->created_at) < 2800 && auth()->user()->role->rolModuloPermisos->where('modulo_id', 20)->where('permiso_id', 1)->isNotEmpty()) || auth()->user()->role->id == 1)

                            <button class=" bg-blue-400 rounded p-1 py-0 text-gray-700 "
                            wire:click="sembrar({{ $registro->id }})">

                                Sembrar
                            </button>



                            @endif
                            {{-- @if ($registro->tiempo_sembrado != null && (auth()->user()->role->rolModuloPermisos->where('modulo_id', 20)->where('permiso_id', 3)->isNotEmpty()|| auth()->user()->role->rolModuloPermisos->where('modulo_id', 20)->where('permiso_id', 1)->isNotEmpty() ))

                            <button class=" bg-blue-400 rounded p-1 py-0 text-gray-700 "
                            onclick="Livewire.dispatch('openModal', { component: 'leche-cruda.analisis.editar', arguments: { id: {{ $registro->id }} , id2: 2 } })">

                                TRAM
                            </button>


                            @endif --}}

                            @if ($registro->tiempo_sembrado != null && auth()->user()->role->rolModuloPermisos->where('modulo_id', 20)->where('permiso_id', 1)->isNotEmpty() )
                            @if (now()->diffInMinutes($registro->tiempo_sembrado)<4500)
                            <button class=" bg-blue-400 rounded p-1 py-0 text-gray-700 "
                            onclick="Livewire.dispatch('openModal', { component: 'leche-cruda.analisis.editar', arguments: { id: {{ $registro->id }} , id2: 3 } })">
                                Lectura

                            </button>
                            @endif



                            @endif

                        </td>
                        <td class="px-1 py-1 @if ($parametro && $registro->temperatura !== null) {{ $registro->temperatura <= $parametro->temperatura_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $registro->temperatura }}
                        </td>
                        <td class="px-1 py-1 @if ($parametro && $registro->ph !== null) {{ $registro->ph >= $parametro->ph_min && $registro->ph <= $parametro->ph_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $registro->ph }}
                        </td>
                        <td class="px-1 py-1 @if ($parametro && $registro->acidez !== null) {{ $registro->acidez >= $parametro->acidez_min && $registro->acidez <= $parametro->acidez_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $registro->acidez }}
                        </td>
                        <td class="px-1 py-1 @if ($parametro && $registro->brix !== null) {{ $registro->brix >= $parametro->brix_min ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $registro->brix }}
                        </td>
                        <td class="px-1 py-1  @if ($parametro && $registro->densidad !== null) {{ $registro->densidad >= $parametro->densidad_min && $registro->densidad <= $parametro->densidad_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $registro->densidad }}
                        </td>
                        <td class="px-1 py-1" nowrap>



                            @if ($registro->prueba_alcohol === null)
                                @else


                                    @if ($registro->prueba_alcohol>0 )

                                    +
                                    @elseif ($registro->prueba_alcohol === 0)

                                    -
                                    @endif

                            @endif

                        </td>
                        <td class="px-1 py-1 @if ($parametro && $registro->contenido_graso !== null) {{ $registro->contenido_graso >= $parametro->contenido_graso_min ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $registro->contenido_graso }}
                        </td>


                        <td class="px-1 py-1 @if ($parametro && $registro->temperatura_congelacion !== null) {{ $registro->temperatura_congelacion >= $parametro->temperatura_congelada && $registro->temperatura_congelacion_min <= $parametro->temperatura_congelada_max ? 'text-green-500' : 'text-red-500' }} @endif"
                            nowrap>
                            {{ $registro->temperatura_congelacion }}
                        </td>
                        <td class="px-1 py-1 {{ $registro->porcentaje_agua < 2.5 ? 'text-green-500' : 'text-red-500' }}" nowrap>

                            {{ $registro->porcentaje_agua }}
                        </td>
                        <td class="px-1 py-1" nowrap>
                            {{ $registro->observaciones }}
                        </td>
                        <td class="px-1 py-1 {{ $registro->recuento <= 4000000 ? 'text-green-500' : 'text-red-500' }}" nowrap>





                            @if ($registro->recuento )
                            @if ($registro->recuento >= 5000000)
                            MNPC
                        @elseif ($registro->recuento < 5000000 && $registro->recuento >= 1)
                            {{ $registro->recuento < 1
                                ? $registro->recuento * 10 ** (strlen(floor($registro->recuento)) - 1)
                                : $registro->recuento / 10 ** (strlen(floor($registro->recuento)) - 1) }}
                            x 10<sup>{{ strlen(floor($registro->recuento)) - 1 }}</sup>
                        @elseif ($registro->recuento === 0)
                            < 1 x 10<sup>1</sup>
                            @elseif (is_null($registro->recuento))
                                --
                        @endif


                            @endif

                        </td>
                        <td class="px-1 py-1 text-center" nowrap>


                            @if ($registro->antibioticos === null)
                                @else


                                    @if ($registro->antibioticos>0 )

                                    +
                                    @elseif ($registro->antibioticos === 0)

                                            -
                                    @endif

                            @endif



                        </td>

                        {{-- <td class="px-1 py-1 text-center" nowrap>
                            @if ($registro->tram_inicio )
                            {{ \Carbon\Carbon::parse($registro->tram_inicio)->isoFormat('HH:mm  ') }}
                            @endif

                        </td>
                        <td class="px-1 py-1 text-center" nowrap>
                            @if ($registro->tram_fin )

                            {{ \Carbon\Carbon::parse($registro->tram_fin)->isoFormat('HH:mm  ') }}
                            @endif

                        </td>
                        <td class="px-1 py-1 text-center @if ($registro->tram_lapso && \Carbon\Carbon::parse('1970-01-01 ' . $registro->tram_lapso)->diffInMinutes(\Carbon\Carbon::parse('1970-01-01 00:00')) < 60) text-red-500 @else text-green-500 @endif" nowrap>
                            @if ($registro->tram_lapso)
                                {{ \Carbon\Carbon::parse('1970-01-01 ' . $registro->tram_lapso)->isoFormat('HH:mm') }}
                            @endif
                        </td> --}}




                        <td class="px-1 py-1" nowrap>
                            @if ($registro->recepcion_leche->user)
                            {{ substr($registro->recepcion_leche->user->nombre, 0, 1) .
                                substr(explode(' ', $registro->recepcion_leche->user->nombre)[1] ?? '', 0, 1) .
                                substr($registro->recepcion_leche->user->apellido, 0, 1) .
                                substr(explode(' ', $registro->recepcion_leche->user->apellido)[1] ?? '', 0, 1) }}


                            @endif
                        </td>
                        {{-- analista fq --}}
                        <td class="px-1 py-1" nowrap>
                            @if ($registro->user)
                            {{ substr($registro->user->nombre, 0, 1) .
                                substr(explode(' ', $registro->user->nombre)[1] ?? '', 0, 1) .
                                substr($registro->user->apellido, 0, 1) .
                                substr(explode(' ', $registro->user->apellido)[1] ?? '', 0, 1) }}

                            @endif
                        </td>
                        {{-- siembra mb --}}
                        <td class="px-1 py-1" nowrap>

                            @if ($registro->usiembra)
                            {{ substr($registro->usiembra->nombre, 0, 1) .
                                substr(explode(' ', $registro->usiembra->nombre)[1] ?? '', 0, 1) .
                                substr($registro->usiembra->apellido, 0, 1) .
                                substr(explode(' ', $registro->usiembra->apellido)[1] ?? '', 0, 1) }}

                            @endif
                        </td>
                        <td class="px-1 py-1" nowrap>
                            @if ($registro->ulectura)
                            {{ substr($registro->ulectura->nombre, 0, 1) .
                                substr(explode(' ', $registro->ulectura->nombre)[1] ?? '', 0, 1) .
                                substr($registro->ulectura->apellido, 0, 1) .
                                substr(explode(' ', $registro->ulectura->apellido)[1] ?? '', 0, 1) }}

                            @endif
                        </td>
                        {{-- <td class="px-1 py-1" nowrap>
                            @if ($registro->utram)
                            {{ substr($registro->utram->nombre, 0, 1) .
                                substr(explode(' ', $registro->utram->nombre)[1] ?? '', 0, 1) .
                                substr($registro->utram->apellido, 0, 1) .
                                substr(explode(' ', $registro->utram->apellido)[1] ?? '', 0, 1) }}

                            @endif
                        </td> --}}


                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>

        <div>
            {{ $registros->links() }}
        </div>





    <div class="p-2">
        <p class="mb-1">Descargar Reporte</p>



        <button class="bg-green-500 p-2 text-center rounded-md" wire:click="exportarExcel">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-5 w-5 fill-white">
                <path
                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z" />
            </svg>
        </button>
        <button class="bg-red-600 p-2 text-center rounded-md  gap-2" wire:click="generatePDF6"
            wire:loading.attr="disabled" >
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

        <!-- Campo de filtro por ruta -->
        <label for="ruta">Ruta:</label>
        <select id="ruta" class="rounded p-1 mx-2 bg-white text-black" wire:model.defer="ruta">
            <option value="">Seleccionar Ruta</option>
            @foreach ($rutas as $ruta)
                <option value="{{ $ruta }}">{{ $ruta }}</option>
            @endforeach
        </select>
    </div>


</div>
