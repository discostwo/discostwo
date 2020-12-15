<?php
session_start();
if (!isset($_SESSION['Adminuser'])) {

	echo "<script>
		alert('Para acceder, debes estar loggeado como admin');
					window.location= '../pagina/log/login-admin.php' 
					</script>";
}
?>







<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GESTIÓN DISCO'S TWO</title>
    <link rel="stylesheet" type="text/css" href="../css/gestor.css">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/registro.css">
</head>

<body>



    <div class="main-content">
        <div class="content-page">

            <center>
                </br>
                <div>
                    <h1> Bienvenido, ADMIN <br> </h1>
                    </br>
                </div>

                <button onclick="location.href='../servicios/logout.php'"; style="cursor:pointer;" class="logoutbotons">LOGOUT</button>
                <button onclick="location.href='http://discostwo.local/gestor/articulos/gestionararticulos.php'" ; style="cursor:pointer;" class="atrasbotons">Gestionar ARTICULOS</button>
                <button onclick="location.href='http://discostwo.local/gestor/clientes/gestionarclientes.php'" ; style="cursor:pointer;" class="aatrasbotons">Gestionar CLIENTES</button>
            </center>



        </div>
    </div>



</body>

</html>