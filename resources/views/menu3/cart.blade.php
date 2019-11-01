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
              <div class="row">
                <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                </div>
                <div class="col-xs-4">
                  <h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
                </div>
                <div class="col-xs-6">
                  <div class="col-xs-6 text-right">
                    <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                  </div>
                  <div class="col-xs-4">
                    <input type="text" class="form-control input-sm" value="1">
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
              <div class="row">
                <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                </div>
                <div class="col-xs-4">
                  <h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
                </div>
                <div class="col-xs-6">
                  <div class="col-xs-6 text-right">
                    <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                  </div>
                  <div class="col-xs-4">
                    <input type="text" class="form-control input-sm" value="1">
                  </div>
                  <div class="col-xs-2">
                    X
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
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
              </div>
            </div>
            <div class="panel-footer">
              <div class="row text-center">
                <div class="col-xs-9">
                  <h4 class="text-right">Итого <strong>$50.00</strong></h4>
                </div>
                <div class="col-xs-3">
                  <button type="button" class="btn btn-success btn-block">
                    Заказ
                  </button>
                </div>
              </div>
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
