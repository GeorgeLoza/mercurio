<div>
    <form wire:submit="save" novalidate>
        <h2 class="text-xl mb-4 text-gray-800 dark:text-gray-200 font-bold text-center ">Crear Nuevo Estado de Planta
        </h2>
        <div class="flex gap-4">
            <div class="flex items-center">
                <input id="pasteurizar" type="checkbox" value="true" wire:model.live="estado_pasteurizar"
                    wire:click = "cambiar_estado_pasteruizador"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="pasteurizar" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Desea
                    Pasteurizar?.</label>
            </div>
            <div class="flex items-center">
                <input id="pasterizar" type="checkbox" value="true" wire:model.live="estado_envasar"
                    wire:click = "cambiar_estado_envasadora"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="pasterizar" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Desea
                    Envasar?.</label>
            </div>
        </div>

        @if (!$tanqueLibre)
            @if (!$estado_envasar)
                <div class="px-3 my-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="etapa_id"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Etapa</label>
                        <select id="etapa_id" wire:model="etapa_id"
                            class="block py-2.5 px-0 w-full text-sm text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una opción</option>
                            <option value="1" class="bg-gray-100 dark:bg-gray-800">Mezclar</option>
                            <option value="3" class="bg-gray-100 dark:bg-gray-800">Inocular</option>
                            <option value="4" class="bg-gray-100 dark:bg-gray-800">Antes de corte</option>
                            <option value="5" class="bg-gray-100 dark:bg-gray-800">Despues de corte</option>
                            <option value="6" class="bg-gray-100 dark:bg-gray-800">Saborizar</option>
                            <option value="7" class="bg-gray-100 dark:bg-gray-800">Añadido de ingredientes</option>
                        </select>
                        @error('etapa_id')
                            <p class="text-red-500 text-xs">* {{ $message }}</p>
                        @enderror
                    </div>
                </div>
            @endif

        @endif


        <div
            class="px-3 my-5 text-gray-700 dark:text-gray-300 text-xs mb-1 bg-gray-100 dark:bg-gray-900 p-2 rounded-lg">
            <div class="md:flex items-center gap-1 text-gray-700 dark:text-gray-300 text-xs mb-1 bg-gray-100 dark:bg-gray-900 pt-3 rounded-lg">

                <div class="px-3 mb-1 md:w-3/5 ">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="orpInput"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Orp</label>
                        <select id="orpInput" wire:model="orpInput"
                            class="block py-2.5 px-0 text-xs text-gray-600 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer w-full">
                            <option selected class="bg-gray-100 dark:bg-gray-800">Escoge una orp en proceso</option>
                            @foreach ($orps as $orp)
                                <option class="bg-gray-100 dark:bg-gray-800 text-xs whitespace-normal" value="{{ $orp->id }}">
                                    {{ $orp->codigo }} - {{ $orp->producto->nombre }} - {{ $orp->lote/1 }}
                                </option>
                            @endforeach
                        </select>
                        @error('orpInput')
                            <p class="text-red-500 text-xs">* {{ $message }}</p>
                        @enderror
                    </div>
                </div>
            
                <div class="px-3 mb-1 md:w-1/5">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" wire:model="preparacionInput" id="preparacion"
                            class="block py-2.5 px-0 w-full text-xs text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="preparacion"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Preparación
                        </label>
                        @error('preparacionInput')
                            <p class="text-red-500 text-xs">* {{ $message }}</p>
                        @enderror
                    </div>
                </div>
            
                <button
                    class="text-white rounded-md p-1 bg-green-600 dark:bg-green-500 px-3 mb-1 md:w-1/5 flex justify-center items-center"
                    wire:click.prevent="addDetalle">
                    Agregar
                </button>
            </div>
            
            @foreach ($detalles as $index => $detalle)
                <div class="flex  justify-between gap-4 text-gray-700 dark:text-gray-300 text-xs mb-1">
                    <p>{{ $detalle['orp'] }}</p>
                    <p>{{ $detalle['producto'] }}</p>
                    <p>{{ $detalle['preparacion'] }}</p>

                    <a wire:click="removeDetalle({{ $index }})" class=""><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-red-600 dark:fill-red-500"
                            viewBox="0 0 448 512">
                            <path
                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>


        <div class="block md:flex gap-4 my-2 ">
            <!--origen-->
            <div
                class="p-2 flex flex-col justify-center items-center bg-gray-300 dark:bg-gray-900 rounded-md w-full md:w-1/3">
                <h3 class="bold text-gray-800 dark:text-gray-200">Tanque Origen</h3>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                    class="w-12 h-12 fill-gray-800 dark:fill-gray-400">
                    <path transform="scale(0.8 0.8)"
                        d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                    <path transform="scale(0.8 0.8)"
                        d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                </svg>
                <p>{{ $tanqueActual->origen->alias }}</p>
            </div>

            @if (!$this->tanqueLibre)
                <!--pasteruizar-->
                @if ($estado_pasteurizar && !$estado_envasar)
                    <div class="p-2 flex justify-center rotate-90 md:rotate-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-6 h-6 fill-gray-800 dark:fill-gray-200">
                            <path
                                d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                        </svg>
                    </div>

                    <div
                        class="p-2 flex flex-col justify-center items-center bg-gray-300 dark:bg-gray-900 rounded-md w-full md:w-1/3">
                        <h3 class="bold text-gray-800 dark:text-gray-200">Pasteurizador</h3>
                        <svg for="pasteurizador" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                            class="w-12 h-12 fill-gray-800 dark:fill-gray-400">
                            <path
                                d="M269.5 69.9c11.1-7.9 25.9-7.9 37 0C329 85.4 356.5 96 384 96c26.9 0 55.4-10.8 77.4-26.1c0 0 0 0 0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 149.7 417 160 384 160c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4C42.8 92.6 61 83.5 75.3 71.6c11.1-9.5 27.3-10.1 39.2-1.7c0 0 0 0 0 0C136.7 85.2 165.1 96 192 96c27.5 0 55-10.6 77.5-26.1zm37 288C329 373.4 356.5 384 384 384c26.9 0 55.4-10.8 77.4-26.1c0 0 0 0 0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 437.7 417 448 384 448c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7c0 0 0 0 0 0C136.7 373.2 165.1 384 192 384c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0zm0-144C329 229.4 356.5 240 384 240c26.9 0 55.4-10.8 77.4-26.1c0 0 0 0 0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 293.7 417 304 384 304c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.5 27.3-10.1 39.2-1.7c0 0 0 0 0 0C136.7 229.2 165.1 240 192 240c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z" />
                        </svg>

                        <select id="pasteurizador_select" wire:model="pasteurizador"
                            class="block py-2.5 px-0 w-full text-sm text-gray-700 bg-gray-300 dark:bg-gray-900 border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-200 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected>Seleccione el pasteurizador</option>
                            <option value="24">Magger</option>
                            <option value="25">Tetra</option>
                            <option value="26">Ultra</option>
                        </select>
                        @error('pasteurizador')
                            <p class="text-red-500 text-xs">* {{ $message }}</p>
                        @enderror
                    </div>
                @endif

                <!--destino-->
                @if (!$estado_envasar)
                    <div class="p-2 flex justify-center rotate-90 md:rotate-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-6 h-6 fill-gray-800 dark:fill-gray-200">
                            <path
                                d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                        </svg>
                    </div>
                    <div
                        class="p-2 flex flex-col justify-center items-center bg-gray-300 dark:bg-gray-900 rounded-md w-full md:w-1/3">
                        <h3 class="bold text-gray-800 dark:text-gray-200">Tanque Destino </h3>
                        <label for="destino_select" onclick="document.getElementById('destino_select').click();">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-12 h-12 fill-gray-800 dark:fill-gray-400">
                                <path transform="scale(0.8 0.8)"
                                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                <path transform="scale(0.8 0.8)"
                                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                            </svg>
                        </label>

                        <select wire:model.live="destino" id="destino_select"
                            class="block py-2.5 px-0 w-full text-sm text-gray-700 bg-gray-300 dark:bg-gray-900 border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-200 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected>Seleccione tanque destino</option>
                            <optgroup label="Mixes">
                                <option value="13">TKMIX 1</option>
                                <option value="11">TKMIX 2</option>
                                <option value="10">TKMIX 3</option>
                                <option value="14">TKMIX 4</option>
                            </optgroup>
                            <optgroup label="UHT">
                                <option value="9">TK 41</option>
                                <option value="12">TK 42</option>
                            </optgroup>
                            <optgroup label="Saborizado">
                                <option value="21">TK MG</option>
                                <option value="49">TK MP</option>
                                <option value="20">TK FG</option>
                                <option value="18">TK FP</option>
                                <option value="17">TK 10</option>
                                <option value="19">TK 5</option>
                            </optgroup>
                            <optgroup label="Vasos - Embotelladora">
                                <option value="22">TK CC</option>
                                <option value="23">TK SC</option>
                            </optgroup>
                            <optgroup label="Auxiliares">
                                <option value="54">TK AUX1</option>
                                <option value="55">TK AUX2</option>
                                <option value="56">TK SY</option>
                            </optgroup>
                            <optgroup label="Recepción">
                                <option value="6">R1</option>
                                <option value="7">R2</option>
                                <option value="8">R3</option>
                            </optgroup>
                        </select>

                    </div>
                @endif
                <!--Envasadora-->
                @if ($estado_envasar)
                    <div class="p-2 flex justify-center rotate-90 md:rotate-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-6 h-6 fill-gray-800 dark:fill-gray-200">
                            <path
                                d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                        </svg>
                    </div>
                    <div
                        class="p-2 flex flex-col justify-center items-center bg-gray-300 dark:bg-gray-900 rounded-md w-full md:w-1/3">
                        <h3 class="bold text-gray-800 dark:text-gray-200">Envasadoras</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            class="w-12 h-12 fill-gray-800 dark:fill-gray-400">
                            <path transform="scale(0.8 0.8)"
                                d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                            <path transform="scale(0.8 0.8)"
                                d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                        </svg>
                        <select wire:model.live="grupo"
                            class="block py-2.5 px-0 w-full text-sm text-gray-700 bg-gray-300 dark:bg-gray-900 border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-200 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected>Seleccione tanque destino</option>
                            <option value="1">HTST</option>
                            <option value="2">UHT</option>
                            <option value="3">VASOS</option>
                            <option value="4">ARAÑA</option>
                            <option value="5">SOYA</option>
                        </select>

                    </div>
                @endif
            @endif
        </div>

        @if ($estado_envasar)
            <div>
                @if ($grupo == 1)
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

                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora HTST </h3>

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


                @if ($grupo == 2)
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
                @if ($grupo == 3)
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
                        </div>


                    </div>
                @endif
                @if ($grupo == 4)
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Envasadora VASOS </h3>

                    <div class="md:flex gap-3 mb-2">
                        <div class="items-center w-full text-sm font-medium text-gray-900 flex mb-2">
                            <!--cabezal V1 -->
                            <div wire:click="estado_araña"
                                class="bg-{{ $araña ? 'green' : 'red' }}-500 w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600 rounded-md">
                                <div class="flex items-center">
                                    <p class="w-full py-3 text-sm font-medium text-white text-center">araña</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($grupo == 5)
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
        @endif

        @if (count($detalles) != 0)
            <div class="flex mt-6">
                <div class="w-full px-3 mb-5">
                    <button type="submit"
                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Aceptar</button>
                </div>
            </div>
        @endif
    </form>
</div>
