function ValidarUsuario() {
    usuario = $('#usuario').val();
    password = $('#password').val();

    parametros = {
        'usuario': usuario,
        'password': password
    }

    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'controllers/UsuarioController.php?opcion=validar_usuario',
        success: function(response) {
            //console.log(response);
            if (response == 'success') {
                location.href = 'admin.php'
            } else if (response == 'notfound') {
                msg = '<div class="alert alert-danger mb-2"><strong>Oh no!!</strong> El usuario ó password es incorrecto</div>';
            } else if (response == 'required') {
                msg = '<div class="alert alert-danger mb-2"><strong>Oh no!!</strong> Datos incompletos</div>';
            }
            $('#status_login').html(msg)
            LimpiarController();
        }
    });
}

function LimpiarController() {
    $('#usuario').val('');
    $('#password').val('');
}