
<?php

//fetch_data.php

include('../../servicios/_conexion.php');

$text = "%".$_POST['text']."%";


$n = 0;


if (isset($_POST["action"])) {
    $peticion = "SELECT * FROM articulo WHERE Stock >= ? ";

    if (isset($_POST["preciominimo"], $_POST["preciomaximo"]) || !empty($_POST["preciominimo"]) && !empty($_POST["preciomaximo"])) {

        $peticion .= "AND Precio BETWEEN ? AND ? ";
        $n = 2;
    }
    if (isset($_POST["Tipo"])) {
        $n = 3;
        $peticion .= " AND Tipo IN (?";

        $varfiltro = $_POST["Tipo"];

        $tipos = "s";

        for ($i = 1; $i < count($varfiltro); $i++) {

            $peticion .= ",?";
            $tipos .= "s";
        }
        $peticion .= ")";

        $varfiltrocomas = implode(", ", $varfiltro);
        /*  var_dump($varfiltrocomas);  */
    }
}


$peticion .= " AND (Artista LIKE ? OR NombreArticulo LIKE ? OR Tipo LIKE  ?) ";
$query = $conexion->prepare($peticion);
$varstock = 1;
$varpreciomin = $_POST["preciominimo"];
$varpreciomax = $_POST["preciomaximo"];
if ($n == 0) {

    $query->bind_param('isss', $varstock, $text, $text, $text);
}
if ($n == 2) {


    $query->bind_param('iiisss', $varstock, $varpreciomin, $varpreciomax, $text, $text, $text);
}
if ($n == 3) {

    $query->bind_param('iii' . $tipos . 'sss', $varstock, $varpreciomin, $varpreciomax, $varfiltrocomas, $text, $text, $text);
}


$query->execute();
$result = $query->get_result();


$total_row = $result->num_rows;

$output = '';
if ($total_row > 0) {
    foreach ($result as $row) {
        $output .= '
    </div>
   <div class="product-box">' .
            '<a href="producto.php?p=' . $row['IDArticulo'] . '">' .
            '<div class="product">' .
            '<img src="../../assets/products/' . $row['Imagen'] . '">' .
            '<div class="detail-title">' . $row['NombreArticulo'] . '</div>' .
            '<div class="detail-description">' . $row['Artista'] . '</div>' .
            '<div class="detail-description">' . $row['Tipo'] . '</div>' .
            '<div class="detail-price">' . $row['Precio'] . ' €</div>' .
            '</div>' .
            '</a>' .
            '</div>';
    }
} else {
    $output = '<h3>No hay </h3>';
}


mysqli_close($conexion);


echo $output;


?>
