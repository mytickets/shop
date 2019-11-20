@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           <b>Показать:</b>  Metatext
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('metatexts.show_fields')
                    <a href="{!! route('metatexts.index') !!}" class="btn btn-default">Назад</a>
                    <a href="{!! route('metatexts.edit', [$metatext->id]) !!}" class='btn btn-default'>Изменить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
