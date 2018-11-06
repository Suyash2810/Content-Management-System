$(document).ready(function () {
    arrow = $('#arrow');

    setTimeout(function () {
        arrow.animate({
            marginRight: '+=60px'
        }, 1000);
    }, 1000);
})