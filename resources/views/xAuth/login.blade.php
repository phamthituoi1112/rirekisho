@extends('xAuth.begin')
<title>ﾄ?ﾄハg nh蘯ｭp</title>
@section('content')
    <!--div  class="page-title"><h3>T蘯｡o CV m盻嬖</h3></div-->

    <form id="login" class="form-horizontal my-forms "
          role="form" method="POST" action="/rirekisho1/public/auth/login">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <fieldset id="field-box">
            <ul>
                <li>
                    <h3 class="">ﾄ?ﾄハg nh蘯ｭp</h3>
                </li>
                <li>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>

                <li class="bottom_20px">
                    <div class="float_left" style="width: 80%;">
                        <label class="label" for="email">Email </label>
                        <div class="input">
                            <label class="icon-right" for="email">
                                <i class="fa fa-user"></i>
                            </label>
                            <input type="email" class="input-right" placeholder="Email" name="email"
                                   value="{{ old('email') }}">
                        </div>
                    </div>
                </li>
                <li class="bottom_20px">
                    <div class=" float_left" style="width: 80%;">
                        <label class="label" for="password">Password </label>
                        <div class="input">
                            <label class="icon-right" for="Password">
                                <i class="fa fa-lock"></i>
                            </label>
                            <input type="password" class="input-right" placeholder="Password" name="password">
                        </div>
                    </div>

                </li>
                <li class="bottom_20px">
                    <label class="checkbox">
                        <input type="checkbox" name="remember">
                        <i></i>
                        Remember me.
                    </label>
                </li>
                <div class="clr">
                    <li class="bottom_20px">
                        <input type="submit" form="login" name="submit" value="ﾄ?ﾄハg nh蘯ｭp" class="float_right b-purple">
                    </li>
                    <li class="bottom_20px">
                        ho蘯ｷc
                    </li>
                    <li class="bottom_20px">
                        <a href="{{url('auth/register')}}">ﾄ?ﾄハg kﾃｽ</a>
                    </li>
            </ul>

        </fieldset>

    </form>


@stop