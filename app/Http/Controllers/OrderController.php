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

use App\Models\Order;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
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
        $orders = $this->orderRepository->paginate(10);
        $pay_types = ['Оплата курьеру', 'Оплата в заведении', 'Онлайн оплата'];
        $pay_places = ['Доставка курьером','Место в заведении', 'На вынос'];
        $status = ['Новый', 'Подтвержден', 'Готовиться', 'Получен', 'Оплачен'];

        return view('orders.index')
            ->with('orders', $orders)
            ->with('status', $status)
            ->with('pay_types', $pay_types)
            ->with('pay_places', $pay_places);


    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        $pay_types = ['Оплата курьеру', 'Оплата в заведении', 'Онлайн оплата'];
        $pay_places = ['Доставка курьером','Место в заведении', 'На вынос'];

        return view('orders.create')
            ->with('pay_types', $pay_types)
            ->with('pay_places', $pay_places);

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
        event( new \App\Events\ServerCreated("Новый заказ!", $id) );

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
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $pay_types = ['Оплата курьеру', 'Оплата в заведении', 'Онлайн оплата'];
        $pay_places = ['Доставка курьером','Место в заведении', 'На вынос'];
        $status = ['Новый', 'Подтвержден', 'Готовиться', 'Получен', 'Оплачен'];

        // return view('orders.index')
        //     ->with('orders', $orders)
        //     ->with('pay_types', $pay_types)
        //     ->with('pay_places', $pay_places);


        return view('orders.show')
                ->with('order', $order)
                ->with('status', $status)
                ->with('pay_types', $pay_types)
                ->with('pay_places', $pay_places);

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
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $pay_types = ['Оплата курьеру', 'Оплата в заведении', 'Онлайн оплата'];
        $pay_places = ['Доставка курьером','Место в заведении', 'На вынос'];
        $status = ['Новый', 'Подтвержден', 'Готовиться', 'Получен', 'Оплачен'];

        return view('orders.edit')
                ->with('order', $order)
                ->with('status', $status)
                ->with('pay_types', $pay_types)
                ->with('pay_places', $pay_places);

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
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $input = $request->all();
        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('public/orders');
        //     $publicPath = \Storage::url( $path );
        //     $input['image'] = $publicPath;
        // }

        $order = $this->orderRepository->update($input, $id);

        Flash::success('Order updated successfully.');
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
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        // TODO Удаляем файл
        // unlink( getcwd().$order['image'] );

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
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
        return $order->remove_items();
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



}
