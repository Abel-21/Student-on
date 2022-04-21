<?php
    session_start();
    include('conexion.php');
    $email = $_POST['email'];
    $contra = $_POST['contra'];
     $encripta=sha1($contra);
    $result = mysqli_query($conexion,"SELECT * from usuarios where email ='$email' AND contra ='$encripta'");
    if(mysqli_num_rows($result)>0){
        $fila =mysqli_fetch_array($result);
        $_SESSION['nombres']= $fila['nombres'];
        $_SESSION['tipo']= $fila['tipo'];
        $_SESSION['matricula'] = $fila['matricula'];
        $_SESSION['ubicacion']= "index";
        $_SESSION['LOGIN'] = true;
        
       echo'<script> alert("Bienvenido");
         window.history.go(-1)</script>;';
            header("Location: ../index.php");
     }else{
         echo'<script> alert("Usuario  y/o Contraseña Incorrectos");
         window.history.go(-1)</script>;';
     }