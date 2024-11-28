const module = 'user';
let mode = 'signin', login = false;

$(document).ready(function(){

    signinSignupModalHandler()

});

$(document).on('click', '#login-profile', function(){
    signinSignupModalHandler()
})

$(document).on('click', '.show-ls-popup', function(){
 
    mode = $(this).attr('show')
    modeCheck()
})

$(document).on('click', "#signup-signin-submit", function () {

    $(".error").hide();

    let formObject = {
        type : 'message',
        formData : formDataHandler()
    }

    FORM_VALIDATION(formObject, function(result){
        
        if(result?.error) {
            $(`.${result.class}`).html(result.error).show()
            return
        }

        if(mode == "signin"){
            signinUser()
        } else {
            signupUser()
        }

    })
  
})

$(document).on('click', '.logoutUser', function(){
    logoutUser()
})

$(document).on('click', '.password-eye', function(){
    if($(this).hasClass('fa-eye')){
        $('#password').attr('type', 'password')
        $(this).addClass('fa-eye-slash').removeClass('fa-eye')
        return
    }

    $('#password').attr('type', 'text')
    $(this).removeClass('fa-eye-slash').addClass('fa-eye')
    
})

function formDataHandler(){

    let loginFormDetails = [
        {
            class: "email_id",
            error: "Please entrer the email id"
        },
        {
            class: "email_id",
            error: "Please entrer a proper email id",
            regex: "[A-Za-z0-9\._%+\-]+@[A-Za-z0-9\.\-]+\.[A-Za-z]{2,}"
        },
        {
            class: "password",
            error: "Please entrer the password"
        }
    ]

    if(mode == 'signin'){
        return loginFormDetails
    }

    let signinFormData = [
        {
            class: "first_name",
            error: "Please entrer the first name"
        },
        {
            class: "last_name",
            error: "Please entrer the last name"
        },
        {
            class: "mobile_number",
            error: "Please entrer the mobile number"
        },
        {
            class: "mobile_number",
            error: "Please entrer a proper mobail number",
            regex: "[6-9][0-9]{9}$"
        }
    ]

    return signinFormData.concat(loginFormDetails)
}

function logincheck(){

    let userdata = localStorage.getItem('user_data')

    if(!userdata) return false

    return true
    
}

function signinUser(){

    let fields  = {
        'email_id' : $('#email_id').val(),
        'password' : $('#password').val(),
    };

    $.ajax({
        type: "POST",
        url: base_url + 'signin' + module,
        data: fields,
        dataType: "json",
        success: function (response) {
            handelUserResponseForm(response)
            signinSignupModalHandler()
        },
        error: function (err) {
            console.log("Error :" + err);
        },
    });
}

function logoutUser(){
    localStorage.clear()
    window.location.href = base_url
}

function signupUser(){
    let data = GETFORMDATA('signup_signin_form');

    POST({module, data}).then((response) => {
        if(response.code == '200'){
            localStorage.setItem("user_data", response.data)
        }

        TOASTER_HANDLER(response)
        signinSignupModalHandler()
    });
}

function handelUserResponseForm(response){

    if(response.code == '200'){
        localStorage.setItem("user_data", response.data)
        TOASTER_HANDLER(response)
        return
    }

    ALERTMESSAGE_HANDLER({
        message : response.msg,
        type : 'danger'
    })
}

function modeCheck(){
    
    let text = 'Sign In',
    form = $('#signup_signin_form')[0];

    form.reset()
    $('.ls-content').hide()
    $(`.${mode}-content`).show()
    $('.input-group').hide()
    $('.signin-form-element').show()
    $('.text-danger').hide()

    if(mode == 'signup'){
        text = 'Sign Up'
        $('.input-group').show()
        $(`.${mode}-content`).show()
    }

    $('.signin_signu-modal-title').html('Petz24 ' + text)
    $('#signup-signin-submit').html(text)
    
}

function signinSignupModalHandler(){

    loginFlag = logincheck()

    if(!loginFlag){
        modeCheck()
        $('#signin_signup_popup').modal('show')
        $('#login-avathor').show()
        $('#user-avathor').hide()
        return
    }

    $('#signin_signup_popup').modal('hide')
    $('#user-avathor').show()
    $('#login-avathor').hide()
}