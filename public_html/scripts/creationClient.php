<?php
   session_start();
   
   include "..//..//bd_connexion//infos_connexion.php";
   include "..//..//bd_connexion//pdo_connect.php";
   include "..//locales/creationCompteClient_locales.php";
   
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $courriel = $_POST['courriel'];
   $passwd = $_POST['password'];
   
   
   try {
     $pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
    } catch (Exception $e) {
      exit($e);
    }
       ?>

<?php
   $hashpwd = password_hash($passwd, PASSWORD_DEFAULT);
   
   $stmt = $pdo->prepare("SELECT * FROM [dbo].[Clients] WHERE courriel = ?");
   $stmt->execute([$courriel]);
   $result = $stmt->fetch();
   if($result != null){
     ?>

<script type="text/javascript">
   window.location.href = "../creationCompteClient.php";
   alert("<?=$Script1[$_SESSION['language']]?>");
</script>

<?php
   } else {
       $stmt = $pdo->prepare("INSERT INTO [dbo].[Clients] (prenom,nom,courriel,passwd,prixDepart) VALUES (?,?,?,?,50.00)");
       $stmt->execute([$prenom,$nom,$courriel,$hashpwd]);
   ?>
   
<script type="text/javascript">
   window.location.href = "../logClient.php";
   alert("<?=$Script2[$_SESSION['language']]?>");
</script>
<?php            
   }
   ?>