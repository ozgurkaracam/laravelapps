@extends('admin.layouts.app')

@section('content')
    <div id="app">
        <div class="container-fluid" id="container-wrapper">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Product {{ isset($Product) ? 'Edit' : 'Create' }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($Product) ? 'Edit' : 'Create' }}</li>
                </ol>
            </div>
            <div class="row mb-3">
                <div class="card col-md-10 offset-md-1">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($Product) ? route('products.update',$Product->id) : route('products.store') }}" enctype="multipart/form-data" method="POST">@csrf
                            {{ isset($Product) ? method_field('PUT') : null }}
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" value="{{ $Product->name ?? Old('name') }}" class="form-control" id="name" name="name" placeholder="Product Name">
                                @error('name')
                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <selectcategory :categories="{{\App\Category::all()}}"></selectcategory>
                            <div class="form-group">
                                <label for="name">Product price</label>
                                <input type="number" value="{{ $Product->price ?? Old('name') }}" class="form-control" id="price" name="price" placeholder="Product price">
                                @error('price')
                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Product Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $Product->description ?? Old('description') }}</textarea>
                                @error('description')
                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Product Additional</label>
                                <textarea name="in_additional" id="in_additional" cols="30" rows="10" class="form-control">{{ $Product->in_additional ?? Old('in_additional') }}</textarea>
                                @error('in_additional')
                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            @if(isset($Product->image))
                                <div class="col-md-3 mb-2">
                                    <img src="{{asset('images/'.$Product->image)}}" alt="{{$Product->name}}" class="img-fluid">
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose Image</label>
                                    @error('image')
                                    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">{{isset($Product) ? 'Edit!' : 'Save!'}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('vue')
    <script defer src="{{ mix('js/app.js') }}"></script>
    @endsection
