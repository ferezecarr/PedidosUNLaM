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
        <a href="cliente.php" class="nav-link"><span class="oi oi-person" style="margin-right:12px"></span>Mi Perfil</a>
      </li>
      <li class="nav-item ">
        <a href="misPedidos.php" class="nav-link"><span class="oi oi-box"  style="margin-right:12px"></span>Mis Pedidos</a>
      </li>
      <li class="nav-item ">
        <a href="comercios.php" class="nav-link"><span class="oi oi-cart"  style="margin-right:12px"></span>Comercios</a>
      </li>
      <li class="nav-item ">
        <a href="ofertasDelDia.php" class="nav-link"><span class="oi oi-calendar" style="margin-right:12px"></span>Ofertas del Día</a>
      </li>
      <li class="nav-item ">
        <a href="<?php echo $SESION_OUT_HOST ?>" class="nav-link"><span class="oi oi-account-logout" style="margin-right:12px"></span>Cerrar Sesión</a>
      </li>
    </ul>
  </div>
</nav>