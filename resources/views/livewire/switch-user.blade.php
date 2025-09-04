<div>

    <label for="user-select">Seleccion De Usuarios:</label>


    <!-- Componente de Avatar Grupal -->
    <div class="flex items-center mb-2 mt-2">
        <div class="flex -space-x-2 justify-between w-full">

            <div class="flex -space-x-2">
                @foreach ($users as $user)
                    @php
                        // ahora tomas el color del usuario del foreach
                        $bgColor = $user->color ?? '#CCCCCC'; // color por defecto si no tiene

                        $hex = str_replace('#', '', $bgColor);

                        if (strlen($hex) == 3) {
                            $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
                            $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
                            $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
                        } else {
                            $r = hexdec(substr($hex, 0, 2));
                            $g = hexdec(substr($hex, 2, 2));
                            $b = hexdec(substr($hex, 4, 2));
                        }

                        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
                        $textColor = $luminance > 0.5 ? '#000000' : '#FFFFFF';
                    @endphp



                    <div wire:click="selectUser({{ $user->id }})"
                        class="flex items-center justify-center w-10 h-10 rounded-full border-2  border-white dark:border-gray-200 font-bold text-2xs cursor-pointer hover:scale-105 transition"
                        style="background-color: {{ $bgColor }}; color: {{ $textColor }}">
                        {{ $user->iniciales }}
                    </div>
                @endforeach
            </div>

            <div>


                <!-- Avatar adicional (número) -->
                <a href="{{ route('login') }}"
                    class="flex items-center justify-center w-10 h-10 text-md font-medium text-white bg-gray-400  dark:border-gray-200 rounded-full border-2 border-white ">
                    <svg class="h-6 fill-white dark:" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M136 192C136 125.7 189.7 72 256 72C322.3 72 376 125.7 376 192C376 258.3 322.3 312 256 312C189.7 312 136 258.3 136 192zM48 546.3C48 447.8 127.8 368 226.3 368L285.7 368C384.2 368 464 447.8 464 546.3C464 562.7 450.7 576 434.3 576L77.7 576C61.3 576 48 562.7 48 546.3zM544 160C557.3 160 568 170.7 568 184L568 232L616 232C629.3 232 640 242.7 640 256C640 269.3 629.3 280 616 280L568 280L568 328C568 341.3 557.3 352 544 352C530.7 352 520 341.3 520 328L520 280L472 280C458.7 280 448 269.3 448 256C448 242.7 458.7 232 472 232L520 232L520 184C520 170.7 530.7 160 544 160z" />
                    </svg>
                </a>
            </div>
        </div>


    </div>








</div>
