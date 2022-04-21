<?php 
	include('php/conexion.php');
	session_start();
	if(isset($_SESSION["LOGIN"])){
	$ubi = "asistencias";
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
			<h2>Pase de Lista</h2>
			<p>Elija su materia que corresponde al pase de lista del dia de hoy.</p>
			<br>
			</center>
		<div class="row">

		<?php 
		if(isset($_SESSION["LOGIN"])){

		$mat = $_SESSION['matricula'];
		date_default_timezone_set('America/Mexico_City');
		$cont=0;
		$cont1=0;
		$hoy = date("j/n/Y");  
		$hoyC = date("Y-m-d");  
		$result = mysqli_query($conexion,"SELECT * from cursando where matricula ='$mat'");
		while($fila=mysqli_fetch_array($result)){
			$clave=$fila['claveC'];
			$result2=mysqli_query($conexion,"SELECT * from cursos where clave ='$clave'");
			$fila2 =mysqli_fetch_array($result2);
			$result3=mysqli_query($conexion,"SELECT * from paselista where matricula ='$mat' AND claveC='$clave' AND fecha='$hoyC'");

			echo '<div class="col-md-3 col-sm-6"><form method="POST" action="php/pasarlista.php">
				<h4>'.$fila2['nombre'].'</h4>
				<label>'.$hoy.'</label>
				<br>
				<div class="form-check form-check-inline">
				<input type="hidden" value="'.$clave.'" name="claveC">
				<input type="hidden" value="'.$mat.'" name="matricula">
				<input type="hidden" value="'.$cont1.'" name="numero">
				  <input class="form-check-input" type="radio" name="radio'.$cont1.'" id="radio'.$cont.'" value="0"';
			if(mysqli_num_rows($result3)!=0){

			}
			else{
				echo 'checked';
			}
			echo '><label class="form-check-label" for="radio'.$cont.'">No Asistire</label>
				</div>';
			$cont++;
			echo '<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="radio'.$cont1.'" id="radio'.$cont.'" value="1">
				  <label class="form-check-label" for="radio'.$cont.'">Asistire</label>
				</div>
				<button type="submit" class="btn btn-primary"';
			if(mysqli_num_rows($result3)!=0) echo 'disabled';
			echo '>Enviar</button>
			</form></div>';
			$cont++;
			$cont1++;
        }
    }

		?>
		</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>