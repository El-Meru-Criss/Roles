<?php
require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

session_start(); // Iniciar la sesión (debe hacerse al principio de cada script)
$cc = $_SESSION['cc']; // Recuperar el CC del usuario desde la variable de sesión
$Roles_idRoles = $_SESSION['Roles_idRoles']; // Recuperar el Rol del usuario desde la variable de sesión

$sql = "SELECT `Permisos_idPermisos` 
FROM `permisos_has_roles` 
WHERE `Roles_idRoles` = ".$Roles_idRoles." 
AND `Permisos_idPermisos` = 2";
$permisos_rol = $conexion->query($sql);

$sql = "SELECT estado_usuario
FROM `Permisos_has_Usuarios`
WHERE `Usuarios_cc` = ".$cc."
AND `Permisos_idPermisos` = 2";
$permisos_usuarios = $conexion->query($sql);
$permiso_usuario = $permisos_usuarios->fetch(PDO::FETCH_ASSOC);

if ($permiso_usuario == false) {
    $permiso_usuario['estado_usuario'] = 2;
}

if ($permisos_rol->rowCount() > 0 && $permiso_usuario['estado_usuario'] != 0) { 
    // El resultado no está vacío, hay al menos una fila que cumple con la condición
    $sql = "SELECT idlibros, titulo FROM libros ORDER BY idlibros ASC ";
    $resultado = $conexion->query($sql);

    echo "<h1>LISTA DE LIBROS</h1>";
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>titulo</th>";
    echo "<th>Editar</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {

        echo "<tr>";
        echo "<td>" . $fila['idlibros'] . "</td>";
        echo "<td>" . $fila['titulo'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

} else {
    $sql = "SELECT idlibros, titulo FROM libros ORDER BY idlibros ASC ";
    $resultado = $conexion->query($sql);
    if ($permiso_usuario['estado_usuario'] == 1) {
        echo "<h1>LISTA DE LIBROS</h1>";
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>titulo</th>";
        echo "<th>Editar</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {

            echo "<tr>";
            echo "<td>" . $fila['idlibros'] . "</td>";
            echo "<td>" . $fila['titulo'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    }
}




?>