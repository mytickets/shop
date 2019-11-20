@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

{{-- @section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection
 --}}

@section('scripts')
    @include('layouts.datatables_js')
    {{-- <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> --}}

    <script>

    (function ($, DataTable) {
        "use strict";

        var _buildParams = function (dt, action, onlyVisibles) {
            var params = dt.ajax.params();
            params.action = action;
            params._token = $('meta[name="csrf-token"]').attr('content');

            if (onlyVisibles) {
                params.visible_columns = _getVisibleColumns();
            } else {
                params.visible_columns = null;
            }
            
            return params;
        };
        
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


        DataTable.ext.buttons.export = {
            extend: 'collection',
            className: 'buttons-collection',
            text: function (dt) {
                return '<i class="fa fa-fw fa-download"></i> ' + dt.i18n('buttons.collection', 'Больше') + '&nbsp;<span class="caret"/>';
            },
            buttons: [
                // 'csv',
                'excel',
                // 'import'
                'copy',
                'print',
                'reload',
                'reset',
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

       
        // Disable search and ordering by default
        $.extend( $.fn.dataTable.defaults, {
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
            // описываем что возвращать в колонках для таблицы
            columnDefs : [
                // { targets: 1, visible: false }
                // {
                //     targets : 1,
                //     data: "html",
                //     "render" : function ( url, type, full) {
                //         // return '<a href="'+url+'" target="_blank"><img class="datatables_img img-responsive img-hover-zoom--colorize" src="'+url+'"/></a>';
                //         return url;

                //     },
                // }
            ],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Все"]],
            pagingType: "simple_numbers_no_ellipses", // scrolling input
        } );


    })(jQuery, jQuery.fn.dataTable);
      
    </script>

    {!! $dataTable->scripts() !!}


    <script type="text/javascript">


		$(document).on({
        // выводим ident при нажатии на пункт меню
		  click: function (event) {
            // текущая таблица
		    var table = $(event.target).parents('.dataTables_wrapper').find('table.dataTable');
            // получаем индекс строки
            trIndex = $(this).index() + 1;
		    // получаем ident текст
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


        // переименовываем колонку Action в Действия
        $('thead > tr > th').last().html('Действия')

        // переименовываем Action кнопку colvis в Действия при нажатии
        $('.buttons-colvis').on({
          click: function(event){
            $('.dt-button-collection > ul > li ').last().find('a').html('Действия')
          }
        })

    </script>


@endsection