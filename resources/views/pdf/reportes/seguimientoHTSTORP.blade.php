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
            margin-top: 120px;
            margin-left: 0cm;
            margin-right: 0cm;
            margin-bottom: 50px;
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
            padding-left: 2px|px;
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

        th {
            text-transform: uppercase;
        }
    </style>
</head>
<header>
    <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.6rem">
        <tr>
            <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
            <th style="width: 50%;">REGISTRO</th>
            <th style="width: 25%; font-size: 0.8rem">PLL-REG-020 <br> Versión 002 <br>
                <div class="page-number"></div>
            </th>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; padding: 0.6rem;  font-weight:bold;">CONTROL MICROBIOLOGICO -
                PRODUCTO TERMINADO (HTST)</td>
        </tr>
    </table>
</header>

<body>




    <footer>
        SOALPRO SRL - Planta Lácteos - Reporte generado el {{ date('d/m/Y') }}
        <div class="page-number"></div>
    </footer>

    <div class="page">

        <fieldset>
             <div class="cont_div">
                <table class="general">
                    <tr>
                        <td>
                            <p>Fecha de Producción:
                                {{ \Carbon\Carbon::parse($variable[0]->orp->tiempo_elaboracion)->isoFormat('DD MMM YYYY', 0, 'es') }}
                            </p>
                            <p>ORP: <span>{{ $variable[0]->orp->codigo }}</span></p>
                            <p>Producto: {{ $variable[0]->orp->producto->nombre }}</p>
                        </td>
                        <td>

                            <p>Fecha(s) de Vencimiento:
                                @if ($variable[0]->orp->fecha_vencimiento1)
                                    {{ \Carbon\Carbon::parse($variable[0]->orp->fecha_vencimiento1)->isoFormat('DD MMM YYYY', 0, 'es') }}
                                @endif

                                @if ($variable[0]->orp->fecha_vencimiento2)
                                    -
                                    {{ \Carbon\Carbon::parse($variable[0]->orp->fecha_vencimiento2)->isoFormat('DD MMM YYYY', 0, 'es') }}
                                @endif

                            </p>
                            <p>Preparacion: {{ $variable[0]->orp->lote / 1 }} </p>

                            <p>Destino: {{ $variable[0]->orp->producto->destinoProducto->nombre }}</p>

                        </td>
                    </tr>

                </table>
            </div>
        </fieldset>



        <main>
            <table class="table-container  " style="  font-wheight:0 ">
                <thead>

                    <tr>
                        <th>Fecha de
                            Análisis </th>

                        <th>Analista de
                            Siembra </th>
                        {{-- <th>
                            Producto
                        </th>
                        <th>Fecha de
                            Vencimiento
                        </th>
                        <th>
                            ORP
                        </th> --}}
                        <th>
                            Lote
                        </th>
                        <th>

                            Aerobios
                            Mesófilos
                            Totales
                            <p>

                                [UFC/ml]
                            </p>
                        </th>
                        <th>
                            coliformes
                            Totales

                            <p>

                                [UFC/ml]
                            </p>
                        </th>
                        <th>
                            Encargado
                            <p>
                                Lectura 2
                                días
                            </p>
                        </th>
                        <th>
                            Mohos y
                            Levaduras
                            <p>

                                [UFC/ml]
                            </p>

                        </th>
                        <th>
                            Encargado

                            <p>

                                Lectura 5
                                días
                            </p>
                        </th>
                        <th>Observaciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($variable as $variables)
                        <tr>
                            <th nowrap>
                                {{ \Carbon\Carbon::parse($variables->tiempo)->isoFormat('DD-MM-YY', 0, 'es') }}
                            </th>



                           <th>{{ $variables->usuarioSiembra->codigo ?? '-' }}</th>
                        {{--      <th nowrap style="font-size: 8px;">{{ $variables->orp->producto->nombre ?? '-' }}</th>
                            <th nowrap>
                                @if ($variables->orp->fecha_vencimiento1)
                                    {{ \Carbon\Carbon::parse($variables->orp->fecha_vencimiento1)->isoFormat('DD-MM-YY', 0, 'es') }}
                            </th>
                    @endif
                    <th nowrap>{{ $variables->orp->codigo ?? '-' }}</th> --}}
                    <th nowrap>{{ $variables->orp->lote / 1 ?? '-' }}</th>


                    <th>
                        @if ($variables->rt >= 1000000)
                            MNPC
                        @elseif ($variables->rt > 0 && $variables->rt <= 10)
                            {{ $variables->rt }}
                        @elseif ($variables->rt != 0)
                            {{ $variables->rt < 1
                                ? $variables->rt * 10 ** (strlen(floor($variables->rt)) - 1)
                                : $variables->rt / 10 ** (strlen(floor($variables->rt)) - 1) }}
                            x 10
                            <sup>{{ strlen(floor($variables->rt)) - 1 }}</sup>
                        @else
                            &lt; 1 x 10<sup>1</sup>
                        @endif
                    </th>
                    <th>
                        @if ($variables->col >= 1000000)
                            MNPC
                        @elseif ($variables->col > 0 && $variables->col <= 10)
                            {{ $variables->col }}
                        @elseif ($variables->col != 0)
                            {{ $variables->col < 1
                                ? $variables->col * 10 ** (strlen(floor($variables->col)) - 1)
                                : $variables->col / 10 ** (strlen(floor($variables->col)) - 1) }}
                            x 10
                            <sup>{{ strlen(floor($variables->col)) - 1 }}</sup>
                        @else
                            &lt; 1 x 10<sup>1</sup>
                        @endif
                    </th>
                    <th>{{ $variables->usuarioDia2->codigo ?? '-' }}</th>
                    <th>
                        @if ($variables->moho >= 1000000)
                            MNPC
                        @elseif ($variables->moho > 0 && $variables->moho <= 10)
                            {{ $variables->moho }}
                        @elseif ($variables->moho != 0)
                            {{ $variables->moho < 1
                                ? $variables->moho * 10 ** (strlen(floor($variables->moho)) - 1)
                                : $variables->moho / 10 ** (strlen(floor($variables->moho)) - 1) }}
                            x 10
                            <sup>{{ strlen(floor($variables->moho)) - 1 }}</sup>
                        @else
                            &lt; 1 x 10<sup>1</sup>
                        @endif
                    </th>
                    <th>{{ $variables->usuarioDia5->codigo ?? '-' }}</th>
                    <th>{{ $variables->observaciones ?? '-' }}</th>



                    </tr>
                    @endforeach
                </tbody>


            </table>






            <div class="justify-end" style="padding-top: 5px">
                {{-- <p align="right">Referencias: 0: Negativo </p>
                <p align="right">1: Positivo &nbsp;</p> --}}
            </div>



        </main>

        <div>
            <div style=" display: flex; justify-content: flex-end;  page-break-inside: avoid; ">



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



                <div style="padding-left: 650px; ">
                    <strong
                        style=" border-top: 1px solid #000; padding-top: 7px; padding-right: 25px; padding-left: 25px; ">
                        REVISADO </strong>
                </div>


            </div>


        </div>



    </div>
</body>

</html>
