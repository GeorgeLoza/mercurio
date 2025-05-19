@if ($seguimiento->coli >= 1000000)
                                            MNPC
                                        @elseif ($seguimiento->coli < 1000000 && $seguimiento->coli >= 10)
                                            {{ $seguimiento->coli < 1
                                                ? $seguimiento->coli * 10 ** (strlen(floor($seguimiento->coli)) - 1)
                                                : $seguimiento->coli / 10 ** (strlen(floor($seguimiento->coli)) - 1) }}
                                            x 10<sup>{{ strlen(floor($seguimiento->coli)) - 1 }}</sup>
                                        @elseif ($seguimiento->coli > 0)
                                            {{ $seguimiento->coli }}

                                            @elseif (is_null($seguimiento->coli))
                                                --
                                            @elseif ($seguimiento->moho == 0)
                                                < 1 x 10<sup>1</sup>
                                        @endif
