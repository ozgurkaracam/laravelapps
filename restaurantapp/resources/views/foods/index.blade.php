@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="py-2 d-inline">
                <div class="d-flex justify-content-start">
                    <h1>Foods</h1>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <a href="{{ route('foods.create')  }}" class="btn btn-primary">Add New Food</a>
                </div>
        </div>
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Food Name</th>
                <th scope="col">Food Description</th>
                <th scope="col">Food Price</th>
                <th scope="col">Food Category</th>
                <th scope="col">Food Image</th>
                <th scope="col">Edit | Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($foods as $food)
            <tr>
                <th scope="row">{{$food->id}}</th>
                <td>{{$food->name}}</td>
                <td>{{$food->description}}</td>
                <th scope="col">{{$food->price}}</th>
                <th scope="col">{{$food->category->name}}</th>
                <th scope="col" style="max-width: 400px;"><img src="/images/{{$food->image}}" class="img-fluid" alt="{{$food->name}}"></th>
                <td>
                    <a href="{{route('foods.edit',$food->id)}}">
                        <button class="btn btn-info"><i class="fa fa-edit"></i></button>
                    </a>

                    <form class="d-inline" action="{{route('foods.destroy',$food->id)}}" method="post">@csrf
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>

                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    @endsection
