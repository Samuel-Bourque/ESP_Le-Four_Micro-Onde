<?php
   session_start();
   include "..//..//bd_connexion//infos_connexion.php";
   include "..//..//bd_connexion//pdo_connect.php";
   include "..//locales/connexion_locales.php";
   
   try {
   $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
    } catch (Exception $e) {
      exit($e);
    }
   
   $courriel = $_POST['email'];
   $password = $_POST['password'];
   
   ?>
<?php
   $stmt = $pdo->prepare("SELECT passwd FROM [dbo].[Admin] WHERE courriel=?");
   $result = $stmt->execute([$courriel]);
   while($row = $stmt->fetch()){
      $resultHash = $row['passwd'];
   };
   
      $result = password_verify($password, $resultHash);
      if($result) {
   
   session_start(); 
   $_SESSION['authentifie'] = true;
   $_SESSION['timeOut'] = time();
   header("Location: ../menuLogIn.php");
         }
      ?>

<script type="text/javascript">
   alert("<?= $Incorrect[$_SESSION["language"]]?>");
   window.location.href = "../login.php";
</script>