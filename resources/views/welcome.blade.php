@extends('layout.app')

@section('titulo')

@endsection

@section('contenido')
<!--Tabla -->
@livewire('dashboard.paseTurnoReporte') 
@livewire('paseTurno.reporte')
@livewire('dashbord.planta')

@if (auth()->user()->division->nombre == 'Produccion' || auth()->user()->division->nombre=='Admi')
<div data-dial-init class="fixed end-6 bottom-6 group">
    <div id="speed-dial-menu-default" class="flex flex-col items-center hidden mb-4 space-y-2">
        {{-- BOTON MODAL DE TANQUE --}}
        <button type="button" onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.crear' })" data-tooltip-target="tooltip-tanque" data-tooltip-placement="left"
            class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                class="w-6 h-6 fill-blue-400 hover:fill-blue-500">
                <path transform="scale(0.8 0.8)"
                    d="M237.109 145.655L217.461 145.691C214.08 145.703 209.998 146.151 206.721 145.446L206.25 145.337C168.98 137.037 169.336 81.1106 208.802 74.7749C215.208 73.7465 222.256 74.3548 228.766 74.3554L403.742 74.3688C408.358 74.0686 413.195 74.352 417.832 74.353L427.229 74.3635C471.968 74.4766 474.175 139.192 434.637 145.31C432.196 145.687 429.594 145.595 427.128 145.611L237.109 145.655Z" />
                <path transform="scale(0.8 0.8)"
                    d="M442.37 551.275L192.626 551.259C188.48 551.252 182.971 551.741 179.063 550.408L176.796 549.731C157.703 544.312 143.897 529.168 138.837 510.345C135.986 499.737 137.431 488.224 137.426 477.314L137.428 260.547C137.481 248.452 143.304 241.502 150.055 231.823L193.12 168.771C195.019 166.123 196.779 163.177 199.225 161.002L441.895 161.046C445.811 162.84 449.763 170.636 452.225 174.202L490.248 229.658C496.708 239.148 504.17 247.972 504.234 260.011L504.179 497.862C504.069 526.62 483.354 548.942 454.4 551.147C450.441 551.449 446.345 551.277 442.37 551.275Z" />
            </svg>
            <span class="sr-only">Tanque</span>
        </button>
        <div id="tooltip-tanque" role="tooltip"
            class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Tanque
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        {{-- BOTON MODAL DE PASTEURIZADOR
        <button type="button" data-tooltip-target="tooltip-print" data-tooltip-placement="left"
            class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                class="w-6 h-6 fill-blue-400 hover:fill-blue-500">
                <path
                    d="M186.1 343.3c-9.7 9.7-9.7 25.3 0 34.9 9.7 9.7 25.3 9.7 34.9 0L378.2 221.1c19.3-19.3 50.6-19.3 69.9 0s19.3 50.6 0 69.9L294 445.1c19.3 19.3 50.5 19.3 69.8 0l0 0 119.3-119.2c38.6-38.6 38.6-101.1 0-139.7-38.6-38.6-101.2-38.6-139.7 0l-157.2 157.2zm244.5-104.8c-9.7-9.7-25.3-9.7-34.9 0l-157.2 157.2c-19.3 19.3-50.5 19.3-69.8 .1l-.1-.1c-9.6-9.6-25.3-9.7-34.9 0l0 0c-9.7 9.6-9.7 25.3 0 34.9l0 0c38.6 38.6 101.1 38.6 139.7 0l157.2-157.2c9.7-9.7 9.7-25.3 0-34.9zm-262 87.3l157.2-157.2c9.6-9.7 9.6-25.3 0-34.9-9.6-9.6-25.3-9.6-34.9 0L133.7 290.9c-19.3 19.3-50.6 19.3-69.9 0l0 0c-19.3-19.3-19.3-50.5 0-69.8l0 0L218 66.9c-19.3-19.3-50.6-19.3-69.9 0l0 0L28.9 186.1c-38.6 38.6-38.6 101.1 0 139.7 38.6 38.6 101.1 38.6 139.7 0zm-87.3-52.4c9.6 9.6 25.3 9.6 34.9 0l157.2-157.2c19.3-19.3 50.6-19.3 69.8 0l0 0c9.7 9.7 25.3 9.7 34.9 0 9.7-9.7 9.7-25.3 0-34.9-38.6-38.6-101.1-38.6-139.7 0L81.3 238.5c-9.7 9.6-9.7 25.3 0 34.9h0z" />
            </svg>
            <span class="sr-only">Pasteurizador</span>
        </button>
        <div id="tooltip-print" role="tooltip"
            class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Pasteurizador
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div> --}}
        {{-- BOTON MODAL DE ENVSADORA --}}
        <button type="button" onclick="Livewire.dispatch('openModal', { component: 'estadoPlanta.crearEnvasadora' })" data-tooltip-target="tooltip-download" data-tooltip-placement="left"
            class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                <path
                    d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Envasadora</span>
        </button>
        <div id="tooltip-download" role="tooltip"
            class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Envasadora
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>


    </div>
    <button type="button" data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default"
        aria-expanded="false"
        class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
        <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 1v16M1 9h16" />
        </svg>
        <span class="sr-only">Open actions menu</span>
    </button>
</div>
@endif


@endsection
