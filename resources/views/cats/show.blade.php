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
                  </div>
                  <div class="col-xs-4">
                    <input type="text" class="form-control input-sm" disabled value="{{ $line->price_amount ?? "" }}">
                    {{-- <h6><strong>{{ $line->price_amount ?? "" }} </strong></h6> --}}
                  </div>
                  <div class="col-xs-2">
                      <a href="/remove" style="color: red;">X</a>
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
@endsection
