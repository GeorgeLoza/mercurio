<div>


    <div>
        <div class="overflow-x-auto overflow-y-auto">
            <!--Tabla de fisico-->

            <table class="w-full  text-xs text-center text-gray-500 dark:text-gray-400 items-center justify-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-0 py-0">
                            Código
                        </th>

                        <th scope="col" class="px-0 py-0">
                            Fecha
                        </th>
                        <th scope="col" class="px-1 py-0">
                            Producto
                        </th>
                        <th scope="col" class="px-1 py-0">
                            Lote
                        </th>
                        <th scope="col" class="px-1 py-0">
                            Tipo
                        </th>
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                            <th scope="col" class="px-1 py-0">
                                Planta
                            </th>
                            <th scope="col" class="px-1 py-0">
                                Temp.
                            </th>
                            <th scope="col" class="px-1 py-0">
                                %Hr
                            </th>
                            <th scope="col" class="px-1 py-0">
                                Aw
                            </th>
                        @endif
                        <th scope="col" class="px-1 py-0">
                            Estado
                        </th>
                        <th scope="col" class="px-1 py-0">
                            Opciones
                        </th>

                    </tr>
                    <tr>

                        <th scope="col" class="px-1 py-0    flex justify-center">
                            <input type="text" id="" wire:model.live='f_codigo'
                                class="w-20 bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th></th>
                        <th scope="col" class="px-1 py-0 flex justify-center">
                            <input type="text" id="" wire:model.live='f_producto'
                                class="bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th scope="col" class="px-1 py-0 ">
                            <input type="text" id="" wire:model.live='f_lote'
                                class="w-16 bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                            <th scope="col" class="px-1 py-0">

                            </th>
                            <th scope="col" class="px-1 py-0">
                                <input type="text" id="" wire:model.live='f_planta'
                                    class="w-24 bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="">
                            </th>
                            <th scope="col" class="px-1 py-0">

                            </th>
                            <th scope="col" class="px-1 py-0">

                            </th>
                        @endif
                        <th scope="col" class="px-1 py-0">

                        </th>
                        <th scope="col" class="px-1 py-0 flex justify-center">
                            <input type="text" id="" wire:model.live='f_estado'
                                class="w-24 bg-gray-50 border border-gray-300 text-gray-600 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </th>
                        <th scope="col" class="px-1 py-0">

                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($fisicos as $index => $fis)
                        <tr
                            class="b-500 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td scope="row"
                                class="px-1 py-0 font-medium text-gray-900 whitespace-nowrap dark:text-white" nowrap>
                                {{ $fis->subcodigo }}</td>
                            <td scope="row"
                                class="px-1 py-0 font-medium text-gray-900 whitespace-nowrap dark:text-white" nowrap>
                                {{ \Carbon\Carbon::parse($fis->solicitudPlanta->tiempo)->isoFormat('DD-MM-YY', 0, 'es') }}

                            </td>

                            <td class="px-1 py-0" nowrap>


                                @if ($fis->productosPlanta)
                                    {{ $fis->productosPlanta->nombre }}
                                @else
                                    {{ $fis->otro }}
                                @endif

                            </td>
                            <td class="px-1 py-0">{{ $fis->lote }}</td>
                            <td class="px-1 py-0" nowrap>{{ $fis->tipoMuestra->nombre }}
                            </td>
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                                <td class="px-1 py-0" nowrap>
                                    {{ $fis->user->planta->nombre }}</td>


                                @if ($fis->tipo_muestra_id == 1)
                                    <td class="px-1 py-0 text-2xs" colspan="3" nowrap>
                                        pH:{{ $fis->ph }},Dure:{{ $fis->dureza }},Clor:{{ $fis->cloruros }},Cond:{{ $fis->conductividad }}
                                    </td>
                                @else
                                    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                                        @if ($fis->tipo_muestra_id == 1)
                                            <td class="px-1 py-0 text-2xs" colspan="3" nowrap>
                                                pH:{{ $fis->ph }},Dure:{{ $fis->dureza }},Clor:{{ $fis->cloruros }},Cond:{{ $fis->conductividad }}
                                            </td>
                                        @else
                                            <!-- Columna Temperatura -->
                                            <td class="px-1 py-0" nowrap>
                                                @if ($editandoId === $fis->id && $campoEditando === 'temperatura')
                                                    <input type="text" wire:model="valorTemporal" autofocus
                                                        class="w-12 p-0 text-center border border-blue-300 rounded"
                                                        wire:keydown.enter="guardarEdicion"
                                                        wire:keydown.escape="cancelarEdicion"
                                                        @keydown="handleKeydown(event, {{ $fis->id }}, 'temperatura')">
                                                @else
                                                    <p class="p-0 cursor-pointer"
                                                        wire:click="iniciarEdicion({{ $fis->id }}, 'temperatura', '{{ $fis->actividadAgua->temperatura ?? '' }}')">
                                                        {{ $fis->actividadAgua->temperatura ?? '-' }}
                                                    </p>
                                                @endif
                                            </td>

                                            <!-- Columna %Hr -->
                                            <td class="px-1 py-0" nowrap>
                                                @if ($editandoId === $fis->id && $campoEditando === 'por_hum_rel')
                                                    <input type="text" wire:model="valorTemporal" autofocus
                                                        class="w-12 p-0 text-center border border-blue-300 rounded"
                                                        wire:keydown.enter="guardarEdicion"
                                                        wire:keydown.escape="cancelarEdicion"
                                                        @keydown="handleKeydown(event, {{ $fis->id }}, 'por_hum_rel')">
                                                @else
                                                    <p class="p-0 cursor-pointer"
                                                        wire:click="iniciarEdicion({{ $fis->id }}, 'por_hum_rel', '{{ $fis->actividadAgua->por_hum_rel ?? '' }}')">
                                                        {{ $fis->actividadAgua->por_hum_rel ?? '-' }}
                                                    </p>
                                                @endif
                                            </td>

                                            <!-- Columna Aw -->
                                            <td class="px-1 py-0" nowrap>
                                                @if ($editandoId === $fis->id && $campoEditando === 'act_agua')
                                                    <input type="text" wire:model="valorTemporal" autofocus
                                                        class="w-12 p-0 text-center border border-blue-300 rounded"
                                                        wire:keydown.enter="guardarEdicion"
                                                        wire:keydown.escape="cancelarEdicion"
                                                        @keydown="handleKeydown(event, {{ $fis->id }}, 'act_agua')">
                                                @else
                                                    <p class="p-0 cursor-pointer"
                                                        wire:click="iniciarEdicion({{ $fis->id }}, 'act_agua', '{{ $fis->actividadAgua->act_agua ?? '' }}')">
                                                        {{ $fis->actividadAgua->act_agua ?? '-' }}
                                                    </p>
                                                @endif
                                            </td>
                                        @endif
                                    @endif
                                @endif
                            @endif
                            <td class="px-1 py-0" nowrap>
                                <div class="flex items-center  justify-center">
                                    @if ($fis->estado == 'Cancelado')
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-1"></div>
                                    @endif
                                    @if ($fis->estado == 'Solicitado' || $fis->estado == '')
                                        <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-1"></div>Solicitado
                                    @endif
                                    @if ($fis->estado == 'Analizando')
                                        <div class="h-2.5 w-2.5 rounded-full bg-blue-500 mr-1"></div>
                                    @endif
                                    @if ($fis->estado == 'Revision')
                                        <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-1"></div>
                                    @endif
                                    @if ($fis->estado == 'Terminado')
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-1"></div>
                                    @endif
                                    {{ $fis->estado }}
                                </div>
                            </td>
                            <td class="px-1 py-0 flex" nowrap>
                                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 3)->isNotEmpty())
                                    <!--boton para cancelar-->
                                    <button class="p-1 rounded-md " wire:click="cancelar({{ $fis->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500 h-5 w-5"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                        </svg>
                                    </button>
                                    <!--boton para emitir certificado-->
                                    <button class="p-1 rounded-md " wire:click="cambiar_estado({{ $fis->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                            viewBox="0 0 512 512">

                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                        </svg>
                                    </button>
                                @endif
                                <!--boton de obtener pdf de certificado-->
                                @if ($fis->estado == 'Terminado')
                                    @if ($fis->user->planta->nombre != 'Carsa')
                                        <a class="p-1" href="{{ route('certificado_fis.pdf_cer', $fis->id) }}">
                                            <button class="p-1 rounded-md bg-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white h-4 w-4"
                                                    viewBox="0 0 384 512">
                                                    <path
                                                        d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                                </svg>
                                            </button>
                                        </a>
                                    @endif
                                @endif
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

            <div>
                {{ $fisicos->links() }}
            </div>



            <!--Tabla de microbiologia-->



        </div>
    </div>

</div>
@script
<script>
    function handleKeydown(event, id, campo) {
        if (event.key === 'Enter') {
            event.preventDefault();
            Livewire.dispatch('guardarEdicion');
        }
        if (event.key === 'Escape') {
            Livewire.dispatch('cancelarEdicion');
        }
    }
</script>
@endscript
