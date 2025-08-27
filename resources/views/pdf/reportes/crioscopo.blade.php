<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>AJUSTE DE CRIÓSCOPO</title>
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

</head>

<body>
    <div class="page">

        <head>
            <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.6rem">
                <tr>
                    <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
                    <th style="width: 50%;">REGISTRO</th>
                    <th style="width: 25%; font-size: 0.8rem">PLL-REG-173 <br> Versión 002<br>
                        <div class="page-number"> </th>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding: 0.6rem;  font-weight:bold;">
                        AJUSTE DE CRIÓSCOPO
                    </td>
                </tr>
            </table>
        </head>
        <footer>
            SOALPRO SRL - Planta Lácteos - Reporte generado el {{ date('d/m/y') }}
            <div class="page-number"></div>
        </footer>





        <main style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100px;">
            <table class="table-container  " style="  font-wheight:0">
                <thead>

                    <tr>
                        <th>
                            fecha
                        </th>
                        <th>
                            Dispositivo
                        </th>
                        <th>
                            Ajuste A
                        </th>
                        <th>
                            Ajuste B
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            Responsable
                        </th>
                        <th>
                            Observaciones
                        </th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($crioscopos as $crioscopo)
                        <tr>
                            <td >
                                {{ \Carbon\Carbon::parse($crioscopo->fecha_hora)->isoFormat('DD-MM-YY') }}
                            </td>
                            <td>
                                {{ $crioscopo->dispositivosMedicion->codigo }}
                                {{ $crioscopo->dispositivosMedicion->dispositivo }}
                            </td>
                            <td>
                                {{ $crioscopo->punto_ajuste_a == 1 ? 'Si' : 'No' }}
                            </td>
                            <td>
                                {{ $crioscopo->punto_ajuste_b == 1 ? 'Si' : 'No' }}
                            </td>
                            <td>
                                @if ($crioscopo->estado == 'Bien')
                                    <span class="text-green-600 dark:text-green-500">Bueno</span>
                                @elseif ($crioscopo->estado == 'Mal')
                                    <span class="text-red-600 dark:text-red-500">Mal</span>
                                @else
                                    <span class="text-yellow-600 dark:text-yellow-500">Observado</span>
                                @endif
                            </td>
                            <td>
                                {{ $crioscopo->user->codigo }}
                            </td>
                            <td>
                                {{ $crioscopo->observaciones }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>




            <br>
            <br>
            <div>

                <style>
                    .capitalize {
                        text-transform: capitalize;
                    }

                    /* Estilo para la tabla con la clase "mi-tabla" */
                    table.mi-tabla {
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


            </div>

            <br>
            <div class="signatures"
                style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100px; ">
                <div class="signature"
                    style="display: flex; justify-content: center; align-items: center; width: 100%; ">
                    <p><strong style=" border-top: 1px solid #000; padding-top: 7px; ">Verificado</strong>
                    </p>
                </div>
            </div>


        </main>
    </div>



</body>

</html>
