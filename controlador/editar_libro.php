<?php


require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$id_libro = $_POST['id_libro'];
$nom_libro = $_POST['nom_libro'];

$sql = "UPDATE `libros` SET `titulo` = ('".$nom_libro."') WHERE `libros`.`idlibros` = (".$id_libro.");";

$conexion -> query ($sql);

$conexion = null;
?>