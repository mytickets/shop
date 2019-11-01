@extends('layouts.menu3')

@section('content')

   <style type="text/css">
      body.page #pagetitle {
          background-image: url(/header1.jpg);
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

            <div class="vc_row wpb_row vc_row-fluid vc_custom_1541627610897">
               <div class="wpb_column vc_column_container vc_col-sm-2">
                  <div class="vc_column-inner">
                     <div class="wpb_wrapper"></div>
                  </div>
               </div>
               <div class="wpb_column vc_column_container vc_col-sm-8">
                  <div class="vc_column-inner">
                     <div class="wpb_wrapper">
                        <div id="ultimate-heading-62695d99dce1c02fd" class="uvc-heading ult-adjust-bottom-margin ultimate-heading-62695d99dce1c02fd uvc-1169 " data-hspacer="line_only" data-halign="center" style="text-align:center">
                           <div class="uvc-main-heading ult-responsive" data-ultimate-target=".uvc-heading.ultimate-heading-62695d99dce1c02fd h2" data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:24px;&quot;,&quot;line-height&quot;:&quot;desktop:36px;&quot;}">
                              <h2 style="font-family:'Oswald';font-weight:300;color:#555555;margin-bottom:20px;">ABOUT RESTAURANT</h2>
                           </div>
                           <div class="uvc-heading-spacer line_only" style="margin-bottom:40px;height:3px;"><span class="uvc-headings-line" style="border-style: solid; border-bottom-width: 3px; border-color: rgb(211, 171, 85); width: 50px; margin: 0px auto;"></span></div>
                        </div>
                        <div id="ultimate-heading-18865d99dce1c03d1" class="uvc-heading ult-adjust-bottom-margin ultimate-heading-18865d99dce1c03d1 uvc-8814 " data-hspacer="no_spacer" data-halign="center" style="text-align:center">
                           <div class="uvc-heading-spacer no_spacer" style="top"></div>
                           <div class="uvc-sub-heading ult-responsive" data-ultimate-target=".uvc-heading.ultimate-heading-18865d99dce1c03d1 .uvc-sub-heading " data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:26px;&quot;,&quot;line-height&quot;:&quot;desktop:42px;&quot;}" style="font-family:'Arvo';font-weight:normal;color:#333333;">Exquisite and fashionable cuisine from the famous cooks. Try our dishes and you will never want something else. Our cooks prepare new and unusual dishes every month, so the range is always new.</div>
                        </div>
                        <div class=" vc_custom_1541627889925 ubtn-ctn-center "><a class="ubtn-link ult-adjust-bottom-margin ubtn-center ubtn-custom " href="#"><button type="button" id="ubtn-6837" class="ubtn ult-adjust-bottom-margin ult-responsive ubtn-custom ubtn-left-bg  none  ubtn-center   tooltip-5d99dce1c04ac" data-hover="#333333" data-border-color="" data-bg="#333333" data-hover-bg="#d3ab55" data-border-hover="" data-shadow-hover="" data-shadow-click="none" data-shadow="" data-shd-shadow="" data-ultimate-target="#ubtn-6837" data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:11px;&quot;,&quot;line-height&quot;:&quot;desktop:22px;&quot;}" style="font-family:'Oswald';font-weight:normal;font-style:normal;width:200px;min-height:40px;padding:12px 16px;border:none;background: #333333;color: #ffffff;"><span class="ubtn-hover" style="background-color:#d3ab55"></span><span class="ubtn-data ubtn-text ">Read more</span></button></a></div>
                     </div>
                  </div>
               </div>
               <div class="wpb_column vc_column_container vc_col-sm-2">
                  <div class="vc_column-inner">
                     <div class="wpb_wrapper"></div>
                  </div>
               </div>
            </div>

                     @foreach ($cats as $cat)
                        @if ( $cat->menu == 1)


                           <div class="vc_row wpb_row vc_row-fluid vc_custom_1539131192676 ult-vc-hide-row vc_row-has-fill" data-rtl="false" style="position: relative;" data-row-effect-mobile-disable="true" data-img-parallax-mobile-disable="true"><div class="upb_row_bg vcpb-vz-jquery" data-upb_br_animation="" data-parallax_sense="50" data-bg-override="full" data-bg-animation="left-animation" data-bg-animation-type="h" data-animation-repeat="repeat" style="background-size: cover; background-repeat: no-repeat; background-color: rgba(0, 0, 0, 0); background-image: url(/slider-bg4.jpg); background-attachment: scroll; min-width: 1310px; left: 0px; width: 1310px;"></div>
                           {{-- {{ $cat->image }} --}}
                              <div class="wpb_column vc_column_container vc_col-sm-12">
                                 <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                       <div id="ultimate-heading-99885d99d11d21788" class="uvc-heading ult-adjust-bottom-margin ultimate-heading-99885d99d11d21788 uvc-4885 " data-hspacer="no_spacer" data-halign="center" style="text-align:center">
                                          <div class="uvc-heading-spacer no_spacer" style="top"></div>
                                          <div class="uvc-main-heading ult-responsive" data-ultimate-target=".uvc-heading.ultimate-heading-99885d99d11d21788 h2" data-responsive-json-new="{&quot;font-size&quot;:&quot;desktop:120px;&quot;,&quot;line-height&quot;:&quot;desktop:130px;&quot;}">
                                             <h2 style="font-family:'Roboto Condensed';font-weight:700;color:#ffffff;">{{ $cat->name }}</h2>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <br>

                           {{-- @foreach ( \App\Models\Product::where('cat_id', $cat->id)->get() as $product) --}}
                           <div class="vc_row wpb_row vc_row-fluid vc_custom_1536348479913">
                           @foreach ( \App\Models\Product::where('cat_id', "=", $cat->ident)->get() as $product)

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
                                                   <div class="menu_img_wrap" style="text-align: center;" ><img src="http://benedicta.evatheme.com/demo/wp-content/uploads/2018/09/menu-style-img1.jpg" alt="ONIONS SALAD"></div>
                                                </div>
                                                <div class="col-lg-8">
                                                   <div class="menu_item_content">
                                                      {{-- <div>
                                                         <span class="menu_item_label" style="color:#ffffff;background-color:#d3ab55;margin-bottom:25px;padding-left:14px;padding-right:14px;letter-spacing:1px;">НОВИНКА</span>
                                                      </div> --}}
                                                      <h4 class="menu_item_title" style="color:#333333;"><span class="menu_item_title_span" style="background-color:#ffffff;font-size: 27px;">{{ $product->name }}</span></h4>
                                                      <p class="menu_item_ingredients" style="color:#555555;">Состав салата</p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>


                                    </div>
                                 </div>
                              </div>

                           @endforeach
                     </div>

                      @else
                      @endif
   @endforeach

                     {{-- {{ $cats[0]->name }} --}}

                  </div>
               </div>
            </div>
         </div>
    	
@endsection
