  <style type="text/css">
  .label_node_name {
    min-width: 10em;
    text-align: left;
  }
  .label_node_name_icon {
    text-align: right;
  }
  a:hover {
    text-decoration: underline;
  }

.active2 {
  background-color: orange;
}


#cats_products > tr:hover {
  cursor: pointer;
}

  </style>


{{-- renderProducts($child->ident); --}}
<div class="row">
  <div class="col-md-6">

  <h3>  Дерево меню</h3>

<div id="tree_ul">

  @php


  function renderProducts($ident) {
      // return App\Models\Cat::find($cat_ident)->products;

      // foreach (App\Models\Cat::find($cat_ident)->products as &$value) {
      //     return "<li>".$value->name."</li>";
      // }


            $html_p1 = '<ul>';
    if ( count(App\Models\Product::where('cat_id',$ident)->get())>0 ) {
          foreach(App\Models\Product::where('cat_id',$ident)->get() as $child)
              {

              $html_p1 .= <<<EOT
                  <li>
                  <span class="badge label label-danger label_node_name">
                    <a style="color:black;" data-toggle="collapse" href="#cola_$child->ident">
                      $child->name
                    </a>
                  </span>
                  <span class="badge label label-primary">
                    $child->price_amount руб.
                  </span>
                  </li>
              EOT; 
                }
            }
              $html_p1 .= '</ul>';
    return $html_p1;
  }
        function renderNode($node) {

          if ($node->menu){
            $m="V";
            $mcolor="success";
          } else { 
            $m="X";
            $mcolor="default";
          }

          $node_ident=$node->ident;
          $count1 = count(App\Models\Cat::where('parent_id',$node->ident)->get());
          $count2 = count(App\Models\Product::where('cat_id',$node->ident)->get());
          $node_name=$node->name;

          // echo renderProducts($node_ident);
          // var_dump


          if ( count(App\Models\Cat::where('parent_id',$node->ident)->get())>0 ) {
          // $html = $html + '<ul>';
            $html = <<<EOT
                <li>
                <a data-ident="$node_ident" class="cats_products"  style="cursor: pointer;">
                  <i class="fa fa-link" aria-hidden="true"></i>
                </a>


                <span class="badge label label-success label_node_name">
                  <a style="color:black;" data-toggle="collapse" href="#cola_$node_ident"  style="cursor: pointer;">
                    <span class="label_node_name_icon">
                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </span>
                    $node_name
                  </a>
                </span>

                <span class="badge label label-primary">
                  $count1 кат.
                </span>
                <a data-ident="$node_ident" class="cats_products" href="#">
                  <span class="badge label label-info">
                    $count2 шт.
                  </span>
                </a>

            EOT; 

            $html .= "<ul id='cola_{$node_ident}' class='collapse '>"; 

            foreach($node->children as $child)
              {
                $html .= renderNode($child);
                // $html .= renderProducts($child->ident);
              }

            $html .= '</ul>';
            $html .= '</li>';
          } else {

              $html2 = <<<EOT
                <li>
                <a data-ident="$node_ident" class="cats_products" href="#"  style="cursor: pointer;">
                  <i class="fa fa-link" aria-hidden="true"></i>
                </a>

                <span class="badge label label-default label_node_name">
                  <a data-ident="$node_ident" class="cats_products" style="cursor: pointer; color:black;">
                    <span class="label_node_name_icon">
                      <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </span>
                    $node_name
                  </a>
                </span>

                <span class="badge label label-primary">
                  $count1 кат.
                </span>
                <a data-ident="$node_ident" class="cats_products"  href="#">
                  <span class="badge label label-info">
                    $count2 шт.
                  </span>
                </a>
                </li>
              EOT; 
              return $html2;
          };

          return $html;
        };


    @endphp

      @foreach ( $cats as $line)
          {!! renderNode($line) !!}
      @endforeach

  </div>

    
  </div>
  <div class="col-md-6">
    <h3> Продукты</h3>
    <table class="table table-hover" id="pp">
        <thead>
          <th>ident</th>
          <th>Наименование</th>
          <th>Цена</th>
        </thead>
        <tbody id="cats_products"></tbody>
    </table>


    {{-- cats_products --}}
  </div>

  <div class="col-md-12">
    <h3> Выбраны</h3>
    <pre id="pp_pre"></pre>
    <div id="events"></div>
    
    {{-- cats_products --}}
  </div>

</div>

<link rel="stylesheet" type="text/css" href="/css/bootstrap-treeview.min.css">
<script src="/js/bootstrap-treeview.min.js"></script>

@section('css')
    @include('layouts.datatables_css')
@endsection
@include('layouts.datatables_js')


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script> --}}

<script type="text/javascript">
    {{-- window.jstree = require('https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js'); --}}

jQuery(function($) {




  $('.cats_products').click(function(e){
    // console.log(e)
    // console.log($(this).data('ident'))
          if ($.fn.dataTable.isDataTable('#pp')) {
              $('#pp').DataTable().destroy();
          }

          var events = $('#events');
          

          $.ajax({
              url: '/cats/'+$(this).data('ident')+'/cats_products',
              type: 'GET',
              success: function(result) {
                  $("#cats_products").html("")
                  for (var i = result.length - 1; i >= 0; i--) {
                    $("#cats_products").append("<tr data-ident='"+result[i]['ident']+"'>"+"<td>"+result[i]['ident']+"</td>"+"<td>"+result[i]['name']+"</td>"+"<td>"+result[i]['price_amount']+"</td>"+"</tr>")
                  }

                var arr1 =[]
                var table = $('#pp').DataTable(
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
                              "select": {
                                  rows: {
                                      _: "Вы выбрали %d строк",
                                      0: "Нажмите для выбора строки",
                                      1: "Выбрана 1 строка"
                                  }            
                              },
                              buttons: {
                                  colvis: 'Выбрать колонки'
                              }            
                          },
                          select: true,
                          fixedHeader: true,
                          orderCellsTop: true,
                          colReorder: true,
                          // dom: 'Bfrtip',
                          // 'csv', 'excel', 'pdf', 'colvis',
                          buttons: [
                                    {
                                        text: 'Добавить',
                                          action: function (a) {
                                              // console.table( table.rows( { selected: true } ).data().toArray() )
                                              // var count = table.rows( { selected: true } ).count();

                                              for (var i = 0; i < table.rows( { selected: true } ).data().toArray().length; i++) {
                                                arr1.pop( table.rows( { selected: true } ).data().toArray()[i][0] )
                                                console.log( table.rows( { selected: true } ).data().toArray()[i][0] )

                                                      $.ajax({
                                                        // '/orders/{id}/add_product_item/{product_id}'
                                                          url: '/orders/'+$('#order_id').data('order_id')+'/add_product_item/'+table.rows( { selected: true } ).data().toArray()[i][0],
                                                          type: 'GET',
                                                          success: function(result) {
                                                              console.log( 'success get' )
                                                              console.log( result )
                                                          }
                                                      });
                                              }

                                              // window.a = JSON.stringify( table.rows( { selected: true } ).data().toArray() )
                                              // a.map(function (i) { return i[0] })
                                                // events.html( arr1 );
                                              // events.prepend( '<div>'+count+' строк выбрано '+table.rows( { selected: true } ).data().toArray()+'</div>' );
                                              // console.table( arr1 )
                                              

                                              $("#pp_pre").html( JSON.stringify( table.rows( { selected: true } ).data().toArray() ) )
                                              // window.location=location
                                              // $("#pp_pre").html( arr1 )
                                                PNotify.alert({
                                                    title: "Добавлен",
                                                    // text: '<a href="/orders/'+e.id+'">Заказ № '+e.id+'</a>',
                                                    textTrusted: true,
                                                    styling: 'bootstrap3',
                                                    icons: 'bootstrap3',
                                                    hide: false,
                                                    remove: true,
                                                    destroy: true,
                                                    modules: {

                                                    Buttons: {
                                                      closer: true,
                                                      // Provide a button for the user to manually close the notice.
                                                      closerHover: true,
                                                      // Only show the closer button on hover.
                                                      sticker: true,
                                                      // Provide a button for the user to manually stick the notice.
                                                      stickerHover: true,
                                                      // Only show the sticker button on hover.
                                                      labels: {close: 'Close', stick: 'Stick', unstick: 'Unstick'},
                                                      // Lets you change the displayed text, facilitating internationalization.
                                                      // classes: {closer: null, pinUp: null, pinDown: null}
                                                      // The classes to use for button icons. Leave them null to use the classes from the styling you're using.
                                                    },

                                                      Confirm: {
                                                        confirm: true
                                                      },

                                                    History: {
                                                      maxInStack: 20
                                                    },

                                                    Animate: {
                                                      animate: true,
                                                      // Use animate.css to animate the notice.
                                                      inClass: 'animated fadeInRight',
                                                      // The class to use to animate the notice in.
                                                      outClass: 'animated fadeOutRight',
                                                      // The class to use to animate the notice out.
                                                    },

                                                    NonBlock: {
                                                      nonblock: false
                                                    }

                                                    }   
                                                  });

                                              // console.log(window.a)
                                          }
                                    },
                                    {
                                        text: 'Выбрать все',
                                        action: function () {
                                            table.rows().select();
                                        }
                                    },
                                    {
                                        text: 'Выбрать нет',
                                        action: function () {
                                            table.rows().deselect();
                                        }
                                    }
                                    ],
                          dom: 'lrftipB',
                          lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Все"]],
                          responsive: false,
                      } );

                      
                      table
                          .on( 'select', function ( e, dt, type, indexes ) {
                              var rowData = table.rows( indexes ).data().toArray();
                              // events.prepend( '<div><b>'+type+' selection</b> - '+JSON.stringify( window.a )+'</div>' );

                              // console.table( table.rows( indexes ).data().toArray()[0] )

                              // $("#title_ident").html( table.rows( indexes ).data().toArray()[0][0] )
                              // // 
                              // arr1.fill( table.rows( indexes ).data().toArray()[0][0] )
                              // $("#pp_pre").html( arr1 )


                          } )
                          .on( 'deselect', function ( e, dt, type, indexes ) {
                              // var rowData = table.rows( indexes ).data().toArray();
                              // events.prepend( '<div><b>'+type+' <i>de</i>selection</b> - '+JSON.stringify( rowData )+'</div>' );
                              // console.table( JSON.stringify( rowData ) )
                          } );

                      // $('tr').click(function(e){
                      //   $("#title_ident").html( $(this).data('ident') )
                      //   $("#pp_pre").append( $(this).data('ident')+"," )
                      //   console.log($(this).data('ident'))
                      //   // console.log(e)
                      // })

              }
          });


  });

    // $('#tree').treeview({ data: tree2 });
    $('.menu_check').click(function(e){
          var t1 = this;
        console.log( $(this).data('id') )
          // check_menu
          $.ajax({
              url: '/cats/'+$(this).data('id')+'/check_menu',
              type: 'GET',
              success: function(result) {
                  console.log( result[0] )
                  console.log( result[1] )
                  console.log( $(t1).text(result[0]) )

                  $(t1).removeClass('label-default')
                  $(t1).removeClass('label-success')
                  $(t1).addClass('label-'+result[1])
                    // label-

                  // $()
              }
          });
    }) // $('.menu_check').click


  }); // jQuery(function($){

</script>
