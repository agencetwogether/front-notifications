<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontNotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Notifications::alignment(Alignment::Center);
        Notifications::verticalAlignment(VerticalAlignment::End);

        $notifications = [
            [
                'id' => 1,
                'title' => 'Notif 1',
            ],
            [
                'id' => 2,
                'title' => 'Notif 2',
            ],
            [
                'id' => 3,
                'title' => 'Notif 3',
            ],
        ];

        foreach ($notifications as $notification) {
            Notification::make()
                ->id($notification['id'])
                ->title($notification['title'])
                ->persistent()
                ->send();
        }

        return $next($request);
    }
}
