@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="py-2 d-inline">
                <div class="d-flex justify-content-start">
                    <h1>Categories</h1>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <a href="{{ route('categories.create')  }}" class="btn btn-primary">Add New Category</a>
                </div>
        </div>
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Food Count</th>
                <th scope="col">Edit | Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->foods->count()}}</td>
                <td>
                    <a href="{{route('categories.edit',$category->id)}}">
                        <button class="btn btn-info"><i class="fa fa-edit"></i></button>
                    </a>

                    <form class="d-inline" action="{{route('categories.destroy',$category->id)}}" method="post">@csrf
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>

                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
