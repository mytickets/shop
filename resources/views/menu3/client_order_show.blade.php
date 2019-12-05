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
            <p>Перечень позиций</p>
            <h2>ЗАКАЗ №{{ $order->id }} </h2>
         </div>
   </div>

   <div id="page-content" style="margin-bottom: 0px;margin-top: 0px;">
      <div id="default_page">
         <div class="container">
            <div class="contentarea clearfix">

              <div class="row animated bounceInUp">
                  <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <div class="panel panel-info">

                      <div class="panel-body">

                        @if (count($order->line_items) > 0)

                          @foreach ( $order->line_items as $line)

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

                                    {{ $line->product->price_amount ?? "" }} X {{ $line->qty ?? "" }} = {{ $line->qty*$line->product->price_amount }} руб.

                                  {{-- cart_id --}}
                                </div>
                                {{-- <div class="col-xs-2"> --}}


                                    {{-- <a href="/remove" style="color: red;">X</a> --}}
                                {{-- </div> --}}
                              </div>
                            </div>
                            <hr>

                          @endforeach

                            <div class="panel-footer">
                              <div class="row text-center">
                                <div class="col-xs-9">
                                  <h4 class="text-right">Итого: <strong id="cart_total">{{ $order->total() }}</strong> руб.</h4>
                                </div>
                                <div class="col-xs-3">

                                </div>
                              </div>
                            </div>


                        @else
                          <div class="row">
                            <div class="col-xs-12 text-center">
                              Заказ пуст
                            </div>
                          </div>
                          <hr>
                        @endif

                      </div>

                    </div>

                  </div>
              </div>



            </div>
         </div>
      </div>
   </div>
            
      
@endsection

@section('script')

  <script type="text/javascript">

	
  </script>

@endsection
