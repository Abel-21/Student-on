<?php 
	include('../php/conexion.php');
	session_start();
	if(isset($_SESSION["LOGIN"])){
	$ubi = "prestamos";
}

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
			<h2>Prestamos de Materiales</h2>
			<p>Aqui podra prestar los materiales.</p>
			<br>
			</center>
		<br>
		<div class="row">
			<div class="offset-md-2 col-md-8 col-sm-12">
								<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Clave</th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Estado</th>
				      <th scope="col">Existencia</th>
				      <th scope="col">Disponibles</th>
				      <th scope="col">Prestados</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php 
				  $result = mysqli_query($conexion,"SELECT * from materiales");
				  while($fila=mysqli_fetch_array($result)){
				  	echo '<tr>
				      <th scope="row">'.$fila['clave'].'</th>
				      <td>'.$fila['nombre'].'</td>
				      <td>'.$fila['Estado'].'</td>
				      <td>'.$fila['existencia'].'</td>
				      <td>'.$fila['disponibles'].'</td>
				      <td>'.$fila['prestados'].'</td>
				    </tr>';
				  }

				  ?>
				  </tbody>
				</table>
				<form action="../php/finPrestamo.php" method="post" accept-charset="utf-8">
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="claveMat">Nombre del Material</label>
				          <select class="form-control" name="claveMat" id="claveMat">
				          	<?php 
							  $result = mysqli_query($conexion,"SELECT * from materiales");
							  while($fila=mysqli_fetch_array($result)){
							  	echo '<option value="'.$fila['clave'].'">'.$fila['nombre'].'</option>';
							  }
				          	?>
						    </select>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputPassword4">Cantidad</label>
				      <input type="number" class="form-control" name="cantidad" id="cantidad">
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-12">
				      <label for="matricula">Matricula</label>
				          <select class="form-control" name="matricula" id="matricula">
				          	<?php 
							  $result = mysqli_query($conexion,"SELECT * from usuarios");
							  while($fila=mysqli_fetch_array($result)){


							  	echo '<option value="'.$fila['matricula'].'">'.$fila['matricula'].'-'.$fila['nombres'].' '.$fila['apellidos'].'</option>';
							  }
				          	?>
						    </select>
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="nombre">Fecha de Prestamo</label>
				      <input class="form-control" type="date" name="fechaI">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputPassword4">Fecha de Regreso</label>
				      <input class="form-control" type="date" name="fechaF">
				    </div>
				  </div>
				  <br>
				  <button class="btn btn-lg btn-primary btn-block" type="submit">Prestar</button>
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