@extends('layout.app')

@section('titulo')
HTST
@endsection

@section('contenido')

<div class="md:flex gap-2">
    <div class="md:w-1/2">
        @livewire('htst.pesos')
    </div>
    <div class="md:w-1/2">
        @livewire('htst.vencimiento')
    </div>
</div>
@endsection