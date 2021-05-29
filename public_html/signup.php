<?php
session_start();
if(!isset($_SESSION["language"])){
    $_SESSION["language"]= "fr";
  }
  include "./langue/signup_langue.php";
?>
<!DOCTYPE html>
<html>
<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="styles.css" rel="stylesheet"></script>  <meta charset="utf-8">
  <title>Connexion client</title>
</head>

<body>
  <?php include "nav/navbar.php"; ?>
  <div class="container" id="my-div">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                <h2><?=$titre[$_SESSION['language']]?></h2> </br>
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="scripts/script_signup.php" method="post">
                            <div class="form-outline mb-4">
                                <label for="email" class="form-label"><?=$email[$_SESSION['language']]?></label><br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="<?=$email[$_SESSION['language']]?>">
                            </div>
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label"><?=$mdp[$_SESSION['language']]?></label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="<?=$mdp[$_SESSION['language']]?>">
                            </div>
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label"><?=$mdp2[$_SESSION['language']]?></label><br>
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="<?=$mdp2[$_SESSION['language']]?>">
                            </div>
                            <div class="form-outline mb-4">
                                <label for="Argent" class="form-label"><?=$argent[$_SESSION['language']]?></label><br>
                                <input type="number" name="argent" id="argent" class="form-control" placeholder="0">
                            </div>
                            <div class="form-outline mb-4">
                              <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="<?=$next[$_SESSION['language']]?>">
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php include "nav//footer.php"; ?>

  </body>