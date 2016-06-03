@extends('emails.template')

@section('content')
<!--<script src="{{ url('jquery-textext-master/src/js/textext.core.js')}}" type="text/javascript" charset="utf-8"></script> 
<script src="{{ url('jquery-textext-master/src/js/textext.plugin.autocomplete.js') }}" type="text/javascript" charset="utf-8"></script> 
<script src="{{ url('jquery-textext-master/src/js/textext.plugin.tags.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ url('jquery-textext-master/src/js/textext.plugin.ajax.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ url('jquery-textext-master/src/js/textext.plugin.prompt.js') }}" type="text/javascript" charset="utf-8"></script> 
<script src="{{ url('jquery-textext-master/src/js/textext.plugin.focus.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ url('jquery-textext-master/src/js/textext.plugin.arrow.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $('#recipient').textext({
        plugins : 'tags prompt focus autocomplete ajax arrow',
        ajax : {
            url : '/rirekisho1/public/emails/getEmailAddress',
            type: 'POST',
            dataType : 'json',
            cacheResults : false
        },
        autocomplete: {
            enable: 'true',
            dropdown : {
                position : 'above',
                maxHeight : '60px'
            }
        }
    });
</script>-->

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
        <textarea id="recipient" name="recipient" class="form-control" rows="1" placeholder="Add one..."></textarea>
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
@endsection