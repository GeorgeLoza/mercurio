{{-- filepath: c:\Users\rod_j\OneDrive\Escritorio\mercurio2\mercurio\resources\views\livewire\cambios\aviso-modal.blade.php --}}
<div class="bg-white dark:bg-gray-800 rounded-lg">
    <div x-data="{ idx: 0 }" class="relative w-full max-w-xl mx-auto">
        {{-- Carrusel --}}
        <div class="overflow-hidden rounded-lg shadow-lg bg-gray-50 dark:bg-gray-800">
            @foreach ($cambios->values() as $i => $cambio)
                <div x-show="idx === {{ $i }}" x-transition class="text-center">
                    <h3 class="text-lg font-semibold mb-2">{{ $cambio->titulo }}</h3>
                    @if ($cambio->imagen1)
                        <div class="relative">
                            <img src="{{ asset('storage/' . $cambio->imagen1) }}" alt="Imagen"
    class="mx-auto mb-4 h-96 w-full max-w-2xl object-contain rounded shadow">
                            {{-- Botón anterior --}}
                            <button type="button"
                                class="absolute top-1/2 left-2 -translate-y-1/2 bg-white/60 hover:bg-white/80 dark:bg-gray-800/60 dark:hover:bg-gray-800/80 text-gray-700 dark:text-gray-200 rounded-full p-2 shadow transition"
                                @click="idx = idx === 0 ? {{ count($cambios) - 1 }} : idx - 1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            {{-- Botón siguiente --}}
                            <button type="button"
                                class="absolute top-1/2 right-2 -translate-y-1/2 bg-white/60 hover:bg-white/80 dark:bg-gray-800/60 dark:hover:bg-gray-800/80 text-gray-700 dark:text-gray-200 rounded-full p-2 shadow transition"
                                @click="idx = idx === {{ count($cambios) - 1 }} ? 0 : idx + 1">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">{{ $cambio->descripcion }}</p>
                    @if ($cambio->nota)
                        <div class="mt-2 text-xs text-gray-600 dark:text-gray-400 italic">{{ $cambio->nota }}</div>
                    @endif
                </div>
            @endforeach
        </div>
        {{-- Indicadores circulares, ahora debajo del carrusel --}}
        <div class="flex justify-center items-center mt-4 space-x-2">
            @foreach ($cambios->values() as $i => $cambio)
                <button type="button"
                    class="w-3 h-3 rounded-full transition bg-gray-300 dark:bg-gray-700 border-2 border-white"
                    :class="{ 'ring-2 ring-blue-500': idx === {{ $i }} }" @click="idx = {{ $i }}">
                </button>
            @endforeach
        </div>
        {{-- Contador de página --}}
        <div class="text-xs text-gray-500 mt-1 text-center">
            <span x-text="idx + 1"></span> / {{ count($cambios) }}
        </div>
        {{-- Botón “cerrar” arriba a la derecha, más estilizado --}}
        <div class="absolute top-1 right-1">
            <button wire:click="marcarVisto"
                class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-500/80 hover:bg-red-600/90 text-white shadow-md transition"
                title="Cerrar y marcar como visto">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
