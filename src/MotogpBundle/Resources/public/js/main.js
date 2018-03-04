$(document).ready(function () {

    var home = {
        lazyImages : function () {

            var nodes = $('.lazy');

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
                    next()
                });
            }
        },
        swiper : function () {
            window.swipers = {};

            $('.swiper-container').each(function () {
                var numsliders = $(this).find('.swiper-slide').length;

                var id = $(this).attr('id');
                var paginationId = $(this).parent().find('.swiper-pagination').attr('id');
                var autoplay = $(this).attr('data-autoplay');

                var prevPage = $('<div><img src="/bundles/motogp/img/assets/prev.png" /></div>');
                var nextPage = $('<div><img src="/bundles/motogp/img/assets/next.png" /></div>');

                prevPage.attr('id', paginationId + '-left').addClass('page-lr page-l');
                nextPage.attr('id', paginationId + '-right').addClass('page-lr page-r');

                $('#' + paginationId).parent().append(prevPage);
                $('#' + paginationId).parent().append(nextPage);

                swipers[id] = new Swiper('#' + id, {
                    pagination: '#' + paginationId,
                    paginationClickable: true,
                    preloadImages: false,
                    lazyLoading: true,
                    loop: false,
                    effect: 'fade',
                    autoplay : autoplay ? autoplay : null,
                    nextButton: '#' + paginationId + '-right',
                    prevButton: '#' + paginationId + '-left'
                });


                if (numsliders < 2){
                    $('#' + paginationId).hide();
                }

                $(this).click(function () {
                    swipers[id].slideNext();
                });

            });

            /*
             $('.swiper-pagination-bullet').each(function () {
             $(this).append('<div></div>');
             });
             */


        },
        upArrow : function () {
            $('.up-arrow').on('click', function (e) {
                e.preventDefault();
                try {
                    $('html,body').animate(
                        {
                            scrollTop: 0
                        },
                        1200);
                } catch (e) {
                    console.error(e);
                }
            } );
        },
        fancy : function () {
            $('.fancybox').fancybox();
            $('.fancytrigger').click(
                function () {
                    var $rel = $(this).attr('rel');
                    console.error($rel);
                    $('.fancybox[rel="'+ $rel + '"]').eq(0).trigger('click');
                }
            );

        },
        lazyYt : function () {
            $('.lazyYT').lazyYT();
        },
        links : function () {
          $('.link').on('click', function () {
              var lnk = $(this).attr('href');
              window.location = lnk;
          })
        },
        init : function () {
            this.lazyImages();
            this.swiper();
            this.upArrow();
            this.fancy();
            this.lazyYt();
            this.links();
        }
    };
    home.init();

});