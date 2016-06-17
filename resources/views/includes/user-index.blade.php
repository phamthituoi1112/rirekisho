@if(!$count)
    <tr class="no-record">
        <td colspan="5">
            <center>There are no records to display</center>
        </td>
    </tr>
@else
    @foreach ($users as $row)
        <tr class="data">
            <td class="image">
                <div style=" position: relative;height: 100px;width: 100px;">
                    @if($row->image!="")
                        <img style="height: 100px; width: 100px;"
                             src=<?php echo "/img/thumbnail/thumb_" . $row->image;?> >
                    @else
                        <div class="dropzone-text-place"
                             style="background-color:{{$row->getThemeColor()}} ">
                            <span class="dropzone-text letter-avatar"
                                  style="color: {{$row->getTextColor()}};">
                                {{substr(trim($row->name), 0, 1)}}
                            </span>
                        </div>
                    @endif
                </div>
            </td>
            <td class="rank">{{ $row->id }}</td>
            <td class="name"><a href="{{url('User',$row->id)}} ">{{ $row->name }} </a></td>
            <td class="name">{{ $row->email }}  </td>
            <td> {{ $row->getRole() }}</td>
            <td><a href="{{url('User',[$row->id,'edit'])}}">Sửa</a></td>
        </tr>
    @endforeach
    <tr id="number-result" style="display: none;">
        <td colspan="5">Có {{$count }} kết quả</td>
    </tr>
@endif
 

