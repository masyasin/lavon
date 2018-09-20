function changeViewPortMeta() {
    if (screen.width <= 991 && screen.width > 743) {
        document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=0.75, maximum-scale=0.75");
    } else if (screen.width <= 743 && screen.width > 720) {
        document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=0.59, maximum-scale=0.59");
    } else if (screen.width <= 720 && screen.width > 644) {
        document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=0.63, maximum-scale=0.63");
    } else if (screen.width <= 644) {
        document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=0.75, maximum-scale=0.75");
    } else {
        document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=1");
    }
}
changeViewPortMeta();
$(window).resize(function() {
    changeViewPortMeta();
});
$(window).on("orientationchange", function() {
    changeViewPortMeta();
});
$(function() {
    $('.navbar-bkpp #navbar .dropdown').hover(function() {
        $('.navbar-bkpp #navbar .dropdown > a').click(function() {
            location.href = this.href;
        });
    });
    $('[data-toggle="tooltip"]').tooltip();
    $(".navbar-bkpp #navbar .dropdown").hover(function() {
        $('.dropdown-menu', this).stop(true, true).show();
        $(this).toggleClass('open');
        $(this).find(".caret").toggleClass("up");
        $(this).find("a").toggleClass("selected");
    }, function() {
        $('.dropdown-menu', this).stop(true, true).hide();
        $(this).toggleClass('open');
        $(this).find(".caret").toggleClass("up");
        $(this).find("a").toggleClass("selected");
    });
    $(".navbar-bkpp #navbar .dropdown").click(function() {
        if (!$(this).find('a').hasClass('selected')) {
            $('.dropdown-menu').stop(true, true).hide();
            $(".navbar-bkpp #navbar .dropdown").removeClass("open");
            $(".navbar-bkpp #navbar .dropdown .caret").removeClass("up");
            $(".navbar-bkpp #navbar .dropdown a").removeClass("selected");
            $('.dropdown-menu', this).stop(true, true).show();
            $(this).addClass('open');
            $(this).find(".caret").addClass("up");
            $(this).find("a").addClass("selected");
        } else {
            $(this).find("a").removeClass("selected");
            $(this).find(".caret").removeClass("up");
        }
    });
    $(".navbar-bkpp #navbar .menu-one .submenu li a").hover(function() {
        $(this).parent().siblings('li.active').removeClass("active");
        $(this).parent().addClass("active");
        var index_one = $(this).parent().index();
        $(".navbar-bkpp .menu-one .submenu-content .thumbs-content").removeClass("active");
        $(".navbar-bkpp .menu-one .submenu-content .thumbs-content").eq(index_one).addClass("active");
    });
    $(".navbar-bkpp #navbar .menu-two .submenu li a").hover(function() {
        $(this).parent().siblings('li.active').removeClass("active");
        $(this).parent().addClass("active");
        var index_two = $(this).parent().index();
        $(".navbar-bkpp .menu-two .submenu-content .thumbs-content").removeClass("active");
        $(".navbar-bkpp .menu-two .submenu-content .thumbs-content").eq(index_two).addClass("active");
    });
    $(".navbar-bkpp #navbar .menu-three .submenu li a").hover(function() {
        $(this).parent().siblings('li.active').removeClass("active");
        $(this).parent().addClass("active");
        var index_three = $(this).parent().index();
        $(".navbar-bkpp .menu-three .submenu-content .thumbs-content").removeClass("active");
        $(".navbar-bkpp .menu-three .submenu-content .thumbs-content").eq(index_three).addClass("active");
    });
    $(".navbar-bkpp #navbar .menu-four .submenu li a").hover(function() {
        $(this).parent().siblings('li.active').removeClass("active");
        $(this).parent().addClass("active");
        var index_four = $(this).parent().index();
        $(".navbar-bkpp .menu-four .submenu-content .thumbs-content").removeClass("active");
        $(".navbar-bkpp .menu-four .submenu-content .thumbs-content").eq(index_four).addClass("active");
    });
    $(".navbar-bkpp #navbar .menu-five .submenu li a").hover(function() {
        $(this).parent().siblings('li.active').removeClass("active");
        $(this).parent().addClass("active");
        var index_five = $(this).parent().index();
        $(".navbar-bkpp .menu-five .submenu-content .thumbs-content").removeClass("active");
        $(".navbar-bkpp .menu-five .submenu-content .thumbs-content").eq(index_five).addClass("active");
    });
    $("#navbar .search-toggle a.btn-search .fa").click(function(e) {
        $(this).parent().toggleClass('clicked');
        e.preventDefault();
    });
    // $(".slider-newsmaker").slick({
    //     infinite: false,
    //     nextArrow: '<i class="next fa fa-angle-right"></i>',
    //     prevArrow: '<i class="prev fa fa-angle-left"></i>',
    //     responsive: [{
    //         breakpoint: 1024,
    //         settings: {
    //             slidesToShow: 3,
    //             infinite: true
    //         }
    //     }, {
    //         breakpoint: 600,
    //         settings: {
    //             slidesToShow: 2,
    //             dots: true
    //         }
    //     }, {
    //         breakpoint: 300,
    //         settings: "unslick"
    //     }]
    // });
    // $('.content-infografik').zoom({
    //     url: 'images/pic-infografik-aksi-kpk-2015@2x.jpg'
    // });

    // function scroll_if_anchor(href) {
    //     href = typeof(href) == "string" ? href : $(this).attr("href");
    //     var fromTop = 95;
    //     if (href.indexOf("#") == 0) {
    //         var $target = $(href);
    //         var scrollAnchorStatus = $target.data('scrollanchor');
    //         if (scrollAnchorStatus != "no") {
    //             if ($target.length) {
    //                 $('html, body').animate({
    //                     scrollTop: $target.offset().top - fromTop
    //                 });
    //                 if (history && "pushState" in history) {
    //                     history.pushState({}, document.title, window.location.pathname + location.search + href);
    //                     return false;
    //                 }
    //             }
    //         }
    //     }
    // }
    // scroll_if_anchor(window.location.hash);
    // $("body article").on("click", "a", scroll_if_anchor);
    $('.match-height li').matchHeight();
})
var stickyNavTop = $('.navbar-bkpp').offset().top;
var stickyNav = function() {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > stickyNavTop) {
        $('body').addClass('sticky');
    } else {
        $('body').removeClass('sticky');
    }
};
stickyNav();
$(window).scroll(function() {
    stickyNav();
});

function setModalMaxHeight(element) {
    this.$element = $(element);
    this.$content = this.$element.find('.modal-content');
    var borderWidth = this.$content.outerHeight() - this.$content.innerHeight();
    var dialogMargin = $(window).width() < 768 ? 20 : 60;
    var contentHeight = $(window).height() - (dialogMargin + borderWidth);
    var headerHeight = this.$element.find('.modal-header').outerHeight() || 0;
    var footerHeight = this.$element.find('.modal-footer').outerHeight() || 0;
    var maxHeight = contentHeight - (headerHeight + footerHeight);
    this.$content.css({
        'overflow': 'hidden'
    });
    this.$element.find('.modal-body').css({
        'max-height': maxHeight,
        'overflow-y': 'auto'
    });
}
$('.modal').on('show.bs.modal', function() {
    $(this).show();
    setModalMaxHeight(this);
});
$(window).resize(function() {
    if ($('.modal.in').length == 1) {
        setModalMaxHeight($('.modal.in'));
    }
});
$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});
$(document).ready(function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }
    });
    if ($('#carouselUserOpini .item').length > 1) {
        $('.carousel-control').show();
    } else {
        $('.carousel-control').hide();
    }
});