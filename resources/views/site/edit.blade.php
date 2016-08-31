@extends('layouts.main')


@section('title', 'Update')
@section('content')

<div class="row">
	<div class="col-lg-6">
		<h4>Update Blog</h4>
		{!! Form::model($blog, array('action' => ['SiteController@update','id'=>$blog->id])) !!}
			<input type="hidden" name="_method" value="PUT">
			@include('site._form')
		{!! Form::close() !!}
</div>

@endsection