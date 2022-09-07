<?php
  if(!isset($_SESSION)) {
    session_start();
  }
  $auth = $_SESSION['login'] ?? null;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Bienes Raíces</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="/bienesraices/build/css/app.css"
    />
  </head>
  <body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
      <div class="contenedor contenido-header">
        <div class="barra">
          <a href="/bienesraices">
            <img src="/bienesraices/build/img/logo.svg" alt="logo bienes raices" />
          </a>
          <div class="mobile-menu">
            <img src="/bienesraices/build/img/barras.svg" alt="icono menu responsive" />
          </div>
          <div class="derecha">
            <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg">
            <nav class="navegacion">
              <a href="/bienesraices/nosotros.php">Nosotros</a>
              <a href="/bienesraices/anuncios.php">Anuncios</a>
              <a href="/bienesraices/blog.php">Blog</a>
              <a href="/bienesraices/contacto.php">Contacto</a>
              <?php if($auth): ?>
                <a href="/bienesraices/cerrar-sesion.php">Cerrar Sesión</a>
              <?php endif; ?>
            </nav>
          </div>
        </div><!--.barra-->
        <?php echo $inicio ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : '' ?>
      </div>
    </header>