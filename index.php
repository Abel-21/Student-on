<?php 
	include('php/conexion.php');
	session_start();
	if(isset($_SESSION["LOGIN"])){
	$ubi = $_SESSION['ubicacion'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student On - Developer Abel</title>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php 
	if(!isset($_SESSION["LOGIN"])){
	include 'navbar.php';
	}
	else{
		$tipo = $_SESSION['tipo'];
		if($tipo == "alumno"){
			include 'navbar2.php';
		}
		else if($tipo == "admin"){
			include 'navbar3.php';
		}
	}
 ?>
<div class="jumbotron">
	<div class="row">
		<div class="col-md-2 col-sm-5">
			<img src="profesora.jpeg" class="img-fluid" alt="">
		</div>
		<div class="offset-md-1 col-md-9 col-sm-7">
			<h3>Dra. Samantha Rivera Macias</h3>
			<h4>Dentista - Odontologa,Patologa</h4>
			<h4>Especialista en: <b>Medicina Bucal</b></h4>
		</div>
	</div>
.</div>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
			<div class="col-md-6 col-sm-5">
				<h3>Experta en enfermedades</h3>
				<ul>
					<li>Cancer Bucal</li>
					<li>Ulcera Labial</li>
					<li>Ulceras Bucales</li>
					<li>Sialoadenitis</li>
					<li>Trastornos de las glandulas salivales</li>
				</ul>
			</div>
			<div class="col-6">
				<h3>Formacion</h3>
				<label>Mestria en patologia y medicina bucal, UAM,2011</label>
				<h3>Cedula Profesional</h3>
				<label>50413697515095</label>
			</div>
		</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
</body>
</html>