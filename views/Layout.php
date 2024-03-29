<?php

  if(!isset($_SESSION)) {
    session_start();
  }
  $auth = $_SESSION['login'] ?? null;

  if(!isset($inicio)){
    $inicio = false;
  }

  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Bienes Raíces</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" media="screen" href="../build/css/app.css" />
  <link rel="icon" href="../favicon.ico">
</head>

<body>
  <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="/">
          <img src="../build/img/logo.svg" alt="logo bienes raices" />
        </a>
        <div class="mobile-menu">
          <img src="../build/img/barras.svg" alt="icono menu responsive" />
        </div>
        <div class="derecha">
          <img class="dark-mode-boton" src="/../build/img/dark-mode.svg">
          <nav class="navegacion">
            <a href="/nosotros">Nosotros</a>
            <a href="/anuncios">Anuncios</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
            <?php if($auth): ?>
            <a href="/logout">Cerrar Sesión</a>
            <?php endif; ?>
          </nav>
        </div>
      </div>
      <!--.barra-->
      <?php echo $inicio ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : '' ?>
    </div>
  </header>

  <?php echo $contenido; ?>

  <footer class="footer seccion">
    <div class="contenedor contenedor-footer">
      <nav class="navegacion">
        <a href="/nosotros">Nosotros</a>
        <a href="/anuncios">Anuncios</a>
        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>
      </nav>
    </div>
    <p class="copyright">Todos los derechos reservados <?php echo date('Y');?> &copy;</p>
  </footer>
  <script src="../build/js/bundle.min.js"></script>
</body>

</html>