@extends('layout.app')

@section('titulo')
    Orp's
@endsection

@section('contenido')
    <!-- Botón para alternar entre vistas -->

    <a href="{{ route('orp.kanban') }}">
        @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 11)->where('permiso_id', 1)->isNotEmpty())

        <button class="bg-blue-500 text-white px-2 py-1 rounded mb-1">
            Ver Kanban
        </button>
        @endif
    </a>

    <!-- Contenedor de la Tabla -->
    @livewire('orp.tabla')








@endsection
