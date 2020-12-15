<?php
session_start();
if (!isset($_SESSION['Adminuser'])) {

	echo "<script>
		alert('Para acceder, debes estar loggeado como admin');
					window.location= '../../pagina/log/login-admin.php' 
					</script>";
}
?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GESTIÓN CLIENTES DISCO'S TWO</title>
</head>

<body>
    <?php

    require '../../servicios/_conexion.php';
    $sql = "SELECT * FROM cliente";
    $resultado = $conexion->query($sql);
    if (!$resultado) {
        die("No se puede realizar la consulta $conexion->errno: $conexion->error");
    }
  
    echo '  <link rel="stylesheet" type="text/css" href="../../css/gestoradmin.css">';
    echo "<a href='../index.php'><button class='aaaaboton'>Volver</button></a>";
    echo "<div>";
    echo "<center><h1>CLIENTES</h1>";
    echo "<center><table border=2><tr><th>IDCliente</th> <th>DNI</th><th>Email</th><th>NombreCliente</th><th>Apellidos</th><th>Telefono</th><th>Ciudad</th><th>Direccion</th></tr>";

    while ($registro = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $registro['IDCliente'] . "</td>";
        echo "<td>" . $registro['DNI'] . "</td>";
        echo "<td>" . $registro['Email'] . "</td>";
        echo "<td>" . $registro['NombreCliente'] . "</td>";
        echo "<td>" . $registro['Apellidos'] . "</td>";
        echo "<td>" . $registro['Telefono'] . "</td>";
        echo "<td>" . $registro['Ciudad'] . "</td>";
        echo "<td>" . $registro['Direccion'] . "</td>";
        echo '<td> <a href="borrarcliente.php?p=' . $registro['IDCliente'] . '"><p>Borrar</a></td>';
        echo '<td> <a href="editarcliente.php?p=' . $registro['IDCliente'] . '"><p>Editar</a></td>';
        echo "</tr>";
    };
    echo "</table>";
    echo "</div>";
    echo "<br>";
    echo "<center><a href='insertarcliente.php'><button class='aaaaboton'>Insertar Cliente</button></a></center>";

    ?>

</body>

</html>