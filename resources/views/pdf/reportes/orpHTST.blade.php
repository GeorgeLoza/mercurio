<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Control HTST</title>
    <style>
        @page {
            margin-top: 1cm;
            margin-bottom: 0cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }

        body {

            margin-left: 0cm;
            margin-right: 0cm;
            margin-bottom: 1cm;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 9px;
            color: #353535;
        }


        /* Estilo para los bordes de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .head th,
        .head td {
            border: 1px solid black;
        }

        .cuerpo {
            font-size: 0.6rem;
        }

        .cuerpo th,
        .cuerpo td {
            padding: 0.1rem 0.2rem;
            width: 15px;

        }

        .cel-img img {
            width: 100%;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .page {
            width: 100%;
        }

        .cont_div {
            font-size: 0.6rem;
        }
    </style>
    <style>
        header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
        }



        .page-number:before {
            content: "Página " counter(page);
        }


        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.6rem;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }



        /*header*/
        .header-table {
            width: 100%;
            border-collapse: collapse;

        }

        .header-td1 {
            width: 20%;
            text-align: left;
            vertical-align: middle;
            background-color: white;
        }

        .header-td2 {
            width: 60%;
            text-align: center;
            font-size: 0.6rem;
            vertical-align: middle;
            background-color: white;

        }

        .header-td3 {
            width: 20%;
            text-align: right;
            font-size: 0.6rem;
            vertical-align: middle;
            background-color: white;
        }

        /*cuerpo tabla*/
        .contenido table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }


        .contenido th {
            color: #fff;
            background-color: #5e5d5d;
        }

        .contenido tr:nth-child(odd) td {
            background-color: #eee;
        }


        /*para firmas*/
        .signatures {
            width: 100%;
            margin-top: 50px;
            align-items: center;
        }

        .signature-row {
            clear: both;
            /* Forzar un salto de línea después de cada fila */
        }

        .signature {
            width: 17%;
            /* Ancho de cada columna de firma con un margen para evitar desbordamientos */
            float: left;
            padding: 5px;
            margin: 5px;
            /* Margen entre las firmas */
            text-align: center;
            /* border-top: 1px solid #000; */
            /* Borde alrededor de cada firma */
            font-size: 0.6rem;
            margin-bottom: 40px;
        }

        .signature p {
            margin: 0;
            padding: 0;
        }

        .table-container {
            width: 100%;
            font-weight: normal;

            table-layout: fixed;
            border-collapse: collapse;
            border: 1px solid #ddd;
            font-size: 12px;

        }

        .table-container td {
            vertical-align: top;
            /* Alinea las tablas al tope */
        }

        .table-container tr {
            border: 1px solid black;
            text-align: center;
            padding-left: 2px;
            /* Alinea las tablas al tope */
        }

        .table-container th {
            font-weight: normal;
            /* Alinea las tablas al tope */
        }

        .columna_principal {
            text-align: left;

        }

        .columna_secundaria {}


        .table-container {
            width: 100%;
            table-layout: fixed;
            /* Para que las columnas tengan el mismo ancho */
            border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
            text-align: center;
            /* Opcional, para centrar el contenido */
            padding: 3px;
            /* Opcional, mejora legibilidad al imprimir */
            white-space: nowrap;
        }
    </style>

</head>

<body>
    <div class="page">

        <head>
            <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.6rem">
                <tr>
                    <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
                    <th style="width: 50%;">REGISTRO</th>
                    <th style="width: 25%; font-size: 0.8rem">PLL-REG-035 <br> Versión 002 <br> Página 1 de 1 </th>
                </tr>
                <tr>
                    <td colspan="3"
                        style="text-align: center; padding: 0.6rem;  font-weight:bold; text-transform: uppercase">
                        Control de
                        calidad en proceso - Linea HTST</td>
                </tr>
            </table>
        </head>
        <footer>
            SOALPRO SRL - Planta Lácteos - Reporte generado el {{ date('d/m/Y') }}
            <div class="page-number"></div>
        </footer>

        <fieldset>
            <legend style="font-weight:bold; text-transform: uppercase">Información General</legend>
            <div class="cont_div">
                <table class="general">
                    <tr>
                        <td>
                            <p>Fecha de Producción:
                                {{ \Carbon\Carbon::parse($informacion->tiempo_elaboracion)->isoFormat('DD MMM YYYY', 0, 'es') }}
                            </p>
                            <p>ORP: <span>{{ $informacion->codigo }}</span></p>
                            <p>Producto: {{ $informacion->producto->nombre }}</p>
                        </td>
                        <td>

                            <p>Fecha(s) de Vencimiento:
                                @if ($informacion->fecha_vencimiento1)
                                    {{ \Carbon\Carbon::parse($informacion->fecha_vencimiento1)->isoFormat('DD MMM YYYY', 0, 'es') }}
                                @endif

                                @if ($informacion->fecha_vencimiento2)
                                    -
                                    {{ \Carbon\Carbon::parse($informacion->fecha_vencimiento2)->isoFormat('DD MMM YYYY', 0, 'es') }}
                                @endif

                            </p>
                            <p>Preparacion: {{ $informacion->lote / 1 }} </p>

                            <p>Destino: {{ $informacion->producto->destinoProducto->nombre }}</p>

                        </td>
                    </tr>

                </table>
            </div>
        </fieldset>

        <main>
            <table class="table-container">
                <!-- Agrupación por etapa -->
                @php
                    // Agrupar resultados por etapa
                    $etapas = [
                        'Mezcla' => [],

                        'Envasado' => [],
                    ];

                    foreach ($data as $preparacion => $resultados) {
                        foreach ($resultados as $resultado) {
                            $etapa = $resultado->estadoPlanta->etapa->nombre; // Suponiendo que 'nombre' es el campo de la etapa
                            if (array_key_exists($etapa, $etapas)) {
                                $etapas[$etapa][] = $resultado;
                            }
                        }
                    }
                @endphp
            </table>

            <br>


            <table class="table-container " style="  font-wheight:0">
                <thead>
                    <tr>
                        <th colspan="
                        @if (str_contains($informacion->producto->nombre, 'PREMEZCLA')) 11
                        @else
                        15 @endif

                        "
                            style="font-weight:bold;">
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
                        @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                        @else
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        @endif



                        <th>Sol</th>
                        <th>Ana</th>

                    </tr>
                </thead>
                <tbody>
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

                                @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                                @else
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
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


            <table class="table-container " style="  font-wheight:0">
                <thead>
                    <tr>
                        <th colspan="@if (str_contains($informacion->producto->nombre, 'PREMEZCLA')) 11
                        @else
                        15 @endif"
                            style="font-weight:bold;">
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

                        @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                        @else
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        @endif




                        <th>Sol</th>
                        <th>Ana</th>

                    </tr>
                </thead>
                <tbody>
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
                                @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                                @else
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
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


            <table class="table-container " style="  font-wheight:0">
                <thead>
                    <tr>
                        <th colspan="@if (str_contains($informacion->producto->nombre, 'PREMEZCLA')) 11
                        @else
                        15 @endif"
                            style="font-weight:bold;">
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
                        @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                        @else
                            <th>µ [s]</th>
                        @endif
                        @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                        @else
                            <th></th>
                            <th></th>
                            <th></th>
                        @endif
                        <th>Sol</th>
                        <th>Ana</th>

                    </tr>
                </thead>
                <tbody>
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

                                @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                                @else
                                    @if ($analisis->viscosidad)
                                        <th>{{ $analisis->viscosidad }}</th>
                                    @else
                                        <th>-</th>
                                    @endif
                                @endif
                                @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                                @else
                                    <th></th>
                                    <th></th>
                                    <th></th>
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

            <table class="table-container " style="  font-wheight:0">
                <thead>
                    <tr>
                        <th colspan="
                        @if (str_contains($informacion->producto->nombre, 'PREMEZCLA')) 11
                        @else
                        15 @endif
                        "
                            style="font-weight:bold;">
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


                        @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                        @else
                            <th>µ [s]</th>
                            <th>Color</th>
                            <th>Olor</th>
                            <th>Sabor</th>
                        @endif

                        <th>Sol</th>
                        <th>Ana</th>

                    </tr>
                </thead>
                <tbody>
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


                                @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
                                @else
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


            <br>


            @if (str_contains($informacion->producto->nombre, 'PREMEZCLA'))
            @else
                <table class="table-container">

                    <thead>
                        <tr>
                            <th colspan="15" style="font-weight:bold;">
                                ENVASADO
                            </th>
                        </tr>

                    </thead>
                    <tbody>
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
                                <th>{{ $analisis->peso /1}}</th>
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
            <br>





            <table class="table-container">
                <tbody>
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
            <div class="justify-end">
                <p align="right">C.&nbsp;&nbsp;&nbsp;: Conforme &nbsp;&nbsp;&nbsp; &nbsp; </p>
                <p align="right">N.C.: No Conforme</p>
            </div>



        </main>
    </div>

    <div class="display: flex; border: 1px solid #000;">
        <div  style=" display: flex; justify-content: flex-end; align-items: center;">

            <style>
                .capitalize {
                    text-transform: capitalize;
                }

                /* Estilo para la tabla con la clase "mi-tabla" */
                table.mi-tabla {
                    page-break-inside: avoid;
                    width: 40%;
                    border-collapse: collapse;
                    /* Colapsa los bordes de las celdas */
                    border: 1px solid #000;
                    /* Borde externo de la tabla */
                }

                /* Estilo para las cabeceras de la tabla con la clase "mi-tabla" */
                table.mi-tabla th {
                    padding: 8px;
                    text-align: left;
                    background-color: #f2f2f2;
                    /* Color de fondo para las cabeceras */
                }

                /* Estilo para las celdas del cuerpo de la tabla con la clase "mi-tabla" */
                table.mi-tabla td {
                    padding: 4px;
                    text-align: left;
                }

                /* Estilo para las celdas de cabecera en la primera fila de la tabla con la clase "mi-tabla" */
                table.mi-tabla thead th {
                    border-bottom: 2px solid #000;
                    /* Borde inferior más grueso para las cabeceras */
                }
            </style>

            <!-- Aplica la clase "mi-tabla" solo a la tabla que deseas estilizar -->
            <table class="mi-tabla ">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
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


                <div class="signature" style="margin-left: 150px; justify-content: center; align-items: center; width: 100%; ">
                    <p><strong
                            style=" border-top: 1px solid #000; padding-top: 7px; padding-right: 25px; padding-left: 25px;">
                            REVISADO </strong>
                    </p>
                </div>

        </div>


    </div>

</body>

</html>
