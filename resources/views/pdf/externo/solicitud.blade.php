<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOLICITUD DE ANÁLISIS DE LABORATORIO</title>

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
                    <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
                    <th style="width: 50%;">REGISTRO</th>
                    <th style="width: 25%; font-size: 0.8rem">PLL-REG-143 <br> Version 003 <br> Pagina 1 de 1 </th>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding: 0.5rem 0">SOLICITUD DE ANÁLISIS DE LABORATORIO
                    </td>
                </tr>
            </table>
        </head>

        <main>
            <table style="margin: 0.3rem 0; border:0; text-align:center; font-size:0.8rem;">
                <tr>
                    <th>Fecha:</th>
                    <td>{{ \Carbon\Carbon::parse($solicitud->tiempo)->format('d / M / y') }}</td>
                    <th>Código:</th>
                    <td style="font-size: 0.8rem; text-decoration: underline; font-weight: bold">
                        {{ $solicitud->codigo }}
                    </td>
                </tr>
                <tr>
                    <th>Planta:</th>
                    <td>{{ $solicitud->user->planta->nombre }}</td>
                    <th>Responsable:</th>
                    <td>{{ $solicitud->user->nombre }} {{ $solicitud->user->apellido }}</td>
                </tr>
            </table>
        </main>
        <div>
            <table class="cuerpo">
                @foreach ($detalles as $index => $detalle)
                    <tr style="border: 1px solid black;">
                        <td>
                            <p style="font-weight: bold; font-size: 1rem;white-space: nowrap;">{{ $detalle->subcodigo }}
                            </p>
                        </td>
                        <td>
                            <p>
                                @if ($detalle->productosPlanta)
                                    {{ $detalle->productosPlanta->nombre }}
                                @else
                                    {{ $detalle->otro }}
                                @endif
                            </p>
                            <p style="font-weight: bold">Lote: {{ $detalle->lote }}</p>
                        </td>
                        <td>
                            <p style="font-weight: bold; white-space: nowrap;">Fecha de Elab.: </p>
                            <p style="font-weight: bold; white-space: nowrap;">Fecha de Ven.: </p>
                            <p style="font-weight: bold; white-space: nowrap;">Fecha de Muestra.: </p>
                        </td>
                        <td>
                            <p>
                                @if ($detalle->fecha_elaboracion)
                                    {{ \Carbon\Carbon::parse($detalle->fecha_elaboracion)->format('d/m/y') }}
                                @else
                                    -
                                @endif
                            </p>
                            <p>
                                @if ($detalle->fecha_vencimiento)
                                    {{ \Carbon\Carbon::parse($detalle->fecha_vencimiento)->format('d/m/y') }}
                                @else
                                    -
                                @endif
                            </p>
                            <p>
                                @if ($detalle->fecha_muestreo)
                                    {{ \Carbon\Carbon::parse($detalle->fecha_muestreo)->format('d/m/y') }}
                                @else
                                    -
                                @endif
                            </p>
                        </td>
                        <td>
                            <p style="font-weight: bold">Envase: </p>
                            <p style="font-weight: bold">Tipo: </p>
                            <p style="font-weight: bold">Analisis: </p>
                        </td>
                        <td>
                            <p>

                                @if ($detalle->productosPlanta)
                                    {{ $detalle->productosPlanta->envase }}
                                @else
                                    -
                                @endif
                            </p>
                            <p>
                                @if ($detalle->tipoMuestra)
                                    {{ $detalle->tipoMuestra->nombre }}
                                @else
                                    -
                                @endif
                            </p>
                            <p style="font-weight: bold; font-size: 0.8rem">{{ $detalle->tipo_analisis }}</p>
                        </td>

                    </tr>
                @endforeach

            </table>
        </div>

        <div class="footer">
            <div class="signature-box">
                <div class="signer">
                    Solicitante
                </div>
                <div class="signer">
                    Recibido
                </div>
            </div>
        </div>
    </div>

    <div style="page-break-before: always"></div>
    <div class="page">
        <table style="text-align: center; width: 100%;">
            @for ($i = 0; $i < count($detalles); $i += 5)
                <tr>
                    @for ($j = $i; $j < min($i + 5, count($detalles)); $j++)
                        <td style="border: 1px dotted black; padding: 10px;">
                            <p style="font-weight: bold; font-size: 1rem; white-space: nowrap;">
                                {{ $detalles[$j]->subcodigo }}</p>
                            <p style="font-weight: bold; font-size: 1rem; white-space: nowrap;">
                                {{ $detalles[$j]->tipo_analisis }}</p>
                            <p style="font-size: 0.7rem;">
                                @if ($detalles[$j]->productosPlanta)
                                    {{ $detalles[$j]->productosPlanta->nombre }}
                                @else
                                    {{ $detalles[$j]->otro }}
                                @endif
                            </p>
                            <p style="font-size: 0.8rem; white-space: nowrap;">Lote: {{ $detalles[$j]->lote }}</p>
                        </td>
                    @endfor
                </tr>
            @endfor
        </table>
    </div>

</body>

</html>
