<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">
      <img src="img/pedidos-unlam.png" alt="" width="95"  class="img-responsive">
      Pedidos UNLaM
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a href="comercio.php" class="nav-link"><span class="oi oi-person" style="margin-right:12px"></span>Mi Perfil</a>
      </li>
      <li class="nav-item ">
        <a href="cargarMenu.php" class="nav-link"><span class="oi oi-medical-cross" style="margin-right:12px"></span>Cargar Menús</a>
      </li>
      <li class="nav-item ">
        <a href="pedidosComercio.php" class="nav-link"><span class="oi oi-box"  style="margin-right:12px"></span>Pedidos</a>
      </li>
      <li class="nav-item ">
        <a href="actividad.php" class="nav-link"><span class="oi oi-aperture" style="margin-right:12px"></span>Actividad</a>
      </li>
      <li class="nav-item ">
        <a href="<?php echo $MODIFICAR_COLOR_HOST; ?>" class="nav-link"><span class="oi oi-brush" style="margin-right:12px"></span>Modificar Color</a>
      </li>
      <li class="nav-item ">
        <a href="<?php echo $MODIFICAR_TIPOGRAFIA_HOST; ?>" class="nav-link"><span class="oi oi-header" style="margin-right:12px"></span>Modificar Tipografía</a>
      </li>
      <li class="nav-item ">
        <a href="<?php echo $SESION_OUT_HOST ?>" class="nav-link" ><span class="oi oi-account-logout" style="margin-right:12px"></span>Cerrar Sesión</a>
      </li>
    </ul>
  </div>
</nav>