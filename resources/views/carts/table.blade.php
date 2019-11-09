@section('css')
    @include('layouts.datatables_css')
@endsection

{{-- {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!} --}}


<div class="table-responsive">
    <table class="table table-striped table-bordered responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Сессия</th>
                <th>Продукты</th>
                <th>Создано</th>
                <th>Обновлено</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
            <tr>
                <td>{!! $cart->id !!}</td>

                <td>
                    <a href="{!! route('carts.show', [$cart->id]) !!}" >
                        {!! $cart->session_id !!}
                    </a>
                </td>

                <td>{!! count($cart->line_items) !!}</td>
                <td>{!! $cart->created_at !!}</td>
                <td>{!! $cart->updated_at !!}</td>



                <td>
                    {!! Form::open(['route' => ['carts.destroy', $cart->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('carts.show', [$cart->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('carts.edit', [$cart->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: 1 },
                    { responsivePriority: 6, targets: 2 },
                    { responsivePriority: 4, targets: 3 },
                    { responsivePriority: 5, targets: 4 },
                    // { responsivePriority: 2, targets: -1 }
                ]                        
                // responsive: {
                //     details: true
                // }                
                // order: [[2, 'asc']],
                // rowGroup: {
                //     dataSrc: 2
                // }
            } );
      
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
