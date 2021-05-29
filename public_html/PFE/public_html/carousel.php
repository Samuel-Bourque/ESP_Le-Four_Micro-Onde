<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    width: 70%;
    margin: auto;
  }
  </style>
</head>
<body>

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="./images/SlideIntro_<?= $_SESSION['language']?>.jpg" alt="Slide1">
      </div>

      <div class="item">
        <img src="./images/Slide1<?= $_SESSION['language']?>.jpg" alt="Slide1" >
      </div>

      <div class="item">
        <img src="./images/Slide2<?= $_SESSION['language']?>.jpg" alt="Slide2">
      </div>
    
      <div class="item">
        <img src="./images/Slide3<?= $_SESSION['language']?>.jpg" alt="Slide3" >
      </div>

      <div class="item">
        <video autoplay muted loop style="width: 100%; height: 100%;">
         <source type="video/mp4" src="./images/Animation.mp4">
         </video>
      </div>

      <div class="item">
        <img src="./images/Slide4<?= $_SESSION['language']?>.jpg" alt="Slide4">
      </div>

      <div class="item">
        <video controls loop style="width: 100%; height: 100%;">
         <source type="video/mp4" src="./images/animation2.mp4">
         </video>
      </div>

      <div class="item">
        <img src="./images/Slide5<?= $_SESSION['language']?>.jpg" alt="Slide4">
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>