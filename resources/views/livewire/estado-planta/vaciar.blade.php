<div>
    <div>
        
        @if ($id == 1)
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora HTST </h3>

            <div class="md:flex gap-3 mb-2">
                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal 1a -->
                    <div wire:click="estado_HTST_A1"
                        class="bg-{{ $HTST_A1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">1A</p>
                        </div>
                    </div>
                    <!--cabezal 1b -->
                    <div wire:click="estado_HTST_B1"
                        class="bg-{{ $HTST_B1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">1B</p>
                        </div>
                    </div>
                    <!--cabezal 1c -->
                    <div wire:click="estado_HTST_C1"
                        class="bg-{{ $HTST_C1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">1C</p>
                        </div>

                    </div>
                </div>

                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal 2a -->
                    <div wire:click="estado_HTST_A2"
                        class="bg-{{ $HTST_A2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">2A</p>
                        </div>

                    </div>
                    <!--cabezal 2b -->
                    <div wire:click="estado_HTST_B2"
                        class="bg-{{ $HTST_B2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">2B</p>
                        </div>

                    </div>
                    <!--cabezal 2c -->
                    <div wire:click="estado_HTST_C2"
                        class="bg-{{ $HTST_C2 ? 'green' : 'red' }}-500   w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">2C</p>
                        </div>

                    </div>
                </div>
            </div>

            
            <div class="md:flex gap-3 mb-2">
                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal 1a -->
                    <div wire:click="estado_HTST_A3"
                        class="bg-{{ $HTST_A3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">3A</p>
                        </div>
                    </div>
                    <!--cabezal 1b -->
                    <div wire:click="estado_HTST_B3"
                        class="bg-{{ $HTST_B3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">3B</p>
                        </div>
                    </div>
                    <!--cabezal 1c -->
                    <div wire:click="estado_HTST_C3"
                        class="bg-{{ $HTST_C3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">3C</p>
                        </div>

                    </div>
                </div>

                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal 4a -->
                    <div wire:click="estado_HTST_A4"
                        class="bg-{{ $HTST_A4 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">4A</p>
                        </div>

                    </div>
                    <!--cabezal 4b -->
                    <div wire:click="estado_HTST_B4"
                        class="bg-{{ $HTST_B4 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">4B</p>
                        </div>

                    </div>
                    <!--cabezal 4c -->
                    <div wire:click="estado_HTST_C4"
                        class="bg-{{ $HTST_C4 ? 'green' : 'red' }}-500   w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">4C</p>
                        </div>

                    </div>
                </div>
                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal 5a -->
                    <div wire:click="estado_HTST_A5"
                        class="bg-{{ $HTST_A5 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">5A</p>
                        </div>

                    </div>
                    <!--cabezal 5b -->
                    <div wire:click="estado_HTST_B5"
                        class="bg-{{ $HTST_B5 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">5B</p>
                        </div>

                    </div>
                    <!--cabezal 4c -->
                    <div wire:click="estado_HTST_C5"
                        class="bg-{{ $HTST_C5 ? 'green' : 'red' }}-500   w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">5C</p>
                        </div>

                    </div>
                </div>

            </div>
        @endif


        @if ($id == 2)
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora UHT </h3>

            <div class="md:flex gap-3 mb-2">
                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal 1a -->
                    <div wire:click="estado_UHT_A1"
                        class="bg-{{ $UHT_A1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">1A</p>
                        </div>
                    </div>
                    <!--cabezal 1b -->
                    <div wire:click="estado_UHT_B1"
                        class="bg-{{ $UHT_B1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">1B</p>
                        </div>
                    </div>
                    <!--cabezal 1c -->
                    <div wire:click="estado_UHT_C1"
                        class="bg-{{ $UHT_C1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">1C</p>
                        </div>

                    </div>
                </div>

                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal 2A -->
                    <div wire:click="estado_UHT_A2"
                        class="bg-{{ $UHT_A2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">2A</p>
                        </div>

                    </div>
                    <!--cabezal 2B -->
                    <div wire:click="estado_UHT_B2"
                        class="bg-{{ $UHT_B2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">2B</p>
                        </div>

                    </div>

                </div>
                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal 3A -->
                    <div wire:click="estado_UHT_A3"
                        class="bg-{{ $UHT_A3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">3A</p>
                        </div>

                    </div>
                    <!--cabezal 3b -->
                    <div wire:click="estado_UHT_B3"
                        class="bg-{{ $UHT_B3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">3B</p>
                        </div>

                    </div>
                </div>

            </div>
        @endif
        @if ($id == 3)
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora VASOS </h3>

            <div class="md:flex gap-3 mb-2">
                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal V1 -->
                    <div wire:click="estado_V1"
                        class="bg-{{ $V1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">V1</p>
                        </div>
                    </div>
                    <!--cabezal V2 -->
                    <div wire:click="estado_V2"
                        class="bg-{{ $V2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">V2</p>
                        </div>
                    </div>
                    <!--cabezal V3 -->
                    <div wire:click="estado_V3"
                        class="bg-{{ $V3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">V3</p>
                        </div>

                    </div>
                    <div class="md:flex gap-3 mb-2">
                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    
                    <!--cabezal araña -->
                    
                </div>

                
            </div>
            
                </div>


            </div>
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora VASOS </h3>
            <div wire:click="estado_araña"
                        class="bg-{{ $araña ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">araña</p>
                        </div>
                    </div>
        @endif
        

        @if ($id == 5)
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora SOYA </h3>

            <div class="md:flex gap-3 mb-2">
                <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                    <!--cabezal 1a -->
                    <div wire:click="estado_L1"
                        class="bg-{{ $L1 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">L1</p>
                        </div>
                    </div>
                    <!--cabezal 1b -->
                    <div wire:click="estado_L2"
                        class="bg-{{ $L2 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">L2</p>
                        </div>
                    </div>
                    <!--cabezal 1c -->
                    <div wire:click="estado_L3"
                        class="bg-{{ $L3 ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                        <div class="flex items-center">
                            <p class="w-full py-3 text-sm font-medium text-white text-center">L3</p>
                        </div>

                    </div>
                </div>


            </div>
        @endif

    </div>

    <div class="w-full px-3 mb-5 mt-4">
                        <button type="submit"
                            class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Aceptar</button>
                    </div>
</div>
