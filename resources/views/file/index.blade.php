@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success modalMd" href="{{ action('TbFileController@create') }}" title="Upload File"><span class="glyphicon glyphicon-upload"></span> Upload Foto</a>
        <div class="row" style="margin-top: 10px">
            @foreach($file as $row)
            <div class="col-sm-3">
                <div class="thumbnail">
                    {{ Html::image('images/'.$row->file,$row->nama) }}
                    <div class="caption">
                        <h3>{{ $row->nama }}</h3>
                        <form action="{{ action('TbFileController@destroy',['id'=>$row->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-xs btn-danger" title="Delete InspTemuanItem" onclick="return confirm('Confirm delete?')" type="submit">
                                Hapus Foto <i class="glyphicon glyphicon-trash"></i>
                            </button>   
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                {!! $file->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection