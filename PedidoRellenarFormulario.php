<?php
session_start();
require 'servicios/_conexion.php';

$Direccion = utf8_decode($_POST['direccion']);
$cliente=$_SESSION['IDCliente'];

$sql = "UPDATE pedido SET Direccion = ? WHERE (Estado = ? AND IDCliente=?)";

$resultado = $conexion->prepare($sql);
$varestado0=0;

$resultado->bind_param("sii",  $Direccion, $varestado0, $cliente);
$resultado->execute();
$result = $resultado->get_result();


if (!$resultado) {

    die("No se puede realizar la consulta $conexion->errno: $conexion->error");
    
}
$host  = $_SERVER["HTTP_HOST"];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'Pago.php';
header("Location: http://$host$uri/$extra");
?>
