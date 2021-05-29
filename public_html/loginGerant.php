<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Samuel Bourque">
  <title>Gérant</title>
  <link rel="icon" href="images//favicon.ico" type="image/png"></link>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>



<?php include "nav//navbar.php"; ?>
<?php include "nav//header.php"; ?>
<style>
<?php include "css//gerant.css"; ?>
</style>
</br>
<body>
<div class="login-form">
        <form id="login-form" class="form" action="scripts/connexion.php" method="post">
        <h2 class="text-center">Connexion</h2>       
        <div class="form-group">
            <label>Courriel</label>
            <input type="text" class="form-control" placeholder="courriel@exemple.com" required="required">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" placeholder="Mot de passe" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-warning btn-block">Connexion au compte</button>
        </div>       
    </form>
</div>
</body>
<?php include "nav//footer.php"; ?>