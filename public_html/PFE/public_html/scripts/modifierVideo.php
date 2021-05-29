<?php
session_start();
if(isset($_SESSION['authentifie'])){
$title=$_POST["title"];  
$description=$_POST["description"];  
$url=$_POST["url"];  
$estTuto=$_POST["estTutoOuPerso"];
$estFrOuEn=$_POST["estFrOuEn"]; 

$codeInitial = $_GET["codeInitial"];
$estTutoInitial = $_GET["estTutoInitial"];

$nouveauCode="";
preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $nouveauCode);

include "..//..//bd_connexion//infos_connexion.php";
include "..//..//bd_connexion//pdo_connect.php";
include "../locales/modifier_locales.php";

try {
    $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
     } catch (Exception $e) {
       exit($e);
     }

     if($estTutoInitial){
      if($estTuto){ //tuto->tuto
        $stmtUpdateTuto = $pdo->prepare("UPDATE [dbo].[Tutoriels] SET code = ?, titre = ?, description = ?, estAnglais = ? WHERE code = ?");
        $result = $stmtUpdateTuto->execute([$nouveauCode[0], $title, $description, $estFrOuEn, $codeInitial]);
        if(count($result)>0){
          header("Location:../tutoriels.php?page=1");
        }
      }
      else{ //tuto->video
        $stmtCheckVideo = $pdo->prepare("SELECT COUNT(*) FROM [dbo].[Videos] WHERE code = ?");
        $result = $stmtCheckVideo->execute([$nouveauCode[0]]);
        if(count($result)==0){
          
          $stmtDeleteTuto = $pdo->prepare("DELETE FROM [dbo].[Tutoriels] WHERE code = ?");
          $stmtDeleteTuto->execute([$codeInitial]);

          $stmtAddVideo = $pdo->prepare("INSERT INTO [dbo].[Videos] (code,titre,description) VALUES (?,?,?)");
          $stmtAddVideo->execute([$nouveauCode[0],$title,$description]);
          header("Location:../videos.php?page=1");
        }
        else{
          ?>
          <script type="text/javascript">
          window.location.href = document.referrer;
          alert("<?= $existeDansVideos[$_SESSION["language"]]?>");
          </script>
          <?php
        }
      }
     }
     else{
      if($estTuto){ //video->tuto
        $stmtCheckTuto = $pdo->prepare("SELECT COUNT(*) FROM [dbo].[Tutoriels] WHERE code = ?");
        $result = $stmtCheckTuto->execute([$nouveauCode[0]]);
        if(count($result)==0){

          $stmtDeleteVideo = $pdo->prepare("DELETE FROM [dbo].[Videos] WHERE code = ?");
          $stmtDeleteVideo->execute([$codeInitial]);

          $stmtAddTuto = $pdo->prepare("INSERT INTO [dbo].[Tutoriels] (code,titre,description, estAnglais) VALUES (?,?,?,?)");
          $stmtAddTuto->execute([$nouveauCode[0],$title,$description,$estFrOuEn]);
          header("Location:../tutoriels.php?page=1");
        }
        else{
          ?>
          <script type="text/javascript">
          window.location.href = document.referrer;
          alert("<?= $existeDansTutos[$_SESSION["language"]]?>");
          </script>
          <?php
        }
      }
      else{ //video->video
        $stmtUpdateVideo = $pdo->prepare("UPDATE [dbo].[Videos] SET code = ?, titre = ?, description = ? WHERE code = ?");
        $result = $stmtUpdateVideo->execute([$nouveauCode[0], $title, $description, $codeInitial]);
        if(count($result)>0){
          header("Location:../videos.php?page=1");
        }
      }
     }
}
?>
