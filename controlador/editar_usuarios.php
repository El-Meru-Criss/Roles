<?php
require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

if (isset($_POST['cedula'], $_POST['nombre'], $_POST['contraseña'], $_POST['permiso'])) {
    $cc = $_POST['cedula'];
    $Nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $Roles_idRoles = $_POST['permiso'];
    $encript_contraseña = md5($contraseña);

    // Consulta para obtener los datos del usuario que se va a editar
    $consulta = "SELECT * FROM usuarios WHERE cc='$cc'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        // Usuario encontrado, actualizar sus datos
        $sql = "UPDATE usuarios SET Nombre='$Nombre', contraseña='$encript_contraseña', Roles_idRoles=$Roles_idRoles WHERE cc='$cc'";
        
        if ($conexion->query($sql) === TRUE) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar el usuario: " . $conexion->error;
        }
    } else {
        echo "El usuario con cédula $cc no fue encontrado.";
    }
    
    $conexion->close();
} else {
    echo "No se proporcionaron datos de usuario para editar.";
}
?>
