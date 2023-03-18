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
    } else if ($('#PreviewJobsPage').length === 1) {
        $('#PreviewJobsHeaderBtn').first().addClass('active-HeaderTab')
    }

    $('.HomeAdsSliderGH').slick({
        autoplay: true,
        infinite: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
    });
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

    if($('.RegistrationFormErrors').length > 0){
        $('#RegErrorsGH').html($('.RegistrationFormErrors').html())
        $('#HeaderLoginBtn').click()
        $('#CraeateAccountTab').click()
    }
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
    $('.AuthCtegorySelect g').text('اختيار فئة العمل')
    $('.AuthCtegorySelect i').attr('class', 'fas fa-angle-down')
}

function ShowCustomSelect(el){
    $(el.attr('rel')).show()
}


function SelectThisAuthFeatures(el) {
    if(el.hasClass('JobFeatureAdded')){
        el.find('input').attr('checked', false)
        el.removeClass('JobFeatureAdded')
        $('.'+el.attr('JobFeatureNumber')).remove()
    }else{
        el.find('input').attr('checked', true)
        $(el.attr('rel')).append('<u title="حذف الميزة" onclick="RemoveThisFeature($(this))"><i class="fas fa-times"></i><f></f></u>')
        $(el.attr('rel')).find('u').last().find('f').text(el.find('span').text())
        $(el.attr('rel')).find('u').last().attr('rel',el.attr('target'))
        $(el.attr('rel')).find('u').last().addClass(el.attr('JobFeatureNumber'))
        el.addClass('JobFeatureAdded')
    }
}

function RemoveThisFeature(el){
    $(el.attr('rel')).removeClass('JobFeatureAdded')
    $(el.attr('rel')).find('input').attr('checked', false)
    el.remove()
}

function SelectThisJobCreateCategory(el) {
    if(el.hasClass('JobCategorySelected')){
        el.parent().find('input').attr('checked', false)
        el.removeClass('JobCategorySelected')
        $(el.attr('rel')).find('g').text('اختيار فئة الوظيفة')
        $(el.attr('rel')).find('i').attr('class', 'fas fa-angle-down')
        $(el.attr('rel')).find('img').remove()
    }else{
        el.parent().find('.SelectAuthCategoryListItem').removeClass('JobCategorySelected')
        el.addClass('JobCategorySelected')
        el.parent().find('input').attr('checked', false)
        el.find('input').attr('checked', true)
        $(el.attr('rel')).find('g').text(el.find('span').text())
        $(el.attr('rel')).find('i').attr('class', 'fas fa-times')
        $(el.attr('rel')).find('g').append('<img src="">')
        $(el.attr('rel')).find('img').attr('src',el.find('img').attr('src'))
        $('.SelectAuthCategoryList').slideUp()
    }
}


function ClearCreateJobCategory(el) {
    $(el.attr('rel')).find('.SelectAuthCategoryListItem').removeClass('JobCategorySelected')
    $(el.attr('rel')).find('input').attr('checked', false)
    el.parent().find('g').text('اختيار فئة العمل')
    el.parent().find('i').attr('class', 'fas fa-angle-down')
    el.parent().find('img').remove()
}


function ClearEditInfoCategory(el) {
    $(el.attr('rel')).find('.SelectAuthCategoryListItem').removeClass('JobCategorySelected')
    $(el.attr('rel')).find('input').attr('checked', false)
    el.parent().find('g').text('اختيار فئة العمل')
    el.parent().find('i').attr('class', 'fas fa-angle-down')
    el.parent().find('img').remove()
}


function SelectThisJobCategoryOnEditInfo(el) {
    if(el.hasClass('JobCategorySelected')){
        el.parent().find('input').attr('checked', false)
        el.removeClass('JobCategorySelected')
        $(el.attr('rel')).find('g').text('اختيار فئة الوظيفة')
        $(el.attr('rel')).find('i').attr('class', 'fas fa-angle-down')
        $(el.attr('rel')).find('img').remove()
    }else{
        el.parent().find('.SelectAuthCategoryListItem').removeClass('JobCategorySelected')
        el.addClass('JobCategorySelected')
        el.parent().find('input').attr('checked', false)
        el.find('input').attr('checked', true)
        $(el.attr('rel')).find('g').text(el.find('span').text())
        $(el.attr('rel')).find('i').attr('class', 'fas fa-times')
        $(el.attr('rel')).find('g').append('<img src="">')
        $(el.attr('rel')).find('img').attr('src',el.find('img').attr('src'))
        $('.SelectAuthCategoryList').slideUp()
    }
}

function CheckAdImageHolder(el){
    var InputValue = el.val()
    var ImageName = InputValue.replace("C:\\fakepath\\", "");
    if(el.val().length === 0){
        el.parent().removeClass('AdImageSelected')
        el.parent().find('g y').text('صورة الإعلان')
    }else{
        el.parent().addClass('AdImageSelected')
        el.parent().find('g y').text(ImageName)
    }
}
