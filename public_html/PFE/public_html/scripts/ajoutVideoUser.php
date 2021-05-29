<?php
session_start();
$titre = $_POST['title'];
$desc = $_POST['description'];
$url = $_POST['url'];
$email = $_POST['email'];

$id="";
preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $id);

include "..//..//bd_connexion//infos_connexion.php";
include "..//..//bd_connexion//pdo_connect.php";
include "../locales/suggestion_locales.php";

try {
    $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
     } catch (Exception $e) {
       exit($e);
     }
     if(count($id)==0){
      ?>
      <script type="text/javascript">
      window.location.href = "../ajoutVideoUtilisateur.php";
      alert("<?= $invalidLink[$_SESSION["language"]]?>");
      </script>
      <?php
    }
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM [dbo].[EnAttente]");
    $stmt->execute();
    $total = $stmt->fetchColumn();

    if($total >= 30){
      ?>
      <script type="text/javascript">
      window.location.href = "../ajoutVideoUtilisateur.php";
      alert("<?= $alreadyMaxVideo[$_SESSION["language"]]?>");
      </script>
      <?php
    }
    else{
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM [dbo].[EnAttente] WHERE code = ?");
    $stmt->execute([$id[0]]);
    $count = $stmt->fetchColumn();
    if($count>0){
      ?>
      <script type="text/javascript">
      window.location.href = "../ajoutVideoUtilisateur.php";
      alert("<?= $alreadySuggested[$_SESSION["language"]]?>");
      </script>
      <?php
    }
    else{
    $stmt = $pdo->prepare("INSERT INTO [dbo].[EnAttente] (email,code,titre,description) VALUES (?,?,?,?)");
    $stmt->execute([$email,$id[0],$titre,$desc]);
    header("Location: ../ajoutVideoUtilisateur.php?success=true");
    }
  }
?> 
