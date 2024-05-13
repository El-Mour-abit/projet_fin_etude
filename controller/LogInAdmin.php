<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn Admin</title>
    <link rel="stylesheet" href="../views/LogInAdmin.css">
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
            <a class="nav-link" href="../views/Home.html">Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../views/AboutUs.html">Apropos-de-nous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../views/EspaceClient.html">Espace Client</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../views/EspaceStagiaire.html">Espace Stagiaire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../views/ContactUs.html"">contactez-nous</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="LogInAdmin.php"">Administrateur</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a href="AboutUs.html" class="no-text-decoration btn btn-outline-dark my-2 my-sm-0">Learn More</a></button>
        </form>
      </div>
    </nav>
</header>


<div class="login-container mt-5">
  <form class="login-form" action="Dashboard-admin.php" method="POST">
    <p class="heading">Login</p>
    <p class="paragraph">Login to your account</p>
    <div class="input-group">
      <input
        required=""
        placeholder="nom"
        id="name"
        type="text"
        name="nom"
      />
    </div>
    <div class="input-group">
      <input
        required=""
        placeholder="Password"
        name="password"
        id="password"
        type="password"
      />
    </div>
    <button type="submit" name="submit">Login</button>
    <div class="bottom-text">
      <p><a href="#">Forgot password?</a></p>
    </div>
  </form>
  <?php
    session_start();
    if (isset($_SESSION['signup_message'])) {
      echo $_SESSION['signup_message'];
      unset($_SESSION['signup_message']);
    }
    ?>
</div>
</body>

</html>