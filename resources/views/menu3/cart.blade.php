@extends('layouts.menu3')

@section('css')
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

  <style type="text/css">
    body.page #pagetitle {
    background-image: url(/slider-bg4.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-color: #111111;
    color: #ffffff;
    }


    div.radio label input {
        margin-top: 10px !important;
    }


  </style>


@endsection

@section('content')

   <div id="pagetitle" class=" text-center">
         <div class="container" style="padding-top: 90px;">
            <p>Выбранные позиции</p>
            <h2>КОРЗИНА</h2>
         </div>
   </div>

   <div id="page-content" style="margin-bottom: 0px;margin-top: 0px;">
      <div id="default_page">
         <div class="container">
            <div class="contentarea clearfix">

              <div class="row">
                  <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <div class="panel-title">
                          <div class="row">
                            <div class="col-xs-6">
                              <h5>
                                Корзина
                              </h5>
                            </div>
                            <div class="col-xs-6">
                              <a href="/menu/" class="btn btn-primary btn-block">
                                в Меню
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel-body">

                        @if (count($cart->line_items) > 0)

                          @foreach ( $cart->line_items as $line)

                            <div class="row">

                              <div class="col-xs-2">
                                <img class="img-responsive" src="{{ $line->product->image ?? "http://placehold.it/100x70" }}">
                              </div>

                              <div class="col-xs-5">
                                <h4 class="product-name">
                                  <strong>{{ $line->product->name ?? "" }}</strong>

                                </h4>
                                    {{-- {{ $line->product->desc ?? "" }} --}}

@if (mb_strlen($line->product->desc)>140)
  {{ mb_substr($line->product->desc, 0, 140,'UTF-8') }}...
@else
  {{ $line->product->desc }}
@endif
                              </div>

                              <div class="col-xs-5" style="text-align: left;">
                                <div class="col-xs-10 cart_id" >

                                  <h7>{{ $line->product->price_amount ?? "" }} X</h7>

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: red; border: 1px solid grey; padding: 6px 9px;" data-type="minus" >-</span>
                                  <input type="text" min="1" max="1000" class="input-number form-control input-sm one_line one_line_in" value="{{ $line->qty ?? "" }}" data-line_id="{{ $line->id }}">

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: green; border: 1px solid grey; padding: 6px;" data-type="plus" >+</span>

                                  <h6 class="one_line">={{ $line->qty*$line->product->price_amount }}</h6>
                                  {{-- cart_id --}}
                                </div>
                                <div class="col-xs-2">

                                  {!! Form::open(['route' => ['lineItems.destroy', $line->id], 'method' => 'delete']) !!}
                                  {!! Form::button('X', ['type' => 'submit', 'class' => 'destroy_button btn-sm', 'style'=>'background-color: white;    color: red;', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                                  {!! Form::close() !!}

                                    {{-- <a href="/remove" style="color: red;">X</a> --}}
                                </div>
                              </div>
                            </div>
                            <hr>

                          @endforeach

                          <form id="form_id">
                            <div class="row">

                              <div class="col-md-6" style="text-align: left;">

                                <b>Метод оплаты</b>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_type" id="optionsRadios1" value="0" >
                                    Оплата курьеру
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_type" id="optionsRadios2" value="1" >
                                    Оплата в заведении
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_type" id="optionsRadios3" value="2">
                                    Онлайн оплата
                                  </label>
                                </div>


                              </div>
                              <div class="col-md-6" style="text-align: left;">
                                <b>Место получения Продукта</b>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_place" id="optionsRadios4" value="0" >
                                    Доставка курьером
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_place" id="optionsRadios5" value="1">
                                    Место в заведении
                                  </label>
                                </div>
                                <div class="radio ">
                                  <label>
                                    <input type="radio" name="pay_place" id="optionsRadios6" value="2" >
                                    На вынос
                                  </label>
                                </div>


                              </div>
                              
                              <div class="col-md-12" style="text-align: left;">
                                <b>Адрес/Место/Примечание</b>
                                <textarea name="pay_adr" style="width: 100%;" rows="5" placeholder="Укажите адрес: Населеный пункт, улица, номер дома, офис, домофон, этаж, подЬезд и примечания"></textarea>
                              </div>

                              <div class="col-md-12" style="text-align: left;">
                                <b>Контакты</b>
                                <textarea name="pay_contact" style="width: 100%;" rows="5" placeholder="Укажите контакты для связи: телефон, смс, почта, WhatsApp"></textarea>
                              </div>

                            </div>

                            <hr>

                            <div class="panel-footer">
                              <div class="row text-center">
                                <div class="col-xs-9">
                                  <h4 class="text-right">Итого <strong id="cart_total">{{ $cart->total() }}</strong></h4>
                                </div>
                                <div class="col-xs-3">
                                  <a href="/carts/{{$cart->id}}/checkout" class="btn-success btn-block" id="checkout_link">
                                    Оплатить
                                  </a>
                                  {{-- <a href="/carts/{{$cart->id}}/clear" class="btn-danger btn-block" data-url="/carts/{{$cart->id}}/clear"> --}}
                                  <a href="#" class="btn-danger btn-block " data-url="/carts/{{$cart->id}}/clear" id="clear_btn">
                                    Очистить корзину
                                  </a>
                                </div>
                              </div>
                            </div>
                              
                          </form>
                            {{-- checkout_link --}}


                        @else

                          <div class="row">
                            <div class="col-xs-12 text-center">
                              Корзина пуста
                            </div>
                          </div>
                          <hr>
                        @endif

                      </div>

                    </div>

                  </div>
              </div>


            @include('menu3.footer_contact')

            </div>
         </div>
      </div>
   </div>
      
@endsection

@section('script')

  <script type="text/javascript">


$('#clear_btn').click(function(e){
  e.preventDeafult;

                          $.ajax({
                              url: $(this).data('url'),
                              type: 'GET',
                              success: function(result) {
                                window.location='/cart'
                              }
                          });
});

    $('span.btn-number').click(function(e){
        type      = $(this).attr('data-type');
        console.log(type)

        // TODO выбрать КНОПКИ только свой ряд +
        var input = $(this).parent().find('input');
        var line_id = $(this).parent().find('input').data('line_id');
        var total = $(this).parent().find('h6');
        // cart_id = $('#cart_id').data('cart_id')
        cart_id = $('#qty_badge').data('cart_id')

        var currentVal = parseInt(input.val());
        console.log(currentVal)


        // $('#cart_total').text(result)
        // total.text('='+result)
        // $('#qty_badge').text(result)


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
                              url: '/carts/'+cart_id+'/total_qty',
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

                          $.ajax({
                              url: '/carts/'+cart_id+'/total',
                              type: 'GET',
                              success: function(result) {
                                  $('#cart_total').text(result)
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
                              url: '/carts/'+cart_id+'/total_qty',
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

                          $.ajax({
                              url: '/carts/'+cart_id+'/total',
                              type: 'GET',
                              success: function(result) {
                                  $('#cart_total').text(result)
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

    jQuery('.cart_id').mousedown(function(e){ e.preventDefault(); });

    $('#checkout_link').click(function(e) {

      e.preventDefault();
      uurl=$(this).attr('href')
      // console.log(uurl)
      window.location=uurl+'?'+$('#form_id').serialize()

        // $.ajax({
        //     url: uurl+'?'+$('#form_id').serialize(),
        //     type: 'GET',  // user.destroy
        //     success: function(result) {
        //         // total.text('='+result)
        //         // console.log()
        //         window.location="/thanks"
        //     }
        // });

      // body...
    })

  </script>

@endsection
