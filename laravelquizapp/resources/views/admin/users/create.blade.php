@extends('backend.master')

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head"> Create User </div>
                <div class="module-body">
                    <form class="form-horizontal row-fluid" method="POST" action="{{route('users.store')}}">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="name">Username</label>
                            <div class="controls">
                                <input type="text" id="name" name="name" placeholder="Type something here..." class="span9"><br>
                                @error('name')
                                <span class="help-inline">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="email">E-mail</label>
                            <div class="controls">
                                <input type="text" id="email" name="email" placeholder="Type something here..." class="span9">
                                <br>
                                @error('email')
                                <span class="help-inline">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="password">Password</label>
                            <div class="controls">
                                <input type="password" id="password" name="password" placeholder="Type something here..." class="span9">
                                <br>
                                @error('password')
                                <span class="help-inline">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="password_confirmation">Password Again</label>
                            <div class="controls">
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Type something here..." class="span9">
                                <br>
                                @error('password_confirmation')
                                <span class="help-inline">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Is Admin?</label>
                            <div class="controls">
                                <label class="radio inline">
                                    <input type="radio" name="is_admin" id="optionsRadios1" value="{{1}}" >
                                    Yes
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="is_admin" id="optionsRadios2" value="{{0}}" checked="">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Save!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @endsection
