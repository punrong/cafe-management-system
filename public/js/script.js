$(document).ready(function(){

    $('.toggler').on('click', function(){
        $('.menu-container').toggleClass('active');
    })

    $('.navbar-toggler').on('click', function(){
        $('.navbar-toggler').toggleClass('is-active');
        $('.navbar-menu').toggleClass('is-active');
    })

    function setMenuHeight(){
        var navbarHeight = $('.navBar').outerHeight();
        $('.menu-wrapper').outerHeight(document.documentElement.clientHeight - navbarHeight)
                            .niceScroll({
                                emulatetouch: true
                            })
    }

    setMenuHeight();
    $(window).on('resize', function(){
        setMenuHeight();
    })

});