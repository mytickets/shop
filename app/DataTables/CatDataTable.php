<?php

namespace App\DataTables;

use App\Models\Cat;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CatDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'cats.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Cat $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cat $model)
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
                // 'dom'       => 'Bfrtip',
                'dom'       => 'fBrtlip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'colvis', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'data' => 'xml_name',
            'name' => 'xml_name',
            'title' => 'Путь'
        ],

        [
            'data' => 'parent_id',
            'name' => 'parent_id',
            'title' => 'Родитель'
        ],
        [
            'data' => 'menu',
            'name' => 'menu',
            'title' => 'В меню'
        ],

            // 'ident',
            // 'image',
            // 'name',
            // 'xml_name',
            // 'parent_id',
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
        return 'catsdatatable_' . time();
    }
}
