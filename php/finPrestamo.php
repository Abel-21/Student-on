<?php

require 'conexion.php';
date_default_timezone_set('America/Mexico_City');
$hoyC = date("Y-m-d");

$clave = $_POST['claveMat'];
$mat = $_POST['matricula'];
$fechaI = $_POST['fechaI'];
$fechaF = $_POST['fechaF'];
$cant = $_POST['cantidad'];

$result = mysqli_query($conexion,"SELECT * from materiales where clave ='$clave'");
$fila =mysqli_fetch_array($result);
$disponibles = $fila['disponibles'];

if($disponibles >= $cant){
$inserta = "INSERT INTO prestamos(claveM,cantidad,matricula,fechaI,fechaF) VALUES ('$clave', '$cant','$mat','$fechaI','$fechaF')";
$resultado = mysqli_query($conexion,$inserta);

$total = $disponibles-$cant;
$inserta = "UPDATE materiales SET disponibles='$total',prestados='$cant' WHERE clave='$clave'";
$resultado = mysqli_query($conexion,$inserta);
   header("Location: ../admin/prestamos.php");
}
else{
         echo'<script> alert("Cantidad insuficiente de los materiales");
         window.history.go(-1)</script>;';
     }

