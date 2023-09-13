<?php


require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$nom_libros = $_POST['nom_libro'];

$sql = "INSERT INTO `libros`
(`idlibros`, `titulo`) 
VALUES (NULL,'".$nom_libros."')";

$conexion -> query ($sql);

$conexion = null;
?>