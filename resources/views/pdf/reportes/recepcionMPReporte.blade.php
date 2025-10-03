<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Recepcion MP</title>
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
            margin-bottom: 1.5cm;
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
            margin-top: 02px;
            margin-left: 200px;
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
<footer>
    SOALPRO SRL - Planta Lácteos - Reporte generado el {{ date('d/m/y') }}
    <div class="page-number"></div>
</footer>

<header>
    <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.6rem">
        <tr>
            <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
            <th style="width: 50%;">REGISTRO</th>
            <th style="width: 25%; font-size: 0.8rem">PLL-REG-060 <br> Versión 004 <br>
                <div class="page-number"></div>
            </th>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; padding: 0.6rem;  font-weight:bold;">INSPECCIÓN FÍSICA
                DETRANSPORTE Y REVISIÓN DE MATERIA E INSUMOS
            </td>
        </tr>
    </table>
</header>

<body>
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

        <main style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100px;">
            <table class="table-container  " style="  font-wheight:0">
                <thead>
                    <tr>
                        <th rowspan="2" style="border: 1px solid black;">FECHA</th>
                        <th rowspan="2" style="border: 1px solid black;">RESPONSABLE <br> CALIDAD</th>
                        <th rowspan="2" style="border: 1px solid black; white-space: nowrap;">MATERIA PRIMA O <br>
                            INSUMO</th>
                        <th rowspan="2" style="border: 1px solid black;">CANTIDAD</th>
                        <th rowspan="2"
                            style="border: 1px solid black; text-align: center;  margin: 0;  padding: 0; height: 90px ; width: 5px;">
                            <div style="transform: rotate(-90deg);  white-space: nowrap;  width: 20px;">
                                UNIDADES
                            </div>
                        </th>

                        <th rowspan="2" style="border: 1px solid black;">PROVEEDOR</th>
                        <th rowspan="2" style="border: 1px solid black;">MARCA</th>

                        <th rowspan="2"
                            style="border: 1px solid black; text-align: center;  margin: 0;  padding: 0; height: 80px ; width: 5px;">
                            <div style="transform: rotate(-90deg);  white-space: nowrap; font-size: 7px; width: 20px;">
                                LIMPIEZA DE <br> TRANSPORTE
                            </div>
                        </th>
                        <th rowspan="2"
                            style="border: 1px solid black; text-align: center;  margin: 0;  padding: 0; height: 90px ; width: 5px;">
                            <div style="transform: rotate(-90deg);  white-space: nowrap; font-size: 7px; width: 20px;">
                                SIN PRESENCIA DE <br> ELEMENTOS EXTRAÑOS
                            </div>
                        </th>
                        <th rowspan="2"
                            style="border: 1px solid black; text-align: center;  margin: 0;  padding: 0; height: 80px ; width: 5px;">
                            <div style="transform: rotate(-90deg);  white-space: nowrap; font-size: 7px; width: 20px;">
                                VEHÍCULO CERRADO <br> O CUBIERTO
                            </div>
                        </th>
                        <th colspan="3" style="border: 1px solid black;">IDENTIFICACIÓN DE ENVASE</th>
                        <th style="border: 1px solid black;">NIT</th>
                        <th rowspan="2"
                            style="border: 1px solid black; text-align: center;  margin: 0;  padding: 0; height: 80px ; width: 5px;">
                            <div style="transform: rotate(-90deg);  white-space: nowrap; font-size: 7px; width: 20px;">
                                CERTIFICADO <br>DE ANÁLISIS
                            </div>
                        </th>
                        <th rowspan="2" style="border: 1px solid black;">OBSERVACIÓN</th>
                        <th rowspan="2" style="border: 1px solid black;">CORRECCIÓN</th>
                    </tr>
                    <tr>

                        <th style="border: 1px solid black;">LOTE(S)</th>
                        <th style="border: 1px solid black;">F. ELAB</th>
                        <th style="border: 1px solid black;">F. VENC</th>
                        <th style="border: 1px solid black;">RS</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($variable as $variables)
                        <tr style=" font-size: 7px;">
                            <th nowrap>
                                {{ \Carbon\Carbon::parse($variables->tiempo)->isoFormat('DD-MM-YY', 0, 'es') }}
                            </th>
                            {{-- <th nowrap>

                                @if ($variables->almaceneroMateriaPrima->nombre)
                                    {{ $variables->almaceneroMateriaPrima->nombre }}
                                @endif
                            </th> --}}

                            <th nowrap>

                                @if ($variables->user->codigo)
                                    {{ $variables->user->codigo }}
                                @endif
                            </th>





                            <th style=" font-size: 7px;">
                                @if ($variables->itemMateriaPrima->nombre)
                                    {{ $variables->itemMateriaPrima->nombre }}
                                @endif
                            </th>
                            <th>
                                @if ($variables->cantidad)
                                    {{ $variables->cantidad / 1 }}
                                @endif
                            </th>
                            <th>
                                @if ($variables->itemMateriaPrima->unidad->abreviatura)
                                    [{{ $variables->itemMateriaPrima->unidad->abreviatura }}]
                                @endif
                            </th>
                            <th>
                                @if ($variables->proveedorMateriaPrima)
                                    {{ $variables->proveedorMateriaPrima->nombre }}
                                @endif
                            </th>
                            <th>
                                @if ($variables->marca)
                                    {{ $variables->marca }}
                                @endif
                            </th>
                            <th>

                                @if ($variables->limpieza_transporte == '0')
                                    NC
                                @else
                                    C
                                @endif

                            </th>
                            <th>

                                @if ($variables->sin_elementos == '0')
                                    NC
                                @else
                                    C
                                @endif

                            </th>
                            <th>

                                @if ($variables->cerrado == '0')
                                    NC
                                @else
                                    C
                                @endif

                            </th>
                            <th>
                                @foreach ($variables->lotes as $lote)
                                    {{ $lote->lote }} <br>
                                @endforeach
                            </th>
                            <th style=" white-space: nowrap;">
                                @foreach ($variables->lotes as $lote)
                                    {{ \Carbon\Carbon::parse($lote->fecha_elaboracion)->isoFormat('DD-MM-YY', 0, 'es') }}

                                    <br>
                                @endforeach
                            </th>
                            <th style=" white-space: nowrap;">
                                @foreach ($variables->lotes as $lote)
                                    {{ \Carbon\Carbon::parse($lote->fecha_vencimiento)->isoFormat('DD-MM-YY', 0, 'es') }}
                                    <br>
                                @endforeach
                            </th>

                            <th>

                                @if ($variables->nit == '0')
                                    NC
                                @else
                                    C
                                @endif


                                <br>

                                @if (
                                    $variables->itemMateriaPrima->categoria_materia_prima_id == 8 ||
                                        $variables->itemMateriaPrima->categoria_materia_prima_id == 17)
                                    @if ($variables->proveedorMateriaPrima->nombre == 'PREFORSA')
                                        @if ($variables->rs == '0')
                                            NC
                                        @else
                                            C
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                @else
                                    @if ($variables->rs == '0')
                                        NC
                                    @else
                                        C
                                    @endif
                                @endif

                            </th>
                            <th>

                                @if ($variables->certificado == '0')
                                    NC
                                @else
                                    C
                                @endif

                            </th>
                            <th style="font-size: 0.5rem; ; padding: 2px 4px;">

                                {{ $variables->observacion }}
                            </th>
                            <th style="font-size: 0.5rem;  padding: 2px 4px;">

                                {{ $variables->correccion }}
                            </th>








                        </tr>
                    @endforeach
                </tbody>


            </table>

            <div class="justify-end" style="padding-top: 2px">
                <p align="right">Referencias: NC: No Cumple </p>
                <p align="right">C: Cumple &nbsp; &nbsp; &nbsp;</p>
                <p align="right">N/A: No aplica &nbsp; </p>
            </div>



            <br>
            <br>
            <div style="page-break-inside: avoid; ">

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


                <!-- Aplica la clase "mi-tabla" solo a la tabla que deseas estilizar -->
                <table class="mi-tabla">
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuariosUnicos as $usuariosUnicoss)
                            <tr>
                                <td>{{ $usuariosUnicoss->codigo }}</td>
                                <td class="capitalize">
                                    {{ ucwords(strtolower($usuariosUnicoss->nombre . ' ' . $usuariosUnicoss->apellido)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <div class="signatures"
                    style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100px; ">
                    <div class="signature"
                        style="display: flex; justify-content: center; align-items: center; width: 100%; ">
                        <p><strong style=" border-top: 1px solid #000; padding-top: 3px; ">Jefe de Control de
                                Calidad</strong>
                        </p>
                    </div>
                </div>
            </div>


        </main>
    </div>



</body>

</html>
