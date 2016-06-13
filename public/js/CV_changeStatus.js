$(document).ready(function () {
    var url = '/rirekisho1/public';
    
    $('form.status').change(function () {
        var result = confirm("Want to change?");
        if (result)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                }
            });

            var data = {
                id: $(this).children('#id').val(),
                status: $(this).children('select.status').val()
            };
            $.ajax({
                type: 'POST',
                url: url + '/CV/changeStatus',
                data: data,
                dataType: 'json',
                success: function (data) {                    
                    $('#CV_status' + data.id).val(data.status);
                    var btn_send_email = '<button id="btn_send_email' + data.id;
                    btn_send_email += '" class="btn btn-primary btn-send-email" value="';
                    btn_send_email += data.status + '">Send Email ';
                    btn_send_email += data.status + '</button>';
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