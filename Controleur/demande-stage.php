<?php
include('stage.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demande de Stage</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="demande-stage.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
      <a class="navbar-brand" href="http://www.onep.ma/"><img src="images/logoONEP.jpg" alt="ONEEP" width="30px" height="30px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/projet/projet_fin_etude/Views/Home.html">Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://localhost/projet/projet_fin_etude/Views/AboutUs.html">AboutUs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://localhost/projet/projet_fin_etude/Views/EspaceClient.html">Espace Client</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="http://localhost/projet/projet_fin_etude/Views/EspaceStagiaire.php">Espace Stagiaire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://localhost/projet/projet_fin_etude/Views/ContactUs.html"">ContactUs</a>
          </li>
        </ul>
        <form class=" form-inline my-2 my-lg-0">
              <a href="AboutUs.html" class="no-text-decoration btn btn-outline-dark my-2 my-sm-0">Learn More</a></button>
        </form>
      </div>
    </nav>
  </header>

  <h1>Poser Votre demande de Stage</h1>

  <form class="w-100"  method="POST">
    <div class="w-75 m-auto">
      <div class="form-group">
        <label>nom</label>
        <input type="text" class="form-control" placeholder="votre nom" name="stage-nom">
      </div>
      <div class="form-group">
        <label>prenom</label>
        <input type="text" class="form-control" placeholder="votre prenom" name="stage-prenom">
      </div>
      <div class="form-group">
        <label>demande de stage</label>
        <textarea class="form-control" rows="3" placeholder="votre demande de stage" name="stage-demande"></textarea>
      </div>
      <div>
        <label>CV</label>
        <input class="form-control form-control-lg" type="file" name="stage-cv">
      </div>
      <button class="btn btn-primary mb-3 mt-3 w-100" type="submit" name="stage_submit">envoyer</button>
    </div>
  </form>
  <?php
    if (isset($_SESSION['login_success_message'])) {
        echo $_SESSION['login_success_message'] ;
        unset($_SESSION['login_success_message']);
    }
    ?>



  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2024 Copyright:
    >ONEP-Al-hoceima

  </div>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>