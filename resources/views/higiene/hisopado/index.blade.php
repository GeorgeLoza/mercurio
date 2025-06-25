@extends('layout.app')

@section('titulo')
    Hisopado
@endsection

@section('contenido')
    <!-- Botón para alternar entre vistas -->

                @livewire('higiene.hisopado.tabla')

@endsection
