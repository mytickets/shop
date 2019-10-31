<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Repositories\MenuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ManagerController extends AppBaseController
{
    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepository = $menuRepo;
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
        $menus = $this->menuRepository->paginate(10);

        return view('manager')
            ->with('menus', $menus);
    }

    public function alert(Request $request)
    {
        // $menus = $this->menuRepository->paginate(10);

        // return view('menus.index')
            // ->with('menus', $menus);
        // return redirect(route('menus.index'));
    }


}
