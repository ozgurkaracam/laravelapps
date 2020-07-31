@extends('layouts.app')
@section('content')
    <div class="container container-fluid">
        <div class="card">
            <div class="card-header">
                Create Food
            </div>
            <div class="card-body">
                <form action="{{route('foods.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                            @csrf
                            <label for="categoryname">Food Name</label>
                            <input type="text" name="name" id="categoryname" class="form-control container-fluid" placeholder="type category name.." />


                    </div>
                    <div class="form-group">
                        <label for="fooddesc">Food Description</label>
                        <input type="text" name="description" id="fooddesc" class="form-control container-fluid" placeholder="Food Description" />
                    </div>
                    <div class="form-group">
                        <label for="foodprice">Food Price</label>
                        <input type="number" name="price" id="foodprice" class="form-control container-fluid" placeholder="Food Price" />
                    </div>
                    <div class="form-group">
                        <label for="foodcategory">Food Category</label>
                        <select name="category" id="foodcategory" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Food Image</label>
                        <input type="file" accept="image/*" name="image" id="image" class="form-control">
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
