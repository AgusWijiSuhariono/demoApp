@extends('layouts.main')

@section('content')
<?php
$urlPropinsi = action('RequestUrlController@findPropinsi');
?>
<script type="text/javascript">
    $(function(){
        $("#pencarianPropinsi").select2({
            minimumInputLength: 3,
            allowClear: true,
            placeholder: 'masukkan nama propinsi',
            ajax: {
                dataType: 'json',
                url: '<?= $urlPropinsi ?>',
                delay: 800,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function (data, page) {
                  return {
                    results: data
                  };
                },
            }
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <select id="pencarianPropinsi" class="form-control"></select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
