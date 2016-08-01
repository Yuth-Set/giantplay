$(function(){
	var base_link = 'http://localhost:8000/';

	$('#txtSearch').on('keydown', function(){
		var txt = $.trim($(this).val());
		$(this).val(txt);
	});

	$('#txtSearch').on('keyup', function(){
		$('#frmSearch').submit();
	});

	$('#frmSearch').submit(function(e){
		e.preventDefault();
		var link = $(this).attr('action');
		var form = $(this).serialize();
		$.get(link, form, function(data){
			var tags = '';

			// tags += '<ul><li></li>';
			// tags += '<li><ul>';

			tags += '<div>';

			$.each(data, function(i,article){
				tags += '<h3><a href="' + base_link + 'articles/' + article.id + '">';
				tags += '<span class="glyphicon glyphicon-chevron-right"></span>' + article.title;
				tags += '</a></h3><div class="body">' + article.body + '</div>';

				// tags += '<li>' + article.title + '</li>';
			});

			tags += '</div>';

			// tags += '</ul>';

			$('.articles').html(tags);
			$('.pagination').hide();
		});	
	});


	$('textarea.txtBody').ckeditor({
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
  });

	// $('input[name=body]').ckeditor();
	/*CKEDITOR.replace('txtBody', {
		filebrowserBrowseUrl: '/ckfinder/ckfinders.html',
		filebrowserUploadUrl: '/ckfinder/core/connectors/php/connector.php?command=QuickUpload&type=Files',


			filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
			filebrowserImageUploadUrl: '/uploader/upload.php?type=Images',
			filebrowserWindowWidth: '900',
	});*/

	// var editor = CKEDITOR.replace('ckfinder');
	// CKFinder.setupCKEditor( editor );

});
  
