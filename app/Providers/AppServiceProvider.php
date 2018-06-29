<?php

namespace App\Providers;

use App\Category;
use App\Post;
use App\Tags;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!\App::runningInConsole()){
             if(Schema::hasTable('categories')){
                View::share('categories', Category::all());
            }
            if(Schema::hasTable('tags')){
                View::share('tags', Tags::all());
            }
            View::share('last5posts', Post::OrderBy('id','desc')->take(env('LASTPOST', ''))->get());
        }
            
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
