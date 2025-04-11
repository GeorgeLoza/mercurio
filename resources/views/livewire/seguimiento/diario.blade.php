<div>
    <div class="mb-4">
        <label for="fecha" class="block text-sm font-medium">Seleccionar Fecha</label>
        <input type="date" wire:model.live="fecha" id="fecha"
            class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
    </div>

    @if ($tablaDatos)
        <div class="overflow-auto">
            <table class="min-w-full border border-gray-400 text-sm">
                <thead class="bg-gray-100 dark:bg-slate-700">
                    <tr>
                        <th class="border px-2 py-1">ORP</th>
                        <th class="border px-2 py-1">Producto</th>
                        @foreach ($cabezales as $alias)
                            <th class="border px-2 py-1">{{ $alias }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tablaDatos as $fila)
                        <tr>
                            <td class="border px-2 py-1">{{ $fila['codigo'] }}</td>
                            <td class="border px-2 py-1">{{ $fila['producto'] }}</td>
                            @foreach ($cabezales as $alias)
                                    @php
                                        $rt = $fila['data'][$alias]['rt'] ?? null;
                                        $moho = $fila['data'][$alias]['moho'] ?? null;
                                    @endphp
                                <td class="border px-2 py-1 text-center {{$rt>0 ? 'bg-red-500':''}} {{$moho>0 ? 'bg-red-500':''}}">
                                    @if (!is_null($rt))
                                        RT: {{ $rt }}/{{$fila['data'][$alias]['rt_total']   }}
                                        <br>
                                    @endif
                                    @if (!is_null($moho))
                                        MyL: {{ $moho }}/{{$fila['data'][$alias]['moho_total']   }}

                                    @endif



                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
