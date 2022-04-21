<?php

require 'conexion.php';

$clave = $_POST['clave'];
$horario = $_POST['horario'];
$nombre = $_POST['nombre'];

    $verifica = mysqli_query($conexion,"SELECT * FROM cursos WHERE clave ='$clave'");
    if(mysqli_num_rows($verifica)>0)
    {
        echo '<script> 
             alert("El curso ya esta registrado"); 
             window.history.go(-1);
        </script>';
        exit;
    }

    $inserta = "INSERT INTO cursos(clave,horario,nombre) VALUES ('$clave', '$horario', '$nombre')";
    $resultado = mysqli_query($conexion,$inserta);
     if(!$resultado){
     	         echo'<script> alert("Error al guardar el curso");
         window.history.go(-1)</script>;';
     }
     else{
     	    	echo'<script> alert("Subida Exitosa");
         window.history.go(-1)</script>;';
     }