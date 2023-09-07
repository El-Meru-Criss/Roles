<?php 

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$usuario = $_POST['usuario'];
$permiso = $_POST['permiso'];

$sql = "INSERT INTO `Permisos_has_Usuarios`
(`Permisos_idPermisos`, `Usuarios_cc`, `estado_usuario`) 
VALUES (".$permiso.",".$usuario.",1)";

$conexion -> query ($sql);

$conexion = null;

?>