@extends('xCV.template')
<title>Chỉnh sửa thông tin người dùng</title>
<!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/uploadCV.css') }}"/-->
@section('content')

    <?php $key = $user->id;?>
    <form action="/User/{{$key}}/update" method="get" class="my-forms" id="profile-forms">
        <fieldset id="field-box">
            <div class=" float_left" style="width: 30%;">
                @include('xUser.profile')
            </div>
            <div class=" float_left" style="width: 60%;  ">

                <label slide-header="true">Thay đổi mật khẫu </label>
                <ul slide-toggle=true>
                    <li class="bottom_20px">
                        <div class="float_right" style="width: 80%;">
                            <label class="label" for="password">Password </label>
                            <div class="input">
                                <label class="icon-right" for="Password">
                                    <i class="fa fa-edit"></i>
                                </label>
                                <input type="password" class="input-right" placeholder="Password" name="old_password" disabled>
                            </div>
                        </div>

                    </li>
                    <li class="bottom_20px">
                        <div class="float_right" style="width: 80%;">
                            <label class="label" for="password">New Password </label>
                            <div class="input">
                                <label class="icon-right" for="Password">
                                    <i class="fa fa-edit"></i>
                                </label>
                                <input type="password" class="input-right" placeholder="Password" name="new_password" disabled>
                            </div>
                        </div>

                    </li>
                    <li class="bottom_20px">
                        <div class="float_right" style="width: 80%;">
                            <label class="label" for="password_confirmation">Confirm Password </label>
                            <div class="input">
                                <label class="icon-right" for="password_confirmation">
                                    <i class="fa fa-edit"></i>
                                </label>
                                <input type="password" class="input-right" placeholder="Confirm Password" disabled
                                       name="password_confirmation">
                            </div>
                        </div>

                    </li>
                </ul>
                <ul>
                    <li>
                        <input type="submit" form="profile-forms" name="submit1" value="Thay đổi"
                               class="float_right b-purple">
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
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>


    </form>



@stop