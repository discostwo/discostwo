<?php

$response=new stdClass();
require '../../servicios/_conexion.php';
$p =  $_GET["p"];

$sql = "SELECT * FROM articulo WHERE (IDArticulo = $p)";
    $resultado = $conexion->query($sql); 
    if (!$resultado) {
        die("No se puede realizar la consulta $conexion->errno: $conexion->error");
    }
echo "<center><h1>ARTICULO</h1>";
echo "<form action='editararticulopost.php' method='POST'>";
echo "<center><table border=2><tr><th>IDArticulo</th> <th>NombreArticulo</th><th>Artista</th><th>Precio</th><th>Tipo</th><th>Stock</th><th>Imagen</th><th>Direccion Video</th></tr>";
echo '  <link rel="stylesheet" type="text/css" href="../../css/gestoradmin.css">';
while($registro = $resultado->fetch_assoc()){
        echo "<tr>" ;
        echo "<td>".$registro['IDArticulo']."</td>";
        echo "<td>".$registro['NombreArticulo']."</td>";
        echo "<td>".$registro['Artista']."</td>";
        echo "<td>".$registro['Precio']."</td>";
        echo "<td>".$registro['Tipo']."</td>";
        echo "<td>".$registro['Stock']."</td>";
        echo "<td>".$registro['Imagen']."</td>";
        echo "<td>".$registro['video']."</td>";
        echo "</tr>";
        
};
        echo "<tr>" ;
        echo '<td><input type="text" name="idarticulo" class="form-input" required/></td>';
        echo '<td><input type="text" name="nombrearticulo" class="form-input" required/></td>';
        echo '<td><input type="text" name="artista" class="form-input" required/></td>';
        echo '<td><input type="float" name="precio" class="form-input" required/></td>';
        echo '<td><SELECT input type="text" class="form-input" required NAME="tipo">
        <OPTION VALUE="CD" SELECTED>CD
        <OPTION VALUE="Vinilo">Vinilo
        <OPTION VALUE="Digital">Digital
        <OPTION VALUE="Merchan">Merchan
        </SELECT></td>';
        echo '<td><input type="int" name="stock" class="form-input" required/></td>';
        echo '<td><input type="text" name="imagen" class="form-input" required/></td>';
        echo '<td><input type="text" name="video" class="form-input" required/></td>';
        echo "</tr>";
        

echo "</table>";
echo "</div>";
echo "<br>";
echo'<center> <input class="form-btn" name="submit" class="aaaaboton" type="submit" value="Modificar articulo" /></center>';
echo '</form>';
echo "<br>";