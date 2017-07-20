$(document).on('ready', function () {
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
	});

	$('.modalMd').off('click').on('click', function (e) {
        $("#modalMd").modal('show');
        $('#modalMdContent').load($(this).attr('href'));
        $('#modalMdTitle').html($(this).attr('title'));
        e.preventDefault();
    });

    $('.modalLg').off('click').on('click', function (e) {
        $("#modalLg").modal('show');
        $('#modalLgContent').load($(this).attr('href'));
        $('#modalLgTitle').html($(this).attr('title'));
        e.preventDefault();
    });

});

$(document).on('ajaxComplete', function () {
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});
	});

	$(".ajaxSubmit").on('submit',function(e){
		var form = $(this);
		
		$.ajax({
			type: "POST",
			url: form.attr( 'action' ),
			data: form.serialize(),
			success:function(data, textStatus, jqXHR) 
			{
				var data = jqXHR.responseJSON;
				window.location.href = data.url;
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				var data = jqXHR.responseJSON; 

				errorsHtml = '<div class="alert alert-danger"><ul>';

				$.each( data, function( key, value ) {
					errorsHtml += '<li>' + value[0] + '</li>';
				});
				errorsHtml += '</ul></di>';

				$(".modalError").html(errorsHtml);
			}
		});
		e.preventDefault();
		e.unbind();
	});
});