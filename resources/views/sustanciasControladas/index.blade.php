@extends('layout.app')

@section('titulo')
Sustancias Quimicas
@endsection

@section('contenido')


<div class="flex justify-end gap-2">
<!--Tabla -->
{{-- @livewire('') --}}

{{-- ingresos --}}
@if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 30)->where('permiso_id', 1)->isNotEmpty() || auth()->user()->role->id == 7 )

<button onclick="Livewire.dispatch('openModal', { component: 'sustancias.movimiento', arguments: { est: 1 } })"
class="rounded bg-green-500 text-white p-2">
    Ingreso de sustancia
</button>
@endif



{{-- egresos --}}
@if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 30)->where('permiso_id', 3)->isNotEmpty())

<button onclick="Livewire.dispatch('openModal', { component: 'sustancias.movimiento', arguments: { est: 0 } })"
class="rounded bg-green-500 text-white p-2">
Nueva solicitud
</button>
@endif
</div>



@livewire('sustancias.tabla')
@endsection
