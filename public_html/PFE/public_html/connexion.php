<?php
include "./locales/connexion_locales.php";
session_start();
if(!isset($_SESSION["language"])){
    $_SESSION["language"]= "fr";
  }
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="styles.css" rel="stylesheet"></script>

<head>
  <title>Connexion</title>
  <meta charset="UTF-8"/>
</head>
<link rel="icon" href="images/favicon.ico" type="images/x-icon"/>
<style>
#my-div {
  height :78.9%;
}
</style>
<body>

<?php include "nav/navbar.php"; ?>
    <div id="login">
    </br>
    <h1 class="p-5" style="text-align:center;"><?= $labelConnexion[$_SESSION["language"]]?></h1>
        <div class="container" id="my-div">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="scripts/connexion.php" method="post">
                            <div class="form-outline mb-4">
                                <label for="email" class="form-label"><?= $labelEmail[$_SESSION["language"]]?></label><br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email@exemple.com">
                            </div>
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label"><?= $labelPassword[$_SESSION["language"]]?></label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-outline mb-4">
                              <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value=<?=$submit[$_SESSION["language"]]?>>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include "nav/footer.php"; ?>
