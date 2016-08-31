@extends('layouts.main')

@section('title', 'Create')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h4>Create Blog</h4>
		{!! Form::model($blog, array('action' => 'SiteController@store','class'=>'ajaxSubmit')) !!}
			@include('site._form')
		{!! Form::close() !!}
</div>

@endsection