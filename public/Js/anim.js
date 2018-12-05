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

window.onload = function () {

    var elem = document.querySelector('#tech_heading');

    elem.addEventListener('mouseover', () => {
        var obj = anime({
            targets: '#tech_heading',
            scale: 1.2
        });

    });

    var centerDiv = document.getElementById('center_anim');
    centerDiv.addEventListener('click', moveUp);

    function moveUp(e) {
        var object = anime({
            targets: '#center_anim',
            translateY: {
                value: '-300px',
                duration: 1000,
                delay: 100,
                easing: 'easeInOutSine'
            },
            borderRadius: {
                value: ['40px', '0px'],
                duration: 1200,
                easing: 'easeInOutSine'
            },
            width: {
                value: '+=120px',
                duration: 2000,
                delay: 100,
                easing: 'easeInOutSine'
            },
            height: {
                value: '-=50px',
                duration: 2500,
                delay: 100,
                easing: 'easeInOutSine'
            }
        });

        e.target.innerText = '';

        setTimeout(function () {
            e.target.innerText = 'Welcome to the Panel.';
        }, 3000);

        var panel = document.getElementById('hidden_info');
        setTimeout(function () {
            panel.style.display = 'block';
        }, 1000);

        centerDiv.removeEventListener('click', moveUp);
    }

    document.querySelector('.display2').addEventListener('mouseover', function () {

        var obb = anime({
            targets: '.display2',
            scale: 1.2,
            duration: 1000,
            delay: 500
        });

    });

    document.querySelector('.display2').addEventListener('mouseout', function () {

        var obB = anime({
            targets: '.display2',
            scale: 1.0,
            duration: 1000,
            delay: 500
        });
    });
}