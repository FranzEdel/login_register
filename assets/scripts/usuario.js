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
                location.href = 'admin.php';
            } else if (response == 'notfound') {
                msg = '<div class="alert alert-danger mb-2"><strong>Oh no!!</strong> El usuario ó password es incorrecto</div>';
                $('#status_login').html(msg);
            } else if (response == 'required') {
                msg = '<div class="alert alert-danger mb-2"><strong>Oh no!!</strong> Datos incompletos</div>';
                $('#status_login').html(msg);
            }

            LimpiarController();
        }
    });
}

function LimpiarController() {
    $('#usuario').val('');
    $('#password').val('');
}

function LimpiarRegister() {
    $('#form_nombre').val('');
    $('#form_correo').val('');
    $('#form_user').val('');
    $('#form_pass').val('');
}

function RegistrarUsuario() {
    nombre = $('#form_nombre').val();
    correo = $('#form_correo').val();
    usuario = $('#form_user').val();
    password = $('#form_pass').val();

    parametros = {
        "nombre": nombre,
        "correo": correo,
        "usuario": usuario,
        "password": password
    }

    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'controllers/UsuarioController.php?opcion=registrar_usuario',
        beforeSend: function() {},
        success: function(response) {
            //console.log(response);
            if (response == "success") {
                alert("Registro Correcto");
                location.href = "index.php";
            } else if (response == "notfound") {
                msg = '<strong> Oh no !</strong> ' + 'Los datos son incorrectos.';
            } else if (response == "required") {
                msg = '<strong> Oh no !</strong> ' + 'Tiene que completar todos los datos.';
            }
            $('#status_register').html(msg);
        }

    });
}