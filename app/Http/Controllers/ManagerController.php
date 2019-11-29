<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Cat;

class ManagerController extends AppBaseController
{
    private $orderRepository;

    public $status;
    public $pay_types;
    public $pay_places;
    public $role_types;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->role_types = [ 'Администратор', 'Управляющий', 'Менеджер', 'Официант-Кассир', 'Курьер' ];

        $this->status = ['Новый', 'Подтвержден', 'Готовиться', 'Получен', 'Оплачен'];
        $this->pay_types = ['Оплата курьеру', 'Оплата в заведении', 'Онлайн оплата'];
        $this->pay_places = ['Доставка курьером','Место в заведении', 'На вынос'];
    }

    /**
     * Display a listing of the Menu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $menus = $this->menuRepository->paginate(10);

        // $pay_types = ['Оплата курьеру', 'Оплата в заведении', 'Онлайн оплата'];
        // $pay_places = ['Доставка курьером','Место в заведении', 'На вынос'];
        // $status = ['Новый', 'Подтвержден', 'Готовиться', 'Получен', 'Оплачен'];

        $orders = $this->orderRepository->paginate(10);
        $cats = count( Cat::all() );
        return view('manager')
            ->with('orders', $orders)
            ->with('role_types', $this->role_types)
                ->with('status', $this->status)
                ->with('pay_types', $this->pay_types)
                ->with('pay_places', $this->pay_places)
            ->with('cats', $cats);
    }

    public function alert(Request $request)
    {
    }


}
