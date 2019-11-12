<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// datatable_controller.stub

use App\Models\LineItem;
use App\Models\Cart;
use Config;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }


    /**
     * Display a listing of the Product.
     *
     * @param ProductDataTable $productDataTable
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        
        return $productDataTable->render('products.index');
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $product = $this->productRepository->create($input);

        Flash::success('Продукт успешно сохранен.');

        return redirect(route('products.index'));
    }


    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Продукт объект не найден');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Продукт объект не найден');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Продукт объект не найден');

            return redirect(route('products.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $product = $this->productRepository->update($input, $id);

        Flash::success('Продукт обновлено успешно.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Продукт объект не найден');

            return redirect(route('products.index'));
        }

        // TODO Удаляем файл
        unlink( getcwd().$product['image'] );

        $this->productRepository->delete($id);

        Flash::success('Продукт удален.');

        return redirect(route('products.index'));
    }

















    public function to_cart($ident, $qty=1)
    {
            $session_id = \Session::getId();
            $cart = Cart::firstOrCreate(['session_id' => $session_id]);
            session('cart', $cart);
            // session('session_id', $session_id);
            // $attributes = ['invited_by_id' => '.'];

            $instance = LineItem::where(['cart_id' => $cart->id, 'product_id'=>$ident])->first();
            if( is_null ( $instance ) ) {
                LineItem::create(['cart_id' => $cart->id, 'product_id'=>$ident, 'qty'=>$qty]);
            } else {
                $qty_new = $instance->qty+$qty;
                $instance->update(['qty'=>$qty_new]);
            }

        return 'ok';
    }










    public function check_menu($ident)
    {
        $m = \App\Models\Product::where('ident',$ident)->first();

        if ($m->menu==0) {
            $m->menu=1;
            $mm='V';
        } else {
            $m->menu=0;
            $mm='X';
        }
        $m->save();
        return $mm;
    }
    public function check_menu2($ident)
    {
        $m = \App\Models\Product::where('ident',$ident)->first();

        if ($m->menu==0) {
            $m->menu=1;
            // $mm='V';
            $mm='V';
            $mcolor="success";
        } else {
            $m->menu=0;
            // $mm='X';
            $mm='X';
            $mcolor="default";
        }
        $m->save();
        return [$mm, $mcolor];
    }



    public function products_enable()
    {
        return view('products.products_enable')->with('products', \App\Models\Product::where('parent_id',0)->get() );
    }



}
