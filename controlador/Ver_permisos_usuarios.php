<?php

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$sql = "SELECT `cc`, `Nombre`, Roles.Nom_Rol FROM `Usuarios` 
    INNER JOIN Roles ON Roles.idRoles = Usuarios.Roles_idRoles";

$usuarios = $conexion -> query ($sql);

//$datos = $consulta->fetchAll();

//$json = json_encode($datos);

//header("Content-Type: application/json");

//echo $json;

echo "CC - NOMBRE - ROL - PERMISOS ADICIONALES <br>";
while ($usuario = $usuarios->fetch(PDO::FETCH_ASSOC)) {

    // Haz algo con los datos, por ejemplo, imprimirlos
    
    echo $usuario['cc']." - ".$usuario['Nombre']." - ".$usuario['Nom_Rol']." - ";

    $sql = "SELECT Permisos.Nom_Permiso 
    FROM `Permisos_has_Usuarios`
    INNER JOIN Permisos 
    ON Permisos.idPermisos = Permisos_has_Usuarios.Permisos_idPermisos
    WHERE `Usuarios_cc` = ".$usuario['cc']."";

    $permisos = $conexion -> query ($sql);

    while ($permiso = $permisos->fetch(PDO::FETCH_ASSOC)) {
        echo $permiso['Nom_Permiso'].", ";
    }

    echo "<br>";

}

$conexion = null;



?>