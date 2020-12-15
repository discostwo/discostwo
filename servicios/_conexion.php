<?php
    $conexion = new mysqli('localhost', 'root', '', "disco's two");
    
    if($conexion->connect_error){
        die('Error en la conexión' . $conexion->connect_error);}

    
?>