var dateNotReady = true;

$(document).ready(function () {
    if (dateNotReady) {
        Date.prototype.getMonthName = function () {
            var month = {
                'ru': ['ЯНВАРЯ', 'ФЕВРАЛЯ', 'МАРТА', 'АПРЕЛЯ', 'МАЯ', 'ИЮНЯ', 'ИЮЛЯ', 'АВГУСТА', 'СЕНТЯБРЯ', 'ОКТЯБРЯ', 'НОЯБРЯ', 'ДЕКАБРЯ'],
                'en': ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOW', 'DEC']
            }
            return month[$('html').attr('lang')][this.getMonth()];
        }
        $('.js_date').each(function (i, elem) {
            var postDate = new Date($(this).text());
            $(this).text(postDate.getDate() + " " + postDate.getMonthName() + " " + postDate.getFullYear());
        });
    }
    ;
    dateNotReady = false;
});
