<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud de Analisis</title>

    <style>
        @page {
            margin-top: 0cm;
            margin-bottom: 0cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }

        body {
            font-family: Arial, sans-serif;
            /* Cambia la fuente a Arial o la que desees */
            font-size: 1rem;
            /* Cambia el tamaño de fuente */
            background-image: url('../public/img/calidadLogo.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 100%;
            /* Ajusta el tamaño de la marca de agua según tus preferencias */
            opacity: 0.1;
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

            /* Iniciar nueva página */
            padding-top: 50px;
            /* Espacio en blanco en la parte superior */
        }

        .footer {
            width: 100%;
            position: absolute;
            bottom: 0;
        }

        .signature-box {
            width: 100%;
            text-align: center;
            margin-top: 0.3rem;
            /* Espacio entre el contenido y la zona de firma */
        }

        .signature-box .signer {
            display: inline-block;
            width: 40%;
            /* Ancho del espacio de firma */
            padding: 0.3rem 0 1rem 0;
            /* Espacio alrededor de la firma */
        }

        .signature-box .line {

            border-top: 1px solid black;
            /* Línea para firmar */
        }
    </style>

</head>

<body>
    <div class="page">

        <head>
            <table class="head" style="border: 1px solid black;font-size: 0.8rem">
                <tr>
                    <th class="cel-img" style="width: 25%;"><img src="img/logocompleto.png" alt=""></th>
                    <th style="width: 50%;">REGISTRO</th>
                    <th style="width: 25%; font-size: 0.8rem">PLL-REG-140 <br> Version 003 <br> Pagina 1 de 1 </th>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding: 0.5rem 0">INFORME DE ENSAYO</td>
                </tr>
            </table>
        </head>

        <main>
            <table class="" style="margin: 0.3rem 0; border:0; font-size:0.8rem;">
                <tr>
                    <th>Lugar y Fecha de emisión: </th>
                    <td>El Alto,
                        {{ \Carbon\Carbon::parse($datosSolicitud->updated_at)->isoFormat(
                            'dddd D [de] MMMM
                                                                                                                                                                        [de] YYYY',
                            0,
                            'es',
                        ) }}
                    </td>
                    <th>Codigo:</th>
                    <td style="font-size: 0.8rem; text-decoration: underline; font-weight: bold">
                        PLL-MB{{ $datosSolicitud->user->abreviatura }}-{{ $datosSolicitud->subcodigo }}/24
                    </td>
                </tr>

                <tr>
                </tr>
            </table>
            <br>
            <table style="margin: 0.3rem 0; border:0; text-align:center; font-size:0.8rem;">
                <tr>
                    <th colspan="3" style="border: 1px solid black">DATOS DE LA MUESTRA</th>
                </tr>
                <tr style="border-right: 1px solid black;">
                    <td style="width: 380px; border: 1px solid black">Muestra</td>
                    <th style="text-align: right ; padding: 0 15px">Codigo: </th>
                    <td style="text-align: left ">{{ $datosSolicitud->subcodigo }}</td>
                </tr>
                <tr style="border-right: 1px solid black;">
                    <td rowspan="6" style="width: 380px; border: 1px solid black;font-size: 20px">
                        @if ($datosSolicitud->productosPlanta)
                            {{ $datosSolicitud->productosPlanta->nombre }}
                        @else
                            {{ $datosSolicitud->otro }}
                        @endif
                    </td>
                    <th style="text-align: right ; padding: 0 15px">Lote: </th>
                    <td style="text-align: left ">{{ $datosSolicitud->lote }}</td>
                </tr>
                <tr style="border-right: 1px solid black;">
                    <th style="text-align: right; padding: 0 15px">Marca: </th>
                    <td style="text-align: left">San Gabriel</td>
                </tr>

                <tr style="border-right: 1px solid black;">
                    <th style="text-align: right; padding: 0 15px ">Fecha de Elaboracion: </th>
                    <td style="text-align: left; ">
                        {{ \Carbon\Carbon::parse($datosSolicitud->fecha_elaboracion)->isoFormat('D / M / YYYY', 0, 'es') }}
                    </td>

                </tr>
                <tr style="border-right: 1px solid black;">
                    <th style="text-align: right; padding: 0 15px">Fecha de Vencimiento: </th>
                    <td style="text-align: left">
                        {{ \Carbon\Carbon::parse($datosSolicitud->fecha_vencimiento)->isoFormat('D / M / YYYY', 0, 'es') }}
                    </td>
                </tr>

                

                <tr style="border-bottom:  1px solid black; border-right: 1px solid black;">
                    <th style="text-align: right; padding: 0 15px">Muestra de Analisis:</th>
                    <th style="text-align: left; text-transform: uppercase; font-size: 0.8rem">
                        {{ $datosSolicitud->tipo_analisis }}</th>

                </tr>
            </table>
            <br>
            <table style="margin: 0.3rem 0; border:0; text-align:center; font-size:0.8rem;">
                <tr>
                    <th colspan="4" style="border: 1px solid black">DATOS DE SOLICITANTE</th>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black">
                    <th>Procedencia de la muestra</th>
                    <td>
                        @if ($datosSolicitud->user && $datosSolicitud->user->informacionUsuario)
                            {{ $datosSolicitud->user->informacionUsuario->procedencia }}
                        @else
                            No hay información disponible
                        @endif
                    </td>

                    <th>Solicitante</th>
                    <td>{{ $datosSolicitud->user->nombre }} {{ $datosSolicitud->user->apellido }}</td>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">
                    <th>Direccion de procedencia</th>
                    <td colspan="3">
                        @if ($datosSolicitud->user && $datosSolicitud->user->informacionUsuario)
                            {{ $datosSolicitud->user->informacionUsuario->direccion }}
                        @else
                            No hay información disponible
                        @endif
                    </td>
                </tr>
            </table>
            <br>
            <table style="margin: 0.3rem 0; border:0; text-align:center; font-size:0.8rem;">
                <tr style="border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black">
                    <th>Fecha de muestreo:</th>
                    <td>{{ \Carbon\Carbon::parse($datosSolicitud->fecha_muestreo)->isoFormat(
                        'dddd[,] D [de] MMMM [de]
                                                                                                                                                YYYY',
                        0,
                        'es',
                    ) }}
                    </td>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black;">
                    <th>Fecha de ingreso:</th>
                    <td>{{ \Carbon\Carbon::parse($datosSolicitud->solicitudPlanta->tiempo)->isoFormat(
                        'dddd[,] D [de] MMMM
                                                                                                                                                [de] YYYY',
                        0,
                        'es',
                    ) }}
                    </td>

                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">
                    <th>Fecha de analsis:</th>
                    <td>{{ \Carbon\Carbon::parse($resultados->fecha_sembrado)->isoFormat(
                        'dddd[,] D [de] MMMM [de]
                                                                                                                                                YYYY',
                        0,
                        'es',
                    ) }}
                    </td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <th style="text-align:left;">Notas:</th>
                </tr>
            </table>
            <table style="margin: 0.3rem 0; border:0; text-align:center; font-size:0.8rem;">
                <tr>
                    <th colspan="7" style="border: 1px solid black">RESULTADO DE ENSAYO</th>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black; ">
                    <th>#</th>
                    <th>PARÁMETROS</th>
                    <th>UNIDADES</th>
                    <th>MÉTODO DE ENSAYOS</th>
                    <th>RESULTADOS</th>
                    <th>m (*)</th>
                    <th>M (*)</th>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black; ">
                    <td>1</td>
                    <td>Mesófilos, Aeróbios Totales</td>
                    <td>{{ $normas->unidad }}</td>
                    <td>NB 32003</td>
                    <td>
                        @if ($resultados->aer_mes >= 1000000)
                            MNPC
                        @elseif ($resultados->aer_mes != 0)
                            {{ $resultados->aer_mes < 1
                                ? $resultados->aer_mes * 10 ** (strlen(floor($resultados->aer_mes)) - 1)
                                : $resultados->aer_mes / 10 ** (strlen(floor($resultados->aer_mes)) - 1) }}
                            x 10<sup>{{ strlen(floor($resultados->aer_mes)) - 1 }}</sup>
                        @else
                            &lt; 1 x 10<sup>1</sup>
                        @endif

                    </td>
                    <td>{{ $normas->min_mes }}

                    </td>
                    <td>{{ $normas->max_mes }}

                    </td>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black; ">
                    <td>2</td>
                    <td>Coliformes Totales</td>
                    <td>{{ $normas->unidad }}</td>
                    <td>NB 32005</td>
                    <td>
                        @if ($resultados->col_tot >= 1000000)
                            MNPC
                        @elseif ($resultados->col_tot != 0)
                            {{ $resultados->col_tot < 1
                                ? $resultados->col_tot * 10 ** (strlen(floor($resultados->col_tot)) - 1)
                                : $resultados->col_tot / 10 ** (strlen(floor($resultados->col_tot)) - 1) }}
                            x 10<sup>{{ strlen(floor($resultados->col_tot)) - 1 }}</sup>
                        @else
                            &lt; 1 x 10<sup>1</sup>
                        @endif

                    </td>
                    <td>{{ $normas->min_colTot }}
                    </td>
                    <td>{{ $normas->max_colTot }}

                    </td>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">
                    <td>3</td>
                    <td>Mohos y Levaduras</td>
                    <td>{{ $normas->unidad }}</td>
                    <td>NB 32006</td>
                    <td>
                        @if ($resultados->moh_lev >= 1000000)
                            MNPC
                        @elseif ($resultados->moh_lev != 0)
                            {{ $resultados->moh_lev < 1
                                ? $resultados->moh_lev * 10 ** (strlen(floor($resultados->moh_lev)) - 1)
                                : $resultados->moh_lev / 10 ** (strlen(floor($resultados->moh_lev)) - 1) }}
                            x 10
                            <sup>{{ strlen(floor($resultados->moh_lev)) - 1 }}</sup>
                        @else
                            &lt; 1 x 10<sup>1</sup>
                        @endif

                    </td>
                    <td>{{ $normas->min_mohLev }}
                    </td>
                    <td>{{ $normas->max_mohLev }}
                    </td>
                </tr>
            </table>
            <br>
            <table>Notas:</table>
            <table style="margin: 0.3rem 0; border:0; text-align:left; font-size:0.7rem;">
                <tr>
                    <th style="text-align:right; padding-right:10px">*:</th>
                    <td>{{ $normas->norma_referencial }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; padding-right:10px">m:</th>
                    <td>Valor del parámetro microbiológico para el cual o por debajo del cual el alimento no representa
                        un riesgo para la salud.</td>
                </tr>
                <tr>
                    <th style="text-align:right; padding-right:10px">M:</th>
                    <td>Valor del parámetro microbiológico por encima del cual el alimento representa un riesgo para la
                        salud.</td>
                </tr>
                <tr>
                    <th style="text-align:right; padding-right:10px">{{ $normas->unidad }}:</th>
                    <td>{{ $normas->aclaUni }}</td>
                </tr>
                <tr>
                    <th style="text-align:right; padding-right:10px">S/R:</th>
                    <td> Sin referencia.</td>
                </tr>
                <tr>
                    <th style="text-align:right; padding-right:10px">
                        &lt;1 x 10<sup>1</sup>:
                    </th>
                    <td> No existe crecimiento de colonias.</td>
                </tr>
                <tr>
                    <th style="text-align:right; padding-right:10px">MNPC:</th>
                    <td>Muy Numeroso Para Contar</td>
                </tr>
            </table>
        </main>

        <table>
            <div class="footer" style="opacity: 1;">
                <div class="signature-box">
                    <div class="signer">
                        @if ($resultados->ana_dia5_id == 22)
                            <img style="width: 60%" src="img/firma/mb_veronica.jpeg" alt="">
                        @endif
                        @if ($resultados->ana_dia5_id == 23)
                            <img style="width: 60%" src="img/firma/mb_mabel.jpeg" alt="">
                        @endif
                        @if ($resultados->ana_dia5_id == 12)
                            <img style="width: 60%" src="img/firma/mb_lizeth.jpeg" alt="">
                        @endif
                        <div class="line">Analista de Microbiologia</div>
                    </div>
                    <div class="signer">
                        <img style="width: 80%" src="img/firma/cal_melvin.jpeg" alt="">
                        <div class="line">Jefe de Calidad</div>
                    </div>
                </div>
            </div>
        </table>

    </div>



</body>

</html>
