<?php 

class Conexion
{
   static function ConectarDB()
   {
      try
      {
         require_once "global.php";

         $conexion = new mysqli(HOST, USER, PASSWORD, DB);

         mysqli_query($conexion, "SET NAMES '".ENCODE."'");

         return $conexion;

      } catch(Exception $ex) {
         die($ex->getMessage());
      }
   }
}

?>