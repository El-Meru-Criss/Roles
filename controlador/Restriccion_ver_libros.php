<?php 

session_start(); // Iniciar la sesión (debe hacerse al principio de cada script)
if (isset($_SESSION['cc'])) {
    $cc = $_SESSION['cc']; // Recuperar el CC del usuario desde la variable de sesión
    echo $cc;
} else {
    // El usuario no ha iniciado sesión o la sesión ha expirado
    // No se si echarlo o que
}

?>