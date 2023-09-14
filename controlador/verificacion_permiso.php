<?php
session_start();
require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

// Verifica si el usuario está autenticado (puedes ajustar esto según tu lógica de autenticación)
if (!isset($_SESSION["usuarioLogin"])) {
    http_response_code(403); // Devuelve un código de respuesta 403 (Prohibido)
    exit("Acceso denegado");
}

// Obtén el nombre de usuario de la sesión (ajusta esto según tus necesidades)
$usuarioLogin = $_SESSION["usuarioLogin"];

// Realiza la consulta para obtener los permisos del usuario
$sql = "SELECT permisos.Nom_Permiso
        FROM usuarios AS usuarios
        INNER JOIN permisos_has_usuarios AS pu ON usuarios.cc = permisos_has_usuarios.Usuarios_cc
        INNER JOIN permisos AS permisos ON permisos_has_usuarios.Permisos_idPermisos = permisos.idPermisos
        WHERE usuarios.Nombre = :usuarioLogin";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(":usuarioLogin", $usuarioLogin);
$stmt->execute();

$permisosUsuario = array();

while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $permisosUsuario[] = $fila['Nom_Permiso'];
}

// Devuelve los permisos en formato JSON
header("Content-Type: application/json");
echo json_encode(["permisos" => $permisosUsuario]);
?>
