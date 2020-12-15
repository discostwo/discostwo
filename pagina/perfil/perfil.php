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
            <button onclick="location.href='perfil.php'" ; class="perfilbotons">Mi Perfil</button>
            <button onclick="location.href='mispedidos.php'" ; class="mispedidosbotons">Mis Pedidos</button>
            <section class="perfilform-register">
                <form action="" method="POST">
                    <?php
                    require '../../servicios/_conexion.php';
                    $query = "SELECT * FROM cliente WHERE IDCliente=?";

                    $result = $conexion->prepare($query);
                    $idcl = $_SESSION['IDCliente'];
                    $result->bind_param("i", $idcl);
                    $result->execute();
                    $result1 = $result->get_result();
                    $resultado = mysqli_fetch_assoc($result1);


                    $Email = $resultado['Email'];

                    $Nombre = $resultado['NombreCliente'];
                    $Apellidos = $resultado['Apellidos'];
                    $DNI = $resultado['DNI'];
                    $Telefono = $resultado['Telefono'];
                    $Ciudad = $resultado['Ciudad'];
                    $Direccion = $resultado['Direccion'];

                    echo " <h3>Datos de perfil</h3>";

                    echo "<div>Email<input class='controls' type='email' name='email' id='email' value=$Email readonly='readonly'required></div>";

                    echo " <div>Nombre<input class='controls' type='text' name='nombrecliente' id='nombrecliente'  value=$Nombre readonly='readonly' required></div>";
                    echo "<div>Apellidos<input class='controls' type='text' name='apellidos' id='apellidos' value=$Apellidos readonly='readonly' required></div>";
                    echo "<div>DNI<input class='controls' type='text' pattern='[0-9]{8}[A-Za-z]{1}' name='DNI' id='DNI'  readonly='readonly' value=$DNI required></div>";
                    echo " <div>Teléfono<input class='controls' pattern='+.[0-9]' type='text' name='telefono' id='telefono'  readonly='readonly' value=$Telefono required></div>";
                    echo "<div>Ciudad<input class='controls' 'type='text' name='ciudad' id='ciudad'  value=$Ciudad readonly='readonly' required></div>";
                    echo " <div>Dirección<input class='controls' type='text' name='direccion' id='direccion' value=$Direccion readonly='readonly' required></div>";

                    ?>
                </form>
            </section>


        </div>
    </div>

</body>

</html>