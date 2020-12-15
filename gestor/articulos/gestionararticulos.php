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
    <title>GESTIÓN ARTICULOS DISCO'S TWO</title>
    
  
</head>

<body>
    <?php

    require '../../servicios/_conexion.php';
    $sql = "SELECT * FROM articulo";
    $resultado = $conexion->query($sql);
    if (!$resultado) {
        die("No se puede realizar la consulta $conexion->errno: $conexion->error");
    }
    echo '  <link rel="stylesheet" type="text/css" href="../../css/gestoradmin.css">';
    echo "<a href='../index.php'><button class='aaaaboton'>Volver</button></a>";
    echo "<div>";
    echo "<center><h1>ARTICULO</h1>";
    echo "<center><table border=1><tr><th>IDArticulo</th> <th>NombreArticulo</th><th>Artista</th><th>Precio</th><th>Tipo</th><th>Stock</th><th>Imagen</th><th>Direccion Video</th></tr>";

    while ($registro = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $registro['IDArticulo'] . "</td>";
        echo "<td>" . $registro['NombreArticulo'] . "</td>";
        echo "<td>" . $registro['Artista'] . "</td>";
        echo "<td>" . $registro['Precio'] . "</td>";
        echo "<td>" . $registro['Tipo'] . "</td>";
        echo "<td>" . $registro['Stock'] . "</td>";
        echo "<td>" . $registro['Imagen'] . "</td>";
        echo "<td>" . $registro['video'] . "</td>";
        echo '<td> <a href="borrararticulo.php?p=' . $registro['IDArticulo'] . '"><p>Borrar</a></td>';
        echo '<td> <a href="editararticulo.php?p=' . $registro['IDArticulo'] . '"><p>Editar</a></td>';
        echo "</tr>";
    };
    echo "</table>";
    echo "</div>";
    echo "<br>";
    echo "<center><a href='insertararticulo.php'><button class='aaaaboton'>Insertar Articulo</button>";

    ?>
</body>

</html>