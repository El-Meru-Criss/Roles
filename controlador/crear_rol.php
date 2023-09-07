<?php


require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$id_rol = $_POST['id_rol'];
$nom_rol = $_POST['nom_rol'];

$sql = "INSERT INTO `roles`
(`idRoles`, `Nom_Rol`) 
VALUES (".$id_rol.",'".$nom_rol."')";

$conexion -> query ($sql);

$conexion = null;
?>