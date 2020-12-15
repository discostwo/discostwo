<?php
include('../_conexion.php');
$response=new stdClass();

//$datos=array();
$datos=[];
$i=0;
$sql="SELECT * FROM articulo ";
$result = $conexion->prepare($sql);
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
	$obj->Descripcion=$row['Descripcion'];
	$obj->video=$row['video'];

	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($conexion);
header('Content-Type: application/json');
echo json_encode($response);