<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('build/assets/app-da32ce76.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-b2d47199.css') }}">
    <script src="{{ asset('build/assets/app-56df689c.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/flowbite.js') }}"></script>


    @vite('resources/css/app.css')
    @vite('resources/js/app.js')




    <title>Soalpro</title>

</head>

<body class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-300 min-h-screen ">

    <nav class="fixed top-0 z-50 w-full bg-gray-100  dark:bg-gray-900  shadow-sm dark:shadow-gray-800">
        <div class="px-3 py-1 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg 2xl:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">-bg-cyan-950bar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>

                    <a @if (!in_array(auth()->user()->rol, ['Ext'])) href="{{ route('inicio') }}" @endif class="flex ms-2 md:me-24">
                        <span
                            class="flex self-center text-base font-semibold sm:text-base whitespace-nowrap dark:text-white">SOALPRO
                            <span class="hidden md:flex ml-1">- PLANTA LÁCTEOS</span></span>
                    </a>
                </div>
                <div class="flex gap-1 text-sm "> @livewire('screenSaver'){{ auth()->user()->nombre }} - @livewire('date-time-display') </div>
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
                                <h3 class="font-semibold text-gray-900 dark:text-white">Para soporte, o reporte de fallo
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
                            @livewire('notifications-dropdown')
                            <div class="flex justify-center content-center gap-3 ">
                                <button type="button" class="flex text-sm" aria-expanded="false"
                                    data-dropdown-toggle="dropdown-user">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 fill-gray-600 dark:fill-gray-400" viewBox="0 0 512 512">
                                        <path
                                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                                    </svg>
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
                <!--ESTADO-->
                @if (in_array(auth()->user()->rol, ['Admi', 'Jef', 'Sup', 'HTST', 'UHT']))
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
                @if (in_array(auth()->user()->rol, ['Admi', 'Jef']))
                    <!--usuarios-->
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

                @if (in_array(auth()->user()->rol, ['Admi']))
                    <!--configuracion-->
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
                @endif
                @if (in_array(auth()->user()->rol, ['Admi']))
                    <!--Origen o punto de control   -->
                    <li>
                        <a href="{{ route('origen.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 512 512">
                                <path
                                    d="M256 0c17.7 0 32 14.3 32 32V66.7C368.4 80.1 431.9 143.6 445.3 224H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H445.3C431.9 368.4 368.4 431.9 288 445.3V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.3C143.6 431.9 80.1 368.4 66.7 288H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H66.7C80.1 143.6 143.6 80.1 224 66.7V32c0-17.7 14.3-32 32-32zM128 256a128 128 0 1 0 256 0 128 128 0 1 0 -256 0zm128-80a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                            </svg>
                            <span class="ms-3">Orígen</span>
                        </a>
                    </li>
                @endif
                @if (in_array(auth()->user()->rol, ['Admi', 'Jef']))
                    <!--producto-->
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
                @if (in_array(auth()->user()->rol, ['Admi', 'Jef']))
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
                            <li>
                                <a href="{{ route('parametroLinea.index') }}"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">En
                                    Línea</a>

                            </li>
                            <li>
                                <a href="{{ route('parametroLeche.indexLeche') }}"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Leche</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Seguimientos</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!--orp-->
                @if (in_array(auth()->user()->rol, ['Admi', 'Jef', 'Sup', 'HTST', 'UHT', 'FQ']))
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

                <!--orp-->
                @if (in_array(auth()->user()->rol, ['Admi', 'Jef', 'Sup', 'HTST', 'UHT']))
                    <li>
                        <a href="{{ route('uht.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 576 512">
                                <path
                                    d="M64 32C46.3 32 32 46.3 32 64l0 240 0 48 0 80c0 26.5 21.5 48 48 48l416 0c26.5 0 48-21.5 48-48l0-128 0-151.8c0-18.2-19.4-29.7-35.4-21.1L352 215.4l0-63.2c0-18.2-19.4-29.7-35.4-21.1L160 215.4 160 64c0-17.7-14.3-32-32-32L64 32z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                                viewBox="0 0 320 512">
                                <path
                                    d="M160 64c-26.5 0-48 21.5-48 48l0 164.5c0 17.3-7.1 31.9-15.3 42.5C86.2 332.6 80 349.5 80 368c0 44.2 35.8 80 80 80s80-35.8 80-80c0-18.5-6.2-35.4-16.7-48.9c-8.2-10.6-15.3-25.2-15.3-42.5L208 112c0-26.5-21.5-48-48-48zM48 112C48 50.2 98.1 0 160 0s112 50.1 112 112l0 164.4c0 .1 .1 .3 .2 .6c.2 .6 .8 1.6 1.7 2.8c18.9 24.4 30.1 55 30.1 88.1c0 79.5-64.5 144-144 144S16 447.5 16 368c0-33.2 11.2-63.8 30.1-88.1c.9-1.2 1.5-2.2 1.7-2.8c.1-.3 .2-.5 .2-.6L48 112zM208 368c0 26.5-21.5 48-48 48s-48-21.5-48-48c0-20.9 13.4-38.7 32-45.3L144 208c0-8.8 7.2-16 16-16s16 7.2 16 16l0 114.7c18.6 6.6 32 24.4 32 45.3z" />
                            </svg>
                            <span class="ms-3">UHT</span>
                        </a>
                    </li>
                @endif

                @if (in_array(auth()->user()->rol, ['Admi', 'Sup', 'Jef', 'HTST', 'UHT']))
                    <!--solicitud de analisis en linea-->
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
                @if (in_array(auth()->user()->rol, ['Admi', 'Sup', 'Jef', 'FQ', 'HTST', 'UHT']))
                    <!--analisis en linea-->
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
                @if (in_array(auth()->user()->rol, ['Admi', 'Jef', 'Con']))
                    <!--contador-->
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
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
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

                @if (in_array(auth()->user()->rol, ['Admi']))
                    <!--Almacen-->
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

                @if (in_array(auth()->user()->rol, ['Admi', 'Jef', 'Con', 'Sup', 'HTST', 'UHT', 'FQ']))
                    <!--recepcion de leche-->
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
                            <li>
                                <a href="{{ route('leche_recepcion.index') }}"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Recepción de Leche</a>
                            </li>
                            <li>
                                <a href="{{ route('leche_analisis.index') }}"
                                    class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    Análisis de Leche</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Externos -->
                @if (in_array(auth()->user()->rol, ['Admi', 'Ext', 'Jef', 'FQ', 'MB']) ||
                        (auth()->user()->rol === 'Jef' && auth()->user()->division->nombre === 'Calidad'))

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
                            @if (in_array(auth()->user()->rol, ['Admi', 'Jef', 'Ext']))
                                <li>
                                    <a href="{{ route('solicitudPlanta.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Solicitud Planta</a>
                                </li>
                                <li>
                                    <a href="{{ route('productosPlanta.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Productos Planta</a>
                                </li>
                                <li>
                                    <a href="{{ route('certificado.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Certificados</a>
                                </li>
                            @endif
                            @if (in_array(auth()->user()->rol, ['Admi', 'Jef']))
                                <li>
                                    <a href="{{ route('informacion.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Información Usuario</a>
                                </li>

                                <li>
                                    <a href="{{ route('tipoMuestra.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Tipo Muestra</a>
                                </li>
                            @endif
                            @if (in_array(auth()->user()->rol, ['Admi', 'Jef', 'FQ']))
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
                            @if (in_array(auth()->user()->rol, ['Admi', 'Jef', 'MB']))
                                <li>
                                    <a href="{{ route('microbiologia.index') }}"
                                        class="flex items-center w-full py-1 px-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Microbiologia</a>
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
            <div class=" flex justify-between  mt-12 md:mt-8 text-2xl text-center font-bold p-3 uppercase ">
                <div></div>
                @yield('titulo')

                @livewire('PaginaFunciones')
            </div>
            <div class=" md:px-5">
                @yield('contenido')
            </div>

        </div>
        <!--mensajes-->
        @livewire('alert.toast')
    </div>

    @livewire('wire-elements-modal')

    <livewire:scripts />

</body>

</html>
