// verificar_permisos.js

document.addEventListener("DOMContentLoaded", function() {
    // Realiza una solicitud AJAX al servidor para verificar permisos
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "verificacion_permiso.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            // Verifica los permisos en la respuesta del servidor
            if (response.permisos && response.permisos.includes("Acceder a libros")) {
                // El usuario tiene el permiso necesario
                console.log("Usuario tiene permiso para acceder a libros.html");
            } else {
                // El usuario no tiene el permiso necesario
                console.log("Usuario no tiene permiso para acceder a libros.html");
                // Puedes redirigir al usuario a otra página o mostrar un mensaje de error
            }
        } else {
            // Maneja errores de solicitud AJAX
            console.error("Error en la solicitud AJAX");
        }
    };
    xhr.send();
});
