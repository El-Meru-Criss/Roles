<?php 

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$usuario = $_POST['usuario'];
$permiso = $_POST['permiso'];

$sql = "DELETE FROM `Permisos_has_Usuarios` 
WHERE `Usuarios_cc`= ".$usuario."
AND `Permisos_idPermisos` = ".$permiso."";

$conexion -> query ($sql);

$conexion = null;

?>