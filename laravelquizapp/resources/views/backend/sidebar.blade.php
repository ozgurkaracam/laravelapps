<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">
                    <ul class="widget widget-menu unstyled">
                        <li class="active"><a href="{{url('admin')}}"><i class="menu-icon icon-dashboard"></i>Home
                            </a></li>
                        <li><a href="{{route('quizzes.index')}}"><i class="menu-icon icon-bullhorn"></i>All Quizzes<b class="label green pull-right">
                                {{\App\Quiz::all()->count()}}</b> </a>
                        </li>
                        <li><a href="{{route('quizzes.create')}}"><i class="menu-icon icon-inbox"></i>Create Quiz  </a></li>
                    </ul>
                    <!--/.widget-nav-->


                    <ul class="widget widget-menu unstyled">
                        <li><a href="{{route('questions.index')}}"><i class="menu-icon icon-bold"></i> All Questions<b class="label green pull-right">
                                    {{\App\Question::all()->count()}}</b> </a></li>

                        <li><a href="{{ route('questions.create') }}"><i class="menu-icon icon-book"></i> Create Question </a></li>
{{--                        <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>--}}
{{--                        <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>--}}
{{--                        <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>--}}
                    </ul>
                    <ul class="widget widget-menu unstyled">
                        <li><a href="{{route('users.index')}}"><i class="menu-icon icon-book"></i> <b class="label green pull-right">
                                    {{\App\User::all()->count()}}</b>All Users</a></li>
                        <li><a href="{{route('users.create')}}"><i class="menu-icon icon-book"></i>User Create</a></li>
                        <li><a href="{{route('users.quizzes')}}"><i class="menu-icon icon-book"></i>User - Quizzes</a></li>
                        <li><a href="{{route('quizzes.users')}}"><i class="menu-icon icon-book"></i>Quiz - Users</a></li>
                    </ul>

                    <ul class="widget widget-menu unstyled">
                        <li><a href="{{route('users.results')}}"><i class="menu-icon icon-book"></i>User Results</a></li>
                    </ul>
                    <!--/.widget-nav-->
{{--                    <ul class="widget widget-menu unstyled">--}}
{{--                        <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">--}}
{{--                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">--}}
{{--                                </i>More Pages </a>--}}
{{--                            <ul id="togglePages" class="collapse unstyled">--}}
{{--                                <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>--}}
{{--                                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>--}}
{{--                                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>--}}
{{--                    </ul>--}}
                </div>
                <!--/.sidebar-->
            </div>
