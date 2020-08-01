@extends('backend.master')

@section('content')
    <div class="span9">
        <div class="module">
            <div class="module-head">
                <h3>{{$edit ?? '' ? 'Edit' : 'Create'}} Quiz</h3>
            </div>
            <div class="module-body">
                <form class="form-horizontal row-fluid" action="{{isset($quiz) ? route('quizzes.update',$quiz->id) : route('quizzes.store')}}" method="POST">
                    @csrf
                    {{ isset($quiz) ? method_field('PUT') : method_field('POST') }}
                    <div class="control-group">
                        <label class="control-label" for="name">Quiz Name</label>
                        <div class="controls">
                            <input type="text" id="name" name="name" value="{{isset($quiz) ? $quiz->name : Old('name')}}" placeholder="Quiz Name" class="span8">
                            @error('name')<br>
                                <span class="help-inline">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description">Quiz Description</label>
                        <div class="controls">
                            <textarea class="span8" rows="5" name="description" id="description" placeholder="Description">{{isset($quiz) ? $quiz->description : Old('description')}}</textarea>
                            @error('description')<br>
                            <span class="help-inline">{{$message}}</span>
                            @enderror
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
    @endsection
