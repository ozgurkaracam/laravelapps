@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <img src="/images/{{$product->image}}" class="img-fluid" alt="{{$product->name}}">
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
                        <h4>
                            Similar Products
                        </h4>
                        <div class="row mt-2">
                            @foreach(\App\Product::inRandomOrder()->where('category_id',$product->category->id)->whereNotIn('id',[$product->id])->take(4)->get() as $p)
                                <div class="col-md-3">
                                    <div class="card">
                                        <a href="{{route('getProduct',$p->id)}}" ><img class="card-img-top img-fluid" src="/images/{{$p->image}}" alt="Card image"></a>
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="{{route('getProduct',$p->id)}}" >{{$p->name}}</a></h4>
                                            <p class="card-text">{{\Illuminate\Support\Str::limit($p->description,50)}}
                                                <br>
                                                <span class="text-muted">{{$p->price}} ₺</span>
                                            </p>

                                            <a href="{{route('getProduct',$p->id)}}" class="btn btn-primary">See</a>
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
