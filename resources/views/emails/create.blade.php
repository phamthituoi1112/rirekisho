@extends('emails.template')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" action="{{ url('emails/send') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

    <div class="form-group">
        <label for="recipient" class="label label-default">Recipient: </label>
        <input name="recipient" id="recipient" class="form-control" placeholder="Recipient's email"/>
    </div>

    <div class="form-group">
        <label for="sender" class="label label-default">Sender: </label>
        <input name="sender" class="form-control" placeholder="Sender's name"/>
    </div>

    <div class="form-group">
        <label for="subject" class="label label-default">Subject: </label>
        <input name="subject" class="form-control" placeholder="Email's subject"/>
    </div>

    <div class="form-group">
        <label for="content" class="label label-default">Content: </label>
        <textarea name="content" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="attach" class="label label-default">Attach: </label>
        <input name="attach[]" class="form-control" type="file" multiple=""/>
    </div>

    <div class="form-group">
        <button name="sendMail" class="btn btn-primary">Send mail</button>
    </div>
</form>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{{ url('tag-it-master/js/tag-it.js') }}" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
<link href="{{ url('tag-it-master/css/jquery.tagit.css') }}" rel="stylesheet" type="text/css">

<script type="text/javascript">
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
</script>

@endsection