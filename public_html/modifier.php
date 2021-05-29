<?php 
   session_start();
   include "..//bd_connexion//infos_connexion.php";
   include "..//bd_connexion//pdo_connect.php";
   include "./locales/modifier_locales.php";
   
   $id=$_GET["id"];
   
   $nom = "";
   $quantite = "";
   $prix = "";
   ?>

<script
   src="https://code.jquery.com/jquery-3.5.1.js"
   integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
   crossorigin="anonymous"></script>
<?php if($_GET['success']){ ?>
<script type="text/javascript">
   $(document).ready(function(){
     $("#myModal").modal('show');
   });
</script>

<?php }
   try {
     $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
      } catch (Exception $e) {
        exit($e);
      }
     $stmt = $pdo->prepare("SELECT * FROM [dbo].[Produits] WHERE id = ?");
     $result = $stmt->execute([$id]);
     if(count($result)>0){
       $stmt = $pdo->prepare("SELECT nom, quantite, prix FROM [dbo].[Produits] WHERE id = ?");
       $result = $stmt->execute([$id]);
       while($row = $stmt->fetch()){
         $nom = $row['nom'];
         $quantite = $row['quantite'];
         $prix = $row['prix'];
      }
     } 
   ?>

<!DOCTYPE html>
<html>
   <head>
      <title><?=$Titre[$_SESSION['language']]?></title>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.ico" type="images/x-icon"/>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <style>
         <?php include "css//login.css"; ?>
      </style>
   </head>

   <body>
      <?php include "nav//navbar.php"; ?>
      <?php include "nav//header.php"; ?>
      </br>

      <div class="login-form">
         <form class="form" action="scripts/modifierProduit.php?id=<?=$id?>" method="post"  id="contact_form">
            <h1 class="text-center">Modification : <?=$nom?></h1>
            <div class="form-group">
               <label>ID : <?=$id?></label>  
            </div>
            <div class="form-group">
               <label><?=$Nom[$_SESSION['language']]?> : <?=$nom?> </label></label> 
            </div>
            <div class="form-group">
               <label><?=$Prix[$_SESSION['language']]?></label>  
               <input  name="prix" id="prix" value=<?=$prix?> class="form-control" min="0" max="1000"  type="number" step="0.01" required>
            </div>
            <div class="form-group">
               <label><?=$Quantite[$_SESSION['language']]?></label>  
               <input  name="quantite" id="quantite" value=<?=$quantite?> class="form-control" min="0" max="1000"  type="number" required>
            </div>
            <div class="text-center">
               <button id="submit" type="submit" class="btn btn-warning btn-lg"><?=$Button1[$_SESSION['language']]?></button>
            </div>
      </div>
      <div class="text-center" style="padding-bottom: 75px">
      <a class="btn btn-warning btn-lg" style="text-align:center;" href="menuLogIn.php"><?=$Button2[$_SESSION['language']]?></a>
      </div>
      </form>
      </div>
      <?php include "nav/footer.php"; ?>
   </body>
</html>