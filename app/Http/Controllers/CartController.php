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

use Illuminate\Support\Facades\Redirect;

use App\Models\Cart;
use Mail;

class CartController extends AppBaseController
{
    /** @var  CartRepository */
    private $cartRepository;
    public $pay_types;
    public $pay_places;

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
        $this->pay_places = ['Место в заведении','Номер в гостинице', 'На вынос'];
        $this->pay_types = ['Оплата наличными', 'Оплата картой', 'Онлайн оплата'];
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

        $cart = $this->cartRepository->create($input);

        Flash::success('Корзина успешно сохранена.');

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
            Flash::error('Cart объект не найден');

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
            Flash::error('Cart объект не найден');

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
            Flash::error('Cart объект не найден');

            return redirect(route('carts.index'));
        }

        $input = $request->all();

        $cart = $this->cartRepository->update($input, $id);

        Flash::success('Корзина обновлена успешно.');

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
            Flash::error('Корзина объект не найден');

            return redirect(route('carts.index'));
        }

        $this->cartRepository->delete($id);

        Flash::success('Корзина удалена.');

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
        $cart->remove_items();
    }


    public function checkout($id, Request $request)
    {

        $input = $request->all();
        $cart = Cart::find($id);
        if ($cart == null) {
    		 return abort(404);
        }
    	else
   		{

        	if (isset($input['my_place'])) {

                if ($input['my_place']==0) {
                    $pay_adr = "Стол в заведении ".$input['stol_number'];
                }
                if ($input['my_place']==1) {
                    $pay_adr = "Номер в отеле ".$input['hotel_number'];
                }
                if ($input['my_place']==2) {
                    $pay_adr = $input['contact_adr'];
                }

                $contact_number = $input['contact_number'];
                // $contact_email  = $input['contact_email'];

                if (isset($input['contact_email'])) {
                    $contact_email = $input['contact_email'];
                } else {
                    $contact_email = 'нет';
                }

                if (isset($input['order_date'])) {
                    $order_date = $input['order_date'];
                } else {
                    $order_date = 'сегодня';
                }

                if (isset($input['order_time'])) {
                    $order_time = $input['order_time'];
                } else {
                    $order_time = 'сейчас';
                }

                $this_pay_place = $this->pay_places[$input["my_place"]];
                $this_pay_type  = $this->pay_types[$input['pay_type']];

$comment = <<<EOT
Новый заказ

Телефон: $contact_number
Email: $contact_email
Место: $this_pay_place
Номер места/номера или адрес заказа: $pay_adr
Тип оплаты: $this_pay_type

На дату: $order_date
На время: $order_time
EOT;

                // создаем Заказ
                $check = \App\Models\Order::create( [ 'pay_place' => $input['my_place'], 'pay_adr' => $pay_adr, 'pay_contact' => $contact_number, 'status' => '0', 'pay_type'=> $input['pay_type'], 'comment' => $comment ]);

                // создаем позиции для Заказа order_id
                foreach ($cart->line_items as $key => $line) {
                    $new_line = \App\Models\LineItem::create(['order_id'=>$check->id, 'product_id'=>$line->product_id, 'qty'=>$line->qty]);
                }

                // PUSH уведомление о новом заказе $check->id
            	event( new \App\Events\ServerCreated("Новый заказ!", $check->id) );

                // Берем всех пользователей
                $subscribe_users = \App\Models\User::all();
                // перебор пользователей
                foreach ($subscribe_users as $key2 ) {
                    // если пользователь подписан получать заказы
                    if ($key2['subscribe']==1) {
                    // if (false) {

                        // $from = env('MAIL_USERNAME', 'mltefive@gmail.com');
                        $to = $key2['email'];
                        $contactName = $key2['name'];
                        $contactEmail = $key2['email'];


                        $data = array('order' => $check, 'to' => $to, 'email'=>$contactEmail);
                        // отправляем заказ на почту
                        Mail::send(['text'=>'order_email'], $data, function($message) use ($contactEmail, $contactName) {
                                $message->to($contactEmail, $contactName)->subject('Заказ');
                                $message->from(env('MAIL_USERNAME', 'zakaz@restoran-nadezhda.com'),'Сайт');
                            });


                        // если установлен contact_email
                        if (isset($input['contact_email'])) {
                            $data2 = array('order' => $check, 'to' => $to, 'email'=>$input['contact_email']);
                            $contactEmail=$input['contact_email'];

                            Mail::send(['text'=>'order_email'], $data2, function($message) use ($contactEmail, $contactName) {
                                    $message->to($contactEmail, 'Гость')->subject('Заказ');
                                    $message->from(env('MAIL_USERNAME', 'zakaz@restoran-nadezhda.com'),'Сайт');
                                });
                        } // if (isset($input['contact_email'])) {

                    } // if ($key2['subscribe']==1) {
                }
                
                $cart->delete();
            	return view('menu3.thanks')->with('order_id', $check->id);
        	}
            else {
            	return abort(404);
            }
    	}
	} // END public function checkout
      


}
