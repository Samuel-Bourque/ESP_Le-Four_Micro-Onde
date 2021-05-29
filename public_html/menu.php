<?php
   session_start();
   include "..//bd_connexion//infos_connexion.php";
   include "..//bd_connexion//pdo_connect.php";
   include "./locales/menu_locales.php";
   
   $id=$_GET["id"];
   
   
   try {
     $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
      } catch (Exception $e) {
        exit($e);
      }
     $id = array();
     $nom = array();
     $prix = array();
     $quantite = array();
     $images = array();
     
     $stmt = $pdo->prepare("SELECT id, nom, prix, quantite, images FROM [dbo].[Produits]");
     $result = $stmt->execute();
     while($row = $stmt->fetch()){
       array_push($id, $row['id']);
        array_push($nom, $row['nom']);
        array_push($prix, $row['prix']);
        array_push($quantite, $row['quantite']);
        array_push($images, $row['images']);
     };
   ?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Samuel Bourque">
      <title>Menu</title>
      <link rel="icon" href="images//favicon.ico" type="image/png">
      </link>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <style>
         <?php include "css//menu.css"; ?>
      </style>
   </head>
   
   <body>
      <?php include "nav//navbar.php"; ?>
      <?php include "nav//header.php"; ?>
      </br>
      <div class="container text-center">
         <h1>Menu</h1>
         <br>
         <div class="row" id="ads">
            <?php
               $nbProduit = 3;
               
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
            <div class="col-md-4">
               <div class="card rounded">
                  <div class="card-image">
                     <span class="card-notify-badge">
                        <h5><?php echo $nom[$i] ?></h5>
                     </span>
                     <span class="card-notify-year">
                        <h5><?php echo $id[$i] ?></h5>
                     </span>
                     <img class="img-fluid" src="images//<?php echo $images[$i] ?>.jpg" alt="Image_Hamburger" />
                  </div>
                  <div class="card-image-overlay m-auto">
                     <span class="card-detail-badge">
                        <h5><?=$Prix[$_SESSION['language']]?> : <?php echo $prix[$i] ?>$</h5>
                     </span>
                     <span class="card-detail-badge">
                        <h5><?=$Quantite[$_SESSION['language']]?> : <?php echo $quantite[$i] ?></h5>
                     </span>
                  </div>
                  </br>
               </div>
            </div>
            <?php
               };
               ?>
            <div class="container">
               <div class="justify-content-center">
                  </br>
                  <button id="btnDetail1" type="button" class="btn btn-warning"><?=$BtnDetail[$_SESSION['language']]?></button>
               </div>
               <div class="text-center">
                  </br>
                  <div>
                     <table class="table" style="display: none">
                  </div>
                  <thead>
                  <tr>
                  <th scope="col"><?=$Produit[$_SESSION['language']]?></th>
                  <th scope="col"><?=$Proteine[$_SESSION['language']]?> (g)</th>
                  <th scope="col">Calories (cal)</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <td>Hamburger</td>
                  <td>100</td>
                  <td>500</td>
                  </tr>
                  <tr>
                  <td>Poutine</td>
                  <td>50</td>
                  <td>250</td>
                  </tr>
                  <tr>
                  <td><?=$Breuvage[$_SESSION['language']]?></td>
                  <td>2</td>
                  <td>100</td>
                  </tr>
                  </tbody>
                  </table>
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
                     if($_GET["page"] > 1) echo "<li class=\"page-item\"><a class=\"page-link\" href='./menu.php?page=$previous'><<</a></li>";
                     
                     for($i = 1; $i <= ceil(count($nom)/$nbProduit); $i++){   
                       $active = "";
                       if(($_GET["page"] == $i)) $active = "active";
                       echo "<li class=\"page-item $active\"><a class=\"page-link\" href='./menu.php?page=$i'>$i</a></li>";
                     } 
                     
                     if($_GET["page"] == ceil(count($nom)/$nbProduit) -1 ) echo "<li class=\"page-item\"><a class=\"page-link\" href='./menu.php?page=$next'>>></a></li>";
                     ?>
               </ul>
               </br>
            </div>
         </div>
      </div>
      <?php include "nav//footer.php"; ?>
      <?php include "./jquery/menu_jquery.php"; ?>
   </body>
</html>