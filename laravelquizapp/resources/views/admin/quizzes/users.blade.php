@extends('backend.master')

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>Quiz's Users</h3>
                </div>
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Users</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $key=>$quiz)
                            <tr class="gradeA">
                                <td>{{$key+1}}</td>
                                <td>{{$quiz->name}}</td>
                                <td>{{$quiz->description}}</td>
                                <td class="center">
                                    <ul>
                                        @foreach($quiz->users as $user)
                                            <li>{{$user->name}}

                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="center">
                                    <a href="{{route('quiz.users',$quiz->id)}}" class="btn btn-info" style="display:block; margin-top:auto">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
