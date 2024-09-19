@extends('layout.app')

@section('titulo')
Solicitud de Laboratorio 

@endsection

@section('contenido')
<div class="flex justify-end">
<a href="{{route("detalleSolicitudPlanta.index")}}" class="bg-green-600 text-white px-2 py-1 rounded-md">Nuevo</a>
</div>
<!--Tabla -->
@livewire('externo.solicitudPlanta')


@endsection