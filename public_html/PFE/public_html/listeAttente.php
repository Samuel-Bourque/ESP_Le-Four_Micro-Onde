<?php
session_start();
#includes a PDO setup
include "..//bd_connexion//infos_connexion.php";
include "..//bd_connexion//pdo_connect.php";
include "./locales/listeAttente_locales.php";

#Set up PDO for SQL injection protection

try {
  $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
   } catch (Exception $e) {
     exit($e);
   }
  $id = array();
  $email = array();
  $code = array();
  $titre = array();
  $description = array();
  
  $stmt = $pdo->prepare("SELECT id, email, code, titre, description FROM [dbo].[enAttente] ORDER BY id DESC");
  $result = $stmt->execute();
  while($row = $stmt->fetch()){
     array_push($id, $row['id']);
     array_push($email, $row['email']);
     array_push($code, $row['code']);
     array_push($titre, $row['titre']);
     array_push($description, $row['description']);
  };
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

<body>

<?php include "nav/navbar.php"; ?>

  <!-- Header -->

  <!-- Page Content -->
  <div class="container-lg">
    <div class="row">
      <div class="col-md-8 mb-5">
      <br>
      <h2><?=$title[$_SESSION['language']]?></h2>
      <p><?=$descriptionTitre[$_SESSION['language']]?></p>
      </div>
    </div>
    <!-- /.row -->

    <hr>
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
            <p class="card-text"><b><?=$sentBy[$_SESSION['language']]?> </b><?php echo $email[$i]?></p>
            <?php if(isset($_SESSION['authentifie'])){?>
            <a class="btn btn-success" id="accept" href="scripts/transfertSuggestion.php?approved=true&id=<?=$id[$i]?>"> <?=$accept[$_SESSION['language']]?>
            <a class="btn btn-danger" id="refuse" href="scripts/transfertSuggestion.php?approved=false&id=<?=$id[$i]?>"> <?=$refuse[$_SESSION['language']]?>
            </a>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php
    };
    ?>
    <div class="container">
      <ul class="pagination justify-content-center" style="padding-bottom: 25px">
      <?php 
      $previous = $_GET["page"] - 1;
      if($_GET["page"] - 1 < 1) $previous = 1;

      $next = $_GET["page"] + 1;
      if($_GET["page"] + 1 >= ceil(count($code)/$nbVideo)) $next = ceil(count($code)/$nbVideo);
      if($_GET["page"] > 1) echo "<li class=\"page-item\"><a class=\"page-link\" href='./listeAttente.php?page=$previous'><<</a></li>";

      for($i = 1; $i <= ceil(count($code)/$nbVideo); $i++){   
        $active = "";
        if(($_GET["page"] == $i)) $active = "active";
        echo "<li class=\"page-item $active\"><a class=\"page-link\" href='./listeAttente.php?page=$i'>$i</a></li>";
      } 

      if($_GET["page"] == ceil(count($code)/$nbVideo) -1 ) echo "<li class=\"page-item\"><a class=\"page-link\" href='./listeAttente.php?page=$next'>>></a></li>";
      ?>
      </ul>
      </br>
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
