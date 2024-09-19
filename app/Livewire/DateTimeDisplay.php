<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class DateTimeDisplay extends Component
{
    public $currentDateTime;
    public $julianDate;

    public function mount()
    {
        $this->updateDateTime();
    }

    public function updateDateTime()
    {
        Carbon::setLocale('es'); // Establecer el idioma a español



        $now = Carbon::now();
        $this->currentDateTime = $now->translatedFormat('H:i - d \\d\\e F \\d\\e Y');
        $this->julianDate = $now->dayOfYear;
    }

    public function render()
    {
        return view('livewire.date-time-display');
    }
}
