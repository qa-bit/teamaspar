$(document).ready(function () {

    var home = {
        lazyImages : function () {

            var nodes = $('.lazy');

            var showBody = function () {
                $('body').css({'opacity' : 1, 'overflow' : 'auto'});
            };


            if (nodes.length) {
                nodes.Lazy({
                    scrollDirection: 'vertical',
                    effect: 'fadeIn',
                    effectTime: 350,
                    visibleOnly: true,
                    beforeLoad: function (el) {
                        el.addClass('loading');
                    },
                    afterLoad: function (el) {
                        el.addClass('loaded').removeClass('loading');
                    }
                }).delay(300).queue(function (next) {
                    showBody();
                    next()
                });
            } else
                showBody();
        },
        swiper : function () {
            window.swipers = {};

            $('.swiper-container').each(function () {
                var numsliders = $(this).find('.swiper-slide').length;

                var id = $(this).attr('id');
                var paginationId = $(this).parent().find('.swiper-pagination').attr('id');

                if (typeof paginationId == 'undefined')
                    return;


                var autoplay = $(this).attr('data-autoplay');

                swipers[id] = new Swiper('#' + id, {
                    paginationClickable: true,
                    preloadImages: false,
                    lazyLoading: true,
                    loop: false,
                    effect: 'fade',
                    autoplay : autoplay ? autoplay : null
                });


                if (numsliders < 2){
                    $('#' + paginationId).hide();
                }

                $(this).click(function () {
                    swipers[id].slideNext();
                });

            });

            $('.swiper-pagination-bullet').each(function () {
                $(this).append('<div></div>');
            });


        },
        init : function () {
            this.lazyImages();
            this.swiper();
        }
    };
    home.init();

});