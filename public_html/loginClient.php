<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Samuel Bourque">
  <title>Client</title>
  <link rel="icon" href="images//favicon.ico" type="image/png"></link>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->

<?php include "nav//navbar.php"; ?>
<?php include "nav//header.php"; ?>
<style>
<?php include "css//client.css"; ?>
</style>

</head>
<body>
<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<h2>Création</h2>
		<p class="hint-text">Création du compte client</p>
        <div class="form-group">
			<div class="row">
				<div class="col">
        <label>Prénom</label>
        <input type="text" class="form-control" name="prenom" placeholder="Prénom" required="required">
        </div>
				<div class="col">
        <label>Nom</label>
        <input type="text" class="form-control" name="nom" placeholder="Nom" required="required">
        </div>
			</div>        	
        </div>
        <div class="form-group">
        <label>Courriel</label>
        <input type="email" class="form-control" name="email" placeholder="samuel123@hotmail.com" required="required">
        </div>
		<div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required="required">
        </div>       
		<div class="form-group">
            <button type="submit" class="btn btn-warning btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Vous avez déjà un compte client? <a href="./loginGerant.php">Connexion</a></div>
  </br>
  <p class="text-center">Bénificier de 50$ à la création du compte en ligne</a></p>
</div>
</body>
<?php include "nav//footer.php"; ?>