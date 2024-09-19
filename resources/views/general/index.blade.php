@extends('layout.app')

@section('titulo')
Configuración Inicial

@endsection

@section('contenido')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-2">
    <!--Categoria inicio-->
    <div class="">
        <h2 class="text-xl">Categoría</h2>
        <div class="flex justify-end mb-2">
            <!--Boton Crear -->
            <button class="p-2 bg-green-500 rounded-lg"
                onclick="Livewire.dispatch('openModal', { component: 'general.categoria-producto.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg></button>
        </div>

        <!--Tabla -->
        @livewire('general.categoria-producto.tabla')

    </div>
    <!--categoria fin-->

    <!--Destino inicio-->
    <div class="">
        <h2 class="text-xl">Destino</h2>
        <div class="flex justify-end mb-2">
            <!--Boton Crear -->
            <button class="p-2 bg-green-500 rounded-lg"
                onclick="Livewire.dispatch('openModal', { component: 'general.destino-producto.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg></button>
        </div>

        <!--Tabla -->
        @livewire('general.destino-producto.tabla')

    </div>
    <!--Destino fin-->
    <!--Division inicio-->
    <div class="">
        <h2 class="text-xl">División</h2>
        <div class="flex justify-end mb-2">
            <!--Boton Crear -->
            <button class="p-2 bg-green-500 rounded-lg"
                onclick="Livewire.dispatch('openModal', { component: 'general.division.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg></button>
        </div>

        <!--Tabla -->
        @livewire('general.division.tabla')

    </div>
    <!--Division fin-->

    <!--Etapa inicio-->
    <div class="">
        <h2 class="text-xl">Etápa</h2>
        <div class="flex justify-end mb-2">
            <!--Boton Crear -->
            <button class="p-2 bg-green-500 rounded-lg"
                onclick="Livewire.dispatch('openModal', { component: 'general.etapa.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg></button>
        </div>

        <!--Tabla -->
        @livewire('general.etapa.tabla')

    </div>
    <!--Etapa fin-->

    <!--planta inicio-->
    <div class="">
        <h2 class="text-xl">Planta</h2>
        <div class="flex justify-end mb-2">
            <!--Boton Crear -->
            <button class="p-2 bg-green-500 rounded-lg"
                onclick="Livewire.dispatch('openModal', { component: 'general.planta.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg></button>
        </div>

        <!--Tabla -->
        @livewire('general.planta.tabla')

    </div>
    <!--planta fin-->

    <!--unidad inicio-->
    <div class="">
        <h2 class="text-xl">Unidad</h2>
        <div class="flex justify-end mb-2">
            <!--Boton Crear -->
            <button class="p-2 bg-green-500 rounded-lg"
                onclick="Livewire.dispatch('openModal', { component: 'general.unidad.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg></button>
        </div>

        <!--Tabla -->
        @livewire('general.unidad.tabla')

    </div>
    <!--unidad fin-->
    <!--ruta inicio-->
    <div class="">
        <h2 class="text-xl">Ruta</h2>
        <div class="flex justify-end mb-2">
            <!--Boton Crear -->
            <button class="p-2 bg-green-500 rounded-lg"
                onclick="Livewire.dispatch('openModal', { component: 'general.ruta-acopio.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg></button>
        </div>

        <!--Tabla -->
        @livewire('general.ruta-acopio.tabla')

    </div>
    <!--ruta fin-->
    <!--subruta inicio-->
    <div class="">
        <h2 class="text-xl">Subruta</h2>
        <div class="flex justify-end mb-2">
            <!--Boton Crear -->
            <button class="p-2 bg-green-500 rounded-lg"
                onclick="Livewire.dispatch('openModal', { component: 'general.subruta-acopio.crear' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg></button>
        </div>

        <!--Tabla -->
        @livewire('general.subruta-acopio.tabla')

    </div>
    <!--subruta fin-->
</div>
@endsection