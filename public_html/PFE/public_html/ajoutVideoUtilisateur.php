<?php 
include "./locales/suggestion_locales.php";
session_start();
if(!isset($_SESSION['authentifie'])){
?>

<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<?php if($_GET['success']){ ?>
<script type="text/javascript">
      $(document).ready(function(){
        $("#myModal2").modal('show');
    });
</script>
<?php }?>

<!DOCTYPE html>
<html>
<head>
  <title><?=$titre[$_SESSION['language']]?></title>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
</head>
<link rel="icon" href="images/favicon.ico" type="images/x-icon"/>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="styles.css" rel="stylesheet"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
#my-div {
  height :92.7vh;
}
</style>
<?php include "nav//navbar.php"; ?>
</br>
<div id="my-div">
  <h1 class="p-5" style="text-align:center;"><?=$titleSuggerer[$_SESSION['language']]?></h1>
  <form class="w-50 p-3 mx-auto" action="scripts/ajoutVideoUser.php" method="post">
    <!-- title input -->
    <div class="form-outline mb-4">
    <label class="form-label" for="title"><?=$label1[$_SESSION['language']]?></label>
    <textarea type="text" id="title" placeholder="<?=$placeholder1[$_SESSION['language']]?>" name="title" class="form-control" required rows="1" maxlength="50"></textarea>
    </div>
    <!-- description input -->
    <div class="form-outline mb-4">
    <label class="form-label" for="form4Example3"><?=$label2[$_SESSION['language']]?></label>
      <textarea class="form-control" id="description" placeholder="<?=$placeholder2[$_SESSION['language']]?>" name="description" rows="4" required maxlength="255"></textarea>
    </div>
    <!-- url input -->
    <div class="form-outline mb-4">
    <label class="form-label" for="form4Example2"><?=$label3[$_SESSION['language']]?></label>
      <input type="text" placeholder="https://www.youtube.com/watch?v=..." id="url" name="url" class="form-control" required />
    </div>
    <div class="form-outline mb-4">
    <label class="form-label" for="form4Example4"><?=$label4[$_SESSION['language']]?></label>
      <input type="email" class="form-control" id="email" placeholder="<?=$placeholder3[$_SESSION['language']]?>" name="email" required></input>
    </div>

    <!-- Submit button -->
    <button id="submit" type="submit" class="btn btn-primary btn-block mb-4"><?=$buttonSubmit[$_SESSION['language']]?></button>
  </form>
  
  <div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?=$titleSuccess[$_SESSION['language']]?> ✅</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p><?=$soustitreSuccess[$_SESSION['language']]?></p>
            </div>
            <div class="modal-footer d-flex">
                    <button class="btn btn-primary mr-auto" class="close" data-dismiss="modal"><?=$btnAutreAjout[$_SESSION['language']]?></button>
                    
                    <button class="btn btn-primary" onclick="window.location.href='./videos.php?page=1'"><?=$modalBtn2[$_SESSION['language']]?></button>
                    
                    <button class="btn btn-primary" onclick="window.location.href='./tutoriels.php?page=1'"><?=$modalBtn3[$_SESSION['language']]?></button>
            </div>
        </div>
    </div>
</div>
<?php include "nav/footer.php"; ?>
<?php 
}
else{
  header("Location: ./gestion.php");
}
?>