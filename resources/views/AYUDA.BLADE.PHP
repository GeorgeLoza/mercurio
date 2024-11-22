        <div data-popover id="TKSC-analizar-popover" role="tooltip" class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKSC->proceso == 'Produccion' || $TKSC->proceso == 'Almacen')
                                    @foreach ($TKSC->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>

                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKSC->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKSC = $TKSC->solicitudAnalisisLinea[count($TKSC->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKSC->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKSC->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span
                                        class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKSC->analisisLinea->temperatura / 1 }}
                                    [°C]</p>
                                <p><Span
                                        class="inline-block w-32">pH</Span>:{{ $ultimo_TKSC->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span
                                        class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKSC->analisisLinea->acidez / 1 }}[%]
                                </p>
                                <p><Span
                                        class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKSC->analisisLinea->brix / 1 }}[°Bx]
                                </p>
                            @endif
                        </div>

                        

                    </div>