<form action="{{route('postForm')}}" method="post" accept-charset="utf-8">
	<input type="text" name="hoten">
	<input type="text" name="tuoi">
	{{ csrf_field() }}
	<input type="submit">
</form>