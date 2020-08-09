@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">E Commerce App</h1>
                <div class="list-group">
                    <div class="row list-group-item d-inline-flex align-items-center">

                        <div class="justify-content-center">
                            <a href="{{route('home')}}" class="ml-1">All</a>
                        </div>
                    </div>
                    @foreach(\App\Category::all() as $category)
                        <div class="row list-group-item d-inline-flex align-items-center">
                                <img src="/images/{{$category->image}}" class="rounded-circle img-fluid" width="50" alt="{{ $category->name }}">
                                <div class="justify-content-center">
                                    <a href="{{route('getproductsbycategory',$category->slug)}}" class="ml-1">{{$category->name}}</a>
                                </div>
                        </div>

                        @endforeach
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                <div class="title"><h2>{{ $sliderProducts[0]->category->name ?? '' }}</h2></div>
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
{{--                        @foreach($products->orderBy('id','DESC')->limit(3)->get() as $key=>$product)--}}
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
{{--                            @endforeach--}}
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($sliderProducts ?? \App\Product::all() as $key=>$product)
                            <div class="carousel-item {{ $key==0 ? 'active' : '' }}">
                                <div style="width: 950px; height: 300px;">
                                    <a href="#">
                                        <img class="d-block img-fluid" width="900" height="350" src="/images/{{$product->image}}" alt="{{$product->name}}">
                                    </a>
                                </div>

                            </div>
                            @endforeach
{{--                        <div class="carousel-item active">--}}
{{--                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">--}}
{{--                        </div>--}}
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row">

                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="/images/{{$product->image}}" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{route('getProduct',$product->id)}}">{{$product->name}}</a>
                                    </h4>
                                    <h5>{{$product->price}} ₺</h5>
                                    <p class="card-text">{{\Illuminate\Support\Str::limit($product->description,120)}}</p>
                                    <p class="text-muted">{{$product->category->name}} / {{$product->subcategory->name ?? ''}}</p>
                                </div>
                                <div class="card-footer">
                                    <div>
                                        <a href="#" class="btn btn-outline text-uppercase"> Add To Cart </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach




                </div>
                <!-- /.row -->
               <div class="float-right">{{$products->links()}}</div>
            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
@endsection
