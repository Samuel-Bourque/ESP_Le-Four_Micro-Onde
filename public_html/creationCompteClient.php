<?php
   session_start();
   include "./locales/creationCompteClient_locales.php";
   ?>
   
<script
   src="https://code.jquery.com/jquery-3.5.1.js"
   integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
   crossorigin="anonymous"></script>
<?php if($_GET['success']){ ?>
<script type="text/javascript">
   $().ready(function(){
     $("#myModal2").modal('show');
   });
</script>
<?php }?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Samuel Bourque">
      <title><?=$MainText[$_SESSION['language']]?></title>
      <link rel="icon" href="images//favicon.ico" type="image/png">
      </link>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <style>
         <?php include "css//client.css"; ?>
      </style>
   </head>
   
   <body>
      <?php include "nav//navbar.php"; ?>
      <?php include "nav//header.php"; ?>
      <div class="signup-form">
         <form action="scripts/creationClient.php" method="post">
            <h2><?=$MainText[$_SESSION['language']]?></h2>
            <p class="hint-text"><?=$Text1[$_SESSION['language']]?></p>
            <div class="form-group">
               <div class="row">
                  <div class="col">
                     <label for="prenom" class="form-label"><?=$Prenom[$_SESSION['language']]?></label><br>
                     <input type="prenom" name="prenom" id="prenom" class="form-control" placeholder="<?=$Prenom[$_SESSION['language']]?>" required>
                  </div>
                  <div class="col">
                     <label for="nom" class="form-label"><?=$Nom[$_SESSION['language']]?></label><br>
                     <input type="nom" name="nom" id="nom" class="form-control" placeholder="<?=$Nom[$_SESSION['language']]?>" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="email" class="form-label"><?=$Email[$_SESSION['language']]?></label><br>
                  <input type="email" name="courriel" id="courriel" class="form-control" placeholder="<?=$EmailPlaceHolder[$_SESSION['language']]?>" required>
               </div>
            </div>
            <div class="form-group">
               <label><?=$MotDePasse[$_SESSION['language']]?></label>
               <input type="password" class="form-control" name="password" placeholder="<?=$MotDePasse[$_SESSION['language']]?>" required>
            </div>
            <div class="form-group">
               <input type="submit" name="submit" class="btn btn-warning btn-block mb-4" value="<?=$Button[$_SESSION['language']]?>">
            </div>
         </form>
         <div class="text-center"><?=$Text2[$_SESSION['language']]?> <a href="./logClient.php"><?=$Text3[$_SESSION['language']]?></a></div>
         </br>
         <p class="text-center"><?=$Text4[$_SESSION['language']]?></a></p>
      </div>
      <?php include "nav//footer.php"; ?>
   </body>
</html>