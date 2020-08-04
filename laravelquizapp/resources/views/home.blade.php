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
                                    <li>Description : {{$quiz->description}}</li>
                                    <li>Duration : {{$quiz->duration}} Min</li>
                                    <li>Questions : {{$quiz->questions->count()}}</li>
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
