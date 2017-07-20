@extends('layouts.main')

@section('content')
<div class="row">
	<div class="col-lg-4">
		{!! Form::model($user,['action' => ['UserController@update','id'=>$user->id]]) !!}
    		<input type="hidden" name="_method" value="PUT">
    		@include('user._form')
    		{!! Form::submit('simpan',['class'=>'btn btn-sm btn-primary']) !!}
		{!! Form::close() !!}
	</div>
</div>
@endsection