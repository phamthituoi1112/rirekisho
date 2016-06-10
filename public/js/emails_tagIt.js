$(document).ready(function () {
    $("#recipient").tagit({
        singleField: true,
        singleFieldNode: $('#recipient'),
        allowSpaces: false,
        removeConfirmation: true,
        placeholderText: "Recipients",
        
        tagSource: function (request, response) {
            $.ajax({
                url: "/rirekisho1/public/emails/getEmailAddress",
                data: {term: request.term},
                dataType: "json",
                type: 'POST',
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            label: item.name + ': ' + item.email,
                            value: item.email
                        };
                    }));
                    
                }
            });
        }});
    });