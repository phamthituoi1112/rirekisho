@extends('xCV.template')
<title>Tạo CV</title>
<!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/uploadCV.css') }}"/-->
@section('content')

<?php $key = $CV->id;?>
<form action="" method="post" class="my-forms" id="j-forms-log">
	<fieldset id="field-box">
		<ul>

			<li> 
				<h3 class="orange">Thông tin tuyển dụng</h3>
			</li>
			<li class="">

				<label class = "label" for="name">Vị trí ứng tuyển</label>

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
			<div class="books-table">
				<table class="table table-striped table-bordered" id="" style="width: 90%;" >
					<thead>
						<tr class="">
							<th  colspan="5">Employment history**</th>
						</tr>
						<tr class="">
							<th style="width:7%;"> #</th>
							<th style="width:13%;">Từ</th>
							<th style="width:13%;">Đến&nbsp;</th>
							<th>Tên địa điểm làm việc</th>
							<th style="width:7%;">&nbsp;</th>
						</tr>
					</thead>
					<tbody id="ul">
						<tr class= "no-record">
							<td colspan="5"><center>There are no records to display</center></td>
						</tr>
						<tr class="first last odd edit_empty" id="htop1"  >
							<td></td>
							<td><span class=""></span>&nbsp;

							</td>
							<td><span class="price"></span>&nbsp;</td>
							<td class="edit_td">
								<span class="b-name" id="first_3">Công ty XXX - Thành phố Hà Nội - Việt nam </span>
								<input  class="editbox" id="first_input_3"></input> 
							</td>
							<td class="last">
								<a href="">Lưu</a>
							</td>
						</tr>

					</tbody>
					<tfoot>
						<tr>
							<td colspan="5" style="height:45px;">
								<input  class="float_right plus-button" type="button" name="increase" value="+ Thêm" onclick="increaseBtnOnclick2()"/>		
							</td>
						</tr>	
					</tfoot>
				</table>

			</div>
		</li>
		<li class="">
			<div class="books-table">
				<table class="table table-striped table-bordered" id="" style="width: 90%;" >
					<thead>
						<tr class="">
							<th  colspan="5">Thông tin bằng cấp**</th>
						</tr>
						<tr class="">
							<th style="width:7%;"> #</th>
							<th style="width:13%;">Từ</th>
							<th style="width:13%;">Đến&nbsp;</th>
							<th>Tên địa điểm làm việc</th>
							<th style="width:7%;">&nbsp;</th>
						</tr>
					</thead>
					<tbody id="ul">
						<tr class= "no-record">
							<td colspan="5"><center>There are no records to display</center></td>
						</tr>
						<tr class="first last odd edit_empty" id="htop1"  >
							<td></td>
							<td><span class=""></span>&nbsp;

							</td>
							<td><span class="price"></span>&nbsp;</td>
							<td class="edit_td">
								<span class="b-name" id="first_3">Công ty XXX - Thành phố Hà Nội - Việt nam </span>
								<input  class="editbox" id="first_input_3"></input> 
							</td>
							<td class="last">
								<a href="">Lưu</a>
							</td>
						</tr>

					</tbody>
					<tfoot>
						<tr>
							<td colspan="5" style="height:45px;">
								<input  class="float_right plus-button" type="button" name="increase" value="+ Thêm" />		
							</td>
						</tr>	
					</tfoot>
				</table>

			</div>
		</li>
		
		<li class="">
			<div class= "float_left " style="width:35%;">
				<label class = "label" for="name">Ngôn ngữ lập trình
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
		<li class="">

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
	
</fieldset>
<fieldset class= "tbFooter" >
</fieldset>



</form>



@stop