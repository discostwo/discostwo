<?php
session_start();
$response=new stdClass();
include_once('../_conexion.php');
$pedido=$_POST['idPedido'];
$sql="DELETE FROM pedido WHERE(idPedido = ?)";

$result = $conexion->prepare($sql);	
$result->bind_param("i",  $pedido);
$result->execute();

if ($result) {
    $response->state=true;
    $response->detail="Producto eliminado de la lista";
}else{
    $response->state=false;
    $response->detail="No se pudo eliminar el producto. Intente más tarde";
}
mysqli_close($conexion);


header('Content-Type: application/json');
echo json_encode($response);
?>