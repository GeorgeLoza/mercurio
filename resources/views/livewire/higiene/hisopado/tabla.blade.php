<div class="h-[80vh] " wire:poll.10s>
    <div class="flex h-[calc(100vh-20%)] ">
        <!-- Lado izquierdo -->

        <div
            class="w-2/3 bg-white dark:bg-slate-700 relative shadow-md sm:rounded-lg h-[calc(100vh-20%)] m-1  flex flex-col">

            <div class="text-center font-bold p-2">
                Hisopados
            </div>

            <!-- Scroll solo en esta parte -->
            <div class="flex-grow overflow-auto dark:bg-slate-900">
                <table class="w-full text-center ">
                    <thead class="dark:bg-slate-700">
                        <tr class="text-2xs">
                            <th>Número </th>
                            <th>Fecha <br> Muestra</th>
                            <th>Usuario <br> Muestra</th>
                            <th>Código</th>
                            <th>Personal</th>
                            <th>Usuario <br> Siembra</th>
                            <th>Fecha <br> Siembra</th>
                            <th>C. T. <br> [UFC/mano]</th>
                            <th>Usuario <br> Lectura</th>
                            <th>Fecha <br> Lectura</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-2xs dark:bg-gray-900 ">
                        @foreach ($hisopados as $hisopado)
                            <tr>
                                <td class="p-1">

                                    {{ $hisopado->id }}
                                </td>
                                <td class="p-1">

                                    {{ \Carbon\Carbon::parse($hisopado->fechaMuestra)->isoFormat('DD-MM-YY   ') }}
                                </td>
                                <td>
                                    @if ($hisopado->usuarioMuestrero)
                                        {{ substr($hisopado->usuarioMuestrero->nombre, 0, 1) .
                                            substr(explode(' ', $hisopado->usuarioMuestrero->nombre)[1] ?? '', 0, 1) .
                                            substr($hisopado->usuarioMuestrero->apellido, 0, 1) .
                                            substr(explode(' ', $hisopado->usuarioMuestrero->apellido)[1] ?? '', 0, 1) }}
                                    @endif
                                </td>
                                <td nowrap>{{ $hisopado->personal->codigo }}</td>
                                <td nowrap>{{ $hisopado->personal->nombre }}</td>
                                <td>
                                    @if ($hisopado->Siembra)
                                        {{ substr($hisopado->Siembra->nombre, 0, 1) .
                                            substr(explode(' ', $hisopado->Siembra->nombre)[1] ?? '', 0, 1) .
                                            substr($hisopado->Siembra->apellido, 0, 1) .
                                            substr(explode(' ', $hisopado->Siembra->apellido)[1] ?? '', 0, 1) }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>

                                    {{ $hisopado->fechaSiembra ? \Carbon\Carbon::parse($hisopado->fechaSiembra)->isoFormat('DD-MM-YY   ') : '--' }}

                                </td>
                                <td class="" nowrap>
                                    <div class="flex justify-center gap-1 items-center w-full">
                                        <div class="mr-2">
                                            @if ($hisopado->col >= 1000000)
                                                MNPC
                                            @elseif ($hisopado->col < 1000000 && $hisopado->col >= 10)
                                                {{ $hisopado->col < 1
                                                    ? $hisopado->col * 10 ** (strlen(floor($hisopado->col)) - 1)
                                                    : $hisopado->col / 10 ** (strlen(floor($hisopado->col)) - 1) }}
                                                x 10<sup>{{ strlen(floor($hisopado->col)) - 1 }}</sup>
                                            @elseif ($hisopado->col > 0)
                                                {{ $hisopado->col }}
                                            @elseif (is_null($hisopado->col))
                                                --
                                            @elseif ($hisopado->col == 0)
                                                < 1 x 10<sup>1</sup>
                                            @endif
                                        </div>

                                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 36)->where('permiso_id', 1)->isNotEmpty())
                                            @if (is_null($hisopado->fechaSiembra))
                                                <svg wire:click="sembrarnow({{ $hisopado->id }})"
                                                    class="h-4 fill-green-500 cursor-pointer "
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path
                                                        d="M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z" />
                                                </svg>
                                            @endif
                                            @if (!is_null($hisopado->fechaSiembra))
                                                <svg wire:click="dia5({{ $hisopado->id }})"
                                                    class="h-5 mr-2 ml-1 fill-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path
                                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                </svg>
                                                <svg onclick="Livewire.dispatch('openModal', { component: 'higiene.hisopado.editar', arguments: { id: {{ $hisopado->id }} } })"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 fill-blue-600 dark:fill-blue-500 cursor-pointer"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                                <td>

                                    @if ($hisopado->Lectura)
                                        {{ substr($hisopado->Lectura->nombre, 0, 1) .
                                            substr(explode(' ', $hisopado->Lectura->nombre)[1] ?? '', 0, 1) .
                                            substr($hisopado->Lectura->apellido, 0, 1) .
                                            substr(explode(' ', $hisopado->Lectura->apellido)[1] ?? '', 0, 1) }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    {{ $hisopado->fechaLectura ? \Carbon\Carbon::parse($hisopado->fechaLectura)->isoFormat('DD-MM-YY   ') : '--' }}
                                </td>
                                <td>{{ $hisopado->observacionSiembra }} <br> {{ $hisopado->observacionLectura }}</td>
                                {{-- boton eliminar --}}
                                <td>
                                    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 36)->where('permiso_id', 4)->isNotEmpty() ||
                                            (now()->diffInMinutes($hisopado->created_at) < 120 && auth()->user()->id == $hisopado->usuarioMuestrero->id))
                                        <button wire:click="eliminar({{ $hisopado->id }})"
                                            wire:confirm="Se eliminara el hisopado de {{ $hisopado->personal->codigo }}- {{ $hisopado->personal->nombre }} ?"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-10 fill-red-600 dark:fill-red-500" viewBox="0 0 448 512">
                                                <path
                                                    d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                            </svg>
                                        </button>
                                    @endif
                                </td>




                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Fijo al fondo -->
            <div class=" p-2">
                {{ $hisopados->links() }}
            </div>
        </div>


        <!-- Lado derecho con dos secciones -->
        <div class="w-1/3 h-[calc(100vh-20%)] flex flex-col mb-0 ">
            @if ($corregidos->isEmpty())
            @else
                <div class= "  bg-white dark:bg-slate-700 m-1 shadow-md sm:rounded-lg  ">
                    <div class="text-center  font-bold">
                        Correciones Pendientes
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="w-1/5">Código</th>
                                <th>Nombre</th>
                                <th>Supervisor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class=" text-2xs  dark:bg-gray-900 ">

                            @foreach ($corregidos as $personal)
                                <tr class="">
                                    <td class="px-2 py-1">{{ $personal->codigo }}</td>
                                    <td>{{ $personal->nombre }}</td>
                                    <td>{{ optional(optional($personal->hisopados()->latest()->first())->hisopadoCorreccions[0]->user)->nombre }}
                                    </td>
                                    <td>

                                        @if ($personal->hisopado == 'Capacitado')
                                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 36)->where('permiso_id', 1)->isNotEmpty())
                                                <button wire:click="hisopar({{ $personal->id }})"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-1  m-1 px-2 rounded">
                                                    Hisopar
                                                </button>
                                            @endif
                                        @elseif ($personal->hisopado == 'Correcion')
                                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 36)->where('permiso_id', 3)->isNotEmpty())
                                                <button wire:click="capacitar({{ $personal->id }})"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-1  m-1 px-2 rounded">
                                                    Capacitar
                                                </button>
                                            @endif
                                        @else
                                            <p class="text-red-500 font-bold py-1">

                                                Memorandum
                                            </p>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div
                class="  bg-white shadow-md sm:rounded-lg overflow-y-auto flex-1  mb-0  dark:bg-slate-700 m-1 scrollbar-hide   ">
                <div class="text-center  font-bold   sticky z-30 top-0 bg-white dark:bg-slate-700">
                    Personal <button wire:click="show_filtro">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-700 dark:fill-gray-300"
                            viewBox="0 0 512 512">
                            <path
                                d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                        </svg>
                    </button>
                </div>
                <table class="w-full ">
                    <thead>
                        <tr class="sticky z-20 top-5 dark:bg-gray-700 bg-white">
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class=" text-2xs  dark:bg-gray-900 ">
                        @if ($filtro == true)
                            <!-- fila de filtros -->
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 sticky z-20 top-9">



                                <th class="p-1 w-1/5">
                                    <input type="text" wire:model.live='f_codigo' placeholder="F. Codigo"
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th class="p-1">
                                    <input type="text" wire:model.live='f_nombre' placeholder="F. Nombre"
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                </th>
                                <th class="p-1 ">
                                    <select wire:model.live='f_turno'
                                        class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected class=" " value="">Turno</option>
                                        <option value="camacho"> R. Camacho</option>
                                        <option value="central"> Central</option>
                                        <option value="juan"> J. Vila </option>
                                        <option value="uht"> UHT</option>
                                        <option value="wilfredo"> W. Condori </option>
                                    </select>
                                </th>



                            </tr>
                        @endif
                        @foreach ($personales as $personal)
                            <tr>
                                <td class="px-2 py-1">{{ $personal->codigo }}</td>
                                <td>{{ $personal->nombre }}</td>
                                <td>
                                    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 36)->where('permiso_id', 1)->isNotEmpty())
                                        <button wire:click="hisopar({{ $personal->id }})"
                                            wire:confirm="Se hisopara {{ $personal->codigo }}- {{ $personal->nombre }} ?"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 m-1 px-2 rounded">
                                            Hisopar
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="p-2">
        <p class="mb-1">Descargar Reporte</p>



        <button class="bg-green-500 p-2 text-center rounded-md" wire:click="exportarExcel">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-5 w-5 fill-white">
                <path
                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z" />
            </svg>
        </button>
        <button class="bg-red-600 p-2 text-center rounded-md  gap-2" wire:click="generatePDFHisopados"
            wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
                <path
                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
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


    </div>
</div>
