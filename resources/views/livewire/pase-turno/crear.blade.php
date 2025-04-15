<div>
    <h2 class="text-xl mb-4 text-gray-800 dark:text-gray-200 font-bold text-center ">Nuevo Pase de Turno</h2>
    <div>
        <form wire:submit="save" novalidate>
            @csrf

            <div class="relative z-0 w-full mb-3 group">
                <label for="urgente" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">
                    Urgente</label>
                <textarea id="urgente" rows="4" wire:model="urgente"
                    class="block p-2.5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba aqui ..."></textarea>

                @error('urgente')
                    <p class="text-red-500 text-xs">* {{ $message }}</p>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-3 group">
                <label for="observaciones" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">
                    Observaciones</label>
                <textarea id="observaciones" rows="4" wire:model="observaciones"
                    class="block p-2.5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba aqui ...">


                </textarea>

                @error('observaciones')
                    <p class="text-red-500 text-xs">* {{ $message }}</p>
                @enderror
            </div>


            <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">
                Volumenes en Litros </label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                <!--R1 -->
                <div class="flex gap-1 items-center">
                    <label for="R1"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        R1:</label>
                    <input id="R1" wire:model="R1" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--R2 -->
                <div class="flex gap-1 items-center">
                    <label for="R2"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        R2:</label>
                    <input id="R2" wire:model="R2" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--R3-->
                <div class="flex gap-1 items-center">
                    <label for="R3"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        R3:</label>
                    <input id="R3" wire:model="R3" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--mix1 -->
                <div class="flex gap-1 items-center">
                    <label for="MIX1"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        MIX1:</label>
                    <input id="MIX1" wire:model="MIX1" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <!--mix2 -->
                <div class="flex gap-1 items-center">
                    <label for="MIX2"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        MIX2:</label>
                    <input id="MIX2" wire:model="MIX2" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <!--mix3 -->
                <div class="flex gap-1 items-center">
                    <label for="MIX3"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        MIX3:</label>
                    <input id="MIX3" wire:model="MIX3" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <!--mix4 -->
                <div class="flex gap-1 items-center">
                    <label for="MIX4"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        MIX4:</label>
                    <input id="MIX4" wire:model="MIX4" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <!--tk41 -->
                <div class="flex gap-1 items-center">
                    <label for="TK41"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        TK41:</label>
                    <input id="TK41" wire:model="TK41" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <!--tk42 -->
                <div class="flex gap-1 items-center">
                    <label for="TK42"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        TK42:</label>
                    <input id="TK42" wire:model="TK42" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <!--tk10 -->
                <div class="flex gap-1 items-center">
                    <label for="TK10"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        TK10:</label>
                    <input id="TK10" wire:model="TK10" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--tk5 -->
                <div class="flex gap-1 items-center">
                    <label for="TK5"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        TK5:</label>
                    <input id="TK5" wire:model="TK5" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--tkFG -->
                <div class="flex gap-1 items-center">
                    <label for="TKFG"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        TKFG:</label>
                    <input id="TKFG" wire:model="TKFG" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--TKMG -->
                <div class="flex gap-1 items-center">
                    <label for="TKMG"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        TKMG:</label>
                    <input id="TKMG" wire:model="TKMG" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--TKFP -->
                <div class="flex gap-1 items-center">
                    <label for="FP"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        FP:</label>
                    <input id="FP" wire:model="TKFP" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--TKMP -->
                <div class="flex gap-1 items-center">
                    <label for="TKMP"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        TKMP:</label>
                    <input id="TKMP" wire:model="TKMP" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--TKCC -->
                <div class="flex gap-1 items-center">
                    <label for="CC"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        CC:</label>
                    <input id="CC" wire:model="TKCC" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!--TKSC -->
                <div class="flex gap-1 items-center">
                    <label for="SC"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        SC:</label>
                    <input id="SC" wire:model="TKSC" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <!--TKSC -->
                <div class="flex gap-1 items-center">
                    <label for="TK102"
                        class="block text-xs font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        TK102:</label>
                    <input id="TK102" wire:model="TK102" type="number"
                        class="block p-1 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

            </div>

            <div class="w-full px-3 m-5">
                <button type="submit"
                    class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Registrar</button>
            </div>
        </form>
    </div>
</div>
