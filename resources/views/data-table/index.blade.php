@extends('layouts.main')
@section('content')
<script type="text/javascript">
    $(function() {
        $('#author-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! action('DataTabelController@dataAuthor') !!}',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'email', name: 'email' },
            { data: 'birthdate', name: 'birthdate' }
            ]
        });

        $('#post-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! action('DataTabelController@dataPost') !!}',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'author.first_name', name: 'author.first_name' },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'content', name: 'content' },
            { data: 'date', name: 'date' }
            ]
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Author</div>
                <div class="panel-body">
                <table class="table table-bordered" id="author-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Firstname</th>
                            <th>Lasname</th>
                            <th>Email</th>
                            <th>Birthdate</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Data Post</div>
            <div class="panel-body">
               <table class="table table-bordered" id="post-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Author ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Date</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection
