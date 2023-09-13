<?php
require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

if (isset($_POST['cedula'], $_POST['nombre'], $_POST['contraseña'], $_POST['roles_usuario'])) {
    $cc = $_POST['cedula'];
    $Nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $Roles_idRoles = $_POST['roles_usuario'];
    $encript_contraseña = md5($contraseña);

    // Consulta para obtener los datos del usuario que se va a editar
    $consulta = "SELECT * FROM usuarios WHERE cc=:cc";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':cc', $cc);
    $stmt->execute();

    // Utiliza rowCount para contar las filas devueltas por la consulta
    $numFilas = $stmt->rowCount();

    if ($numFilas > 0) {
        // Usuario encontrado, actualizar sus datos
        $sql = "UPDATE usuarios SET Nombre=:nombre, contraseña=:contrasena, Roles_idRoles=:roles WHERE cc=:cc";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $Nombre);
        $stmt->bindParam(':contrasena', $encript_contraseña);
        $stmt->bindParam(':roles', $Roles_idRoles);
        $stmt->bindParam(':cc', $cc);

        if ($stmt->execute()) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar el usuario: " . $stmt->errorInfo()[2];
        }
    } else {
        echo "El usuario con cédula $cc no fue encontrado.";
    }
    
    $conexion= null;
} else {
    echo "No se proporcionaron datos de usuario para editar.";
}
?>
