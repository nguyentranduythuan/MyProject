{{ $error or ""}}
<form action="{{route('123')}}" method="post" accept-charset="utf-8">
	{{ csrf_field() }}
	<input type="text" name="username" placeholder="vui long nhap username">
	<input type="password" name="password" placeholder="vui long nhap mat khau">
	<input type="submit">
</form>