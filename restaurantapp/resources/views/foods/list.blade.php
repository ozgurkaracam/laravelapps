@extends('layouts.app')

@section('content')
    <div class="container container-fluid">
        @foreach($categories as $category)
            <div>
                <h2 class="text-secondary">{{$category->name}}</h2>
            </div>
        @if($category->foods()->count()>0)
                @foreach($category->foods as $food)
                    <div class="container">
                        <div class="col-md-6 mx-auto mb-2">
                            <div class="card">
                                <img class="card-img-top" src="/images/{{$food->image}}" alt="Card image cap">

                                <div class="card-body">
                                    <div class="card-title">
                                        <b>{{$food->name}}</b>
                                    </div>
                                    <p class="card-text">{{$food->description}}</p>
                                    <p class="text-info font-weight-bold">Price : {{$food->price}} TL</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                 @else
                 <h2 class="text-center text-danger">No Food.</h1>
            @endif
            <hr>
        @endforeach

    </div>

    @endsection
