
  
    @if(!$count)
    <tr class= "no-record">
      <td colspan="5"><center>There are no records to display</center></td>
    </tr>
    @else
    @foreach ($users as $row)
    <tr class="data">
      <td class="image"><a href=""><img
        src="http://i.forbesimg.com/media/lists/people/bill-gates_100x100.jpg"
        alt=""></a>
      </td>
      <td class="rank">{{ $row->id }}</td>
      <td class="name"><a href="{{url('User',$row->id)}} ">{{ $row->name }} </a> </td>
      <td class="name">{{ $row->email }}  </td>
      <td> {{ $row->getRole() }}</td>
      <td><a href="{{url('User',[$row->id,'edit'])}}">Sửa</a></td>
    </tr>
    @endforeach
    <tr id="number-result" style="display: none;">
      <td colspan="5">Có {{$count }} kết quả  </td>
    </tr>
    @endif
 

