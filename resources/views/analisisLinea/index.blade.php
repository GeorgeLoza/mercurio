@extends('layout.app')

@section('titulo')
    Resultado Análisis
@endsection

@section('contenido')


    <!--Tabla -->
            @livewire('analisis-linea.analisis.tabla')
@endsection
