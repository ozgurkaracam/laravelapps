@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Your Quizzes</h1>
            <div class="card mb-2">
                <div class="card-header">Your Not Completed Quizzes</div>

                <div class="card-body">
                    @foreach($quizzes as $quiz)
                        <div class="card mb-3">
                            <div class="card-header">
                                {{$quiz->name}}
                            </div>
                            <div class="card-body">
                                <li>Description : {{$quiz->description}}</li>
                                <li>Duration : {{$quiz->duration}} Min</li>
                                <li>Questions : {{$quiz->questions->count()}}</li>

                            </div>
                            <div class="card-footer">
                                <a href="{{route('start.quiz',$quiz->id)}}" class="btn btn-success">Start Quiz</a>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
            <div class="card">

                <div class="card-header">Your Completed Quizzes</div>

                <div class="card-body">
                    @foreach($completedQuizzes as $quiz)
                        <div class="card mb-2">
                            <div class="card-header">
                                {{$quiz->name}}
                            </div>
                            <div class="card-body">
                                <li>Description : {{$quiz->description}}</li>
                                <li>Duration : {{$quiz->duration}} Min</li>
                                <li>Questions : {{$quiz->questions->count()}}</li>
                                <a href="{{route('start.quiz',$quiz->id)}}" class="btn btn-success">Start Quiz</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
