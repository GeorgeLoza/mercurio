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
            font-size: 0.7rem;
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
            font-size: 0.9rem;
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
            font-size: 11px;
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
            font-size: 13px;
            vertical-align: middle;
            background-color: white;
            font-weight: bold;
        }

        .header-td3 {
            width: 20%;
            text-align: right;
            font-size: 10px;
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
            font-size: 10px;
            margin-bottom: 40px;
        }

        .signature p {
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<body>
    <div class="page">

        <head>
            <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.5rem">
                <tr>
                    <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
                    <th style="width: 50%;">REGISTRO</th>
                    <th style="width: 25%; font-size: 0.8rem">PLL-REG-140 <br> Versión 003 <br> Página 1 de 1 </th>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding: 0.5rem 0">REPORTE PROCESO EN LÍNEA </td>
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
                                {{ \Carbon\Carbon::parse($informacion->fecha_vencimiento1)->isoFormat('D /M /Y', 0, 'es') }}
                                -
                                {{ \Carbon\Carbon::parse($informacion->fecha_vencimiento2)->isoFormat('D /M /Y', 0, 'es') }}
                            </p>
                            <p>Lote: {{ $informacion->lote / 1 }} </p>
                            <p>Raciones: {{ $informacion->lote * $informacion->producto->norma }}</p>
                        </td>
                    </tr>

                </table>
            </div>
        </fieldset>

        <main>

            @foreach ($data as $preparacion => $resultados)
                <div
                    class="block mb-2 py-2 px-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <fieldset>
                        <legend>Preparación {{ $preparacion }}</legend>
                        <div class="cont_div">
                            <table style="text-align: center">
                                <thead style="font-size: 9px">
                                    <tr>
                                        <th>Hora</th>
                                        <th>Etapa</th>
                                        <th>Origen</th>
                                        <th>Temperatura [°C]</th>
                                        <th>pH</th>
                                        <th>Acidez [%]</th>
                                        <th>Sólidos [°Bx]</th>
                                        <th>Visocidad [s]</th>
                                        <th>Densidad[g/ml]</th>
                                        <th>Peso [g]</th>
                                        <th>Volumen [ml]</th>
                                        <th>Usuarios</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 8.5px">
                                    @foreach ($resultados as $resultado)
                                        @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last())
                                            <tr>
                                                <td> {{ \Carbon\Carbon::parse($resultado->estadoPlanta->tiempo)->isoFormat('HH:mm', 0, 'es') }}
                                                </td>
                                                <td style="text-align:start">
                                                    {{ $resultado->estadoPlanta->etapa->abreviatura }}</td>
                                                <td style="text-align:start">
                                                    {{ $resultado->estadoPlanta->origen->alias }}</td>

                                                <td>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->temperatura)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->temperatura }}
                                                    @else
                                                        -
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->ph)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->ph }}
                                                    @else
                                                        -
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->acidez)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->acidez }}
                                                    @else
                                                        -
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->brix)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->brix }}
                                                    @else
                                                        -
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->viscosidad)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->viscosidad }}
                                                    @else
                                                        -
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->densidad)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->densidad }}
                                                    @else
                                                        -
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->peso)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->peso }}
                                                    @else
                                                        -
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->volumen)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->volumen }}
                                                    @else
                                                        -
                                                    @endif

                                                </td>
                                                <td>

                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->user != null)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->user->codigo }}
                                                    @endif
                                                    -
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user != null)
                                                        {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->codigo }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </fieldset>

                </div>
            @endforeach



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
