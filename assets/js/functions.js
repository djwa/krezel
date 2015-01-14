$(document).ready(function () {
    var element = $('#cards-view figure');
    var n = $('#cards-view figure').length;
    console.log('#cards-view has ' + n + ' elements(cards/figures)');
    for (var i = 1; i < 5; i++) {
        element.addClass('me' + (i - 1));
    }
});