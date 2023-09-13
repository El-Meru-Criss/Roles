<?php
require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$sql = "SELECT idlibros, titulo FROM libros ORDER BY idlibros ASC ";
$resultado = $conexion->query($sql);

echo "<h1>LISTA DE LIBROS</h1>";
echo "<table border='1'>";
echo "<thead>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>titulo</th>";
echo "<th>Editar</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";
    echo "<td>" . $fila['idlibros'] . "</td>";
    echo "<td>" . $fila['titulo'] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";


?>