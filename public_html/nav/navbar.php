<?php
   session_start();
     include "./locales/navbar_locales.php";
     ?>

<style>
   <?php include "css//navbar.css"; ?>
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand text-warning" href="./index.php"><?=$Brand[$_SESSION['language']]?></a>

   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto topnav">
         <li class="nav-item active">
            <a class="nav-link text-warning" href="./index.php"><?=$Accueil[$_SESSION['language']]?><span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-warning" href="./menu.php"><?=$Menu[$_SESSION['language']]?></a>
         </li>

         <?php if(isset($_SESSION['authentifie'])){?>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-warning" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?=$Gestion[$_SESSION['language']]?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item text-warning" href="./listeClients.php"><?=$Gestion1[$_SESSION['language']]?></a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item text-warning" href="./menuLogIn.php"><?=$Gestion2[$_SESSION['language']]?></a>
            </div>
         </li>
         <?php } ?>

         <?php if(!isset($_SESSION['authentifieClient']) && !isset($_SESSION['authentifie'])){?>
         <li class="nav-item">
            <a class="nav-link btn btn-outline-warning text-white" type="button" href="./creationCompteClient.php" ><?=$Creation[$_SESSION['language']]?></a>
         </li>
         <?php } ?>

         <?php if(isset($_SESSION['authentifieClient'])){?>
         <li class="nav-item">
            <a id="Achat" class="nav-link btn btn-outline-danger text-white" type="button" href="achatProduit.php"><?=$Achat[$_SESSION['language']]?></a>                
         </li>
         <?php } ?>

         <?php if(!isset($_SESSION['authentifieClient']) && !isset($_SESSION['authentifie'])){?>
         <li class="nav-item">
            <a class="nav-link btn btn-outline-success text-white" type="button" href="logClient.php" ><?=$ConnexionClient[$_SESSION['language']]?></a>                  
         </li>
         <?php } ?>

         <?php if(!isset($_SESSION['authentifie']) && !isset($_SESSION['authentifieClient'])){?>
         <li class="nav-item">
            <a class="nav-link btn btn-outline-success text-white" type="button" href="login.php" ><?=$Connexion[$_SESSION['language']]?></a>                  
         </li>
         <?php } ?>

         <?php if(isset($_SESSION['authentifieClient'])){?>
         <li class="nav-item">
            <a id="deconnexion" class="nav-link btn btn-outline-danger text-white" type="button" href="scripts/logout2.php"><?=$Deconnexion[$_SESSION['language']]?></a>
            <span class="sr-only">(current)</span>
            </a>
         </li>
         <?php } ?>

         <?php if(isset($_SESSION['authentifie'])){?>
         <li class="nav-item">
            <a id="deconnexion" class="nav-link btn btn-outline-danger text-white" type="button" href="scripts/logout.php"><?=$Deconnexion[$_SESSION['language']]?></a>
            <span class="sr-only">(current)</span>
            </a>
         </li>
         <?php } ?>

         <?php if($_SESSION['language'] == "fr"){?>
         <li class="nav-item active">
            <a class="nav-link text-warning" href="scripts/language.php">EN
            <img src="././images/uk.png">
            <span class="sr-only">(current)</span>
            </a>
         </li>
         <?php } ?>
         
         <?php
            if($_SESSION['language'] == "en"){?>
         <li class="nav-item active">
            <a class="nav-link text-warning" href="scripts/language.php">FR
            <img src="././images/france.png">
            <span class="sr-only">(current)</span>
            </a>
         </li>
         <?php } ?>
      </ul>
   </div>
</nav>