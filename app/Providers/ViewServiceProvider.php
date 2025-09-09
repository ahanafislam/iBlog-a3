<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.partials.navbar', function($view) {
            $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

            $view->with('categories', $categories);
        });
    }
}
