function valcolor(color, tag) { // toggle Validation Icon
    'use strict';
    if (tag.hasClass('invalid')) {
        if (color === 'valid') {
            tag.removeClass('invalid').addClass('valid');
        }
    } else if (tag.hasClass('valid')) {
        if (color === 'invalid') {
            tag.removeClass('invalid').addClass('valid');
        }
    } else {
        tag.addClass(color);
    }
}
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

    //AJAX VALIDATION
    $('.fullname').blur(function() {
        'use strict';
        var name = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'processor/ajaxValidation.php',
            data: { name: name },
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.color !== 'valid') {
                    Materialize.toast(data.txt, 4000);
                }
                valcolor(data.color, $(this));
            }
        });
    });
    $('.email').blur(function() {
        'use strict';
        var email = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'processor/ajaxValidation.php',
            data: { email: email },
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.color !== 'valid') {
                    Materialize.toast(data.txt, 4000);
                }
                valcolor(data.color, $(this));
            }
        });
    });
    $('.phone').blur(function() {
        'use strict';
        var phone = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'processor/ajaxValidation.php',
            data: { phone: phone },
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.color !== 'valid') {
                    Materialize.toast(data.txt, 4000);
                }
                valcolor(data.color, $(this));
            }
        });
    });
    $('.address').blur(function() {
        'use strict';
        var address = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'processor/ajaxValidation.php',
            data: { address: address },
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.color !== 'valid') {
                    Materialize.toast(data.txt, 4000);
                }
                valcolor(data.color, $(this));
            }
        });
    });
    $('.password').blur(function() {
        'use strict';
        var password = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'processor/ajaxValidation.php',
            data: { name: name },
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.color !== 'valid') {
                    Materialize.toast(data.txt, 4000);
                }
                valcolor(data.color, $(this));
            }
        });
    });

    //Sign Up
    $('.signUpButton').click(function() {
        var name = $('.fullname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address = $('.address').val();
        var password = $('.password').val();
        var user = $('.select-dropdown li.selected span').html();
        if (user != undefined) {
            $.ajax({
                url: 'processor/signup.php',
                type: 'POST',
                dataType: 'json',
                cache: false,
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    address: address,
                    password: password,
                    user: user,
                    signUp: ''
                },
                beforeSend: function() {
                    $('.upprogress').toggleClass('hide');
                },
                success: function(data) {
                    $('.upprogress').toggleClass('hide');
                    // Reloads the page if login Successful
                    if (data.color === 'valid') {
                        Materialize.toast(data.txt, 4000);
                        window.location.reload('true');
                    } else {
                        Materialize.toast(data.txt, 4000);
                    }

                }
            });
        }
        return false;
    });
    // Login Function
    $('.signinbutton').click(function() {
        var email = $('.inemail').val();
        var password = $('.inpassword').val();
        $.ajax({
            url: 'processor/signin.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            data: {
                email: email,
                password: password,
                logIn: ''
            },
            beforeSend: function() {
                $('inprogress').toggleClass('hide');
            },
            success: function(data) {
                $('inprogress').toggleClass('hide');
                // Reloads the page if login Successful
                if (data.color === 'valid') {
                    Materialize.toast(data.txt, 4000);
                    if (data.type == 'Passenger') {
                        window.location.assign('index.php?home');
                    } else if (data.type == 'Driver') {
                        window.location.assign('index.php?driver');
                    }
                } else {
                    Materialize.toast(data.txt, 4000);
                }
            }
        });
        return false;
    });
})();