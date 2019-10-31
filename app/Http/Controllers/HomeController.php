<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->middleware(function (Request $request, $next) {
        //     // view()->share('user', $request->user());
        //   // $cart = Cart::firstOrCreate(['session_id' => $session_id]);

        // // $total_price = 0;
        // // foreach ($this->line_items as $key => $value) {
        // //     $total_price=$total_price+$value->price_amount;
        // // }
          
        //   // Config::set('cart', $cart); // Для получения текущей корзины в контроллерах, где нет ID сессии Config::get('cart')
        //     // view()->share('user', Auth::guard('backpack')->user());
        //     return $next($request);
        // });

        // $session_id = $request->session()->getId();
        // view()->share('session_id', $session_id); //cart во всех views

        return view('home');
    }
}
