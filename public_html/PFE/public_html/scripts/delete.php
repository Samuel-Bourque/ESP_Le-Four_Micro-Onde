<?php
 include "..//..//bd_connexion//infos_connexion.php";
 include "..//..//bd_connexion//pdo_connect.php";
 session_start();
if(isset($_SESSION['authentifie'])){
  $id=$_GET["id"];
  $estTuto = $_GET['estTuto'];  
  try {
    $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
  } catch(Exception $e){
    exit($e);
  }
  if($estTuto){
    $stmt = $pdo->prepare("DELETE FROM [dbo].[Tutoriels] WHERE id = ?");
    $result = $stmt->execute([$id]);
    if($result){
      header("Location:../tutoriels.php");
    }
  }
  else{
    $stmt = $pdo->prepare("DELETE FROM [dbo].[Videos] WHERE id = ?");
    $result = $stmt->execute([$id]);
    if($result){
      header("Location:../videos.php");
    }
  }
}
?>
