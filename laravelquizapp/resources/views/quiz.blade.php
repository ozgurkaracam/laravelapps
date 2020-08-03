@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <quiz :quiz="{{$quiz}}" :questions="{{$quiz->questions()->with('answers')->get()}}"></quiz>
{{--            $quiz->questions()->with('answers')->get()--}}
        </div>
    </div>
    @endsection
