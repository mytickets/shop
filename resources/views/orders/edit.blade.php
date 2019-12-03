@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <b>Изменить:</b> Заказ
        </h1>
   </section>
   <div class="content">
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
                        height: 36px;                                        
                        }
                        .one_line {
                        display: inline-block !important;
                        }

                        h7, h6 {
                        width: 4em;
                        display: inline-block;

                        }
                        h7 {
                        text-align: right;
                        }
                        h6 {
                        text-align: left;
                        }
                      </style>


                      <div class="panel-body">

                        @if (count($order->line_items) > 0)

                          @foreach ( $order->line_items as $line)

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
                                <div class="col-xs-10" data-order_id="{{ $order->id }}" id="order_id">

                                  <h7>{{ $line->product->price_amount ?? "" }} X</h7>

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: red; border: 1px solid grey; padding: 6px 9px;" data-type="minus" >-</span>
                                  <input type="text" min="1" max="1000" class="input-number form-control input-sm one_line one_line_in" value="{{ $line->qty ?? "" }}" data-line_id="{{ $line->id }}">

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: green; border: 1px solid grey; padding: 6px;" data-type="plus" >+</span>

                                  <h6 class="one_line">={{ $line->qty*$line->product->price_amount }}</h6>
                                </div>
                                <div class="col-xs-2">

                                  {!! Form::open(['route' => ['lineItems.destroy', $line->id], 'method' => 'delete']) !!}
                                  {!! Form::button('X', ['type' => 'submit', 'class' => 'destroy_button btn-sm', 'style'=>'background-color: white;    color: red;', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                                  {!! Form::close() !!}
                                </div>
                              </div>
                            </div>
                            <hr>

                          @endforeach

                          <div class="panel-footer">
                            <div class="row text-center">
                              <div class="col-xs-12">
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
                        $('span.btn-number').click(function(e){
                            type      = $(this).attr('data-type');
                            console.log(type)

                            // TODO выбрать КНОПКИ только свой ряд +
                            var input = $(this).parent().find('input');
                            var line_id = $(this).parent().find('input').data('line_id');
                            var total = $(this).parent().find('h6');
                            cart_id = $('#order_id').data('order_id')

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
                                                  url: '/orders/'+cart_id+'/total',
                                                  type: 'GET',
                                                  success: function(result) {
                                                      $('#cart_total').text(result)
                                                  }
                                              });
                                                
                                              $.ajax({
                                                  url: '/orders/'+cart_id+'/total_qty',
                                                  type: 'GET',
                                                  success: function(result) {
                                                    $('#qty_badge').text(result)
                                                  }
                                              });


                                              $.ajax({
                                                  url: '/lineItems/total/'+line_id,
                                                  type: 'GET',  // user.destroy
                                                  success: function(result) {
                                                      total.text('='+result)
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
                                                  url: '/orders/'+cart_id+'/total',
                                                  type: 'GET',
                                                  success: function(result) {
                                                      $('#cart_total').text(result)
                                                  }
                                              });
                                                
                                              $.ajax({
                                                  url: '/orders/'+cart_id+'/total_qty',
                                                  type: 'GET',
                                                  success: function(result) {
                                                    $('#qty_badge').text(result)
                                                  }
                                              });


                                              $.ajax({
                                                  url: '/lineItems/total/'+line_id,
                                                  type: 'GET',  // user.destroy
                                                  success: function(result) {
                                                      total.text('='+result)
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

                        jQuery('.panel-body').mousedown(function(e){ e.preventDefault(); });
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