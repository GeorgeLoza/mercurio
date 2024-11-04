<div class="">  
    <div class="md:flex">
<!--Preparado-->
    <div id="accordion-open" data-accordion="open" class="md:w-1/3">
        <h2 id="accordion-open-preparado">
            <button type="button"
                class="flex items-center justify-between w-full p-1 font-medium rtl:text-right text-gray-500 border  border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                data-accordion-target="#accordion-open-body-1" aria-expanded="false" aria-controls="accordion-open-body-2">
                <span class="flex items-center text-sm"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Preparado - @if ($pasePreparado)
                    {{ \Carbon\Carbon::parse($pasePreparado->tiempo)->format('H:i d/m') }}
                    @endif</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5 5 1 1 5" />
                </svg>
            </button>

        </h2>
        <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-preparado">
            <div class="p-5 border border-gray-200 dark:border-gray-700">
                <p>{{ $pasePreparado->user->nombre }} {{ $pasePreparado->user->apellido }}</p> 
                <span class="font-bold">Urgente</span>
                <p class="mb-2 text-gray-500 dark:text-gray-400">@if ($pasePreparado){{ $pasePreparado->urgente }}@endif</p>

                <span class="font-bold">Observaciones</span>
                <p class="mb-2 text-gray-500 dark:text-gray-400">@if ($pasePreparado){{ $pasePreparado->observaciones }}@endif</p>
                <span class="font-bold">Volumenes en Tanque</span>
                <p class="mb-2 text-gray-500 dark:text-gray-400">@if ($pasePreparado){{ $pasePreparado->volumenes }}@endif</p>
                <div>
                    @if (auth()->user()->id == $pasePreparado->user->id)
                    <button class="p-2 bg-blue-500 rounded-lg text-white" onclick="Livewire.dispatch('openModal', { component: 'paseTurno.editar', arguments: { id: {{ $pasePreparado->id}}, area: 'Preparado' } })">
                        Editar</button>    
                    @endif
                    
                    <button class="p-2 bg-green-500 rounded-lg text-white" onclick="Livewire.dispatch('openModal', { component: 'paseTurno.crear', arguments: { area: 'Preparado' } })">
                        Nuevo reporte de pase de turno</button>
                </div>
            </div>
        </div>

    </div>
<!--HTST-->
    <div id="accordion-open" data-accordion="open" class="md:w-1/3">
        <h2 id="accordion-open-htst">
            <button type="button"
                class="flex items-center justify-between w-full p-1 font-medium rtl:text-right text-gray-500 border  border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                data-accordion-target="#accordion-open-body-2" aria-expanded="false" aria-controls="accordion-open-body-2">
                <span class="flex items-center text-sm"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Envasadora HTST - @if ($paseEnvasadoHTST)
                    {{ \Carbon\Carbon::parse($paseEnvasadoHTST->tiempo)->format('H:i d/m') }}
                    @endif</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5 5 1 1 5" />
                </svg>
            </button>

        </h2>
        <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-htst">
            <div class="p-5 border border-gray-200 dark:border-gray-700">
                <p>{{ $paseEnvasadoHTST->user->nombre }} {{ $paseEnvasadoHTST->user->apellido }}</p> 
                <span class="font-bold">Urgente</span>
                <p class="mb-2 text-gray-500 dark:text-gray-400">@if ($paseEnvasadoHTST){{ $paseEnvasadoHTST->urgente }}@endif</p>

                <span class="font-bold">Observaciones</span>
                <p class="mb-2 text-gray-500 dark:text-gray-400">@if ($paseEnvasadoHTST){{ $paseEnvasadoHTST->observaciones }}@endif</p>
                <span class="font-bold">Volumenes en Tanque</span>
                <p class="mb-2 text-gray-500 dark:text-gray-400">@if ($paseEnvasadoHTST){{ $paseEnvasadoHTST->volumenes }}@endif</p>
                <div>
                    @if (auth()->user()->id == $paseEnvasadoHTST->user->id)
                    <button class="p-2 bg-blue-500 rounded-lg text-white" onclick="Livewire.dispatch('openModal', { component: 'paseTurno.editar', arguments: {id: {{ $paseEnvasadoHTST->id}}, area: 'Envasado HTST' } })">
                        Editar</button>    
                    @endif
                    
                    <button class="p-2 bg-green-500 rounded-lg text-white" onclick="Livewire.dispatch('openModal', { component: 'paseTurno.crear',arguments: { area: 'Envasado HTST' } })">
                        Nuevo reporte de pase de turno</button>
                </div>
            </div>
        </div>

    </div>
<!--UHT-->
    <div id="accordion-open" data-accordion="open" class="md:w-1/3">
        <h2 id="accordion-open-uht">
            <button type="button"
                class="flex items-center justify-between w-full p-1 font-medium rtl:text-right text-gray-500 border  border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                data-accordion-target="#accordion-open-body-3" aria-expanded="false" aria-controls="accordion-open-body-2">
                <span class="flex items-center text-sm"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Envasadora UHT - @if ($paseEnvasadoUHT)
                    {{ \Carbon\Carbon::parse($paseEnvasadoUHT->tiempo)->format('H:i d/m') }}
                    @endif</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5 5 1 1 5" />
                </svg>
            </button>

        </h2>
        <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-uht">
            <div class="p-5 border border-gray-200 dark:border-gray-700">
                <p>{{ $paseEnvasadoUHT->user->nombre }} {{ $paseEnvasadoUHT->user->apellido }}</p> 
                <span class="font-bold">Urgente</span>
                <p class="mb-2 text-gray-500 dark:text-gray-400">@if ($paseEnvasadoUHT){{ $paseEnvasadoUHT->urgente }}@endif</p>

                <span class="font-bold">Observaciones</span>
                <p class="mb-2 text-gray-500 dark:text-gray-400">@if ($paseEnvasadoUHT){{ $paseEnvasadoUHT->observaciones }}@endif</p>
                <span class="font-bold">Volumenes en Tanque</span>
                <p class="mb-2 text-gray-500 dark:text-gray-400">@if ($paseEnvasadoUHT){{ $paseEnvasadoUHT->volumenes }}@endif</p>
                <div>
                    @if (auth()->user()->id == $paseEnvasadoUHT->user->id)
                    <button class="p-2 bg-blue-500 rounded-lg text-white" onclick="Livewire.dispatch('openModal', { component: 'paseTurno.editar', arguments: {id: {{ $paseEnvasadoUHT->id}}, area: 'Envasado UHT' } })">
                        Editar</button>    
                    @endif
                    
                    <button class="p-2 bg-green-500 rounded-lg text-white" onclick="Livewire.dispatch('openModal', { component: 'paseTurno.crear', arguments: { area: 'Envasado UHT' } })">
                        Nuevo reporte de pase de turno</button>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
