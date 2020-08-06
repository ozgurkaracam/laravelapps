@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category {{ isset($category) ? 'Edit' : 'Create' }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ isset($category) ? 'Edit' : 'Create' }}</li>
            </ol>
        </div>
        <div class="row mb-3">
            <div class="card col-md-10 offset-md-1">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store') }}" enctype="multipart/form-data" method="POST">@csrf
                        {{ isset($category) ? method_field('PUT') : null }}
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" value="{{ $category->name ?? Old('name') }}" class="form-control" id="name" name="name" placeholder="Category Name">
                            @error('name')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Category Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $category->description ?? Old('description') }}</textarea>
                            @error('description')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        @if(isset($category->image))
                            <div class="col-md-3 mb-2">
                                <img src="{{asset('images/'.$category->image)}}" alt="{{$category->name}}" class="img-fluid">
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
                        <button type="submit" class="btn btn-primary">{{isset($category) ? 'Edit!' : 'Save!'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
