<?php
session_start();
include "..//..//bd_connexion//infos_connexion.php";
include "..//..//bd_connexion//pdo_connect.php";
 
if(isset($_SESSION['authentifie'])){
  $id=$_GET["id"];
  $quantite = $_POST['quantite']; 
  $prix = $_POST['prix'];
  echo $quantite;

  if(empty($_POST['quantite']) || empty($_POST['prix'])){
    ?>
    <script type="text/javascript">
    alert("Certain champs sont vides.");
    window.location.href = "../menuLogIn.php";
    </script>
    <?php
    } else {
        try {
          $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
             } catch (Exception $e) {
               exit($e);
             }
             $stmt = $pdo->prepare("UPDATE [dbo].[Produits] SET quantite = ?, prix = ? WHERE id = ?");
             $result = $stmt->execute([$quantite, $prix, $id]);
             if(count($result)>0){ ?>
                <script type="text/javascript">
                alert("Le produit a bien été modifié.");
                window.location.href = "../menuLogIn.php";
                </script> <?php     
            }
    }
}
?>