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
                    <th style="width: 25%; font-size: 0.8rem">PLL-REG-044 <br> Versión 004 <br> Página 1 de 1 </th>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding: 0.6rem;  font-weight:bold;">RECEPCIÓN DE
                        LECHES</td>
                </tr>
            </table>
        </head>
        {{-- <footer>
            SOALPRO SRL - Planta Lácteos - Reporte generado el {{ date('DD/MM/YYYY') }}
            <div class="page-number"></div>
        </footer> --}}

        <fieldset>
            <legend style="font-weight:bold;"></legend>
            <div class="cont_div">
                <table class="general">
                    <tr>
                        <th>FECHA: Del {{\Carbon\Carbon::parse($fechaInicio)->isoFormat('DD [de] MMMM [del] YYYY', 0, 'es') }}  Al {{ \Carbon\Carbon::parse($fechaFin)->isoFormat('DD [de] MMMM [del] YYYY', 0, 'es')  }}</th>


                    </tr>

                </table>
            </div>
        </fieldset>



        <main>
            <table class="table-container  " style="  font-wheight:0">
                <thead>

                    <tr>
                        <th>Hora</th>
                        <th>Subruta</th>
                        <th>
                            <p>Temperatura</p>
                            <p>[°C]</p> </th>
                        <th>pH</th>
                        <th>
                            <p>Acidez</p>
                            <p>[%]</p> </th>
                        <th><p>Solidos Totales</p>
                            <p>[°Brix]</p>
                            </th>
                        <th>
                            <p>Densidad</p>
                            <p>[g/ml]</p>
                             </th>
                        <th>

                                <p>Prueba de Alcohol</p>
                                <p>[+/-]</p>


                        <th>
                            <p>Contenido Graso</p>
                            <p>[%]</p> </th>


                        <th>
                            <p>Temperatura de Congelacion</p>
                            <p>[°C]</p></th>
                        <th>
                            <p>Agua Añadida</p>
                            <p> [%]</p></th>

                        <th>Observaciones</th>
                        <th>Solicitante</th>
                        <th>Analista</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($variable as $variables)
                        <tr>
                            <th nowrap>
                                {{ \Carbon\Carbon::parse($variables->tiempo)->isoFormat('HH:mm DD/MM', 0, 'es')  }}
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
                            @if ($variables->prueba_alcohol!== null)
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
                                <th>{{ $variables->temperatura_congelacion }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->porcentaje_agua)
                                <th>{{ $variables->porcentaje_agua }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->observaciones)
                                <th>{{ $variables->observaciones }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->recepcion_leche)
                                <th>{{ $variables->recepcion_leche->user->codigo }}</th>
                            @else
                                <th>-</th>
                            @endif
                            @if ($variables->user)
                                <th>{{ $variables->user->codigo}}</th>
                            @else
                                <th>-</th>
                            @endif




                        </tr>
                    @endforeach
                </tbody>


            </table>





            <br>
            <div class="justify-end">
                <p align="right">C.&nbsp;&nbsp;&nbsp;: Conforme &nbsp;&nbsp;&nbsp; &nbsp; </p>
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
