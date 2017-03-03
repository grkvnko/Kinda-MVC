
$(document).ready(function () {
	$('.justified-gallery img').css("height", 100);

	$('.justified-gallery').justifiedGallery({
		maxRowHeight : 100,
		rowHeight: 100,
		margins: 5,
		lastRow: 'justify'
	});

	$('#photostream').justifiedGallery({
		maxRowHeight : 200,
		rowHeight: 200,
		margins: 5,
		lastRow: 'nojustify'
	});

});