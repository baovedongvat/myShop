<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Type;
use View;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $sidebar=Type::get();
          View::share('sidebar',$sidebar );
        $categories = Type::orderBy('id','asc')->get();
          View::share('categories',$categories );
      
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
