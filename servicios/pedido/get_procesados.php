<?php
include('../_conexion.php');
$response=new stdClass();

//$datos=array();
$datos=[];
$i=0;
$sql="SELECT * FROM pedido ped INNER JOIN articulo art ON ped.idArticulo=art.idArticulo WHERE Estado=?"; 
$result = $conexion->prepare($sql);
$varestado0=0;
$result->bind_param("i", $varestado0);
$result->execute();
$result2 = $result->get_result();

while($row=mysqli_fetch_array($result2)){
	$obj=new stdClass();
	$obj->IDArticulo=$row['IDArticulo'];
	$obj->NombreArticulo=$row['NombreArticulo'];
	$obj->Artista=$row['Artista'];
	$obj->Precio=$row['Precio'];
	$obj->Tipo=$row['Tipo'];
	$obj->Imagen=$row['Imagen'];
	$obj->Fecha=$row['Fecha'];
	$obj->idPedido=$row['IDPedido'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;


mysqli_close($conexion);
header('Content-Type: application/json');
echo json_encode($response);