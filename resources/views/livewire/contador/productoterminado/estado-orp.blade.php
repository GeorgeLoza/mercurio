<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        Codigo
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        Producto
                    </th>
                    <th scope="col" class="px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        Cantidad Total
                    </th>
                    
                    <th scope="col" class=" flex gap-2 px-6 py-3 sticky top-0 bg-white dark:bg-gray-700">
                        opciones
                    </th>

                </tr>
            </thead>
            <tbody class="">                
                @foreach ($orps as $orp)
                <tr
                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$orp->orp->codigo}}
                    </th>
                    <td class="px-6 py-2" nowrap>
                        {{$orp->orp->producto->nombre}}
                    </td>
                    <td class="px-6 py-2" nowrap>
                        {{$orp->cantidad_total}}
                    </td>
                    <td class="flex items-center px-6 py-2 gap-2">

                        <button class="p-2 rounded-md " wire:click="concluir({{$orp->orp_id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                viewBox="0 0 512 512">

                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
    </div>

</div>