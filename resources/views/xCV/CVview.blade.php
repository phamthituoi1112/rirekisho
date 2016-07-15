@extends('xCV.template')
<title>Xem </title>
@section('content')

<!--div class="display-box" style=""-->
<div class="p-box" style="height: 700px;">
	<div class="top-card " style="">
		<div class="profile">
			<div class="profile-picture ">
				<img width="200" height="200"  src="{{ URL::asset('img/no_image.gif') }}">
			</div>
			<div class="clear-fix"></div>
			<div class="profile-overview ">

				<ul class="profile-nav skippable">
					<li class="title"> 
						<h2> {{$CV->Last_name}} {{$CV->First_name}}</h2>
						<h3>{{$CV->Furigana_name}}</h3>
					</li>

					<li class="p-link">
						<a class="" href="#S-info">
							<i class="fa fa-user " id="p-active"></i>
							<div class="li-text">個人情報 </div>

						</a>
					</li>
					
					<li class="p-link">
						<a class="" href="#S-school">
							<i class="fa fa-graduation-cap" ></i>
							<div class="li-text">学歴・免許・資格</div>

						</a>
					</li>
					<li class="p-link">
						<a href="#S-work">
							<i class="fa fa-history " ></i>
							<div class="li-text">職歴</div>

						</a>
					</li>
					<li class="p-link">
						<a class="" href="#S-selfintro">
							<i class="fa fa-file-text " ></i>
							<div class="li-text">自己紹介・希望 </div>

						</a>
					</li>
					<li class="p-link">
						<a class=""  name="P-download">
							<i class="fa fa-keyboard-o " ></i>
							<div class="li-text">IT skill</div>

						</a>
					</li>
					<li class="p-link">
						<a class="" name="P-download">
							<i class="fa fa-download " ></i>
							<div class="li-text">Download CV</div>

						</a>
					</li>

				</ul>
			</div>
			<div class="profile-link">
				<a href=""></a>
			</div>
		</div>

	</div>

	<div class="basic-info" >
		<div class="hd">
			
		</div>

		<div class="bd" >
			<ul><li  id="S-info">
				<table>
					<tr>
						<th ><h2>個人情報</h2> </th>
					</tr>
					<tr>
						<th><h4>生年月日</h4> </th>
						<td>{{$CV->BDay}} （満 {{$CV->Age}}歳）</td>

					</tr>
					<tr>
						<th><h4>性別</h4> </th>
						<td> {{$CV->Jgender}} </td>
					</tr>

					<tr>
						<th><h4>配偶者</h4> </th>
						<td>{{$CV->Jmarriage}} </td>

					</tr>
				</table>
			</li>
			<li id="S-work">
				<table>
					<tr>
						<th><h2>職歴</h2> </th>
					</tr>

					<?php 
					$Work =$Records->filter(function ($item) {
						return $item->getRole() == "Work" ;
					});
					?>

					@if(!$Work ->count())
					<tr>
						<th></th>
						<td style="color: gray;">There are no records to display</td>
					</tr>
					@else
					@foreach ($Work as $Record)
					<?php $r_id = $Record->id; ?>

					<tr>
						<th><h4>{{$Record->Jdate}}</h4> </th>
						<td>{{$Record->Content}}  </td>
					</tr>
					@endforeach
					@endif
				</table>

			</li>
			<li id="S-selfintro">
				<table>
					<tr>
						<th ><h2>自己紹介</h2> </th>
						<td >{{$CV->Self_intro}} </td>
					</tr>
				</table>
			</li>
			<li>
				<table>
					<tr>
						<th ><h2>希望</h2> </th>
						<td >{{$CV->Request}} </td>
					</tr>

				</table>
			</li>
			<li id="S-school">
				<table>
					<tr>
						<th ><h2>学歴</h2> </th>
					</tr>
					<?php 
					$School =$Records->filter(function ($item) {
						return $item->getRole() == "School" ;
					});
					?>
					@if(!$School->count())
					<tr>
						<th></th>
						<td style="color: gray;">There are no records to display</td>
					</tr>
					@else
					@foreach ($School as $Record)
					<?php $r_id = $Record->id; ?>

					<tr>
						<th><h4>{{$Record->Jdate}}</h4> </th>
						<td>{{$Record->Content}}  </td>
					</tr>
					@endforeach
					@endif
				</table>
			</li>
			<li >
				<?php 
				$Cert =$Records->filter(function ($item) {
					return $item->getRole() == "Cert" ;
				});
				?>
				<table>
					<tr>
						<th><h2>免許・資格</h2> </th>
					</tr>


					@if(!$Cert ->count())
					<tr>
						<th></th>
						<td style="color: gray;">There are no records to display</td>
					</tr>
					@else
					@foreach ($Cert as $Record)
					<?php $r_id = $Record->id; ?>

					<tr>
						<th><h4>{{$Record->Jdate}}</h4> </th>
						<td>{{$Record->Content}}  </td>
					</tr>
					@endforeach
					@endif
				</table>
			</li>
			<li id="S-">
				<table>
					<tr>
						<th><h2>連絡情報</h2> </th>
					</tr>
					<tr>
						<th><h4>電話</h4> </th>
						<td>{{$CV->Phone}}</td>

					</tr>
					<tr>
						<th><h4>現住所</h4> </th>
						<td>{{$CV->Address}}</td>

					</tr>
					<tr>
						<th><h4>連絡先</h4> </th>
						<td>{{$CV->Contact_information}}</td>

					</tr>
				</table>
			</li>


		</ul>
	</div>

</div>
<div class="ft">
	更新日: {{$CV->updated_at}}
</div>
</div>

@stop