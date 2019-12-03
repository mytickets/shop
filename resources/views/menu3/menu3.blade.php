@extends('layouts.menu3')

@section('content')
    <link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/plugins/slick-carousel/slick/slick.css" />
    {{-- <link rel="stylesheet" href="/assets/plugins/animate.css/animate.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> --}}

    <link rel="stylesheet" href="/assets/plugins/animsition/dist/css/animsition.min.css" />

    <!-- CSS Icons -->
    <link rel="stylesheet" href="/assets/css/themify-icons.css" />
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css" />

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="/assets/css/themes/theme-beige.min.css" />

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

      .menu-category .menu-category-title.collapse-toggle:after {
          z-index: 0;
        }

      .menu-category .menu-category-title .title {
        z-index: 0 !important;
      }
      .animated {
            visibility: visible;
        }
    </style>

  <div id="pagetitle" class=" text-center">
         <div class="container" style="padding-top: 90px;">
            <p>Полный список категорий</p>
            <h2>МЕНЮ</h2>
         </div>
  </div>

  <div id="content">


        <!-- Page Title -->
<!--         <div class="page-title bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Menu Grid</h1>
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                    </div>
                </div>
            </div>
        </div>
 -->



        <!-- Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-10 push-md-1" role="tablist">
                        <!-- Menu Category / Burgers -->

                     @foreach ($cats as $cat)
                        @if ( $cat->menu == 1)

                        <div id="cat_{{ $cat->id }}" class="menu-category">
                            <div class="menu-category-title collapse-toggle collapsed" role="tab" data-target="#menu_cat_{{ $cat->id }}_Content" data-toggle="collapse" aria-expanded="false">
                                <div class="bg-image" style="background-image: url(&quot;{{ $cat->image }}&quot;);"><img src="{{ $cat->image }}" alt="" style="display: none;"></div>
                                <h2 class="title">{{ $cat->name }}</h2>
                            </div>
                            <div id="menu_cat_{{ $cat->id }}_Content" class="menu-category-content padded collapse" aria-expanded="false" style="">
                                <div class="row gutters-sm">
                                        @foreach ( \App\Models\Product::where('cat_id', "=", $cat->ident)->get() as $product)
                                          @if ( $product->menu == 1)
                                    <div class="col-lg-4 col-6">


                                            <!-- Menu Item -->
                                            <div class="menu-item menu-grid-item">

                                                <img class="mb-4" src="{{ $product->image }}" alt="">

                                                <h6 class="mb-0">{{ $product->name }}</h6>

                                                <span class="text-muted text-sm">
                                                  @if (mb_strlen($product->desc)>140)
                                                    {{ mb_substr($product->desc, 0, 100,'UTF-8') }}...
                                                  @else
                                                    {{ $product->desc }}
                                                  @endif
                                                </span>

                                                <div class="row align-items-center mt-4">
                                                    <div class="col-sm-6"><span class="text-md mr-4">{{ $product->price_amount }} руб.</span></div>
                                                    <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm to_cart" data-ident="{{ $product->ident }}" ><span>В корзину</span></button></div>
                                                </div>

                                            </div>


                                    </div>
                                          @endif
                                        @endforeach

                                </div>
                            </div>
                        </div>


                        @else
                        @endif
                    @endforeach





                    </div>
            <hr>
            {{-- @include('about_brands') --}}
            @include('menu3.footer_contact')

                </div>

            </div>
        </div>

</div>




@endsection

@section('script')

<script type="text/javascript" src="/js/anime.min.js"></script>
<script type="text/javascript">



function removeBtn(e) {
  // alert('Привет');

//     cart_id = $('#qty_badge').data('cart_id')
//     $.ajax({
//         url: '/carts/'+cart_id+'/total_qty',
//         type: 'GET',
//         success: function(result) {
// // animated bounce
//           $('#qty_badge').text(result)
//           $('#qty_badge2').text(result)
//           // $(this0).removeClass('animated bounce')
//         }
//     });

}


function doBounce(element, times, distance, speed) {
    for(var i = 0; i < times; i++) {
        element.animate({marginTop: '-='+distance}, speed)
            .animate({marginTop: '+='+distance}, speed);
    }        
}

$(document).ready(function (){

    $('.to_cart').click(function(e){

// to_cart
      // $('.cart_over').show();
      // anime({
      //   targets: '.cart_over',
      //   translateY: -1500
      // });

        // let this0=this
        e.preventDefault();
        // doBounce($(this), 1, '13px', 300);
        $(this).addClass('animated bounce')
        var this0=this
        $.get("/product/"+$(this).data('ident')+"/to_cart/1");

        setTimeout(function(){
          $(this0).removeClass('animated bounce')
        }, 1500);
// setInterval(qty_badge, 2000);
// setTimeout(qty_badge, 1000);



//     cart_id = $('#qty_badge').data('cart_id')
//     $.ajax({
//         url: '/carts/'+cart_id+'/total_qty',
//         type: 'GET',
//         success: function(result) {
// // animated bounce
//           $('#qty_badge').text(result)
//           $('#qty_badge2').text(result)
//           $(this0).removeClass('animated bounce')
//         }
//     });

          // cart_id = $('#qty_badge').data('cart_id')
          // $.ajax({
          //     url: '/carts/'+cart_id+'/total_qty',
          //     type: 'GET',
          //     success: function(result) {

          //       $('#qty_badge').text(result)

          //       // $(this0).removeClass('animated bounce')
          //       $(this0).removeClass('animated bounce')
          //     }
          // });

    })

});
  
</script>
      
@endsection