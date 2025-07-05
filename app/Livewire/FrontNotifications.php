<?php

namespace App\Livewire;

use Filament\Notifications\Livewire\Notifications;
use Livewire\Attributes\On;

class FrontNotifications extends Notifications
{
    #[On('notificationClosed')]
    public function removeNotification(string $id): void
    {
        parent::removeNotification($id);
        //some other stuff
    }
}
