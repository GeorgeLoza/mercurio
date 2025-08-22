@extends('layout.app')

@section('titulo')
    Verificación y ajuste de dispositivo
@endsection

@section('contenido')


<div>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 mb-2 fill-green-500"
        onclick="Livewire.dispatch('openModal', { component: 'dispositivosMedicion.info' })"
        viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
    </div>
    {{-- Alpine.js para controlar el menú --}}
    <div x-data="{ tab: 'termometro' }">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'termometro'"
                        :class="tab === 'termometro' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        Termómetro
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'phmetro'"
                        :class="tab === 'phmetro' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        pHmetro
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'refractometro'"
                        :class="tab === 'refractometro' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        Refractómetro
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'crioscopo'"
                        :class="tab === 'crioscopo' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        Crióscopo
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tablas -->
        <div x-show="tab === 'termometro'">
            @livewire('DispositivoTemperatura.tabla')
        </div>
        <div x-show="tab === 'phmetro'">
            @livewire('DispositivoPhmetro.tabla')
        </div>
        <div x-show="tab === 'refractometro'">
            @livewire('DispositivoRefractometro.tabla')
        </div>
        <div x-show="tab === 'crioscopo'">
            @livewire('DispositivoCrioscopo.tabla')
        </div>
    </div>
@endsection
