@extends('backend.master')

@section('content')
    @php
        if(session('message'))
        \RealRashid\SweetAlert\Facades\Alert::success('message',session('message'));
    @endphp
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>Users</h3>
                </div>
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Admin</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $key=>$user)
                            <tr class="gradeA">
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->is_admin==1 ? 'Yes' : 'No'}}</td>
                                <td class="center">
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info">Edit</a>
                                </td>
                                <td class="center">
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
