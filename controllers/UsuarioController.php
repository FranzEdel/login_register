<?php 
require_once "../models/Usuario.php";

$user = new Usuario();

switch($_REQUEST['opcion'])
{
   case 'validar_usuario':
      if(isset($_POST['usuario'], $_POST['password']) && !empty($_POST['usuario']) && !empty($_POST['password']))
      {
         if($user->ValidarUsuario($_POST['usuario'], $_POST['password']))
         {
            $response = 'success';
         } else {
            $response = 'notfound';
         }
      } else {
         $response = 'required';
      }

      echo $response;
   break;
}


?>