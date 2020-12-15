<?php
session_start();
if (!isset($_SESSION['NombreCliente'])) {
    header('location: ../../index.php');
}
?>

<head>
    <title>Disco's Two</title>
    <link rel="shortcut icon" href="../../assets/DISCOSTWOs.png" />
    <script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../../css/index-cabecera.css">

</head>

<body>
    <header>
        <?php include("_main-header.php"); ?>
    </header>
    <div class="main-content">
        <div class="content-page">
            <h3>Resumen Pedido</h3>
            <?php

            alert("Pago realizado con exito");
            function alert($msg)
            {
                echo "<script type='text/javascript'>alert('$msg');</script>";
            };

            require '../../servicios/_conexion.php';
            $cliente = $_SESSION['IDCliente'];
            $sql = "SELECT * FROM pedido ped
            INNER JOIN articulo art
            ON ped.idArticulo=art.idArticulo WHERE (Estado = ? AND IDCliente=?)";


            $resultado = $conexion->prepare($sql);
            $varestado1 = 1;
            $resultado->bind_param("ii", $varestado1, $cliente);
            $resultado->execute();
            $result1 = $resultado->get_result();



            if (!$resultado) {
                die("No se puede realizar la consulta $conexion->errno: $conexion->error");
            }

            while ($registro = mysqli_fetch_array($result1)) {
                echo '<div class="item-pedido">';
                echo '<div class="pedido-img">';
                echo '<img src="../../assets/products/' . $registro["Imagen"] . '">';
                echo '</div>';
                echo '<div class="pedido-detalle">';
                echo '<h3>' . $registro["NombreArticulo"] . '</h3>';
                echo '<p><b>Precio:</b> ' . $registro["Precio"] . ' €</p>';
                echo '<p><b>Fecha:</b> ' . $registro["Fecha"] . '</p>';
                echo '<p><b>Direccion:</b> ' . $registro["Direccion"] . '</p>';
                echo '</div>';
                echo '</div>';
            }


            ?>
            <a href="pedidocompleto.php"><button>Vale</button></a>
        </div>
    </div>

</body>

</html>