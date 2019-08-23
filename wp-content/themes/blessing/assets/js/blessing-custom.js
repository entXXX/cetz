// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
// Blessing customize js
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
(function($) { "use strict"; 

    // mobile navigation
    var mb;
    jQuery('#menu-btn').on( "click", function() {
        var iteration = $(this).data('iteration') || 1;
        switch (iteration) {
            case 1:
                jQuery('#mainmenu').show();
                jQuery('header').css("height", "auto");
                mb = 1;
                break;

            case 2:
                jQuery('#mainmenu').hide();
                jQuery('header').css("height", "80px");
                mb = 0;
                break;
        }
        iteration++;
        if (iteration > 2) iteration = 1;
        $(this).data('iteration', iteration);
    });

    /* handle the adding of active class when clicked */
    $("#menu-btn").on( "click", function(e) {
        if (!$(this).hasClass("active")) {
            $(this).addClass("active");
        }else{
            $(this).removeClass("active");
        }
    });

    /* --------------------------------------------------
     * Paralax Background
     * --------------------------------------------------*/
    var $window = $(window);
    $('section[data-type="background"]').each(function () {
        var $bgobj = $(this);
        $(window).scroll(function () {
            var yPos = -($window.scrollTop() / $bgobj.data('speed'));
            var coords = '50% ' + yPos + 'px';
            $bgobj.css({ backgroundPosition: coords });                
        });
        document.createElement("article");
        document.createElement("section");
    });

    /* --------------------------------------------------
     * OWL Carousel
     * --------------------------------------------------*/  
    $(".testi-carousel").owlCarousel({
        singleItem: true,
        lazyLoad: true,
        navigation: false,
        autoPlay : 10000, // 1 second = 1000
        //transitionStyle : 'fade', // Remove this line, if not want using slider fade effect.
    });

    $(".custom-carousel-1").owlCarousel({
        items: 3,
        navigation: false,
        pagination: false,
    });

    $(".custom-carousel-2").owlCarousel({
        items: 3,
        navigation: false,
        pagination: false,
    });

    $(".post-slider").owlCarousel({
        singleItem: true,
        navigation: false,
        pagination: true,
        autoPlay : true,
        transitionStyle : false,
    });

    /* --------------------------------------------------
     * magnificPopup
     * --------------------------------------------------*/    
    // zoom gallery
    $('.zoom-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function(item) {
                return item.el.attr('title');
                //return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
            }
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function(element) {
                return element.find('img');
            }
        }
    });

    $('.simple-ajax-popup-align-top').magnificPopup({
        type: 'ajax',
        alignTop: true,
        overflowY: 'scroll',
        fixedContentPos: true,
        callbacks: {
            beforeOpen: function() { $('html').addClass('mfp-helper'); },
            close: function() { $('html').removeClass('mfp-helper'); }
        },
        gallery: {
            enabled: true
        },
    });

    /* Project popup content without next/previous button */
    $('.single-ajax-popup').magnificPopup({
        type: 'ajax',
        alignTop: true,
        overflowY: 'scroll',
        fixedContentPos: true,
        callbacks: {
            beforeOpen: function() { $('html').addClass('mfp-helper'); },
            close: function() { $('html').removeClass('mfp-helper'); }
        }
    });

    // popup youtube, video, gmaps
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: true
    });

    // --------------------------------------------------
    // Back To Top
    // --------------------------------------------------
    if ($('#back-to-top').length) {
        var scrollTrigger = 500, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };            
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });    
    }
    // --------------------------------------------------
    // portfolio hover
    // --------------------------------------------------
    $(".fx .desc").fadeTo(0, 0);
    $(".fx .item").on("mouseenter", function() {
        var speed = 700;
        var w = $(this).css("height");
        var wd = parseInt(w) - 80;
        $(this).find(".desc").stop(true).animate({
            'height': wd,
            'margin-top': "20px",
            "opacity": "100"
        }, speed, 'easeOutCubic');
        $(this).find(".overlay").stop(true).animate({
            'height': "100%",
            'margin-top': "20px"
        }, speed, 'easeOutCubic');
        $(this).parent().parent().find(".item").not(this).stop(
            true).fadeTo(speed, .5);
    }).on("mouseleave", function() {
        var speed = 700;
        $(this).find(".desc").stop(true).animate({
            'height': "0px",
            'margin-top': "0px",
            "opacity": "0"
        }, speed, 'easeOutCubic');
        $(this).find(".overlay").stop(true).animate({
            'height': "84px",
            'margin-top': "20px"
        }, speed, 'easeOutCubic');
        $(this).parent().parent().find(".item").not(this).stop(
            true).fadeTo(speed, 1);
    });

    $.fn.equalHeights = function(){
        var max_height = 0;
        $(this).each(function(){
            max_height = Math.max($(this).height(), max_height);
        });
        $(this).each(function(){
            $(this).height(max_height);
        });
    };
    
    $('.item-blog').equalHeights();

    $('.small-pic').each(function() {
        var w = $(this).parent().css("width");
        var wd = (parseInt(w) - 40) / 4;
        $(this).css("width", wd);
        $(this).css("height", wd);
    });
    $('.wide-pic').each(function() {
        var w = $(this).parent().css("width");
        var wd = (parseInt(w) - 40) / 2;
        $(this).css("width", wd + 10);
        $(this).css("height", wd / 2);
    });
    $('.long-pic').each(function() {
        var w = $(this).parent().css("width");
        var wd = (parseInt(w) - 40) / 4;
        $(this).css("width", wd);
        $(this).css("height", wd * 2 + 10);
    });

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    // fit video
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    $(".container").fitVids();

    /* Blog Masonry */
    jQuery(document).ready(function($){
        (function ($) {             
            var container = $('.blog-grid');                        
            function getNumbColumns() { 
                var winWidth = $(window).width(), 
                    columnNumb = 1;                             
                if (winWidth > 1500) {
                    columnNumb = 4;
                } else if (winWidth > 1200) {
                    columnNumb = 3;
                } else if (winWidth > 900) {
                    columnNumb = 2;
                } else if (winWidth > 600) {
                    columnNumb = 2;
                } else if (winWidth > 300) {
                    columnNumb = 1;
                }               
                return columnNumb;
            }           
            
            function setColumnWidth() { 
                var winWidth = $(window).width(), 
                    columnNumb = getNumbColumns(), 
                    postWidth = Math.floor(winWidth / columnNumb);
            }                   
            
            function reArrangeProjects() { 
                setColumnWidth();
                container.isotope('reLayout');
            }
                        
            container.imagesLoaded(function () { 
                setColumnWidth();                               
                container.isotope( { 
                    itemSelector : '.post', 
                    layoutMode : 'masonry', 
                    resizable : false 
                } );
            } );
            
            $(window).on('debouncedresize', function () { 
                reArrangeProjects();
                
            } );                
        })(jQuery);

        /* Events Masonry */
        (function ($) {             
            var container = $('.blessing-events-grid');                        
            function getNumbColumns() { 
                var winWidth = $(window).width(), 
                    columnNumb = 1;                             
                if (winWidth > 1500) {
                    columnNumb = 4;
                } else if (winWidth > 1200) {
                    columnNumb = 3;
                } else if (winWidth > 900) {
                    columnNumb = 2;
                } else if (winWidth > 600) {
                    columnNumb = 2;
                } else if (winWidth > 300) {
                    columnNumb = 1;
                }               
                return columnNumb;
            }           
            
            function setColumnWidth() { 
                var winWidth = $(window).width(), 
                    columnNumb = getNumbColumns(), 
                    postWidth = Math.floor(winWidth / columnNumb);
            }                   
            
            function reArrangeProjects() { 
                setColumnWidth();
                container.isotope('reLayout');
            }
                        
            container.imagesLoaded(function () { 
                setColumnWidth();                               
                container.isotope( { 
                    itemSelector : '.event-item', 
                    layoutMode : 'masonry', 
                    resizable : false 
                } );
            } );
            
            $(window).on('debouncedresize', function () { 
                reArrangeProjects();
                
            } );                
        })(jQuery);

        /* Images Masonry */
        (function ($) {             
            var container = $('.gallery-isotope');                        
            function getNumbColumns() { 
                var winWidth = $(window).width(), 
                    columnNumb = 1;                             
                if (winWidth > 1500) {
                    columnNumb = 4;
                } else if (winWidth > 1200) {
                    columnNumb = 3;
                } else if (winWidth > 900) {
                    columnNumb = 2;
                } else if (winWidth > 600) {
                    columnNumb = 2;
                } else if (winWidth > 300) {
                    columnNumb = 1;
                }               
                return columnNumb;
            }           
            
            function setColumnWidth() { 
                var winWidth = $(window).width(), 
                    columnNumb = getNumbColumns(), 
                    postWidth = Math.floor(winWidth / columnNumb);
            }                   
            
            function reArrangeProjects() { 
                setColumnWidth();
                container.isotope('reLayout');
            }
                        
            container.imagesLoaded(function () { 
                setColumnWidth();                               
                container.isotope( { 
                    itemSelector : '.item', 
                    layoutMode : 'masonry', 
                    resizable : false 
                } );
            } );
            
            $(window).on('debouncedresize', function () { 
                reArrangeProjects();
                
            } );                
        })(jQuery);
    });

    /* DebouncedResize Function */
    (function ($) { 
        var $event = $.event, 
            $special, 
            resizeTimeout;                      
        $special = $event.special.debouncedresize = { 
            setup : function () { 
                $(this).on('resize', $special.handler);
            }, 
            teardown : function () { 
                $(this).off('resize', $special.handler);
            }, 
            handler : function (event, execAsap) { 
                var context = this, 
                    args = arguments, 
                    dispatch = function () { 
                        event.type = 'debouncedresize';                         
                        $event.dispatch.apply(context, args);
                    };                                      
                if (resizeTimeout) {
                    clearTimeout(resizeTimeout);
                }                                       
                execAsap ? dispatch() : resizeTimeout = setTimeout(dispatch, $special.threshold);
            }, 
            threshold : 150 
        };
    })(jQuery);

    $('.animated').fadeTo(0, 0);

    // - - - - - - - - - -
    $('#gallery-isotope .item').each(function() {
        $(this).find(".overlay").fadeTo(1, 0);
        $(this).find("img").css("width", "100%");
        $(this).find("img").css("height", "auto");
        $(this).find("img").on('load', function() {
            var w = $(this).css("width");
            var h = $(this).css("height");
            $(this).parent().find(
                ".overlay").css("width", w);
            $(this).parent().find(
                ".overlay").css("height", h);
        }).each(function() {
            if (this.complete) $(this).load();
        });
    });

    // - - - - - - - - - -
    $("#gallery-isotope .item").on("mouseenter", function() {
        $(this).find(".overlay").stop().fadeTo(300,.5);
    }).on("mouseleave", function() {
        $(this).find(".overlay").stop().fadeTo(300,0);
    })

    // - - - - - - - - - -
    $('.f_box').each(function() {
        $(this).find("img").on('load', function() {
            var w = parseInt($(this).css(
                "width"));
            var h = parseInt($(this).css(
                "height"));
            var w_box = parseInt($(this).parent()
                .parent().css("width"));
            var wx = w_box - w;
            var f = $(this).parent().parent();
            var t = $(this).parent().parent().find(
                ".text");
            t.css("margin-top", h / 2 - (t.height() /
                2));
            t.css("width", wx);
            if (f.hasClass("f_left")) {
                t.css("left", wx / 2 - (t.width() /
                    2));
            } else {
                t.css("right", wx / 2 - (t.width() /
                    2));
            }
        }).each(function() {
            if (this.complete) $(this).load();
        });
    });

    $('.custom-col-2').each(function() {
        $(this).find("img").css("width", "100%");
        $(this).find("img").css("height", "auto");
        $(this).find("img").fadeTo(0, .5);
        $(this).find("img").on('load', function() {
            var w = $(this).css("width");
            var h = $(this).css("height");
            $(this).parent().find(
                ".overlay").css("width", w);
            var n = $(this).parent().find(
                ".centered");
            var hn = (parseInt(h) - parseInt(n.css(
                'height'))) / 2;
            var wn = (parseInt(w) - parseInt(n.css(
                'width')) / 2) / 2;
            n.css("top", hn);
            n.css("left", wn);
        }).each(function() {
            if (this.complete) $(this).load();
        });
    });

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    $('.event-list li').each(function() {
        $(this).find("img").on('load', function() {
            var w = parseInt($(this).css(
                "width"));
            var h = parseInt($(this).css(
                "height"));
            var t = $(this).parent().parent().find(
                ".text");
            var s = $(this).parent().parent().find(
                ".date");
            t.css("margin-top", h / 2 - (t.height() /
                2));
            s.css("margin-top", h / 2 - (s.height() /
                2));
            s.css("margin-left", w / 2 - (s.width() /
                2));
        }).each(function() {
            if (this.complete) $(this).load();
        });
    });

    $(".event-list li").hover(function() {
        $(this).find("img").stop(true).fadeTo(200,
            1);
        $(this).find(".date").stop(true).fadeTo(
            200, 0);
    }, function() {
        $(this).find(".date").stop(true).fadeTo(
            200, 1);
    });   

    var mediaElements = document.querySelectorAll('video, audio');
    for (var i = 0, total = mediaElements.length; i < total; i++) {
        var features = [ 'playpause', 'current', 'progress', 'duration', 'volume'];
        // To demonstrate the use of Chromecast with audio
        if (mediaElements[i].tagName === 'AUDIO') {
            features.push('chromecast');
        }
        new MediaElementPlayer(mediaElements[i], {
            // This is needed to make Jump Forward to work correctly
            pluginPath: 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.5/',
            shimScriptAccess: 'always',
            autoRewind: false,
            features: features,
            currentMessage: 'Now playing:'
        });
    }

})(jQuery);