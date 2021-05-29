<?php
   session_start();
   $id = $_GET["id"];
   if(isset($_SESSION['authentifie'])){
       include "..//..//bd_connexion//infos_connexion.php";
       include "..//..//bd_connexion//pdo_connect.php";
       try {$pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);} 
       catch (Exception $e) {exit($e);}
   
       $stmtDeleteSuggestion = $pdo->prepare("DELETE FROM [dbo].[Produits] WHERE id = ?");
       $stmtDeleteSuggestion->execute([$id]);
   }
   ?>
<script>
   window.location.href = document.referrer;
</script>