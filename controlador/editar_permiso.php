<?php


require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$id_permiso = $_POST['id_permiso'];
$nom_per = $_POST['nom_per'];

$sql = "UPDATE `permisos` SET `Nom_Permiso` = ('".$nom_per."') WHERE `permisos`.`idPermisos` = (".$id_permiso.");";

$conexion -> query ($sql);

$conexion = null;
?>