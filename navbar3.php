<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Student On</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($ubi == "index") echo "active" ?>">
        <a class="nav-link" href="<?php if($ubi == "index"|| $ubi == "foro") echo "index.php"; else echo "../index.php"; ?>">Inicio</a>
      </li>
      <li class="nav-item <?php if($ubi == "lista") echo "active" ?>">
        <a class="nav-link" href="<?php if($ubi == "index"|| $ubi == "foro") echo "admin/lista.php"; else echo "lista.php"; ?>">Pase de Lista</a>
      </li>
      <li class="nav-item <?php if($ubi == "prestamos") echo "active" ?>">
        <a class="nav-link" href="<?php if($ubi == "index"|| $ubi == "foro") echo "admin/prestamos.php"; else echo "prestamos.php"; ?>">Prestamos</a>
      </li>
      <li class="nav-item <?php if($ubi == "calificaciones") echo "active" ?>">
        <a class="nav-link" href="<?php if($ubi == "index"|| $ubi == "foro") echo "admin/subirCal.php"; else echo "subirCal.php"; ?>">Calificaciones</a>
      </li>
      <li class="nav-item <?php if($ubi == "cursos") echo "active" ?>">
        <a class="nav-link" href="<?php if($ubi == "index"|| $ubi == "foro") echo "admin/subirCurso.php"; else echo "subirCurso.php"; ?>">Cursos</a>
      </li>
      <li class="nav-item <?php if($ubi == "materiales") echo "active" ?>">
        <a class="nav-link" href="<?php if($ubi == "index"|| $ubi == "foro") echo "admin/subirMateriales.php"; else echo "subirMateriales.php"; ?>">Materiales</a>
      </li>
      <li class="nav-item <?php if($ubi == "foro") echo "active" ?>">
        <a class="nav-link" href="<?php if($ubi == "index"|| $ubi == "foro") echo "blog.php"; else echo "../blog.php"; ?>">Foro</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li><a class="href" href=""><?php echo $_SESSION['nombres'] ?> |</a></li>
      <li><a class="href" href="<?php if($ubi == "index" || $ubi == "foro") echo "php/cerrar.php"; else echo "../php/cerrar.php"; ?>"> Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>