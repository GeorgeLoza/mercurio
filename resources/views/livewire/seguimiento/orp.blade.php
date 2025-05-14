<div>
    <div class="mb-2">
        <label for="buscar_orp" class="block text-sm font-medium">Buscar ORP por código</label>
        <div class="flex">
            <input type="text" wire:model.live="buscar_orp" id="buscar_orp" placeholder="Escribe el código..."
                class="w-full border border-gray-500 rounded p-2 dark:bg-slate-800" />
            <button class="bg-red-600 p-2 text-center rounded-md  gap-2 ml-2" wire:click="generar"
                wire:loading.attr="disabled">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-white">
                    <path
                        d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
            </button>
        </div>
    </div>
    <div class="mb-2">
        <label for="orp_id" class="block text-sm font-medium">ORP</label>
        <select wire:model.live="orp_id" id="orp_id" class="w-full border border-gray-500 rounded p-2">
            <option class="dark:bg-slate-800" value="">Seleccione una ORP</option>
            @foreach ($orps as $orp)
                <option class="dark:bg-slate-800" value="{{ $orp->id }}">{{ $orp->codigo }} -
                    {{ $orp->producto->nombre }} -
                      {{ $orp->fecha_vencimiento1 ? \Carbon\Carbon::parse($orp->fecha_vencimiento1)->isoFormat('DD/MM/YY', 0, 'es') : '' }}

                </option>
            @endforeach
        </select>
        @error('orp_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="grid grid-cols-4 ">

        @foreach ($conteoPorOrigen as $origen)
        <div class=" p-5 m-2 rounded-md border text-center  {{ ($origen['con_espacio_rt'] > 0 || $origen['con_moho'] > 0) ? 'bg-red-500 ' : 'bg-white dark:bg-slate-700 ' }}
 ">
            <p class="font-bold">Cabezal: {{ $origen['alias'] }} </p>
            <p> RT: {{ $origen['con_espacio_rt'] }}/{{ $origen['total'] }} </p>
            <p> MyL: {{ $origen['con_moho'] }}/{{ $origen['con_moho2'] }}</p>
        </div>

        @endforeach

    </div>

</div>
</div>
