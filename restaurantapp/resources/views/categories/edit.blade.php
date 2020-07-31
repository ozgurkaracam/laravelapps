@extends('layouts.app')
@section('content')
    <div class="container container-fluid">
        <div class="card">
            <div class="card-header">
                Edit Category
            </div>
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <form action="{{route('categories.update',$category->id)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <label for="categoryname">Category Name</label>
                        <input type="text" name="name" id="categoryname" class="form-control container-fluid" value="{{$category->name}}" />
                        <button class="btn btn-primary btn-lg mt-2">Save</button>
                    </form>
                </div>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
