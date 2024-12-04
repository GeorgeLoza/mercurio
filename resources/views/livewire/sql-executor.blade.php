<div>
    <h2>Ejecutar Consulta SQL</h2>

    <!-- Campo para ingresar la consulta SQL -->
    <textarea wire:model="query" placeholder="Introduce tu consulta SQL" rows="5" class="w-full border p-2"></textarea>

    <!-- Botón para ejecutar la consulta -->
    <button wire:click="execute" class="bg-blue-500 text-white p-2 mt-2">Ejecutar</button>

    <!-- Mostrar resultados -->
    @if ($result)
        <div class="mt-4">
            <h3>Resultado:</h3>
            <pre>{{ var_dump($result) }}</pre>
        </div>
    @endif

    <!-- Mostrar errores -->
    @if ($error)
        <div class="mt-4 text-red-500">
            <strong>Error:</strong> {{ $error }}
        </div>
    @endif
</div>
