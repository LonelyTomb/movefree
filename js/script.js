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
                }
            }).done(function(data) {
                $('.upprogress').toggleClass('hide');
                // Reloads the page if login Successful
                if (data.color === 'valid') {
                    Materialize.toast(data.txt, 4000);
                    window.location.reload('true');
                } else {
                    Materialize.toast(data.txt, 4000);
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
                $('.inprogress').toggleClass('hide');
            }
        }).done(function(data) {
            $('.inprogress').toggleClass('hide');
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
        });
        return false;
    });
    $('.reservebutton').click(function() {
        var place = $('.place').val();
        var destination = $('.destination').val();
        var price = $('.price').val();
        price = parseInt(price, 10);
        var payment = $('.payType .select-dropdown li.selected span').html();
        var time = $('.time').val();
        var time_suffix = $('.time_suffix .select-dropdown li.selected span').html();
        $.ajax({
            url: 'processor/processform.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            data: {
                place: place,
                destination: destination,
                price: price,
                payment: payment,
                time: time,
                time_suffix: time_suffix,
                reserve: ''
            },
            beforeSend: function() {
                $('.reservationForm .progress').toggleClass('hide');
            }
        }).done(function(data) {
            $('.reservationForm .progress').toggleClass('hide');
            if (data.txt === 'success') {
                $('.reserved .res_type').html(data.type);
                $('.reserved .res_time').html(time);
                $('.reserved .res_time_suffix').html(time_suffix);
                $('.reserved .res_destination').html(destination);
                $('.reserved .res_price').html(price);
                $('.reserved').modal();
                $('.reserved').modal('open');
                window.location.assign('index.php?history');
            } else if (data.txt === 'error') {
                Materialize.toast(data.desc, 4000);
            }

        });
        return false;

    });

    $('.accept ').click(function() {
        var passenger = $('.passenger_id').val();
        var driver = $('.driver_id').val();
        var res_id = $('.res_id').val();
        var name = $('.name').html();
        var type = $('.type').html();
        var time = $('.initial').html();
        var destination = $('.pdest').html();
        var price = $('.price span').html();
        $.ajax({
            url: 'processor/selectPassenger.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            data: {
                passenger: passenger,
                driver: driver,
                res_id: res_id,
                complete: ''
            },
            beforeSend: function() {
                $('.status .progress').toggleClass('hide');
            }
        }).done(function(data) {
            $('.status .progress').toggleClass('hide');
            if (data.txt === 'success') {
                $('.passengerSel .res_name').html(name);
                $('.res_type').html(type);
                $('.passengerSel .res_time').html(time);
                $('.passengerSel .res_destination').html(destination);
                $('.passengerSel .res_price').html(price);
                $('.passengerSel').modal();
                $('.passengerSel').modal('open');
                window.location.assign('index.php?history');
            } else {
                Materialize.toast(data.desc, 4000);
            }
        });
        return false;
    });
    $('.decline').click(function() {
        window.location.assign('index.php?driver');
    });
    $('a.payment').click(function() {
        var type = $('.cardType .select-dropdown li.selected span').html();
        var number = $('.cardNumber').val();
        var cv = $('.cV').val();
        var res_id = $('.res_id').val();
        var driver_id = $('.driver_id').val();
        $.ajax({
            url: 'processor/processCard.php',
            type: 'POST',
            dataType: 'json',
            cache: false,
            data: {
                type: type,
                number: number,
                cv: cv,
                res_id: res_id,
                driver_id: driver_id,
                pay: ''
            },
            beforeSend: function() {
                $('.status .progress').toggleClass('hide');
            }
        }).done(function(data) {
            $('.status .progress').toggleClass('hide');
            if (data.txt === 'success') {
                var ref = window.location.href + "&driver_id=" + data.driver_id + "&res_id=" + data.res_id + "&success";
                window.location.assign(ref);
            } else {
                Materialize.toast(data.desc, 4000);
            }
        });

        return false;
    });
})();