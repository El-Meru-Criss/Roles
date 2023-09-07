<?php

# parametros para la conexion a a base de datos
$host = "localhost";
$dbname = "roles";
$username = "root";
$password = "";
$charset = "utf8mb4";
$puerto = "3306";

$dsn = "mysql:host=$host; port=$puerto; dbname=$dbname; charset=$charset";

# validamos la conexion
try{
    $conexion = new PDO ($dsn, $username, $password);
    #echo "todo bien";
}
catch (PDOException $e) {
    die ("Error no se pudo conectar a la base de datos.". $e->getMessage());
}

?>