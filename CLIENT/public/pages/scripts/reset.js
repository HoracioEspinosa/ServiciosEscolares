var FormValidation = function () {
    // validation using icons
    var handleValidation9 = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form2 = $('#formulario-reset');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                password: {
                    minlength: 8,
                    required: true
                },
                retypepassword: {
                    minlength: 8,
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: "La contraseña es requerida.",
                    minlength: "La contraseña debe de tener almenos 8 carácteres."
                },
                retypepassword: {
                    required: "Favor de confirmar la contraseña.",
                    minlength: "La contraseña debe de tener almenos 8 carácteres.",
                    equalTo: "Las contraseñas no coinciden."
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
                resetPassword(success2, error2);
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation9();
        }
    };
}();


function resetPassword(success2, error2) {
    var options = {
        element: $("#formulario-reset"),
        background: $("body"),
        message: 'Cargando...'
    };
    App.myStartPageLoading(options);
    if($("#token") != '' || $("#token") != null){
        $.ajax({
            method: "POST",
            url: "/password/reset",
            data: $("#formulario-reset").serialize()
        }).done(function (data) {
            App.mystopPageLoading();
            console.log(data);
            if(!data.error){
                $(".alert-success span").html('Se ha restablecido la contraseña correctamente.').show();
                setTimeout(function () {
                    window.location.href = '/login';
                },3500);
            }else {
                $(".alert-danger span").html("Error al restablecer la contraseña.").show();
            }
            success2.show();
            error2.hide();
        });
    }
}
jQuery(document).ready(function() {
    FormValidation.init();
});