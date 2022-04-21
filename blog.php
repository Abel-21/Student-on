<?php 
	include('php/conexion.php');
	session_start();
	if(isset($_SESSION["LOGIN"])){
	$ubi = "foro";
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
			<h2>Foro</h2>
			<p>Aqui apareceran los anuncios de la profesora y de los alumnos.</p>
			<br>
			</center>
		<div class="row">
			<div class="offset-md-3 col-md-6 col-sm-12">
				<form action="php/post.php" method="post" accept-charset="utf-8">
				<div class="card padding">
  <div class="form-group row">
    <label for="nombre" class="col-sm-3 col-form-label">Nombres</label>
    <div class="col-sm-9">
      <input type="text" readonly class="form-control-plaintext" id="nombre" name="nombre" value="<?php
      echo $_SESSION["nombres"] ?>">
    </div>
  </div>
    <div class="form-group row">
    <label for="titulo" class="col-sm-3 col-form-label">Titulo</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
    </div>
  </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Comentario</label>
    <textarea class="form-control" name="comentario" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="col-sm-6"><button type="submit" class="btn btn-primary">Enviar</button></div>
				</div>
			</form>
			</div>
		</div>
		<br>
		<div class="row">
			<?php 
			$result = mysqli_query($conexion,"SELECT * from foro ORDER BY fecha ASC");
			while($fila=mysqli_fetch_array($result)){
				$comentario=$fila['comentario'];
				$mat=$fila['matricula'];
				$fecha=$fila['fecha'];
				$titulo=$fila['titulo'];

				$result2 = mysqli_query($conexion,"SELECT * from usuarios WHERE matricula='$mat'");
				$fila2 =mysqli_fetch_array($result2);
				$nombres=$fila2['nombres'];
				$apellidos=$fila2['apellidos'];

				if($fila['tipo']=="admin"){
					echo'<div class="offset-md-2 col-md-8 col-sm-12">
				<div class="card">
				  <h5 class="card-header">'.$nombres.' '.$apellidos.'</h5>
				  <div class="card-body">
				    <h5 class="card-title">'.$titulo.'     '.$fecha.'</h5>
				    <p class="card-text">'.$comentario.'</p>
				  </div>
				</div>
			</div>';
				}else{
					echo '<div class="offset-md-4 col-md-6 col-sm-12">
				<div class="card">
				  <h5 class="card-header">'.$nombres.' '.$apellidos.'</h5>
				  <div class="card-body">
				    <h5 class="card-title">'.$titulo.'     '.$fecha.'</h5>
				    <p class="card-text">'.$comentario.'</p>
				  </div>
				</div>
			</div>';

				}
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