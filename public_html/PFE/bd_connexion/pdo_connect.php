<?php
$dsn = "sqlsrv:Server=206.167.23.188;Database=ESP_sambour";
$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, 
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
];
?>
