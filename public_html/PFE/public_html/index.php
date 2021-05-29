<?php
session_start();
if(!isset($_SESSION["language"])){
  $_SESSION["language"]= "fr";
} 

#includes a PDO setup
include "..//bd_connexion//infos_connexion.php";
include "..//bd_connexion//pdo_connect.php";

include "./locales/index_locales.php";
#Set up PDO for SQL injection protection

try {
  $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
   } catch (Exception $e) {
     exit($e);
   }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hello Video</title>
  <link rel="icon" href="images/favicon.ico" type="images/x-icon"/>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">

</head>
<style>
  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
<body>

<?php include "nav/navbar.php"; ?>

  <!-- Header -->
 <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
        </br>
          <img src="images\helloVideo.jpg" class="center w3-animate-left" width="75%"></img>
          </br>
          <p class="lead mb-5" style="text-align: justify;">
          <?=$motBienvenue[$_SESSION['language']]?>
          </p>
        </div>
      </div>
    </div>
  <!-- Page Content -->
  <div class="container-lg" style="padding-bottom: 25px">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2><?=$soustitre1[$_SESSION['language']]?></h2>
        <hr>
        <p><?=$souspar1[$_SESSION['language']]?></p>
        <a class="btn btn-primary btn-lg" href="tutoriels.php"><?=$boutonTutos[$_SESSION['language']]?> &raquo;</a>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php include "nav/footer.php"; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>
