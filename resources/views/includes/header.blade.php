<body>
<div class="header">
    <div class="top">
        <div class="toptext">
            <a href="">
				<span style="color: #8A2BE2;" class="">
				</span>
                Rirekisho </a>
        </div>

    </div>
    <div class="clr"></div>
    <div class="navbar"><!-- jquery nav bar-->
        <div class="nav_area">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="float_right nav navbar-nav">
                        <li><a href="{{url('CV')}}">Trang chủ</a></li>
                        @can('Admin')
                            <li><a href="{{url('User')}}">User</a></li>
                            <li><a href="{{url('positions')}}">Positions</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Email
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="{{url('emails/create')}}">Send email</a></li>
                                  <li><a href="{{url('groups')}}">Group email</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('Applicant')
                            <li><a href="{{url('CV',[$CV->id])}}">Xem CV</a></li>
                            <li><a href="{{url('CV',[$CV->id,'view'])}}">Xem CV 2</a></li>
                            <li><a href="{{url('CV',[$CV->id,'edit'])}}">Tạo CV mới</a></li>
                        @endcan
                        @can('Visitor')
                            <li class="active"><a href="{{url('CV')}}">Danh sách CV<span
                                            class="sr-only">(current)</span></a></li>
                        @endcan
                        <li><a href="{{url('about')}}">About</a></li>
                        <li><a href="{{url('User',[Auth::User()->id])}}">Cài đặt</a></li>
                        <li><a href="{{url('auth/logout')}}">Đăng xuất</a></li>
                        <li><a> Hello {{Auth::User()->name}}</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->


            </div><!-- /.container-fluid -->
        </div>
        <div class="clr"></div>
        <div class="warning-box" style=""> <!-- jquery nav bar-->
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <div notification="true" class="">

                    <span>There must be some error while loading this page. Please <a href="." class="normal_color">refresh! </a>
                        </span>
                    </div>
                </div><!-- /.navbar-collapse -->
                </nav>

            </div>

        </div>
    </div>
    <!--hr /-->
</div>

</body>
</html>
