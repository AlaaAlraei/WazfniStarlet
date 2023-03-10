$(document).ready(function () {
    if ($('.ActiveCategory').length === 1) {
        $('.ActiveCategory').parent().click()
    }

    $(document).mouseup(function (e) {
        var container = $(".UserOptions,.SelectAuthCategoryList");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });

    if ($('#HomePage').length === 1) {
        $('.HeaderFirstRightInner ul li').first().addClass('active-HeaderTab')
    } else if ($('#CreateJobUser').length === 1) {
        $('#CreateJobUserHeaderBtn').first().addClass('active-HeaderTab')
    } else if ($('#AboutPage').length === 1) {
        $('#AboutHeaderBtn').first().addClass('active-HeaderTab')
    } else if ($('#TermsPage').length === 1) {
        $('#TermsPageHeaderBtn').first().addClass('active-HeaderTab')
    }

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


$(window).on('load', function () {
    setTimeout(function () {
        var HomeJobsHeight = $('.LatestJobsItemsGH').height();
        $('.LatestJobsItemsGH').css('min-height', HomeJobsHeight)
    }, 2000)
    setTimeout(function () {
        $('.PreloaderInner').addClass('animate__fadeOutUp')
    }, 500)
    setTimeout(function () {
        $('.Preloader').remove()
    }, 1000)
});

$(window).on('resize', function () {
    setTimeout(function () {
        $('.SpecialOffersSlider .slick-dots li').html('<div></div>')
    }, 500)
});

function ShowPassword(el) {
    var Target = el.parent().find('input');
    if (Target.attr('type') === 'password') {
        Target.attr('type', 'text')
        el.addClass('PasswordIsVisible')
        el.find('i').attr('class', 'fas fa-eye-slash')
    } else {
        Target.attr('type', 'password')
        el.removeClass('PasswordIsVisible')
        el.find('i').attr('class', 'fas fa-eye')
    }
}

function LoginPopUp(el) {
    $(el.attr('rel')).fadeIn(600)
    $('.LoginRegisterTabs button').first().click()
}

function SwitchRegSignStatus(el) {
    $('.LoginForm').hide()
    $(el.attr('rel')).show()
    el.parent().find('button').removeClass('ActiveLoginRegTab')
    el.addClass('ActiveLoginRegTab')
}



function UserOptions(el) {
    if ($(el.attr('rel')).is(':visible')) {
        $(el.attr('rel')).slideUp()
    } else {
        $(el.attr('rel')).slideDown()
    }
}

function EditProfilePop(el) {
    $('.LoginRegisterTabs button').first().click()
    $(el.attr('rel')).show()
}

function SelectThisAuthCategory(el) {
    el.find('input').attr('checked', true)
    $('.AuthCtegorySelect g').text(el.find('span').text())
    $('.AuthCtegorySelect i').attr('class', 'fas fa-times')
    $('.SelectAuthCategoryList').slideUp()
}


function ClearAuthCategory() {
    $('.SelectAuthCategoryListItem input').attr('checked', false)
    $('.AuthCtegorySelect g').text('???????????? ?????? ??????????')
    $('.AuthCtegorySelect i').attr('class', 'fas fa-angle-down')
}
