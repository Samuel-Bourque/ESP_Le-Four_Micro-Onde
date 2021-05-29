<?php
session_start();
if(isset($_SESSION['authentifie'])){
$titre = $_POST['title'];
$desc = $_POST['description'];
$url = $_POST['url'];
$estTuto = $_POST['estTutoOuPerso'];
$estAnglais = $_POST['estFrOuEn'];
$tag = $_POST['tag'];

$id="";
preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $id);

include "..//..//bd_connexion//infos_connexion.php";
include "..//..//bd_connexion//pdo_connect.php";
include "../locales/gestion_locales.php";

try {
    $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
     } catch (Exception $e) {
       exit($e);
     }
     if(count($id)==0){
      ?>
      <script type="text/javascript">
      window.location.href = "../gestion.php";
      alert("<?= $invalidLink[$_SESSION["language"]]?>");
      </script>
      <?php
    }
    if(!$estTuto) {
    $stmt = $pdo->prepare("SELECT titre FROM [dbo].[Videos] WHERE code = ?");
    $stmt->execute([$id[0]]);
    $result = $stmt->fetch();
    if(count($result)>0){
      ?>
      <script type="text/javascript">
      window.location.href = "../gestion.php";
      alert("<?= $alreadyExistsV[$_SESSION["language"]]?>");
      </script>
      <?php
    }else{
    $stmt = $pdo->prepare("INSERT INTO [dbo].[Videos] (code,titre,description,tag) VALUES (?,?,?,?)");
    $stmt->execute([$id[0],$titre,$desc,$tag]);
    header("Location: ../gestion.php?success=true");
    }
  } else {
    $stmt = $pdo->prepare("SELECT titre FROM [dbo].[Tutoriels] WHERE code = ?");
    $stmt->execute([$id[0]]);
    $result = $stmt->fetch();
    if(count($result)>0){
      ?>
      <script type="text/javascript">
      window.location.href = "../gestion.php";
      alert("<?= $alreadyExistsT[$_SESSION["language"]]?>");
      </script>
      <?php
    }else{
    $stmt = $pdo->prepare("INSERT INTO [dbo].[Tutoriels] (code,titre,description,estAnglais) VALUES (?,?,?,?)");
    $stmt->execute([$id[0],$titre,$desc,$estAnglais]);
    header("Location: ../gestion.php?success=true");
    }
  }
}
?> 
