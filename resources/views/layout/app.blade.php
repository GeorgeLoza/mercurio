<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('build/assets/app-da32ce76.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-1ee0a1af.css') }}">

    <script src="{{ asset('build/assets/app-56df689c.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/flowbite.js') }}"></script>

    <title>Soalpro</title>
    @livewireStyles
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireScripts
    @stack('scripts')


</head>

<body class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-300 min-h-screen ">

    <nav class="fixed top-0 z-50 w-full bg-gray-100  dark:bg-gray-900  shadow-sm dark:shadow-gray-800">
        <div class="px-3 py-1 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg 2xl:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only"> </span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>

                    <a @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 1)->where('permiso_id', 2)->isNotEmpty()) href="{{ route('inicio') }}" @endif class="flex ms-2 md:me-24">
                        <span
                            class="flex self-center text-base font-semibold sm:text-base whitespace-nowrap dark:text-white">SOALPRO
                            <span class="hidden md:flex ml-1">- PLANTA LÁCTEOS</span></span>




                        {{-- <div class=" flex  flex-col border border-pink-500 bg-pink-200 items-center px-1 py-0">
                            <div class="items-start text-2xs w-full px-0 dark:text-black">27</div>
                            <div class="py-0 text-xs dark:text-black">Má</div>
                            <div class="text-2xs dark:text-black px-1">Mamá</div>

                        </div> --}}
                    </a>



                    @php
                        use Carbon\Carbon;
                        $hoy = Carbon::now();
                        $mama = $hoy->month == 5 && $hoy->day >= 27;
                        $juan = $hoy->month == 6 && $hoy->day >= 23 && $hoy->day <= 24;
                    @endphp

                    @if ($mama)
                        <div>
                            <!-- Botón con SVG pequeño -->
                            <div class="inline-block cursor-pointer" onclick="showBigSVG('svgModalMama')">
                                <!-- Pequeño SVG para el día de la madre -->
                                <svg viewBox="0 0 200 240" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10"
                                    fill="none">
                                    <circle cx="70" cy="60" r="20" fill="#f9c5d1" />
                                    <circle cx="110" cy="80" r="14" fill="#fcddec" />
                                    <path d="M50 80 C30 130, 80 160, 70 190 Q90 170, 110 150 C130 130, 90 100, 70 90"
                                        fill="#f9c5d1" />
                                    <path d="M60 100 Q40 130, 80 140" stroke="#d88ca4" stroke-width="5"
                                        fill="none" />
                                    <path d="M90 100 Q120 120, 100 140" stroke="#d88ca4" stroke-width="5"
                                        fill="none" />
                                    <path
                                        d="M140 50 C140 40, 160 40, 160 50 C160 60, 140 70, 140 80 C140 70, 120 60, 120 50 C120 40, 140 40, 140 50Z"
                                        fill="#f7749b" />
                                    <text x="100" y="225" text-anchor="middle" font-family="Verdana" font-size="48"
                                        fill="#d15678">¡Feliz Día!</text>
                                </svg>
                            </div>

                            <!-- Modal grande -->
                            <div id="svgModalMama"
                                class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center"
                                onclick="hideBigSVG('svgModalMama')">
                                <div class="relative" onclick="event.stopPropagation()">
                                    <div class="absolute inset-0 pointer-events-none animate-pulse">
                                        <div class="absolute top-0 left-0 text-yellow-300 text-3xl animate-spin-slow">✨
                                        </div>
                                        <div class="absolute top-0 right-0 text-pink-300 text-2xl animate-spin">✨</div>
                                        <div class="absolute bottom-0 left-10 text-purple-300 text-2xl animate-ping">✨
                                        </div>
                                        <div class="absolute bottom-0 right-10 text-blue-300 text-3xl animate-bounce">✨
                                        </div>
                                    </div>
                                    <!-- SVG Grande -->
                                    <svg viewBox="0 0 200 240" xmlns="http://www.w3.org/2000/svg"
                                        class="h-[400px] w-[600px]" fill="none">
                                        <circle cx="70" cy="60" r="20" fill="#f9c5d1" />
                                        <circle cx="110" cy="80" r="14" fill="#fcddec" />
                                        <path
                                            d="M50 80 C30 130, 80 160, 70 190 Q90 170, 110 150 C130 130, 90 100, 70 90"
                                            fill="#f9c5d1" />
                                        <path d="M60 100 Q40 130, 80 140" stroke="#d88ca4" stroke-width="5"
                                            fill="none" />
                                        <path d="M90 100 Q120 120, 100 140" stroke="#d88ca4" stroke-width="5"
                                            fill="none" />
                                        <path
                                            d="M140 50 C140 40, 160 40, 160 50 C160 60, 140 70, 140 80 C140 70, 120 60, 120 50 C120 40, 140 40, 140 50Z"
                                            fill="#f7749b" />
                                        <text x="100" y="225" text-anchor="middle" font-family="Verdana" font-size="48"
                                            fill="#d15678">¡Feliz Día Mamá!</text>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($juan)
                        <div class="h-10 w-10">
                            <div class="inline-block cursor-pointer" onclick="showBigSVG('svgModalJuan')">
                                <!-- Icono pequeño para San Juan -->

                                <div class="h-10 w-10  flex items-center justify-center">
                                    🌭
                                </div>

                            </div>

                            <div id="svgModalJuan"
                                class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center"
                                onclick="hideBigSVG('svgModalJuan')">
                                <div class="relative" onclick="event.stopPropagation()">
                                    <div class="absolute inset-0 pointer-events-none animate-pulse">
                                        <div class="absolute top-0 left-0 text-yellow-300 text-3xl animate-spin-slow">✨
                                        </div>
                                        <div class="absolute top-0 right-0 text-pink-300 text-2xl animate-spin">✨</div>
                                        <div class="absolute bottom-0 left-10 text-purple-300 text-2xl animate-ping">✨
                                        </div>
                                        <div class="absolute bottom-0 right-10 text-blue-300 text-3xl animate-bounce">✨
                                        </div>
                                    </div>
                                    <!-- SVG grande para San Juan -->
                                    <div class="h-[400px] w-[600px]  flex flex-col items-center justify-center">
                                        <p class="text-[350px]">
                                            🌭
                                        </p>

                                        <p class="text-[60px] font-bold">¡Feliz San <span class="font-extrabold">
                                                Juan</span>!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Animaciones personalizadas y scripts generales -->
                    <style>
                        @keyframes spin-slow {
                            0% {
                                transform: rotate(0deg);
                            }

                            100% {
                                transform: rotate(360deg);
                            }
                        }

                        .animate-spin-slow {
                            animation: spin-slow 8s linear infinite;
                        }
                    </style>

                    <script>
                        function showBigSVG(id) {
                            const modal = document.getElementById(id);
                            modal.classList.remove('hidden');
                            modal.classList.add('flex');
                        }

                        function hideBigSVG(id) {
                            const modal = document.getElementById(id);
                            modal.classList.remove('flex');
                            modal.classList.add('hidden');
                        }
                    </script>




                </div>
                <div class="flex gap-1 text-sm ">


                    <div x-data="{ isLoaded: false }" x-init="window.addEventListener('DOMContentLoaded', () => { isLoaded = true })" x-show="isLoaded" wire:ignore>
                        @livewire('screenSaver')
                    </div>








                    @livewire('date-time-display')
                </div>
                <div class="hidden md:block">@livewire('calculadora-juliano')</div>
                @php
                    use App\Models\Cambio;
                    

                    $mostrarBoton = false;
                    $mostrarModal = false;
                    $userRoleId = auth()->user()->rol_id;
                    $hoy = Carbon::today();

                    $ultimoCambioVigente = null;

                    foreach (Cambio::all() as $cambio) {
                        // Procesar roles
                        $roles = $cambio->roles;
                        if (is_null($roles)) {
                            $roles = [];
                        } elseif (!is_array($roles)) {
                            $roles = json_decode($roles, true) ?: [];
                        }
                        $rolesInt = array_map('intval', $roles);

                        // Procesar fechas
                        $inicio = $cambio->fecha_inicio ? Carbon::parse($cambio->fecha_inicio) : null;
                        $fin = $cambio->fecha_fin ? Carbon::parse($cambio->fecha_fin) : null;

                        $vigente = true;
                        if ($inicio && $fin) {
                            $vigente = $hoy->between($inicio, $fin);
                        } elseif ($inicio) {
                            $vigente = $hoy->gte($inicio);
                        } elseif ($fin) {
                            $vigente = $hoy->lte($fin);
                        }

                        // Si el usuario tiene el rol y el aviso está vigente
                        if (in_array($userRoleId, $rolesInt) && $vigente) {
                            $mostrarBoton = true;
                            $ultimoCambioVigente = $cambio;
                            break;
                        }
                    }

                    // Mostrar el modal solo si hay un cambio vigente y el usuario no lo ha visto
                    if ($mostrarBoton && $ultimoCambioVigente) {
                        $user = auth()->user();
                        if (!$user->last_cambio_visto || $user->last_cambio_visto < $ultimoCambioVigente->id) {
                            $mostrarModal = true;
                        }
                    }
                @endphp

                @if ($mostrarBoton)
                    <button type="button"
                        onclick="Livewire.dispatch('openModal', { component: 'cambios.avisoModal' })"
                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor"
                            viewBox="0 0 448 512">
                            <path
                                d="M224 0c-17.7 0-32 14.3-32 32l0 3.2C119 50 64 114.6 64 192l0 21.7c0 48.1-16.4 94.8-46.4 132.4L7.8 358.3C2.7 364.6 0 372.4 0 380.5 0 400.1 15.9 416 35.5 416l376.9 0c19.6 0 35.5-15.9 35.5-35.5 0-8.1-2.7-15.9-7.8-22.2l-9.8-12.2C400.4 308.5 384 261.8 384 213.7l0-21.7c0-77.4-55-142-128-156.8l0-3.2c0-17.7-14.3-32-32-32zM162 464c7.1 27.6 32.2 48 62 48s54.9-20.4 62-48l-124 0z" />
                        </svg>
                        <span class="sr-only">Notifications</span>
                        <div
                            class="absolute inline-flex items-center justify-center w-3 h-3 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-0 -end-0 dark:border-gray-900">
                        </div>
                    </button>
                @endif

                @if ($mostrarModal)
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Livewire.dispatch('openModal', {
                                component: 'cambios.avisoModal'
                            });
                        });
                    </script>
                @endif

                <div class="flex gap-2">



                    <div class="flex items-center">
                        <div><button data-popover-target="popover-description" data-popover-placement="bottom-end"
                                type="button"><svg class="w-5 h-5 ms-2 text-gray-400 hover:text-gray-500"
                                    aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg><span class="sr-only">Show information</span></button>
                            <div data-popover id="popover-description" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Para soporte, o reporte de
                                    fallo
                                    comunicarse con el siguiente numero</h3>
                                <p class="flex "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-4 h-4 mx-1 fill-gray-400 hover:fill-gray-500">
                                        <path d="M164.9
                                        24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512
                                        448 512c18 0 33.8-12.1
                                        38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3
                                        11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30
                                        11.6-46.3l-40-96z" />
                                    </svg><span> : 69960519</span> </p>
                                <p class="flex "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="w-4 h-4 mx-1 fill-gray-400 hover:fill-gray-500">
                                        <path
                                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                    </svg><span> : 77540313</span> </p>
                                <livewire:switch-user />
                            </div>
                        </div>

                        <div class="flex items-center ms-3 gap-3">
                            {{-- @livewire('notifications-dropdown') --}}
                            <div class="flex justify-center content-center gap-3 ">
                                <button type="button" class="flex text-sm" aria-expanded="false"
                                    data-dropdown-toggle="dropdown-user">
                                    @php
                                        $bgColor = auth()->user()->color; // ejemplo: #RRGGBB
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

                                        // fórmula simple de luminosidad
                                        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;

                                        $textColor = $luminance > 0.5 ? '#000000' : '#FFFFFF';
                                    @endphp

                                    <div class="flex items-center justify-center w-8 h-8 rounded-full font-bold text-2xs"
                                        style="background-color: {{ $bgColor }}; color: {{ $textColor }}">
                                        {{ auth()->user()->iniciales }}
                                    </div>

                                </button>
                            </div>

                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">



                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}
                                    </p>

                                </div>
                                <ul class="py-1" role="none">

                                    <button>
                                        <a onclick="Livewire.dispatch('openModal', { component: 'usuario-component.perfil' })"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Mi Perfil</a>
                                    </button>


                                    <li>
                                        <form action="{{ route('logout') }}" method="POST"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                            @csrf
                                            <button type="submit" role="menuitem">Cerrar Sesión</button>
                                        </form>
                                    </li>
                                    <li>
                                        <label class=" ml-2 relative  items-center cursor-pointer inline-flex">
                                            <input type="checkbox" id="darkToggle" class="sr-only peer">
                                            <div
                                                class="w-14 h-6 bg-blue-400  border border-gray-500 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full  after:content-[''] after:absolute after:top-[0px] after:start-[0px] after:bg-white peer-checked:after:bg-white after:rounded-full after:h-6 after:w-8 after:transition-all  peer-checked:bg-gray-600">
                                                <div class="flex justify-around">
                                                    <img src="{{ asset('img/iconos/moon.svg') }}" alt=""
                                                        class="h-5 w-5 rounded-md">

                                                    <img src="{{ asset('img/iconos/sun.svg') }}" alt=""
                                                        class="h-5 w-5 rounded-md">
                                                </div>

                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-56 h-screen pt-11 transition-transform -translate-x-full bg-white 2xl:translate-x-0 dark:bg-gray-800  shadow-md dark:shadow-gray-600"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 pt-2 overflow-y-auto bg-gray-100 dark:bg-gray-900">
            <ul class="space-y-2 font-medium text-xs">

                <!--dashboard-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 2)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('dashboard.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">


                            <svg class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path
                                    d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                            </svg>

                            <span class="ms-3">DASHBOARD </span>
                        </a>
                    </li>
                @endif
                <!--ESTADO-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 3)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('estado.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 576 512">
                                <path
                                    d="M64 32C46.3 32 32 46.3 32 64V304v48 80c0 26.5 21.5 48 48 48H496c26.5 0 48-21.5 48-48V304 152.2c0-18.2-19.4-29.7-35.4-21.1L352 215.4V152.2c0-18.2-19.4-29.7-35.4-21.1L160 215.4V64c0-17.7-14.3-32-32-32H64z" />
                            </svg>
                            <span class="ms-3">Estado planta</span>
                        </a>
                    </li>
                @endif
                <!--usuarios-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 4)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('usuario.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 640 512">
                                <path
                                    d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                            </svg>
                            <span class="ms-3">Usuarios</span>
                        </a>
                    </li>
                @endif
                <!--configuracion-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 5)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('general.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 512 512">
                                <path
                                    d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm88 64v64H64V96h88zm56 0h88v64H208V96zm240 0v64H360V96h88zM64 224h88v64H64V224zm232 0v64H208V224h88zm64 0h88v64H360V224zM152 352v64H64V352h88zm56 0h88v64H208V352zm240 0v64H360V352h88z" />
                            </svg>
                            <span class="ms-3">

                                Configuración</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('asignacionPermisos.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white">
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l362.8 0c-5.4-9.4-8.6-20.3-8.6-32l0-128c0-2.1 .1-4.2 .3-6.3c-31-26-71-41.7-114.6-41.7l-91.4 0zM528 240c17.7 0 32 14.3 32 32l0 48-64 0 0-48c0-17.7 14.3-32 32-32zm-80 32l0 48c-17.7 0-32 14.3-32 32l0 128c0 17.7 14.3 32 32 32l160 0c17.7 0 32-14.3 32-32l0-128c0-17.7-14.3-32-32-32l0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80z" />
                            </svg>
                            <span class="ms-3">Administración de
                                permisos</span>
                        </a>
                    </li>
                @endif
                <!--Origen o punto de control   -->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 6)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('origen.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 512 512">
                                <path
                                    d="M256 0c17.7 0 32 14.3 32 32V66.7C368.4 80.1 431.9 143.6 445.3 224H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H445.3C431.9 368.4 368.4 431.9 288 445.3V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.3C143.6 431.9 80.1 368.4 66.7 288H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H66.7C80.1 143.6 143.6 80.1 224 66.7V32c0-17.7 14.3-32 32-32zM128 256a128 128 0 1 0 256 0 128 128 0 1 0 -256 0zm128-80a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                            </svg>
                            <span class="ms-3">Origen</span>
                        </a>
                    </li>
                @endif
                <!--producto-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 7)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('producto.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 576 512">
                                <path
                                    d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H328V80c0 8.8-7.2 16-16 16H264c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H184v80c0 8.8-7.2 16-16 16H120c-8.8 0-16-7.2-16-16V256H64zM352 512H512c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H472v80c0 8.8-7.2 16-16 16H408c-8.8 0-16-7.2-16-16V256H352c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2V464c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z" />
                            </svg>
                            <span class="ms-3">Producto</span>
                        </a>
                    </li>
                @endif
                <!--parametros-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 8)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-xs text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 512 512">
                                <path
                                    d="M.2 468.9C2.7 493.1 23.1 512 48 512l96 0 320 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-48 0 0 80c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-80-64 0 0 80c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-80-64 0 0 80c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-80-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-64-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-64-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-48c0-26.5-21.5-48-48-48L48 0C21.5 0 0 21.5 0 48L0 368l0 96c0 1.7 .1 3.3 .2 4.9z" />
                            </svg>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Parámetros</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 9)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('parametroLinea.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">En
                                        Línea</a>

                                </li>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 10)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('parametroLeche.indexLeche') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Leche</a>
                                </li>
                            @endif

                            <li class="hidden">
                                <a href="#"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Seguimientos</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!--orp-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 11)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('orp.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 512 512">
                                <path
                                    d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                            </svg>
                            <span class="ms-3">ORP</span>
                        </a>
                    </li>
                @endif
                <!--UHT-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 12)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('uht.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <svg class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M32 32c17.7 0 32 14.3 32 32l0 224c0 70.7 57.3 128 128 128s128-57.3 128-128l0-224c0-17.7 14.3-32 32-32s32 14.3 32 32l0 224c0 106-86 192-192 192S0 394 0 288L0 64C0 46.3 14.3 32 32 32z" />
                            </svg>
                            <span class="ms-3">UHT</span>
                        </a>
                    </li>
                @endif
                <!--HTST-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 13)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('htst.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <svg class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M320 256l0 192c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224 0-160c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 128L64 192 64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-192 256 0z" />
                            </svg>
                            <span class="ms-3">HTST</span>
                        </a>
                    </li>
                @endif
                <!--solicitud de analisis en linea-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 14)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('solicitudLinea.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 448 512">
                                <path
                                    d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                            </svg>
                            <span class="ms-3">Solicitud Análisis</span>
                        </a>
                    </li>
                @endif
                <!--analisis en linea-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 15)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('analisisLinea.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 512 512">
                                <path
                                    d="M0 64C0 46.3 14.3 32 32 32H96h64 64c17.7 0 32 14.3 32 32s-14.3 32-32 32V266.8c-20.2 28.6-32 63.5-32 101.2c0 25.2 5.3 49.1 14.8 70.8C189.5 463.7 160.6 480 128 480c-53 0-96-43-96-96V96C14.3 96 0 81.7 0 64zM96 96v96h64V96H96zM224 368a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm211.3-43.3c-6.2-6.2-16.4-6.2-22.6 0L352 385.4l-28.7-28.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l40 40c6.2 6.2 16.4 6.2 22.6 0l72-72c6.2-6.2 6.2-16.4 0-22.6z" />
                            </svg>
                            <span class="ms-3">Resultado Análisis</span>
                        </a>
                    </li>
                @endif
                <!--contador-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 16)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-xs text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-contador" data-collapse-toggle="dropdown-contador">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 384 512">
                                <path
                                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM96 64H288c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32zm32 160a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zM96 352a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM64 416c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zM192 256a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zm64-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zM288 448a32 32 0 1 1 0-64 32 32 0 1 1 0 64z" />
                            </svg>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Contador</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-contador" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#"
                                    class=" items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hidden">
                                    Materia Prima</a>
                            </li>
                            <li>
                                <a href="{{ route('contadorProductoTerminado.index') }}"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Producto Terminado</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!--Almacen-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 17)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-xs text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-almacen" data-collapse-toggle="dropdown-almacen">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 576 512">
                                <path
                                    d="M0 32C0 14.3 14.3 0 32 0h72.9c27.5 0 52 17.6 60.7 43.8L257.7 320c30.1 .5 56.8 14.9 74 37l202.1-67.4c16.8-5.6 34.9 3.5 40.5 20.2s-3.5 34.9-20.2 40.5L352 417.7c-.9 52.2-43.5 94.3-96 94.3c-53 0-96-43-96-96c0-30.8 14.5-58.2 37-75.8L104.9 64H32C14.3 64 0 49.7 0 32zM244.8 134.5c-5.5-16.8 3.7-34.9 20.5-40.3L311 79.4l19.8 60.9 60.9-19.8L371.8 59.6l45.7-14.8c16.8-5.5 34.9 3.7 40.3 20.5l49.4 152.2c5.5 16.8-3.7 34.9-20.5 40.3L334.5 307.2c-16.8 5.5-34.9-3.7-40.3-20.5L244.8 134.5z" />
                            </svg>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Almacenes</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-almacen" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Materia Prima</a>
                            </li>
                            <li>
                                <a href="{{ route('almacenProductoTerminado.index') }}"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Producto Terminado</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!--recepcion de leche-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 18)->where('permiso_id', 2)->isNotEmpty())

                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-xs text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-leche" data-collapse-toggle="dropdown-leche">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 640 512">

                                <path
                                    d="M0 48C0 21.5 21.5 0 48 0H368c26.5 0 48 21.5 48 48V96h50.7c17 0 33.3 6.7 45.3 18.7L589.3 192c12 12 18.7 28.3 18.7 45.3V256v32 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H576c0 53-43 96-96 96s-96-43-96-96H256c0 53-43 96-96 96s-96-43-96-96H48c-26.5 0-48-21.5-48-48V48zM416 256H544V237.3L466.7 160H416v96zM160 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm368-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM208 272c39.8 0 72-29.6 72-66c0-27-39.4-82.9-59.9-110.3c-6.1-8.2-18.1-8.2-24.2 0C175.4 123 136 179 136 206c0 36.5 32.2 66 72 66z" />
                            </svg>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Leche</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <ul id="dropdown-leche" class="hidden py-2 space-y-2">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 19)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('leche_recepcion.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Recepción de Leche</a>
                                </li>
                            @endif

                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 20)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('leche_analisis.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Análisis de Leche</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <!-- Externos -->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 21)->where('permiso_id', 2)->isNotEmpty())

                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-xs text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-externo" data-collapse-toggle="dropdown-externo">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 512 512">
                                <path
                                    d="M352 0c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9L370.7 96 201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L416 141.3l41.4 41.4c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V32c0-17.7-14.3-32-32-32H352zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z" />
                            </svg>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Externo</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-externo" class="hidden py-2 space-y-2">

                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 22)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('solicitudPlanta.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Solicitud Planta</a>
                                </li>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 23)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('productosPlanta.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Productos Planta</a>
                                </li>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 24)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('certificado.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Certificados FisicoQuimicos</a>
                                </li>
                                <li>
                                    <a href="{{ route('certificadoMicrobiologia.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Certificados Microbiología</a>
                                </li>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 25)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('informacion.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Información Usuario</a>
                                </li>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 26)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('tipoMuestra.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Tipo Muestra</a>
                                </li>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 27)->where('permiso_id', 2)->isNotEmpty())
                                <!--<li>
                                    <a href="{{ route('verificacionEquipo.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Verificación de equipo</a>
                                </li>-->
                                <li>
                                    <a href="{{ route('actividadAgua.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Actividad de Agua</a>
                                </li>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 28)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('microbiologia.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Microbiología</a>
                                </li>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 31)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('aguaFisico.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Red de Agua</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif


                <!-- DATOS -->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 29)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('datos.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">


                            <svg class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zm-312 8l0 64c0 13.3 10.7 24 24 24s24-10.7 24-24l0-64c0-13.3-10.7-24-24-24s-24 10.7-24 24zm80-96l0 160c0 13.3 10.7 24 24 24s24-10.7 24-24l0-160c0-13.3-10.7-24-24-24s-24 10.7-24 24zm80 64l0 96c0 13.3 10.7 24 24 24s24-10.7 24-24l0-96c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            <span class="ms-3">Datos</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 30)->where('permiso_id', 2)->isNotEmpty())
                    <!--sustancia controladas-->
                    <li>
                        <a href="{{ route('sustanciasControladas.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 640 512">
                                <path
                                    d="M288 0L160 0 128 0C110.3 0 96 14.3 96 32s14.3 32 32 32l0 132.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512l309.2 0c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5L320 64c17.7 0 32-14.3 32-32s-14.3-32-32-32L288 0zM192 196.8L192 64l64 0 0 132.8c0 23.7 6.6 46.9 19 67.1L309.5 320l-171 0L173 263.9c12.4-20.2 19-43.4 19-67.1z" />
                            </svg>


                            <span class="ms-3">Sustancias Químicas</span>
                        </a>
                    </li>
                @endif

                <!--dispositivos de Medicion-->


                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 38)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-xs text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-permisos" data-collapse-toggle="dropdown-permisos">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white">
                                <path
                                    d="M469.3 19.3l23.4 23.4c25 25 25 65.5 0 90.5l-56.4 56.4L322.3 75.7l56.4-56.4c25-25 65.5-25 90.5 0zM44.9 353.2L299.7 98.3 413.7 212.3 158.8 467.1c-6.7 6.7-15.1 11.6-24.2 14.2l-104 29.7c-8.4 2.4-17.4 .1-23.6-6.1s-8.5-15.2-6.1-23.6l29.7-104c2.6-9.2 7.5-17.5 14.2-24.2zM249.4 103.4L103.4 249.4 16 161.9c-18.7-18.7-18.7-49.1 0-67.9L94.1 16c18.7-18.7 49.1-18.7 67.9 0l19.8 19.8c-.3 .3-.7 .6-1 .9l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l64-64c.3-.3 .6-.7 .9-1l45.1 45.1zM408.6 262.6l45.1 45.1c-.3 .3-.7 .6-1 .9l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l64-64c.3-.3 .6-.7 .9-1L496 350.1c18.7 18.7 18.7 49.1 0 67.9L417.9 496c-18.7 18.7-49.1 18.7-67.9 0l-87.4-87.4L408.6 262.6z" />
                            </svg>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Dispositivos de
                                medición</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <ul id="dropdown-permisos" class="hidden py-2 space-y-2">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 38)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('dispositivosMedicion.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Administración</a>

                                </li>
                            @endif
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 38)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('VerificacionAjuste.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Verificación</a>
                                </li>
                            @endif

                            <li class="hidden">
                                <a href="#"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Seguimientos</a>
                            </li>
                        </ul>
                    </li>

                @endif

                <!--seguimiento-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 32)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('seguimiento.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M128 0c13.3 0 24 10.7 24 24l0 40 144 0 0-40c0-13.3 10.7-24 24-24s24 10.7 24 24l0 40 40 0c35.3 0 64 28.7 64 64l0 16 0 48 0 256c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 192l0-48 0-16C0 92.7 28.7 64 64 64l40 0 0-40c0-13.3 10.7-24 24-24zM400 192L48 192l0 256c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-256zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                            </svg>

                            <span class="ms-3">Seguimiento UHT</span>
                        </a>
                    </li>
                @endif
                <!--seguimiento htst-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 34)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('seguimientoHtst.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M128 0c13.3 0 24 10.7 24 24l0 40 144 0 0-40c0-13.3 10.7-24 24-24s24 10.7 24 24l0 40 40 0c35.3 0 64 28.7 64 64l0 16 0 48 0 256c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 192l0-48 0-16C0 92.7 28.7 64 64 64l40 0 0-40c0-13.3 10.7-24 24-24zM400 192L48 192l0 256c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-256zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                            </svg>

                            <span class="ms-3">Seguimiento HTST</span>
                        </a>
                    </li>
                @endif
                <!--dESINFECCION-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 33)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('desinfeccion.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                            <svg class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M128 0l64 0c17.7 0 32 14.3 32 32l0 96L96 128l0-96c0-17.7 14.3-32 32-32zM0 256c0-53 43-96 96-96l128 0c53 0 96 43 96 96l0 208c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 256zm240 80A80 80 0 1 0 80 336a80 80 0 1 0 160 0zM256 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM384 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm64 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM448 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM384 128a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>

                            <span class="ms-3">Desinfección</span>
                        </a>
                    </li>
                @endif



                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 36)->where('permiso_id', 2)->isNotEmpty())

                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-xs text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-higiene" data-collapse-toggle="dropdown-higiene">


                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 576 512">
                                <path
                                    d="M416 64a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm96 128a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM160 464a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM32 160l.1 72.6c.1 52.2 24 101 64 133.1c-.1-1.9-.1-3.8-.1-5.7l0-8c0-71.8 37-138.6 97.9-176.7l60.2-37.6c8.6-5.4 17.9-8.4 27.3-9.4l45.9-79.5c6.6-11.5 2.7-26.2-8.8-32.8s-26.2-2.7-32.8 8.8l-78 135.1c-3.3 5.7-10.7 7.7-16.4 4.4s-7.7-10.7-4.4-16.4l62-107.4c6.6-11.5 2.7-26.2-8.8-32.8S214 5 207.4 16.5l-68 117.8s0 0 0 0s0 0 0 0l-43.3 75L96 160c0-17.7-14.4-32-32-32s-32 14.4-32 32zM332.1 88.5L307.5 131c13.9 4.5 26.4 13.7 34.7 27c.9 1.5 1.8 2.9 2.5 4.4l28.9-50c6.6-11.5 2.7-26.2-8.8-32.8s-26.2-2.7-32.8 8.8zm46.4 63.7l-26.8 46.4c-.6 6-2.1 11.8-4.3 17.4l4.7 0 13.3 0s0 0 0 0l31.8 0 23-39.8c6.6-11.5 2.7-26.2-8.8-32.8s-26.2-2.7-32.8 8.8zM315.1 175c-9.4-15-29.1-19.5-44.1-10.2l-60.2 37.6C159.3 234.7 128 291.2 128 352l0 8c0 8.9 .8 17.6 2.2 26.1c35.4 8.2 61.8 40 61.8 77.9c0 6.3-.7 12.5-2.1 18.4C215.1 501 246.3 512 280 512l176 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-92 0c-6.6 0-12-5.4-12-12s5.4-12 12-12l124 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-124 0c-6.6 0-12-5.4-12-12s5.4-12 12-12l156 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-156 0c-6.6 0-12-5.4-12-12s5.4-12 12-12l124 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-136 0s0 0 0 0s0 0 0 0l-93.2 0L305 219.1c15-9.4 19.5-29.1 10.2-44.1z" />
                            </svg>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Higiene</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <ul id="dropdown-higiene" class="hidden py-2 space-y-2">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 36)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('hisopado.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Hisopados</a>
                                </li>
                            @endif


                        </ul>
                    </li>
                @endif


                <!--liberacion-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 37)->where('permiso_id', 2)->isNotEmpty())
                    <li>
                        <a href="{{ route('liberacion.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path
                                    d="M96 80c0-26.5 21.5-48 48-48l288 0c26.5 0 48 21.5 48 48l0 304L96 384 96 80zm313 47c-9.4-9.4-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L409 161c9.4-9.4 9.4-24.6 0-33.9zM0 336c0-26.5 21.5-48 48-48l16 0 0 128 448 0 0-128 16 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48L48 480c-26.5 0-48-21.5-48-48l0-96z" />
                            </svg>

                            <span class="ms-3">Liberación</span>
                        </a>
                    </li>
                @endif




                <!--materia prima-->
                @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 35)->where('permiso_id', 2)->isNotEmpty())

                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-xs text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-mp" data-collapse-toggle="dropdown-mp">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 640 512">

                                <path
                                    d="M288 64L288 128C288 136.8 295.2 144 304 144L336 144C344.8 144 352 136.8 352 128L352 64L384 64C419.3 64 448 92.7 448 128L448 256C448 261.5 447.3 266.9 446 272L194 272C192.7 266.9 192 261.5 192 256L192 128C192 92.7 220.7 64 256 64L288 64zM384 576C372.8 576 362.2 573.1 353 568C362.5 551.5 368 532.4 368 512L368 384C368 363.6 362.5 344.5 353 328C362.2 322.9 372.7 320 384 320L416 320L416 384C416 392.8 423.2 400 432 400L464 400C472.8 400 480 392.8 480 384L480 320L512 320C547.3 320 576 348.7 576 384L576 512C576 547.3 547.3 576 512 576L384 576zM64 384C64 348.7 92.7 320 128 320L160 320L160 384C160 392.8 167.2 400 176 400L208 400C216.8 400 224 392.8 224 384L224 320L256 320C291.3 320 320 348.7 320 384L320 512C320 547.3 291.3 576 256 576L128 576C92.7 576 64 547.3 64 512L64 384z" />
                            </svg>


                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Materia Prima</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <ul id="dropdown-mp" class="hidden py-2 space-y-2">
                            @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 35)->where('permiso_id', 2)->isNotEmpty())
                                <li>
                                    <a href="{{ route('recepcionMP.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Recepción de Materia Prima</a>
                                </li>
                            @endif


                        </ul>
                    </li>
                @endif


            </ul>
        </div>
    </aside>

    <div class="md:p-2 2xl:ml-56">



        <div class="">
            <div class=" flex justify-between  mt-12 md:mt-8 text-xl text-center font-bold p-2 uppercase ">
                <div></div>
                @yield('titulo')

                @livewire('PaginaFunciones')
            </div>
            <div class=" md:px-2">
                @yield('contenido')
            </div>

        </div>
        <!--mensajes-->
        @livewire('alert.toast')
    </div>

    @livewire('wire-elements-modal')

    @stack('scripts')


</body>

</html>
