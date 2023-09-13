<?php

require_once "../modelo/cors.php";
require_once "../modelo/conexion.php";

$sql = "SELECT `idPermisos`, `Nom_Permiso` FROM `permisos`";

$permisos = $conexion -> query ($sql); ?>

<select name="" id="permiso">
    <option value=""></option>

<?php 

while ($permiso = $permisos->fetch(PDO::FETCH_ASSOC)) {

    // Haz algo con los datos, por ejemplo, imprimirlos
    ?> 
    <option value="<?php echo $permiso['idPermisos'] ?>"><?php echo $permiso['Nom_Permiso'] ?></option>
    <?php
    
}

?>
               
                
</select>
<?php


$conexion = null;



?>