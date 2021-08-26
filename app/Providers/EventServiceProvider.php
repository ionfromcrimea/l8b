<?php

namespace App\Providers;

use App\Events\CreatePageEvent;
use App\Listeners\CreatePageListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // обработчик события создания новой страницы
        CreatePageEvent::class => [
            CreatePageListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //

//        parent::boot();
//        Event::listen('CreatePageEvent', function (Page $page) {
//             обрабатываем событие создания новой страницы
//            $page->name .= ' (автор ' . auth()->user()->name . ')';
//            $page->save();
//        });

    }
}
