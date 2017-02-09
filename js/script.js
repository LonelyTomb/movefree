(function() {

    $('.carousel-slider').slider();
    $('.carousel.carousel-slider').carousel({ full_width: true });
    $('.home-menu').sideNav();
    $('select').material_select();
    $('body').keyup(function(e) {
        switch (e.which) {
            case 37: // left
                $('.carousel').carousel('next');
                break;
            case 39: //right
                $('.carousel').carousel('prev');
                break;
            default:
                return;
        }
        e.preventDefault();
    });
})();