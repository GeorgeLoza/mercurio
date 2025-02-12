<div>
    <div class="px-2 py-2 lg:px-8">
@if ($id2==1 || $id2==3)

<div class=" mb-8">
    <h3 class="mb-4 text-md font-medium text-gray-900 dark:text-white">Analisis
        Microbiologico - Dia 2 </h3>
    {{ $data->detalleSolicitudPlanta->tipo_muestra_id == 8 }}

    <form novalidate wire:submit="dia2">
        <!--para simples-->
        @if (
            $data->detalleSolicitudPlanta->solicitudPlanta->user->id == 49 &&
                $data->detalleSolicitudPlanta->tipoMuestra->id == 8)
            <h3 class="mb-2 text-md font-medium text-gray-900 dark:text-white">Analisis de
                Superficie</h3>
        @endif
        @if ($data->detalleSolicitudPlanta->tipoMuestra->id != 9 && $data->detalleSolicitudPlanta->tipoMuestra->id != 5)
            <div>
                <label for="aer_mes" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">
                    Aerobios mesófilos</label>
                <div class="flex gap-2">
                    <input type="number" step="0.01" name="aer_mes" id="aer_mes" wire:model.live="aer_mes"
                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder=" ">
                    <span class="w-1/3">
                        @if ($aer_mes >= 1000000)
                            MNPC
                        @elseif ($aer_mes < 1000000 && $aer_mes >= 1)
                            {{ $aer_mes < 1
                                ? $aer_mes * 10 ** (strlen(floor($aer_mes)) - 1)
                                : $aer_mes / 10 ** (strlen(floor($aer_mes)) - 1) }}
                            x 10
                            <sup>{{ strlen(floor($aer_mes)) - 1 }}</sup>
                        @elseif ($aer_mes === 0)
                            < 1 x 10<sup>1</sup>
                            @elseif (is_null($aer_mes))
                                -
                        @endif
                    </span>
                    <label class="ms-2 text-xs font-medium text-gray-900 dark:text-gray-300 w-1/3">
                        <input type="radio" wire:model.live="aer_mes" value="1000000"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        MNPC
                    </label>
                </div>
            </div>
        @endif

        @if ($data->detalleSolicitudPlanta->tipoMuestra->id != 2)
            <div>
                <label for="col_tot" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">
                    Coliformes totales</label>
                <div class="flex gap-2">
                    <input type="number" step="0.01" name="col_tot" id="col_tot" wire:model.live="col_tot"
                        placeholder=" "
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    <span class="w-1/3">
                        @if ($col_tot >= 1000000)
                            MNPC
                        @elseif ($col_tot < 1000000 && $col_tot >= 1)
                            {{ $col_tot < 1
                                ? $col_tot * 10 ** (strlen(floor($col_tot)) - 1)
                                : $col_tot / 10 ** (strlen(floor($col_tot)) - 1) }}
                            x 10
                            <sup>{{ strlen(floor($col_tot)) - 1 }}</sup>
                        @elseif ($col_tot === 0)
                            < 1 x 10<sup>1</sup>
                            @elseif (is_null($col_tot))
                                -
                        @endif
                    </span>
                    <label class="ms-2 text-xs font-medium text-gray-900 dark:text-gray-300 w-1/3">
                        <input type="radio" wire:model.live="col_tot" value="1000000"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        MNPC
                    </label>
                </div>

            </div>
        @endif
        @if (
            $data->detalleSolicitudPlanta->solicitudPlanta->user->id == 49 &&
                $data->detalleSolicitudPlanta->tipoMuestra->id == 8)
            <h3 class="mb-2 text-md font-medium text-gray-900 dark:text-white">Analisis de
                Profundidad</h3>
            <div>
                <label for="aer_mes2" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">
                    Aerobios mesófilos</label>
                <div class="flex gap-2">
                    <input type="number" step="0.01" name="aer_mes2" id="aer_mes2"
                        wire:model.live="aer_mes2"
                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder=" ">
                    <span class="w-1/3">
                        @if ($aer_mes2 >= 1000000)
                            MNPC
                        @elseif ($aer_mes2 < 1000000 && $aer_mes2 >= 1)
                            {{ $aer_mes2 < 1
                                ? $aer_mes2 * 10 ** (strlen(floor($aer_mes2)) - 1)
                                : $aer_mes2 / 10 ** (strlen(floor($aer_mes2)) - 1) }}
                            x 10
                            <sup>{{ strlen(floor($aer_mes)) - 1 }}</sup>
                        @elseif ($aer_mes2 === 0)
                            < 1 x 10<sup>1</sup>
                            @elseif (is_null($aer_mes2))
                                -
                        @endif
                    </span>
                    <label class="ms-2 text-xs font-medium text-gray-900 dark:text-gray-300 w-1/3">
                        <input type="radio" wire:model.live="aer_mes2" value="1000000"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        MNPC
                    </label>
                </div>
            </div>
            <div>
                <label for="col_tot2" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">
                    Coliformes totales</label>
                <div class="flex gap-2">
                    <input type="number" step="0.01" name="col_tot2" id="col_tot2"
                        wire:model.live="col_tot2" placeholder=" "
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    <span class="w-1/3">
                        @if ($col_tot2 >= 1000000)
                            MNPC
                        @elseif ($col_tot2 < 1000000 && $col_tot2 >= 1)
                            {{ $col_tot2 < 1
                                ? $col_tot2 * 10 ** (strlen(floor($col_tot2)) - 1)
                                : $col_tot2 / 10 ** (strlen(floor($col_tot2)) - 1) }}
                            x 10
                            <sup>{{ strlen(floor($col_tot2)) - 1 }}</sup>
                        @elseif ($col_tot2 === 0)
                            < 1 x 10<sup>1</sup>
                            @elseif (is_null($col_tot2))
                                -
                        @endif
                    </span>
                    <label class="ms-2 text-xs font-medium text-gray-900 dark:text-gray-300 w-1/3">
                        <input type="radio" wire:model.live="col_tot2" value="1000000"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        MNPC
                    </label>
                </div>

            </div>
        @endif


        <button type="submit"
            class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
            analisis</button>

    </form>
</div>
@endif



        @if ($id2   ==2|| $id2==3)

        <div class="">
            <h3 class="mb-4 text-md font-medium text-gray-900 dark:text-white">Analisis
                Microbiologico - Dia 5</h3>

            <form novalidate wire:submit="dia5">
                <div>
                    <input type="number" name="tipo" value="3" hidden>
                    <label for="moh_lev" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Mohos y
                        Levaduras - Superficie</label>
                    <div class="flex gap-2">
                        <input type="number" step="0.01" name="moh_lev" id="moh_lev" wire:model.live="moh_lev"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder=" ">
                        <span class="w-1/3">
                            @if ($moh_lev >= 1000000)
                                MNPC
                            @elseif ($moh_lev < 1000000 && $moh_lev >= 1)
                                {{ $moh_lev < 1
                                    ? $moh_lev * 10 ** (strlen(floor($moh_lev)) - 1)
                                    : $moh_lev / 10 ** (strlen(floor($moh_lev)) - 1) }}
                                x 10
                                <sup>{{ strlen(floor($moh_lev)) - 1 }}</sup>
                            @elseif ($moh_lev === 0)
                                < 1 x 10<sup>1</sup>
                                @elseif (is_null($moh_lev))
                                    -
                            @endif
                        </span>
                        <label class="ms-2 text-xs font-medium text-gray-900 dark:text-gray-300 w-1/3">
                            <input type="radio" wire:model.live="moh_lev" value="1000000"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            MNPC
                        </label>
                    </div>
                </div>
                @if (
                    $data->detalleSolicitudPlanta->solicitudPlanta->user->id == 49 &&
                        $data->detalleSolicitudPlanta->tipoMuestra->id == 8)
                    <div>
                        <input type="number" name="tipo" value="3" hidden>
                        <label for="moh_lev2" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Mohos
                            y
                            Levaduras - profundidad</label>
                        <div class="flex gap-2">
                            <input type="number" step="0.01" name="moh_lev2" id="moh_lev2"
                                wire:model.live="moh_lev2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder=" ">
                            <span class="w-1/3">
                                @if ($moh_lev2 >= 1000000)
                                    MNPC
                                @elseif ($moh_lev2 < 1000000 && $moh_lev >= 1)
                                    {{ $moh_lev2 < 1
                                        ? $moh_lev2 * 10 ** (strlen(floor($moh_lev2)) - 1)
                                        : $moh_lev2 / 10 ** (strlen(floor($moh_lev2)) - 1) }}
                                    x 10
                                    <sup>{{ strlen(floor($moh_lev2)) - 1 }}</sup>
                                @elseif ($moh_lev2 === 0)
                                    < 1 x 10<sup>1</sup>
                                    @elseif (is_null($moh_lev2))
                                        -
                                @endif
                            </span>
                            <label class="ms-2 text-xs font-medium text-gray-900 dark:text-gray-300 w-1/3">
                                <input type="radio" wire:model.live="moh_lev2" value="1000000"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                MNPC
                            </label>
                        </div>
                    </div>
                @endif

                <button type="submit"
                    class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                    analisis</button>

            </form>
        </div>
        @endif




    </div>
</div>
