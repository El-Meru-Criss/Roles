<?php


require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$id_permiso = $_POST['id_permiso'];
$nom_per = $_POST['nom_per'];

$sql = "INSERT INTO `permisos`
(`idPermisos`, `Nom_Permiso`) 
VALUES (".$id_permiso.",'".$nom_per."')";

$conexion -> query ($sql);

$conexion = null;
?>