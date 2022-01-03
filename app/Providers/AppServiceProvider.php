<?php

namespace App\Providers;

use App\Composers\HomeComposer;
use App\Http\Controllers\CategoryTypeController;
use App\Models\category_type;
use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
    }
}
