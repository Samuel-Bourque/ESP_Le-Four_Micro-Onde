<?php
session_start();
include "..//bd_connexion//infos_connexion.php";
include "..//bd_connexion//pdo_connect.php";


try {$pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);} 
catch (Exception $e) {exit($e);}
  
$stmt = $pdo->prepare("SELECT COUNT(*) FROM [dbo].[EnAttente]");
$stmt->execute();
$count = $stmt->fetchColumn();

$color = "badge-warning";
if($count == 0)
    $color = "badge-success";
if($count >= 30)
    $color = "badge-danger";
?>