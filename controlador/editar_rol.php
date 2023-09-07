<?php


require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$id_rol = $_POST['id_rol'];
$nom_rol = $_POST['nom_rol'];

$sql = "UPDATE `roles` SET `Nom_Rol` = ('".$nom_rol."') WHERE `roles`.`idRoles` = (".$id_rol.");";

$conexion -> query ($sql);

$conexion = null;
?>