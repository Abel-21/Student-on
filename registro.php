<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student On - Developer Abel</title>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<?php
	include('php/conexion.php');
	include 'navbar.php';
	session_start();
	$result = mysqli_query($conexion,"SELECT * from cursos");

 ?>
<div class="container-fluid">
	<div class="container">
		<center><h1>STUDENT ON</h1></center>
		<br>
		<center><h2>Registro de Alumnos</h2></center>
		<br>
	<div class="row">
		<div class="col-6">
			<form method="POST" action="php/registrar.php">
			  <div class="form-group row">
			    <label for="nombres" class="col-sm-2 col-form-label">Nombres:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escribe tus nombres" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escribe tus apellidos" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="email" class="col-sm-2 col-form-label">Email:</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" id="email" name="email" placeholder="Escribe tu email" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="matricula" class="col-sm-2 col-form-label">Matricula:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Escribe tu matricula" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="contra" class="col-sm-2 col-form-label">Contraseña:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="contra" name="contra" placeholder="Escribe tu contraseña" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="curso" class="col-sm-2 col-form-label">Curso:</label>
			    <div class="col-sm-10">
			          <select class="form-control" id="curso1" name="curso1" required>
			          <?php
					    while($fila = mysqli_fetch_array($result)){
					    	$nombre=$fila["nombre"];
					    	$horario=$fila["horario"];
					    	$clave=$fila["clave"];

					    	echo '<option value="'.$clave.'">'.$nombre.' '.$horario.'</option>';
					    }
					   ?>
					   </select>
			    </div>
			  </div>
			  <label>En caso de tener más de una materia con la profesora ocupe los siguientes recuadros</label>
			  	<div class="form-group row">
			    <label for="curso" class="col-sm-2 col-form-label">Curso 2:</label>
			    <div class="col-sm-10">
			          <select class="form-control" id="curso2" name="curso2">
			          	<option value="vacio">Selecciona...</option>
			          <?php
			          $result = mysqli_query($conexion,"SELECT * from cursos");

					    while($fila = mysqli_fetch_array($result)){
					    	$nombre=$fila["nombre"];
					    	$horario=$fila["horario"];
					    	$clave=$fila["clave"];

					    	echo '<option value="'.$clave.'">'.$nombre.' '.$horario.'</option>';
					    }
					   ?>
					   </select>
			    </div>
			  </div>
			  	<div class="form-group row">
			    <label for="curso" class="col-sm-2 col-form-label">Curso 3:</label>
			    <div class="col-sm-10">
			          <select class="form-control" id="curso3" name="curso3">
			          	<option value="vacio">Selecciona...</option>
			          <?php
			          $result = mysqli_query($conexion,"SELECT * from cursos");

					    while($fila = mysqli_fetch_array($result)){
					    	$nombre=$fila["nombre"];
					    	$horario=$fila["horario"];
					    	$clave=$fila["clave"];

					    	echo '<option value="'.$clave.'">'.$nombre.' '.$horario.'</option>';
					    }
					   ?>
					   </select>
			    </div>
			  </div>
			  <center>
			  	<button type="submit" class="btn btn-info">Registrar</button>
			</center>
			    </form>	
		</div>
		<div class="col-6">
			<center>
			<img src="microscopio.png" class="imagen">
			<h3>Laboratorio de Patologia</h3>
			<h4>Dra. Samantha Rivera Macias</h4>
			</center>
		</div>


</div>
</div>
</div>
</body>
</html>