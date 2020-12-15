<?php

$response = new stdClass();
require '../../servicios/_conexion.php';
$p =  $_GET["p"];

$sql = "SELECT * FROM cliente WHERE (IDCliente = $p)";
$resultado = $conexion->query($sql);
if (!$resultado) {
    die("No se puede realizar la consulta $conexion->errno: $conexion->error");
}
echo "<center><h1>Cliente</h1>";
echo "<form action='editarclientepost.php' method='POST'>";
echo '  <link rel="stylesheet" type="text/css" href="../../css/gestoradmin.css">';
echo "<center><table border=2><tr><th>IDCliente</th> <th>DNI</th><th>NombreCliente</th><th>Apellidos</th><th>Telefono</th><th>Ciudad</th><th>Direccion</th></tr>";

while ($registro = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $registro['IDCliente'] . "</td>";
    echo "<td>" . $registro['DNI'] . "</td>";
    echo "<td>" . $registro['NombreCliente'] . "</td>";
    echo "<td>" . $registro['Apellidos'] . "</td>";
    echo "<td>" . $registro['Telefono'] . "</td>";
    echo "<td>" . $registro['Ciudad'] . "</td>";
    echo "<td>" . $registro['Direccion'] . "</td>";
    echo "</tr>";
};
echo "<tr>";
echo '<td>CLIENTE</td>';
echo '<td><input type="text" name="IDCliente" class="form-input" required/></td>';
echo '<td><input type="text" name="DNI" class="form-input" required/></td>';
echo '<td><input type="text" name="NombreCliente" class="form-input" required/></td>';
echo '<td><input type="float" name="Apellidos" class="form-input" required/></td>';
echo '<td><input type="float" name="Telefono" class="form-input" required/></td>';
echo '<td><input type="int" name="Ciudad" class="form-input" required/></td>';
echo '<td><input type="text" name="Direccion" class="form-input" required/></td>';
echo "</tr>";


echo "</table>";
echo "</div>";
echo "<br>";
echo '<center> <input class="form-btn" name="submit" class="aaaaboton" type="submit" value="Editar cliente" /></center>';
echo '</form>';
echo "<br>";
