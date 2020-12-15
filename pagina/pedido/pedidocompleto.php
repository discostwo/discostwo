<?php
session_start();
if (!isset($_SESSION['NombreCliente'])) {
    header('location: ../../index.php');
}
?>

<?php

require '../../servicios/_conexion.php';
$cliente = $_SESSION['IDCliente'];

$sql = "UPDATE pedido SET Estado=? WHERE (Estado=? AND IDCliente=?)";
$varestado2 = 2;
$resultado = $conexion->prepare($sql);
$varestado1 = 1;
$resultado->bind_param("iii", $varestado2, $varestado1, $cliente);
$resultado->execute();
echo "<script>
		alert('Su pedido está en periodo de envío. Gracias por su compra.');
					window.location= '../../index.php' 
					</script>";


function alert($msg)
{
    echo "<script src='../../js/main-script.js'></script>
         <script type='text/javascript'>alert('$msg');</script>";
}



?>

    