<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\OrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

use Illuminate\Support\Facades\Redirect;
use Mail;
use Auth;

use App\Models\Order;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;
    public $status;
    public $pay_types;
    public $pay_places;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->status = ['Новый', 'Подтвержден', 'Готовиться', 'Получен', 'Оплачен'];
        $this->pay_places = ['Место в заведении','Номер в гостинице', 'На вынос'];
        $this->pay_types = ['Оплата наличными', 'Оплата картой', 'Онлайн оплата'];

    }

    /**
     * Display a listing of the Order.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $orders = $this->orderRepository->paginate(10);

        if (Auth::check()){
            // если Крурьер
            if (Auth::user()->role_type==4) {
                $orders = \App\Models\Order::where('user_id', Auth::user()->id )->get();
            } else {
                $orders = $this->orderRepository->paginate(10);
            }
        }

        return view('orders.index')
            ->with('orders', $orders)
            ->with('status', $this->status)
            ->with('pay_types', $this->pay_types)
            ->with('pay_places', $this->pay_places);


    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders.create')
            ->with('cats', \App\Models\Cat::where('parent_id',0)->get() )
            ->with('status', $this->status)
            ->with('pay_types', $this->pay_types)
            ->with('pay_places', $this->pay_places);
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();
        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('public/orders');
        //     $publicPath = \Storage::url( $path );
        //     $input['image'] = $publicPath;
        // }

        $order = $this->orderRepository->create($input);

        Flash::success('Order успешно сохранен.');
        // $order['id']
//        event( new \App\Events\ServerCreated("Новый заказ!", $id) );

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order объект не найден');

            return redirect(route('orders.index'));
        }

        return view('orders.show')
                ->with('order', $order)
                ->with('cats', \App\Models\Cat::where('parent_id',0)->get() )
                ->with('status', $this->status)
                ->with('pay_types', $this->pay_types)
                ->with('pay_places', $this->pay_places);

    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order объект не найден');

            return redirect(route('orders.index'));
        }

        return view('orders.edit')
                ->with('order', $order)
                ->with('cats', \App\Models\Cat::where('parent_id',0)->get() )
                ->with('status', $this->status)
                ->with('pay_types', $this->pay_types)
                ->with('pay_places', $this->pay_places);

    }

    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order объект не найден');

            return redirect(route('orders.index'));
        }

        $input = $request->all();


        if (isset($input['send_email']) && $input['send_email']==1) {

            // dd($input['send_email']);

            if (isset($input['user_id']) && $input['user_id']!=0) {
                $user = \App\Models\User::find($input['user_id']);

                $data2 = array('order' => $order);
                $contactEmail=$user->email;
                $contactName=$user->name;
                Mail::send(['text'=>'order_email'], $data2, function($message) use ($contactEmail, $contactName) {
                        $message->to($contactEmail, $contactName)->subject('Уведомление');
                        $message->from(env('MAIL_USERNAME', 'zakaz@restoran-nadezhda.com'),'Уведомление Курьеру');
                    });
            }

        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('public/orders');
        //     $publicPath = \Storage::url( $path );
        //     $input['image'] = $publicPath;
        }

        $order = $this->orderRepository->update($input, $id);

        Flash::success('Заказ обновлен.');
        // event( new \App\Events\ServerCreated("Новый заказ!", $id) );

        return redirect(route('orders.index'));


    }

    /**
     * Remove the specified Order from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order объект не найден');

            return redirect(route('orders.index'));
        }

        // TODO Удаляем файл
        // unlink( getcwd().$order['image'] );

        $this->orderRepository->delete($id);

        Flash::success('Order объект успешно удалён.');

        // return redirect(route('orders.index'));
        return Redirect::back();
    }


    public function destroy_all()
    {
        Order::truncate();
        Flash::success('Всё удалено!');
        return redirect(route('orders.index'));
    }


    public function total($id)
    {
        $order = Order::find($id);
        return $order->total();
    }

    public function total_qty($id)
    {
        $order = Order::find($id);
        return $order->total_qty();
    }
    public function remove_items($id)
    {
        $order = Order::find($id);
        $order->remove_items();
        return Redirect::back();
    }

    public function check($id, Request $request)
    {

        $input = $request->all();
        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('public/carts');
        //     $publicPath = \Storage::url( $path );
        //     $input['image'] = $publicPath;
        // }

        $order = Order::find($id);
        return view('app.check')->with('order_id', $order->line_items);

    }

    // public function status($status='new')
    // {
    //     // event( new \App\Events\ServerCreated("Новый заказ!", 1) );
    //     return view('menu3.thanks')->with('thanks', $thanks_id);
    // }


    public function client_order_show($client_order_show_id, Request $request)
    {

        $order = $this->orderRepository->find($client_order_show_id);

        if (empty($order)) {
            Flash::error('Объект не найден');
            return abort(404);
        }

        return view('menu3.client_order_show')
                ->with('order', $order)
                ->with('status', $this->status)
                ->with('pay_types', $this->pay_types)
                ->with('pay_places', $this->pay_places);

    }

    public function add_product_item($id, $product_id, Request $request)
    {
        // $input = $request->all();
        $order = \App\Models\Order::find( $id );
        // создаем позиции для Заказа order_id
        \App\Models\LineItem::create(['order_id'=>$order->id, 'product_id'=>$product_id, 'qty'=>1]);
        return 'ok';
    }

    public function generateDocx($id, Request $request)
    {
        // $order = \App\Models\Order::find( $id );
        // // dd($order->comment);


        // $phpWord = new \PhpOffice\PhpWord\PhpWord();
        // $phpWord->setDefaultFontName('Times New Roman');
        // $phpWord->setDefaultFontSize(14);
        // $properties = $phpWord->getDocInfo();

        // $properties->setCreator('Name PhpWord');
        // $properties->setCompany('Company PhpWord');
        // $properties->setTitle('Title PhpWord');
        // $properties->setDescription('Description PhpWord');
        // $properties->setCategory('My category PhpWord');
        // $properties->setLastModifiedBy('My name PhpWord');
        // $properties->setCreated(mktime(0, 0, 0, 3, 12, 2015));
        // $properties->setModified(mktime(0, 0, 0, 3, 14, 2015));
        // $properties->setSubject('PhpWord subject');
        // $properties->setKeywords('my, key, word');

        // // $input = $request->all();

        // $section = $phpWord->addSection();
        // $section->addText('Заказ №'.$order->id);

        // $description = $order->comment;

        // $text = $order->comment;
        // $textlines = explode("\r\n", $text);

        // $textrun = $section->addTextRun();
        // $textrun->addText(array_shift($textlines));
        // // $section->addText($description);
        // foreach($textlines as $line) {
        //     $textrun->addTextBreak();
        //     // maybe twice if you want to seperate the text
        //     // $textrun->addTextBreak(2);
        //     $textrun->addText($line);
        // }

        // $textrun->addTextBreak();

        // $section->addImage("http://itsolutionstuff.com/frontTheme/images/logo.png");



        // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        // try {

        //     $objWriter->save(storage_path('helloWorld1.docx'));

        // } catch (Exception $e) {

        // }


        // return response()->download(storage_path('helloWorld1.docx'));
    }


// 

}
