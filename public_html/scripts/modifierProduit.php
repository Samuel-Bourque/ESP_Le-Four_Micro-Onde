<?php
   session_start();
   include "..//..//bd_connexion//infos_connexion.php";
   include "..//..//bd_connexion//pdo_connect.php";
   include "..//locales/modifier_locales.php";
    
   if(isset($_SESSION['authentifie'])){
     $id=$_GET["id"];
     $quantite = $_POST['quantite']; 
     $prix = $_POST['prix'];
       ?>
       
<?php
   try {
     $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
        } catch (Exception $e) {
          exit($e);
        }
        $stmt = $pdo->prepare("UPDATE [dbo].[Produits] SET quantite = ?, prix = ? WHERE id = ?");
        $result = $stmt->execute([$quantite, $prix, $id]);
        if(count($result)>0){ ?>
<script type="text/javascript">
   alert("<?=$Script[$_SESSION['language']]?>");
   window.location.href = "../menuLogIn.php";
</script> <?php     
   }
}
?>