/*global $, document, window, setTimeout, navigator, console, location*/
$(document).ready(function () {

    $('.switch_2_login').click(function(){
        $('a.switch').click();
    })


    'use strict';

    var usernameError = true,
        emailError    = true,
        passwordError = true,
        nameError = true,
        enrlError = true,
        passConfirm   = false;

    // Detect browser for css purpose
    if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
        $('.form form label').addClass('fontSwitch');
    }

    // Label effect
    $('input').focus(function () {
        $(this).siblings('label').addClass('active');
    });

    // Form validation
    $('input').blur(function () {

        // Name
        if ($(this).hasClass('name')) {
            if ($(this).val().length === 0) {
                $(this).siblings('span.error').text('Please type your full name').fadeIn().parent('.form-group').addClass('hasError');
                nameError = true;
            } else if ($(this).val().length >= 1 && $(this).val().length < 3) {
                $(this).siblings('span.error').text('Please type at least 3 characters').fadeIn().parent('.form-group').addClass('hasError');
                nameError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                nameError = false;
            }
        }
        // Username
        if($(this).hasClass('username')){
            if ($(this).val().length === 0){
                $(this).siblings('span.error').text('Please enter the username').fadeIn().parent('.form-group').addClass('hasError');
            }
            else{
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                usernameError = false;
            }
        }
        // Email
        if ($(this).hasClass('email')) {
            if ($(this).val().length == '') {
                $(this).siblings('span.error').text('Please type your email address').fadeIn().parent('.form-group').addClass('hasError');
                emailError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                emailError = false;
            }
        }

        // PassWord
        if ($(this).hasClass('pass')) {
            if ($(this).val().length < 3) {
                $(this).siblings('span.error').text('Please type at least 3 charcters').fadeIn().parent('.form-group').addClass('hasError');
                passwordError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                passwordError = false;
            }
        }

        // PassWord confirmation
        if ($('.pass').val() !== $('.passConfirm').val()) {
            $('.passConfirm').siblings('.error').text('Passwords don\'t match').fadeIn().parent('.form-group').addClass('hasError');
        } else {
            $('.passConfirm').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
            passConfirm = true;
        }
        //Enrl. No.
        if($(this).hasClass('enrl')){
            if($(this).val().length !== 8){
                $(this).siblings('span.error').text('Enter Valid Enrollment No.').fadeIn().parent('.form-group').addClass('hasError');
            }
            else{
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                enrlError = false;
            }
        }

       //password_check
       if($(this).hasClass('login_password')){
           if($(this).val().length === 0){
            $(this).siblings('span.error').text('Please enter the password').fadeIn().parent('.form-group').addClass('hasError');
        } else{
            $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
        }

       }

        // label effect
        if ($(this).val().length > 0) {
            $(this).siblings('label').addClass('active');
        } else {
            $(this).siblings('label').removeClass('active');
        }
    });


    // form switch
    $('a.switch').click(function (e) {
        $(this).toggleClass('active');
        e.preventDefault();

        if ($('a.switch').hasClass('active')) {
            $(this).parents('.form-peice').addClass('switched').siblings('.form-peice').removeClass('switched');
        } else {
            $(this).parents('.form-peice').removeClass('switched').siblings('.form-peice').addClass('switched');
        }
    });


    // Form submit(sg)
    $('form.signup-form').submit(function (event) {
       
        event.preventDefault();

       if (nameError == true || emailError == true || passwordError == true || passConfirm == false || usernameError == true || enrlError == true ) {
            $('.name, .email, .pass, .passConfirm').blur();
        } else {

           var name = $('#reg_name').val();
           var username = $('#reg_username').val();
           var email = $('#email').val();
           var password = $('#password').val();
           var passwordCon = $('#passwordCon').val();
           var enrl = $('#enrl').val();
           var bhawan = $('#bhawan').val();
           var branch_y = $('#branch_y').val();

            $('.signup, .login').addClass('switched');
            setTimeout(function () { $('.signup, .login').hide(); }, 700);
            setTimeout(function () { $('.brand').addClass('active'); }, 300);
            setTimeout(function () { $('.heading').addClass('active'); }, 600);
            setTimeout(function () { $('.success-msg p').addClass('active'); }, 900);
            setTimeout(function () { $('.success-msg a').addClass('active'); }, 1050);
            setTimeout(function () { $('.form').hide(); }, 700);

            $.post("server.php",{
                reg_user: 1,
                reg_name: name,
                reg_username: username,
                password: password,
                passwordCon: passwordCon,
                email: email,
                enrl: enrl,
                branch_y: branch_y,
                bhawan: bhawan
            });

            
        }
    });

    $('form.login-form').submit(function (e){
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#loginPassword').val();
        $.post("server.php",{
            login_user: 1,
            username: username,
            password: password
        }, function(res){
            console.log(res);
            if(res === "1"){location.replace('welcome.php');}
            else{
                $('#loginPassword').val('');
                $('#loginPassword').siblings('span.error').text('Incorrect Password!').fadeIn().parent('.form-group').addClass('hasError');
            }
        })
    })

    // Reload page
    $('a.profile').on('click', function () {
        location.replace('welcome.php');
    });


});