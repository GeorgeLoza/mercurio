<!DOCTYPE html>
<html>

<head>
    <style>
        .row-header th {
            font-size: 5px;
    height: 40px; /* Establecer la altura máxima de las celdas */
    overflow: hidden; /* Ocultar el contenido que se desborde */
    text-overflow: ellipsis; /* Agregar puntos suspensivos si el contenido es demasiado largo */

}
        .completo {
            border: 2px solid black;

        }

        .right {
            border-right: 2px solid black;
        }

        .left {
            border-left: 2px solid black;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }

        .title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            /* Margen superior para evitar que quede pegado al borde */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
            table-layout: fixed; /* Fija el ancho de las columnas */
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 3px 4px; /* Reducir padding vertical (1px) y mantener horizontal (4px) */
            text-align: center;
            font-size: 8px;
            overflow: hidden; /* Evita que el contenido desborde */
            word-wrap: break-word; /* Permite dividir palabras largas */
            vertical-align: middle; /* Centra el contenido verticalmente */
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Altura fija para todas las filas */
        tr {
            height: 30px; /* Altura fija para todas las filas */
        }

        /* Doble altura para la primera fila del encabezado */
        thead tr:first-child th {
            height: 10px; /* Doble de altura (ajusta según sea necesario) */
        }

        /* Ajustes para la primera columna */
        th:first-child,
        td:first-child {
            width: 50px; /* Ancho pequeño para la primera columna */
            white-space: nowrap; /* Evita el salto de línea en la primera columna */
            padding-left: 8px; /* Más espacio horizontal a la izquierda */
            padding-right: 8px; /* Más espacio horizontal a la derecha */


        }

        /* Ancho fijo para las columnas dinámicas */
        th:not(:first-child),
        td:not(:first-child) {
            width: 100px; /* Ancho fijo para las demás columnas */
            white-space: normal; /* Permite el salto de línea */
        }

        /* Estilos específicos para la impresión */
        @media print {
            .table-container {
                height: 50vh; /* Cada tabla ocupa la mitad de la página */
                page-break-after: always; /* Forzar salto de página después de cada tabla */
            }

            .title {
                margin-top: 0; /* Elimina el margen superior en la impresión */
            }
        }
    </style>
</head>

<body>
    @php
        // Nombres de las 29 filas estáticas (renombradas)
        $nombresFilas = [
            'Análisis',
            'Hora',
            'Temp',
            'pH',
            'Acidez [%]',
            '°Brix',
            'Visc [seg]',
            'C-O-S-T',

            'Analistas',
            'Supervisor',
            'Análisis',
            'Fecha A.',
            'Hora',
            'Temp',
            'pH',
            'Acidez [%]',
            '°Brix',
            'Visc [seg]',
            'C-O-S-T',

            'Analistas',
            'Supervisor',
        ];

        // Dividir los datos en grupos de 6 columnas
        $columnasPorHoja = 6;
        $gruposDeColumnas = array_chunk($estadoDetalles->toArray(), $columnasPorHoja);
    @endphp

    @foreach ($gruposDeColumnas as $grupoIndex => $grupoColumnas)
        <!-- Contenedor para cada tabla -->
        <div class="table-container">
            <!-- Título dentro de cada tabla -->
            <div class="title">
                Reporte de Seguimiento de Producto Terminado - Pasteurizado

            </div>

            <table>
                <thead class="completo">
                    <tr class="row-header">
                        <th class="completo"colspan="3">Producto</th> <!-- Columna fija para los nombres de las filas -->
                        @foreach ($grupoColumnas as $columna)
                            @php
                                // Obtener el nombre del producto desde la relación
                                $nombreProducto = $columna['orp']['producto']['nombre'] ?? 'N/A';
                            @endphp
                            <th colspan="8" class="right">{{ $nombreProducto }}</th>
                            <!-- Encabezados dinámicos (divididos en 2 columnas) -->
                        @endforeach
                        <!-- Agregar columnas ficticias si es necesario -->
                        @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                            <th colspan="8  "></th>
                        @endfor
                    </tr>
                    <tr>
                        <th class="completo " colspan="3">Orp (Prep)</th> <!-- Columna fija para los nombres de las filas -->
                        @foreach ($grupoColumnas as $columna)
                            @php
                                // Obtener el código ORP desde la relación
                                $codigoOrp = $columna['orp']['codigo'] ?? 'N/A';
                                $preparacion = $columna['preparacion'] ?? 'N/A';
                            @endphp
                            <th colspan="8"class="right">{{ $codigoOrp }} ({{ $preparacion }})</th>
                            <!-- Encabezados dinámicos (divididos en 2 columnas) -->
                        @endforeach
                        <!-- Agregar columnas ficticias si es necesario -->
                        @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                            <th colspan="8  "> </th>
                        @endfor
                    </tr>
                    <tr>
                        <th class="completo" colspan="3">Fecha V.</th> <!-- Columna fija para los nombres de las filas -->
                        @foreach ($grupoColumnas as $columna)
                            @php
                                // Obtener la fecha de vencimiento desde la relación
                                $fechaVencimiento = \Carbon\Carbon::parse($columna['orp']['fecha_vencimiento1']);
                            @endphp
                            <th colspan="8" class="right">
                                @if ($fechaVencimiento != null)
                                    {{ $fechaVencimiento->format('d-m-Y') }}
                                @endif
                            </th>
                            <!-- Encabezados dinámicos (divididos en 2 columnas) -->
                        @endforeach
                        <!-- Agregar columnas ficticias si es necesario -->
                        @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                            <th colspan="8  "></th>
                        @endfor
                    </tr>
                    <tr>
                        <th class="completo" colspan="3">Fecha A.</th> <!-- Columna fija para los nombres de las filas -->
                        @foreach ($grupoColumnas as $columna)

                            <th colspan="8"     class="right">{{ $fecha->copy()->addDays(1)->format('d-m-Y') }}</th> <!-- Encabezados dinámicos (NO divididos) -->
                        @endforeach
                        <!-- Agregar columnas ficticias si es necesario -->
                        @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                            <th colspan="8"></th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nombresFilas as $index => $nombreFila)
                        <tr>
                            <td class="right left" colspan="3">{{ $nombreFila }}</td> <!-- Nombre de la fila estática -->
                            @foreach ($grupoColumnas as $columna)

                                @if ($nombreFila === 'Análisis')
                                    <!-- Para las filas "Análisis", agregar títulos predeterminados -->
                                    <td class="completo" colspan="4">Ambiente</td>
                                    <td class="completo" colspan="4">Frío</td>
                                @elseif ($nombreFila === 'Fecha A.')
                                    <!-- Para la fila "Fecha A.", NO dividir la columna -->
                                    <td colspan="8" class="right">
                                        @php
                                            $fechaElaboracion = \Carbon\Carbon::parse(now());
                                        @endphp
                                        @if ($columna['orp']['producto']['destino_producto']['nombre'] == 'Comerciales')
                                            {{ $fechaMas7Dias = $fecha->copy()->addDays(7)->format('d-m-Y') }}
                                        @else
                                            {{ $fechaMas3Dias = $fecha->copy()->addDays(3)->format('d-m-Y') }}
                                        @endif
                                    </td>
                                @elseif ($nombreFila === 'C-O-S-T')
                                    <td></td><td></td><td></td><td ></td><td></td><td></td><td></td><td class="right" ></td>
                                @else
                                    <!-- Para las demás filas, dividir en 2 columnas -->
                                    <td colspan="4"></td>
                                    <td class="right" colspan="4"></td>
                                @endif
                            @endforeach
                            <!-- Agregar columnas ficticias si es necesario -->
                            @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                                <td colspan="4 "></td>
                                <td colspan="4  "></td>
                            @endfor
                        </tr>
                    @endforeach
                    <tr><th colspan="3" class="right left">Obs:</th><th colspan="48" style="text-align: start;"></th></tr>
                </tbody>
            </table>
        </div>
    @endforeach
{{-- <br><br>
<br><br>
    <div style="padding-left: 300px; ">
        <strong
                style=" border-top: 1px solid #000; padding-top: 7px; padding-right: 25px; padding-left: 25px; ">
                REVISADO </strong>
        </div> --}}

</div>
</body>

</html>
