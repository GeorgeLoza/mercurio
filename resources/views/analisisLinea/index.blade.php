@extends('layout.app')

@section('titulo')
Analisis Linea
@endsection

@section('contenido')


<div class="flex justify-end mb-2 gap-2">
   
</div>

<!--Tabla -->
@livewire('analisis-linea.analisis.tabla')


@endsection