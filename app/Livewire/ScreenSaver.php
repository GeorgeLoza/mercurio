<?php

namespace App\Livewire;

use Livewire\Component;

class ScreenSaver extends Component
{
    public $isVisible = false;
   

    public function show()

    {
        
        $this->isVisible = true;
    }

    public function render()
    {
        return view('livewire.screen-saver');
    }
}
