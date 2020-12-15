<?php

require '../../servicios/_conexion.php';


$DNI = utf8_decode($_POST['DNI']);
$NombreCliente = utf8_decode($_POST['NombreCliente']);
$Apellidos = utf8_decode($_POST['Apellidos']);
$Telefono = utf8_decode($_POST['Telefono']);
$Ciudad = utf8_decode($_POST['Ciudad']);
$Direccion = utf8_decode($_POST['Direccion']);

$sql = "INSERT INTO cliente (DNI, NombreCliente, Apellidos, Telefono, Telefono, Direccion) 
VALUES ('$DNI', '$NombreCliente', '$Apellidos', '$Telefono', '$Telefono', '$Direccion')";

$resultado = $conexion->query($sql); 
if (!$resultado) {
      
die("No se puede realizar la consulta $conexion->errno: $conexion->error");
    echo "<a href=''><p>Volver a Home</a>";
}
$host  = $_SERVER["HTTP_HOST"];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'gestionarclientes.php';
header("Location: http://$host$uri/$extra");

?>