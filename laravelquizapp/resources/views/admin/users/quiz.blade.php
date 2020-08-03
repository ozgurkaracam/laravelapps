@extends('backend.master')

@section('content')
    @php
        if(session('message'))
        \RealRashid\SweetAlert\Facades\Alert::success('message',session('message'));
    @endphp
    <div class="span8">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>{{$user->name}} Exams</h3>
                </div>
                <div class="module-body">
                    Exams
                    <ul>
                        @foreach($user->quizzes as $quiz)
                            <li>
                                {{$quiz->name}}
                            </li>
                            @endforeach
                    </ul>
                </div>
                <div class="module-body table">
                    <form action="{{route('user.update.quizzes',$user->id)}}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Quiz Name</th>
                            <th>Select</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Quiz::all() as $key=>$quiz)
                            <tr class="gradeA">
                                <td>{{$key+1}}</td>
                                <td>{{$quiz->name}}</td>
                                <td>
                                                                    <div class="control-group">
                                                                        <label class="control-label" for="{{$key}}">Select</label>
                                                                        <div class="controls">
                                                                            <label class="checkbox">
                                                                                <input type="checkbox" id="{{$key}}"  {{ $user->quizzes->find($quiz->id)!=null ? 'checked' : null }} name="quizzes[]" value="{{$quiz->id}}">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="control-group" style="display: block; justify-content: right; text-align: right; padding: 10px;">
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Save Exams!</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>

    @endsection
