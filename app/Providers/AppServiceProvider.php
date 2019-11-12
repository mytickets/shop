<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
// use Session;
use Config;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// use App\Providers\View;
use Illuminate\Support\Facades\View;
// use user_id
use Auth;


// use App\Providers\RouteServiceProvider;

use App\Models\Cart;

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

        // TODO Fuck_UP SHARE SESSION_ID
        view()->composer('*', function ($view) 
        {

            if (Auth::check()) {
                # code..
                // Auth::user()->id;
                $view->with('user_id', Auth::user()->id );
    
                $session_id = \Session::getId();
                $cart = Cart::firstOrCreate(['session_id' => $session_id]);
                session('cart', $cart);
                session('session_id', $session_id);
                $view->with('cart', $cart );
                $view->with('session_id', $session_id );
    
            }
            else {
    
                $session_id = \Session::getId();
                $cart = Cart::firstOrCreate(['session_id' => $session_id]);
                session('cart', $cart);
                session('session_id', $session_id);
                $view->with('cart', $cart );
                $view->with('session_id', $session_id );
    
            }

            // Config::set("cart", $cart);
        });
        
        // dd( Session::all() );
        // $session_id = $request->cookie('_session');
        // $_session = $request->session()->get('_session');
        // session(['_session' => $session_id ]);

        // $session_id = $request->cookie('_session');
        // $session_id = Session::getId();
        // view()->share('session_id', $session_id);

        // dd($request);
        // $session_id2 = $request->session()->getId();
        // view()->share('session_id2', $session_id2);


    }


}
