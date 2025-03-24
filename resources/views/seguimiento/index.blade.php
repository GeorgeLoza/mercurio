@extends('layout.app')

@section('titulo')
    Seguimiento
@endsection

@section('contenido')
    <!-- Botón para alternar entre vistas -->


    <!-- Contenedor de la Tabla -->
    @livewire('seguimiento.tabla')
@endsection
