<?php
session_start();
#includes a PDO setup
include "..//..//bd//bd_connexion.php";
include "..//..//bd//pdo_connexion.php";

#Set up PDO for SQL injection protection

try {
$pdo = new PDO($dsn, $connectionId, $connectionPasswd, $options);
 } catch (Exception $e) {
   exit($e);
 }

 #catches user/password submitted by html form
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$passwd = $_POST['password'];
$passwd2 = $_POST['password2'];
$argent = $_POST['argent'];

#checks if the html form is filled
if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_POST['argent'])){
    ?>
    <script type="text/javascript">
        alert("Remplis tout svp");
        window.location.href = "../login.php";
    </script>
    <?php
    }else if($passwd != $passwd2){?>
        <script type="text/javascript">
            alert("Les deux mots de passe ne sont pas identiques.");
            window.location.href = "../login.php";
        </script>
    <?php
        }
        else {
            $hashpwd = password_hash($passwd, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("SELECT * FROM [dbo].[Clients] WHERE courriel = ?");
            $stmt->execute([$email]);
            $result = $stmt->fetch();
            if($result != null){
              ?>
              <script type="text/javascript">
              window.location.href = "../login.php";
              alert("Ce courriel existe déja.");
              </script>
              <?php
            } else {
                $stmt = $pdo->prepare("INSERT INTO [dbo].[Clients] (prenom, nom, courriel, passwd, prixDepart) VALUES (?,?,?,?,?)");
                $stmt->execute([$nom, $prenom, $email, $hashpwd, $argent]);
                alert("Bravo! Votre compte est maintenant créé.");
                header("Location: ../login.php?success=true");             
            }
    }
    ?>
