<?php

namespace App\Listeners;

use App\Events\CreatePageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePageListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatePageEvent  $event
     * @return void
     */
    public function handle(CreatePageEvent $event)
    {
        // обрабатываем событие создания новой страницы
        $event->page->name .= ' (автор ' . auth()->user()->name . ')';
//        $event->page->user_id = auth()->user()->id;
        $event->page->save();
    }
}
