@extends('layout.app')

@section('titulo')
UHT
@endsection

@section('contenido')

<div class="md:flex gap-2">
    <div class="md:w-1/2">
        @livewire('uht.pesos')
    </div>
    <div class="md:w-1/2">
        @livewire('uht.vencimiento')
    </div>
</div>
@endsection