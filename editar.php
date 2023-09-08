<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <center>
        <h1>EDITAR USUARIO</h1>
        <form action="controlador/editar_usuarios.php" method="POST">
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" placeholder="Ingrese # de cc" required><br><br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre" required><br><br>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" placeholder="Escriba una clave" required><br><br>

            <label for="permiso">Permiso:</label>
            <select name="roles_usuario" id="roles_usuario" required>
                <option value=""></option>
                <option value="1">escritor</option>
                <option value="2">lector</option>
                <option value="3">Editor</option>
                <option value="4">Administrador</option>
            </select><br><br>

            <button type="submit">Actualizar Usuario</button>
        </form>
    </center>
</body>
</html>