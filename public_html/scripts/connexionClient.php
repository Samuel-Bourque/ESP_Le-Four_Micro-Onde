<?php
   session_start();
   
   include "..//..//bd_connexion//infos_connexion.php";
   include "..//..//bd_connexion//pdo_connect.php";
   include "..//locales/connexion_locales.php";
   
   $email = $_POST['email'];
   $passwd = $_POST['password'];
   
   try {
   $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
    } catch (Exception $e) {
      exit($e);
    }
   ?>

<?php
   $stmt = $pdo->prepare("SELECT passwd FROM [dbo].[Clients] WHERE courriel=?");
   $result = $stmt->execute([$email]);
   while($row = $stmt->fetch()){
      $resultHash = $row['passwd'];
   };
   
      $result = password_verify($passwd, $resultHash);
      if($result) {
   
   session_start(); 
   $_SESSION['authentifieClient'] = true;
   $_SESSION['timeOut'] = time();
   $_SESSION['courriel'] = $email;
   header("Location: ../achatProduit.php");
         }
      ?>
      
<script type="text/javascript">
   alert("<?= $Incorrect[$_SESSION["language"]]?>");
   window.location.href = "../logClient.php";
</script>