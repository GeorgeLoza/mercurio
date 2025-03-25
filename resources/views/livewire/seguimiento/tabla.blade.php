<div>
    <div class="flex gap-2">
        <button class="bg-green-500 rounded-md text-white  py-1.5 px-2 text-lg mb-2"
            onclick="Livewire.dispatch('openModal', { component: 'seguimiento.crear' })">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                <path
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
            </svg>
        </button>
        <button class="bg-green-500 rounded-md text-sm text-white py-1 px-2  mb-2 flex" wire:click="firmar">
            Confirmar RTS del {{ \Carbon\Carbon::now()->subDays(2)->format('d-m') }}

            @php
                use App\Models\Seguimiento;
                use Carbon\Carbon;
                $datos = Seguimiento::where(function ($query) {
                    $query->whereBetween('fechaSiembra', [
                        Carbon::now()->subDays(2)->startOfDay(),
                        Carbon::now()->subDays(2)->endOfDay(),
                    ]);

                    // Si hoy es lunes, también traemos los del día de hace 4 días
                    if (Carbon::now()->isMonday()) {
                        $query->orWhereBetween('fechaSiembra', [
                            Carbon::now()->subDays(3)->startOfDay(),
                            Carbon::now()->subDays(3)->endOfDay(),
                        ]);
                    }
                })

                    ->whereNull('usuario_rt')
                    ->get();

            @endphp
            @foreach ($datos as $dato)
                @if ($dato)
                    <span class="flex w-2 h-2 bg-orange-600 rounded-full  flex-shrink-0 mr-2 text-sm"></span>
                    @break
                @endif
            @endforeach



        </button>
        <button class="bg-green-500 rounded-md text-white py-1 px-2 text-sm mb-2 flex" wire:click="firmah">
            Confirmar MOHOS del {{ \Carbon\Carbon::now()->subDays(5)->format('d-m') }}



            @php

                $datos2 = Seguimiento::where(function ($query) {
                    $query->whereBetween('fechaSiembra', [
                        Carbon::now()->subDays(5)->startOfDay(),
                        Carbon::now()->subDays(5)->endOfDay(),
                    ]);

                    // Si hoy es lunes, también traemos los del día de hace 4 días
                    if (Carbon::now()->isMonday()) {
                        $query->orWhereBetween('fechaSiembra', [
                            Carbon::now()->subDays(6)->startOfDay(),
                            Carbon::now()->subDays(6)->endOfDay(),
                        ]);
                    }
                })
                    ->where('moho', 0)
                    ->whereNull('usuario_moho')
                    ->get();

            @endphp
            @foreach ($datos2 as $dato)
                @if ($dato)
                    <span class="flex w-2 h-2 bg-orange-600 rounded-full  flex-shrink-0 mr-2 text-sm"></span>
                    @break
                @endif
            @endforeach


        </button>
    </div>
    <div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        F. Siembra
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        ORP
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" >
                        Producto
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        Numero
                    </th>
                    <th scope="col" class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700" nowrap>
                        Cabezal
                    </th>


                    <th scope="col"
                        class="  gap-1 px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 9) hidden @endif ">
                        Aerobios <br> mesófilos


                    </th>
                    <th scope="col"
                        class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 9) hidden @endif"
                        nowrap>
                        Mohos y <br> levaduras
                    </th>


                    <th scope="col"
                        class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 9) hidden @endif"
                        nowrap>
                        Usuario <br> siembra
                    </th>
                    <th scope="col"
                        class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 9) hidden @endif"
                        nowrap>
                        Usuario <br> RTS
                    </th>
                    <th scope="col"
                        class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 9) hidden @endif"
                        nowrap>
                        Usuario <br> MOHO
                    </th>
                    <th scope="col"
                        class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 9) hidden @endif"
                        nowrap>
                        Observaciones M
                    </th>


                    <th scope="col"
                        class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 8) hidden @endif"
                        nowrap>
                        Temp.
                    </th>
                    <th scope="col"
                        class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 8) hidden @endif"
                        nowrap>
                        pH
                    </th>
                    <th scope="col"
                        class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 8) hidden @endif"
                        nowrap>
                        Usuario <br> FQ
                    </th>


                    <th scope="col"
                        class="px-1 py-3 sticky top-0 bg-white dark:bg-gray-700 @if (auth()->user()->role->id == 8) hidden @endif"
                        nowrap>
                        Observaciones FQ
                    </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($seguimientos as $seguimiento)
                    <tr class="text-center">

                        <td class=" px-1 py-1">
                            @if ($seguimiento->fechaSiembra)
                                {{ \Carbon\Carbon::parse($seguimiento->fechaSiembra)->isoFormat('DD-MM', 0, 'es') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class=" px-1 py-1">{{ $seguimiento->orp->codigo ?? '-' }}</td>
                        <td class=" px-1 py-1">{{ $seguimiento->orp->producto->nombre ?? '-' }}</td>
                        <td class=" px-1 py-1">{{ $seguimiento->numero ?? '-' }}</td>
                        <td class=" px-1 py-1">{{ $seguimiento->origen->alias ?? '-' }}</td>

                        @if (auth()->user()->role->id != 9)
                            <td class="px-1 py-1" nowrap>
                                <div class="flex justify-between items-center w-full">
                                    <div>
                                        @if ($seguimiento->rt >= 1000000)
                                            MNPC
                                        @elseif ($seguimiento->rt < 1000000 && $seguimiento->rt >= 10)
                                            {{ $seguimiento->rt < 1
                                                ? $seguimiento->rt * 10 ** (strlen(floor($seguimiento->rt)) - 1)
                                                : $seguimiento->rt / 10 ** (strlen(floor($seguimiento->rt)) - 1) }}
                                            x 10<sup>{{ strlen(floor($seguimiento->rt)) - 1 }}</sup>
                                        @elseif ($seguimiento->rt > 0)
                                            {{ $seguimiento->rt }}
                                        @elseif ($seguimiento->rt == 0)
                                            < 1 x 10<sup>1</sup>
                                            @elseif (is_null($seguimiento->rt))
                                                --
                                        @endif
                                    </div>
                                    <div class="flex gap-1 mr-2 ml-1">
                                        <svg onclick="Livewire.dispatch('openModal', { component: 'seguimiento.editar', arguments: { id: {{ $seguimiento->id }}, id2:1 } })"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-blue-600 dark:fill-blue-500 cursor-pointer"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                        </svg>

                                        <!-- Si tienes un segundo ícono SVG, lo agregas aquí -->
                                        {{-- <svg> Segundo ícono </svg> --}}
                                    </div>
                                </div>
                            </td>


                            <td class="px-1 py-1" nowrap>
                                <div class="flex justify-between items-center w-full">
                                    <div class="mr-1">
                                        @if ($seguimiento->moho >= 1000000)
                                            MNPC
                                        @elseif ($seguimiento->moho < 1000000 && $seguimiento->moho >= 10)
                                            {{ $seguimiento->moho < 1
                                                ? $seguimiento->moho * 10 ** (strlen(floor($seguimiento->moho)) - 1)
                                                : $seguimiento->moho / 10 ** (strlen(floor($seguimiento->moho)) - 1) }}
                                            x 10<sup>{{ strlen(floor($seguimiento->moho)) - 1 }}</sup>
                                        @elseif ($seguimiento->moho > 0)
                                            {{ $seguimiento->moho }}
                                        @elseif (is_null($seguimiento->moho))
                                            --
                                        @elseif ($seguimiento->moho == 0)
                                            < 1 x 10<sup>1</sup>
                                        @endif
                                    </div>
                                    <div class="flex gap-1 items-center mt-1">
                                        @if (is_null($seguimiento->moho))
                                        <svg wire:click="mohos1({{ $seguimiento->id }})"
                                            class="h-4 fill-green-500 cursor-pointer "
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z" />
                                        </svg>
                                        @endif


                                        @if (!is_null($seguimiento->moho))
                                        <svg wire:click="mohos2({{ $seguimiento->id }})"
                                            class="h-4 fill-red-500 cursor-pointer m-1 "
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>

                                        <svg onclick="Livewire.dispatch('openModal', { component: 'seguimiento.editar', arguments: { id: {{ $seguimiento->id }}, id2:2 } })"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 fill-blue-600 dark:fill-blue-500 cursor-pointer"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class=" px-1 py-1">



                                {{ substr($seguimiento->user1->nombre, 0, 1) .
                                    substr(explode(' ', $seguimiento->user1->nombre)[1] ?? '', 0, 1) .
                                    substr($seguimiento->user1->apellido, 0, 1) .
                                    substr(explode(' ', $seguimiento->user1->apellido)[1] ?? '', 0, 1) }}


                            </td>
                            <td class=" px-1 py-1">
                                @if ($seguimiento->user2)
                                    {{ substr($seguimiento->user2->nombre, 0, 1) .
                                        substr(explode(' ', $seguimiento->user2->nombre)[1] ?? '', 0, 1) .
                                        substr($seguimiento->user2->apellido, 0, 1) .
                                        substr(explode(' ', $seguimiento->user2->apellido)[1] ?? '', 0, 1) }}
                                @else
                                -
                                @endif
                            </td>


                            <td class=" px-1 py-1">
                                @if ($seguimiento->user3)
                                    {{ substr($seguimiento->user3->nombre, 0, 1) .
                                        substr(explode(' ', $seguimiento->user3->nombre)[1] ?? '', 0, 1) .
                                        substr($seguimiento->user3->apellido, 0, 1) .
                                        substr(explode(' ', $seguimiento->user3->apellido)[1] ?? '', 0, 1) }}
                                @else
                                -
                                @endif
                            </td>
                            <td class=" px-1 py-1">{{ $seguimiento->observaciones_micro ?? '-' }}</td>
                        @endif

                        @if (auth()->user()->role->id != 8)
                            <td class=" px-1 py-1">{{ $seguimiento->temperatura ?? '-' }}</td>
                            <td class=" px-1 py-1">{{ $seguimiento->ph ?? '-' }}</td>
                            <td class=" px-1 py-1">
                                @if ($seguimiento->user4)
                                    {{ substr($seguimiento->user4->nombre, 0, 1) .
                                        substr(explode(' ', $seguimiento->user4->nombre)[1] ?? '', 0, 1) .
                                        substr($seguimiento->user4->apellido, 0, 1) .
                                        substr(explode(' ', $seguimiento->user4->apellido)[1] ?? '', 0, 1) }}
                                @else
                                -
                                @endif
                            </td>
                            <td class=" px-1 py-1">{{ $seguimiento->observaciones_fq ?? '-' }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    <div class="mt-4">
        {{ $seguimientos->links() }}
    </div>
</div>
