@extends('layouts.app')

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list group">
                    @foreach($products as $prod)
                        <li class="list-group-item">
                            <strong>{{ $prod['item']['name'] }}</strong>
                            <span class="badge">Aantal {{ $prod['qty'] }}</span>
                            <span class="label label-success">€{{ $prod['price'] }}</span>
                            <a href="{{ route('cart.reduceOne', ['id' => $prod['item']['id']]) }}">1 verwijderen</a></li>
                            <a href="{{ route('cart.deleteItem', ['id' => $prod['item']['id']]) }}">Alles verwijderen</a></li>
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div style="margin-left: 60px;">
                <strong>Total: €{{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div >
                <a href="{{ route('checkout') }}" type="button" class="btn btn-dark" style="margin-left: 60px;">Betalen</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Je hebt geen flessen in je winkelwagen</h2>
            </div>
        </div>
    @endif
@endsection