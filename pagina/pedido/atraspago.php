<?php
function atraspago()
{

    require '../../servicios/_conexion.php';
    $query1 = "UPDATE pedido SET (Estado=?, Direccion=?)  WHERE (IDCliente=? AND Estado=?) ";
    $cliente = $_SESSION['IDCliente'];
    $varestado0 = 0;
    $vardireccion = "";
    $varestado1 = 1;

    $result1 = $conexion->prepare($query1);
    $result1->bind_param("isii", $varestado0, $vardireccion, $cliente, $varestado0);
    $result1->execute();
    $host  = $_SERVER["HTTP_HOST"];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'pagina/pedido/PedidoRellenar.php';
    header("Location: http://$host$uri/$extra");
}
