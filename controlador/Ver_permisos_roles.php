<?php

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$sql = "SELECT `idRoles`, `Nom_Rol` FROM `Roles`";

$roles = $conexion -> query ($sql);

//$datos = $consulta->fetchAll();

//$json = json_encode($datos);

//header("Content-Type: application/json");

//echo $json;

echo "ID - NOMBRE - PERMISOS <br>";
while ($rol = $roles->fetch(PDO::FETCH_ASSOC)) {

    // Haz algo con los datos, por ejemplo, imprimirlos
    
    echo $rol['idRoles']." - ".$rol['Nom_Rol']." - ";

    $sql = "SELECT Permisos.Nom_Permiso, `estado_rol` 
    FROM `Permisos_has_Roles`
    INNER JOIN Permisos 
    ON Permisos.idPermisos = Permisos_has_Roles.Permisos_idPermisos
    WHERE `Roles_idRoles` = ".$rol['idRoles']."";

    $permisos = $conexion -> query ($sql);

    while ($permiso = $permisos->fetch(PDO::FETCH_ASSOC)) {
        echo $permiso['Nom_Permiso'].", ";
    }

    echo "<br>";

}

$conexion = null;



?>