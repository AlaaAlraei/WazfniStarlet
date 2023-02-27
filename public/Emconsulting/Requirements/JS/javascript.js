$(document).ready(function () {
    CopyRight()

    $('#TrustedBySlider').slick({
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        autoplay: true,
        infinite: true,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('#TrustedBySlider .slick-dots li').html('<div></div>')
});


$(window).on('load', function () {
    setTimeout(function () {
        $('.PreloaderInner').addClass('animate__fadeOutUp')
    }, 500)
    setTimeout(function () {
        $('.Preloader').remove()
    }, 1000)
    bannerHeight()
});
$(window).on('resize', function () {
    bannerHeight()
});

function bannerHeight() {
    var windowHeight = $(window).height();
    var HeaderHeight = $('#Header').height();
    var BannerHeight = parseInt(windowHeight - HeaderHeight)
    $('.BannerInner').css('height', BannerHeight)
}

function SelectThisRequest(el) {
    el.find('input')[0].click()
}

function ReadMore(el) {
    $('.ReadMorePopUpContent').hide()
    $('.ReadMorePopUp').show()
    $(el.attr('rel')).show()
}

function CopyRight() {
    $('#Footer').append('    <div class="FooterCopyRights">\n' +
        '        <p>\n' +
        '            <a href="https://starlet-it.com/?en" target="_blank" class="d-none"></a>\n' +
        '            All rights reserved\n' +
        '            <img src="../Requirements/IMG/Creator.png" onclick="$(this).parent().find(\'a\')[0].click()">\n' +
        '            Development team 2023©\n' +
        '        </p>\n' +
        '    </div>')
}