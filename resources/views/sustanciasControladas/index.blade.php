@extends('layout.app')

@section('titulo')
Sustancias Quimicas
@endsection

@section('contenido')


<div class="flex justify-end gap-2">
<!--Tabla -->
{{-- @livewire('') --}}

{{-- ingresos --}}
@if (in_array(auth()->user()->rol, ['Admi', 'Jef' ]) && in_array(auth()->user()->division_id, [2 ]) )

<button onclick="Livewire.dispatch('openModal', { component: 'sustancias.movimiento', arguments: { est: 1 } })"
class="rounded bg-green-500 text-white p-2">
    Ingreso de sustancia
</button>
@endif

@if (in_array(auth()->user()->id, [15 ]) )

<button onclick="Livewire.dispatch('openModal', { component: 'sustancias.movimiento', arguments: { est: 1 } })"
class="rounded bg-green-500 text-white p-2">
    Ingreso de sustancia
</button>
@endif

{{-- egresos --}}
@if (in_array(auth()->user()->division_id, [2 ]) )

<button onclick="Livewire.dispatch('openModal', { component: 'sustancias.movimiento', arguments: { est: 0 } })"
class="rounded bg-green-500 text-white p-2">
Nueva solicitud
</button>
@endif
</div>



@livewire('sustancias.tabla')
@endsection
