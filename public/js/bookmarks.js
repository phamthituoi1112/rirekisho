$(document).ready(function () {
    var url = '/rirekisho1/public';
    
    //click bookmark 
    $("#bookmark").click(function (e) {    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();

        var formData = {
            cv_id: $("#cv_id").val(),
            visitor_id: $("#visitor_id").val()
        };
        
        var my_url = url + '/CV/bookmark';
        
        $.ajax({
            type: 'POST',
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if(data == true) {
                    var bookmark = '<div style="color: darkorange">';
                    bookmark += '<span class="glyphicon glyphicon-bookmark" ';
                    bookmark += 'style="font-size: 50px"></span></div>';
                }
                else {
                    var bookmark = '<div style="color: darkgrey">';
                    bookmark += '<span class="glyphicon glyphicon-bookmark" ';
                    bookmark += 'style="font-size: 50px"></span></div>';
                }
                $('#bookmark').html(bookmark);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    
    //click bookmark 
    $("#tag-bookmark").click(function (e) {    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();
        
        var cv_id = $(this).children('#id').val();

        var formData = {
            cv_id: cv_id,
            visitor_id: $("#visitor_id").val()
        };
        
        var my_url = url + '/CV/bookmark';
        
        $.ajax({
            type: 'POST',
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#CV' + cv_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});