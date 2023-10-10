<?php

function conectarDB() {
  $conexion = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_DATABASE'],
    $_ENV['DB_PORT']
  );

  if (!$conexion) {
    echo 'Error de conexión a la base de datos';
    exit;
  } 
  return $conexion;
}
