<?php 
session_start();
require_once "../models/Usuario.php";

$user = new Usuario();

switch($_REQUEST['opcion'])
{
   case 'validar_usuario':
      if(isset($_POST['usuario'], $_POST['password']) && !empty($_POST['usuario']) && !empty($_POST['password']))
      {
         if($usu = $user->ValidarUsuario($_POST['usuario'], $_POST['password']))
         {
            foreach($usu as $campo => $valor)
            {
               $_SESSION['usu'][$campo] = $valor;
            }
            $response = 'success';
         } else {
            $response = 'notfound';
         }
      } else {
         $response = 'required';
      }

      echo $response;
   break;

   case 'cerrar_sesion':
      unset($_SESSION['usu']);
      header('Location: ../');
   break;
}


?>