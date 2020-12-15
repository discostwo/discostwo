<?php

echo "<center><h1>CLIENTE</h1>";
echo '  <link rel="stylesheet" type="text/css" href="../../css/gestoradmin.css">';
echo "<form action='' method='POST'>";
echo "<center><table border=2><tr><th>IDCliente</th> <th>DNI</th><th>NombreCliente</th><th>Apellidos</th><th>Telefono</th><th>Ciudad</th><th>Direccion</th></tr>";
        echo "<tr>" ;
        echo '<td>Nuevo Articulo</td>';
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
echo'<center> <input class="form-btn" name="submit" class="aaaaboton" type="submit" value="Insertar cliente" /></center>';
echo '</form>';