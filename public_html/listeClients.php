<?php
   session_start();
   include "..//bd_connexion//infos_connexion.php";
   include "..//bd_connexion//pdo_connect.php";
   include "./locales/listeClient_locales.php";
   
   
   try {
     $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
      } catch (Exception $e) {
        exit($e);
      }
      $id = array();
      $prenom = array();
      $nom = array();
      $courriel = array();
      $prixDepart = array();
      
      $stmt = $pdo->prepare("SELECT id, prenom, nom, courriel, prixDepart  FROM [dbo].[Clients]");
      $result = $stmt->execute();
      while($row = $stmt->fetch()){
        array_push($id, $row['id']);
        array_push($prenom, $row['prenom']);
        array_push($nom, $row['nom']);
        array_push($courriel, $row['courriel']);
        array_push($prixDepart, $row['prixDepart']);
      };
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Samuel Bourque">
      <title><?=$Title[$_SESSION['language']]?></title>
      <link rel="icon" href="images//favicon.ico" type="image/png">
      </link>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
   </head>
   <body>
      <?php include "nav//navbar.php"; ?>
      <?php include "nav//header.php"; ?>
      </br>

      <div class="container py-5">
         <div class="row text-center">
            <div class="col-lg-8 mx-auto">
               <h1 class="display-4"><?=$Title[$_SESSION['language']]?></h1>
            </div>
         </div>
      </div>
      <br>
      
      <div class="container">
         <div class="row text-center">
            <?php
               $nbProduit = 4;
               
               if(isset($_GET["page"])){
                 $page = ($_GET["page"] - 1) * $nbProduit;
               }else{
                 $page = 0;
               }
               
               for($i = 0 + $page; $i < $page + $nbProduit ; $i++){
                 if($nom[$i] == null){
                   break;
                 }
               ?>

            <div class="col-xl-3 col-xl-6 mb-5">
               <div class="bg-warning rounded shadow-sm py-5 px-4">
                  <img src="images//Client.jpg" alt="Image_Client" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                  <h5 class="mb-0"><?php echo $id[$i] ?></h5>
                  <h5 class="mb-0"><?php echo $prenom[$i] ?> <?php echo $nom[$i] ?></h5>
                  <p class="small text-uppercase text-muted"><?php echo $courriel[$i] ?></p>
                  <h5 class="mb-0"><?php echo $prixDepart[$i] ?> $</h5>
                  </br>
                  <a class="btn btn-danger" id="refuse" href="scripts/deleteCompte.php?id=<?=$id[$i]?>"><?=$Button[$_SESSION['language']]?></a>
               </div>
            </div>
            <?php
               };
               ?>
         </div>
      </div>

      </div>
      <div class="container">
         </br>
         <ul class="pagination justify-content-center">
            <?php 
               $previous = $_GET["page"] - 1;
               if($_GET["page"] - 1 < 1) $previous = 1;
               
               $next = $_GET["page"] + 1;
               if($_GET["page"] + 1 >= ceil(count($nom)/$nbProduit)) $next = ceil(count($nom)/$nbProduit);
               if($_GET["page"] > 1) echo "<li class=\"page-item\"><a class=\"page-link\" href='./listeClients.php?page=$previous'><<</a></li>";
               
               for($i = 1; $i <= ceil(count($nom)/$nbProduit); $i++){   
                 $active = "";
                 if(($_GET["page"] == $i)) $active = "active";
                 echo "<li class=\"page-item $active\"><a class=\"page-link\" href='./listeClients.php?page=$i'>$i</a></li>";
               } 
               
               if($_GET["page"] == ceil(count($nom)/$nbProduit) -1 ) echo "<li class=\"page-item\"><a class=\"page-link\" href='./listeClients.php?page=$next'>>></a></li>";
               ?>
         </ul>
         </br>
      </div>
      </div>
      <?php include "nav//footer.php"; ?>
   </body>
</html>