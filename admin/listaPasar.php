<?php 
	include('../php/conexion.php');
	session_start();
	if(isset($_SESSION["LOGIN"])){
	$ubi = "lista";
}

$clave = $_GET['clave'];
date_default_timezone_set('America/Mexico_City');

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
			<center>
			<?php 
			
			$result = mysqli_query($conexion,"SELECT * from cursos WHERE clave='$clave'");
			$fila =mysqli_fetch_array($result);
			$hoy = date("d/m/Y"); 
			echo '<h3>'.$fila['nombre'].'</h3>
				<h4>'.$hoy.'</h4>';
			?>
				
			</center>
		<div class="row">

			<div class="col-12">
				<form method="POST" action="../php/finLista.php">
				<table class="table">
						<?php 
							echo '<input type="hidden" name="claveC" value="'.$clave.'">'
						?>
				  <thead>
				    <tr>
				      <th scope="col">Matricula</th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Asistencia Previa</th>
				      <th scope="col">Asistencia</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  	$hoyC = date("Y-m-d");
				  	$result = mysqli_query($conexion,"SELECT * from cursando WHERE claveC='$clave'");
				  	while($fila=mysqli_fetch_array($result)){
				  		$pase=0;
				  		$mat=$fila['matricula'];
				  		$result2 = mysqli_query($conexion,"SELECT * from usuarios WHERE matricula='$mat'");
				  		$fila2 =mysqli_fetch_array($result2);

				  		echo'<tr>
				      <th scope="row">'.$mat.'</th>
				      <td>'.$fila2['nombres'].' '.$fila2['apellidos'].'</td>';

				      	$result3 = mysqli_query($conexion,"SELECT * from paselista WHERE matricula='$mat' AND fecha='$hoyC' AND claveC='$clave'");

				      	if(mysqli_num_rows($result3)>0){
				      		$lista =mysqli_fetch_array($result3);
				      		if($lista['pase']==1){
				      			echo '<td>Si</td>';
				      		}
				      		else if($lista['pase']==2){
				      			echo '<td>Si</td>';
				      			$pase=1;
				      		}
				      	}
				      	else{
				      		echo '<td>No</td>';
				      	}

				    if($pase==1){
				    	echo '<td>Ya se realizo el pase de lista
						</td>
				    </tr>';
				    }
				    else{
				    echo  '<td><div class="form-check">
						  <input class="form-check-input" type="checkbox" value="'.$mat.'" name="check_list[]">
						</div>
						</td>
				    </tr>';
					}

				  	}

				  	?>

				  </tbody>
				
				</table>
			<center><button type="submit" class="btn btn-primary">Enviar</button></center>
			</form>
			</div>

		</div>
	</div>
</div>