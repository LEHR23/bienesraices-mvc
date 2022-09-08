<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false) {
  include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado() : bool {
  session_start();

  if(!isset($_SESSION['login'])) {
    return false;
  }
  return true;
}

function eliminaHTML($html) : string {
  $nuevaCadena = htmlspecialchars($html);
  return $nuevaCadena;
}

function validarTipoContenido($tipo)  {
  $tipos = ['propiedad', 'vendedor'];
  return in_array($tipo, $tipos);
}

function debuguear($variable) {
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";
  exit;
}

function mostrarNotificacion(int $codigo) : string {
  $mensaje = '';
  switch($codigo) {
    case 1:
      $mensaje = 'Creado Correctamente';
      break;
    case 2:
      $mensaje = 'Actualizado Correctamente';
      break;
    case 3:
      $mensaje = 'Eliminado Correctamente';
      break;
    default:
      $mensaje = false;
      break;
  }
  return $mensaje;
}