@extends('backend.master')

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>
                        Question {{isset($question) ? 'Edit' : 'Create'}}
                    </h3>
                </div>
                <div class="module-body">
                    <form class="form-horizontal row-fluid" action="{{isset($question) ? route('questions.update',$question->id) : route('questions.store')}}" method="POST">
                        @csrf
                        {{ isset($question) ? method_field('PUT') : null }}
                        <div class="control-group">
                            <label class="control-label" for="question">Question</label>
                            <div class="controls">
                                <textarea class="span8" rows="5" id="question" name="question">{{ $question->question ?? Old('question') }}</textarea>
                            </div>
                        </div>
                        <div class="text-center font-weight-bold">
                            <span>Answers</span>
                        </div>
                        @for($i=0;$i<4;$i++)
                        <div class="control-group">
                            <label class="control-label" for="{{$i}}">Option {{$i+1}}</label>
                            <div class="controls">
                                <input type="text" name="answer[]" value="{{$question->answers[$i]->answer ?? Old('answer[{$i}]')}}"  id="{{$i}}" placeholder="Option {{$i+1}}" class="span8">
                                <span class="help-inline"><input type="radio" {{isset($question) && $question->answers[$i]->is_correct ? 'checked' : null}} name="correct_answer" id="optionsRadios1" value="{{$i}}">
													Correct Answer</span>
                            </div>
                            @endfor
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="quiz">Quiz</label>
                            <div class="controls">
                                <select tabindex="1" data-placeholder="Select here.." name="quiz" id="quiz" class="span8">
                                    @foreach($quizzes as $quiz)
                                    <option {{ isset($quizz) && $quizz->id==$quiz->id ? 'selected' : null }} value="{{$quiz->id}}" {{ isset($question) && $question->quiz == $quiz ? 'selected' : null}}>{{$quiz->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-primary">Save!</button>
                            </div>
                        </div>
                    </form>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
    @endsection
