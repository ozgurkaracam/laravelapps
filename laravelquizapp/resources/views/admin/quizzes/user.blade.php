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
                    <h3>{{$quiz->name}} Users</h3>
                </div>
                <div class="module-body">
                    Users
                    <ul>
                        @foreach($quiz->users as $user)
                            <li>
                                {{$user->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="module-body table">
                    <form action="{{route('quiz.update.users',$quiz->id)}}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Select</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\User::all() as $key=>$user)
                                <tr class="gradeA">
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <div class="control-group">
                                            <label class="control-label" for="{{$key}}">Select</label>
                                            <div class="controls">
                                                <label class="checkbox">
                                                    <input type="checkbox" id="{{$key}}"  {{ $quiz->users->find($user->id)!=null ? 'checked' : null }} name="users[]" value="{{$user->id}}">
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
