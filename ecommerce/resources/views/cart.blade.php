@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                    @foreach(\Illuminate\Support\Facades\Session::get('cart')->items as $key=>$item)
                        <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td><img src="/images/{{$item->image}}" width="100" alt="{{$item->name}}"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->price}}</td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
            <div class="card-footer d-flex justify-content-between">
                <div class="d-flex"><a href="{{route('home')}}" class="btn btn-primary">Back Home</a></div>
                <div class="d-flex">Total Price : {{ \Illuminate\Support\Facades\Session::get('cart')->totalprice }} ₺</div>
                <div class="d-flex"><a href="#" class="btn btn-success">Finish!</a></div>
            </div>
        </div>
    </div>
    @endsection
