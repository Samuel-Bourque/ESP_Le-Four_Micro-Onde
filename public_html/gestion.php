<?php 
include "./locales/gestion_locales.php";
session_start();
if(!isset($_SESSION['authentifie'])){
  header('Location: connexion.php');
}
if(time()-$_SESSION['timeOut'] > 1000) 
{
  $lang = $_SESSION['language'];
  session_unset(); 
  session_destroy(); 
?>
  <script type="text/javascript">
  alert("<?= $loginAgain[$lang]?>");
  window.location.href = "connexion.php";
  </script>
  <?php
} 
?>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<?php if($_GET['success']){ ?>
<script type="text/javascript">
      $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
<?php }?>

<h1>CONNEXION RÉUSSI</h1>