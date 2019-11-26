<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        // return $dataTable->addColumn('action', 'products.datatables_actions');
        return $dataTable->addColumn('action', 'products.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            
            ->columns($this->getColumns())
                ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                // 'dom'       => 'fBlrtip',
                'dom'       => 'fBrtlip',
                // 'dom'       => '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'colvis', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

        // [
        //     'data' => 'action',
        //     'name' => 'action',
        //     'title' => 'Действия'
        // ],
        [
            'data' => 'ident',
            'name' => 'ident',
            'title' => 'ID'
        ],
        [
            'data' => 'image',
            'name' => 'image',
            'title' => 'Фото'
        ],
        [
            'data' => 'name',
            'name' => 'name',
            'title' => 'Название'
        ],
        [
            'data' => 'xml_cat',
            'name' => 'xml_cat',
            'title' => 'Путь'
        ],

        [
            'data' => 'cat_id',
            'name' => 'cat_id',
            'title' => 'Категория'
        ],
        [
            'data' => 'price_amount',
            'name' => 'price_amount',
            'title' => 'Цена'
        ],
        [
            'data' => 'menu',
            'name' => 'menu',
            'title' => 'В меню'
        ],
            // 'id',
            // 'ident',
            // 'image',
            // 'name',
            // 'xml_cat',
            // 'cat_id',
            // 'price_amount',
            // 'menu'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'productsdatatable_' . time();
    }


    // $model = App\User::query();

    // return DataTables::eloquent($model)
    //             ->addColumn('link', '<a href="#">Html Column</a>')
    //             ->addColumn('action', 'path.to.view')
    //             ->rawColumns(['link', 'action'])
    //             ->toJson();

}
