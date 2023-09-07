<?php

require_once "cors.php";

try {
    require_once "conexion.php";
        
    # capturamos datos a agregar
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);

    # Validación adicional si es necesario
    /*if (empty($usuario) || empty($pass) || empty($telefono) || empty($estado)) {
        throw new Exception("Todos los campos son obligatorios");
    }*/
    # consulta para el borrado usuario
    $sql = "INSERT INTO `users` 
                (`usuario`, `password`, `telefono`, `estado`) 
            VALUES 
                (:usuario, :pass, :telefono, :estado)";

    $consulta = $conexion -> prepare($sql);

    $consulta ->execute (array(
        ":usuario" => $usuario,
        ":pass" => $pass,
        ":telefono" => $telefono,
        ":estado" => $estado
    ));

    $respuesta = array ("status" => "ok", "message" => "Datos Insertados correctamente");

    $respuesta= $id;
}
catch (PDOException $e){
    $respuesta = array ("status" => "error", "message" => "Error al insertar los datos: ". $e->getMessage());
}

header("Content-Type: application/json");

echo json_encode($respuesta);
?>