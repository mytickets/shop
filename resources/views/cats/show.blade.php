
@extends('layouts.app')

@section('content')
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



          <div class="box box-solid">
            {{-- <div class="box-header with-border"> --}}
              {{-- <h3 class="box-title">Collapsible Accordion</h3> --}}
            {{-- </div> --}}
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <i class="fa fa-caret-down" aria-hidden="true"></i> Общая информация
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">

                      @include('cats.show_fields')


                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <i class="fa fa-caret-down" aria-hidden="true"></i> Вложеные продукты
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse  in">
                    <div class="box-body">

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
                        
                    </div>
                  </div>
                </div>
                {{-- <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Collapsible Group Success
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                      wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                      assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                      nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                      farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                      labore sustainable VHS.
                    </div>
                  </div>
                </div> --}}


              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
                    {{-- <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Общие
                    </a> --}}
                    {{-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">  Button with data-target</button> --}}
                    {{-- <div class="collapse" id="collapseExample">
                      <div class="well">
                      </div>
                    </div> --}}

                    <hr>

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

