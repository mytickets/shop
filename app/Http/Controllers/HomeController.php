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

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function generateDocx()

    {

        $phpWord = new \PhpOffice\PhpWord\PhpWord();


        $section = $phpWord->addSection();


        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";


        $section->addImage("http://itsolutionstuff.com/frontTheme/images/logo.png");

        $section->addText($description);


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        try {

            $objWriter->save(storage_path('helloWorld.docx'));

        } catch (Exception $e) {

        }


        return response()->download(storage_path('helloWorld.docx'));

    }

}
