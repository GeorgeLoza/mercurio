@extends('layout.app')

@section('titulo')
HTST
@endsection

@section('contenido')

<div class="md:flex gap-2">
    <div class="md:w-1/2 flex flex-col ">
        <div class="md:w-full flex justify-center mb-2 font-bold">
            <h1>PESOS</h1>
        </div>
        <div>
            @livewire('htst.pesos')
        </div>


    </div>

        <div class="md:w-1/2 flex flex-col ">
            <div class="md:w-full flex justify-center mb-2 font-bold ">
                <h1>FECHAS DE VENCIMIENTO</h1>
            </div>
            <div>
        @livewire('htst.vencimiento')

    </div>
    </div>

</div>
@endsection
