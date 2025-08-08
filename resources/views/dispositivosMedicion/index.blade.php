@extends('layout.app')

@section('titulo')
Dispositivos de Medición
@endsection

@section('contenido')


<div class="flex justify-end mb-2">
    <!--Boton Crear -->
    <button class="p-2 bg-green-500 rounded-lg" onclick="Livewire.dispatch('openModal', { component: 'dispositivosMedicion.crear' })">
        <svg
            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
            <path
                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
        </svg></button>
</div>
<div>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 mb-2 fill-green-500"
        onclick="Livewire.dispatch('openModal', { component: 'dispositivosMedicion.info' })"
        viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
    </div>
<!--Tabla -->
@livewire('dispositivosMedicion.tabla')



@endsection
