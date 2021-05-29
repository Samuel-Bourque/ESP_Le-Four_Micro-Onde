<?php
session_start();
#includes a PDO setup
include "..//..//bd_connexion//infos_connexion.php";
include "..//..//bd_connexion//pdo_connect.php";

#Set up PDO for SQL injection protection

try {
  $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
 } catch (Exception $e) {
   exit($e);
 }

 #catches user/password submitted by html form
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$images = $_POST['images'];
$quantite = $_POST['quantite'];

#checks if the html form is filled
if(empty($_POST['nom']) || empty($_POST['prix']) || empty($_POST['images']) || empty($_POST['quantite']) ){
    ?>
    <script type="text/javascript">
        alert("Remplis tout svp");
        window.location.href = "../menuLogIn.php";
    </script>
              <?php
            } else {
                $stmt = $pdo->prepare("INSERT INTO [dbo].[Produits] (nom,prix,images,quantite) VALUES (?,?,?,?)");
                $stmt->execute([$nom,$prix,$images,$quantite]);
?>
                <script type="text/javascript">
                window.location.href = "../menu.php";
                alert("GG EZ PZ");
                </script>
                <?php            
            }

    ?>


