@extends('layouts.menu3')

@section('content')

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
   </style>

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

{{-- <div class="container"> --}}
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
        {{-- <div class="col-xs-8"> --}}
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">
                <div class="row">
                  <div class="col-xs-6">
                    <h5>
                      {{-- <span class="glyphicon glyphicon-shopping-cart"></span> --}}
                      Корзина
                    </h5>
                  </div>
                  <div class="col-xs-6">
                    {{-- <button type="button" class="btn btn-primary btn-sm btn-block"> --}}
                      {{-- <span class="glyphicon glyphicon-share-alt"></span> Continue shopping --}}
                    {{-- </button> --}}
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
                                <h4>
                                  <small>{{ $line->product->desc ?? "" }}</small>
                                </h4>
                              </div>

                              <div class="col-xs-5" style="text-align: left;">
                                <div class="col-xs-10">



                                  <h7>{{ $line->product->price_amount ?? "" }} X</h7>

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


          <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: red; border: 1px solid grey; padding: 6px 9px;" data-type="minus" >-</span>
          <input type="text" min="1" max="1000" class="input-number form-control input-sm one_line one_line_in" value="{{ $line->qty ?? "" }}">
          <span class="btn-number" style="    cursor: pointer; min-width: 1em; color: green; border: 1px solid grey; padding: 6px;" data-type="plus" >+</span>

{{-- <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number btn-sm"  data-type="minus" data-field="quant[2]" style="    top: -1px;">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number btn-sm" data-type="plus" data-field="quant[2]" style="    top: -1px;">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
 --}}

                                  <h6 class="one_line">={{ $line->qty*$line->product->price_amount }}</h6>
                                </div>
                                <div class="col-xs-2">
                                    <a href="/remove" style="color: red;">X</a>
                                  {{-- <button type="button" class="btn btn-link btn-xs"> --}}
                                    {{-- <span class="glyphicon glyphicon-trash"> </span> --}}
                                  {{-- </button> --}}
                                </div>
                              </div>
                            </div>
                            <hr>


              @endforeach

            <div class="panel-footer">
              <div class="row text-center">
                <div class="col-xs-9">
                  <h4 class="text-right">Итого <strong>{{ $cart->total() }}</strong></h4>
                </div>
                <div class="col-xs-3">
                  <button type="button" class="btn btn-success btn-block" onclick="alert('add vue update');">
                    Оплатить
                  </button>
                </div>
              </div>
            </div>

            @else

                          <div class="row">
                            <div class="col-xs-12 text-center">
                              Корзина пуста
                            </div>
                          </div>
                          <hr>
            @endif

{{--               <div class="row">
                <div class="text-center">
                  <div class="col-xs-9">
                    <h6 class="text-right">
                      Доставка
                    </h6>
                  </div>
                  <div class="col-xs-3">
                    <strong>$50.00</strong>
                  </div>
                </div>
              </div> --}}

            </div>

          </div>
        {{-- </div> --}}

        </div>
    </div>
{{-- </div> --}}


                  @include('menu3.footer_contact')

                  </div>
               </div>
            </div>
         </div>
      
@endsection

@section('script')

<script type="text/javascript">


//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
// $('span.btn-number').click(function(e){
//     alert("btn-number")
//     // e.preventDefault();
    
//     fieldName = $(this).attr('data-field');
//     type      = $(this).attr('data-type');
//     // var input = $("input[name='"+fieldName+"']");
//     var input = $(".one_line_in");

//     var currentVal = parseInt(input.val());

//     if (!isNaN(currentVal)) {
//         if(type == 'minus') {
            
//             if(currentVal > input.attr('min')) {
//                 input.val(currentVal - 1).change();
//             } 
//             if(parseInt(input.val()) == input.attr('min')) {
//                 $(this).attr('disabled', true);
//             }

//         } else if(type == 'plus') {

//             if(currentVal < input.attr('max')) {
//                 input.val(currentVal + 1).change();
//             }
//             if(parseInt(input.val()) == input.attr('max')) {
//                 $(this).attr('disabled', true);
//             }

//         }
//     } else {
//         input.val(0);
//     }
// });
// $('.input-number').focusin(function(){
//    $(this).data('oldValue', $(this).val());
// });
// $('.input-number').change(function() {
    
//     minValue =  parseInt($(this).attr('min'));
//     maxValue =  parseInt($(this).attr('max'));
//     valueCurrent = parseInt($(this).val());
    
//     name = $(this).attr('name');
//     if(valueCurrent >= minValue) {
//         $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
//     } else {
//         alert('Sorry, the minimum value was reached');
//         $(this).val($(this).data('oldValue'));
//     }
//     if(valueCurrent <= maxValue) {
//         $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
//     } else {
//         alert('Sorry, the maximum value was reached');
//         $(this).val($(this).data('oldValue'));
//     }
    
    
// });
// $(".input-number").keydown(function (e) {
//         // Allow: backspace, delete, tab, escape, enter and .
//         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
//              // Allow: Ctrl+A
//             (e.keyCode == 65 && e.ctrlKey === true) || 
//              // Allow: home, end, left, right
//             (e.keyCode >= 35 && e.keyCode <= 39)) {
//                  // let it happen, don't do anything
//                  return;
//         }
//         // Ensure that it is a number and stop the keypress
//         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
//             e.preventDefault();
//         }
//     });
          // <span class="btn-number" style="min-width: 1em; color: red; border: 1px solid grey; padding: 6px 9px;" data-type="minus" >-</span>
          // <input type="text" class="input-number form-control input-sm one_line one_line_in" value="{{ $line->qty ?? "" }}">
          // <span class="btn-number" style="min-width: 1em; color: green; border: 1px solid grey; padding: 6px;" data-type="plus" >+</span>


$('span.btn-number').click(function(e){
    // alert("btn-number")
    // e.preventDefault();
    // fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    console.log(type)
    // var input = $("input[name='"+fieldName+"']");

    // TODO выбрать КНОПКИ только свой ряд
    // var input = $(".one_line_in");

    var currentVal = parseInt(input.val());
    console.log(currentVal)

    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
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

@endsection
