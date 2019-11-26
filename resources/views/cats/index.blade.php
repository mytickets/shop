@extends('layouts.app')


@section('content-header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Категории
        {{-- <small id="list1">список</small> --}}
        {{-- <small id="table1">таблицa</small> --}}
      </h1>
      <ol class="breadcrumb">
        {{-- <li><a href="/"><i class="fa fa-dashboard"></i> Главная</a></li> --}}
        <li><a href="/"><i class="fa fa-dashboard"></i> Пространство</a></li>
        <li><a href="/"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Магазин</a></li>
        <li class="active">Категории</li>
      </ol>
    </section>

@endsection


@section('content')


    <div class="content">
        <div class="clearfix"></div>

            <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"  class="active"><a href="#tab_table" aria-controls="home" role="tab" data-toggle="tab">Таблица</a></li>
                <li role="presentation">
                  {{-- <a href="#tab_card" aria-controls="profile" role="tab" data-toggle="tab">Дерево</a> --}}
                  <a href="/cats_tree" >Дерево</a>
                </li>
              </ul>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade  in active" id="tab_table">

                    @include('cats.table')

                </div>
{{--                 <div role="tabpanel" class="tab-pane fade" id="tab_card">
                    @include('cats.tree')
                </div> --}}
              </div>
                    
            </div>
        </div>
    </div>


@endsection

