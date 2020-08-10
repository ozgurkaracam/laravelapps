@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Your Orders
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <td>Order Id</td>
                        <td>Products</td>
                        <td>Total Price</td>
                    </tr>
                    @foreach($orders as $order)
                        @php $cart=unserialize($order->cart) @endphp

                        <tr>
                            <td>{{$order->id}}</td>
                            <td>
                                @foreach($cart->items as $item)
                                    <p>{{$item->name}} <b>{{$item->qty}} Count</b> {{ $item->qty*$item->price }} ₺</p>

                                    @endforeach

                            </td>
                            <td>
                                {{$cart->totalprice}} ₺
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
            <div class="card-footer">
                <a href="/home" class="btn btn-success">Back Home!</a>
            </div>
        </div>
    </div>
    @endsection
