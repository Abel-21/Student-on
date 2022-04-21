<?php

require 'conexion.php';

$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$estado = $_POST['estado'];
$exist = $_POST['existencia'];

    $verifica = mysqli_query($conexion,"SELECT * FROM materiales WHERE clave ='$clave'");
    if(mysqli_num_rows($verifica)>0)
    {
        echo '<script> 
             alert("El material ya esta registrado"); 
             window.history.go(-1);
        </script>';
        exit;
    }

    $inserta = "INSERT INTO materiales(clave,existencia,nombre,estado,disponibles,prestados) VALUES ('$clave', '$exist', '$nombre','$estado','$exist',0)";
    $resultado = mysqli_query($conexion,$inserta);
     if(!$resultado){
     	         echo'<script> alert("Error al guardar el material");
         window.history.go(-1)</script>;';
     }
     else{
     	    	echo'<script> alert("Subida Exitosa");
         window.history.go(-1)</script>;';
     }