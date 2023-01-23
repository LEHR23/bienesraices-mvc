<?php

function conectarDB() {
  $conexion = new mysqli(
    '192.168.0.199',
    'root',
    '',
    'bienesraices_crud',
    '3306'
  );

  if (!$conexion) {
    echo 'Error de conexión a la base de datos';
    exit;
  } 
  return $conexion;
}
