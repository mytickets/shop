@extends('layouts.app')

@section('content-header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Рабочий стол менеджера
        <small>Version 0.1</small>
      </h1>
      <ol class="breadcrumb">
        {{-- <li><a href="/"><i class="fa fa-dashboard"></i> Главная</a></li> --}}
        <li><a href="/"><i class="fa fa-dashboard"></i> Пространство</a></li>
        <li class="active">Рабочий стол менеджера</li>
      </ol>
    </section>

@endsection

@section('content')


{{-- {{ $role_types[Auth::user()->role_type] }} --}}

    <!-- Main content -->
    <section class="content">

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a href="/cats" style="text-decoration: unset; color: black;" >
              
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Категорий</span>
              <span class="info-box-number">
                {{ $cats }}
            </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a href="/products" style="text-decoration: unset; color: black;" >
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Продукты</span>
              <span class="info-box-number">
                {{ \App\Models\Product::all()->count() }}
              </span>
            </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <a href="/orders" style="text-decoration: unset; color: black;" >
            <div class="info-box-content">
              <span class="info-box-text">Заказов</span>
              <span class="info-box-number">
                {{ \App\Models\Order::all()->count() }}
              </span>
            </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-grey" id="span1"><i class="ion ion-ios-people-outline"></i></span>
            <a href="/sync" id="sync" style="text-decoration: unset; color: black;">
            <div class="info-box-content">
              <span class="info-box-text">Обмен</span>
              <span class="info-box-number">Импорт</span>
            </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">

          <!-- TABLE: LATEST ORDERS -->
              <div class="clearfix"></div>

              @include('flash::message')

              <div class="clearfix"></div>
              <div class="box box-primary">
                  <div class="box-body">
                          @include('orders.table')
                  </div>
              </div>
              <div class="text-center">
              
              @include('adminlte-templates::common.paginate', ['records' => $orders])

              </div>

{{--           <div class="box box-info">
             <div class="box-header with-border">
              <h3 class="box-title">Последние заказы</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="/orders" class="btn btn-sm btn-default btn-flat pull-right">Все заказы</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box --> --}}
          
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<script type="text/javascript">
  $('#sync').click(function(e){
    var t1 = this;
    $('#span1').addClass('animated pulse infinite')
    e.preventDefault()
    console.log(this)


    // $('.menu_check').click(function(e){
        // console.log( $(this).data('id') )
          // check_menu
          $.ajax({
              url: '/sync',
              type: 'GET',
              success: function(result) {
                  console.log( "sync" )
                  console.log( "result" )
                  $('#span1').removeClass('animated pulse infinite')

                  // addClass('label-success')
                  // $(this).addClass('animated bounce')


                  // console.log( result[1] )
                  // console.log( $(t1).text(result[0]) )

                  // $(t1).removeClass('label-default')
                  // $(t1).removeClass('label-success')
                  // $(t1).addClass('label-'+result[1])
                    // label-

                  // $()
              }
          });
    // }) // $('.menu_check').click


  })
</script>

@endsection

