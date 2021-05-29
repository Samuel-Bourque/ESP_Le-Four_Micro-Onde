<?php
  session_start();
  include "./locales/navbar_locales.php";

  if(isset($_SESSION['authentifie'])){
    include "./scripts/notifCount.php";
  }
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Hello Video</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['authentifie'])){?>
          <li class="nav-item active">
              <a id="deconnexion" class="nav-link" href="listeAttente.php"><?=$listeAttente[$_SESSION['language']]?>
              <span class="sr-only">(current)</span>
              <span class="badge badge-pill <?=$color?>"><?=$count?></span>
            </a>
          </li>
          <?php } ?>
        <?php if(isset($_SESSION['authentifie'])){?>
          <li class="nav-item active">
              <a class="nav-link" href="gestion.php"><?=$ajoutVideo[$_SESSION['language']]?>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php } 
          if(!isset($_SESSION['authentifie'])) { ?>
              <li class="nav-item active">
              <a class="nav-link" href="ajoutVideoUtilisateur.php"><?=$suggestVideo[$_SESSION['language']]?>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="tutoriels.php?page=1"><?=$tutoriels[$_SESSION['language']]?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="videos.php?page=1"><?=$videos[$_SESSION['language']]?></a>
          </li>
          <?php if(isset($_SESSION['authentifie'])){?>
          <li class="nav-item active">
              <a id="deconnexion" class="nav-link" href="scripts/logout.php"><?=$deconnexion[$_SESSION['language']]?>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php } ?>
          <?php if(!isset($_SESSION['authentifie'])){?>
          <li class="nav-item active">
            <li class="nav-item">
              <a class="nav-link" href="connexion.php"><?=$connexion[$_SESSION['language']]?></a>
            </li>
          </li>
          <?php }
          if($_SESSION['language'] == "en"){?>
          <li class="nav-item active">
              <a class="nav-link text-warning" href="scripts/language.php">Fr
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php }
          if($_SESSION['language'] == "fr"){?>
          <li class="nav-item active">
              <a class="nav-link text-warning" href="scripts/language.php">En
  
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>