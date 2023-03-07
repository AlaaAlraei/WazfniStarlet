$(document).ready(function () {

    $('.SpecialOffersSlider').slick({
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        autoplay: true,
        infinite: true,
        slidesToScroll: 5,
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
                    slidesToScroll: 3
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

    $('.SpecialOffersSlider .slick-dots li').html('<div></div>')
});


$(window).on('load',function () {
    setTimeout(function(){
        $('.PreloaderInner').addClass('animate__fadeOutUp')
    }, 500)
    setTimeout(function(){
        $('.Preloader').remove()
    }, 1000)
});

$(window).on('resize',function () {
    setTimeout(function (){
        $('.SpecialOffersSlider .slick-dots li').html('<div></div>')
    }, 500)
});
