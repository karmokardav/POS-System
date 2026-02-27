<?php
namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Listeners\LogUserLogin;
use App\Listeners\LogUserLogout;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    // protected $listen = [
    //     Login::class => [
    //         LogUserLogin::class,
    //     ],

    //     Logout::class => [
    //         LogUserLogout::class,
    //     ],
    // ];

    public function boot(): void
    {
        Event::listen(Login::class, LogUserLogin::class);
        Event::listen(Logout::class, LogUserLogout::class);
    }
}