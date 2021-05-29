<?php
   session_start();
   include "..//..//bd_connexion//infos_connexion.php";
   include "..//..//bd_connexion//pdo_connect.php";
   include "..//locales/creationProduit_locales.php";
   
   try {
     $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
    } catch (Exception $e) {
      exit($e);
    }
   $nom = $_POST['nom'];
   $prix = $_POST['prix'];
   $images = $_POST['images'];
   $quantite = $_POST['quantite'];
       ?>
       
<?php
   $stmt = $pdo->prepare("INSERT INTO [dbo].[Produits] (nom,prix,images,quantite) VALUES (?,?,?,?)");
   $stmt->execute([$nom,$prix,$images,$quantite]);
   ?>

<script type="text/javascript">
   window.location.href = "../menu.php";
   alert("<?=$Script[$_SESSION['language']]?>");
</script>