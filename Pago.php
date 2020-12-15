<?php
session_start();
if (!isset($_SESSION['NombreCliente'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Disco's Two</title>
    <link rel="shortcut icon" href="assets/DISCOSTWOs.png" />
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/index-cabecera.css">
    <link rel="stylesheet" type="text/css" href="css/registropedidopago.css">

</head>

<body>
    <header>
        <?php include("_main-header.php"); ?>
    </header>
    <div class="main-content">
        <div class="content-page">
            <section class="aform-register">
                <h3 align:center>Metodo de Pago </h3>
                <br>

                <div>
                    <?php
                    require 'servicios/_conexion.php';
                    $cliente = $_SESSION['IDCliente'];
                    $sql = "SELECT * FROM pedido ped
            INNER JOIN articulo art
            ON ped.idArticulo=art.idArticulo WHERE (Estado =? AND IDCliente=?)";

                    $query = $conexion->prepare($sql);
                    $varestado = 0;

                    $query->bind_param("ii", $varestado, $cliente);
                    $query->execute();
                    $result = $query->get_result();

                    $n = 1;
                    if (!$query) {
                        die("No se puede realizar la consulta $conexion->errno: $conexion->error");
                    }
                    $sql2 = "SELECT * FROM cliente WHERE IDCliente=?";
                    $query2 = $conexion->prepare($sql2);


                    $query2->bind_param("i",  $cliente);
                    $query2->execute();
                    $result2 = $query2->get_result();

                    if (!$query2) {
                        die("No se puede realizar la consulta $conexion->errno: $conexion->error");
                    }
                    $clientepedido = $result2->fetch_assoc();
                    echo '<center>';


                    echo '<form name="formTPV" method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">';

                    echo '<input type="hidden" name="cmd" value="_cart">';
                    echo '<input type="hidden" name="upload" value="1">';
                    echo '<input type="hidden" name="business" value="CE2018-facilitator@gmail.com">';
                    //Articulos
                    while ($registro = $result->fetch_assoc()) {
                        echo '<input type="hidden" name="item_name_' . $n . '" value="' . $registro["NombreArticulo"] . '">';
                        echo '<input type="hidden" name="item_number_' . $n . '" value="' . $registro["IDArticulo"] . '">';
                        echo '<input type="hidden" name="amount_' . $n . '" value="' . $registro["Precio"] . '">';
                        $n++;
                    }

                    //Llamadas de retorno
                    echo '<input type="hidden" name="return" value="http://discostwo.local/PagoExito.php">';
                    echo '<input type="hidden" name="cancel_return" value="http://discostwo.local/Pago.php">';
                    //Ni idea, tengo que buscarlo
                    echo '<input type="hidden" name="no_note" value="1">';
                    echo '<input type="hidden" name="currency_code" value="EUR">';
                    //Datos Comprador
                    echo '<input type="hidden" name="first_name" value="' . $clientepedido["NombreCliente"] . '">';
                    echo '<input type="hidden" name="last_name" value="' . $clientepedido["Apellidos"] . '">';
                    echo '<input type="hidden" name="address1" value="' . $clientepedido["Direccion"] . '">';
                    echo '<input type="hidden" name="city" value="' . $clientepedido["Ciudad"] . '">';
                    echo '<input type="hidden" name="zip" value="02004">';
                    echo '<input type="hidden" name="lc" value="es">';
                    //Impuestos (?) tengo que buscarlo
                    echo '<input type="hidden" name="tax_1" value="2">';
                    echo '<input type="hidden" name="tax_2" value="4">';
                    echo '<input type="hidden" name="country" value="ES">';



                    echo '<br><br><br><br><br><input type="image" src="https://www.paypal.com//es_ES/i/btn/x-click-but5.gif" name="submit" alt="Pagos con PayPal: Rápido, gratis y seguro">';
                    echo '</form>';
                    echo '</center>';
                    ?> </div>
            </section>
        </div>
        <center><?php
           
        ?>
        <a href="PedidoRellenar.php"><button  class="atrasbotons">Atrás</button></center></a>
    </div>
           
            
</body>

</html>

