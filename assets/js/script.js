$(document).ready(function () {
    setTimeout(function () {
        $(".loading-main").addClass("loading-rem");
        $(".opacity-zero").addClass("opacity");
    }, 1000);


});








$(document).ready(function () {
    $('.open-menu').on('click', function () {
        $(this).toggleClass('close-menu');
        if ($(this).hasClass('close-menu')) {
            $('.nav-menu').addClass('transition-menu');
            $('body').addClass('body_fix');
        } else {
            $('body').removeClass('body_fix');
            $('.nav-menu').removeClass('transition-menu');
        }
    });
    $('.nav-menu a').on('click', function () {
        $('body').removeClass('body_fix');
        $('.nav-menu').removeClass('transition-menu');
        $('.open-menu').removeClass('close-menu');
    })
});
