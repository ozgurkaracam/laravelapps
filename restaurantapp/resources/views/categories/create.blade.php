@extends('layouts.app')
@section('content')
    <div class="container container-fluid">
        <div class="card">
            <div class="card-header">
                Create Category
            </div>
            <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <form action="{{route('categories.store')}}" method="POST">
                            @csrf
                            <label for="categoryname">Category Name</label>
                            <input type="text" name="name" id="categoryname" class="form-control container-fluid" placeholder="type category name.." />
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
