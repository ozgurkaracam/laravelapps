@extends('backend.master')

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>User's Exams</h3>
                </div>
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Quizzes</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=>$user)
                        <tr class="gradeA">
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td class="center">
                                <ul>
                                @foreach($user->quizzes as $quiz)
                                    <li>{{$quiz->name}}

                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="center">
                                <a href="{{route('user.quizzes',$user->id)}}" class="btn btn-info" style="display:block; margin-top:auto">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
