@extends('backend.master')
@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>
                        Quizzes
                    </h3>
                    @php
                        if(session('success'))
    \                          RealRashid\SweetAlert\Facades\Alert::success('Success',session('success'))
                        @endphp



                </div>
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Quiz Name</th>
                            <th>Quiz Description</th>
                            <th>Questions</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $key=>$quiz)
                        <tr class="gradeA">
                            <td>{{$key+1}}</td>
                            <td>{{$quiz->name}}</td>
                            <td>{{$quiz->description}}</td>
                            <td>{{$quiz->questions()->count()}}
                                <a href="{{route('quizzes.questions',$quiz->id)}}" class="btn btn-success">See Questions</a>
                            </td>
                            <td class="center">
                                <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-info">Edit</a>
                            </td>
                            <td class="center">
                                <form action="{{route('quizzes.destroy',$quiz->id)}}" method="POST">
                                    @csrf
                                    {{method_field('DESTROY')}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
