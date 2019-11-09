<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Repositories\CartRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

use App\Models\Cart;

class CartController extends AppBaseController
{
    /** @var  CartRepository */
    private $cartRepository;

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
    }

    /**
     * Display a listing of the Cart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carts = $this->cartRepository->paginate(10);

        return view('carts.index')
            ->with('carts', $carts);
    }


    /**
     * Show the form for creating a new Cart.
     *
     * @return Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created Cart in storage.
     *
     * @param CreateCartRequest $request
     *
     * @return Response
     */
    public function store(CreateCartRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/carts');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $cart = $this->cartRepository->create($input);

        Flash::success('Cart успешно сохранен.');

        return redirect(route('carts.index'));
    }

    /**
     * Display the specified Cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        return view('carts.show')->with('cart', $cart);
    }

    /**
     * Show the form for editing the specified Cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        return view('carts.edit')->with('cart', $cart);
    }




    /**
     * Update the specified Cart in storage.
     *
     * @param int $id
     * @param UpdateCartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartRequest $request)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/carts');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $cart = $this->cartRepository->update($input, $id);

        Flash::success('Cart updated successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Remove the specified Cart from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        // TODO Удаляем файл
        if ( file_exists( getcwd().$cart['image']) ) {
            # code...
            // unlink( getcwd().$cart['image'] );
        }

        $this->cartRepository->delete($id);

        Flash::success('Cart deleted successfully.');

        return redirect(route('carts.index'));
    }


    public function destroy_all()
    {
        Cart::truncate();
        Flash::success('Всё удалено!');
        return redirect(route('carts.index'));
    }


    public function total($id)
    {
        $cart = Cart::find($id);
        return $cart->total();
    }

    public function total_qty($id)
    {
        $cart = Cart::find($id);
        return $cart->total_qty();
    }
    public function remove_items($id)
    {
        $cart = Cart::find($id);
        return $cart->remove_items();
    }


    public function checkout($id, Request $request)
    {

        $input = $request->all();

  //       // if ($request->hasFile('image')) {
  //       //     $path = $request->file('image')->store('public/carts');
  //       //     $publicPath = \Storage::url( $path );
  //       //     $input['image'] = $publicPath;
  //       // }

        $cart = Cart::find($id);
        // $cart = Cart::findOrFail($id);
        if ($cart == null) {
    		// return 'error нет корзины';
    		 return abort(404);
        }
    	else
    		{

		        	if (isset($input['pay_type'])){

				        $check = \App\Models\Order::create( [ 'pay_type' => $input['pay_type'], 'pay_place' => $input['pay_place'], 'pay_adr' => $input['pay_adr'], 'pay_contact' => $input['pay_contact'], 'status' => '0' ]);

				        foreach ($cart->line_items as $key => $line) {
				            $new_line = \App\Models\LineItem::create(['order_id'=>$check->id, 'product_id'=>$line->product_id, 'qty'=>$line->qty]);
				        }

			        	event( new \App\Events\ServerCreated("Новый заказ!", $check->id) );
			    	    $cart->delete();
			        	return view('menu3.thanks')->with('order_id', $check->id);
	        		
		        	}
			        else {
			        	return 'null';
			        }
		        // if ($cart->line_items) {
		        	
				if (!isset($cart->line_items)){

		        // 	# code...

		        // }
		        	// return view('menu3.thanks')->with('order_id', $cart->line_items);

				// $article = Cart::findOrFail($id);
				// $article->delete();

		        // $order = App\Models\Order::create(['cart_id'=>$cart->id, 'status'=>'new', 'pay_type'=>"", 'adr'=>'adr', 'phone'=>])
		        
		        // $params = array('');
		        // return $cart->checkout($cart);

		        // return view('carts.index')
		            // ->with('carts', $carts);
		    	}
		    	// else 
		    	// {
		    	// 	return 'error нет позиций';
		    	// }


    		}


	}
      


}
