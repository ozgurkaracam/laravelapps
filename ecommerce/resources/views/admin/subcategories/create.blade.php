@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Subcategory {{ isset($subcategory) ? 'Edit' : 'Create' }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Subcategories</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ isset($subcategory) ? 'Edit' : 'Create' }}</li>
            </ol>
        </div>
        <div class="row mb-3">
            <div class="card col-md-10 offset-md-1">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Subcategory</h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($subcategory) ? route('subcategories.update',$subcategory->id) : route('subcategories.store') }}" enctype="multipart/form-data" method="POST">@csrf
                        {{ isset($subcategory) ? method_field('PUT') : null }}
                        <div class="form-group">
                            <label for="name">Subcategory Name</label>
                            <input type="text" value="{{ $subcategory->name ?? Old('name') }}" class="form-control" id="name" name="name" placeholder="Category Name">
                            @error('name')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Owner Category</label>
                            <select class="select2-single form-control" name="category_id" id="category">
                                @foreach(\App\Category::all() as $category)
                                    <option {{ (isset($categoryid) && $categoryid==$category->id) || isset($subcategory) && $subcategory->category->id==$category->id ? 'selected' : null }} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">{{isset($subcategory) ? 'Edit!' : 'Save!'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
