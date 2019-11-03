<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLineItemRequest;
use App\Http\Requests\UpdateLineItemRequest;
use App\Repositories\LineItemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

use App\Models\LineItem;

class LineItemController extends AppBaseController
{
    /** @var  LineItemRepository */
    private $lineItemRepository;

    public function __construct(LineItemRepository $lineItemRepo)
    {
        $this->lineItemRepository = $lineItemRepo;
    }

    /**
     * Display a listing of the LineItem.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lineItems = $this->lineItemRepository->paginate(10);

        return view('line_items.index')
            ->with('lineItems', $lineItems);
    }

    /**
     * Show the form for creating a new LineItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('line_items.create');
    }

    /**
     * Store a newly created LineItem in storage.
     *
     * @param CreateLineItemRequest $request
     *
     * @return Response
     */
    public function store(CreateLineItemRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/line_items');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $lineItem = $this->lineItemRepository->create($input);

        Flash::success('Line Item успешно сохранен.');

        return redirect(route('lineItems.index'));
    }

    /**
     * Display the specified LineItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lineItem = $this->lineItemRepository->find($id);

        if (empty($lineItem)) {
            Flash::error('Line Item not found');

            return redirect(route('lineItems.index'));
        }

        return view('line_items.show')->with('lineItem', $lineItem);
    }

    /**
     * Show the form for editing the specified LineItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lineItem = $this->lineItemRepository->find($id);

        if (empty($lineItem)) {
            Flash::error('Line Item not found');

            return redirect(route('lineItems.index'));
        }

        return view('line_items.edit')->with('lineItem', $lineItem);
    }

    /**
     * Update the specified LineItem in storage.
     *
     * @param int $id
     * @param UpdateLineItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLineItemRequest $request)
    {
        $lineItem = $this->lineItemRepository->find($id);

        if (empty($lineItem)) {
            Flash::error('Line Item not found');

            return redirect(route('lineItems.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/line_items');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $lineItem = $this->lineItemRepository->update($input, $id);

        Flash::success('Line Item updated successfully.');

        return redirect(route('lineItems.index'));
    }

    /**
     * Remove the specified LineItem from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lineItem = $this->lineItemRepository->find($id);

        if (empty($lineItem)) {
            Flash::error('Line Item not found');

            return redirect(route('lineItems.index'));
        }

        // TODO Удаляем файл

        $this->lineItemRepository->delete($id);

        Flash::success('Line Item deleted successfully.');

        return redirect(route('lineItems.index'));
    }

    public function destroy_all()
    {
        LineItem::truncate();
        Flash::success('Всё удалено!');
        return redirect(route('lineItems.index'));
    }

}
