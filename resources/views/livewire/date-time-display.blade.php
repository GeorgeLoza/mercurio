<!-- resources/views/livewire/date-time-display.blade.php -->
<div wire:poll.60000ms="updateDateTime" class=" hidden md:flex">
    <div>
    {{ $currentDateTime }} - <span class="font-bold"> "{{ $julianDate }}"</span>
    </div>
</div>
