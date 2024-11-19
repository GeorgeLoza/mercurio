<div class="">
    <div
        class="h-[calc(100vh-120px)] overflow-auto grid grid-cols-[repeat(14,minmax(0,1fr))] grid-rows-[repeat(4,minmax(0,1fr))] gap-2 text-2xs">
        {{-- Columna 1 --}}
        <div class="row-span-4 col-span-2 grid grid-cols-1 grid-rows-4 ">
            {{-- Recepcion --}}
            <div class="col-span-1 col-start-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-3  ">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-3 ">
                    {{-- R1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">R1</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-sm"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>



                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between ">
                            <!--boton de solicitar-->

                            <button type="button"
                                class=" px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                </svg>
                            </button>

                            <!--boton matenimiento-->
                            <button type="button"
                                class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                            </button>
                            <!--boton limpieza-->
                            <button type="button"
                                class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                </svg>
                            </button>
                            <!--boton vacio-->
                            <button type="button"
                                class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                </svg>
                            </button>

                            <!--boton produccion-->
                            <button type="button"
                                class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                </svg>
                            </button>
                        </div>

                    </div>
                    {{-- R2 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">R2</p>
                            </div>
                            <div>



                            </div>
                            <div>
                                <p class="text-sm"> 10:23 </p>
                            </div>


                        </div>
                        <div></div>
                        <div class="grid gap-2 justify-center">
                            <div class=" p-1 flex items-center justify-center">
                                <div class="text-base">

                                    <P class="text-xs">10083256 - 15 lotes</P>
                                    <p class="text-sm">ALIMENTO BEBIBLE A BASE DE EXTRACTO DE SOYA Y LECHE DE VACA
                                        FRUTILLA 120 ML - EL
                                        ALTO
                                    </p>
                                    <p class="text-right text-xs">Preparacion:1-2</p>
                                </div>

                            </div>

                        </div>
                        <div>

                        </div>

                    </div>
                    {{-- R3 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-start dark:bg-gray-800 row-start-3 row-span-1 col-span-1">
                        <div class=" flex  justify-between  h-max">
                            <div>
                                <p class="text-lg">R3</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center h-full w-full ">
                            <div class=" p-2 flex items-center justify-center">
                                <div>

                                    <div class="relative w-48 h-24 group">
                                        <div
                                            class="absolute inset-0 flex  justify-center  transition-opacity duration-300 group-hover:opacity-0 flex-col">
                                            <P class="text-xs">10083256 - 15 lotes</P>
                                            <p class="text-sm">ALIMENTO BEBIBLE A BASE DE EXTRACTO DE SOYA Y LECHE DE
                                                VACA FRUTILLA 120 ML - EL
                                                ALTO
                                            </p>
                                            <p class="text-right text-xs">Preparacion:1-2</p>
                                        </div>
                                        <div class="absolute inset-0  items-center justify-between  opacity-0 transition-opacity duration-300 group-hover:opacity-100 ">
                                            <div class="mb-2">
                                                <P class="text-2xs">10083256 - 15 lotes</P>
                                            <p class="text-xs">ALIMENTO BEBIBLE A BASE DE EXTRACTO DE SOYA Y LECHE DE
                                                VACA FRUTILLA 120 ML - EL
                                                ALTO
                                            </p>
                                            <p class="text-right text-2xs">Preparacion:1-2</p>
                                            </div>
                                            
                                            {{-- botones --}}
                                            <div class="flex gap-1 px-0 py-0 w-full justify-between ">

                                                <!--boton de solicitar-->

                                                <button type="button"
                                                    class=" px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-pruple-600 dark:hover:bg-purple-700 dark:focus:ring-pruple-800">
                                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M288 0H160 128C110.3 0 96 14.3 96 32s14.3 32 32 32V196.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512H378.6c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H288zM192 196.8V64h64V196.8c0 23.7 6.6 46.9 19 67.1L309.5 320h-171L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                                                    </svg>
                                                </button>

                                                <!--boton matenimiento-->
                                                <button type="button"
                                                    class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                                    </svg>
                                                </button>
                                                <!--boton limpieza-->
                                                <button type="button"
                                                    class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-white rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-black">
                                                    <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                                                    </svg>
                                                </button>
                                                <!--boton vacio-->
                                                <button type="button"
                                                    class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M80 160c-8.8 0-16 7.2-16 16V336c0 8.8 7.2 16 16 16H464c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H80zM0 176c0-44.2 35.8-80 80-80H464c44.2 0 80 35.8 80 80v16c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V176z" />
                                                    </svg>
                                                </button>

                                                <!--boton produccion-->
                                                <button type="button"
                                                    class="px-2 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                                                    <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>


                </div>
            </div>
            {{-- TK NEW --}}
            <div class="col-span-1 col-start-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-1  row-start-4 mt-1">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- TK N --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">TNK NEW</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>

                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>




                </div>
            </div>

        </div>


        {{-- Columna 2 --}}
        <div class="row-span-4 col-span-10 grid grid-cols-5 grid-rows-4 ">
            {{-- mixes --}}
            <div class="col-span-4 col-start-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-1 mb-1 mr-1">


                <div class="grid grid-cols-4 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- Mx1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">MX1</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- Mx2 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">MX2</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- Mx3 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-3 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">MX3</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- Mx4 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-4 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">MX4</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>


                </div>
            </div>
            {{-- tq --}}

            <div class="col-span-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-1 col-start-5 mb-1 ">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- tkq --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">TKQ</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>



                </div>
            </div>
            {{-- saborizado --}}
            <div class="col-span-4 col-start-1 bg-white dark:bg-gray-900 rounded-md p-2 row-span-1  mb-1 mr-1">


                <div class="grid grid-cols-4 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- MP --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">MP</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- MG --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">MG</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- FP --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-3 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">FP</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- FG --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-4 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">FG</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>


                </div>
            </div>

            {{-- columna doble  --}}
            <div class="col-span-4 col-start-1 grid grid-cols-2 ">
                {{-- saborizado 2  --}}
                <div
                    class="grid grid-cols-2 gap-2 h-full justify-center grid-rows-1 col-span-1  bg-white dark:bg-gray-900 p-2 rounded">
                    {{-- TK10 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">TK10</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- TK5 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">TK5</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>



                </div>
                {{-- sc cc  --}}
                <div
                    class="grid grid-cols-2 gap-2 h-full justify-center grid-rows-1 col-span-1 col-start-2 rounded bg-white dark:bg-gray-900 p-2 mr-1  ml-1 mb-1">
                    {{-- SC --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">SC</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- CC --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">CC</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>



                </div>


            </div>
            {{-- columna triple  --}}
            <div class="col-span-5 col-start-1 grid grid-cols-10  ">
                {{-- htst  --}}
                <div
                    class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 col-span-5  bg-white dark:bg-gray-900 p-2 rounded mt-1 mr-1">
                    {{-- HTST --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-5">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">HTST</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>

                </div>
                {{-- arana vasos  --}}
                <div
                    class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 col-span-2 col-start-6  bg-white dark:bg-gray-900 p-2  mt-1 mr-1  rounded">
                    {{-- Mx1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">ARANA VASOS</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>




                </div>
                {{-- uht  --}}
                <div
                    class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 col-span-3 col-start-8  bg-white dark:bg-gray-900 p-2  mt-1   rounded">
                    {{-- UHT --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 col-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">UHT</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>




                </div>

            </div>
            {{-- 41 42 --}}
            <div
                class="col-span-1 col-start-5 bg-white dark:bg-gray-900 rounded-md p-2 row-span-2 mb-1  row-start-2 mt-1">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-2 ">
                    {{-- YK41 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">41</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- 42 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">42</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>



                </div>
            </div>




        </div>

        {{-- Columna 3 --}}
        <div class="row-span-4 col-span-2 grid grid-cols-1 grid-rows-4  col-start-13 ">
            {{-- ENV UX --}}
            <div class="col-span-1  bg-white dark:bg-gray-900 rounded-md p-2 row-span-2 mb-1  ">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-2 ">
                    {{-- aux1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">AUX1</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>
                    {{-- AUX2 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-2 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">AUX2</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>



                </div>
            </div>
            {{-- TKSY --}}
            <div class="col-span-1  bg-white dark:bg-gray-900 rounded-md p-2 row-span-1  row-start-3">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- aux1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">TKSY</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>




                </div>
            </div>
            {{-- env soy --}}
            <div class="col-span-1  bg-white dark:bg-gray-900 rounded-md p-2 row-span-1  row-start-4 mt-1">


                <div class="grid grid-cols-1 gap-2 h-full justify-center grid-rows-1 ">
                    {{-- aux1 --}}
                    <div
                        class="p-2 h-full align-center bg-gray-100 rounded-xl flex flex-col justify-between dark:bg-gray-800 row-start-1 row-span-1 col-span-1">
                        <div class=" flex  justify-between  ">
                            <div>
                                <p class="text-lg">ENV SY</p>
                            </div>
                            <div>


                            </div>
                            <div>
                                <p class="text-base"> 10:23 </p>
                            </div>


                        </div>

                        <div class="grid gap-2 justify-center">
                            <div class=" p-2 flex items-center justify-center">
                                <div>


                                </div>

                            </div>

                        </div>
                        <div class="flex gap-1 px-0 py-0 w-full justify-between">

                        </div>

                    </div>




                </div>
            </div>

        </div>





    </div>
</div>
