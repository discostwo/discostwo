<?php
 

 $response=new stdClass();
 require '../../servicios/_conexion.php';
 $p =  $_GET["p"];
 $sql="DELETE FROM articulo WHERE (IDArticulo = $p)";
 
 $result = $conexion->query($sql);
 if (!$resultado) {
    die("No se puede realizar la consulta $conexion->errno: $conexion->error");
}
 mysqli_close($conexion);


$host  = $_SERVER["HTTP_HOST"];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'gestionararticulos.php';
header("Location: http://$host$uri/$extra");
?>
