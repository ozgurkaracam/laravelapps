@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($orders as $order)
            @php $order=unserialize($order->cart) @endphp
            {{$order}}
            @endforeach
    </div>
    @endsection
