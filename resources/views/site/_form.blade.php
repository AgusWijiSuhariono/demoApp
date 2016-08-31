<div class="form-group">
	<label>Kategori</label>
	{!! Form::select('id_kategori', $kategori,null,['class'=>'form-control','placeholder' => '- pilih kategori -']) !!}
</div>
<div class="form-group">
	<label>Tanggal</label>
	{!! Form::date('tanggal', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	<label>Judul</label>
	{!! Form::text('judul',null,['class'=>'form-control']); !!}
</div>
<div class="form-group">
	<label>Isi</label>
	{!! Form::textarea('isi',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
</div>
<div class="form-group">
	<label>Status</label>
	<div class="radio">
		<label>{!! Form::radio('status', '1') !!}Aktif</label>
	</div>
	<div class="radio">
		<label>{!! Form::radio('status', '0') !!}Non Aktif</label>
	</div>
</div>
{!! Form::submit('Simpan',['class'=>'btn btn-success']); !!}