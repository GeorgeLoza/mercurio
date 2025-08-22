<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Control microbiologico de producto terminado uht</title>
    <style>
        @page {
            margin-top: 1cm;
            margin-bottom: 0cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }




        body {
            margin-top: 105px;
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
            padding-left: 2px;
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

        .right {
            border-right: 0.5px solid black;
        }

        .bottom {
            border-bottom: 0.5px solid black;
        }
    </style>

</head>

<header>
    <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.6rem">
        <tr>
            <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
            <th style="width: 50%;">REGISTRO</th>
            <th style="width: 25%; font-size: 0.8rem">PLL-REG-021 <br> Versión 002 <br>
                <div class="page-number"></div>
            </th>
        </tr>
        <tr>
            <td colspan="3"
                style="text-align: center; padding: 0.6rem;  font-weight:bold; text-transform: uppercase">
                Control microbiologico de producto terminado uht</td>
        </tr>
    </table>
</header>
<footer>
    SOALPRO SRL - Planta Lácteos - Reporte generado el {{ date('d/m/Y') }}
    <div class="page-number"></div>
</footer>

<body>
    <br>
    <div class="page">


        <fieldset>
            <legend style="font-weight:bold; text-transform: uppercase">Información General</legend>
            <div class="cont_div">
                <table class="general">
                    <tr>
                        <td>
                            <p>Fecha de Producción:
                                {{ \Carbon\Carbon::parse($orps->tiempo_elaboracion)->isoFormat('DD MMM YYYY', 0, 'es') }}
                            </p>
                            <p>ORP: <span>{{ $orps->codigo }}</span></p>
                            <p>Producto: {{ $orps->producto->nombre }}</p>
                        </td>
                        <td>

                            <p>Fecha(s) de Vencimiento:
                                @if ($orps->fecha_vencimiento1)
                                    {{ \Carbon\Carbon::parse($orps->fecha_vencimiento1)->isoFormat('DD MMM YYYY', 0, 'es') }}
                                @endif

                                @if ($orps->fecha_vencimiento2)
                                    -
                                    {{ \Carbon\Carbon::parse($orps->fecha_vencimiento2)->isoFormat('DD MMM YYYY', 0, 'es') }}
                                @endif

                            </p>
                            <p>Preparacion: {{ $orps->lote / 1 }} </p>

                            <p>Destino: {{ $orps->producto->destinoProducto->nombre }}</p>

                        </td>
                    </tr>

                </table>
            </div>
        </fieldset>


    </div>
    <div>
        <br>
        <br>

        <table class="table-container ">
            <thead>
                <tr>
                    <th class="border px-2 right" rowspan="2">LOTE</th>
                    <th class="border px-2 right" rowspan="2">NÚMERO</th>
                    @foreach ($origenes as $origenAlias)
                        <th class="border px-2 right" colspan="2">{{ $origenAlias }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($origenes as $origenAlias)
                        <th class="border px-2">RT</th>
                        <th class="border px-2 right">MyL</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($seguimientos as $numero => $items)
                    <tr>
                        <td class="right">{{ $items->first()->lote }}</td>
                        <td class="right ">{{ $numero }}</td>

                        @foreach ($origenes as $origenId => $origenAlias)
                            @php
                                $item = $items->firstWhere('origen_id', $origenId);
                            @endphp
                            @if ($item)
                                @if (!is_null($item->rt))
                                    <td class="border px-2 text-sm">
                                        {{ $item->rt ?? '-' }}
                                    </td>
                                @else
                                    <td>-</td>
                                @endif

                                @if (!is_null($item->moho))
                                    <td class="right">

                                        {{ $item->moho ?? '-' }}
                                    </td>
                                @else
                                    <td class="right">-</td>
                                @endif
                            @else
                                <td>

                                    -
                                </td>
                                <td class="right">

                                    -
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach



            </tbody>
        </table>
        <br>
        <br>
        <table class="table-container">
            <tr>

                @foreach ($origenes as $origenAlias)
                    <th class="border px-2 right" colspan="2">{{ $origenAlias }}</th>
                @endforeach
            </tr>
            <tr>
                @foreach ($origenes as $origenAlias)
                    <th class="border px-2">RT</th>
                    <th class="border px-2 right">MyL</th>
                @endforeach
            </tr>

            <tr>

                @foreach ($origenes as $origenAlias)
                    @php
                        $origen = collect($conteoPorOrigen)->firstWhere('alias', $origenAlias);
                    @endphp

                    @if ($origen)
                        <th>{{ $origen['con_espacio_rt'] }}/{{ $origen['total'] }}</th>
                        <th class="right">{{ $origen['con_moho'] }}/{{ $origen['con_moho2'] }}</th>
                    @else
                        <th>-</th>
                        <th class="right">-</th>
                    @endif
                @endforeach


            </tr>




        </table>

    </div>
    <br>
    <br>

    <div>
        <div style=" display: flex; justify-content: flex-end;  page-break-inside: avoid; ">





            <!-- Aplica la clase "mi-tabla" solo a la tabla que deseas estilizar -->
            <div>
                <table class="table-container">

                    <tr>
                        <th class="p-2 border">USUARIO SIEMBRA</th>
                        <th class="p-2 border">USUARIOS LECTURA 2 DÍAS</th>
                        <th class="p-2 border">USUARIOS LECTURA 5 DÍAS</th>
                    </tr>

                    <tbody>
                        @php
                            $maxCount = max($usuariosSiembra->count(), $usuariosRt->count(), $usuariosMoho->count());
                        @endphp
                        @for ($i = 0; $i < $maxCount; $i++)
                            <tr>
                                <td class="p-2 border">

                                    {{ ucwords(strtolower($usuariosSiembra[$i]->nombre ?? '')) }}


                                    <span
                                        class="text-gray-500">{{ ucwords(strtolower($usuariosSiembra[$i]->apellido ?? '')) }}</span>
                                </td>
                                <td class="p-2 border">
                                    {{ ucwords(strtolower($usuariosRt[$i]->nombre ?? '')) }}

                                    <span class="text-gray-500">
                                        {{ ucwords(strtolower($usuariosRt[$i]->apellido ?? '')) }}</span>
                                </td>
                                <td class="p-2 border">
                                    {{ ucwords(strtolower($usuariosMoho[$i]->nombre ?? '')) }}

                                    <span class="text-gray-500">
                                        {{ ucwords(strtolower($usuariosMoho[$i]->apellido ?? '')) }}</span>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>





        </div>



        <div style="padding-left: 500px; padding-top: 150px;  ">
            <strong style=" border-top: 1px solid #000; padding-top: 7px; padding-right: 25px; padding-left: 25px; ">
                REVISADO </strong>
        </div>



    </div>





</body>

</html>
