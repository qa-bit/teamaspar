$(document).ready(function () {

    var home = {
        cookies : function () {
            $(document).ready(function() {
                $('.cookie-message').cookieBar({ closeButton : '.my-close-button', hideOnClose: false });
                $('.cookie-message').on('cookieBar-close', function() { $(this).slideUp(); });
            });
        },
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

            $('.slider-bottom-arrow img').click(function () {
                var $next = $('.top-slider').next().eq(0);
                var offset = - $('.header-block').height();
                $(window).scrollTo($next, {'duration': 1000,'offset' : offset});
            });

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
            $('.fancybox').fancybox(
                {
                    prevEffect	: 'none',
                    nextEffect	: 'none',
                    helpers	: {
                        title	: {
                            type: 'outside'
                        },
                        thumbs	: {
                            width	: 50,
                            height	: 50
                        }
                    }
                }
            );
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
                if ($(this).attr('blank') != undefined) {
                    var win = window.open(lnk, '_blank');
                    win.focus();
                } else {
                    window.location = lnk;
                }
            })
        },
        toggleNews : function () {
            $('.circuit-galleries-list').hide();

            $('.toggler').click(function () {
                if ($(this).hasClass('closed')){
                    $(this).removeClass('closed').addClass('opened');
                } else {
                    $(this).removeClass('opened').addClass('closed');
                }

                $(this).parent().parent().parent().parent().find('.circuit-galleries-list').toggle();
            })
        },
        staffTabs : function () {
            $('.team-staff-menu li a').click(function (e) {
                var offset = - $('.header-block').height();
                e.preventDefault();
                $('.team-staff-menu li a').removeClass('active');
                $(this).addClass('active');
                var id = $(this).attr('href');
                $('.tab').removeClass('active');
                $(id).addClass('active');
                $(window).scrollTo($(id), {'offset' : offset});
            });
        },
        resizeSliders : function () {

            var resize = function () {
                var topMenuHeight = $('.header-block').height();
                var windowHeight = $(window).height();
                var swiperHeight = windowHeight - topMenuHeight + 'px';


                $('.body-block').css({'padding-top' : topMenuHeight});
                $('#swiper-inicio').css({'height' : swiperHeight});
                $('body').css({'opacity' : 1});
            };


            $(document).delay(200).queue(function (next) {
                resize();
            });

            $(window).on('resize', resize);

        },
        init : function () {
            this.resizeSliders();
            this.cookies();
            this.toggleNews();
            this.lazyImages();
            this.swiper();
            this.upArrow();
            this.fancy();
            this.lazyYt();
            this.links();
            this.staffTabs();
        }
    };
    home.init();
});