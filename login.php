<!DOCTYPE html>
<html>

<head>
	<title>Disco's Two</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/DISCOSTWOs.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<!--===============================================================================================-->

</head>

<body>
	<header>



	</header>
	<div class="main-content">

		<div class="container-login100">
			<div class="wrap-login100">
				<div>
					<a href="index.php">
						<img src="assets/DISCOSTWOfull.png" alt="IMG" class="login100-picimg"> </a>

				</div>

				<form class="login100-form validate-form" action="servicios/login_sql.php" method="POST">

					<span class="login100-form-title">
						Inicia sesión
					</span>

					<div class="wrap-input100 validate-input" data-validate="Inserte un email">
						<input class="input100" type="text" name="Email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Inserte una contraseña">
						<input class="input100" type="password" name="Contraseña" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<!-- MENSAJES DE ERROR -->
					<?php
					if (isset($_GET['e'])) {
						switch ($_GET['e']) {
							case '1':
								echo '<p>Error de conexión</p>';
								break;
							case '2':
								echo '<p>Usuario incorrecto</p>';
								break;
							case '3':
								echo '<p>Contraseña incorrecta</p>';
								break;
							default:
								break;
						}
					}
					?>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Acceder
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							¿Has olvidado tu
						</span>
						<a class="txt2" href="#">
							Usuario / Contraseña
						</a>
						<span class="txt1">
							?
						</span>
					</div>
				</form>
				<a href="registro.php">
					<button class="login100-form-btnreg" >
						Regístrate
					</button></a>

								
			</div>
		</div>
	</div>



	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/main-script.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>


	<script type="text/javascript">
	function registro(){
    $.ajax({
        url:'servicios/compra/registrocompleto.php',
        type:'POST',
        data:{
          email:email,
          contraseña:contraseña,
          nombrecliente:nombrecliente,
          apellidos:apellidos,
          DNI:DNI,
          telefono:telefono,
          ciudad:ciudad,
          direccion:direccion
        },
        success:function(data){
            console.log(data);
            if (data.state) {
                alert(data.detail);
                open_login();
                
            }else{
                alert(data.detail);
               
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
