
@if(!$CVs->count())
<tr class= "no-record">
    <td colspan="6"><center>There are no records to display</center></td>
</tr>
@else
<?php
$CVx = $CVs->reject(function ($item) {
    return $item->Name == null || $item->Age == "0000-00-00";
});

?>
@foreach ($CVx as $CV)
<tr class="data">
    <td class="image"><a href=""><img
                src="http://i.forbesimg.com/media/lists/people/bill-gates_100x100.jpg"
                alt=""></a>
    </td>
    <td class="rank">{{ $CV->id }}</td>
    <td class="name"><a href="{{url('CV',$CV->id)}} ">{{ $CV->Name }} </a> </td>
    <td class="name">{{ $CV->Furigana_name }}  </td>
    <td class="worth">{{$CV->j_gender}}</td>
    <td data-field="age">{{ $CV->Age }} 歳</td>
    <td></td>
    @can('Admin')
    <td>@include('includes._form_status',['CV' => $CV])</td>
    <td><a href="{{url('CV',[$CV->id,'edit'])}}">Sửa</a></td>
    @endcan
</tr>
@endforeach
<tr id="number-result" style="display: none;">
    <td colspan="6">Có {{$CVs->count() }} kết quả  </td>
</tr>
@endif

<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('form.status').change(function () {
        var result = confirm("Want to change?");
        if (result)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                }
            })

            var data = {
                id: $(this).children('#id').val(),
                status: $(this).children('select.status').val()
            };
            $.ajax({
                type: 'POST',
                url: 'CV/changeStatus',
                data: data,
                dataType: 'json',
                success: function (data) {
                    alert('Success');
//                    console.log(data);
//                    $(this).replaceWith(data);
//                    $(this).children('#CV_status').val(data.status);
                },
            });
        }
        else
        {
            $(this).children('select.status').val($(this).children('#CV_status').val());
        }
    });
});
</script>