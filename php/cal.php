<?php

require 'conexion.php';
date_default_timezone_set('America/Mexico_City');
$hoyC = date("Y-m-d");

$clave = $_POST['curso'];
$titulo = $_POST['titulo'];
$nom=$_FILES['archivo']['name'];

  $ruta="../pdf/".$_FILES['archivo']['name'];
  if(is_uploaded_file($_FILES['archivo']['tmp_name']))
    copy($_FILES['archivo']['tmp_name'],$ruta);


$result = mysqli_query($conexion,"INSERT INTO calificaciones(claveM,titulo,ubicacion,fecha) values ('$clave','$titulo','$nom','$hoyC')");

$resultado = mysqli_query($conexion,$result);
    if(!$resultado){
    	echo'<script> alert("Subida Exitosa");
         window.history.go(-1)</script>;';
   header("Location: ../admin/prestamos.php");}
   else{

         echo'<script> alert("Error alsubir el archivo");
         window.history.go(-1)</script>;';
     }
