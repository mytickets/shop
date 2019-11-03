<!-- Id Field -->
<div class="form-group">
    {{-- <p>{!! $cart->id !!}</p> --}}

@foreach ( $cart->line_items as $line)

              <div class="row">
                <div class="col-xs-2">
                  <img class="img-responsive" src="{{ $line->product->image ?? "http://placehold.it/100x70" }}">
                </div>
                <div class="col-xs-4">
                  <h4 class="product-name">
                    {{ $line->product->ident }}
                    <strong>{{ $line->product->name ?? "Название" }}</strong>

                  </h4>
                  <h4>
                    <small>{{ $line->product->desc ?? "Описание" }}</small>
                  </h4>
                </div>
                <div class="col-xs-6">
                  <div class="col-xs-6 text-right">
                    <h6><strong>{{ $line->product->price_amount ?? "" }} </strong></h6>
                  </div>
                  <div class="col-xs-4">
                    <input type="text" class="form-control input-sm" value="{{ $line->qty ?? "" }}">
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
@endforeach

</div>
