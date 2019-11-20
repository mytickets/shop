@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           <b>Показать:</b>  Категории
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">

                    <a href="{!! route('cats.index') !!}" class="btn btn-default">Назад</a>
                    <a href="{!! route('cats.edit', [$cat->ident]) !!}" class='btn btn-default'>Изменить</a>

                    @include('cats.show_fields')

<hr>
@foreach ( $cat->products as $line)

              <div class="row">
                <div class="col-xs-2">
                  <img class="img-responsive" src="{{ $line->image ?? "http://placehold.it/100x70" }}">
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
                    {{-- <h6><strong>{{ $line->price_amount ?? "" }} </strong></h6> --}}
                    {{-- <input type="text" class="form-control input-sm" disabled value="{{ $line->price_amount ?? "" }}"> --}}
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
                      // if ($line->menu){
                      //     $m="V";
                      // } else { $m="X"; }
                    @endphp
                    {{-- <span class="badge label label-{{ $mcolor }} menu_check" data-id={{ $line->ident }}>{{ $m }}</span> --}}
                  </div>
                </div>
              </div>
              <hr>
@endforeach

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
</script>

@endsection

