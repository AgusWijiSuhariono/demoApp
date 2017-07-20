@extends('layouts.main')

@section('content')
<div class="row">
	<div class="col-lg-4">
		{!! Form::model($user,['action' => 'UserController@store']) !!}
    		@include('user._form')

    		{!! Form::submit('simpan',['class'=>'btn btn-sm btn-primary']) !!}
		{!! Form::close() !!}
	</div>
</div>
@endsection