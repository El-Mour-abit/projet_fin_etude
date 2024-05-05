<?php
session_start(); // Démarre la session

$dbserver="localhost";
$username="root";
$password="";
$db="projet_fin_etude";
$cnx=mysqli_connect($dbserver,$username,$password,$db);
if(!$cnx){
    die("erreur cnx :".mysqli_connect_error());
}

if(isset($_POST['loginbutton'])){
    $email = $_POST['mail'];
    $password = $_POST['code'];
    
    // Requête SQL pour vérifier les informations d'identification
    $req = "SELECT Num_Client FROM client WHERE email=? AND password=?";
    
    // Utilisation des requêtes préparées pour éviter les injections SQL
    $stmt = mysqli_prepare($cnx, $req);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    
    // Récupération du résultat
    $result = mysqli_stmt_get_result($stmt);
    
    // Vérification si un utilisateur correspondant a été trouvé
    if(mysqli_num_rows($result) > 0){
        // Stockage de l'ID du client dans la session
        $row = mysqli_fetch_assoc($result);
        $_SESSION['loggedin'] = true;
        $_SESSION['clientId'] = $row['Num_Client'];
        
        // Redirection vers le tableau de bord
        header('location: facture.php');
        exit;
    } else {
      $errorMessage ="Utilisateur introuvable , le mot de passe ou l'email est incorrecte";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="Login-client.css">
</head>
<body>
  <h1>LOGIN</h1>
<form action="" method="post">
  <input type="email" name="mail" placeholder="Votre Adresse Email" required><br>
  <input type="password" name="code" placeholder="Votre Mot de Passe" required><br>
  <?php if(isset($errorMessage)): ?>
      <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
  <a href="">Mot de passe oublié?</a><br>
  <button type="submit" name="loginbutton">Login</button>
</form>  
<p>Vous n'avez pas de compte ? <a href="Signup-client.php">Signup</a></p>

</body>
</html>
