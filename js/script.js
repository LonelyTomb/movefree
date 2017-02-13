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
    // $('.reserved').modal();
    // $('.reserved').modal('open');
    $('p.review').addRating({ 'icon': 'star' });
    $('.buttonGroup a').click(function() {
        if ($(this).hasClass('signinbtn')) {
            if (!$('.signup').hasClass('hide')) {
                $('.signup').addClass('hide');
            }
            $('.signin').toggleClass('hide');
        } else if ($(this).hasClass('signupbtn')) {
            if (!$('.signin').hasClass('hide')) {
                $('.signin').addClass('hide');
            }
            $('.signup').toggleClass('hide');
        }
    });
})();