@extends('layouts.master')

@section('NoiDung')
<h2>Khoa hoc PHP</h2>

{{--@if($khoahoc != "") 
	{{$khoahoc}}
 @else 
	{{"Khong co khoa hoc nao"}}
@endif
--}}
{{--{!!$khoahoc or "Khong co bien khoa hoc nao"!!}--}}
</br>

{{--@for($i = 1;$i <=10;$i++)
	{{$i.""}}
@endfor
--}}

<?php $khoahoc = array('php','asp','python','ruby'); ?>

{{--@if(!empty($khoahoc))
@foreach ($khoahoc as $value)
	{{$value}}
@endforeach
@else
	{{"Khong co gi het"}}
@endif
--}}

@forelse ($khoahoc as $value)
	{{--@continue($value == "php")--}}
	@break($value == "python")
	{{$value}}
@empty
	{{'Khong co gi het'}}
@endforelse

@endsection