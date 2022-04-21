<?php 
	include('../php/conexion.php');
	session_start();
	if(isset($_SESSION["LOGIN"])){
	$ubi = "lista";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student On</title>
	<link rel="stylesheet" href="../main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php
	if(!isset($_SESSION["LOGIN"])){
	include '../navbar.php';
	}
	else{
		$tipo = $_SESSION['tipo'];
		if($tipo == "alumno"){
			include '../navbar2.php';
		}
		else{
			include '../navbar3.php';
		}
	}
 ?>
	<div class="container-fluid">
		<div class="container">
			<center>
			<br>
			<h2>Pase de Lista</h2>
			<p>Aqui podra verificaar a los alumnos que hayan asistido a su clase.</p>
			<br>
			</center>
		<div class="row">
			<?php 
			$result = mysqli_query($conexion,"SELECT * from cursos");
			while($fila=mysqli_fetch_array($result)){
				echo '<div class="col-4">
					<a href="listaPasar.php?clave='.$fila['clave'].'">'.$fila['clave'].'-'.$fila['nombre'].'-'.$fila['horario'].'</a>
					</div>';
			}
			?>
		</div>
		<br>

		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>