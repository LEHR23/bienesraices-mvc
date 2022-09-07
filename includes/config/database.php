<?php

function conectarDB() {
  $conexion = new mysqli(
    'localhost',
    'root',
    '',
    'bienesraices_crud'
  );

  if (!$conexion) {
    echo 'Error de conexión a la base de datos';
    exit;
  } 
  return $conexion;
}
