function getColumnCount() {
	var windowWidth = $(window).width();
	if (windowWidth < 1000) {
		return 1;
	} else if (windowWidth < 1500) {
		return 2;
	} else {
		return 3;
	}
}

function go_BlocksIT() {
	$('#post_prev').BlocksIt({ numOfCol: getColumnCount(), offsetX: 0, offsetY: 0 });
}

function go_justifiedGallery() {
	$('.justified-gallery').justifiedGallery({
		maxRowHeight : 100,
		rowHeight: 100,
		margins: 5,
		lastRow: 'justify'
	});
}

function setTimers() {
	go_BlocksIT();
	for (x = 100; x <= 1000; x = x + 300)
		setTimeout(go_BlocksIT, x);
}

$(window).load( function() {
	setTimers();
});

$(window).focus( function() {
	go_BlocksIT();
});

$(document).ready( function() {
	$('.justified-gallery img').css("height", 100);
	go_BlocksIT();
	go_justifiedGallery();
});

$(window).resize(function() {
	setTimers();
});

