<?php 
	include('php/conexion.php');
	session_start();
	if(isset($_SESSION["LOGIN"])){
	$ubi = "calificaciones";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student On</title>
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
		else{
			include 'navbar3.php';
		}
	}
 ?>
	<div class="container-fluid">
		<div class="container">
			<center>
			<br>
			<h2>Calificaciones</h2>
			<p>Aqui podras visualizar tus calificaciones.</p>
			<br>
			</center>
		<div class="row">
			<div class="col-12">
				<ul>
				
				<?php
					$result = mysqli_query($conexion,"SELECT * from calificaciones");
					while($fila=mysqli_fetch_array($result)){
						$clave=$fila['claveM'];
						$ubicacion=$fila['ubicacion'];
						$titulo=$fila['titulo'];
						$fecha=$fila['fecha'];
						$result2 = mysqli_query($conexion,"SELECT * from cursos WHERE clave='$clave'");
						$fila2 =mysqli_fetch_array($result2);
						$nombre=$fila2['nombre'];
						echo '<li><h3><b>'.$clave.'-'.$nombre.'</b></h3><h4>'.$fecha.'</h4><a href="../pdf/'.$ubicacion.'" download>'.$titulo.'</a></li>';
					}
				?>
				</ul>
			</div>
		</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>