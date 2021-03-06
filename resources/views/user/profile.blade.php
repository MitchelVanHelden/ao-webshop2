@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Profiel</h1>
            <hr>
            <h2>Je bestellingen:</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="badge">€{{ $item['price'] }}</span>
                                    {{ $item['item']['name'] }} | {{ $item['qty'] }} Stuk(s)
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Totaal bedrag: €{{ $order->cart->totalPrice }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection