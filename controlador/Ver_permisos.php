<?php

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$sql = "SELECT `idPermisos`, `Nom_Permiso` FROM `permisos`";

$permisos = $conexion -> query ($sql);

//$datos = $consulta->fetchAll();

//$json = json_encode($datos);

//header("Content-Type: application/json");

//echo $json;

echo "ID - NOMBRE  <br>";
while ($per = $permisos->fetch(PDO::FETCH_ASSOC)) {

    // Haz algo con los datos, por ejemplo, imprimirlos
    
    echo $per['idPermisos']." - ".$per['Nom_Permiso']." - ";

    echo "<br>";

}

$conexion = null;



?>