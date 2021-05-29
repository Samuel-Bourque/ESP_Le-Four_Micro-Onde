<?php
session_start();
#includes a PDO setup
include "..//..//bd_connexion//infos_connexion.php";
include "..//..//bd_connexion//pdo_connect.php";
include "..//locales/connexion_locales.php";
#Set up PDO for SQL injection protection

try {
$pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
 } catch (Exception $e) {
   exit($e);
 }

#catches user/password submitted by html form
$email = $_POST['email'];
$passwd = $_POST['password'];

#checks if the html form is filled
if(empty($_POST['email']) || empty($_POST['password'])){
?>
<script type="text/javascript">
alert("<?= $fillAll[$_SESSION["language"]]?>");
window.location.href = "../connexion.php";
</script>
<?php
}else{

#verifies hash from database with given password (SQL injection secured)
$stmt = $pdo->prepare("SELECT passwd FROM [dbo].[Gestionnaires] WHERE courriel=?");
$result = $stmt->execute([$email]);
while($row = $stmt->fetch()){
   $resultHash = $row['passwd'];
};

#checks if hash was identical (right password)
   $result = password_verify($passwd, $resultHash);
   if($result) {
#redirects user
session_start(); 
$_SESSION['authentifie'] = true;
$_SESSION['timeOut'] = time();
header("Location: ../gestion.php");
      }
   ?>
<script type="text/javascript">
alert("<?= $incorrect[$_SESSION["language"]]?>");
window.location.href = "../connexion.php";
</script>
<?php
}
?>

