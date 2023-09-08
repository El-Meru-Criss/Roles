<?php

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$cc = $_POST['cedula'];
$Nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$Roles_idRoles = $_POST['roles_usuario'];
$encript_contraseña = md5($contraseña);


$conexion ; 

$sql = "INSERT INTO usuarios(cc, Nombre, contraseña, Roles_idRoles) VALUES ('$cc', '$Nombre', '$encript_contraseña', '$Roles_idRoles')";

echo "contraseña encriptada: " . $encript_contraseña;


$resultado = $conexion->query($sql);

if ($resultado) {
    echo "Registro insertado con éxito.";
} else {
    echo "Error al insertar el registro: " . $conexion->error;
}

// Cierra la conexión
$conexion = null;

?>
