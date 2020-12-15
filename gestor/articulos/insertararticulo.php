<?php

echo "<center><h1>ARTICULO</h1>";
echo '  <link rel="stylesheet" type="text/css" href="../../css/gestoradmin.css">';
echo "<a href='../index.php'><button class='aaaaboton'>Volver</button></a>";
echo "<form action='insertararticulopost.php' method='POST'>";
echo "<center><table border=2><tr><th>IDArticulo</th> <th>NombreArticulo</th><th>Artista</th><th>Precio</th><th>Tipo</th><th>Stock</th><th>Imagen</th><th>Direccion Video</th></tr>";
        echo "<tr>" ;
        echo '<td>Nuevo Articulo</td>';
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
echo'<center> <input class="form-btn" name="submit" type="submit" class="aaaaboton" value="Modificar articulo" /></center>';
echo '</form>';