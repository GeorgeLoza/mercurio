<div>


    <div class="px-6 py-6 lg:px-8">
        <div class=" mb-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Analisis
                Microbiologico - Dia 2</h3>

            <form novalidate wire:submit="dia2">
                <div>
                    <label for="aer_mes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Aerobios mesófilos</label>
                    <input type="number" step="0.01" name="aer_mes" id="aer_mes" wire:model="aer_mes"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder=" ">
                    <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        <input type="radio" wire:model="aer_mes" value="1000000"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        MNPC
                    </label>
                </div>
                <div>
                    <label for="col_tot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Coliformes totales</label>
                    <input type="number" step="0.01" name="col_tot" id="col_tot" wire:model="col_tot"
                        placeholder=" "
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        <input type="radio" wire:model="col_tot" value="1000000"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        MNPC
                    </label>

                </div>

                <button type="submit"
                    class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                    analisis</button>

            </form>
        </div>
        <div class="">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Analisis
                Microbiologico - Dia 5</h3>

            <form novalidate wire:submit="dia5">

                <div>
                    <input type="number" name="tipo" value="3" hidden>
                    <label for="moh_lev" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mohos y
                        Levaduras</label>
                    <input type="number" step="0.01" name="moh_lev" id="moh_lev" wire:model="moh_lev"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder=" ">
                    <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        <input type="radio" wire:model="moh_lev" value="1000000"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        MNPC
                    </label>
                </div>


                <button type="submit"
                    class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar
                    analisis</button>

            </form>
        </div>
    </div>
</div>
