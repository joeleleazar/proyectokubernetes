var getUrl = window.location;
var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
var spinner = '<div class="spinner-border" role="status"><span class="visually-hidden">Registrando...</span></div>';

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

$(document).ready(function() {
    $("#btnCrearTabla").on("click", function() {
        fetch(base_url + "Login/crearTabla")
            .then(response => response.json())
            .then(data => {
                Toast.fire({
                    icon: data.icon,
                    title: data.texto
                })
            });
    });

    $('#frmInicioSesion').validate({ // initialize the plugin
        ignore: "",
        rules: {
            email: {
                required: true,
                email: true
            },
            password: 'required'
        },
        messages: {
            email: "Debe ingresar un correo",
            password: "Debe ingresar la contraseña"
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
    });

    $('#frmRegistroUsuario').submit(function(e) {
        e.preventDefault();
    }).validate({

        rules: {
            nombres: "required",
            primerApellido: "required",
            segundoApellido: "required",
            email: {
                email: true,
                required: true,
            },
            nombreUsuario: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            contrasenha: "required",
        },
        messages: {
            nombres: "Campor requerido",
            primerApellido: "Campor requerido",
            segundoApellido: "Campor requerido",
            email: {
                email: "Debe registrar un correo válido",
                required: "Campo requerido",
            },
            nombreUsuario: {
                required: "Campo requerido",
                minlength: "Debe contener más de 8 digitos",
                maxlength: "Debe contener menos de 15 digitos"
            },
            contrasenha: "Campor requerido",
        },
        submitHandler: function() {
            $.ajax({
                url: base_url + "Login/registroUsuario",
                type: "POST",
                data: $('#frmRegistroUsuario').serialize(),
                beforeSend: function() {
                    Swal.fire({
                        title: 'Registrando usuario...',
                        text: 'Espere unos segundos por favor',
                        html: spinner,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                    });
                },
                success: function(response) {
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.texto
                        })
                        $('#registroModal').modal('hide');
                    } else {
                        Toast.fire({
                            icon: 'warning',
                            title: response.texto
                        })
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error interno'
                    })
                }
            });
        }

    });


})