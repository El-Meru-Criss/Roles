<?php
require_once "modelo/cors.php";
require_once "modelo/conexion.php";

$sql = "SELECT cc, Nombre, Roles_idRoles FROM usuarios";
$resultado = $conexion->query($sql);

echo "<h1>LISTA DE USUARIOS</h1>";
echo "<table border='1'>";
echo "<thead>";
echo "<tr>";
echo "<th>Cédula</th>";
echo "<th>Nombre</th>";
echo "<th>Rol</th>";
echo "<th>Editar</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";
    echo "<td>" . $fila['cc'] . "</td>";
    echo "<td>" . $fila['Nombre'] . "</td>";
    echo "<td>" . $fila['Roles_idRoles'] . "</td>";
    echo "<td><a href='editar.php?cc=" . $fila['cc'] . "'>Editar</a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";


?>
