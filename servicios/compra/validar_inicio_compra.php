<?php
session_start();
$response=new stdClass();

 if (!isset($_SESSION["NombreCliente"])) {
	$response->state=false;
	$response->detail="No esta loggeado";
	$response->open_login=true;
}else{ 
	include_once('../_conexion.php');
	$cliente=$_SESSION['IDCliente'];
    $articulo=$_POST['IDArticulo'];
	$sql="INSERT INTO pedido (idCliente,IDArticulo,Fecha,Direccion,Estado) VALUES (?,?,now(),'',0)";
	$result = $conexion->prepare($sql);
	
	$result->bind_param("ii",  $cliente,$articulo);
	$result->execute();




	if ($result) {
		$response->state=true;
		$response->detail="Producto agregado";
	}else{
		$response->state=false;
		$response->detail="No se pudo agregar producto. Intente más tarde";
	}
	mysqli_close($conexion);
}

header('Content-Type: application/json');
echo json_encode($response);
?>