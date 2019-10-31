<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
// use Session;


use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// use App\Providers\View;
use Illuminate\Support\Facades\View;


// use App\Providers\RouteServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Sven\ArtisanView\ServiceProvider::class);
        }    
    }    

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    //Challenges
    // $router->filter('challenge_general_permission', function($route)

    public function boot(Request $request)
    {
        Schema::defaultStringLength(191);

        $dbs = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        // dd($dbs);
        view()->share('dbs', $dbs);

        $session_id = Session::getId();
        view()->share('session_id', $session_id);

        // $cart = Cart::firstOrCreate(['session_id' => $session_id]);
        // view()->share('cart', $cart);

    }


}
