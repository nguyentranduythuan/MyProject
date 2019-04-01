<form action="{{route('postFile')}}" method="post" accept-charset="utf-8">
	{{csrf_field()}}
	<input type="file" name="myFile">
	<input type="submit">
	
</form>
