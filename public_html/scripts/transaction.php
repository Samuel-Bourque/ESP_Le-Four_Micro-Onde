<?php
   session_start();
   include "../..///bd_connexion//infos_connexion.php";
   include "../..//bd_connexion//pdo_connect.php";
   include "..//locales/transaction_locales.php";
   
   $id = $_GET["id"];
   $courriel = $_SESSION['courriel'];
   $prix = "";
   $quantiteProduit = "";
   $argentClient = "";
   $quantite = array();
   $prixDepart = array();
   $prixProduit = array();
   
   
   try {
     $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
   } catch (Exception $e) {
     exit($e);
   }
   
     $stmt = $pdo->prepare("SELECT quantite, prix FROM [dbo].[Produits] WHERE id = ?");
     $result = $stmt->execute([$id]);  
   
     while($row = $stmt->fetch()){
       array_push($prixProduit, $row['prix']);
       array_push($quantite, $row['quantite']);
     };
   
     $prix = $prixProduit[0];
     $quantite = $quantite[0];
   
     $stmt = $pdo->prepare("SELECT prixDepart FROM [dbo].[Clients] WHERE courriel = ?");
     $result = $stmt->execute([$courriel]);
   
     while($row = $stmt->fetch()){
       array_push($prixDepart, $row['prixDepart']);
     };
      
      $quantiteInventaire = $quantite - 1;
      $argentClient = $prixDepart[0];
      $fondClient = $argentClient - $prix;
   
      if(($quantite) < 1) { 
       ?>
<script type="text/javascript">
   alert("<?= $Script2[$_SESSION["language"]]?>")
   window.location.href = "../achatProduit.php";
</script>

<?php
   } else if(($fondClient) < 0) { 
    ?>
<script type="text/javascript">
   alert("<?= $Script1[$_SESSION["language"]]?>")
   window.location.href = "../achatProduit.php";
</script> 

<?php 
   } else {
     $stmt = $pdo->prepare("UPDATE [dbo].[Produits] SET quantite = ? WHERE id = ?");
     $result = $stmt->execute([$quantiteInventaire, $id]);
   
     if($result){ ?>
<script type="text/javascript">
   window.location.href = "../achatProduit.php";
</script> 
<?php     
   }
   $stmt = $pdo->prepare("UPDATE [dbo].[Clients] SET prixDepart = ? WHERE courriel = ?");
   $result = $stmt->execute([$fondClient, $courriel]);
     ?>
<?php        
   } 
   ?>