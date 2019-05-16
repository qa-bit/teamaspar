
var $socialHtmlTwitter = $('.smw-twitter').html();
var $socialHtmlInstagram = $('.smw-instagram').html();
var $socialHtmlFacebook = $('.smw-facebook').html();

var widgets = function () {

    if (!($('.smw-twitter').size()))
        return;

    var wwidth = $('.home-block-white').width();

    if (wwidth <= 768)
        return;

    var px = wwidth * 0.3;
    var pxh = wwidth * 0.4;
    var pxd = wwidth * 0.3;

    $('.smw-twitter').html(null);
    $('.smw-instagram').html(null);


    $socialHtmlTwitter_A = $socialHtmlTwitter.replace(/320/g, px).replace(/200/g, pxd).replace(/300/g, pxh);
    $socialHtmlInstagram_A = $socialHtmlInstagram.replace(/320/g, px).replace(/200/g, pxd);
    $socialHtmlFacebook_A = $socialHtmlFacebook.replace(/500/g, px).replace(/700/g, pxh);

    $('.smw-twitter').html($socialHtmlTwitter_A);
    $('.smw-instagram').html($socialHtmlInstagram_A);
    

    $('.smw-box').css({'width' : px + 'px'});
    $('.social-media-widgets .social-media-widgets-inner').css({'width' : (px * 3) + 'px', 'max-height' : pxh + 'px'});

    $('.social-media-widgets-inner > div').css({'height' : pxh + 'px'})

};


widgets();

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
                    autoplay : false,
                    nextButton: '#' + paginationId + '-right',
                    prevButton: '#' + paginationId + '-left'
                });


                if (numsliders < 2){
                    $('#' + paginationId).hide();
                }
                

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
        newsletters : function () {

            var check = function (obj) {

                var val = obj.val();

                if (val == 'public') {
                    $('#motogpbundle_register_surname').parent().show();
                    $('#motogpbundle_register_mediaType').parent().hide();
                }

                if (val == 'media') {
                    $('#motogpbundle_register_surname').parent().hide();
                    $('#motogpbundle_register_mediaType').parent().show();
                }

                if (val == 'sponsor') {
                    $('#motogpbundle_register_surname').parent().hide();
                    $('#motogpbundle_register_mediaType').parent().hide();
                }
            }


            $('#motogpbundle_register_type').change(function () {
                check($(this));
            });

            check($('#motogpbundle_register_type'));

        },
        socialMedia : function () {


        },
        menus : function () {
            $('.dropdown-submenu a').on('click', function (e) {

                e.stopPropagation();

                if ($(this).parent().hasClass('open'))
                    $(this).parent().removeClass('open');
                else
                    $(this).parent().addClass('open');


                if ( $('html').attr('route') == 'team_staff' && $(this).attr('link') ) {
                    var id = '#' + $(this).attr('link');
                    e.preventDefault();
                    var offset = -$('.navbar-header').height();
                    $('a[link]').removeClass('active');
                    $(this).addClass('active');
                    $('.tab').removeClass('active');
                    $(id).addClass('active');
                    $(window).scrollTo($(id), {'offset' : offset });
                    $('.navbar-toggle').trigger('click');
                }

            });

            $('.dropdown').click(function () {

                var $el = $(this);

                var isDefault = $(this).hasClass('default-open');

                $('.default-open').removeClass('default-open');

                if (isDefault) {
                    $(window).delay(50).queue(function (next) {
                        console.error($el);
                        $el.removeClass('open');
                        next();
                    });
                }

            });


            var calcMenuHeight = function () {
                var menuHeight = $('.navbar-header').height();
                var wHeight = $(window).height();

                $('.nav.navbar-nav.only-mobile').css({'height' : wHeight - menuHeight + 'px', 'max-height' : wHeight - menuHeight + 'px'});


            };


            $(window).delay(100).queue(function (next) {
                calcMenuHeight();

                next();
            });

            $(window).on('resize', calcMenuHeight);

            $hash = window.location.hash;





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
            this.newsletters();
            this.socialMedia();
            this.menus();


            $(window).delay(200).queue(function (next) {
                
                if ( $('html').attr('route') == 'team_staff' && $hash ) {
                    var offset = -$('.navbar-header').height();
                    console.error($hash, offset);
                    $($hash).addClass('active');
                    $(window).scrollTo($($hash), {'offset' : offset });
                }

                next();
            })

        }
    };
    home.init();

    $(window).on('resize', widgets);
});