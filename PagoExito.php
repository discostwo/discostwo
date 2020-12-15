<?php

session_start();
require 'servicios/_conexion.php';
$cliente = $_SESSION['IDCliente'];

$sql = "UPDATE pedido SET Estado = ? WHERE (Estado = ? AND IDCliente=?)";
$query = $conexion->prepare($sql);

$varestado1=1;
$varestado0=0;
$query->bind_param("iii", $varestado1, $varestado0, $cliente);
$query->execute();
$result = $query->get_result();

if (!$query) {
    die("No se puede realizar la consulta $conexion->errno: $conexion->error");
}
$host  = $_SERVER["HTTP_HOST"];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'resumenpedido.php';
header("Location: http://$host$uri/$extra");


?>