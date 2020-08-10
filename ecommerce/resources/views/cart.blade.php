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
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                    @foreach($cart->items as $key=>$item)
                        <tr>
                    <th scope="row">{{$i++}}</th>
                    <td><img src="/images/{{$item->image}}" width="100" alt="{{$item->name}}"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->price}}</td>
                            <td>
                                <form action="{{route('deletetocart')}}" method="POST">@csrf
                                    <input type="hidden" name="productid" value="{{$key}}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
            <div class="card-footer d-flex justify-content-between">
                <div class="d-flex"><a href="{{route('home')}}" class="btn btn-primary">Back Home</a></div>
                <div class="d-flex">Total Price : {{ $cart->totalprice }} ₺</div>
                <div class="d-flex">Qty: {{$cart->totalqty}}</div>
                <div class="d-flex"><a href="{{ route('order',$cart->totalprice) }}" class="btn btn-success">Finish!</a></div>
            </div>
        </div>
    </div>
    @endsection
