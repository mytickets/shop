<?php

namespace App\Http\Controllers;

use App\DataTables\MetatextDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMetatextRequest;
use App\Http\Requests\UpdateMetatextRequest;
use App\Repositories\MetatextRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// datatable_controller.stub

class MetatextController extends AppBaseController
{
    /** @var  MetatextRepository */
    private $metatextRepository;

    public function __construct(MetatextRepository $metatextRepo)
    {
        $this->metatextRepository = $metatextRepo;
    }

    /**
     * Display a listing of the Metatext.
     *
     * @param MetatextDataTable $metatextDataTable
     * @return Response
     */
    public function index(MetatextDataTable $metatextDataTable)
    {
        return $metatextDataTable->render('metatexts.index');
    }

    /**
     * Show the form for creating a new Metatext.
     *
     * @return Response
     */
    public function create()
    {
        return view('metatexts.create');
    }

    /**
     * Store a newly created Metatext in storage.
     *
     * @param CreateMetatextRequest $request
     *
     * @return Response
     */
    public function store(CreateMetatextRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/metatexts');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $metatext = $this->metatextRepository->create($input);

        Flash::success('Metatext успешно сохранен.');

        return redirect(route('metatexts.index'));
    }

    /**
     * Display the specified Metatext.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $metatext = $this->metatextRepository->find($id);

        if (empty($metatext)) {
            Flash::error('Metatext not found');

            return redirect(route('metatexts.index'));
        }

        return view('metatexts.show')->with('metatext', $metatext);
    }

    /**
     * Show the form for editing the specified Metatext.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $metatext = $this->metatextRepository->find($id);

        if (empty($metatext)) {
            Flash::error('Metatext not found');

            return redirect(route('metatexts.index'));
        }

        return view('metatexts.edit')->with('metatext', $metatext);
    }

    /**
     * Update the specified Metatext in storage.
     *
     * @param  int              $id
     * @param UpdateMetatextRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMetatextRequest $request)
    {
        $metatext = $this->metatextRepository->find($id);

        if (empty($metatext)) {
            Flash::error('Metatext not found');

            return redirect(route('metatexts.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/metatexts');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $metatext = $this->metatextRepository->update($input, $id);

        Flash::success('Metatext updated successfully.');

        return redirect(route('metatexts.index'));
    }

    /**
     * Remove the specified Metatext from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $metatext = $this->metatextRepository->find($id);

        if (empty($metatext)) {
            Flash::error('Metatext not found');

            return redirect(route('metatexts.index'));
        }

        // TODO Удаляем файл
        unlink( getcwd().$metatext['image'] );

        $this->metatextRepository->delete($id);

        Flash::success('Metatext deleted successfully.');

        return redirect(route('metatexts.index'));
    }
}
