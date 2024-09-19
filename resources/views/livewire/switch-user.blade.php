<div>
    
        <label for="user-select">Selecciona un Usuario:</label>
        <select wire:model="selectedUserId" wire:change="selectUser($event.target.value)" id="user-select">
            <option value="">Seleccionar...</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->nombre }}</option>
            @endforeach
        </select>
        <a href="{{ route('login') }}">Ingresar</a>
        
    
</div>
