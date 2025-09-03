<!-- resources/views/livewire/date-time-display.blade.php -->
<div wire:poll.60000ms="updateDateTime" class=" ">
    <div  class="flex">
    <span class="hidden md:flex"> {{ $currentDateTime }}  - </span>  <span class="font-bold"> "{{ $julianDate }}"</span>
    </div>
</div>
