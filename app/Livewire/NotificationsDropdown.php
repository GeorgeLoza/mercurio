<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationsDropdown extends Component
{
    public $notifications;
    

    public function mount()
    {
        $this->notifications = Auth::user()->notifications; // Asume que estás usando la característica de notificaciones de Laravel
    }
    public function markAsRead()
{
    auth()->user()->unreadNotifications->markAsRead();

}
    
}
