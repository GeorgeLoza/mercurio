@extends('layout.app')

@section('titulo')
Orp's
@endsection
    
@section('contenido')

<!-- Botón para alternar entre vistas -->
<a href="{{ route('orp.index') }}">
    <button  class="bg-blue-500 text-white px-2 py-1 rounded mb-1">
        Ver tabla
    </button>
</a>

@livewire('orp.kanban')


@endsection



