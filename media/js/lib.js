var dateNotReady = true;

var shareLinks = {
    'g+': {'url':'https://plus.google.com/share?url=', 'color': ['#dd4a40', 'white']},
    'fb': {'url':'https://www.facebook.com/sharer/sharer.php?u=', 'color': ['#475995', 'white']},
    'vk': {'url':'https://vk.com/share.php?url=', 'color': ['#5d7294', 'white']},
    'tw': {'url':'https://twitter.com/intent/tweet?url=', 'color': ['#76aaeb', 'white']},
    'ok': {'url':'https://connect.ok.ru/offer?url=', 'color': ['#ed7c20', 'white']}
};

Date.prototype.getMonthName = function () {
    var month = {
        'ru': ['ЯНВАРЯ', 'ФЕВРАЛЯ', 'МАРТА', 'АПРЕЛЯ', 'МАЯ', 'ИЮНЯ', 'ИЮЛЯ', 'АВГУСТА', 'СЕНТЯБРЯ', 'ОКТЯБРЯ', 'НОЯБРЯ', 'ДЕКАБРЯ'],
        'en': ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOW', 'DEC']
    };
    return month[$('html').attr('lang')][this.getMonth()];
};

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

    for (key in shareLinks) {
        $(".share").append('<a href="'+shareLinks[key]['url']+location.href+'" class="shareLink"><img src="/media/img/'+key+'_i.svg" alt="'+key+'" height="19px"></a>');
    }

    $(".shareLink").mouseover(function () {
        shareNameKEY = $(this).find("img").attr("alt");
        $(this).find("img").attr("src", "/media/img/" + shareNameKEY + ".svg");
        $(this).css("background-color", shareLinks[shareNameKEY]['color'][0]);
    }).mouseout(function () {
        shareNameKEY = $(this).find("img").attr("alt");
        $(this).find("img").attr("src", "/media/img/" + shareNameKEY + "_i.svg");
        $(this).css("background-color", shareLinks[shareNameKEY]['color'][1]);
    }).click( function () {
        newwindow = window.open(this.href, '', 'height=500,width=650,left=200,top=200');
        if (window.focus) {newwindow.focus()}
        return false;
    });

});