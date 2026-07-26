<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $categories = Category::all();
        // View::share('categories', $categories);

        LogViewer::auth(function ($request) {
            return $request->user()
                && in_array($request->user()->email, [
                    '1@1.com',
                ]);
        });
        
    }
}
