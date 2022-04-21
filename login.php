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
	include 'navbar.php';
 ?>
	<form class="form-signin" method="POST" action="php/iniciar.php">
      <center><img class="mb-4" src="microscopio.png" alt="" width="110" height="150"></center>
      <center><h2>Inicia Sesión</h2></center>
      <label for="email" class="sr-only">Email</label>
      <input type="email" id="email" class="form-control" placeholder="Escribe tu Email" required autofocus name="email">
      <label for="contra" class="sr-only">Contraseña</label>
      <input name="contra" type="password" id="contra" class="form-control" placeholder="Contraseña" required="">
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>

    </form>
</body>
</html>