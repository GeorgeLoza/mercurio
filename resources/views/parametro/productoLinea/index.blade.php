@extends('layout.app')

@section('titulo')
Parámetros - Productos Línea

@endsection

@section('contenido')


<div class="flex justify-end mb-2 gap-2">
    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 9)->where('permiso_id', 1)->isNotEmpty())
    <!--Boton Crear -->
    <button class="p-2 bg-green-500 rounded-lg" onclick="Livewire.dispatch('openModal', { component: 'parametro.parametro-linea.crear' })">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
            <path
                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
        </svg></button>
        @endif
</div>

<!--Tabla -->
@livewire('parametro.parametro-linea.tabla')


@endsection
