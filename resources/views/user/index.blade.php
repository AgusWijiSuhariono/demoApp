@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Data User</div>
            <div class="panel-body">
                <a class="btn btn-success" href="{{ action('UserController@create') }}">Tambah User</a>
                <table class="table table-bordered table-hover" style="margin-top:10px">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a=1;
                        ?>
                        @foreach($user as $row)
                        <tr>
                            <td>{{ (($user->currentPage()-1)*$user->perPage())+$a++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ !empty($row->role->nama)?$row->role->nama:"-" }}</td>
                            <td>
                                <a href="{{ action('UserController@edit',['id'=>$row->id]) }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                <form action="{{ action('UserController@destroy',['id'=>$row->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-xs btn-danger" title="Delete InspTemuanItem" onclick="return confirm('Confirm delete?')" type="submit">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>   
                                </form> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
