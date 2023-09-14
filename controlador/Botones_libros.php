<?php 

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

session_start(); // Iniciar la sesión (debe hacerse al principio de cada script)
$cc = $_SESSION['cc']; // Recuperar el CC del usuario desde la variable de sesión
$Roles_idRoles = $_SESSION['Roles_idRoles']; // Recuperar el Rol del usuario desde la variable de sesión

// Boton crear libro ----------------------------------------------------------------------------

$sql = "SELECT `Permisos_idPermisos` 
FROM `permisos_has_roles` 
WHERE `Roles_idRoles` = ".$Roles_idRoles." 
AND `Permisos_idPermisos` = 1";
$permisos_rol_crear = $conexion->query($sql);

$sql = "SELECT estado_usuario
FROM `Permisos_has_Usuarios`
WHERE `Usuarios_cc` = ".$cc."
AND `Permisos_idPermisos` = 1";
$permisos_usuarios = $conexion->query($sql);
$permiso_usuario_crear = $permisos_usuarios->fetch(PDO::FETCH_ASSOC);

if ($permiso_usuario_crear == false) {
    $permiso_usuario_crear['estado_usuario'] = 2;
}

if ($permisos_rol_crear->rowCount() > 0 && $permiso_usuario_crear['estado_usuario'] != 0) { 
    // El resultado no está vacío, y no tiene restringido la funcion
    echo '<button onclick="crear_libro()">Crear</button>';

} else {
    if ($permiso_usuario_crear['estado_usuario'] == 1) {
        //El usuario tiene permitido la funcion
        echo '<button onclick="crear_libro()">Crear</button>';
    }
}

// FIN ---------------------------------------------------------------------------------------------

//boton - editar ----------------------------------------------------------------------------

$sql = "SELECT `Permisos_idPermisos` 
FROM `permisos_has_roles` 
WHERE `Roles_idRoles` = ".$Roles_idRoles." 
AND `Permisos_idPermisos` = 3";
$permisos_rol_editar = $conexion->query($sql);

$sql = "SELECT estado_usuario
FROM `Permisos_has_Usuarios`
WHERE `Usuarios_cc` = ".$cc."
AND `Permisos_idPermisos` = 3";
$permisos_usuarios = $conexion->query($sql);
$permiso_usuario_editar = $permisos_usuarios->fetch(PDO::FETCH_ASSOC);

if ($permiso_usuario_editar == false) {
    $permiso_usuario_editar['estado_usuario'] = 2;
}

if ($permisos_rol_editar->rowCount() > 0 && $permiso_usuario_editar['estado_usuario'] != 0) { 
    // El resultado no está vacío, y no tiene restringido la funcion
    echo '<button onclick="editar_libro()">Editar</button>';

} else {
    if ($permiso_usuario_editar['estado_usuario'] == 1) {
        //El usuario tiene permitido la funcion
        echo '<button onclick="editar_libro()">Editar</button>';
    }
}

?>


<!-- 
 -->


