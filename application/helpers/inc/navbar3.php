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
        <a href="delivery.php" class="nav-link"><span class="oi oi-person" style="margin-right:12px"></span>Mi Perfil</a>
      </li>
      <li class="nav-item ">
        <a href="pedidosDisponibles.php" class="nav-link"><span class="oi oi-map-marker" style="margin-right:12px"></span>Pedidos Disponibles</a>
      </li>
      <li class="nav-item ">
        <a href="pedidosRealizados.php" class="nav-link"><span class="oi oi-box"  style="margin-right:12px"></span>Pedidos Realizados</a>
      </li>
      <li class="nav-item ">
        <a href="<?php echo $SESION_OUT_HOST ?>" class="nav-link" ><span class="oi oi-account-logout" style="margin-right:12px"></span>Cerrar Sesión</a>
      </li>
    </ul>
  </div>
</nav>