<?php
session_start();
#includes a PDO setup
include "..//bd_connexion//infos_connexion.php";
include "..//bd_connexion//pdo_connect.php";
include "./locales/tutoriels_locales.php";
#Set up PDO for SQL injection protection

try {
$pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
 } catch (Exception $e) {
   exit($e);
 }
$boolLangue = false;
$id = array();
$code = array();
$titre = array();
$description = array();
$estAnglais = array();

$stmt = $pdo->prepare("SELECT id, code, titre, description, estAnglais FROM [dbo].[Tutoriels] WHERE estAnglais = ? ORDER BY id DESC");
$estAnglais = $_SESSION["language"] =="en" ? 1:0;
$result = $stmt->execute([$estAnglais]);
while($row = $stmt->fetch()){
   array_push($id, $row['id']);
   array_push($code, $row['code']);
   array_push($titre, $row['titre']);
   array_push($description, $row['description']);
   array_push($estAnglais, $row['estAnglais']);
};
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tutoriels</title>
  <link rel="icon" href="images/favicon.ico" type="images/x-icon"/>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">

</head>
<body>

<?php include "nav/navbar.php"; ?>

  <!-- Header -->
 <div class="container-lg">
  <!-- Page Content -->

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2><?=$title[$_SESSION['language']]?></h2>
        <hr>
        <p><?=$para1[$_SESSION['language']]?></p>
        <a class="btn btn-primary btn-lg" href="videos.php"><?=$buttonRedir[$_SESSION['language']]?> &raquo;</a>
      </div>
      <div class="col-md-4 mb-5">
        <h2><?=$soustitre1[$_SESSION['language']]?></h2>
        <hr>
        <div>
          <h4><?=$para2[$_SESSION['language']]?></h4>
        <ul>
        <li> <a href="https://www.audiolibrary.com.co"><u>www.audiolibrary.com.co</u></a></li>
        <li> <a href="https://www.bensound.com"><u>www.bensound.com</u></a></li>
        <li> <a href="https://www.musicscreen.be/"><u>www.musicscreen.be</u></a></li>
        <li> <a href="http://dig.ccmixter.org/"><u>dig.ccmixter.org</u></a></li>
        <li> <a href="https://www.epidemicsound.com/"><u>www.epidemicsound.com</u></a></li>
        </ul>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <div>

   <iframe src="carousel.php" width="100%" height="600px" frameBorder="0"></iframe>
   </br>

   <h2><?= $title2[$_SESSION['language']]?></h2>
   <hr>  
    </div>
    <div class="row">
  
    <?php
    $nbVideo = 6;
    
    if(isset($_GET["page"])){
      $page = ($_GET["page"] - 1) * $nbVideo;
    }else{
      $page = 0;
    }

    for($i = 0 + $page; $i < $page + $nbVideo ; $i++){
      if($code[$i] == null){
        break;
      }
    ?>
      <div class="col-md-4 mb-5">
 
        <div class="card h-100">
          <iframe width="350" height="235"
              src="https://www.youtube.com/embed/<?php echo $code[$i] ?>" allowfullscreen>
          </iframe>          
          <div class="card-body">
            <h4 class="card-title"><?php echo $titre[$i] ?></h4>
            <p class="card-text"><?php echo $description[$i] ?></p>
            <?php if(isset($_SESSION['authentifie'])){?>
            <a href="modifier.php?id=<?=$id[$i]?>&code=<?=$code[$i]?>" class="btn btn-primary"> <?=$btnModif[$_SESSION['language']]?>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
              </svg>
            </a>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php
      };
    ?>
    </div>
    </div>
  <div class="container">

      <ul class="pagination justify-content-center" style="padding-bottom: 25px">
      <?php 
      $previous = $_GET["page"] - 1;
      if($_GET["page"] - 1 < 1) 
        $previous = 1;

      $next = $_GET["page"] + 1;
      if($_GET["page"] + 1 >= ceil(count($id)/$nbVideo)) 
        $next = ceil(count($id)/$nbVideo);
      if($_GET["page"] > 1) 
        echo "<li class=\"page-item\"><a class=\"page-link\" href='./tutoriels.php?page=$previous'><<</a></li>";

      for($i = 1; $i <= ceil(count($id)/$nbVideo); $i++){   
        $active = "";
        if(($_GET["page"] == $i)) 
          $active = "active";
        echo "<li class=\"page-item $active\"><a class=\"page-link\" href='./tutoriels.php?page=$i'>$i</a></li>";
      } 

      if($_GET["page"] == ceil(count($id)/$nbVideo) -1 ) 
        echo "<li class=\"page-item\"><a class=\"page-link\" href='./tutoriels.php?page=$next'>>></a></li>";
      ?>
      </ul>
      </br>
      </div>
    </div>

  <?php include "nav/footer.php"; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
