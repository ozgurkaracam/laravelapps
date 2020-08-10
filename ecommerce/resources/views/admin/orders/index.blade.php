@extends('admin.layouts.app')

            @section('content')
                <div class="container-fluid" id="container-wrapper">

                    <div class="col-lg-12">
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $user->name ?? '' }} Orders</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                <tr>
                                    <td>Order Id</td>
                                    <td>User Mail</td>
                                    <td>User Name</td>
                                    <td>Products</td>
                                    <td>Total Price</td>
                                    <td>Time</td>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <td>Order Id</td>
                                    <td>User Mail</td>
                                    <td>User Name</td>
                                    <td>Products</td>
                                    <td>Total Price</td>
                                    <td>Time</td>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($orders as $order)
                                    @php $cart=unserialize($order->cart) @endphp

                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>
                                            {{$order->user->email}}
                                        </td>
                                        <td>
                                            {{$order->user->name}}
                                        </td>
                                        <td>
                                            @foreach($cart->items as $item)
                                                <p><a href="{{ route('getProduct',$item->id) }}">{{$item->name}}</a> <b>{{$item->qty}} Count</b> {{ $item->qty*$item->price }} ₺</p>

                                            @endforeach

                                        </td>

                                        <td>
                                            {{$cart->totalprice}} ₺
                                        </td>
                                        <td>
                                            {{$order->created_at}}
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
