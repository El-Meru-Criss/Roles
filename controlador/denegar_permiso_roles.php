<?php 

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$rol = $_POST['rol'];
$permiso = $_POST['permiso'];

$sql = "DELETE FROM `Permisos_has_Roles` 
WHERE `Permisos_idPermisos`= ".$permiso."
AND `Roles_idRoles`= ".$rol."";

$conexion -> query ($sql);

$conexion = null;

?>