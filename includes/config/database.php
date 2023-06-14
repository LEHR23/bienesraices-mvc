<?php

function conectarDB() {
  $conexion = new mysqli(
    'localhost',
    'root',
    '',
    'bienesraices',
    '3306'
  );

  if (!$conexion) {
    echo 'Error de conexión a la base de datos';
    exit;
  } 
  return $conexion;
}
