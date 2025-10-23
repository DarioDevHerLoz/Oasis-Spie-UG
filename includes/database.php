<?php
$db = mysqli_connect(
  $_ENV['DB_HOST'] ?? '',
  $_ENV['DB_USERNAME'] ?? '',
  $_ENV['DB_PASSWORD'] ?? '',
  $_ENV['DB_DATABASE'] ?? ''
);

$db->set_charset("utf8");

if(!$db){
  echo "Error: No se pudo conectar a MySQL.";
  echo "error de depuracion: " . mysqli_connect_error();
  echo "error de depuracion: " . mysqli_connect_error();
  exit;
}