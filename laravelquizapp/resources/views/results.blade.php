@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <div><h3>{{$user->name}} 's <b>{{$quiz->name}}</b> Exam Results</h3></div>
             @foreach($quiz->questions as $keyy=>$question)
                <div class="card mb-2">
                    <div class="card-header">
                        <b>{{$keyy+1}}-) </b>{{$question->question}}
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                            <ul class="list-group">
                                @foreach($question->answers as $key=>$answer)
                                    <li class="list-group-item">{{$answer->answer}} <span class="float-right font-weight-bold">{{ $answer->is_correct ? "Correct Answer" : null }}</span></li>
                                @endforeach
                            </ul>
                            <div class="{{ $user->answerquestion($question->id) && $user->answerquestion($question->id)->is_correct ? 'bg-success' : 'bg-danger' }} p-2 my-2">
                                Your Answer is : {{ $user->answerquestion($question->id)->answer ?? 'EMPTY' }}
                            </div>
                        </div>

                    </div>
                </div>
                 @endforeach
        </div>
    </div>
    @endsection
