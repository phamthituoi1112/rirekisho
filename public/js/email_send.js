$(document).ready(function () {
    
    var url = '/rirekisho1/public';
    $('.status').on('click', '.btn-send-email',function(){
    //$('.btn-send-email').click(function(){
        //var id = $(this).children('#id').val();
        var type = $(this).val();
        var email = $(this).prev('#email').val();
        
        data = {
            type: type,
            email: email
        };
        
        $.ajax({
                type: 'POST',
                url: url + '/emails/createFormEmail',
                data: data,
                success: function (data) {     
                    $('#modal-content').html(data);
                    
                    $('#myModal').modal('show');
                }
            });
    });
});

