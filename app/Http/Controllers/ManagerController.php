<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;



class ManagerController extends AppBaseController
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
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

        // return view('manager')
        //     ->with('menus', $menus);
        $orders = $this->orderRepository->paginate(10);

        return view('manager')
            ->with('orders', $orders);
    }

    public function alert(Request $request)
    {
    }


}
