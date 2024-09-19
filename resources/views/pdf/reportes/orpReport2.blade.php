<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
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
            font-weight: bold;
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

        .columna_principal {
            text-align: left;
            font-weight: 700;
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
                    <th style="width: 25%; font-size: 0.8rem">PLL-REG-140 <br> Versión 003 <br> Página 1 de 1 </th>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding: 0.6rem 0">REPORTE PROCESO EN LÍNEA </td>
                </tr>
            </table>
        </head>
        <footer>
            SOALPRO SRL - Planta Lácteos - Reporte generado el {{ date('d/m/Y') }}
            <div class="page-number"></div>
        </footer>

        <fieldset>
            <legend>Información General</legend>
            <div class="cont_div">
                <table class="general">
                    <tr>
                        <td>
                            <p>Fecha de Produción:
                                {{ \Carbon\Carbon::parse($informacion->tiempo_elaboracion)->isoFormat('D /M /Y', 0, 'es') }}
                            </p>
                            <p>ORP: <span>{{ $informacion->codigo }}</span></p>
                            <p>Producto: {{ $informacion->producto->nombre }}</p>
                        </td>
                        <td>

                            <p>Fecha(s) de Vencimiento:
                                @if ($informacion->fecha_vencimiento1)
                                    {{ \Carbon\Carbon::parse($informacion->fecha_vencimiento1)->isoFormat('D /M /Y', 0, 'es') }}
                                @endif
                                -
                                @if ($informacion->fecha_vencimiento1)
                                    {{ \Carbon\Carbon::parse($informacion->fecha_vencimiento2)->isoFormat('D /M /Y', 0, 'es') }}
                                @endif

                            </p>
                            <p>Lote: {{ $informacion->lote / 1 }} </p>

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
                        'Pasteurizado' => [],
                        'Inoculación' => [],
                        'Saborización' => [],
                        'Antes de Corte' => [],
                        'Después de Corte' => [],
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

                <!-- Renderizar las tablas por cada etapa -->
                @foreach ($etapas as $etapa => $resultadosEtapa)
                    @if (!empty($resultadosEtapa))
                        <tr>
                            <td>
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="{{ count($resultadosEtapa) + 1 }}">{{ $etapa }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td class="columna_principal">
                                                <p>Preparacion</p>
                                                <p>Hora</p>
                                                <p>Origen</p>
                                                @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->temperatura)
                                                    <p>Temperatura [°C]</p>
                                                @endif
                                                @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->ph)
                                                    <p>pH</p>
                                                @endif
                                                @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->acidez)
                                                    <p>Acidez [%]</p>
                                                @endif
                                                @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->brix)
                                                    <p>Sólidos [°Bx]</p>
                                                @endif
                                                @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->viscosidad)
                                                    <p>Visocidad [s]</p>
                                                @endif
                                                @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->volumen)
                                                    <p>Volumen [°ml]</p>
                                                @endif
                                                @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->peso)
                                                    <p>Peso [g]</p>
                                                @endif
                                                @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->densidad)
                                                    <p>Densidad[g/ml]</p>
                                                @endif
                                                @if ($etapa == 'Saborización' || $etapa == 'Envasado')
                                                    @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->color)
                                                        <p>Color</p>
                                                    @endif
                                                    @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->olor)
                                                        <p>Olor</p>
                                                    @endif
                                                    @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->sabor)
                                                        <p>Sabor</p>
                                                    @endif
                                                @endif
                                                @if ($resultadosEtapa[0]->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->aspecto)
                                                    <p>Aspecto</p>
                                                @endif
                                                <p>Usuario</p>
                                            </td>
                                            @foreach ($resultadosEtapa as $resultado)
                                                <td class="columna_secundaria">
                                                    <p>{{ $resultado->preparacion }}</p>
                                                    <p>{{ \Carbon\Carbon::parse($resultado->estadoPlanta->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                                                    </p>
                                                    <p>{{ $resultado->estadoPlanta->origen->alias }}</p>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last())
                                                        @php
                                                            $analisis = $resultado->estadoPlanta->solicitudAnalisisLinea->last()
                                                                ->analisisLinea;
                                                        @endphp
                                                        @if ($analisis->temperatura)
                                                            <p>{{ $analisis->temperatura }}</p>
                                                        @endif
                                                        @if ($analisis->ph)
                                                            <p>{{ $analisis->ph }}</p>
                                                        @endif
                                                        @if ($analisis->acidez)
                                                            <p>{{ $analisis->acidez }}</p>
                                                        @endif
                                                        @if ($analisis->brix)
                                                            <p>{{ $analisis->brix }}</p>
                                                        @endif
                                                        @if ($analisis->viscosidad)
                                                            <p>{{ $analisis->viscosidad }}</p>
                                                        @endif
                                                        @if ($analisis->volumen)
                                                            <p>{{ $analisis->volumen }}</p>
                                                        @endif
                                                        @if ($analisis->peso)
                                                            <p>{{ $analisis->peso }}</p>
                                                        @endif
                                                        @if ($analisis->densidad)
                                                            <p>{{ $analisis->densidad }}</p>
                                                        @endif
                                                        @if ($etapa == 'Saborización' || $etapa == 'Envasado')
                                                            @if ($analisis->color)
                                                                @if ($analisis->color == true)
                                                                    <p>Si</p>
                                                                @else
                                                                    <p>No</p>
                                                                @endif
                                                            @endif
                                                            @if ($analisis->olor)
                                                                @if ($analisis->olor == true)
                                                                    <p>Si</p>
                                                                @else
                                                                    <p>No</p>
                                                                @endif
                                                            @endif
                                                            @if ($analisis->sabor)
                                                                @if ($analisis->sabor == true)
                                                                    <p>Si</p>
                                                                @else
                                                                    <p>No</p>
                                                                @endif
                                                            @endif
                                                        @endif
                                                        @if ($analisis->aspecto)
                                                            <p>{{ $analisis->aspecto }}</p>
                                                        @endif

                                                        <p>
                                                            @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->user != null)
                                                                {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->user->codigo }}
                                                            @endif
                                                            -
                                                            @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user != null)
                                                                {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->codigo }}
                                                            @endif
                                                        </p>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>

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
