@extends('layouts.main')

@section('content')
<script type="text/javascript">
    $(document).on('ajaxComplete ajaxReady', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });
        $('#formUpload').on("submit", function (e) {
            $(".progress").show();
            var formData = new FormData(this);
            var formURL = $("#formUpload").attr("action");
            $.ajax(
                    {
                        url: formURL,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data, textStatus, jqXHR)
                        {
                            var data = jqXHR.responseJSON;
                            window.location.href = data.url;
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            var data = jqXHR.responseJSON;
                            errorsHtml = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul>';

                            $.each(data, function (key, value) {
                                errorsHtml += '<li>' + value[0] + '</li>';
                            });
                            errorsHtml += '</ul></di>';

                            $(".modalError").html(errorsHtml);
                        },
                        xhr: function () {
                            var xhr = $.ajaxSettings.xhr();
                            xhr.upload.onprogress = function (e) {
                                $(".progress-bar").attr("style", "width:" + Math.floor(e.loaded / e.total * 100) + "%");
                                $(".progress-bar").html(Math.floor(e.loaded / e.total * 100) + "%");
                            };
                            return xhr;
                        },
                    });
            e.preventDefault();
            e.unbind();
        });
    });
</script>
{!! Form::model($file, [
'action' => ['TbFileController@store'],
'id'=>'formUpload'
]) !!}
<div class="row">
    <div class="col-lg-12">
        <div class="progress" style="display:none">
            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="">
                <span class="sr-only"></span>
            </div>
        </div>
        <div class="form-group">
            <label>Nama File</label>
            {!! Form::text('nama',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label>Gambar</label>
            {!! Form::file('file') !!}
        </div>
        {!! Form::submit('Simpan',['class'=>'btn btn-sm btn-success']) !!}
    </div>
</div>
{!! Form::close() !!}
@endsection