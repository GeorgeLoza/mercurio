<div>






    @foreach ($resultados_agrupados as $preparacion => $resultados)
        <div
            class="block mb-2 py-2 px-4 bg-white border border-gray-200 rounded-lg rounded-tl-none shadow  dark:bg-gray-800 dark:border-gray-700 ">
            <!--Datos generales de Orp-->
            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Preparación:
                {{ $preparacion }}
            </h5>











            <ol class="lg:flex">
                @foreach ($resultados as $resultado)
                    @if ($resultado->estadoPlanta->etapa->id != 8)
                        <li class="relative mb-6 sm:mb-0 lg:w-1/{{ count($resultados) }} w-full mt-3">
                            <div class="flex items-center">
                                <div
                                    class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                    @if ($resultado->estadoPlanta->etapa->id == 1)
                                        <svg class="w-2.5 h-2.5  text-blue-800 dark:text-blue-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    @endif
                                    @if ($resultado->estadoPlanta->etapa->id == 2)
                                        <svg class="w-2.5 h-2.5  text-blue-800 dark:text-blue-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    @endif
                                    @if ($resultado->estadoPlanta->etapa->id == 3)
                                        <svg class="w-2.5 h-2.5  text-blue-800 dark:text-blue-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    @endif
                                    @if ($resultado->estadoPlanta->etapa->id == 4)
                                        <svg class="w-2.5 h-2.5  text-blue-800 dark:text-blue-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    @endif

                                </div>
                                <p class="text-sm ml-4 whitespace-nowrap font-semibold text-gray-900 dark:text-white">
                                    {{ $resultado->estadoPlanta->etapa->nombre }}</p>
                                <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                            </div>
                            <div class="mt-3 sm:pe-8">
                                <div class="mb-1">
                                    <div class="flex gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512" class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                            <path transform="scale(0.8 0.8)"
                                                d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                            <path transform="scale(0.8 0.8)"
                                                d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                                        </svg>
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                            {{ $resultado->estadoPlanta->origen->alias }}</h3>
                                    </div>
                                    <div class="flex gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                            <path
                                                d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                        <p
                                            class="block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                            {{ \Carbon\Carbon::parse($resultado->estadoPlanta->tiempo)->isoFormat(
                                                'HH:mm
                                                                                                                                                                                                            DD/MMM',
                                                0,
                                                'es',
                                            ) }}
                                        </p>
                                    </div>
                                    <div class="flex gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                            <path
                                                d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v17.7c0 7.8 4.8 14.8 11.6 18.7c6.8 3.9 15.1 4.5 21.8 .6l13.8-7.9c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-14.4 8.3c-6.5 3.7-10 10.9-10 18.4s3.5 14.7 10 18.4l14.4 8.3c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-13.8-7.9c-6.7-3.9-15.1-3.3-21.8 .6c-6.8 3.9-11.6 10.9-11.6 18.7v17.7c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V467.8c0-7.9-4.9-14.9-11.7-18.9c-6.8-3.9-15.2-4.5-22-.6l-13.5 7.8c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l14-8.1c6.5-3.8 10.1-11.1 10.1-18.6s-3.5-14.8-10.1-18.6l-14-8.1c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l13.6 7.8c6.8 3.9 15.2 3.3 22-.6c6.9-3.9 11.7-11 11.7-18.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z" />
                                        </svg>
                                        <p
                                            class="block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                            {{ substr($resultado->estadoPlanta->user->nombre, 0, 1) .
                                                substr(explode(' ', $resultado->estadoPlanta->user->nombre)[1] ?? '', 0, 1) .
                                                substr($resultado->estadoPlanta->user->apellido, 0, 1) .
                                                substr(explode(' ', $resultado->estadoPlanta->user->apellido)[1] ?? '', 0, 1) }}
                                        </p>
                                    </div>
                                </div>
                                <!--Datos Analisis-->
                                @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last())
                                    <div class="rounded-md border border-gray-400 p-1">
                                        <table class="text-sm font-normal text-gray-500 dark:text-gray-400 ">
                                            <tr>
                                                <td class="w-28">Temperatura [°C]:</td>
                                                <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->temperatura }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-24">pH:</td>
                                                <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->ph }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-28">Acidez: [%]</td>
                                                <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->acidez }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-24">Sólidos [°Bx]:</td>
                                                <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->brix }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-24">Analista:</td>
                                                <td>
                                                    @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user)
                                                        {{ substr($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->nombre, 0, 1) .
                                                            substr(
                                                                explode(' ', $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->nombre)[1] ?? '',
                                                                0,
                                                                1,
                                                            ) .
                                                            substr($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->apellido, 0, 1) .
                                                            substr(
                                                                explode(' ', $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->apellido)[1] ?? '',
                                                                0,
                                                                1,
                                                            ) }}
                                                    @endif

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                @endif


                            </div>
                        </li>
                    @endif

                    @if ($resultado->estadoPlanta->etapa->id == 8)
                        <li class="relative mb-6 sm:mb-0  w-full mt-3 ">
                            <div class="flex items-center">
                                <div
                                    class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                    <svg class="w-2.5 h-2.5  text-blue-800 dark:text-blue-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <p class="text-sm ml-4 whitespace-nowrap font-semibold text-gray-900 dark:text-white">
                                    {{ $resultado->estadoPlanta->etapa->nombre }}</p>
                                <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                            </div>
                            <div class="mt-3 sm:pe-8 ">
                                <div class="mb-1">
                                    <div class="flex gap-2"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512" class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                            <path transform="scale(0.8 0.8)"
                                                d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                                            <path transform="scale(0.8 0.8)"
                                                d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
                                        </svg>
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                            @foreach ($resultados as $resultado)
                                                @if ($resultado->estadoPlanta->etapa->id == 8)
                                                    {{ $resultado->estadoPlanta->origen->alias }}
                                                @endif
                                            @endforeach
                                        </h3>
                                    </div>
                                    <div class="flex gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                            <path
                                                d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                        <p
                                            class="block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                            {{ \Carbon\Carbon::parse($resultado->estadoPlanta->tiempo)->isoFormat(
                                                'HH:mm
                                                                                                                                                            DD/MMM',
                                                0,
                                                'es',
                                            ) }}
                                        </p>
                                    </div>
                                    <div class="flex gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            class="w-4 h-4 fill-gray-800 dark:fill-gray-400">
                                            <path
                                                d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v17.7c0 7.8 4.8 14.8 11.6 18.7c6.8 3.9 15.1 4.5 21.8 .6l13.8-7.9c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-14.4 8.3c-6.5 3.7-10 10.9-10 18.4s3.5 14.7 10 18.4l14.4 8.3c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-13.8-7.9c-6.7-3.9-15.1-3.3-21.8 .6c-6.8 3.9-11.6 10.9-11.6 18.7v17.7c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V467.8c0-7.9-4.9-14.9-11.7-18.9c-6.8-3.9-15.2-4.5-22-.6l-13.5 7.8c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l14-8.1c6.5-3.8 10.1-11.1 10.1-18.6s-3.5-14.8-10.1-18.6l-14-8.1c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l13.6 7.8c6.8 3.9 15.2 3.3 22-.6c6.9-3.9 11.7-11 11.7-18.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z" />
                                        </svg>
                                        <p
                                            class="block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                                            {{ substr($resultado->estadoPlanta->user->nombre, 0, 1) .
                                                substr(explode(' ', $resultado->estadoPlanta->user->nombre)[1] ?? '', 0, 1) .
                                                substr($resultado->estadoPlanta->user->apellido, 0, 1) .
                                                substr(explode(' ', $resultado->estadoPlanta->user->apellido)[1] ?? '', 0, 1) }}
                                        </p>
                                    </div>
                                </div>
                                <!--Datos Analisis-->

                                <div class="rounded-md border border-gray-400 p-1 max-h-60 overflow-y-auto">
                                    @foreach ($resultados as $resultado)
                                        @if ($resultado->estadoPlanta->etapa->id == 8)
                                            <div>
                                                @if (count($resultado->estadoPlanta->solicitudAnalisisLinea) >= 1)
                                                    <p class="text-sm">Origen:
                                                        {{ $resultado->estadoPlanta->origen->alias }}
                                                    <table
                                                        class="text-sm font-normal text-gray-500 dark:text-gray-400 border-b-2 ">
                                                        <tr>
                                                            <td class="w-28">Temperatura [°C]:</td>
                                                            <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->temperatura }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-28">pH:</td>
                                                            <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->ph }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-28">Acidez [%]:</td>
                                                            <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->acidez }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-28">Sólidos [°Bx]:</td>
                                                            <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->brix }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-28">Volumen [ml]:</td>
                                                            <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->volumen }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-28">Peso [gr]:</td>
                                                            <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->peso }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-28">Densidad [gr/ml]:</td>
                                                            <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->densidad }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-28">sentidos:</td>
                                                            <td>{{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->color }}
                                                                {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->sabor }}
                                                                {{ $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->olor }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="w-24">Analista:</td>
                                                            <td>
                                                                @if ($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user)
                                                                    {{ substr($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->nombre, 0, 1) .
                                                                        substr(
                                                                            explode(' ', $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->nombre)[1] ?? '',
                                                                            0,
                                                                            1,
                                                                        ) .
                                                                        substr($resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->apellido, 0, 1) .
                                                                        substr(
                                                                            explode(' ', $resultado->estadoPlanta->solicitudAnalisisLinea->last()->analisisLinea->user->apellido)[1] ?? '',
                                                                            0,
                                                                            1,
                                                                        ) }}
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    </table>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                </div>



                            </div>
                        </li>
                    @endif
                @endforeach




            </ol>

        </div>
    @endforeach




</div>
