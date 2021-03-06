$(() => {
    /**
     * *********************************************************    SIGN UP
     */
    $('#register_form').validate({
        rules: {
            first_name: {
                required: true,
                minlength: 3,
                alphaSpecial: true
            },
            last_name: {
                required: true,
                minlength: 3,
                alphaSpecial: true
            },
            email: {
                required: true,
                email: true,
                remote: '/check-email',
            },
            phone: {
                required: true,
                digits: true,
                minlength: 9,
                maxlength: 12,
                remote: '/check-phone',
            },
            gender: 'required',
            password: {
                required: true,
                minlength: 4
            },
            password_confirmation: {
                required: true,
                equalTo: '#password'
            }
        },
        messages: {
            first_name: {
                required: 'Please enter your first name.',
                minlength: 'Last name should be more than 3 characters long.'
            },
            last_name: {
                required: 'Please enter your last name.',
                minlength: 'Last name should be more than 3 characters long.'
            },
            email: {
                required: 'Please enter your email address',
                email: 'Please enter a valid email address',
                remote: 'This email is already in use.',
            },
            phone: {
                required: 'Please provide your phone number.',
                digits: 'Only numbers are allowed.',
                pattern: 'Invalid phone number',
                remote: 'This phone number is already in use.',
            },
            gender: 'Please choose your gender.',
            password: {
                required: 'Please provide a password.',
                minlength: 'Password must be at least 6 characters.',
            },
            password_confirmation: {
                required: 'Kindly confirm your new password.',
                equalTo: 'Both passwords must be the same.'
            }
        }
    });



    /**
     * *********************************************************    SIGN IN
     */
    $('#login_form').validate({
        rules: {
            email: {
                required: true,
            },
            password: 'required'
        },
        messages: {
            email: 'Your email address is required.',
            password: 'Your password is required.',
        }
    });



    /**
     * *********************************************************    CONTACT US
     */
    $('form#contact_us').validate({
        rules: {
            first_name: 'required',
            email: 'required|email',
            message: 'required',
        },
        messages: {
            first_name: 'Your email or phone number is required.',
            message: 'Please write your message before sending.',
        }
    });



    /**
     * *********************************************************    UPDATE PERSONAL DETAILS
     */
    $('#profile-form').validate({
        rules: {
            first_name: {
                required: true,
                minlength: 3,
            },
            last_name: {
                required: true,
                minlength: 3,
            },
        },
        messages: {
            first_name: {
                required: 'Please enter your first name.',
                minlength: 'Last name should be more than 3 characters long.'
            },
            last_name: {
                required: 'Please enter your last name.',
                minlength: 'Last name should be more than 3 characters long.'
            },
            phone: {
                required: 'Please provide your phone number.',
                digits: 'Only numbers are allowed.',
                pattern: 'Invalid phone number',
                remote: 'This phone number is already in use.',
            }
        }
    });



    $('#delivery-address-form').validate({
        rules: {
            county: 'required',
            sub_county: 'required',
            address: 'required'
        },
        messages: {
            county: 'Please select your County.',
            sub_county: 'please select your Sub-county.',
            address: 'Please input a small description of where your stay (like; house number, street/drive, estate/court)'
        }
    });



    $('form#mpesa_stk').validate({
        rules: {
            phone: {
                required: true,
                digits: true,
                minlength: 9,
                maxlength: 12,
            },
        },
        messages: {
            phone: {
                required: 'Please provide the phone number that will pay.',
                digits: 'Only numbers are allowed.',
                pattern: 'Invalid M-Pesa phone number',
            },
        },
    });
});
