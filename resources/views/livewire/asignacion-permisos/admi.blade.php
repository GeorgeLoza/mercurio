<div>
    <hr class="my-1">

    <h2 class="text-xl font-semibold mb-4">Asignaciones realizadas</h2>
    <div class="overflow-auto">
        @php
            // Agrupar por rol y módulo
            $agrupado = [];
            foreach ($asignaciones as $asig) {
                $rol = $asig->rol->name ?? 'Sin Rol';
                $modulo = $asig->modulo->name ?? 'Sin Módulo';
                $permiso = $asig->permiso->name ?? 'Sin Permiso';
                $agrupado[$rol][$modulo][] = $permiso;
            }
        @endphp

        <div class="space-y-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($agrupado as $rol => $modulos)
                <div>
                    <div class="text-xs font-bold text-blue-700 mb-1 uppercase tracking-wide">{{ $rol }}</div>
                    <table class="min-w-full bg-white mb-1 text-2xs">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-2 py-1 text-left font-medium">Módulo</th>
                                <th class="px-2 py-1 text-left font-medium">Permisos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modulos as $modulo => $permisos)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="px-2 py-1 font-semibold">{{ $modulo }}</td>
                                    <td class="px-2 py-1">
                                        @foreach ($permisos as $permiso)
                                            <span
                                                class="inline-block bg-green-100 text-green-800 text-2xs px-1.5 py-0.5 rounded mr-1 mb-1">{{ $permiso }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</div>
