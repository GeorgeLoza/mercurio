<div>
    <div class="p-4">
        <h2 class="text-lg font-semibold mb-4">Liberar Producto</h2>

        {{--  imprimir los ids de las orps --}}
        <div class="mb-4">
            @foreach ($orp_ids as $orp_id)
                @foreach ($htstdatos as $dato)
                    @if ($dato->rt != 0 || $dato->col != 0 || $dato->moho != 0)
                        <div class="text-red-500 font-bold">

                            CAB: {{ $dato->origen->alias }}
                            @if ($dato->rt != 0)
                                RT: {{ $dato->rt }}
                            @endif

                            @if ($dato->col != 0)
                                col: {{ $dato->col }}
                            @endif
                            @if ($dato->moho != 0)
                                moho: {{ $dato->moho }}
                            @endif
                            <br>

                        </div>
                    @endif
                @endforeach




                @foreach ($uhtdatos as $dato)
                    @if ($dato->rt != 0 || $dato->col != 0 || $dato->moho != 0)
                        <div class="text-red-500 font-bold">

                            CAB: {{ $dato->origen->alias }}
                            @if ($dato->rt != 0)
                                RT: {{ $dato->rt }}
                            @endif

                            @if ($dato->col != 0)
                                col: {{ $dato->col }}
                            @endif
                            @if ($dato->moho != 0)
                                moho: {{ $dato->moho }}
                            @endif
                            <br>

                        </div>
                    @endif
                @endforeach
            @endforeach

            <div class="mb-4">
                Numero de muestras :
                @if ($htstdatos->isNotEmpty())
                    {{ $htstdatos->count() }}
                @endif
                @if ($uhtdatos->isNotEmpty())
                    {{ $uhtdatos->count() }}
                @endif


                @if ($uht->isEmpty() && $htst->isEmpty())
                    <div class="text-red-600 font-bold">Liberación Extraordinaria</div>
                @else
                    <div class="text-green-600 font-bold">Liberación Regular</div>
                @endif
            </div>

            @error('orp_ids')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div class="mb-4">
                <label for="tipo" class="block text-sm font-medium  mb-1">Tipo de Liberación:</label>
                <select id="tipo" wire:model="tipo"
                    class="mt-1 block w-full border border-gray-300 dark:bg-gray-800 rounded-md shadow-sm p-2">
                    <option value="">Seleccione un tipo</option>
                    <option value="Regular">Regular</option>
                    <option value="Extraordinaria">Extraordinaria</option>

                </select>
                @error('tipo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button wire:click="$dispatch('closeModal')"
                    class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancelar</button>
                <button wire:click="guardar" class="bg-blue-600 text-white px-4 py-2 rounded">Liberar</button>
            </div>
        </div>
    </div>
