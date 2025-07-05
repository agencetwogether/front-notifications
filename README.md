## Issue with notifications used in front office

To test, simply

```git clone git@github.com:agencetwogether/front-notifications.git```

```cd front-notifications```

```composer install```

```php artisan serve```

PS : .env and .sqlite already set.

See the problem in **index page**.

## The problem

#### If you close anyone notification, others move on the top right. If you refresh page, notifications show bottom center as defined.

I define a Middleware to set notification position (because in front office, I want to show them at the bottom center, whereas in admin panel, on top right like by default)

```php
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
```
