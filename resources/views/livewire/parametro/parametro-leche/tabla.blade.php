<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>



                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        temperatura_max
                    </th>


                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        ph_min
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        ph_max
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        acidez_min
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        acidez_max
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        brix_min
                    </th>

                <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                    contenido_graso_min
                </th>
                <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                    temperatura_congelada_min
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        temperatura_congelada_max
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        densidad_min
                    </th>
                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        densidad_max
                    </th>


                    <th scope="col" class="px-2 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        opciones
                    </th>

                </tr>
            </thead>
            <tbody class="">

                @foreach ($parametroLeche as $parametroLeche)
                <tr
                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">


                    <td class="px-2 py-2">
                        {{$parametroLeche->temperatura_max}} °C
                    </td>
                    <td class="px-2 py-2">
                        {{$parametroLeche->ph_min}}
                    </td>
                    <td class="px-2 py-2">
                        {{$parametroLeche->ph_max}}
                    </td>
                    <td class="px-2 py-2">
                        {{$parametroLeche->acidez_min}}
                    </td>
                    <td class="px-2 py-2">
                        {{$parametroLeche->acidez_max}}
                    </td>
                    <td class="px-2 py-2">
                        {{$parametroLeche->brix_min}}
                    </td>
                    <td class="px-2 py-2">
                        {{$parametroLeche->contenido_graso_min}}
                    </td>

                     <td class="px-2 py-2">
                        {{$parametroLeche->temperatura_congelada_min}} °C
                    </td>
                    <td class="px-2 py-2">
                        {{$parametroLeche->temperatura_congelada_max}} °C
                    </td>

                    <td class="px-2 py-2">
                        {{$parametroLeche->densidad_min}}
                    </td>
                    <td class="px-2 py-2">
                        {{$parametroLeche->densidad_max}}
                    </td>

                    <td class="flex items-center px-2 py-2 gap-2">
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 10)->where('permiso_id', 3)->isNotEmpty())
                        <svg onclick="Livewire.dispatch('openModal', { component: 'parametro.parametro-leche.editar', arguments: { id: {{ $parametroLeche->id}} } })" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-blue-600 dark:fill-blue-500"
                            viewBox="0 0 512 512">
                            <path
                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                        </svg>
                        @endif
                        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 10)->where('permiso_id', 4)->isNotEmpty())
                        <svg onclick="Livewire.dispatch('openModal', { component: 'parametro.parametro-leche.eliminar', arguments: { id: {{ $parametroLeche->id}} } })" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-red-600 dark:fill-red-500"
                            viewBox="0 0 448 512">
                            <path
                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                        </svg>
                        @endif
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
    </div>
</div>
