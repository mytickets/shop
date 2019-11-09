@section('css')
    @include('layouts.datatables_css')
@endsection


<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Pay Type') }}</th>
        <th>{{ __('Pay Place') }}</th>
        {{-- <th>{{ __('Pay Adr') }}</th> --}}
        {{-- <th>{{ __('Pay Contact') }}</th> --}}
        {{-- <th>{{ __('Pay Discount') }}</th> --}}
        <th>{{ __('Status') }}</th>
        {{-- <th>{{ __('Comment') }}</th> --}}

                <th>Продуктов</th>
                <th>Создано</th>
                <th>Обновлено</th>


                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>
                    {!! $order->id !!}
                </td>

                <td>
                    {!! $pay_types[$order->pay_type] !!}
                </td>
            <td>
                {{-- {!! $order->pay_place !!} --}}
                {!! $pay_places[$order->pay_place] !!}
            </td>
            {{-- <td>{!! $order->pay_adr !!}</td> --}}
            {{-- <td>{!! $order->pay_contact !!}</td> --}}
            {{-- <td>{!! $order->pay_discount !!}</td> --}}
            <td>
                {{-- {!! $order->status !!} --}}
                {!! $status[$order->status] !!}
            </td>
            {{-- <td>{!! $order->comment !!}</td> --}}

            <td>{!! count($order->line_items) !!}</td>
            <td>{!! $order->created_at !!}</td>
            <td>{!! $order->updated_at !!}</td>


                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



@section('scripts')
    @include('layouts.datatables_js')
    {{-- {!! $dataTable->scripts() !!} --}}

    <script type="text/javascript">
        {{-- $('table').DataTable(); --}}

        // https://datatables.net/plug-ins/sorting/datetime-moment
        // //cdn.datatables.net/plug-ins/1.10.20/sorting/datetime-moment.js

        $('table').DataTable(
            // );
            // $.extend( $.fn.dataTable.defaults, 
            {
                searching: true,
                ordering:  true,
                language: {
                    // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json",
                      "processing": "Подождите...",
                      "search": "Поиск:",
                      "lengthMenu": "Показать _MENU_ записей",
                      "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                      "infoEmpty": "Записи с 0 до 0 из 0 записей",
                      "infoFiltered": "(отфильтровано из _MAX_ записей)",
                      "infoPostFix": "",
                      "loadingRecords": "Загрузка записей...",
                      "zeroRecords": "Записи отсутствуют.",
                      "emptyTable": "В таблице отсутствуют данные",
                      "paginate": {
                        "first": "Первая",
                        "previous": "Назад",
                        "next": "Вперед",
                        "last": "Последняя"
                      },
                      "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                      },
                      "select": {
                        "rows": {
                          "_": "Выбрано записей: %d",
                          "0": "Кликните по записи для выбора",
                          "1": "Выбрана одна запись"
                        }
                      },
                    // "select": {
                    //     rows: {
                    //         _: "Вы выбрали %d строк",
                    //         0: "Нажмите для выбора строки",
                    //         1: "Выбрана 1 строка"
                    //     }            
                    // },
                    buttons: {
                        colvis: 'Выбрать колонки'
                    }            
                },
                // select: true,
                fixedHeader: true,
                orderCellsTop: true,
                colReorder: true,
                // dom: 'Bfrtip',
                buttons: ['csv', 'excel', 'pdf', 'colvis'],
                dom: 'lrftip',
                // columnDefs : [
                //     // {
                //     //     targets : 0,
                //     //     data: "a",
                //     //     "render" : function ( url, type, full) {
                //     //         // console.log(url)
                //     //         return '<a href="'+url+'">'+url+'</a>';
                //     //     }
                //     // },
                //     // {
                //     //     targets : 1,
                //     //     data: "img",
                //     //     "render" : function ( url, type, full) {
                //     //         return '<a href="'+url+'" target="_blank"><img class="datatables_img img-responsive img-hover-zoom--colorize" src="'+url+'"/></a>';
                //     //     },
                //     // },
                // ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Все"]],
                responsive: false,
                // columnDefs: [
                //     { responsivePriority: 1, targets: 0 },
                //     { responsivePriority: 2, targets: 1 },
                //     { responsivePriority: 6, targets: 2 },
                //     { responsivePriority: 4, targets: 3 },
                //     { responsivePriority: 5, targets: 4 },
                //     // { responsivePriority: 2, targets: -1 }
                // ]                        
                // responsive: {
                //     details: true
                // }                
                // order: [[2, 'asc']],
                // rowGroup: {
                //     dataSrc: 2
                // }
            } );

(function ($, DataTable) {
    // buttons: ['csv', 'excel', 'pdf', 'colvis']
    var _getVisibleColumns = function () {

        var visible_columns = [];
        $.each(DataTable.settings[0].aoColumns, function (key, col) {
            if (col.bVisible) {
                visible_columns.push(col.name);
            }
        });

        return visible_columns;
    };

    var _downloadFromUrl = function (url, params) {
        var postUrl = url + '/export';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', postUrl, true);
        xhr.responseType = 'arraybuffer';
        xhr.onload = function () {
            if (this.status === 200) {
                var filename = "";
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }
                var type = xhr.getResponseHeader('Content-Type');

                var blob = new Blob([this.response], {type: type});
                if (typeof window.navigator.msSaveBlob !== 'undefined') {
                    // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    var URL = window.URL || window.webkitURL;
                    var downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                        // use HTML5 a[download] attribute to specify filename
                        var a = document.createElement("a");
                        // safari doesn't support this yet
                        if (typeof a.download === 'undefined') {
                            window.location = downloadUrl;
                        } else {
                            a.href = downloadUrl;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                        }
                    } else {
                        window.location = downloadUrl;
                    }

                    setTimeout(function () {
                        URL.revokeObjectURL(downloadUrl);
                    }, 100); // cleanup
                }
            }
        };
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send($.param(params));
    };

    var _buildUrl = function(dt, action) {
        var url = dt.ajax.url() || '';
        var params = dt.ajax.params();
        params.action = action;

        if (url.indexOf('?') > -1) {
            return url + '&' + $.param(params);
        }
        
        return url + '?' + $.param(params);
    };

    DataTable.ext.buttons.excel = {
        className: 'buttons-excel',

        text: function (dt) {
            return '<i class="fa fa-fw fa-file-excel-o"></i> ' + dt.i18n('buttons.excel', 'Excel');
        },

        action: function (e, dt, button, config) {
            var url = _buildUrl(dt, 'excel');
            window.location = url;
        }
    };

    DataTable.ext.buttons.postExcel = {
        className: 'buttons-excel',

        text: function (dt) {
            return '<i class="fa fa-fw fa-file-excel-o"></i> ' + dt.i18n('buttons.excel', 'Excel');
        },

        action: function (e, dt, button, config) {
            var url = dt.ajax.url() || window.location.href;
            var params = _buildParams(dt, 'excel');

            _downloadFromUrl(url, params);
        }
    };
    
    DataTable.ext.buttons.postExcelVisibleColumns = {
        className: 'buttons-excel',

        text: function (dt) {
            return '<i class="fa fa-fw fa-file-excel-o"></i> ' + dt.i18n('buttons.excel', 'Excel (only visible columns)');
        },

        action: function (e, dt, button, config) {
            var url = dt.ajax.url() || window.location.href;
            var params = _buildParams(dt, 'excel', true);

            _downloadFromUrl(url, params);
        }
    };




    DataTable.ext.buttons.csv = {
        className: 'buttons-csv',

        text: function (dt) {
            return '<i class="fa fa-fw fa-file-excel-o"></i> ' + dt.i18n('buttons.csv', 'CSV');
        },

        action: function (e, dt, button, config) {
            var url = _buildUrl(dt, 'csv');
            window.location = url;
        }
    };

    DataTable.ext.buttons.postCsvVisibleColumns = {
        className: 'buttons-csv',

        text: function (dt) {
            return '<i class="fa fa-fw fa-file-excel-o"></i> ' + dt.i18n('buttons.csv', 'CSV (only visible columns)');
        },

        action: function (e, dt, button, config) {
            var url = dt.ajax.url() || window.location.href;
            var params = _buildParams(dt, 'csv', true);

            _downloadFromUrl(url, params);
        }
    };
    
    DataTable.ext.buttons.postCsv = {
        className: 'buttons-csv',

        text: function (dt) {
            return '<i class="fa fa-fw fa-file-excel-o"></i> ' + dt.i18n('buttons.csv', 'CSV');
        },

        action: function (e, dt, button, config) {
            var url = dt.ajax.url() || window.location.href;
            var params = _buildParams(dt, 'csv');

            _downloadFromUrl(url, params);
        }
    };

    DataTable.ext.buttons.pdf = {
        className: 'buttons-pdf',

        text: function (dt) {
            return '<i class="fa fa-fw fa-file-pdf-o"></i> ' + dt.i18n('buttons.pdf', 'PDF');
        },

        action: function (e, dt, button, config) {
            var url = _buildUrl(dt, 'pdf');
            window.location = url;
        }
    };

    DataTable.ext.buttons.postPdf = {
        className: 'buttons-pdf',

        text: function (dt) {
            return '<i class="fa fa-fw fa-file-pdf-o"></i> ' + dt.i18n('buttons.pdf', 'PDF');
        },

        action: function (e, dt, button, config) {
            var url = dt.ajax.url() || window.location.href;
            var params = _buildParams(dt, 'pdf');

            _downloadFromUrl(url, params);
        }
    };



    DataTable.ext.buttons.import = {
        className: 'buttons-import',

        text: function (dt) {
            return  '<i class="fa fa-fw fa-print"></i> ' + dt.i18n('buttons.import', 'import');
        },

        action: function (e, dt, button, config) {
            alert('import')
            // var url = _buildUrl(dt, 'print');
            // window.location = url;
        }
    };


    DataTable.ext.buttons.print = {
        className: 'buttons-print',

        text: function (dt) {
            return  '<i class="fa fa-fw fa-print"></i> ' + dt.i18n('buttons.print', 'Печать');
        },

        action: function (e, dt, button, config) {
            var url = _buildUrl(dt, 'print');
            window.location = url;
        }
    };

    DataTable.ext.buttons.reset = {
        className: 'buttons-reset',

        text: function (dt) {
            return '<i class="fa fa-fw fa-undo"></i> ' + dt.i18n('buttons.reset', 'Сброс');
        },

        action: function (e, dt, button, config) {
            dt.search('');
            dt.columns().search('');
            dt.draw();
        }
    };

    DataTable.ext.buttons.reload = {
        className: 'buttons-reload',

        text: function (dt) {
            return '<i class="fa fa-fw fa-refresh"></i> ' + dt.i18n('buttons.reload', 'Загрузить');
        },

        action: function (e, dt, button, config) {
            dt.draw(false);
        }
    };

    DataTable.ext.buttons.create = {
        className: 'buttons-create',

        text: function (dt) {
            return '<i class="fa fa-fw fa-plus"></i> ' + dt.i18n('buttons.create', 'Создать');
        },

        action: function (e, dt, button, config) {
            window.location = window.location.href.replace(/\/+$/, "") + '/create';
        }
    };

    // if (typeof DataTable.ext.buttons.copyHtml5 !== 'undefined') {
        $.extend(DataTable.ext.buttons.copyHtml5, {
            text: function (dt) {
                return '<i class="fa fa-fw fa-copy"></i> ' + dt.i18n('buttons.copy', 'Copy');
            }
        });
    // }

    if (typeof DataTable.ext.buttons.colvis !== 'undefined') {
        $.extend(DataTable.ext.buttons.colvis, {
            text: function (dt) {
                return '<i class="fa fa-fw fa-eye"></i> ' + dt.i18n('buttons.colvis', 'Видимость');
            }
        });
    }



    // DataTable.ext.buttons.export = {
    //     extend: 'collection',

    //     className: 'buttons-colvis',

    //     text: function (dt) {
    //         return '<i class="fa fa-fw fa-eye"></i> ' + dt.i18n('buttons.colvis', 'Видимость');
    //         // return '<i class="fa fa-fw fa-download"></i> ' + dt.i18n('buttons.colvis', 'colvis') + '&nbsp;<span class="caret"/>';
    //     },

    //     buttons: ['colvis']
    // };

        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
        // }

    DataTable.ext.buttons.export = {
        extend: 'collection',

        className: 'buttons-collection',

        text: function (dt) {
            return '<i class="fa fa-fw fa-download"></i> ' + dt.i18n('buttons.collection', 'Больше') + '&nbsp;<span class="caret"/>';
        },

        // buttons: ['csv', 'excel', 'pdf', 'colvis']
        // buttons: []
        buttons: [
            // 'csv',
            'excel',
            // 'import'
            // , 'copy',
            // {
            //     extend: 'colvis',
            //     columns: ':gt(0)'
            // },

            // 'selected',
            // 'selectedSingle',
            // 'selectAll',
            // 'selectNone',
            // 'selectRows',
            // 'selectColumns',
            // 'selectCells',
            // {
            //     text: 'Reload',
            //     action: function ( e, dt, node, config ) {
            //         dt.ajax.reload();
            //     }
            // }
        ],
    };
})(jQuery, jQuery.fn.dataTable);
      
            $(document).on({

        // Disable search and ordering by default
              click: function (event) {

                var table = $(event.target).parents('.dataTables_wrapper').find('table.dataTable');
                trIndex = $(this).index() + 1;
                ident = table.find("tr:eq(" + trIndex + ")").find("td:eq(0)").text();
                console.log(ident)
                // $('#iframe').attr('src', '/cats/'+ident)
                // $('#myModal').modal('show');

              },
              // mouseenter: function (event) {
              //   var table = $(event.target).parents('.dataTables_wrapper').find('table.dataTable');
              //   trIndex = $(this).index() + 1;
              //   // table.find("tr:eq(" + trIndex + ")").addClass("hover");
              //   table.find("tr:eq(" + trIndex + ")").addClass("hover");
              // },
              // mouseleave: function (event) {
              //   var table = $(event.target).parents('.dataTables_wrapper').find('table.dataTable');
              //   trIndex = $(this).index() + 1;
              //   table.find("tr:eq(" + trIndex + ")").removeClass("hover");
              // }
            }, ".dataTables_wrapper tbody tr");

    </script>

@endsection
