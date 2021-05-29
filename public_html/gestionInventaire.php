<?php
  session_start();
include "./locales/gestionInventaire_locales.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Samuel Bourque">
  <title><?=$Title[$_SESSION['language']]?></title>
  <link rel="icon" href="images//favicon.ico" type="image/png"></link>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<?php include "nav//navbar.php"; ?>
<?php include "nav//header.php"; ?>

</br>

<div class="text-center">
  <h1><?=$Title[$_SESSION['language']]?></h1>
</div>

        <section class="py-5">
            <div class="container my-5">
            <table class="table table-xl table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col"><?=$Nom[$_SESSION['language']]?></th>
      <th scope="col"><?=$Prix[$_SESSION['language']]?></th>
      <th scope="col"><?=$Quantite[$_SESSION['language']]?></th>
      <th scope="col">MODIFICATION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>BIG MAC</td>
      <td>5.00 $</td>
      <td>10</td>
      <td>
      <button type="submit" class="btn btn-outline-warning"><?=$Button1[$_SESSION['language']]?></button> 
      <button type="submit" class="btn btn-outline-warning"><?=$Button2[$_SESSION['language']]?></button>   
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>POUTINE</td>
      <td>3.00 $</td>
      <td>5</td>
      <td>
      <button type="submit" class="btn btn-outline-warning"><?=$Button1[$_SESSION['language']]?></button>  
      <button type="submit" class="btn btn-outline-warning"><?=$Button2[$_SESSION['language']]?></button>  
      </td>
    </tr>
    <tr>
    <th scope="row">3</th>
      <td>BREUVAGE</td>
      <td>1.00 $</td>
      <td>3</td>
      <td>
      <button type="submit" class="btn btn-outline-warning"><?=$Button1[$_SESSION['language']]?></button>  
      <button type="submit" class="btn btn-outline-warning"><?=$Button2[$_SESSION['language']]?></button>  
      </td> 
    </tr>
  </tbody>
</table>
                </div>
            </div>
        </section>
<?php include "nav//footer.php"; ?>