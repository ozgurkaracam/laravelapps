@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Quizzes</h1>
    <div class="row">

            <div class="col-md-6">
                <div class="card mb-2">
                    <div class="card-header bg-success text-light">Your Not Completed Quizzes</div>

                    <div class="card-body">
                        @foreach($quizzes as $quiz)
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{$quiz->name}}
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Description : {{$quiz->description}}</li>
                                        <li class="list-group-item">Duration : {{$quiz->duration}} Min</li>
                                        <li class="list-group-item">Questions : {{$quiz->questions->count()}}</li>
                                    </ul>

                                </div>
                                <div class="card-footer">
                                    <a href="{{route('start.quiz',$quiz->id)}}" class="btn btn-success">Start Quiz</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header  bg-info text-light">Your Completed Quizzes</div>

                    <div class="card-body">
                        @foreach($completedQuizzes as $quiz)
                            <div class="card mb-2">
                                <div class="card-header">
                                    {{$quiz->name}}
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Description : {{$quiz->description}}</li>
                                        <li class="list-group-item">Duration : {{$quiz->duration}} Min</li>
                                        <li class="list-group-item">Questions : {{$quiz->questions->count()}}</li>
                                        <li class="list-group-item">Correct Answers : {{count(\Illuminate\Support\Facades\Auth::user()->correctAnswers($quiz->id)) }}</li>
                                    </ul>
                                    <a href="{{route('quiz.results',[$quiz->id,Auth::user()->id])}}" class="btn btn-primary">See Results</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

    </div>
</div>
@endsection
