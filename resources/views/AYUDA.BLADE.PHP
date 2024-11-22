        <div data-popover id="TKAUX2-analizar-popover" role="tooltip" class="absolute z-50 invisible inline-block w-74 text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                @if ($TKAUX2->proceso == 'Produccion' || $TKAUX2->proceso == 'Almacen')
                                    @foreach ($TKAUX2->estadoDetalle as $item)
                                        <p class=" text-xs">{{ substr($item->orp->codigo, -5) }} -
                                            {{ $item->orp->producto->nombre }} {{ $item->preparacion }}</p>
                                    @endforeach
                                @endif
                            </h3>

                        </div>
                        <div class="px-3 py-2">
                            @if (count($TKAUX2->solicitudAnalisisLinea) > 0)
                                <p class="hidden">
                                    {{ $ultimo_TKAUX2 = $TKAUX2->solicitudAnalisisLinea[count($TKAUX2->solicitudAnalisisLinea) - 1] }}
                                </p>
                                <p><Span class="inline-block w-32">Estado Análisis</Span>: {{ $ultimo_TKAUX2->estado }}
                                    - {{ \Carbon\Carbon::parse($ultimo_TKAUX2->tiempo)->isoFormat('HH:mm') }}
                                </p>
                                <p><Span
                                        class="inline-block w-32">Temp.</Span>:{{ $ultimo_TKAUX2->analisisLinea->temperatura / 1 }}
                                    [°C]</p>
                                <p><Span
                                        class="inline-block w-32">pH</Span>:{{ $ultimo_TKAUX2->analisisLinea->ph / 1 }}
                                </p>
                                <p><Span
                                        class="inline-block w-32">Ac.</Span>:{{ $ultimo_TKAUX2->analisisLinea->acidez / 1 }}[%]
                                </p>
                                <p><Span
                                        class="inline-block w-32">Sólidos</Span>:{{ $ultimo_TKAUX2->analisisLinea->brix / 1 }}[°Bx]
                                </p>
                            @endif
                        </div>

                        

                    </div>