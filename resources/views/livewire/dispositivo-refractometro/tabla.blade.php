<div>
    <div class="flex justify-end items-center mb-2">

        <div>
            <!--Exportar Pdf-->
            <button class="bg-red-600 p-2 text-center rounded-md  gap-2" wire:click="pdf"
                wire:loading.attr="disabled">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-4 w-4 fill-white">
                    <path
                        d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
            </button>
            <!--Boton Crear -->
            <button class="p-2 bg-green-500 rounded-lg"
                onclick="Livewire.dispatch('openModal', { component: 'dispositivo-refractometro.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg></button>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700" rowspan="2">
                        fecha
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700" rowspan="2">
                        Dispositivo
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700" colspan="3">
                        Verificacion
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700" rowspan="2">
                        Requiere Ajuste
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700" colspan="3">
                        Verificacion Ajuste
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700" rowspan="2">
                        Estado
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700" rowspan="2">
                        Responsable
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700" rowspan="2">
                        Observaciones
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700" rowspan="2">
                        Opciones
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        T[°C]
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        0%
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        25%
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        T[°C]
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        0%
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        25%
                    </th>
                    
                </tr>
            </thead>
            <tbody class=" text-center">
                <!-- fila de filtros -->
                {{-- <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                    <th class="p-1">
                        <input type="date" wire:model.live='f_fecha_hora' placeholder="Filtrar por fecha y hora"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th class="p-1">
                        <input type="text" wire:model.live='f_dispositivo' placeholder="Filtrar por dispositivo"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>

                </tr> --}}

                @forelse ($refractometros as $refractometro)
                    <tr
                        class="bg-gray-100 border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ \Carbon\Carbon::parse($refractometro->fecha_hora)->isoFormat('DD-MM-YY') }}
                        </th>
                        <td class="px-2 py-1" nowrap>
                            {{ $refractometro->dispositivosMedicion->codigo }}
                            {{ $refractometro->dispositivosMedicion->dispositivo }}
                        </td>

                        <td class="px-2 py-1">
                            {{ $refractometro->verificacion_temperatura }}
                        </td>
                        <td class="px-2 py-1">
                            {{ $refractometro->verificacion_concentracion_0 }}
                        </td>
                        <td class="px-2 py-1">
                            {{ $refractometro->verificacion_concentracion_25 }}
                        </td>
                        <td class="px-2 py-1">
                            @if ($refractometro->requerido_ajuste)
                                <span class="text-red-600 dark:text-red-500">Si</span>
                            @else
                                <span class="text-green-600 dark:text-green-500">No</span>
                            @endif
                        </td>
                        <td class="px-2 py-1">
                            {{ $refractometro->verificacion_ajuste_temperatura }}
                        </td>
                        <td class="px-2 py-1">
                            {{ $refractometro->verificacion_ajuste_concentracion_0 }}
                        </td>
                        <td class="px-2 py-1">
                            {{ $refractometro->verificacion_ajuste_concentracion_25 }}
                        </td>
                        <td class="px-2 py-1">
                            @if ($refractometro->estado == 'Bien')
                                <span class="text-green-600 dark:text-green-500">Bien</span>
                            @elseif ($refractometro->estado == 'Mal')
                                <span class="text-red-600 dark:text-red-500">Mal</span>
                            @else
                                <span class="text-yellow-600 dark:text-yellow-500">Observado</span>
                            @endif
                        </td>
                        <td class="px-2 py-1">
                            {{ $refractometro->user->codigo }}
                        </td>
                        <td class="px-2 py-1">
                            {{ $refractometro->observaciones }}
                        </td>
                        <td class="flex items-center px-2 py-1 gap-2">

                            <svg onclick="Livewire.dispatch('openModal', { component: 'dispositivoRefractometro.editar', arguments: { id: {{ $refractometro->id }} } })"
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                                viewBox="0 0 512 512">
                                <path
                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg>

                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>
    <div class="mt-2">
        {{ $refractometros->links() }}
    </div>
</div>
