<!-- //////PHP PARA CAPTCHA -->
<?php
require_once "recaptchalib.php";

$secreta = "clave secreta proporcionada por google";
// respuesta
$respuesta = null;
// compueba la clave secreta
$reCaptcha = new ReCaptcha($secreta);
// si se envía una respuesta de verificación
if (isset($_POST['Enviar'])) {
  $formulario = False;
  $respuesta = $reCaptcha->verifyResponse(
    $_SERVER["REMOTE_ADDR"],
    $_POST["g-recaptcha-response"]
  );
  if ($respuesta != null && $respuesta->success) {
    $formulario = False;
    echo "Hola " . $_POST["nombre"];
  } else {
    $formulario = True;
  }
} else {
  $formulario = True;
}
if ($formulario) {
?>

  <!DOCTYPE html>
  <html lang="ES">


  <head>
  <title>Disco's Two</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/DISCOSTWOs.png" />


    <link rel="stylesheet" href="css/registro.css">

  </head>

  <div align=center><a href="index.php">
      <img src="assets/DISCOSTWOletra.png" class="imglogo" alt="Volver a inicio" />
    </a></div>

  <body>
    <section class="form-register">
      <form action="registrocompleto.php" method="POST">
        <p><a href="login.php">¿Ya tengo Cuenta?</a></p>
        <h4>Crear cuenta</h4>
        <div>Email<input class="controls" type="email" name="email" id="email" placeholder="Ingrese su Correo" required></div>
        <div>Contraseña<input class="controls" type="password" name="contraseña" id="contraseña" placeholder="Ingrese su Contraseña" required></div>
        <div>Nombre<input class="controls" type="text" name="nombrecliente" id="nombrecliente" placeholder="Ingrese su Nombre" required></div>
        <div>Apellidos<input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus Apellidos" required></div>
        <div>DNI<input class="controls" type="text" pattern="[0-9]{8}[A-Za-z]{1}" name="DNI" id="DNI" placeholder="Ingrese su DNI" required></div>
        <div>Teléfono<input class="controls" pattern="+.[0-9]" type="text" name="telefono" id="telefono" placeholder="Ingrese su Teléfono" required></div>
        <div>Ciudad<input class="controls" type="text" name="ciudad" id="ciudad" placeholder="Ingrese su Ciudad" required></div>
        <div>Dirección<input class="controls" type="text" name="direccion" id="direccion" placeholder="Ingrese su Dirección" required></div>
        <p>Por favor, rellena este captcha.</p>
  
        <div class="g-recaptcha"  align=center data-sitekey="6LewCQUaAAAAAJM4chq_Mcn5sGlenmOBJP0eRuP7" data-callback="enableBtn"></div> 
        <input class="botons" text-align:center id="submit" name="submit" type="submit" value="Registrar" disabled>
    </section>


    </form>
    <!--js-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
    function enableBtn(){
        document.getElementById("submit").disabled = false;
    }
</script>

  </body>

  </html>




<?php
}
?>