<?php

// 1: Error de conexión
// 2: Usuario incorrecto
// 3: Contraseña incorrecta

include '_conexion.php';
$conexion->query("SET NAMES 'utf8'");
$Email = $_POST["Email"];
$Contraseña = $_POST['Contraseña'];

$sql="SELECT * FROM cliente WHERE Email=?";




$result=$conexion->prepare($sql);
$result->bind_param("s", $Email);
$result->execute();
$result2 = $result->get_result();


$queryhash="SELECT Contraseña FROM cliente WHERE Email=?";
$resulthash=$conexion->prepare($queryhash);
$resulthash->bind_param("s", $Email);
$resulthash->execute();
$resulthash2 = $resulthash->get_result();
$resulthash3 = mysqli_fetch_assoc($resulthash2);
if(isset($resulthash3['Contraseña'])){
    $Contraseñahash = $resulthash3['Contraseña'];
}


if($result2){
    $row = mysqli_fetch_array($result2);
    $count = mysqli_num_rows($result2);

    // Si se encuentra el cliente
    if ($count != 0){

     
        
        if ((password_verify($Contraseña, $Contraseñahash)) == false){

            // Contraseña incorrecta (Contraseña)
            header('Location: ../login.php?e=3');  
        }else{
            // Se inicia la sesión
            session_start();

            $_SESSION["NombreCliente"] = $row["NombreCliente"];
            $_SESSION["IDCliente"] = $row["IDCliente"];
            // Se vuelve al index
            header('Location: ../');
        }
    }else{
        // Email incorrecto
        header('Location: ../login.php?e=2');
    }
}else{
    // Fallo de conexión
    header('Location: ../login.php?e=1');
}
?>