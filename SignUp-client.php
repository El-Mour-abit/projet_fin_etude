<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="Signup-client.css">
</head>
<body>
<h1>Sign Up</h1><br>
<form action="Traitement-Signup-client.php" method="post">
  <input type="text" name="firstname" placeholder="nom" required>
  <input type="text" name="lastname" placeholder="prenom" required><br>
  <input type="text" name="street" placeholder="adresse" required><br>
  <input type="email" name="mail" placeholder="Email" required><br>
  <input type="password" name="code" placeholder="PASSWORD" required><br>
  <?php if(isset($errors)): ?>
      <p style="color: red;"><?php echo $errors; ?></p>
    <?php endif; ?>
  <input type="Number" name="num1" placeholder="Numero du contrat" required><br>
  <input type="Number" name="num2" placeholder="numero du relevé d'identité bancaire" required><br>

  
  <button type="submit" name="btn">Sign Up</button>
</form><br>
<p>Vous avez deja un compte ? <a href="Login-client.php">LOGIN ICI</a></p>
<p>Copyright @ ONEP.ma</p>


</script>



  
</body>
</html>