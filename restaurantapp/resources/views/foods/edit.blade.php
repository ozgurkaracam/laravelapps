@extends('layouts.app')
@section('content')
    <div class="container container-fluid">
        <div class="card">
            <div class="card-header">
                Create Food
            </div>
            <div class="card-body">
                <form action="{{route('foods.update',$food->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">

                        @csrf
                        <label for="categoryname">Food Name</label>
                        <input type="text" name="name" id="categoryname" class="form-control container-fluid" value="{{$food->name}}" placeholder="type category name.." />


                    </div>
                    <div class="form-group">
                        <label for="fooddesc">Food Description</label>
                        <input type="text" name="description" id="fooddesc" class="form-control container-fluid" value="{{$food->description}}" placeholder="Food Description" />
                    </div>
                    <div class="form-group">
                        <label for="foodprice">Food Price</label>
                        <input type="text" name="price" id="foodprice" class="form-control container-fluid" value="{{$food->price}}" placeholder="Food Price" />
                    </div>
                    <div class="form-group">
                        <label for="foodcategory">Food Category</label>
                        <select name="category" id="foodcategory" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category==$food->category) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Food Image</label>
                        <img src="/images/{{$food->image}}" alt="" class="img-fluid">
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-lg mt-2">Save</button>
                </form>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
