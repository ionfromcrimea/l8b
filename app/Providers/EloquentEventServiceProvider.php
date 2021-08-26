<?php

namespace App\Providers;

use App\Models\Page;
use App\Observers\PageObserver;
use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        // ...
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        Page::observe(PageObserver::class);
        Page::creating(function ($page) {
            $page->user_id = auth()->user()->id;
        });
    }
}
