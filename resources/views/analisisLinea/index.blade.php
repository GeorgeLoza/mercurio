@extends('layout.app')

@section('titulo')
Analisis Linea
@endsection

@section('contenido')


<div class="flex justify-end mb-2 gap-2">
   
</div>

<!--Tabla -->
@livewire('analisis-linea.analisis.tabla')



<div data-dial-init class="fixed end-6 bottom-6 group">   
    <button type="button" data-dial-toggle="speed-dial-menu-bottom-right" aria-controls="speed-dial-menu-bottom-right" aria-expanded="false" class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800" onclick="Livewire.dispatch('openModal', { component: 'analisis-linea.solicitud.crear' })">
        <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
        </svg>
        <span class="sr-only">Open actions menu</span>
    </button>
</div>

@endsection