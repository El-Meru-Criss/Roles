<?php
require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

session_start();

// Verifica si los campos usuarioLogin y claveLogin están presentes en el formulario POST
if (isset($_POST["usuarioLogin"]) && isset($_POST["claveLogin"])) {
    $usuarioLogin = $_POST["usuarioLogin"];
    $claveLogin = $_POST["claveLogin"];
    
    
    $encript_contraseña = md5($claveLogin);

    // Crear una consulta preparada con PDO
    $sql = "SELECT * FROM usuarios WHERE Nombre = :usuarioLogin AND contraseña = :claveLogin";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(":usuarioLogin", $usuarioLogin);
    $stmt->bindParam(":claveLogin", $encript_contraseña);
    $stmt->execute();
    
    // Verifica si se encontró un usuario con las credenciales proporcionadas
    if ($stmt->rowCount() > 0) {
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        $Roles_idRoles = $fila['Roles_idRoles'];
    
        // Redirige según el rol del usuario
        if ($Roles_idRoles == 10) {
            header('Location: ../interfaz-A.html');
            exit();
        } else {
            header('Location: ../libros.html');
            exit();
        }
    } else {
        echo '<script type="text/javascript">
              alert("El usuario no existe");
              window.location.href="../login.php";
            </script>';
        exit();
    }
} else {
    echo "Campos de formulario no enviados correctamente.";
}
?>
