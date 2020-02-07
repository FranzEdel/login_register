<?php 
require_once "models/Usuario.php";

$user = new Usuario();

$nombre = "prueba";
$correo = "prueba@mail.com";
$usuario = "prueba";
$password = "prueba";

/* if($user->RegistrarUsuario($nombre, $correo, $usuario, $password))
{
   echo "Exitoso";
} else {
   echo "Error";
} */

if($user->ValidarUsuario($usuario, $password))
{
   echo "Encontrado";
} else {
   echo "No encontrado";
}

?>