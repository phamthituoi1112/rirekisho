@extends('xCV.template',['CV' => $CV])
<title>Tạo CV</title>
@section('content')
    <!--div  class="page-title"><h3>Tạo CV mới</h3></div-->
    <?php $key = $CV->id;?>
    <form action="" method="post" class="my-forms" id="j-forms-log" novalidate="novalidate">
        <fieldset id="field-box">
            <label slide-header=true> <div class="slide-header" > I. Thông tin cá nhân</div></label>
            <ul slide-toggle=true>

                <li class="">
                    <div class="float_left" style="width: 45%;">
                        <label class="label" for="name">Họ </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="Last_name" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->Last_name }}">

                            <div class="success-status float_left" id="s_Last_name_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>

                    </div>
                    <div class=" float_left" style="width: 50%;">
                        <label class="label" for="name">Tên </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="First_name" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->First_name }}">

                            <div class="success-status float_left" id="s_First_name_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="">
                    <div class="float_left" style="width: 45%;">
                        <label class="label" for="name">Tên bằng kana </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="Furigana_name"
                                   type="text" class="input-left float_left" placeholder="some text"
                                   value="{{ $CV->Furigana_name }}">

                            <div class="success-status float_left" id="s_Furigana_name_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="float_left" style="width: 20%; margin-top:30px;">

                        <div class="float_left">
                            <label for="gender0" class="radio"><input type="radio" id="gender0" editable="Rirekisho"
                                                                      name="Gender" value=0 <?php if (!$CV->Gender) {
                                    echo 'checked';
                                }?> ><i></i>Nữ</label>
                        </div>
                        <div class="float_right">
                            <label for="gender1" class="radio"><input type="radio" id="gender1" editable="Rirekisho"
                                                                      name="Gender" value=1 <?php if ($CV->Gender) {
                                    echo 'checked';
                                }?>><i></i>Nam
                            </label>
                        </div>

                    </div>
                </li>
                <li class="">
                    <div class="float_left" style="width: 45%;">
                        <label class="label" for="name">Ngày sinh(dd-mm-yy) </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" type="text" editable="Rirekisho" name="B_date"
                                   class="input-left float_left" style="width: 60%;" placeholder="some text"
                                   value="{{ $CV->Birthday }}">
                            <div class="success-status float_left" id="s_B_date_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class=" float_left" style="width: 50%;">
                        <label class="label" for="name">Điện thoại</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="Phone" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->Phone }}">

                            <div class="success-status float_left" id="s_Phone_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class="label" for="name">Địa chỉ</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Address" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->Address }}">

                            <div class="success-status float_left" id="s_Address_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class="label" for="name">Thông tin liên hệ</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Contact_information"
                                   type="text" class="input-left float_left" placeholder="some text"
                                   value="{{ $CV->Contact_information }}">

                            <div class="success-status float_left" id="s_Contact_information_{{$key}}"
                                 style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div>
                        <table class="table table-striped table-bordered editable-table table-reload" id="1_0"
                               style="width: 90%;"> <!-- id  = record + school-->
                            <thead>
                            <tr class="">
                                <th colspan="5">School history**</th>
                            </tr>
                            <tr class="">
                                <th style="width:7%;"> #</th>
                                <th style="width:13%;">Năm</th>
                                <th style="width:13%;">Tháng</th>
                                <th>Tên cơ sở giáo dục</th>
                                <th style="width:7%;">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="{{$key}}" data-response="1_0_1">
                            <?php
                            $School = $Records->filter(function ($item) {
                                return $item->getRole() == "School";
                            });
                            ?>
                            @if(!$School->count())
                                <tr class="no-record">
                                    <td colspan="5">
                                        <div style="text-align: center;">There are no records to display</div>
                                    </td>
                                </tr>
                            @else
                                <?php $i = 0;?>
                                @foreach ($School as $Record)
                                    <?php $r_id = $Record->id; ?>
                                    <tr id="{{$r_id}}">
                                        <td>{{++$i}}</td>


                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{getyear($Record->Date)}}</span>
                                            <input name="Year" class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;"
                                                   value="{{getyear($Record->Date)}}">
                                        </td>
                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{getMonth($Record->Date)}}</span>
                                            <input name="Month" class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;"
                                                   value="{{getMonth($Record->Date)}}">
                                        </td>
                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{$Record->Content}}</span>
                                            <input class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;" name="Content"
                                                   value="{{$Record->Content}}">
                                        </td>
                                        <td class="last">
                                            <input class="float_right plus-button" type="button" name="delete"
                                                   value="Xoá"/>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>


                            <tfoot>
                            <?php $r_id = $key;?>
                            <tr>
                                <td colspan="5" style="height:45px;">
                                    <input class="plus-button float_right" type="button" name="increase"
                                           value="+ Thêm"/>
                                </td>
                            </tr>
                            <tr class="first last odd" newrow="true" id="{{$r_id}}" data-react="1_0_1"
                                style="display:none;">
                                <td></td>
                                <td>
                                    <input name="Year" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input name="Month" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input type="text" id="cell_input_{{$r_id}}" style="height: 25px;"
                                           name="Content">
                                </td>
                                <td class="last">
                                    <input class="float_right plus-button" type="button" name="save" value="Lưu"/>
                                </td>
                            </tr>

                            </tfoot>
                        </table>

                    </div><!-- End table reload-->

                </li>


            </ul>
            <label slide-header=true> <div class="slide-header" > II. Thông tin tuyển dụng*</div>  </label>
            <ul slide-toggle=true>


                <li>
                    <div>
                        <table class="table table-striped table-bordered editable-table table-reload" id="1_1"
                               style="width: 90%;">
                            <thead>
                            <tr class="">
                                <th colspan="5">Lịch sử công việc</th>
                            </tr>
                            <tr class="">
                                <th style="width:7%;"> #</th>
                                <th style="width:13%;">Năm</th>
                                <th style="width:13%;">Tháng</th>
                                <th>Tên nơi làm việc </th>
                                <th style="width:7%;">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="{{$key}}" data-response="1_1_1">
                            <?php
                            $Work = $Records->filter(function ($item) {
                                return $item->getRole() == "Work";
                            });
                            ?>
                            @if(!$Work->count())
                                <tr class="no-record">
                                    <td colspan="5">
                                        <div style="text-align: center;">There are no records to display</div>
                                    </td>
                                </tr>
                            @else
                                <?php $i = 0;?>
                                @foreach ($Work as $Record)
                                    <?php $r_id = $Record->id; ?>
                                    <tr id="{{$r_id}}">
                                        <td>{{++$i}}</td>


                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{getyear($Record->Date)}}</span>
                                            <input name="Year" class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;"
                                                   value="{{getyear($Record->Date)}}">
                                        </td>
                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{getMonth($Record->Date)}}</span>
                                            <input name="Month" class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;"
                                                   value="{{getMonth($Record->Date)}}">
                                        </td>
                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{$Record->Content}}</span>
                                            <input class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;" name="Content"
                                                   value="{{$Record->Content}}">
                                        </td>
                                        <td class="last">
                                            <input class="float_right plus-button" type="button" name="delete"
                                                   value="Xoá"/>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>


                            <tfoot>
                            <?php $r_id = $key;?>
                            <tr>
                                <td colspan="5" style="height:45px;">
                                    <input class="plus-button float_right" type="button" name="increase"
                                           value="+ Thêm"/>
                                </td>
                            </tr>
                            <tr class="first last odd"  id="{{$r_id}}" data-react="1_1_1"
                                style="display:none;">
                                <td></td>
                                <td>
                                    <input name="Year" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input name="Month" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input type="text" id="cell_input_{{$r_id}}" style="height: 25px;"
                                           name="Content">
                                </td>
                                <td class="last">
                                    <input class="float_right plus-button" type="button" name="save" value="Lưu"/>
                                </td>
                            </tr>

                            </tfoot>
                        </table>

                    </div><!-- End table reload-->
                    <div class="warning" id="">

                    </div>
                </li>
                <li>
                    <div>
                        <table class="table table-striped table-bordered editable-table table-reload" id="1_2"
                               style="width: 90%;">
                            <thead>
                            <tr class="">
                                <th colspan="5">Thông tin bằng cấp </th>
                            </tr>
                            <tr class="">
                                <th style="width:7%;"> #</th>
                                <th style="width:13%;">Năm</th>
                                <th style="width:13%;">Tháng</th>
                                <th> Tên bằng cấp </th>
                                <th style="width:7%;">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="{{$key}}" data-response="1_2_1">
                            <?php
                            $Cert = $Records->filter(function ($item) {
                                return $item->getRole() == "Cert";
                            });
                            ?>
                            @if(!$Cert->count())
                                <tr class="no-record">
                                    <td colspan="5">
                                        <div style="text-align: center;">There are no records to display</div>
                                    </td>
                                </tr>
                            @else
                                <?php $i = 0;?>
                                @foreach ($Cert as $Record)
                                    <?php $r_id = $Record->id; ?>
                                    <tr id="{{$r_id}}">
                                        <td>{{++$i}}</td>


                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{getyear($Record->Date)}}</span>
                                            <input name="Year" class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;"
                                                   value="{{getyear($Record->Date)}}">
                                        </td>
                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{getMonth($Record->Date)}}</span>
                                            <input name="Month" class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;"
                                                   value="{{getMonth($Record->Date)}}">
                                        </td>
                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{$Record->Content}}</span>
                                            <input class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;" name="Content"
                                                   value="{{$Record->Content}}">
                                        </td>
                                        <td class="last">
                                            <input class="float_right plus-button" type="button" name="delete"
                                                   value="Xoá"/>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>


                            <tfoot>
                            <?php $r_id = $key;?>
                            <tr>
                                <td colspan="5" style="height:45px;">
                                    <input class="plus-button float_right" type="button" name="increase"
                                           value="+ Thêm"/>
                                </td>
                            </tr>
                            <tr class="first last odd"  id="{{$r_id}}" data-react="1_2_1"
                                style="display:none;">
                                <td></td>
                                <td>
                                    <input name="Year" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input name="Month" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input type="text" id="cell_input_{{$r_id}}" style="height: 25px;"
                                           name="Content">
                                </td>
                                <td class="last">
                                    <input class="float_right plus-button" type="button" name="save" value="Lưu"/>
                                </td>
                            </tr>

                            </tfoot>
                        </table>

                    </div><!-- End table reload-->
                    <div class="warning" id="">

                    </div>
                </li>

                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class = "label" for="name">Lời nhắn đến nhà tuyển dụng</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="true" style="width: 90%;" name="Contact_information" type="text" class="input-left float_left"  placeholder="some text" value="{{ $CV->Self_intro }}">

                            <div class="success-status float_left" id="s_Contact_information_{{$key}}" style="display:none;" >
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <label slide-header=true> <div class="slide-header" > III. Kĩ năng ứng viên*</div>  </label>
            <ul slide-toggle=true>
                <li class="">

                    <label class = "label" for="name">Vị trí ứng tuyển</label>
                </li>
                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class = "label" for="name">Giới thiệu bản thân</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="true" style="width: 90%;" name="Contact_information" type="text" class="input-left float_left"  placeholder="some text" value="{{ $CV->Self_intro }}">

                            </input>
                            <div class="success-status float_left" id="s_Contact_information_{{$key}}" style="display:none;" >
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>


                </li>
                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class = "label" for="Self_intro">Giới thiệu bản thân</label>
                        <div class="input">
                            <label class="icon-left" for="Self_intro">
                                <i class="fa fa-edit"></i>
                            </label>
						<textarea id="{{$key}}" editable="true" style="width: 90%;" name="Self_intro"  class=""  placeholder="some text" value=>
							"{{ $CV->Self_intro }}"
						</textarea>

                            <div class="success-status float_left" id="s_Contact_information_{{$key}}" style="display:none;" >
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>


                </li>
                <li class="">
                    <div class= "float_left " style="width:35%;">
                        <label class = "label" for="name">Ngôn ngữ lập trình</label>
                        <label class="input-select">
                            <select>
                                <option value="">C</option>
                                <option value="">C#</option>
                                <option value="">Java</option>
                                <option value="">PHP</option>
                                <option value="">Ruby</option>
                            </select>
                        </label>
                    </div>
                    <div class=" float_left" style="width: 30%;">
                        <label class = "label" for="name">Thời gian học</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="true" style="width: 80%;" name="" type="text" class="input-left float_left"  placeholder="some text" value="{{ $CV->Self_intro }}">

                            <div class="success-status float_left" id="s_Contact_information_{{$key}}" style="display:none;" >
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class=" float_left" style="width: 30%;">
                        <label class = "label" for="name">Thởi gian làm việc</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input id="{{$key}}" editable="true" style="width: 80%;" name="" type="text" class="input-left float_left"  placeholder="some text" value="{{ $CV->Self_intro }}">

                            <div class="success-status float_left" id="s_Contact_information_{{$key}}" style="display:none;" >
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
            </li>
            </ul>

        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>


    </form>



@stop