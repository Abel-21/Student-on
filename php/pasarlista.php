<?php

require 'conexion.php';
date_default_timezone_set('America/Mexico_City');
$hoy = date("Y-m-d"); 
$clave = $_POST['claveC'];
$mat = $_POST['matricula'];
$num = $_POST['numero'];
$nombre = 'radio'.$num;
$lista = $_POST[$nombre];

$inserta = "INSERT INTO paselista(matricula,fecha,pase,claveC) VALUES ('$mat', '$hoy', '$lista','$clave')";

 $resultado = mysqli_query($conexion,$inserta);
    if(!$resultado){
        echo '<script> 
             alert("Error en el Registro"); 
             window.history.go(-1);
        </script>';
   
    }else{
    	echo '<script> 
             alert("Correcto"); 
             window.history.go(-1);
        </script>';
    }