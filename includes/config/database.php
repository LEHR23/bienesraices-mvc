<?php

function conectarDB() {
  $conexion = new mysqli(
    'localhost',
    'root',
    '',
    'bienesraices_crud',
    '3307'
  );

  if (!$conexion) {
    echo 'Error de conexión a la base de datos';
    exit;
  } 
  return $conexion;
}
