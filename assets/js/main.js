jQuery(document).ready(function ($) {

    $('.hero__item').click(function () {
        $(this).toggleClass('active');
    });

    $('div[data-anim="fadein"]').css({
        opacity: '0',
        transition: 'all ease .5s'
    });
    $('div[data-anim="fadein"]').each(function (index) {
        const _this = $(this);
        setTimeout(function () {
            _this.css('opacity', '1');
        }, (index + 1) * 500);
    });

});