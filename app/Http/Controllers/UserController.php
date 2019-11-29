<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Hash;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
    public $role_types;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->role_types = [ 'Администратор', 'Управляющий', 'Менеджер', 'Официант-Кассир', 'Курьер' ];

    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->paginate(10);

        return view('users.index')
            ->with('users', $users)
                ->with('role_types', $this->role_types);

    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        // return view('users.create');
        return view('users.create')
                ->with('role_types', $this->role_types);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        // $input2 = $request->all();
        // $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['password_confirmation'] = Hash::make($input['password_confirmation']);
        // $user->password = Hash::make($input['password']);
        // $user->password_confirmation = Hash::make($input['password_confirmation']);
        $user = $this->userRepository->create($input);

        Flash::success('User объект успешно сохранён.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User объект не найден');

            return redirect(route('users.index'));
        }

        // return view('users.index')->with('user', $user);
        return view('users.show')
                ->with('user', $user)
                ->with('role_types', $this->role_types);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User объект не найден');

            return redirect(route('users.index'));
        }
        // return view('users.index')->with('user', $user);
        return view('users.edit')
                ->with('user', $user)
                ->with('role_types', $this->role_types);
        // return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User объект не найден');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User обновлено успешно.');
        // $role_type

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User объект не найден');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User объект успешно удалён.');

        return redirect(route('users.index'));
    }
}
