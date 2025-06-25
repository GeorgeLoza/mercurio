<div>



    <div>




        @foreach ($solicitudesAgrupadas as $preparacion => $solicitudes)
            <div
                class=" block  p-2 mb-2 bg-white border border-gray-200 rounded-lg shadow rounded-tl-none dark:bg-gray-800 dark:border-gray-700 ">

                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Preparación:
                    {{ $preparacion }}
                </h5>
                @if ($solicitudes->count())
                <div class="overflow-x-auto">
                <table class="w-full border-collapse text-center text-xs">
                    <thead>
                        <tr >
                            <th class="px-2 py-2">Origen</th>
                            <th class="px-2 py-2">Etapa</th>
                            <th class="px-2 py-2">Hora S.</th>
                            <th class="px-2 py-2">Hora R.</th>
                            <th class="px-2 py-2">Temp [°C]</th>
                            <th class="px-2 py-2">pH</th>
                            <th class="px-2 py-2">Acidez [%]</th>
                            <th class="px-2 py-2">°Brix</th>
                            <th class="px-2 py-2">Viscosidad</th>
                            <th class="px-2 py-2">Peso</th>
                            <th class="px-2 py-2">Solicitante</th>
                            <th class="px-2 py-2">Analista</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $solicitud)
                            <tr class="">
                                <td class="px-2 py-2">{{ $solicitud->estadoPlanta->origen->alias }}</td>
                                <td class="px-2 py-2">{{ $solicitud->estadoPlanta->etapa->nombre }}</td>
                                <td class="px-2 py-2">{{ \Carbon\Carbon::parse($solicitud->tiempo)->isoFormat('DD-MM-YY HH:mm') }}</td>
                                <td class="px-2 py-2">
                                    {{ optional($solicitud->analisisLinea)->tiempo ? \Carbon\Carbon::parse($solicitud->analisisLinea->tiempo)->isoFormat('HH:mm') : '-' }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ optional($solicitud->analisisLinea)->temperatura ?? '-' }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ optional($solicitud->analisisLinea)->ph ?? '-' }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ optional($solicitud->analisisLinea)->acidez ?? '-' }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ optional($solicitud->analisisLinea)->brix ?? '-' }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ optional($solicitud->analisisLinea)->viscosidad ?? '-' }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ optional($solicitud->analisisLinea)->peso ?? '-' }}
                                </td>
                                <td class="px-2 py-2">{{ substr($solicitud->user->nombre, 0, 1) .
                                    substr(explode(' ', $solicitud->user->nombre)[1] ?? '', 0, 1) .
                                    substr($solicitud->user->apellido, 0, 1) .
                                    substr(explode(' ', $solicitud->user->apellido)[1] ?? '', 0, 1) }}
                                    </td>
                                    <td class="px-2 py-2">
                                        {{ optional(optional($solicitud->analisisLinea)->user)->nombre ? substr($solicitud->analisisLinea->user->nombre, 0, 1) .
                                    substr(explode(' ', $solicitud->analisisLinea->user->nombre)[1] ?? '', 0, 1) .
                                    substr($solicitud->analisisLinea->user->apellido, 0, 1) .
                                    substr(explode(' ', $solicitud->user->apellido)[1] ?? '', 0, 1) : '-' }}
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

                @else
                    <p>No hay solicitudes para esta preparación.</p>
                @endif

            </div>
        @endforeach
    </div>
</div>
