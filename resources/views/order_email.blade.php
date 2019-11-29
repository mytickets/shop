
Новый заказа с сайта

Ссылка на заказ: http://restoran-nadezhda.com/orders/{!! $order->id !!}

Заказ №: {!! $order->id !!}

  @foreach($order->line_items as $line)

          Наименование: {{ $line->product->name }} 
          Всего: {{ $line->product->price_amount }} X {{ $line->qty }} = {{ $line->qty*$line->product->price_amount }} руб. 
  @endforeach

  @php
  	$itog = 0;
  @endphp
  @foreach($order->line_items as $line)
	  @php
	  	$itog = $itog + $line->qty*$line->product->price_amount;
	  @endphp
  @endforeach
Итого: {{ $itog }} =  руб.
Куда: {{ $order->pay_adr }}
