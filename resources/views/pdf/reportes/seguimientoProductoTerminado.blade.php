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
            margin-bottom: 10px;
            margin-top: 10px; /* Margen superior para evitar que quede pegado al borde */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed; /* Fija el ancho de las columnas */
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 4px 4px; /* Reducir padding vertical (1px) y mantener horizontal (4px) */
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
            'Temperatura',
            'pH',
            'Acidez [%]',
            '°Bx',
            'Visc [seg]',
            'Color',
            'Olor',
            'Sabor',
            'Textura',
            'Analistas',
            'Análisis',
            'Fecha A.',
            'Hora',
            'Temperatura',
            'pH',
            'Acidez [%]',
            '°Bx',
            'Visc [seg]',
            'Color',
            'Olor',
            'Sabor',
            'Textura',
            'Analistas',
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
                        <th class="completo">Producto</th> <!-- Columna fija para los nombres de las filas -->
                        @foreach ($grupoColumnas as $columna)
                            @php
                                // Obtener el nombre del producto desde la relación
                                $nombreProducto = $columna['orp']['producto']['nombre'] ?? 'N/A';
                            @endphp
                            <th colspan="2" class="right">{{ $nombreProducto }}</th>
                            <!-- Encabezados dinámicos (divididos en 2 columnas) -->
                        @endforeach
                        <!-- Agregar columnas ficticias si es necesario -->
                        @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                            <th colspan="2"></th>
                        @endfor
                    </tr>
                    <tr>
                        <th class="completo">Orp (Prep)</th> <!-- Columna fija para los nombres de las filas -->
                        @foreach ($grupoColumnas as $columna)
                            @php
                                // Obtener el código ORP desde la relación
                                $codigoOrp = $columna['orp']['codigo'] ?? 'N/A';
                                $preparacion = $columna['preparacion'] ?? 'N/A';
                            @endphp
                            <th colspan="2" class="right">{{ $codigoOrp }} ({{ $preparacion }})</th>
                            <!-- Encabezados dinámicos (divididos en 2 columnas) -->
                        @endforeach
                        <!-- Agregar columnas ficticias si es necesario -->
                        @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                            <th colspan="2"> </th>
                        @endfor
                    </tr>
                    <tr>
                        <th class="completo">Fecha V.</th> <!-- Columna fija para los nombres de las filas -->
                        @foreach ($grupoColumnas as $columna)
                            @php
                                // Obtener la fecha de vencimiento desde la relación
                                $fechaVencimiento = \Carbon\Carbon::parse($columna['orp']['fecha_vencimiento1']);
                            @endphp
                            <th colspan="2" class="right">
                                @if ($fechaVencimiento == null)
                                    {{ $fechaVencimiento->format('d-m-Y') }}
                                @endif
                            </th>
                            <!-- Encabezados dinámicos (divididos en 2 columnas) -->
                        @endforeach
                        <!-- Agregar columnas ficticias si es necesario -->
                        @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                            <th colspan="2"></th>
                        @endfor
                    </tr>
                    <tr>
                        <th class="completo">Fecha A.</th> <!-- Columna fija para los nombres de las filas -->
                        @foreach ($grupoColumnas as $columna)
                            @php
                                // Obtener la fecha de elaboración desde la relación
                                $fechaElaboracion = \Carbon\Carbon::parse(now());
                            @endphp
                            <th colspan="2" class="right">{{ $fechaElaboracion->format('d-m-Y') }}</th> <!-- Encabezados dinámicos (NO divididos) -->
                        @endforeach
                        <!-- Agregar columnas ficticias si es necesario -->
                        @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                            <th colspan="2"></th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nombresFilas as $index => $nombreFila)
                        <tr>
                            <td class="right left">{{ $nombreFila }}</td> <!-- Nombre de la fila estática -->
                            @foreach ($grupoColumnas as $columna)
                                @if ($nombreFila === 'Análisis')
                                    <!-- Para las filas "Análisis", agregar títulos predeterminados -->
                                    <td class="completo">Ambiente</td>
                                    <td class="completo">Frío</td>
                                @elseif ($nombreFila === 'Fecha A.')
                                    <!-- Para la fila "Fecha A.", NO dividir la columna -->
                                    <td colspan="2" class="right">
                                        @php
                                            $fechaElaboracion = \Carbon\Carbon::parse(now());
                                        @endphp
                                        @if ($columna['orp']['producto']['destino_producto']['nombre'] == 'Comerciales')
                                            {{ $fechaMas7Dias = $fechaElaboracion->copy()->addDays(7)->format('d-m-Y') }}
                                        @else
                                            {{ $fechaMas3Dias = $fechaElaboracion->copy()->addDays(3)->format('d-m-Y') }}
                                        @endif
                                    </td>
                                @else
                                    <!-- Para las demás filas, dividir en 2 columnas -->
                                    <td></td>
                                    <td class="right"></td>
                                @endif
                            @endforeach
                            <!-- Agregar columnas ficticias si es necesario -->
                            @for ($i = count($grupoColumnas); $i < $columnasPorHoja; $i++)
                                <td></td>
                                <td></td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>

</html>
