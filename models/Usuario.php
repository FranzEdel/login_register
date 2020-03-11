<?php 
require_once "../config/Conexion.php";

class Usuario
{
   public $conexion;

   function __construct()
   {
      $this->conexion = Conexion::ConectarDB();
   }

   public function RegistrarUsuario($nombre, $correo, $usuario, $password)
   {
      $password_hash = password_hash($password, PASSWORD_DEFAULT);

      $query = "INSERT INTO usuarios(nombre,correo,usuario,password) VALUES(?, ?, ?, ?)";
      $result = $this->conexion->prepare($query);
      $result->bind_param('ssss',$nombre, $correo, $usuario, $password_hash);
      if($result->execute())
      {
         return true;
      }
      return false;

   }

   public function ValidarUsuario($usuario, $password)
   {
      $query = "SELECT * FROM usuarios WHERE usuario = ?";
      $result = $this->conexion->prepare($query);
      $result->bind_param('s',$usuario);
      $result->execute();
      $fila = $result->get_result()->fetch_assoc();
      //var_dump($fila);

      if($fila && password_verify($password, $fila['password']))
      {
         return $fila;
      }
      return false;
   }

   public function ListarUsuarios()
   {
      $query = "SELECT * FROM usuarios";
      $result = $this->conexion->prepare($query);
      return false;

   }
}

?>