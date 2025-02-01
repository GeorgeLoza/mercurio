<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold">Eliminar Rol</h2>

    <p>¿Está seguro que desea eliminar este rol?</p>

    <div class="flex gap-5">
        <button class="bg-blue-600 py-2 px-4 text-center rounded-md" wire:click="$emit('closeModal')">Cancelar</button>
        <button class="bg-red-600 py-2 px-4 text-center rounded-md" wire:click="delete">Confirmar</button>
    </div>
</div>
