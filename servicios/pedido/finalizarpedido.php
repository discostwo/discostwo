<?php

session_start();
$response=new stdClass();
require 'servicios/_conexion.php';
$cliente = $_SESSION['IDCliente'];

$sql = "UPDATE pedido SET Estado = ? WHERE (Estado = ? AND IDCliente=?)";
$resultado = $conexion->prepare($sql);
$varestado3= 3;
$varestado2= 2;

$result->bind_param("iii", $varestado3, $varestado2, $cliente);
$result->execute();
if ($result) {
    $response->state=true;
    $response->detail="Gracias por su compra :)";
}else{
    $response->state=false;
    $response->detail="Hubo un error. Intente más tarde";
}
header('Content-Type: application/json');
echo json_encode($response);
?>