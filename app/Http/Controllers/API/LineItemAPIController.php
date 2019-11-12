<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLineItemAPIRequest;
use App\Http\Requests\API\UpdateLineItemAPIRequest;
use App\Models\LineItem;
use App\Repositories\LineItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LineItemController
 * @package App\Http\Controllers\API
 */

class LineItemAPIController extends AppBaseController
{
    /** @var  LineItemRepository */
    private $lineItemRepository;

    public function __construct(LineItemRepository $lineItemRepo)
    {
        $this->lineItemRepository = $lineItemRepo;
    }

    /**
     * Display a listing of the LineItem.
     * GET|HEAD /lineItems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lineItems = $this->lineItemRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($lineItems->toArray(), 'Line Items retrieved successfully');
    }

    /**
     * Store a newly created LineItem in storage.
     * POST /lineItems
     *
     * @param CreateLineItemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLineItemAPIRequest $request)
    {
        $input = $request->all();

        $lineItem = $this->lineItemRepository->create($input);

        return $this->sendResponse($lineItem->toArray(), 'Line Item успешно сохранен');
    }

    /**
     * Display the specified LineItem.
     * GET|HEAD /lineItems/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LineItem $lineItem */
        $lineItem = $this->lineItemRepository->find($id);

        if (empty($lineItem)) {
            return $this->sendError('Line Item объект не найден');
        }

        return $this->sendResponse($lineItem->toArray(), 'Line Item retrieved successfully');
    }

    /**
     * Update the specified LineItem in storage.
     * PUT/PATCH /lineItems/{id}
     *
     * @param int $id
     * @param UpdateLineItemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLineItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var LineItem $lineItem */
        $lineItem = $this->lineItemRepository->find($id);

        if (empty($lineItem)) {
            return $this->sendError('Line Item объект не найден');
        }

        $lineItem = $this->lineItemRepository->update($input, $id);

        return $this->sendResponse($lineItem->toArray(), 'LineItem обновлено успешно');
    }

    /**
     * Remove the specified LineItem from storage.
     * DELETE /lineItems/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LineItem $lineItem */
        $lineItem = $this->lineItemRepository->find($id);

        if (empty($lineItem)) {
            return $this->sendError('Line Item объект не найден');
        }

        $lineItem->delete();

        return $this->sendResponse($id, 'Line Item deleted successfully');
    }
}
