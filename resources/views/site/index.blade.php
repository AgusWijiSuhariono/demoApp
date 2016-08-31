@extends('layouts.main')

@section('title', 'CRUD BLOG')
@section('content')

<div class="row">
	<div class="col-lg-1">
		<a href="{{ action('SiteController@create') }}" class="btn btn-success">Create</a>
	</div>
	<div class="col-lg-1">
		<a href="#" value="{{ action('SiteController@create') }}" class="btn btn-info modalMd" title="Create data dari Ajax" data-toggle="modal" data-target="#modalMd">Create From Modal</a>
	</div>
</div>
<div class="row" style="margin-top:10px">
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
			<thead>
				<tr> 
					<th>Kategori</th>
					<th>Tanggal</th>
					<th>Judul</th>
					<th>Isi</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($blog as $row)
				<tr>
					<td>{{ $row->id_kategori }}</td>
					<td>{{ $row->tanggal }}</td>
					<td>{{ $row->judul }}</td>
					<td>{{ $row->isi }}</td>
					<td>{{ $row->status }}</td>
					<td>
						<a href="#" value="{{ action('SiteController@edit',['id'=>$row->id]) }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
						<form action="{{ action('SiteController@destroy',['id'=>$row->id]) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-xs btn-danger" title="Delete InspTemuanItem" onclick="return confirm('Confirm delete?')" type="submit">
								<i class="glyphicon glyphicon-trash"></i>
							</button>   
						</form>	
						<a href="#" value="{{ action('SiteController@show',['id'=>$row->id]) }}" class="btn btn-xs btn-info modalMd" title="Show Data" data-toggle="modal" data-target="#modalMd"><span class="glyphicon glyphicon-eye-open"></span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection