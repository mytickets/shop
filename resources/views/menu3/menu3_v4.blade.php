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


.menu_item_ingredients {
  /*line-height: 29px;*/
      margin-top: 6px;
}

   </style>

   <div id="pagetitle" class=" text-center">
         <div class="container" style="padding-top: 90px;">
            <p>Полный список категорий</p>
            <h2>МЕНЮ</h2>
            
         </div>
   </div>

         <div id="page-content" style="margin-bottom: 0px;margin-top: 0px;">
            <div id="default_page">
               <div class="container">
                  <div class="contentarea clearfix">
                    
                     @foreach ($cats as $cat)
                        @if ( $cat->menu == 1)

                              <div class="wpb_column vc_column_container vc_col-sm-12">
                                 <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                       <div id="ultimate-heading-99885d99d11d21788" class="uvc-heading ult-adjust-bottom-margin ultimate-heading-99885d99d11d21788 uvc-4885 " data-hspacer="no_spacer" data-halign="center" style="text-align:center">
                                          <div class="uvc-heading-spacer no_spacer" style="top"></div>
                                          <div class="uvc-main-heading ult-responsive" data-ultimate-target=".uvc-heading.ultimate-heading-99885d99d11d21788 h2" data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:120px;&quot;,&quot;line-height&quot;:&quot;desktop:130px;&quot;}">
                                             <h2 style="font-family:'Roboto Condensed';font-weight:700;color:#000;">{{ $cat->name }}</h2>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <br>

                     {{-- <div class="vc_row wpb_row vc_row-fluid vc_custom_1536348479913"> --}}
                     <div class="vc_row wpb_row vc_row-fluid vc_custom_1536348479913">

                                <style type="text/css">
                                   .vc_column-inner {
                                      min-height: 16em;
                                   }
                                </style>

                            @foreach ( \App\Models\Product::where('cat_id', "=", $cat->ident)->get() as $product)
                              @if ( $product->menu == 1)
                              {{-- @if ( true) --}}

                                               {{-- <div class="row"> --}}
                                                  <div class="col-sm-12 col-md-6 mb30">
                                                     <div class="menu_img_wrap" style="text-align: center;" >
                                                      <img src="{{ $product->image }}" alt="{{ $product->name }}" class="responsive-img" />
                                                      <br>
                                                      {{-- <a href="#" data-ident="{{ $product->ident }}" class="btn to_cart" style="width: 100%;">В корзину --}}
                                                      {{-- </a> --}}


                                                      <h7 class="menu_item_title" style="color:#333333;top: 1em;position: relative;"><span class="menu_item_title_span" style="background-color:#ffffff;font-size: 27px;">{{ $product->name }}:</span> <b>  <span style="background-color:#ffffff;font-size: 23px;">{{ $product->price_amount }} руб.</span></b> </h7>

                                                      <a href="#" data-ident="{{ $product->ident }}" class="to_cart" >
                                                        <i class="fa fa-cart-plus fa-fw fa-2x" aria-hidden="true"></i>
                                                      </a>


                                                        <p class="menu_item_ingredients" style="color:#555555;">

                                                          @if (mb_strlen($product->desc)>140)
                                                            {{ mb_substr($product->desc, 0, 140,'UTF-8') }}...
                                                          @else
                                                            {{ $product->desc }}
                                                          @endif
                                                        </p>

                                                     </div>
                                                  </div>
                                               {{-- </div> --}}
                                                  {{-- <div class="col-lg-8"> --}}
                                                     {{-- <div class="menu_item_content"> --}}
                                                        {{-- <div>
                                                           <span class="menu_item_label" style="color:#ffffff;background-color:#d3ab55;margin-bottom:25px;padding-left:14px;padding-right:14px;letter-spacing:1px;">НОВИНКА</span>
                                                        </div> --}}
                                                     {{-- </div> --}}
                                                  {{-- </div> --}}

                                {{-- 
                                <div class="col-sm-6">
                                   <div class="vc_column-inner">
                                      <div class="wpb_wrapper">

                                         <div class="evatheme_core-menu-wrap menu_item_id5d99e5d6b7378 left rounded type1 with_img   vc_custom_1542075873094">
                                            <div class="menu_item">
                                            </div>
                                         </div>


                                      </div>
                                   </div>
                                </div> --}}
                              @endif
                            @endforeach
                     </div>

                      @else

                      @endif
                    @endforeach

                     {{-- {{ $cats[0]->name }} --}}

                  @include('menu3.footer_contact')

                  </div>
               </div>
            </div>
         </div>

@endsection

@section('script')
<script type="text/javascript">
// function total_cart() {
//     $.get(
//       "/total_cart/"+$('#cart_id').data('id'), {}, onAjaxSuccess
//     );
//     // cart-value
// }
// function onAjaxSuccess(data)
// {
//   // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
//   console.log(data);
//   $("#cart-value").html(data+" руб.")
//   $("#cart-value2").html(data+" руб.")
    
// }



$(document).ready(function (){
// $(window).load(function (){
    // var l = $.get("/total_cart/"+$('#cart_id').data('id'))
    // total_cart()

    // $('a.remove_line_item').click(function(e){
    //     $.get("/line_item_remove/"+$(this).data('id'));
    //     $(this).parent().parent().remove()
    //     total_cart()
    // })

function doBounce(element, times, distance, speed) {
    for(var i = 0; i < times; i++) {
        element.animate({marginTop: '-='+distance}, speed)
            .animate({marginTop: '+='+distance}, speed);
    }        
}

    $('a.to_cart').click(function(e){
        e.preventDefault();
        doBounce($(this), 1, '13px', 300);
        // $(this).addClass('animated', 'bounceOutLeft')
        $.get("/product/"+$(this).data('ident')+"/to_cart/1");

            cart_id = $('#qty_badge').data('cart_id')
            $.ajax({
                url: '/carts/'+cart_id+'/total_qty',
                type: 'GET',
                success: function(result) {
                  $('#qty_badge').text(result)
                }
            });

        // total_cart()
        // console.log($(this).data('id'))
    })

});
  
</script>
      
@endsection