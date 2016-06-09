@extends('emails.template')

@section('content')
@if($errors->any())
<ul class="danger">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

    <div class="panel">
        <div class="panel panel-heading">
            Send email 1
        </div>
        <div class="panel panel-body">
            <form method="post" action="{{ url('emails/sendEmail1') }}">
            <div class="form-group">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control" type="email" placeholder="Recipient's email address"/>       
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject"/>
                </div>
                <hr>
                Xin hen ban<br>
                Ngay<br>
                <input type="date" class="form-control" name="date"/><br>
                Vao luc<br>
                <input type="time" class="form-control" name="time"/><br>
                Tai<br>
                <input class="form-control" name="address"/><br>
                Len abcxyz<br/>
            </div>
            <button class="btn btn-primary" name="sendMail">Send mail</button>
            </form>
        </div>
    </div>
@endsection