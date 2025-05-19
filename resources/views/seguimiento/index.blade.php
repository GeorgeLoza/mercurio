@extends('layout.app')

@section('titulo')
    Seguimiento UHT
@endsection

@section('contenido')
    <!-- Botón para alternar entre vistas -->


    <!-- Contenedor de la Tabla -->
    {{-- @livewire('seguimiento.tabla') --}}



    <div x-data="{ tab: 'componenteA' }">
        <!-- Pestañas -->
        <div class="flex  ">
            <button @click="tab = 'componenteA'" :class="{ 'bg-white dark:bg-slate-800 dark:text-white   ': tab === 'componenteA' }"
                class="px-4 py-1 border-white dark:border-gray-500 dark:bg-slate-700   border-t border-r border-l rounded-t-md m-0 text-gray-500">Datos</button>
            <button @click="tab = 'componenteB'" :class="{ 'bg-white  dark:bg-slate-800 dark:text-white    ': tab === 'componenteB' }"
                class="px-4 py-1 border-white dark:border-gray-500  dark:bg-slate-700  border-t border-r border-l rounded-t-md m-0 text-gray-500">OPR</button>
            <button @click="tab = 'componenteC'" :class="{ 'bg-white dark:bg-slate-800 dark:text-white   ': tab === 'componenteC' }"
                class="px-4 py-1 border-white dark:border-gray-500 dark:bg-slate-700  border-t border-r border-l rounded-t-md m-0 text-gray-500">Diario</button>
        </div>

        <!-- Mostrar componente según la pestaña seleccionada -->
        <div>
            <template x-if="tab === 'componenteA'">

                @livewire('seguimiento.tabla')

            </template>

            <template x-if="tab === 'componenteB'">
                @livewire('seguimiento.orp')

            </template>

            <template x-if="tab === 'componenteC'">
                @livewire('seguimiento.diario')

            </template>
        </div>
    </div>
@endsection
