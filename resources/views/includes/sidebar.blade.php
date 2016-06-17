<div id="mySidenav" class="sidenav">
    <ul class="">
        @can('Applicant')
            <li class="nav-link"><a href="{{url('CV',[$CV->id,'edit'])}}">Tạo CV mới</a></li>
            <li class="nav-link"><a href="{{url('CV',[$CV->id])}}">Xem CV</a></li>
            <li class="nav-link"><a href="{{url('CV',[$CV->id,'view'])}}">Xem CV 2</a></li>
        @endcan
        @can('Visitor')
            <li class="bookmark-link">
                <div style="display: table;width:90%; ">
                    <a href="#" style="display: table-cell;width: auto;">
                        Bookmark
                    </a>
                    <a data-action="reload" style="display: table-cell;color:gray;width: 10%;" class="moving">
                        <i class=" fa fa-refresh"></i>
                    </a>
                </div>
            </li>
            @foreach($list as $item)
                <li class="track-list">
                    <label style="display: table;width:100%;">
                        <span style="display: table-cell;width: 30px;"></span>
                        <a href="{{url('CV',[$item->id])}}"
                           style="display: table-cell; ">{{$item->Last_name}} {{$item->First_name}}</a>
                        <input data-action="deleteBookmark" data-bookmark-id="{{$item->user_id}}"
                               class="plus-button" type="button" style="display: table-cell;font-size: 20px;" value="-">
                    </label>
                </li>
            @endforeach
            <li class="active nav-link"><a href="{{url('CV')}}">Danh sách CV</a>
            </li>
        @endcan
        <li class="nav-link">
            <a href="{{url('User',[Auth::User()->id])}}">Cài đặt</a>
        </li>
    </ul>
</div>