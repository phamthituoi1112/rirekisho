<title>My bookmarks</title>
<input type="hidden" id="visitor_id" value="{{ Auth::user()->id }}"/>
<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/bookmarks.js')}}"></script>
@include('xCV.CVindex')
