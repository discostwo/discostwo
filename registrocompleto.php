<?php
require './servicios/_conexion.php';

$DNI = utf8_decode($_POST['DNI']);
$Email = utf8_decode($_POST['email']);
$Contraseña = utf8_decode($_POST['contraseña']);
$NombreCliente = utf8_decode($_POST['nombrecliente']);
$Apellidos = utf8_decode($_POST['apellidos']);
$Telefono = utf8_decode($_POST['telefono']);
$Ciudad = utf8_decode($_POST['ciudad']);
$Direccion = utf8_decode($_POST['direccion']);
$response = new stdClass();
$Contraseñahash = password_hash($Contraseña, PASSWORD_BCRYPT);


$bool = false;
$DNIduplicadoquery = "SELECT DNI from cliente where DNI=?";
$querydni=$conexion->prepare($DNIduplicadoquery);

$querydni->bind_param("s", $DNI);
$querydni->execute();
$resultDNI = $querydni->get_result();
 $dnidup ="";

if ($resultDNI != NULL){
$dniduplicado = mysqli_fetch_assoc($resultDNI);
if(isset($dniduplicado['DNI'])){
  $dnidup = $dniduplicado['DNI'];
}
}


$EMAILduplicadoquery = "SELECT Email from cliente where Email=?";
$queryemail=$conexion->prepare($EMAILduplicadoquery);

$queryemail->bind_param("s", $Email);
$queryemail->execute();
$resultemail = $queryemail->get_result();

$emaildup= "";
 
if ($resultemail != NULL){
  $emailduplicado = mysqli_fetch_assoc($resultemail);
  if(isset($emailduplicado['Email'])){
    $emaildup = $emailduplicado['Email'];;
}

  }


//RESTRICCIONES DE FORMULARIO
////////////////////////////
if ($Email == $emaildup) {
  $bool=true;
	echo "<script>
		alert('[ERROR] Este email ya está registrado.');
    window.location= 'registro.php'
					</script>";
}

if (($Email == null) || ($Email == "") || !(preg_match("/.@./", $Email))) {
  $bool=true;
	echo "<script>
    alert('[ERROR] Introduce un email o un email correcto');
                window.location= 'registro.php'
    </script>";
}
if ($DNI == $dnidup) {
  $bool=true;
	echo "<script>
		alert('[ERROR] Este DNI ya está registrado.');
    window.location= 'registro.php'
					</script>";
}

if ($DNI == null || $DNI == ""  ||	 !(preg_match("/^[0-9]*[A-Za-z]?$/", $DNI))) {
  $bool=true;
	echo "<script>
    alert('[ERROR] Introduce un DNI o un DNI correcto');
                window.location= 'registro.php'
    </script>";
}
if ($Telefono == null || $Telefono == "" || !(preg_match("/^.+[0-9]$/", $Telefono))) {
  $bool=true;
	echo "<script>
    alert('[ERROR] Introduce un telefono o un telefono correcto');
                window.location= 'registro.php'
    </script>";
}

//////////////////////VERIFICAMOS EL CAPTCHA, para que esté relleno y compruebe que no eres un bot

 if(isset($_POST['g-recaptcha-response'])){
	$captcha=$_POST['g-recaptcha-response'];
  }
  if(!$captcha){
	echo "<script>
    alert('[ERROR] Rellena el captcha');
                window.location= 'registro.php'
    </script>";
	exit;
  }

  $secretKey = "6LewCQUaAAAAAIzsurnFHqriCD2ottkmDtg0Y-56";
  $ip = $_SERVER['REMOTE_ADDR'];
  $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
  $responseKeys = json_decode($response,true);
  if(intval($responseKeys["success"]) !== 1) {
	echo "<script>
	alert('[ERROR] ERES UN BOT'); 
	window.location= 'registro.php'
    </script>";
  }
 
////////////////////////////
////////////////////////////


if($bool==false)
{
  

$insert_value = 'INSERT INTO cliente (DNI,  Email, Contraseña, NombreCliente,  Apellidos, Telefono, Ciudad, Direccion) VALUES 
	(?, ?, ?, ?, ?, ?, ?, ?)';




$query = $conexion->prepare($insert_value);
$query->bind_param("ssssssss", $DNI, $Email, $Contraseñahash, $NombreCliente,  $Apellidos, $Telefono, $Ciudad, $Direccion);
$query->execute();



//redireccionamos a login
echo "<script>
	alert('Se ha registrado correctamente. Se te redireccionará a login.');
                window.location='login.php'
    </script>";


}


//FUNCION PARA ALERT
function alert($msg)
{
	echo "<script src='js/main-script.js'></script>
	<script type='text/javascript'>alert('$msg');</script>";
}


mysqli_close($conexion);
?>