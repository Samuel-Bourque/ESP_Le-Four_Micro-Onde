<?php
   include "./locales/login_locales.php";
   session_start();
   if(!isset($_SESSION["language"])){
       $_SESSION["language"]= "fr";
     }
   ?>
   
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Samuel Bourque">
      <title>Connexion</title>
      <link rel="icon" href="images//favicon.ico" type="image/png">
      </link>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
         <form id="login-form" class="form" action="scripts/connexion.php" method="post">
            <h2 class="text-center">Connexion</h2>
            <div class="form-group">
               <label for="email" class="form-label"><?=$Email[$_SESSION['language']]?></label>
               <input type="email" name="email" id="email" class="form-control" placeholder="<?=$EmailPlaceHolder[$_SESSION['language']]?>" required>
            </div>
            <div class="form-group">
               <label for="password" class="form-label"><?=$MotDePasse[$_SESSION['language']]?></label>
               <input type="password" name="password" id="password" class="form-control" placeholder="<?=$MotDePasse[$_SESSION['language']]?>" required>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-warning btn-block"><?=$Button[$_SESSION['language']]?></button>        
            </div>
         </form>
      </div>

      <?php include "nav//footer.php"; ?>
   </body>
</html>