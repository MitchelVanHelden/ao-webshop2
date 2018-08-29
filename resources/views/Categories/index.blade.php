@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Soorten</div>
                    <div class="card-body">
                        <ul>

                            @foreach ($categories as $cat)
                                <li><a href="{{ action('CategoryController@display', $cat->id) }}">{{ $cat->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection