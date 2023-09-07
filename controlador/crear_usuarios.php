<?php 

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$cc= $_POST['cedula'];
$Nombre= $_POST['nombre'];
$contraseña=$_POST['contraseña'];
$Roles_idRoles = $_POST['permiso'];
$encript_contraseña =md5($contraseña);

$sql = " INSERT INTO usuarios( cc, Nombre, contraseña, Roles_idRoles) VALUES ('$cc', '$Nombre', '$encript_contraseña', '$Roles_idRoles')";


echo "contraseña encriptada: ".$encript_contraseña;
$conexion -> query ($sql);

$conexion = null;

?>