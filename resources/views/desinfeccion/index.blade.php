@extends('layout.app')

@section('titulo')
    Desinfección
@endsection

@section('contenido')
    <!-- Botón para alternar entre vistas -->



    {{-- ingresos --}}
     @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 33)->where('permiso_id', 1)->isNotEmpty() )

    <button onclick="Livewire.dispatch('openModal', { component: 'desinfeccion.movimiento', arguments: { est: 1 } })"
        class="rounded bg-green-500 text-white p-2">
        Ingreso de sustancia
    </button>
     @endif



    {{-- egresos --}}
    {{-- @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 30)->where('permiso_id', 3)->isNotEmpty()) --}}

    <button onclick="Livewire.dispatch('openModal', { component: 'desinfeccion.movimiento', arguments: { est: 0 } })"
        class="rounded bg-green-500 text-white p-2">
        Nueva solicitud
    </button>
    {{-- @endif --}}



    <!-- Contenedor de la Tabla -->
    @livewire('desinfeccion.tabla')
@endsection
