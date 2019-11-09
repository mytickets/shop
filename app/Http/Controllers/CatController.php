<?php

namespace App\Http\Controllers;

use App\DataTables\CatDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCatRequest;
use App\Http\Requests\UpdateCatRequest;
use App\Repositories\CatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;

class CatController extends AppBaseController
{
    /** @var  CatRepository */
    private $catRepository;

    public function __construct(CatRepository $catRepo)
    {
        $this->catRepository = $catRepo;
    }

    /**
     * Display a listing of the Cat.
     *
     * @param CatDataTable $catDataTable
     * @return Response
     */
    public function index(CatDataTable $catDataTable)
    {
        return $catDataTable->render('cats.index');
    }

    public function cats_tree()
    {
        // return $catDataTable->render('cats.index');
        // return view('cats.tree')->with('cats', \App\Models\Cat::all() );
        return view('cats.tree')->with('cats', \App\Models\Cat::where('parent_id',0)->get() );
    }



    /**
     * Show the form for creating a new Cat.
     *
     * @return Response
     */
    public function create()
    {
        return view('cats.create');
    }

    /**
     * Store a newly created Cat in storage.
     *
     * @param CreateCatRequest $request
     *
     * @return Response
     */
    public function store(CreateCatRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/cats');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $cat = $this->catRepository->create($input);

        Flash::success('Cat успешно сохранен.');

        return redirect(route('cats.index'));
    }

    /**
     * Display the specified Cat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        // $this->data['products'] = Product::where('cat_id',$id)->get();
        // $this->data['childrens'] = Cat::where('parent_id',$id)->get();
        return view('cats.show')->with('cat', $cat);
    }

    /**
     * Show the form for editing the specified Cat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        return view('cats.edit')->with('cat', $cat);
    }

    /**
     * Update the specified Cat in storage.
     *
     * @param  int              $id
     * @param UpdateCatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatRequest $request)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/cats');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $cat = $this->catRepository->update($input, $id);

        Flash::success('Cat updated successfully.');

        return redirect(route('cats.index'));
    }

    /**
     * Remove the specified Cat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            Flash::error('Cat not found');

            return redirect(route('cats.index'));
        }

        unlink( getcwd().$cat['image'] );

        $this->catRepository->delete($id);

        Flash::success('Cat deleted successfully.');

        return redirect(route('cats.index'));
    }
}
