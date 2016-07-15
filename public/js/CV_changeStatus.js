$(document).ready(function () {
    var url = '';
    
    $('form.status').change(function () {
        var result = confirm("Want to change?");
        var stt = $(this).children('select.status').val();
        if (result)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                }
            });

            var data = {
                id: $(this).children('#id').val(),
                status: stt
            };
            $.ajax({
                type: 'POST',
                url: url + '/CV/changeStatus',
                data: data,
                dataType: 'json',
                success: function (data) {                    
                    $('#CV_status' + data.id).val(data.status);
                    var btn_send_email = '<button id="btn_send_email' + data.id;
                    if(stt!=1&&stt!=2&&stt!=4&&stt!=5){
                        btn_send_email += '" class="btn btn-primary btn-send-email disabled" value="';
                        btn_send_email += data.status + '">Send Email ';
                        btn_send_email += data.status + '</button>';
                    }
                    else{
                        btn_send_email += '" class="btn btn-primary btn-send-email" value="';
                        btn_send_email += data.status + '">Send Email ';
                        btn_send_email += data.status + '</button>';
                    }
                    
                    $('#btn_send_email' + data.id).replaceWith(btn_send_email);
                    alert('Success');
                }
            });
        } else
        {
            $(this).children('select.status').val($('#CV_status' + $(this).children('#id').val()).val());
        }
    });
});