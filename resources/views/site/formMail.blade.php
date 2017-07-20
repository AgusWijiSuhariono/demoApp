@extends('layouts.main')

@section('title', 'Form Mail')
@section('content')
<div class="row">
	{!! Form::open(['action' => 'SiteController@sendMail','method'=>'post']) !!}
	<div class="col-sm-6">
		<div class="form-group">
			<label>Email Tujuan</label>
			{!! Form::text('email',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			<label>Subjek</label>
			{!! Form::text('subjek',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			<label>Opsi Template</label>
			{!! Form::select('opsi_template',['1'=>'Dengan Template','2'=>'Tanpa Template'],null,['class'=>'form-control','promt'=>'- pilih opsi -']) !!}
		</div> 
		{!! Form::submit('Kirim Email',['class'=>'btn btn-primary']) !!}
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label>Pesan</label>
			{!! Form::textarea('pesan',null,['class'=>'form-control']) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection