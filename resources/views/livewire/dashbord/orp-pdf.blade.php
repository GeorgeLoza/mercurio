<div>

    {{-- mEZCLA --}}
    @if ($reporte->producto->categoriaProducto->grupo == 'HTST')
        <table class="w-full text-center ">
            <thead class="dark:bg-slate-700">
                <tr>
                    <th colspan="

                        15

                        " style="font-weight:bold;">
                        MEZCLA
                    </th>
                </tr>
                <tr>
                    <th>Prep.</th>
                    <th>Tanque</th>
                    <th>Fecha</th>

                    <th>Hora S. </th>
                    <th>Hora R. </th>
                    <th>Temp [°C]</th>
                    <th>pH</th>
                    <th>Acidez [%]</th>
                    <th>°Brix</th>

                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>



                    <th>Sol</th>
                    <th>Ana</th>

                </tr>
            </thead>
            <tbody class="text-2xs dark:bg-gray-900 ">
                @php

                    $contador = 1;
                @endphp
                @foreach ($mezclas as $dato)
                    <tr>
                        <th>
                            @foreach ($dato->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $estado)
                                @if ($estado->orp_id == $orpId)
                                    {{ $estado->preparacion }}
                                @endif
                            @endforeach
                        </th>

                        @php
                            $contador = $contador + 1;
                        @endphp
                        <th>{{ $dato->solicitudAnalisisLinea->estadoPlanta->origen->alias }}</th>
                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('DD-MM', 0, 'es') }}
                        </th>


                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                        </th>


                        @if ($dato->solicitudAnalisisLinea->analisisLinea->tiempo)
                            <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->analisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            </th>
                        @else
                            <th>-</th>
                        @endif

                        @if ($dato->solicitudAnalisisLinea)
                            @php
                                $analisis = $dato->solicitudAnalisisLinea->analisisLinea;
                            @endphp
                            @if ($analisis->temperatura)
                                <th>{{ $analisis->temperatura }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->ph)
                                <th>{{ $analisis->ph }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->acidez)
                                <th>{{ $analisis->acidez }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->brix)
                                <th>{{ $analisis->brix }}</th>
                            @else
                                <th>-</th>
                            @endif


                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>





                            @if ($dato->solicitudAnalisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($dato->solicitudAnalisisLinea->analisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->analisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif
                        @endif



                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif
    @if ($reporte->producto->categoriaProducto->grupo == 'UHT')

        <table class="w-full text-center ">

            <thead class="dark:bg-slate-700">
                <tr>
                    <th colspan="14" style="font-weight:bold;">
                        Control de Calidad en Proceso - Línea Ultra Pasteurizado UHT
                    </th>
                </tr>
                <tr>
                    <th>Datos de Proceso </th>
                    <th>Tanque</th>
                    {{-- <th>Juliano</th> --}}
                    <th>Hora S. </th>
                    <th>Hora R. </th>
                    <th>Temp [°C]</th>
                    <th>pH</th>
                    <th>Acidez [%]</th>
                    <th>°Brix</th>
                    <th>µ [s]</th>
                    <th>Color</th>
                    <th>Olor</th>
                    <th>Sabor</th>
                    {{-- <th>Volumen</th> --}}
                    <th>Prep.</th>
                    <th>Sol - Ana</th>

                </tr>
            </thead>
            <tbody class="text-2xs dark:bg-gray-900 ">
                @php

                    $contador = 1;
                @endphp
                @foreach ($mezclasuht as $dato)
                    <tr>
                        <th>Pre/Rec {{ $contador }}</th>
                        @php
                            $contador = $contador + 1;
                        @endphp
                        <th>{{ $dato->solicitudAnalisisLinea->estadoPlanta->origen->alias }}</th>
                        @php
                            $fecha = new DateTime($dato->solicitudAnalisisLinea->tiempo);
                            $diaDelAno = $fecha->format('z') + 1;
                        @endphp
                        {{-- <th>{{ $diaDelAno }}</th> --}}

                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                        </th>


                        @if ($dato->solicitudAnalisisLinea->analisisLinea->tiempo)
                            <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->analisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            </th>
                        @else
                            <th>-</th>
                        @endif

                        @if ($dato->solicitudAnalisisLinea)
                            @php
                                $analisis = $dato->solicitudAnalisisLinea->analisisLinea;
                            @endphp
                            @if ($analisis->temperatura)
                                <th>{{ $analisis->temperatura }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->ph)
                                <th>{{ $analisis->ph }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->acidez)
                                @if ($analisis->acidez == 0)
                                    <th>-</th>
                                @else
                                    <th>{{ $analisis->acidez }}</th>
                                @endif
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->brix)
                                <th>{{ $analisis->brix }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->viscosidad)
                                <th>{{ $analisis->viscosidad }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->color)
                                @if ($analisis->color == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif
                            @if ($analisis->olor)
                                @if ($analisis->olor == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif
                            @if ($analisis->sabor)
                                @if ($analisis->sabor == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif
                            {{-- volumen --}}
                            {{-- <th>-</th> --}}
                            <th>
                                @foreach ($dato->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $estado)
                                    @if ($estado->orp_id == $orpId)
                                        {{ $estado->preparacion }}
                                    @endif
                                @endforeach
                            </th>
                            <th>
                                @if ($dato->solicitudAnalisisLinea->user != null)
                                    {{ $dato->solicitudAnalisisLinea->user->codigo }}
                                @else
                                    -
                                @endif

                                @if ($dato->solicitudAnalisisLinea->analisisLinea->user != null)
                                    - {{ $dato->solicitudAnalisisLinea->analisisLinea->user->codigo }}
                                @else
                                    -
                                @endif
                            </th>
                        @endif



                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif





    {{-- saborizacion --}}
    @if ($reporte->producto->categoriaProducto->tipo == 'jugos' || $reporte->producto->categoriaProducto->tipo == 'lacteas')
        <table class="w-full text-center ">
            <thead class="dark:bg-slate-700">
                <tr>
                    <th colspan="13" style="font-weight:bold;">
                        Saborizacion
                    </th>
                </tr>
                <tr>
                    <th>Prep.</th>
                    <th>Tanque</th>
                    <th>Fecha</th>

                    <th>Hora S. </th>
                    <th>Hora R. </th>
                    <th>Temp [°C]</th>
                    <th>pH</th>

                    <th>°Brix</th>

                    <th>Acidez [%]</th>


                    <th>Color</th>
                    <th>Olor</th>
                    <th>Sabor</th>



                    <th>Sol</th>
                    <th>Ana</th>

                </tr>
            </thead>
            <tbody class="text-2xs dark:bg-gray-900 ">
                @php

                    $contador = 1;
                @endphp
                @foreach ($saborizaciones as $dato)
                    <tr>
                        <th>
                            @foreach ($dato->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $estado)
                                @if ($estado->orp_id == $orpId)
                                    {{ $estado->preparacion }}
                                @endif
                            @endforeach
                        </th>

                        @php
                            $contador = $contador + 1;
                        @endphp
                        <th>{{ $dato->solicitudAnalisisLinea->estadoPlanta->origen->alias }}</th>

                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('DD-MM', 0, 'es') }}
                        </th>

                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                        </th>


                        @if ($dato->solicitudAnalisisLinea->analisisLinea->tiempo)
                            <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->analisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            </th>
                        @else
                            <th>-</th>
                        @endif

                        @if ($dato->solicitudAnalisisLinea)
                            @php
                                $analisis = $dato->solicitudAnalisisLinea->analisisLinea;
                            @endphp
                            @if ($analisis->temperatura)
                                <th>{{ $analisis->temperatura }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->ph)
                                <th>{{ $analisis->ph }}</th>
                            @else
                                <th>-</th>
                            @endif



                            @if ($analisis->brix)
                                <th>{{ $analisis->brix }}</th>
                            @else
                                <th>-</th>
                            @endif


                            @if ($analisis->acidez)
                                <th>{{ $analisis->acidez }}</th>
                            @else
                                <th>-</th>
                            @endif



                            @if ($analisis->color)
                                @if ($analisis->color == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif
                            @if ($analisis->olor)
                                @if ($analisis->olor == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif
                            @if ($analisis->sabor)
                                @if ($analisis->sabor == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif







                            @if ($dato->solicitudAnalisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($dato->solicitudAnalisisLinea->analisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->analisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif
                        @endif



                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif
    {{-- inoculacion --}}
    @if ($reporte->producto->categoriaProducto->tipo == 'yogurts')
        <table class="w-full text-center ">
            <thead class="dark:bg-slate-700">
                <tr>
                    <th colspan="
                        15 " style="font-weight:bold;">
                        INOCULACION
                    </th>
                </tr>
                <tr>
                    <th>Prep.</th>
                    <th>Tanque</th>
                    <th>Fecha</th>

                    <th>Hora S. </th>
                    <th>Hora R. </th>
                    <th>Temp [°C]</th>
                    <th>pH</th>
                    <th>Acidez [%]</th>
                    <th>°Brix</th>

                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>





                    <th>Sol</th>
                    <th>Ana</th>

                </tr>
            </thead>
            <tbody class="text-2xs dark:bg-gray-900 ">
                @php

                    $contador = 1;
                @endphp
                @foreach ($inoculaciones as $dato)
                    <tr>
                        <th>
                            @foreach ($dato->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $estado)
                                @if ($estado->orp_id == $orpId)
                                    {{ $estado->preparacion }}
                                @endif
                            @endforeach
                        </th>

                        @php
                            $contador = $contador + 1;
                        @endphp
                        <th>{{ $dato->solicitudAnalisisLinea->estadoPlanta->origen->alias }}</th>

                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('DD-MM', 0, 'es') }}
                        </th>

                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                        </th>


                        @if ($dato->solicitudAnalisisLinea->analisisLinea->tiempo)
                            <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->analisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            </th>
                        @else
                            <th>-</th>
                        @endif

                        @if ($dato->solicitudAnalisisLinea)
                            @php
                                $analisis = $dato->solicitudAnalisisLinea->analisisLinea;
                            @endphp
                            @if ($analisis->temperatura)
                                <th>{{ $analisis->temperatura }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->ph)
                                <th>{{ $analisis->ph }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->acidez)
                                <th>{{ $analisis->acidez }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->brix)
                                <th>{{ $analisis->brix }}</th>
                            @else
                                <th>-</th>
                            @endif
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>






                            @if ($dato->solicitudAnalisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($dato->solicitudAnalisisLinea->analisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->analisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif
                        @endif



                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif

    {{-- antes de corte  --}}
    @if ($reporte->producto->categoriaProducto->tipo == 'yogurts')
        <table class="w-full text-center ">
            <thead class="dark:bg-slate-700">
                <tr>
                    <th colspan="
                        15 " style="font-weight:bold;">
                        ANTES DE CORTE
                    </th>
                </tr>
                <tr>
                    <th>Prep.</th>
                    <th>Tanque</th>
                    <th>Fecha</th>

                    <th>Hora S. </th>
                    <th>Hora R. </th>
                    <th>Temp [°C]</th>
                    <th>pH</th>
                    <th>Acidez [%]</th>
                    <th>°Brix</th>

                    <th>µ [s]</th>

                    <th></th>
                    <th></th>
                    <th></th>

                    <th>Sol</th>
                    <th>Ana</th>

                </tr>
            </thead>
            <tbody class="text-2xs dark:bg-gray-900 ">
                @php

                    $contador = 1;
                @endphp
                @foreach ($Acortes as $dato)
                    <tr>
                        <th>
                            @foreach ($dato->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $estado)
                                @if ($estado->orp_id == $orpId)
                                    {{ $estado->preparacion }}
                                @endif
                            @endforeach
                        </th>

                        @php
                            $contador = $contador + 1;
                        @endphp
                        <th>{{ $dato->solicitudAnalisisLinea->estadoPlanta->origen->alias }}</th>

                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('DD-MM', 0, 'es') }}
                        </th>

                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                        </th>


                        @if ($dato->solicitudAnalisisLinea->analisisLinea->tiempo)
                            <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->analisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            </th>
                        @else
                            <th>-</th>
                        @endif

                        @if ($dato->solicitudAnalisisLinea)
                            @php
                                $analisis = $dato->solicitudAnalisisLinea->analisisLinea;
                            @endphp
                            @if ($analisis->temperatura)
                                <th>{{ $analisis->temperatura }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->ph)
                                <th>{{ $analisis->ph }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->acidez)
                                <th>{{ $analisis->acidez }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->brix)
                                <th>{{ $analisis->brix }}</th>
                            @else
                                <th>-</th>
                            @endif


                            @if ($analisis->viscosidad)
                                <th>{{ $analisis->viscosidad }}</th>
                            @else
                                <th>-</th>
                            @endif

                            <th></th>
                            <th></th>
                            <th></th>








                            @if ($dato->solicitudAnalisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($dato->solicitudAnalisisLinea->analisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->analisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif
                        @endif



                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif
    {{-- despues de corte --}}
    @if ($reporte->producto->categoriaProducto->tipo == 'yogurts')
        <table class="w-full text-center ">
            <thead class="dark:bg-slate-700">
                <tr>
                    <th colspan="

                        15
                        " style="font-weight:bold;">
                        DESPUES DE CORTE
                    </th>
                </tr>
                <tr>
                    <th>Prep.</th>
                    <th>Tanque</th>
                    <th>Fecha</th>

                    <th>Hora S. </th>
                    <th>Hora R. </th>
                    <th>Temp [°C]</th>
                    <th>pH</th>
                    <th>Acidez [%]</th>
                    <th>°Brix</th>



                    <th>µ [s]</th>
                    <th>Color</th>
                    <th>Olor</th>
                    <th>Sabor</th>


                    <th>Sol</th>
                    <th>Ana</th>

                </tr>
            </thead>
            <tbody class="text-2xs dark:bg-gray-900 ">
                @php

                    $contador = 1;
                @endphp
                @foreach ($Dcortes as $dato)
                    <tr>
                        <th>
                            @foreach ($dato->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $estado)
                                @if ($estado->orp_id == $orpId)
                                    {{ $estado->preparacion }}
                                @endif
                            @endforeach
                        </th>

                        @php
                            $contador = $contador + 1;
                        @endphp
                        <th>{{ $dato->solicitudAnalisisLinea->estadoPlanta->origen->alias }}</th>
                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('DD-MM', 0, 'es') }}
                        </th>


                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                        </th>


                        @if ($dato->solicitudAnalisisLinea->analisisLinea->tiempo)
                            <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->analisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            </th>
                        @else
                            <th>-</th>
                        @endif

                        @if ($dato->solicitudAnalisisLinea)
                            @php
                                $analisis = $dato->solicitudAnalisisLinea->analisisLinea;
                            @endphp
                            @if ($analisis->temperatura)
                                <th>{{ $analisis->temperatura }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->ph)
                                <th>{{ $analisis->ph }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->acidez)
                                <th>{{ $analisis->acidez }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->brix)
                                <th>{{ $analisis->brix }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($analisis->viscosidad)
                                <th>{{ $analisis->viscosidad }}</th>
                            @else
                                <th>-</th>
                            @endif



                            @if ($analisis->color)
                                @if ($analisis->color == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif
                            @if ($analisis->olor)
                                @if ($analisis->olor == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif
                            @if ($analisis->sabor)
                                @if ($analisis->sabor == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif








                            @if ($dato->solicitudAnalisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($dato->solicitudAnalisisLinea->analisisLinea->user != null)
                                <th>
                                    {{ $dato->solicitudAnalisisLinea->analisisLinea->user->codigo }}
                                </th>
                            @else
                                <th>-</th>
                            @endif
                        @endif



                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif


    {{-- Envasado --}}
    @if (str_contains($reporte->producto->nombre, 'PREMEZCLA'))
    @else
        <table class="w-full text-center ">

            <thead class="dark:bg-slate-700">
                <tr>
                    <th colspan="15" style="font-weight:bold;">
                        ENVASADO
                    </th>
                </tr>
                <tr>
                    <th>Cabezal </th>
                    <th>Peso [g]</th>
                    <th>Lote</th>
                    <th>Hora S.</th>
                    <th>Hora R.</th>

                    <th>Temp [°C]</th>
                    <th>pH</th>
                    <th>Acidez [%]</th>
                    <th>°Brix</th>
                    <th>µ [s]</th>
                    <th>Color</th>
                    <th>Olor</th>
                    <th>Sabor</th>
                    <th>Sol</th>
                    <th>Ana</th>

                </tr>

            </thead>
            <tbody class="text-2xs dark:bg-gray-900 ">

                @foreach ($envasados as $dato)
                    <tr>

                        @php
                            $contador = $contador + 1;
                        @endphp


                        @if ($dato->solicitudAnalisisLinea->estadoPlanta->origen->alias == 'EMBOTELLADORA')
                            <th>EMB</th>
                        @else
                            <th>{{ $dato->solicitudAnalisisLinea->estadoPlanta->origen->alias }}</th>
                        @endif

                        @if ($dato->solicitudAnalisisLinea)
                            @php
                                $analisis = $dato->solicitudAnalisisLinea->analisisLinea;
                            @endphp
                        @endif
                        {{-- peso --}}
                        @if ($analisis->peso)
                            <th>{{ $analisis->peso / 1 }}</th>
                        @else
                            <th>-</th>
                        @endif
                        @php

                            $fecha = new DateTime($dato->solicitudAnalisisLinea->tiempo);
                            $diaDelAno = $fecha->format('z') + 1;
                        @endphp
                        <th>{{ $diaDelAno }}</th>

                        <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                        </th>

                        @if ($dato->solicitudAnalisisLinea->analisisLinea->tiempo)
                            <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->analisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            </th>
                        @else
                            <th>-</th>
                        @endif




                        @if ($dato->solicitudAnalisisLinea)
                            @php
                                $analisis = $dato->solicitudAnalisisLinea->analisisLinea;
                            @endphp
                            @if ($analisis->temperatura)
                                <th>{{ $analisis->temperatura }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->ph)
                                <th>{{ $analisis->ph }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->acidez)
                                <th>{{ $analisis->acidez }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->brix)
                                <th>{{ $analisis->brix }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->viscosidad)
                                <th>{{ $analisis->viscosidad }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($analisis->color)
                                @if ($analisis->color == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif
                            @if ($analisis->olor)
                                @if ($analisis->olor == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif
                            @if ($analisis->sabor)
                                @if ($analisis->sabor == true)
                                    <th>C.</th>
                                @else
                                    <th>N.C.</th>
                                @endif
                            @endif





                            @if ($dato->solicitudAnalisisLinea->user != null)
                                <th>{{ $dato->solicitudAnalisisLinea->user->codigo }}</th>
                            @endif




                            @if ($dato->solicitudAnalisisLinea->analisisLinea->user != null)
                                <th> {{ $dato->solicitudAnalisisLinea->analisisLinea->user->codigo }}</th>
                            @endif
                        @endif



                    </tr>
                @endforeach

            </tbody>

        </table>
    @endif










    <table class="table-container">
        <tbody class="text-2xs dark:bg-gray-900 ">
            @php

                $buscador = 0;
            @endphp
            <tr>
                <th colspan="14" style="font-weight:bold;">Observaciones</th>
            </tr>

            <tr>
                <th colspan="14">
                    @foreach ($obs as $dato)
                        @if ($dato->solicitudAnalisisLinea->analisisLinea->observaciones != null)
                            @php

                                $buscador = 1;
                            @endphp
                        @endif
                    @endforeach

                    @if ($buscador == 1)

                        @foreach ($obs as $dato)
                            @if ($dato->solicitudAnalisisLinea->analisisLinea->observaciones == null)
                            @else
            <tr>

                <th colspan="14">
                    {{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->analisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                    {{ $dato->solicitudAnalisisLinea->analisisLinea->user->nombre }}:
                    {{ $dato->solicitudAnalisisLinea->analisisLinea->observaciones }}</th>

            </tr>
            @endif
            @endforeach
            @endif
            @if ($buscador == 0)
                Sin Observaciones
            @endif




            </th>
            </tr>

        </tbody>

    </table>

    <br>
    <div class="justify-end" style=" page-break-inside: avoid;">
        <p align="right">C.&nbsp;&nbsp;&nbsp;: Conforme &nbsp;&nbsp;&nbsp; &nbsp; </p>
        <p align="right">N.C.: No Conforme</p>
    </div>






    <div>
        <div class="w-1/2">



            <!-- Aplica la clase "mi-tabla" solo a la tabla que deseas estilizar -->
            <table class="w-1/2">
                <thead class="dark:bg-slate-700">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody class="text-2xs dark:bg-gray-900 ">
                    @foreach ($usuariosInvolucrados as $usuariosUnicoss)
                        <tr>
                            <td>{{ $usuariosUnicoss->codigo }}</td>
                            <td class="capitalize">
                                {{ ucwords(strtolower($usuariosUnicoss->nombre . ' ' . $usuariosUnicoss->apellido)) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>






        </div>


    </div>

</div>
