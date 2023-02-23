$(document).ready( function () {
	// SELECT 2
    $('.select2').select2();

    //AKHIR SELECT 2

    // UPLOAD FOTO KUCING PATH
	$(".btn-upload-poster").on('change', function() {
         var filename = $('input[type=file]').val().split('\\').pop();
		$('.file-path-wrapper').text(filename);
	});

	$(".btn-upload-profile").on('change', function() {
         var filename = $('input[type=file]').val().split('\\').pop();
		$('.file-path-wrapper').text(filename);
	});

	// AKHIR UPLOAD FOTO KUCING PATH
});