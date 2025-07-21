@extends('layout.app')

@section('titulo')
    Verificacion y ajuste de dispositivo
@endsection

@section('contenido')
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
                        Phmetro
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'refractometro'"
                        :class="tab === 'refractometro' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        Refractometro
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'crioscopo'"
                        :class="tab === 'crioscopo' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        crioscopo
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
