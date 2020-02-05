<?php 
require_once "global.php";

$conexion = new mysqli(HOST, USER, PASSWORD, DB);

mysqli_query($conexion, "SET NAMES '".ENCODE."'");

if(mysqli_connect_error())
{
   printf("Fallo en la conexión a la base de datos: %s\n", mysqli_connect_error());
   exit();
}
?>