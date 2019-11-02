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

        columnDefs : [
            {
                targets : 1,
                data: "img",
                "render" : function ( url, type, full) {
                    return '<a href="'+url+'" target="_blank"><img class="datatables_img img-responsive img-hover-zoom--colorize" src="'+url+'"/></a>';
                },
            },
            {
                targets : 0,
                data: "a",
                "render" : function ( url, type, full) {
                    // console.log(url)
                    return '<a href="'+url+'">'+url+'</a>';
                }
            }
        ],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Все"]],
        // scrollY:        1200,
        // scrollCollapse: true,
        pagingType: "simple_numbers_no_ellipses", // scrolling input

        // initComplete: function () {
        //     this.api().columns().every( function () {
        //         var column = this;
        //         var select = $('<select><option value=""></option></select>')
        //             .appendTo( $(column.footer()).empty() )
        //             .on( 'change', function () {
        //                 var val = $.fn.dataTable.util.escapeRegex(
        //                     $(this).val()
        //                 );
 
        //                 column
        //                     .search( val ? '^'+val+'$' : '', true, false )
        //                     .draw();
        //             } );
 
        //         column.data().unique().sort().each( function ( d, j ) {
        //             select.append( '<option value="'+d+'">'+d+'</option>' )
        //         } );
        //     } );
        // }
        // dom: 'ilrftip',
        // pageLength: 50

        // select: {
        //     style: 'multi'
        // },
        // select: {
        //     style: 'os',
        //     items: 'cell'
        // },
        // columnDefs: [ {
        //     orderable: false,
        //     className: 'select-checkbox',
        //     targets:   0
        // } ],
        // select: {
        //     style:    'os',
        //     selector: 'td:first-child'
        // },
        // order: [[ 1, 'asc' ]]        
        // select: {
        //     style: 'multi',
        //     rows: {
        //         _: "Вы выбрали %d строк",
        //         0: "Нажмите для выбора строки",
        //         1: "Выбрана 1 строка"
        //     }
        // }
        // dom: 'Bfrtip',
        // dom: 'Bfrtip',

    } );
    // $.fn.dataTable.ext.order.intl('fr');

    // $.fn.dataTable.ext.buttons.reload = {
    //     text: 'Reload',
    //     action: function ( e, dt, node, config ) {
    //         dt.ajax.reload();
    //     }
    // };
    // $('#dataTableBuilder')


    // // Setup - add a text input to each footer cell
    // $('#dataTableBuilder tfoot th').each( function () {
    //     var title = $(this).text();
    //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    // } );
 
    // // DataTable
    // var table = $('#dataTableBuilder').DataTable();
 
    // // Apply the search
    // table.columns().every( function () {
    //     var that = this;
 
    //     $( 'input', this.footer() ).on( 'keyup change clear', function () {
    //         if ( that.search() !== this.value ) {
    //             that
    //                 .search( this.value )
    //                 .draw();
    //         }
    //     } );
    // } );

    // if ('loading' in HTMLImageElement.prototype) alert("yes"); else alert("no");

})(jQuery, jQuery.fn.dataTable);

    // var table = $('#dataTableBuilder').DataTable();
    // $('#dataTableBuilder thead tr').clone(true).appendTo( '#dataTableBuilder thead' );
    // $('#dataTableBuilder thead tr:eq(1) th').each( function (i) {
    //     var title = $(this).text();
    //     $(this).html( '<input type="text" placeholder="Поиск '+title+'" />' );
 
    //     $( 'input', this ).on( 'keyup change', function () {
    //         if ( table.column(i).search() !== this.value ) {
    //             table
    //                 .column(i)
    //                 .search( this.value )
    //                 .draw();
    //         }
    //     } );
    // } );
