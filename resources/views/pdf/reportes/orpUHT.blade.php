<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Control UHT</title>
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
            border-top: 1px solid #000;
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
    </style>

</head>

<body>
    <div class="page">

        <head>
            <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.6rem">
                <tr>
                    <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
                    <th style="width: 50%;">REGISTRO</th>
                    <th style="width: 25%; font-size: 0.8rem">PLL-REG-052 <br> Versión 002 <br> Página 1 de 1 </th>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding: 0.6rem;  font-weight:bold;">Control de
                        calidad en proceso - Linea Ulta Pasteurizado UHT</td>
                </tr>
            </table>
        </head>
        <footer>
            SOALPRO SRL - Planta Lácteos - Reporte generado el {{ date('DD/MM/YYYY') }}
            <div class="page-number"></div>
        </footer>

        <fieldset>
            <legend style="font-weight:bold;">Información General</legend>
            <div class="cont_div">
                <table class="general">
                    <tr>
                        <td>
                            <p>Fecha de Producción:
                                {{ \Carbon\Carbon::parse($informacion->tiempo_elaboracion)->isoFormat('DD/MM/YYYY', 0, 'es') }}
                            </p>
                            <p>ORP: <span>{{ $informacion->codigo }}</span></p>
                            <p>Producto: {{ $informacion->producto->nombre }}</p>
                        </td>
                        <td>

                            <p>Fecha(s) de Vencimiento:
                                @if ($informacion->fecha_vencimiento1)
                                    {{ \Carbon\Carbon::parse($informacion->fecha_vencimiento1)->isoFormat('DD/MM/YYYY', 0, 'es') }}
                                @endif

                                @if ($informacion->fecha_vencimiento2)
                                    -
                                    {{ \Carbon\Carbon::parse($informacion->fecha_vencimiento2)->isoFormat('DD/MM/YYYY', 0, 'es') }}
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
                        <th colspan="17" style="font-weight:bold;">
                            Control de Calidad en Proceso - Línea Ultra Pasteurizado UHT
                        </th>
                    </tr>
                    <tr>
                        <th>Datos de Proceso </th>
                        <th>Tanque</th>
                        <th>Juliano</th>
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
                        <th>Volumen</th>
                        <th>Prep.</th>
                        <th>Solicitante</th>
                        <th>Analista</th>

                    </tr>
                </thead>
                <tbody>
                    @php

                        $contador = 1;
                    @endphp
                    @foreach ($mezclas as $dato)

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
                            <th>{{$diaDelAno}}</th>

                            <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            </th>


                            @if ($dato->solicitudAnalisisLinea->estadoPlanta)
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
                                {{-- volumen --}}
                                <th>-</th>
                                <th>
                                    @foreach ($dato->solicitudAnalisisLinea->estadoPlanta->estadoDetalle as $estado)
                                        @if ($estado->orp_id == $orpId)
                                            {{ $estado->preparacion }}
                                        @endif
                                    @endforeach
                                </th>

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
            <table class="table-container">

                <thead>
                    <tr>
                        <th colspan="15" style="font-weight:bold;">
                            Control de Calidad de Producto Envasado
                        </th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <th>Cabezal </th>
                        <th>Juliano</th>
                        <th>Hora S.</th>
                        <th>Hora R.</th>
                        <th>Temp UHT [°C]</th>
                        <th>Temp [°C]</th>
                        <th>pH</th>
                        <th>Acidez [%]</th>
                        <th>°Brix</th>
                        <th>µ [s]</th>
                        <th>Color</th>
                        <th>Olor</th>
                        <th>Sabor</th>
                        <th>Peso [g]</th>


                        <th>Encargados</th>

                    </tr>
                    @foreach ($envasados as $dato)

                        <tr>

                            @php
                                $contador = $contador + 1;
                            @endphp
                            <th>{{ $dato->solicitudAnalisisLinea->estadoPlanta->origen->alias }}</th>
                            @php
                                $fecha = new DateTime($dato->solicitudAnalisisLinea->tiempo);
                                $diaDelAno = $fecha->format('z') + 1;
                            @endphp
                            <th>{{$diaDelAno}}</th>

                            <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                            </th>

                            @if ($dato->solicitudAnalisisLinea->estadoPlanta)
                                <th>{{ \Carbon\Carbon::parse($dato->solicitudAnalisisLinea->analisisLinea->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                                </th>
                            @else
                                <th>-</th>
                            @endif


                            <th>-</th>

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
                                {{-- peso --}}
                                @if ($analisis->peso)
                                    <th>{{ $analisis->peso }}</th>
                                @else
                                    <th>-</th>
                                @endif
                                <th>
                                    @if ($dato->solicitudAnalisisLinea->user != null)
                                        {{ $dato->solicitudAnalisisLinea->user->codigo }}
                                    @endif

                                    -


                                    @if ($dato->solicitudAnalisisLinea->analisisLinea->user != null)
                                        {{ $dato->solicitudAnalisisLinea->analisisLinea->user->codigo }}
                                    @endif
                                </th>
                            @endif



                        </tr>
                    @endforeach

                </tbody>

            </table>
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
                <p align="right">C.&nbsp;&nbsp;&nbsp;:     Conforme &nbsp;&nbsp;&nbsp;  &nbsp; </p>
                <p align="right">N.C.: No Conforme</p>
            </div>



        </main>
    </div>
    <div>
        @if ($usuariosInvolucrados->isEmpty())
            <p>No se encontraron usuarios involucrados.</p>
        @else
            <div class="signatures">
                @foreach ($usuariosInvolucrados as $index => $user)
                    @if ($index % 5 === 0)
                        <!-- Comienza una nueva fila cada 5 firmas -->
                        <div class="signature-row">
                    @endif
                    <div class="signature">
                        <p>{{ $user->codigo }}</p>
                        <p>{{ $user->nombre }} {{ $user->apellido }}</p>
                    </div>
                    @if (($index + 1) % 5 === 0 || $index === count($usuariosInvolucrados) - 1)
                        <!-- Cierra la fila después de 5 firmas o al final de la lista -->
            </div>
        @endif
        @endforeach
    </div>
    @endif
    </div>

</body>

</html>
