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
    </style>
</head>
<header>
    <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.6rem">
        <tr>
            <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
            <th style="width: 50%;">REGISTRO</th>
            <th style="width: 25%; font-size: 0.8rem">PLL-REG-044 <br> Versión 004 <br>
                <div class="page-number"></div>
            </th>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; padding: 0.6rem;  font-weight:bold;">ANÁLISIS DE
                LECHE</td>
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
            <legend style="font-weight:bold;"></legend>
            <div class="cont_div">
                <table class="general">
                    <tr>
                        <th>FECHA: Del
                            {{ \Carbon\Carbon::parse($fechaInicio)->isoFormat('DD [de] MMMM [del] YYYY', 0, 'es') }} Al
                            {{ \Carbon\Carbon::parse($fechaFin)->isoFormat('DD [de] MMMM [del] YYYY', 0, 'es') }}</th>


                    </tr>

                </table>
            </div>
        </fieldset>



        <main>
            <table class="table-container  " style="  font-wheight:0 ">
                <thead>

                    <tr>
                        <th>Fecha y Hora</th>
                        <th>Ruta</th>
                        <th>
                            <p>Temperatura</p>
                            <p>[°C]</p>
                        </th>
                        <th style="padding: 10px">pH</th>
                        <th>
                            <p>Acidez</p>
                            <p>[%]</p>
                        </th>
                        <th>
                            <p>Solidos Totales</p>
                            <p>[°Brix]</p>
                        </th>
                        <th>
                            <p>Densidad</p>
                            <p>[g/ml]</p>
                        </th>
                        <th>

                            <p>Prueba </p>
                            <p> Alcohol</p>


                        <th>
                            <p>Contenido </p>
                            <p>Graso [%]</p>
                        </th>


                        <th>
                            <p>Tc</p>
                            <p>[°C]</p>
                        </th>
                        <th>
                            <p>Por. Agua </p>
                            <p> [%]</p>
                        </th>

                        <th>
                            <p>Prueba </p>
                            <p>Antib.</p>
                        </th>

                        <th>
                            <p>R.A.M.</p>
                            <p>[UFC/ml]</p>
                        </th>
                        <th><p>Usuario</p>Solicitante</th>
                        <th>
                            <p>Usuario</p>Analisis
                        </th>
                        <th>
                            <p>Usuario</p>Siembra
                        </th>
                        <th>
                            <p>Usuario</p>Lectura
                        </th>

                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($variable as $variables)
                        <tr>
                            <th nowrap>
                                {{ \Carbon\Carbon::parse($variables->tiempo)->isoFormat('DD-MM-YY HH:mm', 0, 'es') }}
                            </th>
                            <th nowrap>
                                {{ $variables->recepcion_leche->subruta_acopio->nombre }}
                            </th>

                            @if ($variables->temperatura)
                                <th>{{ $variables->temperatura }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->ph)
                                <th>{{ $variables->ph }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->acidez)
                                <th>{{ $variables->acidez }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->brix)
                                <th>{{ $variables->brix }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->densidad)
                                <th>{{ $variables->densidad }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->prueba_alcohol !== null)
                                <th>{{ $variables->prueba_alcohol }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->contenido_graso)
                                <th>{{ $variables->contenido_graso }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->temperatura_congelacion)
                                <th nowrap>{{ $variables->temperatura_congelacion }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->porcentaje_agua)
                                <th>{{ $variables->porcentaje_agua }}</th>
                            @else
                                <th>-</th>
                            @endif

                            {{-- test antibiotico --}}
                            <th>-</th>


                            @if ($variables->recuento)
                                <th>{{ $variables->recuento }}</th>
                            @else
                                <th>-</th>
                            @endif


                            @if ($variables->recepcion_leche)
                                <th>{{ $variables->recepcion_leche->user->codigo }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->user)
                                <th>{{ $variables->user->codigo }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->usiembra)
                                <th>{{ $variables->usiembra->codigo }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->ulectura)
                                <th>{{ $variables->ulectura->codigo }}</th>
                            @else
                                <th>-</th>
                            @endif

                            @if ($variables->observaciones)
                                <th>{{ $variables->observaciones }}</th>
                            @else
                                <th>-</th>
                            @endif




                        </tr>
                    @endforeach
                </tbody>


            </table>






            <div class="justify-end" style="padding-top: 2px">
                <p align="right">Referencias: 0: Negativo </p>
                <p align="right">1: Positivo &nbsp;</p>
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
