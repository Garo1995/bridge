$(document).ready(function () {
    setTimeout(function () {
        $(".loading-main").addClass("loading-rem");
        $(".opacity-zero").addClass("opacity");
        $(".body").addClass("body-fix");
    }, 2000);

    setTimeout(function () {
        $(".about-text").addClass("about-anime");
        $(".concat-page").addClass("concat-page-anime");
    }, 500);


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















const revealOnScroll = () => {
    const elementsToReveal = document.querySelectorAll('.animate-on-scroll');
    const triggerPoint = window.innerHeight * 0.85;

    elementsToReveal.forEach((element) => {
        const elementTop = element.getBoundingClientRect().top;

        if (elementTop < triggerPoint) {
            element.classList.add('visible');
        }
    });
};

// 🔄 Attach listeners
window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);









(function () {
    const photo = document.getElementById('parallax-photo');
    const img   = document.getElementById('parallax-img');

    if (!photo || !img) return;

    // Сила параллакса: 0.15 = лёгкое движение, 0.3 = заметное
    const SPEED = 0.15;

    function onScroll() {
        const rect       = photo.getBoundingClientRect();
        const windowH    = window.innerHeight;

        // Считаем позицию блока относительно центра экрана
        const centerOffset = rect.top + rect.height / 2 - windowH / 2;

        // Сдвигаем картинку
        const shift = centerOffset * SPEED;

        img.style.transform = `translateY(${shift}px)`;
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // вызов сразу при загрузке
})();
