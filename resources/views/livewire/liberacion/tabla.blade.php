<div class="p-4">


    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 1)->isNotEmpty())
        <button class="bg-green-500 rounded-md text-white  py-1.5 px-2 text-lg mb-2"
            onclick="Livewire.dispatch('openModal', { component: 'liberacion.crear' })">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                <path
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
            </svg>
        </button>
    @endif
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="p-2 text-left">Producto</th>
                <th class="p-2 text-left">ORP</th>
                <th class="p-2 text-left">Fecha de Vencimiento</th>
                <th class="p-2 text-left">Lote</th>
                <th class="p-2 text-left">Fecha analisis</th>
                <th class="p-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($liberaciones as $liberacion)
                <tr
                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-2">{{ $liberacion->orp->producto->nombre }}</td>
                    <td class="p-2">{{ $liberacion->orp->codigo ?? '—' }}</td>
                    <td class="p-2">{{ $liberacion->orp->fecha_vencimiento1 ?? '—' }}</td>
                    <td class="p-2">{{ $liberacion->orp->tiempo_elaboracion }}</td>
                    <td class="p-2">{{ $liberacion->created_at ?? '-' }}</td>
                    <td class="p-2 flex ">
                        <button class="p-1 px-2 mr-2 ml-2 bg-blue-500 rounded-md"
                                onclick="Livewire.dispatch('openModal', { component: 'liberacion.detalle', arguments: { id: {{ $liberacion->id }} } })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                </svg>
                            </button>

                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 1)->isNotEmpty())
                            <button class="p-1 px-2 mr-2 ml-2 bg-green-500 rounded-md"
                                onclick="Livewire.dispatch('openModal', { component: 'liberacion.agregar', arguments: { id: {{ $liberacion->id }} } })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                </svg>
                            </button>
                        @endif

                    </td>
                </tr>

                
            @endforeach
        </tbody>
    </table>
    <!-- Tabla aquí arriba... -->

    <div class="mt-4">
        {{ $liberaciones->links() }}
    </div>

</div>
