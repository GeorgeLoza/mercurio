@extends('layout.app')

@section('titulo')
    UHT
@endsection

@section('contenido')
    <div class="md:flex gap-2 h-[calc(50vh)]">
        <div class="md:w-1/2 flex flex-col ">
            <div class="md:w-full flex justify-center mb-2 font-bold">
                <h2>PESOS</h2>
            </div>
            <div>
                @livewire('uht.pesos')
            </div>


        </div>

        <div class="md:w-1/2 flex flex-col ">
            <div class="md:w-full flex justify-center mb-2 font-bold ">
                <h2>FECHAS DE VENCIMIENTO</h2>
            </div>
            <div>
                @livewire('uht.vencimiento')

            </div>
        </div>
    </div>
    <div class=" flex flex-col ">
        <div class="md:w-full flex justify-center  font-bold">
            <h2>ORPs UHT</h2>
        </div>
        <div>

            @livewire('uht.tabla')
        </div>

    </div>

    @endsection
