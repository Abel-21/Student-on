<?php 
	include('../php/conexion.php');
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
			<h2>Subir Calificaciones</h2>
			<p>Aqui podra subir los archivos pdfs contenedores de las calificaciones.</p>
			<br>
			</center>
		<br>
		<div class="row">
			<div class="offset-md-2 col-md-8 col-sm-12">
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
		<div class="row">
			<div class="offset-md-2 col-md-8 col-sm-12">
				<form action="../php/cal.php" method="post" accept-charset="utf-8" ENCTYPE="multipart/form-data">
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="nombre">Materia</label>
 						<select class="form-control" name="curso" id="curso">
 				<?php 
				  $result = mysqli_query($conexion,"SELECT * from cursos");
				  while($fila=mysqli_fetch_array($result)){
				  	echo '<option value="'.$fila['clave'].'">'.$fila['clave'].'-'.$fila['nombre'].' '.$fila['horario'].'</option>';
				  }

				  ?>
						 </select>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="fecha">Fecha</label>
				      <input class="form-control" type="date" id="fecha" name="" value="" placeholder="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="archivo">Archivo PDF</label>
				    <input type="file" class="form-control-file" id="archivo" name="archivo">
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-12">
				      <label for="titulo">Titulo</label>
				      <input class="form-control" type="text" name="titulo" placeholder="Escriba el titulo...">
				    </div>
				  </div>
				  <br>
				  <center>
				  	<div class="col-md-6 col-sm-12">
				  <button class="btn btn-primary btn-block" type="submit">Subir</button>
				</div>
				</center>
				  <br>
				</form>
			</div>
		</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>