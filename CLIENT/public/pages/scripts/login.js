var Login = function() {


    var handleLogin = function() {
        var form2 = $('#formulario-login');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                username: {
                    required: "El nombre de usuario es requerido.",
                },
                password: {
                    required: "La contraseña es requerida."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function(error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
                checkLoginAccess(success2, error2);
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    checkLoginAccess();
                }
                return false;
            }
        });
    }

    var handleForgetPassword = function() {
        var form2 = $('#forget-form');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                email: {
                    required: "El correo electrónico es obligatorio.",
                    email: "Porfavor, ingrese una dirección de correo electrónico válida"
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function(error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group

            },

            submitHandler: function(form) {
                sendEmailPassword(success2, error2);
            }
        });



    }


    return {
        init: function() {
            handleLogin();
            handleForgetPassword();
        }
    };

}();

function checkLoginAccess(success2, error2) {
    var options = {
        element: $("#formulario-login"),
        background: $("body"),
        message: 'Cargando...'
    };
    App.myStartPageLoading(options);
    $.ajax({
        method: "POST",
        url: "/login",
        data: $(".login-form").serialize()
    }).done(function (data) {
        if(data["token"] === undefined){
            if(data["error"] == "invalid_credentials") {
                $(".alert-danger span").html("Datos incorrectos.")
                $('.alert-danger', $('.login-form')).show();
            } else if(data["error"] == "could_not_create_token") {
                $(".alert-danger span").html("Error al crear inicio de sesión..")
                $('.alert-danger', $('.login-form')).show();
            }
            success2.show();
            error2.hide();
        }else{
            App.mystopPageLoading();
            //alert(data["token"]);
            $(".alert-danger", $(".login-form")).hide();
            $("#login-btn").attr("disabled", "disabled");
            //setToken(data["token"]);
            window.location.href = "/";
        }
    });
}


function sendEmailPassword(success2, error2) {
    var options = {
        element: $("#forget-form"),
        background: $("body"),
        message: 'Cargando...'
    };
    App.myStartPageLoading(options);
    $.ajax({
        method: "POST",
        url: "/password/email",
        data: $("#forget-form").serialize()
    }).done(function (data) {
        App.mystopPageLoading();
        var correo = $("#email").val();
        if(data.token != null){
           $(".alert-success span").html('Se ha enviado un correo electrónico con un elace para restablecer su contraseña a  <b>' + correo  + '</b>.').show();
       }else {
           $(".alert-danger span").html("Error al enviar el correo.").show();
       }
        success2.show();
        error2.hide();
        setTimeout(function () {
            $("#back-btn").trigger('click');
        }, 3500);
    });
}



jQuery('#forget-password').click(function() {
    jQuery('.login-form').hide();
    jQuery('.forget-form').show();
});

jQuery('#back-btn').click(function() {
    jQuery('.login-form').show();
    jQuery('.forget-form').hide();
});


function setToken(token) {
    $.ajax({
        method: "POST",
        url: "/setToken",
        data: {"token": token}
    }).done(function (data) {
    });
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

jQuery(document).ready(function() {
    Login.init();
    $(".icon-logout").on('click', function (e) {
        window.location.href = "/logout";
    });
});
