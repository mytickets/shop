<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCartAPIRequest;
use App\Http\Requests\API\UpdateCartAPIRequest;
use App\Models\Cart;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CartController
 * @package App\Http\Controllers\API
 */

class CartAPIController extends AppBaseController
{
    /** @var  CartRepository */
    private $cartRepository;

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
    }

    /**
     * Display a listing of the Cart.
     * GET|HEAD /carts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carts = $this->cartRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($carts->toArray(), 'Carts retrieved successfully');
    }

    /**
     * Store a newly created Cart in storage.
     * POST /carts
     *
     * @param CreateCartAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCartAPIRequest $request)
    {
        $input = $request->all();

        $cart = $this->cartRepository->create($input);

        return $this->sendResponse($cart->toArray(), 'Cart успешно сохранен');
    }

    /**
     * Display the specified Cart.
     * GET|HEAD /carts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cart $cart */
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        return $this->sendResponse($cart->toArray(), 'Cart retrieved successfully');
    }

    /**
     * Update the specified Cart in storage.
     * PUT/PATCH /carts/{id}
     *
     * @param int $id
     * @param UpdateCartAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cart $cart */
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        $cart = $this->cartRepository->update($input, $id);

        return $this->sendResponse($cart->toArray(), 'Cart updated successfully');
    }

    /**
     * Remove the specified Cart from storage.
     * DELETE /carts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cart $cart */
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        $cart->delete();

        return $this->sendResponse($id, 'Cart deleted successfully');
    }
}
