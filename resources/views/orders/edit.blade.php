@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Изменить:</b> Заказ
        </h1>
   </section>
   <div class="content" data-order_id="{{ $order->id }}" id="order_id">
       @include('adminlte-templates::common.errors')

       <div class="box box-primary">
           <div class="box-body">
               <div class="row">

                     <style type="text/css">
                        .one_line_in {
                        width: 3em !important;
                        text-align: center;
                        font-size: 1em;
                        padding: 0;
                        margin: 0px -1px;
                        height: 24px;
                        }
                        .one_line, .span1 {
                          display: inline-block !important;
                        }
                        .destroy_button {
                          padding: 1px;
                          border: 1px solid grey;
                          line-height: 13px;
                        }
                      </style>


                      <div class="panel-body">

                        @if (count($order->line_items) > 0)



                            <div class="box-body table-responsive no-padding">

                              <table class="table table-hover">
                                <thead>
                                  <th>
                                    id
                                  </th>
                                  <th>
                                    Фото
                                  </th>
                                  <th>
                                    Наименование
                                  </th>
                                  <th>
                                    Кол-во
                                  </th>
                                  <th>Цена</th>
                                  <th>
                                    Сумма
                                  </th>
                                  <th>
                                    Действия
                                  </th>
                                </thead>
                                <tbody>
                                  @foreach ( $order->line_items as $line)
                                  <tr>
                                    <td>
                                      {{ $line->product->id }}
                                    </td>
                                    <td>
                                      <img class="img-responsive" style="max-width: 4em !important;" src="{{ $line->product->image ?? "http://placehold.it/100x70" }}">
                                    </td>
                                    <td>{{ $line->product->name }}</td>
                                    <td>{{ $line->product->price_amount }}</td>
                                    <td>
                                      {{-- {{ $line->qty }} --}}
                                      <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: red; border: 1px solid grey; padding: 2px;" data-type="minus" >-</span>
                                      <input type="text" min="1" max="1000" class="input-number form-control input-sm one_line one_line_in" value="{{ $line->qty ?? "" }}" data-line_id="{{ $line->id }}">

                                      <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: green; border: 1px solid grey; padding: 2px;" data-type="plus" >+</span>

                                    </td>
                                    <td>
                                      {{-- {{ $line->qty*$line->product->price_amount }} --}}
                                      <span class="one_line">{{ $line->qty*$line->product->price_amount }}</span>
                                    </td>
                                    <td>
                                      <span class="span1">
                                        <a href="#" class="deleteProduct" data-id="{!! $line->id !!}" style="color: red;">X</a>
                                        {!! Form::open(['route' => ['lineItems.destroy', $line->id], 'method' => 'delete']) !!}
                                        {{-- {!! Form::button('X', ['type' => 'submit', 'class' => 'destroy_button', 'style'=>'background-color: white;    color: red;', 'onclick' => "return confirm('Вы уверены?')"]) !!} --}}
                                        {!! Form::button('X', ['type' => 'submit', 'class' => 'destroy_button', 'style'=>'background-color: white;    color: red;']) !!}
                                        {!! Form::close() !!}
                                      </span>
                                    </td>

                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            
                            </div>

                          @foreach ( $order->line_items as $line)
{{-- 
                            <div class="row">


                              <div class="col-xs-2">
                                <img class="img-responsive" style="max-width: 4em !important;" src="{{ $line->product->image ?? "http://placehold.it/100x70" }}">
                              </div>

                              <div class="col-xs-5">
                                <h4 class="product-name">

                                  <a href="/products/{{ $line->product->ident }}">
                                      <strong>{{ $line->product->name ?? "Название" }}</strong>
                                  </a>

                                </h4>

                                  @if (mb_strlen($line->product->desc)>140)
                                    {{ mb_substr($line->product->desc, 0, 140,'UTF-8') }}...
                                  @else
                                    {{ $line->product->desc }}
                                  @endif


                              </div>


                              <div class="col-xs-5" style="text-align: left;">
                                <div class="col-xs-12" data-order_id="{{ $order->id }}" id="order_id">

                                  <span>{{ $line->product->price_amount ?? "" }} X</span>

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: red; border: 1px solid grey; padding: 2px;" data-type="minus" >-</span>
                                  <input type="text" min="1" max="1000" class="input-number form-control input-sm one_line one_line_in" value="{{ $line->qty ?? "" }}" data-line_id="{{ $line->id }}">

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: green; border: 1px solid grey; padding: 2px;" data-type="plus" >+</span>

                                  <span class="one_line">={{ $line->qty*$line->product->price_amount }}</span>

                                  <span class="span1">
                                    {!! Form::open(['route' => ['lineItems.destroy', $line->id], 'method' => 'delete']) !!}
                                    {!! Form::button('X', ['type' => 'submit', 'class' => 'destroy_button', 'style'=>'background-color: white;    color: red;', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                                    {!! Form::close() !!}
                                  </span>
                                </div>

                              </div>
                            </div>
                            <hr> --}}

                            

                          @endforeach

                          <div class="panel-footer">
                            <div class="row text-center">
                              <div class="col-xs-12">
                                <span class="text-left">
                                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                    Добавить
                                  </button>
                                </span>


                                <div class="modal fade" id="modal-default" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                          
                                          <h4 class="modal-title">Выбрать продукт(ы) <span id="title_ident"></span> </h4>
                                          <span style="float: left;"><button type="button" class="btn btn-default pull-left" data-dismiss="modal">Закрыть</button></span>
                                          <span style="float: right;"><button id="update" type="button" class="btn btn-primary pull-right" >Обновить</button></span>
                                        </div>
                                        <div class="modal-body" id="modal-body" style="    text-align: left;">
                                          {{-- <p>Список продуктов</p> --}}
                                          {{-- <table class="table" id="table"></table> --}}
                                          {{-- TODO CATS PRODUCTS --}}
                                            {{-- @include('orders.tree') --}}
                                            @include('orders.recursive_tree')

                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Закрыть</button>
                                          {{-- <button type="button" class="btn btn-primary">Добавить</button> --}}
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>

                                <h4 class="text-right">Итого <strong id="cart_total">{{ $order->total() }}</strong></h4>
                              </div>
                              {{-- <div class="col-xs-3"> --}}
                                {{-- <button type="button" class="btn btn-success btn-block" onclick="alert('print');">                                  Счет</button> --}}
                                {{-- <a href="/carts/{{$order->id}}/clear" class="btn btn-danger btn-block" >
                                  Очистить
                                </a> --}}
                              {{-- </div> --}}
                            </div>
                          </div>

                        @endif

                      </div>


                      <script type="text/javascript">


$('#modal-default').on('shown.bs.modal', function (e) {
  // do something...
  console.log('modal')



})                        
  $(document).ready(function(){

// update
    $("#update").click(function(e){
      // =location
      location.reload();

    });

  $(".deleteProduct").click(function(e){
    tt=this
    var id = $(this).data('id')
    var token = $("meta[name='csrf-token']").attr("content");
    console.log(id)
    $.ajax(
      {
        url: "/lineItems/"+id+"/del",
        type: 'GET',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (res){
            console.log(res);
            $(tt).parent().parent().parent().remove()
        }
      })
   });


  });

    // $.ajax({
    //      url: '/api/products',
    //      // url: 'https://examples.wenzhixin.net.cn/examples/bootstrap_table/data?search=&sort=&order=asc&offset=0&limit=10',

    //      // dataType: 'json',
    //      success: function(data) {

    //         // console.log(data)
    //         // table_data1 = data
    //         // console.log(table_data1['data'])

    //         // $("#modal-body").html() = data
    //          // $('#clienti').bootstrapTable({
    //          //    data: data
    //          // });
    //      },
    //      error: function(e) {
    //          console.log(e.responseText);
    //      }
    //   });
                        $('span.btn-number').click(function(e){
                            type      = $(this).attr('data-type');
                            console.log(type)

                            // TODO выбрать КНОПКИ только свой ряд +
                            var input = $(this).parent().find('input');
                            var line_id = $(this).parent().find('input').data('line_id');
                            var total = $(this).parent().parent().find('span.one_line');
                            order_id = $('#order_id').data('order_id')

                            var currentVal = parseInt(input.val());
                            console.log(currentVal)

                            if (!isNaN(currentVal)) {
                                if(type == 'minus') {
                                    
                                    if(currentVal > input.attr('min')) {
                                        input.val(currentVal - 1).change();

                                        // TODO изменить итого
                                        $.ajax({
                                            url: '/qty_minus/'+line_id,
                                            type: 'GET',  // user.destroy
                                            success: function(result) {

                                              $.ajax({
                                                  url: '/orders/'+order_id+'/total',
                                                  type: 'GET',
                                                  success: function(result) {
                                                      $('#cart_total').text(result)
                                                  }
                                              });
                                                
                                              $.ajax({
                                                  url: '/orders/'+order_id+'/total_qty',
                                                  type: 'GET',
                                                  success: function(result) {
                                                    $('#qty_badge').text(result)
                                                  }
                                              });


                                              $.ajax({
                                                  url: '/lineItems/total/'+line_id,
                                                  type: 'GET',  // user.destroy
                                                  success: function(result) {
                                                      total.text(result)
                                                  }
                                              });

                                            }
                                        });

                                    } 
                                    if(parseInt(input.val()) == input.attr('min')) {
                                        // TODO style disabled
                                        $(this).attr('disabled', true);
                                    }

                                } else if(type == 'plus') {

                                    if(currentVal < input.attr('max')) {
                                        input.val(currentVal + 1).change();

                                        $.ajax({
                                            url: '/qty_plus/'+line_id,
                                            type: 'GET',  // user.destroy
                                            success: function(result) {

                                              $.ajax({
                                                  url: '/orders/'+order_id+'/total',
                                                  type: 'GET',
                                                  success: function(result) {
                                                      $('#cart_total').text(result)
                                                  }
                                              });
                                                
                                              $.ajax({
                                                  url: '/orders/'+order_id+'/total_qty',
                                                  type: 'GET',
                                                  success: function(result) {
                                                    $('#qty_badge').text(result)
                                                  }
                                              });


                                              $.ajax({
                                                  url: '/lineItems/total/'+line_id,
                                                  type: 'GET',  // user.destroy
                                                  success: function(result) {
                                                      total.text(result)
                                                  }
                                              });

                                            }
                                        });            }
                                    if(parseInt(input.val()) == input.attr('max')) {
                                        $(this).attr('disabled', true);
                                    }

                                }
                            } else {
                                input.val(0);
                            }
                        });

                        // jQuery('.panel-body').mousedown(function(e){ e.preventDefault(); });
                      </script>

             </div>
           </div>
       </div>


       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'patch']) !!}

                        @include('orders.fields')

                   {!! Form::close() !!}

               </div>
           </div>
       </div>
   </div>
@endsection