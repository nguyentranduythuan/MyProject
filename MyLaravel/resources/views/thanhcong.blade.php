<h1>Dang nhap thanh cong</h1>
	{{ csrf_field() }}
	@if(isset($user))
		{{"Ten :".$user->name}}
		{{"Email :".$user->email}}
	@endif
