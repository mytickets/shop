<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// use App\Providers\View;
use Illuminate\Support\Facades\View;


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
        //
        Schema::defaultStringLength(191);

        $dbs = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        // dd($dbs);
        view()->share('dbs', $dbs);


    }
}
