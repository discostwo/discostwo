<?php
session_start();
if (!isset($_SESSION['NombreCliente'])) {
    header('location: ../../index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Disco's Two</title>
    <link rel="shortcut icon" href="../../assets/DISCOSTWOs.png" />
    <script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--   <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="../../font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../../css/index-cabecera.css">
    <link rel="stylesheet" type="text/css" href="../../css/registro.css">

</head>

<body>
    <header>
        <?php include("_main-header.php"); ?>
    </header>
    <div class="main-content">
        <div class="content-page">

            <section class="aform-register">
                <form action="PedidoRellenarFormulario.php" method="POST">

                    <h3>Datos pedido</h3>
                    <center>
                        <div>
                            <label for="Direccion">Introduce la dirección de envío del pedido.</label>
                            <div><input class="acontrols" type="text" name="direccion" id="direccion" required></div>

                        </div>
                    </center>
                    <input class="botons" text-align:center id="submit" name="submit" type="submit" value="Registrar dirección">
                </form>
            </section>

            <center><button onclick="location.href='http://discostwo.local/pagina/pedido/pedido.php'" ; class="aatrasbotons">Atrás</button></center>
        </div>
    </div>

</body>

</html>