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

                           {{-- <div class="vc_row wpb_row vc_row-fluid vc_custom_1539131192676 ult-vc-hide-row vc_row-has-fill" data-rtl="false" style="position: relative;" data-row-effect-mobile-disable="true" data-img-parallax-mobile-disable="true"><div class="upb_row_bg vcpb-vz-jquery" data-upb_br_animation="" data-parallax_sense="50" data-bg-override="full" data-bg-animation="left-animation" data-bg-animation-type="h" data-animation-repeat="repeat" style="background-size: cover; background-repeat: no-repeat; background-color: rgba(0, 0, 0, 0); background-image: url(/slider-bg4.jpg); background-attachment: scroll; min-width: 1310px; left: 0px; width: 1310px;"></div> --}}
                           {{-- {{ $cat->image }} --}}
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
                           {{-- </div> --}}
                           <br>

                          {{-- @foreach ( \App\Models\Product::where('cat_id', $cat->id)->get() as $product) --}}
                           <div class="vc_row wpb_row vc_row-fluid vc_custom_1536348479913">
                           @foreach ( \App\Models\Product::where('cat_id', "=", $cat->ident)->get() as $product)
                           @if ( $product->menu == 1)

                           {{-- <td>{{ App\Models\Cat::where('ident', '=', $product->cat_id)->first()->name }}</td> --}}

                              {{-- <div class="wpb_column vc_column_container vc_col-sm-6"> --}}
                              <style type="text/css">
                                 .vc_column-inner {
                                    min-height: 16em;
                                 }
                              </style>
                              <div class="col-sm-6">
                                 <div class="vc_column-inner">
                                    <div class="wpb_wrapper">

                                       <div class="evatheme_core-menu-wrap menu_item_id5d99e5d6b7378 left rounded type1 with_img   vc_custom_1542075873094">
                                          <div class="menu_item">
                                             <div class="row">
                                                <div class="col-lg-4 mb30">
                                                   <div class="menu_img_wrap" style="text-align: center;" ><img src="{{ $product->image }}" alt="{{ $product->name }}">
                                                    <br>
                                                    <a href="#" data-ident="{{ $product->id }}" class="btn to_cart" style="width: 100%;">
                                                      В корзину
                                                    </a>
                                                   </div>
                                                </div>
                                                <div class="col-lg-8">
                                                   <div class="menu_item_content">
                                                      {{-- <div>
                                                         <span class="menu_item_label" style="color:#ffffff;background-color:#d3ab55;margin-bottom:25px;padding-left:14px;padding-right:14px;letter-spacing:1px;">НОВИНКА</span>
                                                      </div> --}}
                                                      <h4 class="menu_item_title" style="color:#333333;"><span class="menu_item_title_span" style="background-color:#ffffff;font-size: 27px;">{{ $product->name }}</span></h4>
                                                      <p class="menu_item_ingredients" style="color:#555555;">{{ $product->desc }}</p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>


                                    </div>
                                 </div>
                              </div>
                          @endif
                          @endforeach
                     </div>

{{--
                            <ul>
                              @foreach ( \App\Models\Product::where('cat_id', "=", $cat->ident)->get() as $product)
                                  <li>
                                      <a href="/products/{{ $product->id }}">
                                          {{ $product->name }}
                                      </a>
                                  </li>
                              @endforeach
                            </ul>
 --}}
                           {{-- @foreach ( \App\Models\Product::where('cat_id', $cat->id)->get() as $product) --}}
                           {{-- <div class="vc_row wpb_row vc_row-fluid vc_custom_1536348479913"> --}}
                           {{-- @foreach ( \App\Models\Product::where('cat_id', "=", $cat->ident)->get() as $product) --}}

                           {{-- <td>{{ App\Models\Cat::where('ident', '=', $product->cat_id)->first()->name }}</td> --}}

                              {{-- <div class="wpb_column vc_column_container vc_col-sm-6"> --}}

                           {{-- @endforeach --}}
                            {{-- </div> --}}

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
function total_cart() {
    $.get(
      "/total_cart/"+$('#cart_id').data('id'), {}, onAjaxSuccess
    );
    // cart-value
}
function onAjaxSuccess(data)
{
  // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
  console.log(data);
  $("#cart-value").html(data+" руб.")
  $("#cart-value2").html(data+" руб.")
    
}


$(document).ready(function (){   
    // var l = $.get("/total_cart/"+$('#cart_id').data('id'))
    // total_cart()

    // $('a.remove_line_item').click(function(e){
    //     $.get("/line_item_remove/"+$(this).data('id'));
    //     $(this).parent().parent().remove()
    //     total_cart()
    // })

    $('a.to_cart').click(function(e){
        e.preventDefault();
        $.get("/product/"+$(this).data('ident')+"/to_cart/1");
        // total_cart()
        // console.log($(this).data('id'))
    })


});
  
</script>
      
@endsection