<?php

require '../../servicios/_conexion.php';


$nombrearticulo = utf8_decode($_POST['nombrearticulo']);
$artista = utf8_decode($_POST['artista']);
$precio = utf8_decode($_POST['precio']);
$tipo = utf8_decode($_POST['tipo']);
$stock = utf8_decode($_POST['stock']);
$imagen = utf8_decode($_POST['imagen']);
$video = utf8_decode($_POST['video']);

$sql = "INSERT INTO articulo (NombreArticulo, Artista, Precio, Tipo, Stock, Imagen,video) VALUES ('$nombrearticulo', '$artista', '$precio', '$tipo', '$stock', '$imagen','$video')";

$resultado = $conexion->query($sql); 
echo $sql;
if (!$resultado) {
      
die("No se puede realizar la consulta $conexion->errno: $conexion->error");
    echo "<a href=''><p>Volver a Home</a>";
}
$host  = $_SERVER["HTTP_HOST"];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'gestionararticulos.php';
header("Location: http://$host$uri/$extra");

?>