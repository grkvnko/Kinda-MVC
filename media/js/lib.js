var dateNotReady = true;

var shareLinks = [
    {'img':'fb', 'url':'https://vk.com/share.php?url='},
    {'img':'vk', 'url':'https://vk.com/share.php?url='},
    {'img':'tw', 'url':'https://twitter.com/intent/tweet?url='},
    {'img':'ok', 'url':'https://twitter.com/intent/tweet?url='}
];
var shareLinksColor = {
    'fb': ['#475995', 'white'],
    'vk': ['#5d7294', 'white'],
    'tw': ['#76aaeb', 'white'],
    'ok': ['#ed7c20', 'white']
};

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
    
    shareLinks.forEach(function (item) {
        $(".share").append('<a href="'+item['url']+location.href+'" class="shareLink"><img src="/media/img/'+item['img']+'_i.svg" alt="'+item['img']+'"></a>');
    });

    $(".shareLink").mouseover(function () {
        shareNameID = $(this).find("img").attr("alt");
        shareName = "/media/img/" + shareNameID + ".svg";
        $(this).find("img").attr("src", shareName);
        $(this).css("background-color", shareLinksColor[shareNameID][0]);
    }).mouseout(function () {
        shareName = $(this).find("img").attr("alt");
        shareName = "/media/img/" + shareName + "_i.svg";
        $(this).find("img").attr("src", shareName);
        $(this).css("background-color", shareLinksColor[shareNameID][1]);
    }).click( function () {
        newwindow = window.open(this.href, '', 'height=500,width=650,left=200,top=200');
        if (window.focus) {newwindow.focus()}
        return false;
    });

});