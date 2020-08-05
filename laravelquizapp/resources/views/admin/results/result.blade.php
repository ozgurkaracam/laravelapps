@extends('backend.master')

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                    <div class="module-head">
                        <div><h3>{{$user->name}} 's <b>{{$quiz->name}}</b> Exam Results</h3></div>
                    </div>
                    <div class="module-body">
                        @foreach($quiz->questions as $keyy=>$question)
                            <div class="card mb-2" style="margin-bottom:8px">
                                <div class="card-header">
                                    <b>{{$keyy+1}}-) </b>{{$question->question}}
                                </div>
                                <div class="card-body">
                                    <div class="col-md-6 offset-md-3">
                                        <ul class="list-group">
                                            @foreach($question->answers as $key=>$answer)
                                                <li class="list-group-item">{{$answer->answer}} <span class="float-right"><b>{{ $answer->is_correct ? "Correct Answer" : null }}</b></span></li>
                                            @endforeach
                                        </ul>
                                        <div class="{{ $user->answerquestion($question->id) && $user->answerquestion($question->id)->is_correct ? 'bg-success' : 'bg-danger' }} p-2 my-2">
                                            {{$user->name}}'s Answer is : {{ $user->answerquestion($question->id)->answer ?? 'EMPTY' }}
                                            {{$user->answerquestion($question->id)->is_correct ? 'CORRECT' : 'WRONG!'}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
@endsection
