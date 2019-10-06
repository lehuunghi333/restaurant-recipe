jQuery(document).ready(function($){
    var at_window = $(window);
    var at_body = $('body');

    function homeFullScreen() {

        var homeSection = $('#at-banner-slider');
        var windowHeight = at_window.outerHeight();

        if (homeSection.hasClass('home-fullscreen')) {

            $('.home-fullscreen').css('height', windowHeight);
        }
    }
    //make slider full width
    homeFullScreen();

    //window resize
    at_window.resize(function () {
        homeFullScreen();
    });

    at_window.on("load", function() {
        /*loading*/
        $('#wrapper').removeClass('loading');
        var $bubblingG_loader = $('.bubblingG-loader');
        $bubblingG_loader.addClass('removing');
        $bubblingG_loader.remove();

        /*slick*/
        $('.acme-slick-carausel').each(function() {
            var at_featured_img_slider = $(this);

            var slidesToShow = parseInt(at_featured_img_slider.data('column'));
            var slidesToScroll = parseInt(at_featured_img_slider.data('column'));
            var prevArrow =at_featured_img_slider.closest('.widget').find('.at-action-wrapper > .prev');
            var nextArrow =at_featured_img_slider.closest('.widget').find('.at-action-wrapper > .next');
            at_featured_img_slider.css('visibility', 'visible').slick({
                slidesToShow: slidesToShow,
                slidesToScroll: slidesToScroll,
                autoplay: true,
                speed: 700,
                adaptiveHeight: true,
                cssEase: 'linear',
                arrows: true,
                prevArrow: prevArrow,
                nextArrow: nextArrow,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: ( slidesToShow > 1 ? slidesToShow - 1 : slidesToShow ),
                            slidesToScroll: ( slidesToScroll > 1 ? slidesToScroll - 1 : slidesToScroll )
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: ( slidesToShow > 2 ? slidesToShow - 2 : slidesToShow ),
                            slidesToScroll: ( slidesToScroll > 2 ? slidesToScroll - 2 : slidesToScroll )
                        }
                    }
                ]
            });
        });

        $('.featured-slider').show().slick({
            autoplay: true,
            adaptiveHeight: true,
            autoplaySpeed: 5000,
            speed: 1000,
            cssEase: 'linear',
            fade: true,
            prevArrow: '<i class="prev fa fa-angle-left"></i>',
            nextArrow: '<i class="next fa fa-angle-right"></i>'
        });
        /*parallax scolling*/
        $('a[href*="\\#"]').click(function(event){
            var at_offset= $.attr(this, 'href');
            var id = at_offset.substring(1, at_offset.length);
            if ( ! document.getElementById( id ) ) {
                return;
            }
            if( $( at_offset ).offset() ){
                $('html, body').animate({
                    scrollTop: $( at_offset ).offset().top-$('.at-navbar').height()
                }, 1000);
                event.preventDefault();
            }

        });
        /*bootstrap sroolpy*/
        $("body").scrollspy({target: ".at-sticky", offset: $('.at-navbar').height()+50 } );

        /*isotop*/
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows',
            fitRows: {
                gutter: 0
            },
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.gallery-inner-item'
            }
        });
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt( number, 10 ) > 50;
            },
            // show if name ends with -ium
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match( /ium$/ );
            }
        };
        // bind filter button click
        $('.filters').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
        });
        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });
        /*featured slider*/
        $('.acme-gallery').each(function(){
            var $masonry_boxes = $(this);
            var $container = $masonry_boxes.find('.fullwidth-row');
            $container.imagesLoaded( function(){
                $masonry_boxes.fadeIn( 'slow' );
                $container.masonry({
                    itemSelector : '.at-gallery-item'
                });
            });
            /*widget*/
            $masonry_boxes.find('.image-gallery-widget').magnificPopup({
                type: 'image',
                closeBtnInside: false,
                gallery: {
                    enabled: true
                },
                fixedContentPos: false

            });
            $masonry_boxes.find('.single-image-widget').magnificPopup({
                type: 'image',
                closeBtnInside: false,
                fixedContentPos: false
            });
        });

        /*widget slider*/
        $('.acme-widget-carausel').show().slick({
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 700,
            cssEase: 'linear',
            fade: true,
            prevArrow: '<i class="prev fa fa-angle-left"></i>',
            nextArrow: '<i class="next fa fa-angle-right"></i>'
        });

        //Select 2 js init
        if (typeof select2 !== 'undefined' && $.isFunction(select2)){
           $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: -1
            }); 
        }
    });

    function stickyMenu() {

        var scrollTop = at_window.scrollTop();
        if ( scrollTop > 250 ) {
            $('.restaurant-recipe-sticky').addClass('at-sticky');
            $('.sm-up-container').show();
        }
        else {
            $('.restaurant-recipe-sticky').removeClass('at-sticky');
            $('.sm-up-container').hide();
        }
    }
    //What happen on window scroll
    stickyMenu();
    at_window.on("scroll", function (e) {
        setTimeout(function () {
            stickyMenu();
        }, 300)
    });
    
    /*schedule tab*/
    function schedule_tab() {
        // Runs when the image button is clicked.
        jQuery('body').on('click','.schedule-title a', function(e){
            var $this = $(this),
                schedule_wrap = $this.closest('.at-schedule'),
                schedule_tab_id = $this.data('id'),
                schedule_title = schedule_wrap.find('.schedule-title'),
            schedule_content_wrap = schedule_wrap.find('.schedule-item-content');

            schedule_title.removeClass('active');
            $this.parent().addClass('active');
            schedule_content_wrap.removeClass('active');

            schedule_content_wrap.each(function () {
                if( $(this).data('id') === schedule_tab_id ){
                    $(this).addClass('active')
                }
            });

            e.preventDefault();
        });
    }

    function accordion() {
        // Runs when the image button is clicked.
        jQuery('body').on('click','.accordion-title', function(e){
            var $this = $(this),
                accordion_content  = $this.closest('.accordion-content'),
                accordion_item  = $this.closest('.accordion-item'),
                accordion_details  = accordion_item.find('.accordion-details'),
                accordion_all_items  = accordion_content.find('.accordion-item'),
                accordion_icon  = accordion_content.find('.accordion-icon');

            $('.accordion-title').removeClass('active');
             $this.addClass('active');
            accordion_icon.each(function () {
                $(this).addClass('fa-plus');
                $(this).removeClass('fa-minus');
            });
            accordion_all_items.each(function () {
                $(this).find('.accordion-details').slideUp();
            });

            if( accordion_details.is(":visible")){
                accordion_details.slideUp();
                $this.find('.accordion-icon').addClass('fa-plus');
                $this.find('.accordion-icon').removeClass('fa-minus');
            }
            else{
                accordion_details.slideDown();
                $this.find('.accordion-icon').addClass('fa-minus');
                $this.find('.accordion-icon').removeClass('fa-plus');
            }
            e.preventDefault();
        });
    }
    function at_site_origin_grid() {
        $('.panel-grid').each(function(){
            var count = $(this).children('.panel-grid-cell').length;
            if( count < 1 ){
                count = $(this).children('.panel-grid').length;
            }
            if( count > 1 ){
                $(this).addClass('at-grid-full-width');
            }
        });
    }
    accordion();
    schedule_tab();
    at_site_origin_grid();
});

/*animation with wow*/
if(typeof WOW !== 'undefined'){
    eb_wow = new WOW({
            boxClass: 'init-animate'
    }
    );
    eb_wow.init();
}