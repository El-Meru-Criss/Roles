<?php 

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$rol = $_POST['rol'];
$permiso = $_POST['permiso'];

$sql = "INSERT INTO `Permisos_has_Roles`
(`Permisos_idPermisos`, `Roles_idRoles`, `estado_rol`) 
VALUES (".$permiso.",".$rol.",1)";

$conexion -> query ($sql);

$conexion = null;

?>