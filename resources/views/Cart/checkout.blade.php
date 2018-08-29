@extends('layouts.app')

@section('content')
    <div >
        <h1>Je gegevens</h1>
        <h4>Totaal: €{{ $total }}</h4>
        <form action="{{ route('checkout') }}" method="post" id="checkout-form">
            <div >
                <div >
                    <div >
                        <label for="name">Naam</label>
                        <input type="text" id="name" class="form-control" required name="name" style="width: 200px;">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" id="address" class="form-control" required name="address" style="max-width: 200px;">
                    </div>
                </div>
                <div class="col-xs-12">
                </div>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn-dark">Afrekenen</button>
        </form>
    </div>
@endsection