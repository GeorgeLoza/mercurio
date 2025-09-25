<div class="p-3 liberacion-detalle"> {{-- clase para el CSS/JS específico --}}
    <style>
        /* --- Ocultar flechitas (spinners) SOLO en esta sección --- */
        .liberacion-detalle input[type=number]::-webkit-inner-spin-button,
        .liberacion-detalle input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none !important;
            margin: 0 !important;
        }

        .liberacion-detalle input[type=number] {
            -moz-appearance: textfield !important;
            appearance: textfield !important;
            -webkit-appearance: none !important;
        }
    </style>

    <h1 class="font-bold uppercase mb-3 text-gray-800 dark:text-gray-100">
        Liberación: {{ $liberacion->orp->codigo }}
    </h1>

    @if ($liberacion->detalles->count())
        <div class="overflow-x-auto">
            <table class="w-full text-xs border-collapse bg-white dark:bg-gray-800 rounded">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 text-center">
                    <tr>
                        <th class="p-1 border">Cabezal</th>
                        <th class="p-1 border">Hora</th>
                        <th class="px-2 border">Peso</th>
                        <th class="px-1 border">Lote</th>
                        <th class="p-1 border">Temp</th>
                        <th class="px-3 border">pH</th>
                        <th class="px-2 border">Brix</th>
                        <th class="p-1 border">Acidez</th>
                        <th class="p-1 border">Visc.</th>
                        <th class="p-1 border">C</th>
                        <th class="p-1 border">O</th>
                        <th class="p-1 border">S</th>
                        <th class="p-1 border">Observacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($liberacion->detalles as $detalle)
                        <tr wire:key="detalle-{{ $detalle->id }}"
                            class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-900">
                            <td class="p-1 border text-xs">
                                <select wire:model.defer="values.{{ $detalle->id }}.origen_id"
                                    class="editable w-full p-1 border rounded text-xs
                                       bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                    @if (!($mode === 'all' || in_array('origen_id', (array) $mode))) disabled @endif>
                                    <option value="" class="">N/A</option>
                                    @foreach ($origenes as $o)
                                        <option value="{{ $o->id }}">{{ $o->alias }}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="p-1 border">
                                <input type="time" wire:model.defer="values.{{ $detalle->id }}.hora_sachet"
                                    class="editable w-full p-1 border rounded text-xs
                                      bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                    @if (!($mode === 'all' || in_array('hora_sachet', (array) $mode))) disabled @endif>
                            </td>

                            <!-- peso -->
                            <td class="p-1 border">
                                <input type="number" step="0.01" wire:model.defer="values.{{ $detalle->id }}.peso"
                                    class="editable w-full p-1 border rounded text-xs
                      bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                    @if (!($mode === 'all' || in_array('peso', (array) $mode))) disabled @endif>
                            </td>

                            <!-- lote NUEVO -->
                            <td class="p-1 border">
                                <input type="number" wire:model.defer="values.{{ $detalle->id }}.lote"
                                    class="editable w-full p-1 border rounded text-xs
                      bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                    @if (!($mode === 'all' || in_array('lote', (array) $mode))) disabled @endif>
                            </td>


                            @foreach (['temperatura', 'ph', 'brix', 'acidez', 'viscosidad'] as $f)
                                <td class="p-1 border">
                                    <input type="number" step="0.01"
                                        wire:model.defer="values.{{ $detalle->id }}.{{ $f }}"
                                        class="editable w-full p-1 border rounded text-xs
                                      bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                        @if (!($mode === 'all' || in_array($f, (array) $mode))) disabled @endif>
                                </td>
                            @endforeach

                            @foreach (['color', 'olor', 'sabor'] as $f)
                                <td class="p-1 border text-center">
                                    <input type="checkbox"
                                        wire:model.defer="values.{{ $detalle->id }}.{{ $f }}"
                                        class="editable h-4 w-4" @if (!($mode === 'all' || in_array($f, (array) $mode))) disabled @endif>
                                </td>
                            @endforeach

                            <!-- Observaciones -->
                            <td class="p-1 border">
                                <textarea rows="1" wire:model.defer="values.{{ $detalle->id }}.observaciones"
                                    class="editable w-full p-1 border rounded text-xs resize-y
                                         bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                    @if (!($mode === 'all' || in_array('observaciones', (array) $mode))) disabled @endif></textarea>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botón Guardar -->
        <div class="mt-3 flex justify-end">
            <button wire:click="saveAll" data-role="save-btn"
                class="bg-green-500 hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-500 text-white font-bold py-1 px-4 rounded">
                Guardar / Aceptar
            </button>
        </div>
    @else
        <p class="text-gray-500 dark:text-gray-300">No hay detalles registrados.</p>
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', () => {

            function enabledInputs() {
                return Array.from(document.querySelectorAll('.liberacion-detalle .editable')).filter(i => !i
                    .disabled);
            }

            // foco inicial en el primer input habilitado
            const arr0 = enabledInputs();
            if (arr0.length) arr0[0].focus();

            // Previene que la rueda del mouse cambie el valor (solo cuando el input está enfocado)
            document.querySelectorAll('.liberacion-detalle input[type=number]').forEach(input => {
                input.addEventListener('wheel', function(e) {
                    // solo prevenir cuando el input tiene foco
                    if (document.activeElement === this) {
                        e.preventDefault();
                    }
                }, {
                    passive: false
                });
                // prevenir flechas ↑ ↓ que cambian el valor
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowUp' || e.key === 'ArrowDown') {
                        e.preventDefault();
                    }
                });
            });

            document.addEventListener('keydown', e => {
                const enabled = enabledInputs();
                if (!enabled.length) return;

                const el = document.activeElement;
                if (!el.classList.contains('editable') || el.disabled) return;

                if (e.key === 'Enter') {
                    e.preventDefault();
                    const idx = enabled.indexOf(el);
                    if (idx === -1) return;

                    if (idx === enabled.length - 1) {
                        // si estamos en el último input habilitado -> disparar guardar
                        const saveBtn = document.querySelector('[data-role="save-btn"]');
                        if (saveBtn) saveBtn.click();
                    } else {
                        // enfocar siguiente habilitado
                        enabled[idx + 1].focus();
                    }
                }
                // dejamos Tab nativo (accesibilidad)
            });
        });
    </script>
@endpush
