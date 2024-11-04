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
                    <th style="width: 25%; font-size: 0.8rem">PLL-REG-140 <br> Versión 003 <br> Pagina 1 de 1 </th>
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
                    <th>Código:</th>
                    <td style="font-size: 0.8rem; text-decoration: underline; font-weight: bold">
                        PLL-FQ{{ $datosSolicitud->user->abreviatura }}-{{ $datosSolicitud->subcodigo }}/{{ \Carbon\Carbon::parse($datosSolicitud->updated_at)->isoFormat('YY') }}
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
                        {{ $datosSolicitud->productosPlanta->nombre }}</td>
                    <th style="text-align: right ; padding: 0 15px">Lote: </th>
                    <td style="text-align: left ">
                        @if ($datosSolicitud->lote)
                            {{ $datosSolicitud->lote }}
                        @else
                            ----
                        @endif
                    </td>
                </tr>
                <tr style="border-right: 1px solid black;">
                    <th style="text-align: right; padding: 0 15px">Marca: </th>
                    <td style="text-align: left">San Gabriel</td>
                </tr>

                <tr style="border-right: 1px solid black;">
                    <th style="text-align: right; padding: 0 15px ">Fecha de Elaboración: </th>
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
                    <th style="text-align: right; padding: 0 15px">Muestra de Análisis:</th>
                    <th style="text-align: left; text-transform: uppercase; font-size: 0.8rem">
                        @if ($datosSolicitud->tipo_analisis)
                            fisicoquímico
                        @endif
                    </th>

                </tr>
            </table>
            <br>
            <table style="margin: 0.3rem 0; border:0; text-align:center; font-size:0.8rem;">
                <tr>
                    <th colspan="4" style="border: 1px solid black">DATOS DE SOLICITANTE</th>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black">
                    <th>Procedencia de la muestra</th>
                    <td>{{ $datosSolicitud->user->informacionUsuario->procedencia }}</td>
                    <th>Solicitante</th>
                    <td>{{ $datosSolicitud->user->nombre }} {{ $datosSolicitud->user->apellido }}</td>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">
                    <th>Dirección de procedencia</th>
                    <td colspan="3">{{ $datosSolicitud->user->informacionUsuario->direccion }}</td>
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
                    <th>Fecha de análisis:</th>
                    <td>{{ \Carbon\Carbon::parse($resultados->tiempo)->isoFormat(
                        'dddd[,] D [de] MMMM [de]
                                            YYYY',
                        0,
                        'es',
                    ) }}
                    </td>
                </tr>
            </table>
            <br>

            <table style="margin: 0.3rem 0; border:0; text-align:center; font-size:0.8rem;">
                <tr>
                    <th colspan="5" style="border: 1px solid black">RESULTADO DE ENSAYO</th>
                </tr>
                <tr style="border-left: 1px solid black; border-right: 1px solid black; ">
                    <th>#</th>
                    <th>PARÁMETROS</th>
                    <th>UNIDADES</th>
                    <th>MÉTODO DE ENSAYOS</th>
                    <th>RESULTADO</th>

                </tr>
                <tr
                    style="border-left: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black; ">
                    <td style="height: 60px;">1</td>
                    <td style="height: 60px;">Actividad de agua</td>
                    <td style="height: 60px;"> -- </td>
                    <td style="height: 60px;">Interno</td>
                    <td style="height: 60px;">{{ $resultados->act_agua }}</td>
                </tr>

            </table>
            <br>
            <table>
                <tr>
                    <th style="text-align:left;">Notas:</th>
                </tr>
            </table>
            <table style="margin: 0.3rem 0; border:0; text-align:left; font-size:0.7rem;">
                <tr>
                    <th style="text-align:right; padding-right:10px">*:</th>
                    <td>Los parámetros no tienen límites de referencia, se recomienda al cliente tener en cuenta sus
                        datos historicos.</td>
                </tr>

            </table>
        </main>

        <table>
            <div class="footer" style="opacity: 1;">
                <div class="signature-box">
                    <div class="signer">
                        @if ($resultados->user_id == 20)
                            <img style="width: 60%" src="img/firma/fq_helen.png" alt="">
                        @endif
                        @if ($resultados->user_id == 24)
                            <img style="width: 60%" src="img/firma/fq_jennyS.png" alt="">
                        @endif
                        @if ($resultados->user_id == 32)
                            <img style="width: 60%" src="img/firma/fq_mescalera.png" alt="">
                        @endif
                        <div class="line">Analista de Fisicoquímico</div>
                    </div>
                    <div class="signer">
                        <img style="width: 60%" src="img/firma/rubenC.png" alt="">
                        <div class="line">Jefe de Calidad</div>
                    </div>
                </div>
            </div>
        </table>
        @if (
            $resultados->aer_mes > $normas->min_mes ||
                $resultados->col_tot > $normas->min_colTot ||
                $resultados->moh_lev > $normas->min_mohLev)
            <table
                style="position: absolute; top: 75%; left: 80%; transform: translate(-50%, -50%); text-align: center;">
                <img style="opacity: 0.8; width: 50%" src="img/sello_rechazado.png" alt="">
            </table>
        @endif
    </div>



</body>

</html>
