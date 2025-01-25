<div wire:poll.7s>
    <div>
        <h3 class="text-xl font-bold mb-4">Cantidad Actual por Ítems:</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($totalesPorItem as $datos)
                <div
                    class="border rounded-lg shadow p-4 transition-colors
                           bg-white dark:bg-gray-800
                           text-gray-900 dark:text-white ">
                    <h4 class="text-lg font-semibold">{{ $datos['codigo'] }} - {{ $datos['nombre'] }}</h4>
                    <p class="text-gray-600 dark:text-gray-400">
                        Cantidad Actual: <span class="font-bold">{{ $datos['cantidad_actual'] }}
                            [{{ $datos['unidad'] }}]</span>
                    </p>
                    @if ($datos['ultimo_egreso'])
                        <p class="text-gray-600 dark:text-gray-400 text-xs">
                            Último Egreso:
                            <span class="font-bold">{{ $datos['ultimo_egreso']['cantidad'] / 1 }}
                                [{{ $datos['unidad'] }}]</span>
                            ({{ \Carbon\Carbon::parse($datos['ultimo_egreso']['fecha'])->format('d-m-Y') }})
                        </p>
                    @else
                        <p class="text-gray-600 dark:text-gray-400 text-xs">
                            Último Egreso: <span class="italic">No disponible</span>
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>



    <div class="p-4">
        <h2 class="text-lg font-semibold mb-4">Movimientos</h2>

        <!-- Tabla de movimientos -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-2">Código</th>
                    <th scope="col" class="px-4 py-2">Usuario</th>
                    <th scope="col" class="px-4 py-2">Tipo</th>
                    <th scope="col" class="px-4 py-2">Estado</th>
                    <th scope="col" class="px-4 py-2">Fecha</th>
                    <th scope="col" class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $mov)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-2">SUS-{{ $mov->id }}</td>
                        <td class="px-4 py-2">{{ $mov->user->nombre }} {{ $mov->user->apellido }}</td>

                        <td class="px-4 py-2">
                            @if ($mov->tipo == 1)
                                <div class="flex ">

                                    <svg class="h-4 w-4 fill-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512">
                                        <path
                                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2 160 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-306.7L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                                    </svg>

                                    Entrada
                                </div>
                            @else
                                <div class="flex ">
                                    <svg class="h-4 w-4 fill-red-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512">
                                        <path
                                            d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                    </svg>

                                    Salida
                                </div>
                            @endif
                        </td>
                        <td
                            class="px-4 py-2 font-bold uppercase
                        @if ($mov->estado == 'Entregado') text-green-500 @endif
                        @if ($mov->estado == 'Denegado') text-red-500 @endif
                        @if ($mov->estado == 'Autorizado') text-yellow-500 @endif
                        @if ($mov->estado == 'Solicitado') text-blue-500 @endif


                        ">
                            {{ $mov->estado }}</td>
                        <td class="px-4 py-2">
                            {{ \Carbon\Carbon::parse($mov->tiempo)->format('d-m-Y H:m') }}


                        </td>
                        <td class="px-4 py-2 flex space-x-2">
                            <!-- Botón para ver/ocultar detalles -->
                            <button wire:click="toggleDetalles({{ $mov->id }})"
                                class="bg-blue-500 text-white px-2 py-1 rounded-md">
                                {{ isset($detallesAbiertos[$mov->id]) ? 'Ocultar' : 'Ver detalles' }}
                            </button>



                            @if ($mov->tipo == 0)


                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 30)->where('permiso_id', 1)->isNotEmpty())
                                    @if ($mov->estado != 'Entregado')
                                        @if ($mov->estado != 'Autorizado' && now()->diffInMinutes($mov->created_at) < 1440)
                                            <!-- Botón para autorizado -->
                                            <button wire:click="cambiarEstado1({{ $mov->id }})"
                                                class="bg-green-500 text-white px-2 py-1 rounded-md">
                                                Autorizar
                                            </button>
                                        @endif

                                        @if ($mov->estado != 'Denegado' && now()->diffInMinutes($mov->created_at) < 1440)
                                            <!-- Botón para denegado -->
                                            <button wire:click="cambiarEstado2({{ $mov->id }})"
                                                class="bg-red-500 text-white px-2 py-1 rounded-md">
                                                Denegar
                                            </button>
                                        @endif
                                    @endif
                                @endif


                                @if ($mov->estado == 'Autorizado')
                                @if (auth()->user()->role->id == 7 || auth()->user()->role->id == 1)

                                        <!-- Botón para entregado -->
                                        <button
                                            onclick="Livewire.dispatch('openModal', { component: 'sustancias.movimiento', arguments: { id: {{ $mov->id }} } })"
                                            class="bg-yellow-500 text-white px-2 py-1 rounded-md">
                                            Finalizar
                                        </button>
                                    @endif
                                @endif

                            @endif



                        </td>
                    </tr>
                    @if (isset($detallesAbiertos[$mov->id]))
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <td colspan="6" class="px-4 py-2">
                                <h3 class="text-md font-semibold "></h3>
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-4 py-2">Item</th>
                                            <th scope="col" class="px-4 py-2">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mov->detalleMovs as $detalle)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-4 py-2">
                                                    {{ $detalle->item->codigo }} - {{ $detalle->item->nombre }}
                                                </td>
                                                <td class="px-4 py-2">{{ $detalle->cantidad / 1 }}
                                                    [{{ $detalle->item->unidad }}]</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $movimientos->links() }}
        </div>
    </div>


    <div class="p-2">


        <p class="mb-1">Descargar Reporte de salidas de sustancias</p>

        <button class="bg-red-600 p-2 text-center rounded-md  gap-2" wire:click="PDFSustancias"
            wire:loading.attr="disabled" >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
                <path
                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
            </svg>



        </button>

        <button class="bg-green-500 p-2 text-center rounded-md" wire:click="exportarExcel">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-5 w-5 fill-white">
                <path
                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z" />
            </svg>
        </button>

        <!-- Campo de fecha inicio -->
        <label for="fechaInicio">Fecha Inicio:</label>
        <input type="date" id="fechaInicio" class="rounded p-1 text-black" wire:model.defer="fechaInicio">
        @error('fechaInicio')
            <span class="text-red-500 text-base">{{ $message }}</span>
        @enderror

        <!-- Campo de fecha fin -->
        <label for="fechaFin">Fecha Fin:</label>
        <input type="date" id="fechaFin" class="rounded p-1 text-black" wire:model.defer="fechaFin">
        @error('fechaFin')
            <span class="text-red-500 text-base">{{ $message }}</span>
        @enderror

        <!-- Campo de filtro por ruta -->
        <label for="ruta">Sustancia:</label>
        <select id="ruta" class="rounded p-1 mx-2 bg-white text-black" wire:model.defer="ruta">
            <option value="">Seleccionar Sustancia</option>
            @foreach ($rutas as $ruta)
                <option value="{{ $ruta }}">{{ $ruta }}</option>
            @endforeach
        </select>
    </div>



</div>
