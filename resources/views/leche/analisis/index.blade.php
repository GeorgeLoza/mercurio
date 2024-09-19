@extends('layout.app')

@section('titulo')
Análisis de leche

@endsection

@section('contenido')
<div class="flex mb-2 gap-2">
    <a href="{{ route('analisisLinea.index') }}" class="px-2 bg-green-600 text-white rounded-md">
        Analisis en Linea
    </a>
</div>
<!--Tabla -->
@livewire('leche-cruda.analisis.tabla')



@endsection
