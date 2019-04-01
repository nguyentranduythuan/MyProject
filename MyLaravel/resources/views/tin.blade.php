<style type="text/css" media="screen">
	.pagination li {
		list-style: none;
		float: left;
		margin-left: 5px;
	}
</style>

@foreach($tin as $value)
	{{$value->TieuDe}}<br>
@endforeach
{!! $tin->links() !!}