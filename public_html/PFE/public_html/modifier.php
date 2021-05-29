<?php 
session_start();

include "./locales/modifier_locales.php";
include "..//bd_connexion//infos_connexion.php";
include "..//bd_connexion//pdo_connect.php";

if(!isset($_SESSION['authentifie'])){
  header('Location: connexion.php');
}
if(time()-$_SESSION['timeOut'] > 1000) 
{ 
  session_unset(); 
  session_destroy(); 
?>
  <script type="text/javascript">
  alert("Veillez vous reconnecter");
  window.location.href = "connexion.php";
  </script>
  <?php
} 
$id=$_GET["id"];
$codeURL=$_GET["code"];
$estTuto = $_POST['estTutoOuVideo'];

$code = "";
$titre = "";
$description = "";
$estTuto = 0;
$estAnglais= false; 

try {
  $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
   } catch (Exception $e) {
     exit($e);
   }
   $stmt = $pdo->prepare("SELECT * FROM [dbo].[Videos] WHERE code = ?");
   $result = $stmt->execute([$codeURL]);
   if(count($result)>0){
    $stmt = $pdo->prepare("SELECT code, titre, description FROM [dbo].[Videos] WHERE code = ?");
    $stmt->execute([$codeURL]);
    while($row = $stmt->fetch()){
      $code = $row['code'];
      $titre = $row['titre'];
      $description = $row['description'];
   }
  } 
  $stmt2 = $pdo->prepare("SELECT * FROM [dbo].[Tutoriels] WHERE code = ?");
  $result = $stmt2->execute([$codeURL]);
  if(count($result)>0){
    $stmt2 = $pdo->prepare("SELECT code, titre, description, estAnglais FROM [dbo].[Tutoriels] WHERE code = ?");
    $stmt2->execute([$codeURL]);
    while($row = $stmt2->fetch()){
      $code = $row['code'];
      $titre = $row['titre'];
      $description = $row['description'];
      $estAnglais=  $row['estAnglais'];
      $estTuto = 1;
   }
  } 
?>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<!DOCTYPE html>
<html>
<head>
  <title>Modifier la vidéo</title>
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
<?php include "nav/navbar.php"; ?>
</br>
<div id="my-div">
  <h1 class="p-5" style="text-align:center;"><?=$title[$_SESSION['language']]?></h1>
  <div class="container">
    <div class="column justify-content-center text-center">

      <div class="p-2">
        <b><?=$titreTitle[$_SESSION['language']]?></b> <span><?=$titre?></span>
      </div>
      
      <div class="p-2 text-break overflow-auto" style="word-break: break-word;">
        <b><?=$descriptionTitle[$_SESSION['language']]?></b> <p><?=$description?></p>
      </div>

      <div class="p-2">
        <b><?=$urlTitle[$_SESSION['language']]?></b> <span>https://www.youtube.com/watch?v=<?=$code?></span>
      </div>
      
    </div>
  </div>  
  <form class="w-50 p-3 mx-auto" action="scripts/modifierVideo.php?codeInitial=<?=$code?>&estTutoInitial=<?=$estTuto?>" method="post">
    <!-- title input -->
    <div class="form-outline mb-4">
    <label class="form-label" for="title"><?=$formTitle[$_SESSION['language']]?></label>
    <textarea placeholder="<?=$formTitlePH[$_SESSION['language']]?>" type="text" id="title" name="title" class="form-control" required rows="1" maxlength="50"><?php echo $titre;?></textarea>
    </div>

    <!-- description input -->
    <div class="form-outline mb-4">
    <label class="form-label" for="description"><?=$formDescription[$_SESSION['language']]?></label>
      <textarea class="form-control" placeholder="<?=$formDescriptionPH[$_SESSION['language']]?>" id="description" name="description" rows="4" required maxlength="255"><?php echo $description;?></textarea>
    </div>
    
    <!-- url input -->
    <div class="form-outline mb-4">
    <label class="form-label" for="url"><?=$formURL[$_SESSION['language']]?></label>
      <input type="text" placeholder="https://www.youtube.com/watch?v=..." id="url" name="url" class="form-control" value="<?php echo "https://www.youtube.com/watch?v="; echo $code;?>" required />
    </div>
    <!-- radio button estTuto-->
    <div class="form-check">
      <input class="form-check-input" type="radio" name="estTutoOuPerso" id="estPerso" value="0" <?php if(!$estTuto){echo checked;}?>>
      <label class="form-check-label" for="estPerso">
      <?=$rbPerso[$_SESSION['language']]?>
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="estTutoOuPerso" id="estTuto" value="1" <?php if($estTuto){echo checked;}?>>
      <label class="form-check-label" for="estTuto">
      <?=$rbTuto[$_SESSION['language']]?>
      </label>
    </div>
    </br>
    <!-- radio button estAnglais-->
    <div class="form-check">
      <input class="form-check-input" type="radio" name="estFrOuEn" id="estFrancais" value="0"<?php if(!$estAnglais){echo checked;}?>>
      <label class="form-check-label" for="estFrancais">
      <?=$rbFrancais[$_SESSION['language']]?>
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="estFrOuEn" id="estAnglais" value="1" <?php if($estAnglais){echo checked;}?>>
      <label class="form-check-label" for="estAnglais">
      <?=$rbAnglais[$_SESSION['language']]?>
      </label>
    </div>
  </br>
    <!-- Submit button -->
    <button id="submit" type="submit" class="btn btn-primary btn-block mb-4"><?=$appliquer[$_SESSION['language']]?></button>
  </form>
  <div class="text-center">
    <button class="btn btn-danger" onclick=" 
    if(confirm('<?=$confirmation[$_SESSION['language']]?>'))
    {
    window.location.href='scripts/delete.php?id=<?=$id?>&estTuto=<?=$estTuto?>';
    }"
    
    ><?=$supprimer[$_SESSION['language']]?>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
      </svg>
    </button>
  </div>
  </br>
  <div class="text-center" style="padding-bottom: 75px">
  <a class="btn btn-warning btn-lg" style="text-align:center;" href="index.php"><?=$annuler[$_SESSION['language']]?></a>
  </div>
</div>
<script>
if(document.getElementById("estTuto").checked) {
  document.getElementsByName("estFrOuEn")[0].disabled = false;
  document.getElementsByName("estFrOuEn")[1].disabled = false;
} else {
  document.getElementsByName("estFrOuEn")[0].disabled = true;
  document.getElementsByName("estFrOuEn")[1].disabled = true;
}
  document.getElementById("estTuto").addEventListener("click",()=>{
    document.getElementsByName("estFrOuEn")[0].disabled = false;
    document.getElementsByName("estFrOuEn")[1].disabled = false;
  })
  document.getElementById("estPerso").addEventListener("click",()=>{
    document.getElementsByName("estFrOuEn")[0].disabled = true;
    document.getElementsByName("estFrOuEn")[1].disabled = true;
  })
</script>
<?php include "nav/footer.php"; ?>

