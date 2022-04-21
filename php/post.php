<?php

require 'conexion.php';
	session_start();
$matricula = $_SESSION["matricula"];
$tipo = $_SESSION["tipo"];

$titulo = $_POST['titulo'];
$coment = $_POST['comentario'];

date_default_timezone_set('America/Mexico_City');
$hoyC = date("Y-m-d");

$inserta = "INSERT INTO foro(matricula,comentario,fecha,titulo,tipo) VALUES ('$matricula', '$coment','$hoyC','$titulo','$tipo')";
$resultado = mysqli_query($conexion,$inserta);

    if(!$resultado){
        echo '<script> 
             alert("Error en el foro"); 
             window.history.go(-1);
        </script>';
   
    }else{
    	echo '<script> 
             alert("Post exitoso"); 
             window.history.go(-1);
        </script>';
           header("Location: ../blog.php");
    }
