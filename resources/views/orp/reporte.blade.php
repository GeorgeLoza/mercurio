@extends('layout.app')


@section('contenido')
    <div class="flex justify-end m-1">
        @if ($reporte->revisado)
            {{-- yogurt --}}
            @if ($reporte->producto->categoriaProducto->tipo == 'yogurts')
                <a href="{{ route('descargarYog.pdf', ['id' => $id]) }}" class=" text-white font-bold py-2 px-4 rounded">

                    <button class="bg-green-600 p-2 text-center rounded-md flex gap-2" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
                            <path
                                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                        </svg>

                        <div wire:loading wire:target="generatePDF4">
                            <div class="flex items-center justify-center w-6 h-6 ">
                                <div role="status">
                                    <svg aria-hidden="true"
                                        class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>

                    </button>
                </a>
            @endif
            {{-- FIN yogurt --}}



            {{-- jugos --}}
            @if ($reporte->producto->categoriaProducto->tipo == 'jugos')
                <a href="{{ route('descargarJugo.pdf', ['id' => $id]) }}" class=" text-white font-bold py-2 px-4 rounded">
                    <button class="bg-green-600 p-2 text-center rounded-md flex gap-2" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
                            <path
                                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                        </svg>

                        <div wire:loading wire:target="generatePDF5">
                            <div class="flex items-center justify-center w-6 h-6 ">
                                <div role="status">
                                    <svg aria-hidden="true"
                                        class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>

                    </button></a>
            @endif
            {{-- FIN jugos --}}


            {{-- lacteas --}}




            @if ($reporte->producto->categoriaProducto->tipo == 'lacteas')
                <a href="{{ route('descargarLac.pdf', ['id' => $id]) }}" class=" text-white font-bold py-2 px-4 rounded">

                    <button class="bg-green-600 p-2 text-center rounded-md flex gap-2" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
                            <path
                                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                        </svg>

                        <div wire:loading wire:target="generatePDF6">
                            <div class="flex items-center justify-center w-6 h-6 ">
                                <div role="status">
                                    <svg aria-hidden="true"
                                        class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>

                    </button>
                </a>
            @endif
            {{-- FIN lacteas --}}



            @if ($reporte->producto->categoriaProducto->grupo == 'UHT')
                {{-- UHT --}}
                <a href="{{ route('descargarUHT.pdf', ['id' => $id]) }}" class=" text-white font-bold py-2 px-4 rounded">

                    <button class="bg-green-600 p-2 text-center rounded-md flex gap-2" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
                            <path
                                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                        </svg>

                        <div wire:loading wire:target="generatePDF3">
                            <div class="flex items-center justify-center w-6 h-6 ">
                                <div role="status">
                                    <svg aria-hidden="true"
                                        class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>

                    </button>
                </a>
                {{-- FIN UHT --}}
            @endif
        @else
            <div class="flex  items-center justify-center">

                <p class="mr-2">

                    {{ $reporte->revisado ? 'Revisado' : 'No Revisado' }}

                    @if ($reporte->estado != 'Completado')
                        , Aun en Proceso
                    @endif

                </p>
                <div>


                    @if (auth()->user()->role->rolModuloPermisos->where('modulo_id', 11)->where('permiso_id', 5)->isNotEmpty())
                        @if ($reporte->estado == 'Completado' && !$reporte->revisado)
                            <form action="{{ route('orp.revisar', $reporte->id) }}" method="POST"
                                onsubmit="return confirm('Se reviso el ORP {{ $reporte->codigo }}?')">
                                @csrf
                                <button type="submit" class="text-white p-2 bg-green-500 rounded ">Revisar</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        @endif
    </div>



    <div
        class="block  p-2 mb-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">ORP : {{ $reporte->codigo }}
        </h5>
        <div class="md:flex gap-2">
            <div class="md:w-1/2">
                <p class="font-normal text-sm text-gray-700 dark:text-gray-400"> <span class="font-bold">Producto:
                    </span>{{ $reporte->producto->codigo }} - {{ $reporte->producto->nombre }}</p>
                <p class="font-normal text-sm text-gray-700 dark:text-gray-400"> <span class="font-bold">Lote:
                    </span>{{ $reporte->lote / 1 }}</p>
                <p class="font-normal text-sm text-gray-700 dark:text-gray-400"> <span class="font-bold">Raciones:
                    </span>{{ $reporte->lote * $reporte->producto->norma }}</p>
            </div>

            <div class="md:w-1/2">
                <p class="font-normal text-sm text-gray-700 dark:text-gray-400"> <span class="font-bold">Fecha de
                        Vencimiento:
                    </span>

                    @if ($reporte->fecha_vencimiento1)
                        {{ \Carbon\Carbon::parse($reporte->fecha_vencimiento1)->isoFormat('DD-MM-YY ', 0, 'es') }}
                    @endif

                    @if ($reporte->fecha_vencimiento2)
                        - {{ \Carbon\Carbon::parse($reporte->fecha_vencimiento)->isoFormat('DD-MM-YY ', 0, 'es') }}
                    @endif

                </p>
                <p class="font-normal text-sm text-gray-700 dark:text-gray-400"> <span class="font-bold">Estado:
                    </span>{{ $reporte->estado }}</p>
                <p class="font-normal text-sm text-gray-700 dark:text-gray-400"> <span class="font-bold">En Almacen:
                </p>

            </div>
        </div>
    </div>






    <div x-data="{ tab: 'componenteA' }">
        <!-- Pestañas -->
        <div class="flex  ">
            <button @click="tab = 'componenteA'"
                :class="{ 'bg-white dark:bg-slate-800 dark:text-white   ': tab === 'componenteA' }"
                class="px-4 py-1 border-white dark:border-gray-500 dark:bg-slate-700   border-t border-r border-l rounded-t-md m-0 text-gray-500">Cards</button>
            <button @click="tab = 'componenteB'"
                :class="{ 'bg-white  dark:bg-slate-800 dark:text-white    ': tab === 'componenteB' }"
                class="px-4 py-1 border-white dark:border-gray-500  dark:bg-slate-700  border-t border-r border-l rounded-t-md m-0 text-gray-500">Tabla</button>
            <button @click="tab = 'componenteC'"
                :class="{ 'bg-white dark:bg-slate-800 dark:text-white   ': tab === 'componenteC' }"
                class="px-4 py-1 border-white dark:border-gray-500 dark:bg-slate-700  border-t border-r border-l rounded-t-md m-0 text-gray-500">Cronologico</button>
        </div>

        <!-- Mostrar componente según la pestaña seleccionada -->
        <div>
            <template x-if="tab === 'componenteA'">

                @livewire('dashbord.orp-reporte', ['orpId' => $id])

            </template>

            <template x-if="tab === 'componenteB'">
                @livewire('dashbord.orp-reporte2', ['orpId' => $id])

            </template>

            <template x-if="tab === 'componenteC'">

                @livewire('dashbord.orp-reporte-cronologico', ['orpId' => $id])

            </template>
        </div>
    </div>
@endsection
