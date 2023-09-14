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

    $sql = "SELECT Permisos.Nom_Permiso, estado_usuario
    FROM `Permisos_has_Usuarios`
    INNER JOIN Permisos 
    ON Permisos.idPermisos = Permisos_has_Usuarios.Permisos_idPermisos
    WHERE `Usuarios_cc` = ".$usuario['cc']."";

    $permisos = $conexion -> query ($sql);

    while ($permiso = $permisos->fetch(PDO::FETCH_ASSOC)) {
        if ($permiso['estado_usuario'] == 0) {
            echo "<b style='color: red;'>".$permiso['Nom_Permiso']."</b>, ";
        } else {
            echo "<b style='color: blue;'>".$permiso['Nom_Permiso']."</b>, ";
        }
        
    }

    echo "<br>";

}

$conexion = null;



?>