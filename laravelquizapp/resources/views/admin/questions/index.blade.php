@extends('backend.master')

@section('content')
    @php
    if(session('success'))
        \RealRashid\SweetAlert\Facades\Alert::success('Success!',session('success'));
    @endphp
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>{{$quiz->name ?? ''}} Questions</h3>
                </div>
                <div class="module-body">
                    <a href="{{isset($quiz->id) ? route('questions.create.quiz',$quiz->id) : route('questions.create')}}" style="margin-bottom: 10px" class="btn btn-success mb-2">Create New Question</a>
                    @if($questions->count()>0)
                        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Answers</th>
                                @if(!isset($quiz))
                                    <th>Quiz Name</th>
                                @endif
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $key=>$question)
                                <tr class="gradeA">
                                    <td>{{$key+1}}</td>
                                    <td>{{$question->question}}</td>
                                    <td>{{$question->answers()->count()}}</td>
                                    @if(!isset($quiz))
                                        <td>{{$question->quiz->name}}</td>
                                        @endif
                                    <td class="center">
                                        <a href="{{route('questions.edit',$question->id)}}" class="btn btn-info">Edit</a>
                                    </td>
                                    <td class="center">
                                        <form action="{{route('questions.destroy',$question->id)}}" method="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                        </table>
                        @else
                    <h2>No Questions</h2>
                        @endif
                </div>
            </div>
        </div>
    </div>
    @endsection
