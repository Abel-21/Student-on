
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Student On</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($ubi == "index") echo "active" ?>">
        <a class="nav-link" href="index.php">Inicio</a>
      </li>
      <li class="nav-item <?php if($ubi == "asistencias") echo "active" ?> ">
        <a class="nav-link" href="lista.php">Asistencias</a>
      </li>
      <li class="nav-item <?php if($ubi == "materiales") echo "active" ?>">
        <a class="nav-link" href="materiales.php">Materiales</a>
      </li>
      <li class="nav-item <?php if($ubi == "calificaciones") echo "active" ?>">
        <a class="nav-link" href="calificaciones.php">Calificaciones</a>
      </li>
      <li class="nav-item <?php if($ubi == "foro") echo "active" ?>">
        <a class="nav-link" href="blog.php">Foro</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li><a class="href" href=""><?php echo $_SESSION['nombres'] ?> |</a></li>
      <li class="href"><a class="href" href="php/cerrar.php"> Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>