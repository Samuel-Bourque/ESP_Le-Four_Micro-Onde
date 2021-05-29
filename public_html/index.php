<?php
   session_start();
   include "./locales/index_locales.php";
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
      <title><?=$Title[$_SESSION['language']]?></title>
      <link rel="icon" href="images//favicon.ico" type="image/png"></link>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
   </head>

   <body>
      <?php include "nav//navbar.php"; ?>
      <?php include "nav//header.php"; ?>
      <section class="py-5">
         <div class="container my-5">
            <div class="row justify-content-center">
               <div class="col-lg-6">
                  <h2><?=$MainText[$_SESSION['language']]?></h2>
                  <p class="lead"><?=$Text1[$_SESSION['language']]?></p>
                  <p class="mb-0"><?=$Text2[$_SESSION['language']]?></p>
               </div>
            </div>
         </div>
      </section>

      <div class="map-responsive">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2766.455221227071!2d-71.31707625976003!3d46.10183544579223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb830f6c2109851%3A0x56fa4d7af5602766!2sMcDonald&#39;s!5e0!3m2!1sfr!2sca!4v1622051703399!5m2!1sfr!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

      </br>

      <div class="container">
         <div class="row justify-content-center">
            <button id="btnDetail2" type="button" class="btn btn-warning"><?=$BtnDetail[$_SESSION['language']]?></button>
         </div>
         <div class="justify-content-center">
            <div class="row justify-content-center">
               <ul1 style="display: none">
                  </br>
                  <li>176 Boulevard Frontenac O</li>
                  <li>Thetford Mines</li>
                  <li>Quebec</li>
                  <li>G6G 6N7</li>
               </ul1>
            </div>
         </div>
      </div>
      <?php include "nav//footer.php"; ?>
      <?php include "./jquery/menu_jquery.php"; ?>
   </body>
</html>