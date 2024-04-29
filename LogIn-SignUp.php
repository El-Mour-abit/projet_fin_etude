<?php
  include('connect.php');

  if(isset($_POST['submit'])) {
    $signup_prenom = $_POST['signup-prenom'];
    $signup_nom = $_POST['signup-nom'];
    $signup_adresse = $_POST['signup-adresse'];
    $signup_email = $_POST['signup-email'];
    $signup_password = $_POST['signup-password'];
    $add = "INSERT INTO client (nom, prenom,adresse,email, password) VALUES ('$signup_prenom', '$signup_nom','$signup_adresse','$signup_email','$signup_password')";
    $res = mysqli_query($con, $add);
    if ($res) {
        // header('location:http://localhost/developpment/client/logIn/login.php');
        // header("Location: ".$_SERVER['REQUEST_URI']);
        echo "<script>alert(\"Compte de l'utilisateur crée avec succés du login\")";
        exit();

    }
}
?>