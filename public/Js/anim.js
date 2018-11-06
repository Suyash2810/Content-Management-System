$(document).ready(function () {
    arrow = $('#arrow');

    setTimeout(function () {
        arrow.animate({
            marginRight: '+=60px'
        }, 1000);
    }, 1000);
});

$(document).ready(function () {

    function getDuration(target) {
        var currentTop = $(window).scrollTop(),
            rate = 0.8,
            distance = Math.abs(currentTop - target);
        return distance * rate;
    }

    $("#arrow").on('click', function () {
        var bottom = $('.up').offset().top;
        var duration = getDuration(bottom);

        $("HTML, BODY").animate({
            scrollTop: bottom
        }, duration);
    });
});