@extends('layout.app')

@section('titulo')
    Seguimiento HTST
@endsection

@section('contenido')
    <!-- Botón para alternar entre vistas -->

                @livewire('seguimientoHtst.tabla')


@livewire('dashboard.seguimientoProduccion')
@endsection
