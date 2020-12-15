<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Disco's Two</title>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index-cabecera.css">

    

</head>

<body>
    
<?php include("_main-header.php"); ?>    

    <div class="main-content">
        <div class="content-page">
            <section>
                <div class="part1">
                    <img id="idimg" src="">
                </div>
                <div class="part2">
                    <h2 id="idtitle"></h2>
                    <h1 id="idprice"></h1>
                    <h3 id="idartist"></h3>

                    <h3 id="iddescription"></h3>
                    <button onclick="iniciar_compra()">Comprar</button>
                    <h2>Escucha su nuevo single:</h2>


                    <iframe width="560" height="315" id="idvideo" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                </div>
            </section>
            <div class="title-section"></div>
            <div class="products-list" id="space-list">

            </div>
        </div>
    </div>
    <script type="text/javascript">
        var p = '<?php echo $_GET["p"]; ?>';
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: 'servicios/producto/get_all_productos.php',
                type: 'POST',
                data: {},
                success: function(data) {
                    console.log(data);

                    let html = '';
                    for (var i = 0; i < data.datos.length; i++) {
                        if (data.datos[i].IDArticulo == p) {
                            document.getElementById("idimg").src = "assets/products/" + data.datos[i].Imagen;
                            document.getElementById("idtitle").innerHTML = data.datos[i].NombreArticulo;
                            document.getElementById("idprice").innerHTML = precio(data.datos[i].Precio);
                            document.getElementById("idartist").innerHTML = data.datos[i].Artista;
                            document.getElementById("iddescription").innerHTML = data.datos[i].Descripcion;
                            document.getElementById("idvideo").src = data.datos[i].video;
                            console.log(data.datos[i]);



                        }
                        html += '<div class="product-box">' +
                            '<a href="producto.php?p=' + data.datos[i].IDArticulo + '">' +
                            '<div class="product">' +
                            '<img src="assets/products/' + data.datos[i].Imagen + '">' +
                            '<div class="detail-title">' + data.datos[i].NombreArticulo + '</div>' +
                            '<div class="detail-description">' + data.datos[i].Artista + '</div>' +
                            '<div class="detail-price">' + precio(data.datos[i].Precio) + ' </div>' +
                            '</div>' +
                            '</a>' +
                            '</div>';
                    }
                    document.getElementById("space-list").innerHTML = html;
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });

        function precio(valor) {
            let svalor = valor.toString();
            let array = svalor.split(".");
            return array[0] + " € </span>";
        }

        function iniciar_compra(){
            $.ajax({
                url:'servicios/compra/validar_inicio_compra.php',
                type:'POST',
                data:{
                    IDArticulo:p
                },
                success:function(data){
                    console.log(data);
                    if (data.state) {
                        alert(data.detail);
                    }else{
                        alert(data.detail);
                        if (data.open_login) {
                            open_login();
                        }
                    }
                },
                error:function(err){
                    console.error(err);
                }
            });
        }
        function open_login(){
            window.location.href="login.php";
        }
    </script>
</body>

</html>