@extends('layouts.menu3')

@section('css')

<style type="text/css">
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

   <div id="pagetitle" class=" text-center">
         <div class="container" style="padding-top: 90px;">
            <h2>Спасибо за заказ. </h2>
            <p>Ожидайте, менеджер с Вами свяжется для подтверждения заказа. <br>   Номер заказа: {{ $order_id }}</p>
         </div>
   </div>

   <div id="page-content" style="margin-bottom: 0px;margin-top: 0px;">
      <div id="default_page">
         <div class="container">
            <div class="contentarea clearfix">

              <div class="row">
                  <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <div class="panel panel-info">

{{--                       <div class="panel-body">
                          <div class="row">
                            <div class="col-xs-12 text-center">
                              Спасибо за заказ. Ожидайте.
                            </div>
                          </div>
                          <hr>
                      </div>
 --}}
                      <div class="panel-heading">
                        <div class="panel-title">
                          <div class="row">
                            <div class="col-xs-12">
                              <a href="/menu/" class="btn btn-primary btn-block">
                                в Меню
                              </a>
                            </div>
                          </div>
                        </div>
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

@endsection
