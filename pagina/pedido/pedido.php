<?php
session_start();
if (!isset($_SESSION['NombreCliente'])) {

	echo "<script>
		alert('Para poder ir a tu pedido, debes estar loggeado');
					window.location= '../../index.php' 
					</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Disco's Two</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>


	<link rel="shortcut icon" href="../../assets/DISCOSTWOs.png" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/index-cabecera.css">

</head>

<body>
	<header>
		<?php include("_main-header.php"); ?>
	</header>
	<div class="main-content">



		<div class="content-page">
			<h3>Mis pedidos</h3>
			<div class="body-pedidos" id="space-list">
			</div>
			<button id="procesarcompra" onclick="ProcesarCompra()" disabled>Procesar compra </button>

		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajax({
				url: '../../servicios/pedido/get_procesados.php',
				type: 'POST',
				data: {},
				success: function(data) {
					console.log(data);
					let html = '';
					let monto = 0;
					for (var i = 0; i < data.datos.length; i++) {
						html +=
							'<div class="item-pedido">' +
							'<div class="pedido-img">' +
							'<a href="../../producto.php?p=' + data.datos[i].IDArticulo + '"><img src="../../assets/products/' + data.datos[i].Imagen + '"></a>' +
							'</div>' +
							'<div class="pedido-detalle">' +
							'<h3>' + data.datos[i].NombreArticulo + '</h3>' +
							'<p><b>Precio:</b> ' + data.datos[i].Precio + ' €</p>' +
							'<p><b>Fecha:</b> ' + data.datos[i].Fecha + '</p>' +
							'<p><b>Estado:</b> Por Pagar </p>' +
							'<button onclick="borrarpedido(' + data.datos[i].idPedido + ')">Borrar</button>' +

							'</div>' +
							'</div>';
						if (html != "") {
							document.getElementById("procesarcompra").disabled = false;
						}

					}

					//document.getElementById("montototal").innerHTML=monto;
					document.getElementById("space-list").innerHTML = html;
				},
				error: function(err) {
					console.error(err);
				}
			});
		});

		function borrarpedido(idPedido) {
			$.ajax({
				url: '../../servicios/pedido/borrarpedido.php',
				type: 'POST',
				data: {
					idPedido: idPedido
				},
				success: function(data) {
					console.log(data);
					if (data.state) {
						alert(data.detail);
						window.location.href = "pedido.php";
					} else {
						alert(data.detail);
						/*if (data.open_login) {
							open_login();
						}*/
					}
				},
				error: function(err) {
					console.error(err);
				}
			});
		}




		function ProcesarCompra() {
			window.location.href = "PedidoRellenar.php";
		}
	</script>

</body>

</html>

<?php
//FUNCION PARA ALERT



function alert($msg)
{
	echo "<script src='../../js/main-script.js'></script>
	<script type='text/javascript'>alert('$msg');</script>";
}
?>