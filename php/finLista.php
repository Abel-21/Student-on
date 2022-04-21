<?php

require 'conexion.php';
date_default_timezone_set('America/Mexico_City');
$hoyC = date("Y-m-d");

$clave = $_POST['claveC'];
foreach ($_POST['check_list'] as $mat) {
	 $inserta = "INSERT INTO paselista(matricula,fecha,pase,claveC) VALUES ('$mat', '$hoyC', 2,'$clave')";
	 $resultado = mysqli_query($conexion,$inserta);
}

   header("Location: ../admin/lista.php");
