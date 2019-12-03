@extends('layouts.app')


@section('content')

<style type="text/css">
/*a[aria-expanded=true] .fa-chevron-right {
   display: none;
}
a[aria-expanded=false] .fa-chevron-down {
   display: none;
}  */
</style>
    <section class="content-header">
        <h1>
           <b>Показать:</b>  Категория №{{ $cat->id }}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">

                    <a href="{!! route('cats.index') !!}" class="btn btn-default">Назад</a>
                    <a href="{!! route('cats.edit', [$cat->ident]) !!}" class='btn btn-default'>Изменить</a>

                    {{-- <div class="box box-solid"> --}}
                      {{-- <div class="box-body"> --}}
                        <div class="box-group" id="accordion">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="chevron_change">
                                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                  {{-- <i class="fa fa-chevron-right pull-left"></i> --}}
                                  {{-- <i class="fa fa-chevron-down pull-left"></i> --}}
                                  Общая информация
                                </a>
                              </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                              {{-- <div class="box-body"> --}}
                                @include('cats.show_fields')
                              {{-- </div> --}}
                            </div>
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="chevron_change">
                                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                  {{-- <i class="fa fa-chevron-right pull-left"></i> --}}
                                  {{-- <i class="fa fa-chevron-down pull-left" ></i> --}}
                                  Вложеные продукты
                                </a>
                              </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse  in">

                              @if ( count( $cat->products )==0 )
                                Нет вложенных продуктов
                              @endif

                              @foreach ( $cat->products as $line)

                                  <div class="row">
                                    <div class="col-xs-2">
                                      <img class="img-responsive" src="{{ $line->image ?? "http://placehold.it/100x70" }}" style="    max-height: 80px;">
                                    </div>
                                    <div class="col-xs-4">
                                      <h4 class="product-name">
                                        <a href="/products/{{ $line->ident }}">
                                            <strong>{{ $line->name ?? "Название" }}</strong>
                                        </a>
                                      </h4>

                                      @if (mb_strlen($line->desc)>140)
                                        {{ mb_substr($line->desc, 0, 140,'UTF-8') }}...
                                      @else
                                        {{ $line->desc ?? "Описание" }}
                                      @endif

                                    </div>
                                    <div class="col-xs-6">
                                      <div class="col-xs-6 text-right">
                                        {{ $line->price_amount ?? "" }} руб.
                                      </div>
                                      <div class="col-xs-2">
                                        В меню: 
                                        @php
                                          if ($line->menu){
                                              $m="V";
                                              $mcolor="success";
                                        @endphp
                                            <span class="badge label label-success menu_check" data-id={{ $line->ident }}>V</span>
                                        @php
                                            } else { 
                                              $m="X";
                                              $mcolor="default";
                                              @endphp
                                                  <span class="badge label label-default menu_check" data-id={{ $line->ident }}>X</span>
                                              @php

                                          }
                                        @endphp
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                              @endforeach
                                  
                              {{-- </div> --}}
                            </div>

                        </div>
                      {{-- </div> --}}
                      <!-- /.box-body -->
                    {{-- </div> --}}

                    <a href="{!! route('cats.index') !!}" class="btn btn-default">Назад</a>
                    <a href="{!! route('cats.edit', [$cat->ident]) !!}" class='btn btn-default'>Изменить</a>
                </div>
            </div>
        </div>
    </div>

<script>
$('.menu_check').click(function(e){
      var t1 = this;
    console.log( $(this).data('id') )
      // check_menu
                          $.ajax({
                              url: '/products/'+$(this).data('id')+'/check_menu2',
                              type: 'GET',
                              success: function(result) {
                                  console.log( result[0] )
                                  console.log( result[1] )
                                  $(t1).text(result[0])

                                  if (result[1]=='success') {
                                    $(t1).removeClass('label-default')
                                  } else {
                                    $(t1).removeClass('label-success')
                                  }

                                  $(t1).addClass('label-'+result[1])
                                  // label-default
                                  // console.log( $(t1).text(result) )





                                  // $()
                              }
                          });

});

// $('.collapsed').click(function(e1){

//     if ($(this).find('i').hasClass("fa-chevron-right")) {
//       $(this).find('i').toggleClass('fa-chevron-right fa-chevron-down');
//     } else {
//       $(this).find('i').addClass('fa-chevron-right');
//       $(this).find('i').removeClass('fa-chevron-down');
//     }
// });

</script>

@endsection

