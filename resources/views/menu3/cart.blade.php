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

    div.radio label input {
        margin-top: 10px !important;
    }

    body.page #pagetitle {
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
      -moz-background-size: cover;
      -webkit-background-size: cover;
      -o-background-size: cover;
      -ms-background-size: cover;
      background-color: #111111;
      color: #ffffff;
      background-image: url(/slider-bg4.jpg);
    }
  </style>


@endsection

@section('content')

   <div id="pagetitle" class=" text-center ">
         <div class="container" style="padding-top: 90px;">
            <p>Выбранные позиции</p>
            <h2>КОРЗИНА</h2>
         </div>
   </div>

   <div id="page-content" style="margin-bottom: 0px;margin-top: 0px;">
      <div id="default_page">
         <div class="container">
            <div class="contentarea clearfix">

              <div class="row animated bounceInUp">
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

                              <div class="col-xs-2 col-lg-2">
                                <img class="img-responsive" src="{{ $line->product->image ?? "http://placehold.it/100x70" }}">
                              </div>

                              <div class="col-xs-3 col-md-6 col-lg-6">
                                {{-- <h4 class="product-name"> --}}
                                  <strong>{{ $line->product->name ?? "" }}</strong>
                                {{-- </h4> --}}
                                    {{-- {{ $line->product->desc ?? "" }} --}}

                									@if (mb_strlen($line->product->desc)>140)
                									  {{ mb_substr($line->product->desc, 0, 140,'UTF-8') }}...
                									@else
                									  {{ $line->product->desc }}
                									@endif
                              </div>

                              <div class="col-xs-7 col-md-4 col-lg-4" style="text-align: left;">
                                <div class="col-xs-12 cart_id" >

                                  {{-- <h7> --}}
                                    {{ $line->product->price_amount ?? "" }} X
                                  {{-- </h7> --}}

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: red; border: 1px solid grey; padding: 6px 9px;" data-type="minus" >-</span>
                                  <input type="text" min="1" max="1000" class="input-number form-control input-sm one_line one_line_in" value="{{ $line->qty ?? "" }}" data-line_id="{{ $line->id }}">

                                  <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: green; border: 1px solid grey; padding: 6px;" data-type="plus" >+</span>

                                  <b> <span class="one_line sh6">={{ $line->qty*$line->product->price_amount }}</span> </b>

                                  {!! Form::open(['route' => ['lineItems.destroy', $line->id], 'method' => 'delete','class'=>"position",'style'=>"position: absolute;display: contents;"]) !!}

                                  {!! Form::button('X', ['type' => 'submit', 'class' => 'destroy_button btn-sm btn', 'style'=>'background-color: white;color: red;right: 0em;position: absolute;margin-top: 4px;padding: 3px;', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                                  {!! Form::close() !!}

                                  {{-- cart_id --}}
                                </div>
                                {{-- <div class="col-xs-2"> --}}


                                    {{-- <a href="/remove" style="color: red;">X</a> --}}
                                {{-- </div> --}}
                              </div>
                            </div>
                            <hr>

                          @endforeach

                          <form id="form_id" action="/carts/{{$cart->id}}/checkout">
                          	<div class="row">
                              <div class="col-md-12 my_place_div" style="text-align: left;">
                                <b>Где вы находитесь?</b>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="my_place" id="my_place1" value="0" class="my_place" required>
                                    Я в заведении
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="my_place" id="my_place2" value="1" class="my_place" required>
                                    Я в гостинице
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="my_place" id="my_place3" value="2" class="my_place" required>
                                    Это заказ на вынос
                                  </label>
                                </div>
                              </div>
                          		
                          	</div>



                          	<div class="row">

                              <div class="col-md-12 stol_div" style="text-align: left; display: none;">
                                <b>Номер столика</b>
                                <div class="form-group">
                                    {{-- <input type="text" name="stol_number" id="stol_number" value="" class="form-control"> --}}
                                    <select class="browser-default custom-select" name="stol_number">
                                      <option selected>Номер</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                    </select>
                                </div>
                              </div>

                              <div class="col-md-12 hotel_number_div" style="text-align: left; display: none;">
                                <b>Номер в гостинице</b>
                                <div class="form-group">
                                    {{-- <input type="text" name="hotel_number" id="hotel_number" value="" class="form-control"> --}}
                                    <select class="browser-default custom-select" name="hotel_number">
                                      <option selected>Номер</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                    </select>

                                </div>
                              </div>

                              <div class="col-md-12 contact_adr" style="text-align: left;  display: none;">
                                <b>Адрес доставки</b>
                                <textarea name="contact_adr" id="contact_adr" style="width: 100%;" rows="5" placeholder="Укажите адрес: Населенный пункт, улица, номер дома, офис, домофон, этаж, примечания..."></textarea>
                              </div>

                              <div class="col-md-6" style="text-align: left;">
                                <b>Контактный номер (обязательно*)</b>
  	                            <div class="form-group">

                                  <div class="input-group">
                                    <span class="input-group-addon">
                                      <i class="fa fa-phone"></i>            
                                    </span>
                                      <input type="text" name="contact_number" id="contact_number" value="" placeholder="11 цифр: +7(999)-888-77-77" class="form-control" required>
                                      {{-- <input type="text" name="contact_number" id="contact_number" value="" placeholder="11 цифр: 79998887777" class="form-control" required pattern="[0-9]{11}"> --}}
                                      {{-- <input type="number" name="contact_number" id="contact_number" value="" placeholder=" 11 цифр: 79998887777" class="form-control" required pattern="[0-9]{10}"> --}}
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6" style="text-align: left;">
                                <b>Email (не обязательно)</b>
                                <div class="form-group">

                                  <div class="input-group">
                                    <span class="input-group-addon">
                                      <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                      <input type="text" name="contact_email" id="contact_email" value="" placeholder="Ваша электронная почта" class="form-control" >
                                  </div>
                                </div>
                              </div>


                          	</div>

                            {{-- <hr> --}}
                            
                            <div class="row">
                              <div class="col-md-12 my_pay_div" style="text-align: left;">
                                <b>Метод оплаты</b>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_type" value="0" class="pay_type" required>
                                    Оплата курьеру
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_type" value="1" class="pay_type" required>
                                    Оплата в заведении
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="pay_type" value="2" class="pay_type pay_type_online" required>
                                    Онлайн оплата
                                  </label>
                                </div>
                              </div>
                              
                            </div>


                            <div class="panel-footer">
                              <div class="row text-center">
                                <div class="col-md-9">
                                  <h4 class="text-right">Итого <strong id="cart_total">{{ $cart->total() }}</strong></h4>
                                </div>
                                <div class="col-md-3">
                                  <button type="submit" value="Оплатить" class="btn-success btn-block" id="checkout_link" style="padding: 0 0;">
                                    Оплатить
                                  </button>
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

	// очистка корзины
	$('#clear_btn').click(function(e){
    $("#page-content").addClass('animated bounceOutDown')
	  e.preventDeafult;
	  $.ajax({
	      url: $(this).data('url'),
	      type: 'GET',
	      success: function(result) {
	        window.location='/cart'
	      }
	  });
	});

	// при нажатии на одну из кнопок + или - делаем следующее
    $('span.btn-number').click(function(e){
    	// определяем кнопку по типу minus или plus
        type      = $(this).attr('data-type');
        // console.log(type)

        // TODO выбрать КНОПКИ только свой ряд +

        // поле с количеством линии продукта
        var input = $(this).parent().find('input');
        // текущее значение количество
        var currentVal = parseInt(input.val());
        // номер линии
        var line_id = $(this).parent().find('input').data('line_id');
        // итого сумма линии
        var total = $(this).parent().find('.sh6');
        // cart_id = $('#cart_id').data('cart_id')

        // взять номер карзины из бейджа
        cart_id = $('#qty_badge').data('cart_id')

        // console.log(currentVal)

        // $('#cart_total').text(result)
        // total.text('='+result)
        // $('#qty_badge').text(result)

        // если текущее значение количества 
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

	// отменяеть выбор текста мышкой - сделано чтобы не выбирался текст при двойном нажатии
    jQuery('.cart_id').mousedown(function(e){ e.preventDefault(); });

	// кнопка оплаты
    // $('#checkout_link').click(function(e) {

    //   e.preventDefault();

    //   uurl=$(this).data('link')

    //   // сериализуем форму и 
    //   // переходим по ссылке data-link="/carts/$cart->id/checkout?+$('#form_id').serialize()"
    //   window.location=uurl+'?'+$('#form_id').serialize()

    //     // $.ajax({
    //     //     url: uurl+'?'+$('#form_id').serialize(),
    //     //     type: 'GET',  // user.destroy
    //     //     success: function(result) {
    //     //         // total.text('='+result)
    //     //         // console.log()
    //     //         window.location="/thanks"
    //     //     }
    //     // });
    // })



    $("input.my_place").click(function(e) {

    	console.log( $(this).val() )

    	if ($(this).val()==0) {
    		$(".stol_div").show()
        $(".stol_div").addClass('animated bounceInDown')

        // $(".hotel_number_div").addClass('animated bounceOutRight')
    		$(".hotel_number_div").hide()
        // $(".contact_adr").addClass('animated bounceOutRight')
    		$(".contact_adr").hide()

    	}
    	if ($(this).val()==1) {
    		$(".hotel_number_div").show()
        $(".hotel_number_div").addClass('animated bounceInDown')

        // $(".stol_div").addClass('animated bounceOutRight')
    		$(".stol_div").hide()
        // $(".contact_adr").addClass('animated bounceOutRight')
    		$(".contact_adr").hide()

    	}
    	if ($(this).val()==2) {
    		$(".contact_adr").show()
        $(".contact_adr").addClass('animated bounceInDown')

        // $(".stol_div").addClass('animated bounceOutRight')
    		$(".stol_div").hide()
        // $(".hotel_number_div").addClass('animated bounceOutRight')
    		$(".hotel_number_div").hide()
    	}

        // class will be removed if checked="checked"
        // otherwise will be added
        $(this).toggleClass("terms_error", !this.checked);
    }).change(); // set initial state



    $("input.pay_type_online").click(function(e) {

    }).change(); // set initial state

  </script>

@endsection
