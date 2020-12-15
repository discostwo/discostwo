<?php

// 1: Error de conexión
// 2: Usuario incorrecto
// 3: Contraseña incorrecta

include '_conexion.php';
$conexion->query("SET NAMES 'utf8'");
$Adminuser = $_POST["Adminuser"];
$Contraseñaadmin = $_POST['Contraseñaadmin'];
$sql="SELECT * FROM admin WHERE Adminuser=?";
$result=$conexion->prepare($sql);
$result->bind_param("s", $Adminuser);
$result->execute();
$result2 = $result->get_result();


$res ="";
$querycontra ="SELECT Contraseñaadmin FROM admin WHERE Adminuser=?";
$resultcontra=$conexion->prepare($querycontra);
$resultcontra->bind_param("s", $Adminuser);
$resultcontra->execute();
$resultcontra2 = $resultcontra->get_result();
$resultadocontra3 = mysqli_fetch_assoc($resultcontra2);

if(isset($resultadocontra3['Contraseñaadmin'])){
    $res = $resultadocontra3['Contraseñaadmin'];
}







if($result2){
    $row = mysqli_fetch_array($result2);
    $count = mysqli_num_rows($result2);

    // Si se encuentra el adminuser
    if ($count != 0){
      

      if ($res != $Contraseñaadmin ){
   
            // Contraseña incorrecta (Contraseña)
             header('Location: ../login-admin.php?e=3'); 
        }else{
            // Se inicia la sesión
          
         
            session_start();

            
            $_SESSION["Adminuser"] = $row["Adminuser"];
            $_SESSION["IDAdmin"] = $row["IDAdmin"];
            // Se vuelve al index
             header('Location: ../gestor/index.php'); 
        }
    }else{
        // Email incorrecto
        header('Location: ../login-admin.php?e=2');
    }
}else{
    // Fallo de conexión
    header('Location: ../login-admin.php?e=1');
}
?>