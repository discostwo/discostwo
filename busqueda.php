<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Disco's Two</title>

    <link rel="shortcut icon" href="assets/DISCOSTWOs.png" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="js/main-script.js"></script>


    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/index-cabecera.css">
    <link href="css/style.css" rel="stylesheet">



</head>

<body>
    <?php include("_main-header.php"); ?>
    <div class="main-content">
        <div class="content-page">
            <div class="title-section">Resultados para <strong>"<?php echo $_GET['text']; ?>"<strong></div>
            <div class="products-list" id="space-list">

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h2 align="left">FILTROS</h2>

            <div class="col-md-3">
                <div class="list-group">
                    <h3>Precio</h3>
                    <input type="hidden" id="hidden_preciominimo" value="0" />
                    <input type="hidden" id="hidden_preciomaximo" value="100" />
                    <p id="enseñaprecio">0€ - 100€</p>
                    <div id="rangoprecio"></div>
                </div>

                <div class="list-group">
                    <h3>Tipo</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        <?php
                        include('servicios/_conexion.php');
                                ///////////
                                $query = $conexion->prepare("SELECT DISTINCT(Tipo) FROM articulo WHERE Stock >=? ORDER BY IDArticulo DESC");
                                $varstock = "1";
                                $query->bind_param("i", $varstock);
                                $query->execute();
                                $result = $query->get_result();
                                //////////////////
                        foreach ($result as $row) {
                        ?>
                            <div class="list-group-item radio">
                                <label><input type="radio" class="common_selector Tipo" name="option" value="<?php echo $row['Tipo']; ?>"> <?php echo $row['Tipo']; ?></label>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
    <style>
        #loading {
            text-align: center;
            background: url('assets/loader.gif') no-repeat center;
            height: 150px;
        }
    </style>

     <script>
         
  

        $(document).ready(function() {

            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var text = "<?php echo $_GET['text']; ?>";
                var action = 'fetch_data';
                var preciominimo = $('#hidden_preciominimo').val();
                var preciomaximo = $('#hidden_preciomaximo').val();
                var Tipo = get_filter('Tipo');

                $.ajax({
                    url: "servicios/producto/filtro_busqueda.php",
                    method: "POST",
                    data: {

                        action: action,
                        text: text,
                        preciominimo: preciominimo,
                        preciomaximo: preciomaximo,
                        Tipo: Tipo,

                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });

            $('#rangoprecio').slider({
                range: true,
                min: 0,
                max: 100,
                values: [0, 100],
                step: 5,
                stop: function(event, ui) {
                    $('#enseñaprecio').html(ui.values[0] + '€ - ' + ui.values[1] + '€');
                    $('#hidden_preciominimo').val(ui.values[0]);
                    $('#hidden_preciomaximo').val(ui.values[1]);
                    filter_data();
                }
            });

        });
    </script>

</body>

</html>





</script>

</body>

</html>