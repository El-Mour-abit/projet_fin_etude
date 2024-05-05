<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LogIn</title>
  <link rel="stylesheet" href="LogIn.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body> 
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="http://www.onep.ma/"><img src="images/logoONEP.jpg" alt="ONEEP" width="30px" height="30px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="Home.html">Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="AboutUs.html">AboutUs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="EspaceClient.html">Espace Client</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="EspaceStagiaire.html">Espace Stagiaire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="ContactUs.html"">ContactUs</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link " href="LogInAdmin.php"">Admin</a>
          </li>
          </ul>
          <form class=" form-inline my-2 my-lg-0">
              <a href="AboutUs.html" class="no-text-decoration btn btn-outline-dark my-2 my-sm-0">Learn More</a></button>
              </form>
      </div>
    </nav>
  </header>
  <div class="container w-25 mt-5">
    <div class="heading">Log In</div>
    <form action="LogInStagiaire.php" class="form" method="POST">
      <input required="" class="input" type="number" name="num" id="num" placeholder="votre numéro">
      <input required="" class="input" type="text" name="nom" id="nom" placeholder="Nom">
      <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
      <span class="agreement"><a href="SignUp-Stagiaire.php">crée un compte?</a></span>
      <input class="login-button" type="submit" name="submit" value="Log In">
    </form>
    <?php
    session_start();
    if (isset($_SESSION['login_message'])) {
        echo $_SESSION['login_message'] ;
        unset($_SESSION['login_message']);
    }
    ?>
  </div>
</body>

</html>