var dateNotReady = true;

Date.prototype.getMonthName = function () {
    var month = {
        'ru': ['ЯНВАРЯ', 'ФЕВРАЛЯ', 'МАРТА', 'АПРЕЛЯ', 'МАЯ', 'ИЮНЯ', 'ИЮЛЯ', 'АВГУСТА', 'СЕНТЯБРЯ', 'ОКТЯБРЯ', 'НОЯБРЯ', 'ДЕКАБРЯ'],
        'en': ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOW', 'DEC']
    }
    return month[$('html').attr('lang')][this.getMonth()];
}

function closeImg() {
    $('#popup_img').remove();
    $("body").css("overflow","auto");
    go_BlocksIT();
}

$(document).ready(function () {
    if (dateNotReady) {
        $('.js_date').each(function (i, elem) {
            var postDate = new Date($(this).text());
            $(this).text(postDate.getDate() + " " + postDate.getMonthName() + " " + postDate.getFullYear());
        });
    }
    dateNotReady = false;

    $(".img_link").click( function () {
        $('#popup_img').remove();
        $('body').prepend('<div id="popup_img"><div id="popup_img_src"></div></div>');
        $('#popup_img_src').css('background-image', 'url(' + this.getAttribute("href") + ')');
        $("body").css("overflow","hidden");
        return false;
    });

    $(document).click(function() {
        closeImg();
    });

    $(document).keydown(function(e) {
        if (e.keyCode == 27) closeImg();
    });
});