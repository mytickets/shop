<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use Illuminate\Http\Request;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }



	public function show_session(Request $request)
	{

		// Route::get('/session', function (Request $request) {
		    return 'session: '.$request->session()->getId();
		    // return $request->session()->getId();
		// });
	}

	public function __construct()
	{

  // def set_cart
  //   $cart = Cart.find(session[:cart_id])
  // rescue ActiveRecord::RecordNotFound
  //   @cart = Cart.create
  //   session[:cart_id] = @cart.id
  // end 

// $this->middleware(function (Request $request, $next) {
//     // view()->share('user', $request->user());
//   $session_id = $request->session()->getId();
//   view()->share('session_id', $session_id); //cart во всех views
//   // $cart = Cart::firstOrCreate(['session_id' => $session_id]);

// // $total_price = 0;
// // foreach ($this->line_items as $key => $value) {
// //     $total_price=$total_price+$value->price_amount;
// // }
  
//   // Config::set('cart', $cart); // Для получения текущей корзины в контроллерах, где нет ID сессии Config::get('cart')
//     // view()->share('user', Auth::guard('backpack')->user());
//     return $next($request);
// });
	    // view()->share('user', auth()->user());
	    // view()->composer('*', function ($view) {
	    //     $view->with('user', auth()->user());
	    // });
	    // $this->account = Account::find(session('account_id'));
	}

}
