@extends('layout.app')

@section('titulo')
    Datos
@endsection

@section('contenido')
    <!-- Botón para alternar entre vistas -->
   

    <!-- Contenedor de la Tabla -->
    @livewire('tablaReporte.tabla') 
@endsection
