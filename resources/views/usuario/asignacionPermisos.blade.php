@extends('layout.app')

@section('titulo')
    Administración de roles y permisos
@endsection

@section('contenido')
    {{-- Alpine.js para controlar el menú --}}
    <div x-data="{ tab: 'admi' }">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'admi'"
                        :class="tab === 'admi' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        Administracion
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'roles'"
                        :class="tab === 'roles' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        roles
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'modulos'"
                        :class="tab === 'modulos' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        modulos
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" @click.prevent="tab = 'permisos'"
                        :class="tab === 'permisos' ?
                            'text-blue-600 border-b-2 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                            'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                        class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                        Permisos
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tablas -->
        <div x-show="tab === 'admi'">
            @livewire('asignacion-permisos.admi')
        </div>
        <div x-show="tab === 'roles'">
            @livewire('asignacion-permisos.rol')
        </div>
        <div x-show="tab === 'modulos'">
            @livewire('asignacion-permisos.modulo')
        </div>
        <div x-show="tab === 'permisos'">
            @livewire('asignacion-permisos.permiso')
        </div>
    </div>
@endsection
