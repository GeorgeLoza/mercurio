<div>

    <div class="overflow-x-auto overflow-y-auto">
        <table class="w-full  text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-1 sticky left-0 z-10 bg-gray-50 dark:bg-gray-700 ">
                        #
                    </th>
                    <th scope="col" class="px-2 py-1 sticky left-8 z-10 bg-gray-50 dark:bg-gray-700">
                        Código Muestra
                    </th>
                    <th scope="col" class="px-2 py-1 sticky left-28 z-10 bg-gray-50 dark:bg-gray-700">
                        Producto / Servicio
                    </th>
                    <th scope="col" class="px-2 py-1">
                        Planta
                    </th>

                    <th scope="col" class="px-2 py-1">
                        Fecha Análisis
                    </th>
                    <th scope="col" class="px-2 py-1">
                        pH
                    </th>
                    <th scope="col" class="px-2 py-1">
                        %Dureza Total
                    </th>
                    <th scope="col" class="px-2 py-1">
                        Cloruros
                    </th>
                    <th scope="col" class="px-2 py-1">
                        Conductividad
                    </th>
                    <th scope="col" class="px-2 py-1">
                        Estado
                    </th>
                    <th scope="col" class="px-2 py-1">
                        Analista
                    </th>
                    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 31)->where('permiso_id', 3)->isNotEmpty())

                    <th scope="col" class="px-2 py-1">
                        Opciones
                    </th>
                    @endif
                </tr>

            </thead>
            <tbody>
                @foreach ($aguaFisico as $index => $actividad)
                    <tr
                        class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row"
                            class="lg:sticky left-0 z-10 bg-white dark:bg-gray-800 px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-3 py-2 lg:sticky left-8 z-10 bg-white dark:bg-gray-800" nowrap>
                            {{ $actividad->detalleSolicitudPlanta->subcodigo }}
                        </td>
                        <td class="px-3 py-2 lg:sticky left-28 z-10 bg-white dark:bg-gray-800" nowrap>

                            @if ($actividad->detalleSolicitudPlanta->productosPlanta)
                                {{ $actividad->detalleSolicitudPlanta->productosPlanta->nombre }}
                            @else
                                {{ $actividad->detalleSolicitudPlanta->otro }}
                            @endif
                        </td>
                        <td class="px-3 py-2" nowrap>
                            {{ $actividad->detalleSolicitudPlanta->user->planta->nombre }}
                        </td>


                        <td class="px-3 py-2" nowrap>
                            @if ($actividad->tiempo)
                                {{ \Carbon\Carbon::parse($actividad->tiempo)->format('d/M/y') }}
                            @endif
                        </td>
                        <td class="px-3 py-2">
                            {{ $actividad->ph }}
                        </td>
                        <td class="px-3 py-2">
                            {{ $actividad->dureza }}
                        </td>
                        <td class="px-3 py-2">
                            {{ $actividad->cloruros }}
                        </td>
                        <td class="px-3 py-2">
                            {{ $actividad->conductividad }}
                        </td>
                        <td class="px-3 py-2">
                            @if ($actividad->estado == 'Analizado')
                                <span
                                    class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $actividad->estado }}</span>
                            @endif
                            @if ($actividad->estado == 'Pendiente')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $actividad->estado }}</span>
                            @endif
                            @if ($actividad->estado == 'certificado')
                                <span
                                    class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $actividad->estado }}</span>
                            @endif

                        </td>
                        <td class="px-3 py-2 " nowrap>
                            @if ($actividad->user_id)
                                {{ $actividad->user->nombre }}
                            @endif
                        </td>

                        <td class="px-3 py-2 flex justify-center">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 31)->where('permiso_id', 3)->isNotEmpty())

                            <svg onclick="Livewire.dispatch('openModal', { component: 'externo.aguaFisico.edit', arguments: { id: {{ $actividad->id }} } })"
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-20 fill-blue-600 dark:fill-blue-500"
                                viewBox="0 0 512 512">
                                <path
                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg>
                            @endif


                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 31)->where('permiso_id', 4)->isNotEmpty())
                                <button wire:click="eliminar({{ $actividad->id }})"
                                    wire:confirm="Esta seguro de eliminar el elemento?">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-20 fill-red-600 dark:fill-red-500" viewBox="0 0 448 512">
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
        {{ $aguaFisico->links() }}
    </div>

</div>
