$(document).ready(function () {
    $('.carousel-inner .item:first-of-type, .carousel-indicators li:first-of-type').addClass('active');
    if ($(window).width() < 620) {
        $('.slide-container').addClass('carousel-inner');
    }
    $(window).resize(function () {
        if ($(window).width() < 620) {
            $('.slide-container').addClass('carousel-inner');
        } else {
            $('.slide-container').removeClass('carousel-inner');
        }
    });
});