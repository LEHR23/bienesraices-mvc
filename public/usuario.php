<?php
require '../includes/config/database.php';
$db = conectarDB();

$email = "admin@bienesraices.com";
$password = "admin";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO usuario (email, password) VALUES ('${email}', '${passwordHash}');";

mysqli_query($db, $query);
