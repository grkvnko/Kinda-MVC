function getCol(){
	var windowWidth = $(window).width();
	if (windowWidth < 660) {
		return 1;
	} else {
		return 2;
	}
}

$(document).ready(function() {

    $(window).load( function() {
		$('.post_text').BlocksIt({ numOfCol: getCol(), offsetX: 0, offsetY: 0 });
	});

	$(window).resize(function() {
		$('.post_text').BlocksIt({ numOfCol: getCol(), offsetX: 0, offsetY: 0 });
	});


    $(window).scroll(function() {

        $('#kek').html( $(window).scrollTop() );

        var headerHeight = $('header').height();

        if ($(window).scrollTop() > headerHeight) {
            $('#post_close_tab').show("fast");
        } else {
            $('#post_close_tab').hide("fast");
        }

    });


});