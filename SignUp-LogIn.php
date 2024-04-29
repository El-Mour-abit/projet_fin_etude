<?php
  include('SignUp.php');
?>
<?php
include('LogIn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn/signUp</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="SignUp-LogIn.css">
</head>
<body>
     <!-- header start -->
     <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
          <a class="navbar-brand" href="http://www.onep.ma/">
            <img
              src="images/logoONEP.jpg"
              alt="ONEEP"
              width="30px"
              height="30px"
            />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="Home.html">Acceuil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="AboutUs.html">AboutUs</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="SignUp-LogIn.html">Espace Client</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="EspaceStagiaire.html">Espace Stagiaire</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ContactUs.html">ContactUs</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <a href="AboutUs.html" class="no-text-decoration btn btn-outline-dark my-2 my-sm-0">Learn More</a></button>

            </form>
          </div>
        </nav>
      </header>
      <!-- header end -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
    <!-- sign Up form-->
		<form action="#" method="POST">
			<h1>Sign Un</h1>
			<input type="text" placeholder="prenom" name="signup-prenom"/>
			<input type="text" placeholder="nom" name="signup-nom"/>
			<input type="text" placeholder="adresse" name="signup-adresse"/>
			<input type="email" placeholder="Email" name="signup-email"/>
			<input type="password" placeholder="Password" name="signup-password"/>
			<button type="submit" name="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
    <!-- log in form -->
		<form action="#" method="POST">
			<h1>Log In</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<input type="email" placeholder="Email" name="login-email"/>
			<input type="password" placeholder="Password" name="login-password"/>
			<a href="#">Mot de passe oublié?</a>
			<button name="login_submit" type="submit">Log In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Soyez de nouveau le bienvenu!</h1>
				<p>Pour rester connecté avec nous, veuillez vous connecter avec vos informations personnelles</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Bonjour, mon ami!</h1>
				<p>Entrez vos informations personnelles et commencez votre voyage avec nous</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		Bienvenue  <i class="fa fa-heart"></i>
		- Créez votre compte pour augmenter la sécurité 
		<a target="_blank" href="http://www.one.org.ma/FR/pages/lvil.asp?esp=2&id1=6&id2=129&t1=1&t2=1&filt=3&comm=t&action=prov">ONEP-AL-Hoceima</a>.
	</p>
</footer>
<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</body>
</html>
