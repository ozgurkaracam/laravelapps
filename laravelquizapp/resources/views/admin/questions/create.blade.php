@extends('backend.master')

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>
                        Question Create
                    </h3>
                </div>
                <div class="module-body">
                    <form class="form-horizontal row-fluid" action="{{route('questions.store')}}" method="POST">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="question">Question</label>
                            <div class="controls">
                                <textarea class="span8" rows="5" id="question" name="question"></textarea>
                            </div>
                        </div>
                        <div class="text-center font-weight-bold">
                            <span>Answers</span>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="optiona">Option A</label>
                            <div class="controls">
                                <input type="text" name="answer[]"  id="optiona" placeholder="Option A" class="span8">
                                <span class="help-inline"><input type="radio" name="correct_answer" id="optionsRadios1" value="0">
													Correct Answer</span>
                            </div>
                            <label class="control-label" for="optionb">Option B</label>
                            <div class="controls">
                                <input type="text" name="answer[]"  id="optionb" placeholder="Option B" class="span8">
                                <span class="help-inline"><input type="radio" name="correct_answer" id="optionsRadios1" value="1">
													Correct Answer</span>
                            </div>
                            <label class="control-label" for="optionc">Option C</label>
                            <div class="controls">
                                <input type="text" name=answer[]" id="optionc" placeholder="Option C" class="span8">
                                <span class="help-inline"><input type="radio" name="correct_answer" id="optionsRadios1" value="2">
													Correct Answer</span>
                            </div>
                            <label class="control-label" for="optiond">Option D</label>
                            <div class="controls">
                                <input type="text" name="answer[]"  id="optiond" placeholder="Option D" class="span8">
                                <span class="help-inline"><input type="radio" name="correct_answer" id="optionsRadios1" value="3">
													Correct Answer</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="quiz">Quiz</label>
                            <div class="controls">
                                <select tabindex="1" data-placeholder="Select here.." name="quiz" id="quiz" class="span8">
                                    @foreach($quizzes as $quiz)
                                    <option value="{{$quiz->id}}">{{$quiz->name}}</option>
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
                </div>
            </div>
        </div>
    </div>
    @endsection
