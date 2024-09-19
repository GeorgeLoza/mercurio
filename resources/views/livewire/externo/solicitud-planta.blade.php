<div class="overflow-x-auto">
    <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">#</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Fecha</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Código</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Estado</th>
                <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($solicitudes as $solicitud)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 ">
                    <td class="flex gap-3 items-center py-1">
                        <button wire:click="toggleCollapse({{ $solicitud->id }})" aria-expanded="{{ isset($openCollapse[$solicitud->id]) && $openCollapse[$solicitud->id] ? 'true' : 'false' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="fill-green-600 h-5 w-5">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg>
                        </button>
                        {{ $loop->iteration }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($solicitud->tiempo)->isoFormat('hh:mm DD/MM/YYYY') }}</td>
                    <td>{{ $solicitud->codigo }}</td>
                    <td>
                        @if ($solicitud->estado == 'Pendiente')
                            <span
                                class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $solicitud->estado }}</span>
                        @endif

                        @if ($solicitud->estado == 'Recibido')
                            <span
                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $solicitud->estado }}</span>
                        @endif

                        @if ($solicitud->estado == 'Cancelado')
                            <span
                                class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $solicitud->estado }}</span>
                        @endif
                    </td>
                    <td class="flex gap-4 justify-center">
                        <!--boton para generar pdf-->
                        <button wire:click="pdf_solicitud({{ $solicitud->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-red-500 w-4 h-4">
                                <path
                                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                            </svg>
                        </button>
                        @if (auth()->user()->rol != 'Ext')
                        <!--boton para confirmar la llegada-->
                        <button wire:click="recibido({{ $solicitud->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="fill-green-500 w-4 h-4">
                                <path
                                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                            </svg>
                        </button>    
                        @endif
                        
                        <!--boton para cancelar-->
                        <button wire:click="cancelar({{ $solicitud->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="fill-red-500 w-4 h-4">
                                <path
                                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                            </svg>
                        </button>

                    </td>
                </tr>

                <tr id="collapse-{{ $solicitud->id }}" class="{{ isset($openCollapse[$solicitud->id]) && $openCollapse[$solicitud->id] ? '' : 'hidden' }}">
                    <td colspan="5" class="px-4 py-2">
                        <table class="min-w-full bg-gray-50 border border-gray-200 dark:bg-gray-900">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Subcódigo</th>
                                    <th class="px-4 py-2">Item</th>
                                    <th class="px-4 py-2">Lote</th>
                                    <th class="px-4 py-2">Fecha de Eleboracion</th>
                                    <th class="px-4 py-2">Fecha de Vencimiento</th>
                                    <th class="px-4 py-2">Fecha de Muestreo</th>
                                    <th class="px-4 py-2">Tipo</th>
                                    <th class="px-4 py-2">Analisis</th>
                                    <th class="px-4 py-2">Estado</th>
                                    @if (auth()->user()->rol != 'Ext')
                                    <th class="px-4 py-2">acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitud->detalles as $detalle)
                                    <tr>
                                        <td class="px-1 py-1">{{ $detalle->subcodigo }}</td>
                                        <td class="px-1 py-1">
                                            @if ($detalle->productosPlanta)
                                                {{ $detalle->productosPlanta->nombre }}
                                            @else
                                                {{ $detalle->otro }}
                                            @endif
                                        </td>
                                        <td class="px-1 py-1">{{ $detalle->lote }}</td>

                                        <td class="px-1 py-1">
                                            {{ \Carbon\Carbon::parse($detalle->fecha_elaboracion)->isoFormat('DD/MM/YYYY') }}
                                        </td>
                                        <td class="px-1 py-1">
                                            {{ \Carbon\Carbon::parse($detalle->fecha_muestreo)->isoFormat('DD/MM/YYYY') }}
                                        </td>
                                        <td class="px-1 py-1">
                                            {{ \Carbon\Carbon::parse($detalle->fecha_vencimiento)->isoFormat('DD/MM/YYYY') }}
                                        </td>
                                        <td class="px-1 py-1">{{ $detalle->tipoMuestra->nombre }}</td>
                                        <td class="px-1 py-1">{{ $detalle->tipo_analisis }}</td>
                                        <td class="px-1 py-1">
                                            @if ($detalle->estado == 'Pendiente')
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $detalle->estado }}</span>
                                            @endif
                                            @if ($detalle->estado == 'Por Analizar')
                                            <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $detalle->estado }}</span>
                                            @endif
                                            @if ($detalle->estado == 'Analizando')
                                            <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $detalle->estado }}</span>
                                            @endif
                                            @if ($detalle->estado == 'Analizado')
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $detalle->estado }}</span>
                                            @endif
                                            @if ($detalle->estado == 'Terminado')
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $detalle->estado }}</span>
                                            @endif
                                            
                                        </td>
                                        @if (auth()->user()->rol != 'Ext')
                                        <td>
                                            <button wire:click="confirmar({{ $detalle->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="fill-green-500 w-4 h-4">
                                                    <path
                                                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                                                </svg>
                                            </button>
                                            <button wire:click="observado({{ $detalle->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="fill-red-500 w-4 h-4">
                                                    <path
                                                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                                                </svg>

                                            </button>
                                            <!--
                                            <button wire:click="edit({{ $detalle->id }})" class=""><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                </svg></button>
                                            <button wire:click="delete({{ $detalle->id }})" class=""><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 fill-red-600 dark:fill-red-500"
                                                    viewBox="0 0 448 512">
                                                    <path
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                </svg></button>
                                            -->
                                        </td>
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
