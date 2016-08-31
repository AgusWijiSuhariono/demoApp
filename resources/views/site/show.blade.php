@extends('layouts.main')

@section('title', 'CRUD BLOG')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Kategori</th>
					<td>{{ $blog->kategori->nama_kategori }}</td>
				</tr>
				<tr>
					<th>Judul</th>
					<td>{{ $blog->judul }}</td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td>{{ $blog->tanggal }}</td>
				</tr>
				<tr>
					<th>Isi</th>
					<td>{{ $blog->isi }}</td>
				</tr>
				<tr>
					<th>Status</th>
					<td>{{ $blog->statusBlog() }}</td>
				</tr>
			</thead>
			
		</table>
	</div>
</div>
@endsection