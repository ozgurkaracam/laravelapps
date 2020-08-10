@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <img src="/images/{{$product->image}}" alt="{{$product->name}}">
                            <div class="font-weight-bold">{{$product->name}}</div>
                        </div>
                        <div class="col-md-6">
                            <div><a href="{{route('getproductsbycategory',$product->category->slug)}}">{{ $product->category->name }}</a> / {{$product->subcategory->name}}</div>
                            <div class="mb-2"><h1>{{$product->name}}</h1></div>
                            <div class="mb-2">Price: {{$product->price}} ₺</div>
                            <div class="mb-2">Description: {{$product->description}}</div>
                            <div class="mb-2">In Additional: {{$product->in_additional}}</div>
                            <div>
                                <form method="POST" action="{{route('addtocart')}}">
                                    @csrf
                                    <input type="hidden" name="productid" value="{{$product->id}}">
                                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Similar Products
                        <div class="row">
                            @foreach(\App\Product::where('category_id',$product->category->id)->take(4)->get() as $p)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img class="card-img-top" src="/images/{{$p->image}}" alt="Card image">
                                        <div class="card-body">
                                            <h4 class="card-title">{{$p->name}}</h4>
                                            <p class="card-text">{{\Illuminate\Support\Str::limit($p->description,50)}}
                                                <br>
                                                <span class="text-muted">{{$p->price}} ₺</span>
                                            </p>

                                            <a href="#" class="btn btn-primary">See</a>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
