<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Usuarios</title>
</head>
<body>
    <center>
        <h1>CREAR NUEVO USUARIO</h1>
        <form action="controlador/crear_usuarios.php" method="POST">
            <input type="text" id="cedula" name="cedula" placeholder="Ingresar # de cc" required>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresar nombre" required>
            <input type="password" id="contraseña" name="contraseña" placeholder="Escribir una clave" required>
            <select name="roles_usuario" id="roles_usuario" required>
                <option value=""></option>
                <option value="1">escritor</option>
                <option value="2">lector</option>
                <option value="3">Editor</option>
                <option value="4">Administrador</option>
            </select>
            <button type="submit">Crear Usuario</button>
        </form>
        <?php
        include_once "controlador/lista_usuarios.php";
        ?>
    </center>
</body>
<script src="./personalizados/criss.js"></script>
</html>