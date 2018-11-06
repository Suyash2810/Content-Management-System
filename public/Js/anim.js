$(document).ready(function () {
    arrow = $('#arrow');

    setTimeout(function () {
        arrow.animate({
            marginRight: '+=60px'
        }, 1000);
    }, 1000);
});

$(document).ready(function () {

    $("#arrow").on('click', function () {
        var position = $(".up").offset().top;
        $("HTML, BODY").animate({
            scrollTop: position
        }, 500);
    });
});