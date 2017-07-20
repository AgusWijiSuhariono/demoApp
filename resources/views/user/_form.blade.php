<div class="form-group">
	<label>Role</label>
	{!! Form::select('role_id', $role,null,['class'=>'form-control','placeholder' => '- pilih Role -']) !!}
</div>
<div class="form-group">
	<label>Nama</label>
	{!! Form::text('name',null,['class'=>'form-control']); !!}
</div>
<div class="form-group">
	<label>Email</label>
	{!! Form::text('email',null,['class'=>'form-control']); !!}
</div>
<?php
if(!$user->exists){
?>
<div class="form-group">
	<label>Password</label>
	{!! Form::text('password',null,['class'=>'form-control']); !!}
</div>
<?php
}else{
?>
<div class="form-group">
	<label>Password New</label>
	{!! Form::text('passwordNew',null,['class'=>'form-control']); !!}
</div>
<?php
}
?>